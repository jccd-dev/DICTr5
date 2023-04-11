<?php

namespace App\Http\Livewire\Cms;

use App\Models\CMS\HomeBanner;
use Livewire\Component;
use Livewire\WithFileUploads;

class Slider extends Component
{

    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $button_links;
    private $bannerModel;

    //Input validation rules
    protected $rules = [
        'title'        => 'required|wordC:7',
        'description'  => 'required|wordC:50',
        'image'        => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|size:8192|dimensions:min_width=950,min_height=635',
        'button_links' => 'required',
    ];

    // Custom validation messages
    protected $message = [
        'title.wordC'       => 'The recommended word count for title is less than :wordC',
        'description.wordC' => 'The recommended word count for description is less than :wordC',
        'image.mimes'       => 'Only accept jpg, jpeg, png, bmp, gif, svg, or webp format',
        'image.dimension'   => 'Image minimum width and height should be 950 x 635 pixels'
    ];


    /**
     * Description: Initialized the HomeBanner Model Class responsible for
     *              CRUD operations connected to database.
     */
    public function __construct() {
        $this->bannerModel = new HomeBanner();
    }

    /**
     * Description: Handle the data submitted from the form
     */
    public function submit() {

        //validate Inputs data before inserting to database
        //$validatedData = $this->validate();
        dd(['title' => $this->title, 'description' => $this->description, 'image' => $this->image, 'button_links' => $this->button_links]);
        //return response()->json($validatedData);
    }

    public function render()
    {
        return view('livewire.cms.slider');
    }
}
