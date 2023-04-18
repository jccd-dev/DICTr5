<?php

namespace App\Http\Livewire\CMS;

use App\Helpers\ImageHandlerHelper;
use App\Models\CMS\POST\PostImages;
use App\Models\CMS\POST\PostModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Posts extends Component
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

    public string $category = '';
    public string $author = 'test author';
    public int $status = 0;
    public array $post_data = [];
    public int $post_id;

    public array $prev_data;

    public array $to_update_data = [];
    public mixed $to_delete_image = [];
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
        'status'    => 'required|numeric',
        'category'    => 'required',
    ];
    protected $update_rules = [
        'cat_id'    => 'required|numeric',
        'title'     => 'required|word_count:15',
        'excerpt'   => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content'   => 'required',
        'images.*'  => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link'  => 'nullable|url',
        'status'    => 'required|numeric',
        'category'    => 'required',
    ];

    public PostModel $post_model;
    private ImageHandlerHelper $imageHelper;
    public function __construct()
    {
        $this->post_model = new PostModel();
        $this->imageHelper = new ImageHandlerHelper();
    }

    public function mount()
    {
        $this->listeners['postModalPopulator'] = 'postModalPopulator';
        $this->to_update_data['images'] = '';
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
            'status'    => $this->status,
            'category'    => $this->category
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
            'status'    => $this->status,
            'category'    => $this->category
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

    //get post data from database.
    public function get_post_data(int|string $id): void
    {

        $post = $this->post_model::with('images')->find($id);
        $this->post_id = $post->id;
        $this->to_update_data = [
            'title'     => $post->title,
            'excerpt'   => $post->excerpt,
            'thumbnail' => $post->thumbnail,
            'content'   => $post->content,
            'vid_link'  => $post->vid_link,
            'status'    => $post->status,
            'category'    => $post->category
        ];

        $post_images = [];
        foreach ($post->images as $image) {
            $post_images[] = [
                $image->id => $image->image_filename
            ];
        }

        $this->to_update_data['images'] = $post_images;




        //        dd($this->to_update_data);
    }

    public function updatePost(): bool
    {

        $validator = Validator::make([
            'cat_id'    => $this->cat_id,
            'title'     => $this->to_update_data['title'],
            'excerpt'   => $this->to_update_data['excerpt'],
            'thumbnail' => $this->to_update_data['thumbnail'],
            'content'   => $this->to_update_data['content'],
            'images'    => $this->images,
            'vid_link'  => $this->to_update_data['vid_link'],
            'status'    => $this->to_update_data['status'],
            'category'  => $this->to_update_data['category']
        ], $this->update_rules);

        if ($validator->fails()) {
            $err_msg = $validator->getMessageBag();
            $this->dispatchBrowserEvent('validation-errors-update', $err_msg->getMessages());

            return false;
        }

        //handle thumbnail image
        $this->thumbnail_img_name = $this->imageHelper->extract_image_names($this->thumbnail);
        if (!$this->to_update_data['thumbnail'] == $this->thumbnail_img_name) {
            $this->imageHelper->del_image_on_db($this->to_update_data['thumbnail'], $this->post_id);
        }
        //arrange data for insertion
        $this->post_data = [
            'cat_id'    => $this->cat_id,
            'title'     => $this->to_update_data['title'],
            'excerpt'   => $this->to_update_data['excerpt'],
            'thumbnail' => $this->to_update_data['thumbnail'],
            'content'   => $this->to_update_data['content'],
            'images'    => $this->to_update_data['images'],
            'vid_link'  => $this->to_update_data['vid_link'],
            'status'    => $this->to_update_data['status'],
            'category'    => $this->to_update_data['category']
        ];

        $this->imageHelper->del_image_on_db($this->to_delete_image, $this->post_id);
        $this->image_names = $this->imageHelper->extract_image_names($this->images);

        $post_update = PostModel::find($this->post_id);

        $post_update->fill($this->post_data);
        if ($post_update->save()) {
            $new_images = collect($this->image_names)->map(function ($image_name) use ($post_update) {
                return new PostImages([
                    'post_id' => $post_update->id,
                    'image_filename' => $image_name
                ]);
            });

            if ($post_update->images()->saveMany($new_images)) {

                $this->storeImages();
                $this->imageHelper->del_image_on_db($this->to_delete_image, $this->post_id);
                session()->flash('success', 'Post has been created!');
                return true;
            }
        }

        return false;
    }


    /**
     * @return void
     */
    public function storeImages(): void
    {
        foreach ($this->images as $index => $image) {

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $curr_name = "{$originalName}.{$extension}";

            if (!$curr_name == $this->image_names[$index]) {
                $image->storeAs('/public/images', $this->image_names[$index]);
            }
        }
    }

    /**
     * @return void
     */
    public function storeThumbnailImage(): void
    {
        $this->thumbnail->storeAs('/public/images', $this->thumbnail_img_name);
    }

    public function delete_post(string|int $post_id): bool
    {
        $post = PostModel::findOrFail($post_id);
        // Delete the post and its related images
        return $post->delete() > 0;
    }

    public function render()
    {
        $postModel = new PostModel();
        return view('livewire.cms.posts', ['posts' => $postModel->all()])->layout('layouts.layout');
    }

    public function renderLayout()
    {
        return view('pages.admin.posts');
    }
}
