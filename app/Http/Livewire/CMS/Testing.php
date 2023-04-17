<?php

namespace App\Http\Livewire\CMS;

use App\Helpers\ImageHandlerHelper;
use App\Models\CMS\POST\PostImages;
use App\Models\CMS\POST\PostModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Testing extends Component
{
    use WithFileUploads;

    //initialized variable that will hold values from input form
    public string|int $cat_id = 1;
    public string|int $admin_id = 1;
    public string $title;
    public string $excerpt;
    public $thumbnail;
    public string $thumbnail_img_name = '';
    public string $content;
    public $images = [];
    public array $image_names = [];
    public string $vid_link;
    public string $author = 'test author';
    public int $status = 0;
    public array $post_data = [];
    public int $post_id;

    public $postData;

    public array $to_update_data = [];
    public mixed $to_delete_image = null;
    public array $to_update_images = [];
    public array $to_update_imgnames = [];


    protected $rules = [
        'cat_id'    => 'required|numeric',
        'title'     => 'required|word_count:15',
        'excerpt'   => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content'   => 'required',
        'images.*'  => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link'  => 'nullable|url',
        'status'    => 'required|numeric'
    ];
    public PostModel $post_model;
    private ImageHandlerHelper $imageHelper;
    public function __construct()
    {
        $this->post_model = new PostModel();
        $this->imageHelper = new ImageHandlerHelper();
    }

    public function mount() {
        $this->listeners['postModalPopulator'] = 'postModalPopulator';
    }

    public function create_post(): void
    {

        $validator = Validator::make([
            'cat_id'    => $this->cat_id,
            'title'     => $this->title,
            'excerpt'   => $this->excerpt,
            'thumbnail' => $this->thumbnail,
            'content'   => $this->content,
            'images'    => $this->images,
            'vid_link'  => $this->vid_link,
            'status'    => $this->status
        ], $this->rules);

        if ($validator->fails()) {
            $err_msgs = $validator->getMessageBag();
            foreach ($err_msgs->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $err_msgs = $validator->getMessageBag();
            $this->dispatchBrowserEvent('ValidationErrors', $err_msgs->getMessages());
            return;
        }

        $this->thumbnail_img_name = $this->imageHelper->extract_image_names($this->thumbnail);

        //arrange data for insertion
        $this->post_data = [
            'cat_id'    => $this->cat_id,
            'admin_id'  => $this->admin_id,
            'title'     => $this->title,
            'excerpt'   => $this->excerpt,
            'thumbnail' => $this->thumbnail_img_name,
            'content'   => $this->content,
            'vid_link'  => $this->vid_link,
            'author'    => $this->author,
            'status'    => $this->status
        ];


        $post = $this->post_model->fill($this->post_data);
        if ($post->save()) {

            $this->image_names = $this->imageHelper->extract_image_names($this->images);

            $images = collect($this->image_names)->map(function ($image_name) use ($post) {
                return new PostImages([
                    'post_id' => $post->id,
                    'image_filename' => $image_name
                ]);
            });

            if ($post->images()->saveMany($images)) {

                $this->storeImages();
                session()->flash('success', 'Post has been created!');
                return;
            }
        }

        session()->flash('error', 'Something went wrong please try again later!');
        return;
    }

    public function postModalPopulator($id) {
        $this->postData = DB::table('posts')->where('id', $id)->first();
        dd($this->postData);
    }

    //get post data from database.
    public function get_post_data(int|string $id)
    {

        $post = $this->post_model::with('images')->find($id);
        $this->post_id = $post->id;
        $this->to_update_data = [
            'title'     => $post->title,
            'excerpt'   => $post->excerpt,
            'thumbnail' => $post->thumbnail_img_name,
            'content'   => $post->content,
            'vid_link'  => $post->vid_link,
            'status'    => $post->status
        ];

        $post_images = [];
        foreach ($post->images as $image) {
            $post_images[$image->post_id] = $image->image_filename;
        }

        $this->to_update_data['images'] = $post_images;
    }

    public function updatePost(): bool
    {
        $validator = Validator::make([
            'cat_id'    => $this->cat_id,
            'title'     => $this->title,
            'excerpt'   => $this->excerpt,
            'thumbnail' => $this->thumbnail,
            'content'   => $this->content,
            'images'    => $this->images,
            'vid_link'  => $this->vid_link,
            'status'    => $this->status
        ], $this->rules);

        if ($validator->fails()) {
            $err_msg = $validator->getMessageBag();
            $this->dispatchBrowserEvent('validation-errors', $err_msg->getMessages());
            return false;
        }

        $this->thumbnail_img_name = $this->imageHelper->extract_image_names($this->thumbnail);

        //arrange data for insertion
        $this->post_data = [
            'cat_id'    => $this->cat_id,
            'title'     => $this->title,
            'excerpt'   => $this->excerpt,
            'thumbnail' => $this->thumbnail_img_name,
            'content'   => $this->content,
            'vid_link'  => $this->vid_link,
            'status'    => $this->status
        ];

        $post_update = PostModel::find($this->post_id);

        $post_update->fill($this->post_data);
        if ($post_update->save()) {
        }

        return true;
    }


    /**
     * @return void
     */
    public function storeImages(): void
    {
        foreach ($this->images as $imageIndex => $image) {
            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $curr_name = "{$originalName}.{$extension}";

            if ($curr_name && Storage::exists('/public/images/' . $curr_name)) {
                continue;
            }

            $image->storeAs('/public/images', $this->image_names[$imageIndex]);
        }
    }

    /**
     * @return void
     */
    public function storeThumbnailImage(): void
    {

        //delete the old image when it updated or when it already exists
        if ($this->thumbnail_img_name && Storage::exists('/public/images/' . $this->thumbnail_img_name)) {
            Storage::delete('public/images/' . $this->thumbnail_img_name);
        }

        $this->thumbnail->storeAs('/public/images', $this->thumbnail_img_name);
    }

    // public function remove_img_to_process() {
    //     foreach ($this->images as $imageIndex => $image) {
    //         $originalName = $image->getClientOriginalName();
    //         $extension = $image->getClientOriginalExtension();
    //         $curr_name = "{$originalName}.{$extension}";

    //         if ($curr_name && Storage::exists('/public/images/'.$curr_name)) {
    //             unset($this->images)
    //         }
    //     }
    // }

    // public function deleteImage(): bool
    // {
    //     return $this->imageHelper->delete_image($this->to_delete_image);
    // }

    public function renderLayout() {
        $postModel = new PostModel();
        return view('pages.admin.posts', ['posts' => $postModel->all()]);
    }
    public function render()
    {
        return view('livewire.c-m-s.testing')->layout('livewire.layout.laravel_layout');
    }
}
