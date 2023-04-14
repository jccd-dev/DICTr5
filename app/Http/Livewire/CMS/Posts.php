<?php

namespace App\Http\Livewire\CMS;

use App\Models\CMS\POST\PostModel;
use Livewire\Component;

class Posts extends Component
{

    //initialized variable that will hold values from input form
    public string|int $cat_id;
    public string|int $admin_id;
    public string $title;
    public string $excerpt;
    public string $thumbnail;
    public string $content;
    public array $image_names = [];
    public string $vid_link;
    public string $author;
    public int $status;
    public array $post_data = [];
    public int $post_id;


    protected $rules = [
        'cat_id' => 'required',
        'admin_id' => 'required',
        'title' => 'required|word_count:15',
        'excerpt' => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:3072|dimensions:min_width=674,min_height=506',
        'content' => 'required',
        'images.*' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link' => 'required|url',
        'author' => 'required',
        'status' => 'required|numeric'
    ];
    private $post_model;
    public function __construct(int|string $cat_id, int|string $admin_id, string $title, string $excerpt, string $thumbnail, string $content, )
    {
        $this->post_model = new PostModel();
    }

    public function create_post() :bool {

    }

    public function render()
    {
        return view('livewire.cms.posts');
    }


}
