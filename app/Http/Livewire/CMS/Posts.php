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
    public string|int $cat_id;
    public string|int $admin_id;
    public string $title;
    public string $excerpt;
    public $thumbnail;
    public string $content;
    public $images = [];
    public array $image_names = [];
    public string $vid_link;
    public string $author;
    public int $status = 0;
    public array $post_data = [];
    public int $post_id;


    protected $rules = [
        'cat_id' => 'required',
        'admin_id' => 'required',
        'title' => 'required|word_count:15',
        'excerpt' => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content' => 'required',
        'images.*' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link' => 'nullable|url',
        'author' => 'required',
        'status' => 'required|numeric'
    ];
    private PostModel $post_model;
    public function __construct()
    {
        $this->post_model = new PostModel();
    }

    public function create_post() : void {

        $validated_data = $this->validate();
        dd($validated_data);
    }

    public function storeImage(): void
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

    public function deleteImages() {

    }


    public function render()
    {
        return view('livewire.cms.posts');
    }


}
