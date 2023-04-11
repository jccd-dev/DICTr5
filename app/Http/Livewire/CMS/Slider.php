<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\CMS\HomeBanner;
use Illuminate\Support\Facades\Storage;

class Slider extends Component
{

    use WithFileUploads;
    /**
     INITIALIZED variable to hold value from the form submit
     */
    public string $title;
    public string $description;
    public $image;
    public string $image_name = '';
    public string $button_links;
    private $banner_model;
    public $banner_data = [];

    //Input validation rules
    protected $rules = [
        'title'        => 'required|word_count:7',
        'description'  => 'required|word_count:20',
        'image'        => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=950,min_height=635',
        'button_links' => 'required',
    ];

    // Custom validation messages
    protected $messages = [
        'button_links.required' => 'This :attribute is required',
        'image.mimes'       => 'Only accept jpg, jpeg, png, bmp, gif, svg, or webp format',
        'image.dimensions'   => 'Image minimum width and height should be 950 x 635 pixels'
    ];


    /**
     * Description: Initialized the HomeBanner Model Class responsible for
     *              CRUD operations connected to database.
     */
    public function __construct() {
        $this->banner_model = new HomeBanner();
    }

    /**
     * Description: Handle the data submitted from the form
     */
    public function submit() {

        //validate Inputs data before inserting to database
        $validatedData = $this->validate();
        $this->storeImage();
        $validatedData['image'] = $this->image_name;

        $this->banner_data = $validatedData;
        //insert image to database

        $this->banner_model->make_banner($validatedData) ? session()->flash('success', 'Slider Banner Created!') : session()->flash('error', 'Please try Again Later!');
    }

    public function storeImage(): void
    {
        if($this->image_name && Storage::exists('/public/images/'.$this->image_name)) {
            Storage::delete('public/images/'.$this->image_name);
        }

        $time = time(); $rand_num = Str::random(8); $extension = $this->image->getClientOriginalExtension();
        $image_name = "{$time}_{$rand_num}.{$extension}";
        $this->image->storeAs('/public/images', $image_name);

        $this->image_name = $image_name;
    }

    public function render()
    {
        return view('livewire.cms.slider', ['formData' => $this->banner_data]);
    }
}
