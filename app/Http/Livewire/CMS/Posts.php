<?php

namespace App\Http\Livewire\CMS;

use App\Models\CMS\Announcement as AnnouncementModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CMS\POST\PostModel;
use App\Helpers\ImageHandlerHelper;
use App\Models\CMS\POST\PostImages;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS\POST\PostCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class Posts extends Component
{
    use WithFileUploads;

    //initialized variable that will hold values from input form
    public mixed $myModal = null;
    public mixed $displayFormat = null;
    public string|int $category_id = 0;
    public string|int $admin_id = 1;
    public string $title = '';
    public string $excerpt = '';
    public $thumbnail;
    public string $thumbnail_img_name = '';
    public string $content = '';
    public $images = [];
    public array $image_names = [];
    public string $vid_link = '';
    public int $status = 0;
    public array $post_data = [];
    public int $post_id = 0;

    public array $prev_data = [];

    public array $to_update_data = [];
    public mixed $to_delete_image = [];
    public array $to_update_images = [];
    public array $to_update_imgnames = [];

    //for filters variables
    public string $search = '';
    public ?string $from = null;
    public ?string $to = null;
    public string|int|null $cat_id = null;
    public $temp_images = [];
    public $admin_data;

    protected $rules = [
        'category_id'    => 'required|numeric',
        'title'          => 'required|word_count:15',
        'excerpt'        => 'required',
        'thumbnail'      => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content'        => 'required',
        'images.*'       => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link'       => 'nullable|url',
        'status'         => 'required|numeric',
    ];
    protected $update_rules = [
        'category_id'    => 'required|numeric',
        'title'          => 'required|word_count:15',
        'excerpt'        => 'required',
        'thumbnail'      => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:5120|dimensions:min_width=674,min_height=506',
        'content'        => 'required',
        'images.*'       => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=674,min_height=506',
        'vid_link'       => 'nullable|url',
        'status'         => 'required|numeric',
    ];

    public PostModel $post_model;
    private ImageHandlerHelper $imageHelper;

    public function render()
    {
        // get admin name and id
        if (Auth::check()){

            $admin = Auth::user();

            $this->admin_data = [
                'id' => $admin->id,
                'author' => $admin->name
            ];
        }
        return view('livewire.cms.posts', ['posts' => $this->post_model->filter_search($this->from,
            date('Y-m-d', strtotime($this->to.' +1 day')),
            $this->category_id, $this->search), 'all_category' => $this->get_all_categories(), 'author' => $this->admin_data])->layout('layouts.layout');
    }

    public function __construct()
    {
        parent::__construct();
        $this->post_model = new PostModel(); // or whatever the name of your Post model is
        $this->imageHelper = new ImageHandlerHelper();

        if (Auth::check()){

            $admin = Auth::user();

            $this->admin_data = [
                'id' => $admin->id,
                'author' => $admin->name
            ];
        }
    }




    public function mount()
    {
        date_default_timezone_set('Asia/Manila');
        $date_from = PostModel::select(DB::raw('MIN(timestamp) as min_timestamp'))->first();
        $this->from = date('Y-m-d', strtotime($date_from->min_timestamp));
        $date_to = PostModel::select(DB::raw('MAX(timestamp) as max_timestamp'))->first();
        $this->to = date('Y-m-d', strtotime($date_to->max_timestamp));
        $this->post_model = new PostModel();
        $this->imageHelper = new ImageHandlerHelper();
        $this->listeners['postModalPopulator'] = 'postModalPopulator';
        $this->to_update_data['images'] = [];
        $this->to_update_data['thumbnail'] = '';
        $this->myModal = null;
        $this->displayFormat = null;
        $this->category_id = 0;
        $this->admin_id = 1;
//        $this->author = '';
        $this->title = '';
        $this->excerpt = '';
        $this->thumbnail = '';
        $this->thumbnail_img_name = '';
        $this->content = '';
        $this->images = [];
        $this->image_names = [];
        $this->vid_link = '';
        $this->status = 0;
        $this->post_data = [];
        $this->post_id = 0;

        $this->prev_data = [];

        $this->to_update_data = [];
        $this->to_delete_image = [];
        $this->to_update_images = [];
        $this->to_update_imgnames = [];
        $this->admin_data = [];

        //for filters variables
        $this->search = '';
        $this->cat_id = null;
        $this->temp_images = [];
        if (Auth::check()){

            $admin = Auth::user();

            $this->admin_data = [
                'id' => $admin->id,
                'author' => $admin->name
            ];
        }
    }

    public function create_post($admin): void
    {
        $validator = Validator::make([
            'category_id'   => $this->category_id,
            'title'         => $this->title,
            'excerpt'       => $this->excerpt,
            'thumbnail'     => $this->thumbnail,
            'content'       => $this->content,
            'images'        => $this->images,
            'vid_link'      => $this->vid_link,
            'status'        => $this->status,
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
            'category_id'    => $this->category_id,
            'admin_id'  => $admin['id'],
            'title'     => $this->title,
            'excerpt'   => $this->excerpt,
            'thumbnail' => $this->thumbnail_img_name,
            'content'   => $this->content,
            'vid_link'  => $this->vid_link,
            'author'    => $admin['author'],
            'status'    => $this->status,
        ];

        $this->populateImages($this->temp_images);

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
                $this->storeThumbnailImage();
                session()->flash('success', 'Post has been created!');
            }

            $this->dispatchBrowserEvent('ValidationSuccess', ['success' => 'success']);
        }

        session()->flash('error', 'Something went wrong please try again later!');
    }


    /**
     * @description retrieve post data for update modal.
     * @param int|string $id
     * @return void
     */
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
            'category_id'    => $post->category_id
        ];

        $this->title     = $post->title;
        $this->excerpt   = $post->excerpt;
        $this->thumbnail = $post->thumbnail;
        $this->content   = $post->content;
        $this->vid_link  = $post->vid_link;
        $this->status    = $post->status;
        $this->category_id = $post->category_id;

        $post_images = [];
        foreach ($post->images as $image) {
            $post_images[] = [
                $image->id => $image->image_filename
            ];
        }

        $this->to_update_data['images'] = $post_images;
        //        $this->images = $post_images;

        $this->prev_data = $this->to_update_data;

        $this->resetValidation();
    }

    public function resetFields()
    {
        $this->reset();
    }

    /**
     * @todo Add pagination
     * @description filter the data to be displayed into view,
     * @return Builder[]|Collection
     */
    public function search_post(): Collection|array
    {
        $posts = $this->post_model::query();

        $search_term = $this->search;
        $cat_id = $this->cat_id;
        $current = date('Y-m-d', strtotime('now'));
        $to_date = $this->to;

        if (!$search_term == '') {
            $posts = $posts->where(function ($query) use ($search_term) {
                $query->where('title', 'like', '%' . $search_term . '%')
                    ->orWhere('content', 'like', '%' . $search_term . '%');
            });

            //return $posts->with('images')->get();
        }

        if (!is_null($cat_id)) {
            $posts = $posts->whereHas('category', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            });
        }

        if ($this->from != null) {
            if (is_null($to_date)) {
                $from = date('Y-m-d', strtotime($this->from));
                $posts = $posts->whereBetween('timestamp', [$from, $current]);
            }
        }

        if ($this->from != null && !is_null($to_date)) {
            $from = date('Y-m-d', strtotime($this->from));
            $to_date = date('Y-m-d', strtotime($to_date));
            $posts = $posts->whereBetween('timestamp', [$from, $to_date]);
        }

        return $posts->get();
    }

    public function updatePost(): bool
    {
        if (gettype($this->thumbnail) === 'object') {
            $validator = Validator::make([
                'category_id' => $this->category_id,
                'title'       => $this->title,
                'excerpt'     => $this->excerpt,
                'thumbnail'   => $this->thumbnail,
                'content'     => $this->content,
                'images'      => $this->images,
                'vid_link'    => $this->vid_link,
                'status'      => $this->status,
            ], $this->update_rules);
        } else {
            $validator = Validator::make([
                'category_id' => $this->category_id,
                'title'       => $this->title,
                'excerpt'     => $this->excerpt,
                'content'     => $this->content,
                'images'      => $this->images,
                'vid_link'    => $this->vid_link,
                'status'      => $this->status,
            ], $this->update_rules);
        }



        if ($validator->fails()) {
            $err_msgs = $validator->getMessageBag();
            foreach ($err_msgs->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError('update.' . $field, $message);
                }
            }
            $this->dispatchBrowserEvent('validation-errors-update', $err_msgs->getMessages());
            return false;
        } else {
            $this->dispatchBrowserEvent('ValidationSuccess', true);
        }

        $this->populateImages($this->temp_images);

        if ($this->thumbnail !== $this->prev_data['thumbnail']) {
            //handle thumbnail image
            if (gettype($this->thumbnail) === 'object') {
                $this->thumbnail_img_name = $this->imageHelper->extract_image_names($this->thumbnail);
                Storage::delete('public/images/' . $this->prev_data['thumbnail']);
            }
        }

        //arrange data for insertion
        $this->post_data = [
            'category_id' => $this->category_id,
            'title'       => $this->title,
            'excerpt'     => $this->excerpt,
            'thumbnail'   => $this->thumbnail_img_name ?: $this->prev_data['thumbnail'],
            'content'     => $this->content,
            'images'      => $this->images,
            'vid_link'    => $this->vid_link,
            'status'      => $this->status,
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

                if ($this->thumbnail_img_name) {
                    $this->storeThumbnailImage();
                }
                $this->storeImages();
                $this->imageHelper->del_image_on_db($this->to_delete_image, $this->post_id);
                session()->flash('success', 'Post has been created!');

                $this->resetValidation();
                $this->resetFields();

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
        foreach ($this->images as $imageIndex => $image) {
            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $curr_name = "{$originalName}.{$extension}";

            if (Storage::exists('/public/images/' . $curr_name)) {
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
        if ($this->thumbnail)
            $this->thumbnail->storeAs('/public/images', $this->thumbnail_img_name);
        //        else
        //            $this->to_update_data['thumbnail']->storeAs('/public/images', $this->thumbnail_img_name);
    }

    public function populateImages($images)
    {
        foreach ($images as $value) {
            foreach ($value as $val) {
                $this->images[] = $val;
            }
        }
    }

    public function delete_post(string|int $post_id): bool
    {
        $post = PostModel::findOrFail($post_id);

        $images_to_delete = $post->images()->pluck('image_filename')->toArray();
        // Delete the post and its related images
        if ($post->delete()) {
            foreach ($images_to_delete as $image) {
                if (Storage::exists('/public/images/' . $image)) {
                    Storage::delete('public/images/' . $image);
                }
            }
            return true;
        }
        return false;
    }

    public function insertDeleteImg($data)
    {
        collect(json_decode($data, true))->each(function ($value, $key) {
            $this->to_update_data['images'] = collect($this->to_update_data['images'])->filter(function ($item) use ($value) {
                return !in_array($value, $item);
            })->values()->all();
            $this->to_delete_image[] = $value;
        });
    }

    public function deleteTempImg($data)
    {
        collect(json_decode($data, true))->each(function ($loc1, $loc2) {
            unset($this->temp_images[$loc2][$loc1]);
            if (count($this->temp_images[$loc2]) == 0) {
                unset($this->temp_images[$loc2]);
            }
        });
//        dd($this->temp_images);
    }

    public function updatedImages($variable)
    {
        $this->temp_images[] = $variable;
        $this->images = [];
    }

    public function get_all_categories()
    {
        return PostCategory::all()->toArray();
    }


}
