<?php

namespace App\Http\Livewire\CMS;

use App\Models\CMS\POST\PostImages;
use App\Models\CMS\POST\PostModel;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Posts extends Component
{
    use WithFileUploads;

    //initialized variable that will hold values from input form
    public string|int $cat_id = 1;
    public string|int $admin_id = 1;
    public string $title;
    public string $excerpt;
    public $thumbnail;
    public $thumbnail_img_name = '';
    public string $content;
    public $images = [];
    public array $image_names = [];
    public string $vid_link;
    public string $author = 'test author';
    public int $status = 0;
    public array $post_data = [];
    public int $post_id;


    protected $rules = [
        'cat_id' => 'required|numeric',
        'title' => 'required|word_count:15',
        'excerpt' => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content' => 'required',
        'images.*' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link' => 'nullable|url',
        'status' => 'required|numeric'
    ];
    public PostModel $post_model;
    public function __construct()
    {
        $this->post_model = new PostModel();
    }

    public function create_post(): void
    {

        $validator = \Validator::make([
            'cat_id' => $this->cat_id,
            'title'  => $this->title,
            'excerpt' => $this->excerpt,
            'thumbnail' => $this->thumbnail,
            'content' => $this->content,
            'images' => $this->images,
            'vid_link' => $this->vid_link,
            'status' => $this->status
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



        //arrange data for insertion
        $this->post_data = [
            'cat_id' => $this->cat_id,
            'admin_id' => $this->admin_id,
            'title'  => $this->title,
            'excerpt' => $this->excerpt,
            'thumbnail' => $this->thumbnail,
            'content' => $this->content,
            'vid_link' => $this->vid_link,
            'author' => $this->author,
            'status' => $this->status
        ];


        $post = $this->post_model->fill($this->post_data);
        if ($post->save()) {

            $this->extract_image_names();

            $images = collect($this->image_names)->map(function ($image_name) use ($post) {
                return new PostImages([
                    'post_id' => $post->id,
                    'image' => $image_name
                ]);
            });

            if ($post->images()->saveMany($images)) {

                $this->storeImages();
                // return $session message;
            }
        }
    }

    public function extract_image_names()
    {
        foreach ($this->images as $image) {

            $time = time();
            $rand_num = Str::random(8);
            $extension = $image->getClientOriginalExtension();

            $image_name = "{$time}_{$rand_num}.{$extension}";
            // $image->storeAs('/public/images', $image_name);

            $this->image_names[] = $image_name;
        }
    }

    public function storeImages(): void
    {
        foreach ($this->images as $imageIndex => $image) {
            $image->storeAs('/public/images', $this->image_names[$imageIndex]);
        }
    }

    public function storeThumbnailImage(): void
    {

        //delete the old image when it updated or when it already exist
        if ($this->thumbnail_img_name && Storage::exists('/public/images/' . $this->thumbnail_img_name)) {
            Storage::delete('public/images/' . $this->thumbnail_img_name);
        }

        $time = time();
        $rand_num = Str::random(8);
        $extension = $this->image->getClientOriginalExtension();

        $thumbnail_img_name = "{$time}_{$rand_num}.{$extension}";
        $this->thumbnail->storeAs('/public/images', $thumbnail_img_name);

        $this->thumbnail_img_name = $thumbnail_img_name;
    }

    /**
     * for deleting image for udate onyl the image_names are needed.
     */
    public function deleteImages(array $file_names)
    {
    }

    public function render()
    {
        return view('livewire.cms.posts');
    }
}
