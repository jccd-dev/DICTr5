<?php

namespace App\Http\Livewire\CMS;

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
    public string $content;
    public $images = [];
    public array $image_names = [];
    public string $vid_link;
    public string $author = 'test author';
    public int $status = 0;
    public array $post_data = [];
    public int $post_id;


    protected $rules = [
        'title' => 'required|word_count:15',
        'excerpt' => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content' => 'required',
        'images.*' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link' => 'nullable|url',
        'status' => 'required|numeric'
    ];
    private $post_model;
    public function __construct()
    {
        $this->post_model = new PostModel();
    }

    public function create_post(): void
    {

        $this->validate();
        $this->post_data = [
            'cat_id'      => $this->cat_id,
            'admin_id'    => $this->admin_id,
            'title'       => $this->title,
            'excerpt'     => $this->excerpt,
            'thumbnail'   => $this->thumbnail,
            'content'     => $this->content,
            'vid_link'    => $this->vid_link,
            'author'      => $this->author,
            'status'      => $this->status
        ];

        dd($this->post_data);
        // $post = $this->post_model::create($this->post_data);
        // if($post) {

        // }
    }

    public function storeImages(): void
    {
        foreach ($this->images as $image) {

            $time = time();
            $rand_num = Str::random(8);
            $extension = $image->getClientOriginalExtension();

            $image_name = "{$time}_{$rand_num}.{$extension}";
            $image->storeAs('/public/images', $image_name);

            $this->image_names[] = $image_name;
        }
    }

    /**
     * for deleting image for udate onyl the image_names are needed.
     */
    public function deleteImages()
    {
    }

    public function onError($errorMsg)
    {
        $this->dispatchBrowserEvent('livewire-error', true);
    }

    public function render()
    {
        return view('livewire.cms.posts');
    }
}
