<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\CMS\HomeBanner;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Session;

class Slider extends Component
{

    use WithFileUploads;
    /**
     INITIALIZED variable to hold value from the form submit
     */
    public $myModal;
    public $updateModal;
    public string $title;
    public $description;
    public $image;
    public $displayFormat;
    public string $image_name = '';
    public string $button_links;
    private $banner_model;
    private $banner_id = null;
    private $banner_data = [];

    protected $except = ['myModal'];

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

    public function __construct()
    {
        parent::__construct();
        $this->banner_model = new HomeBanner();
    }

    /**
     * TITLE: SUBMIT
     * Description: Handle the data submitted from the form
     * @return \Session (flash session) use for to display message to user.
     */
    public function submit():void
    {
//        dd(1);
        //validate Inputs data before inserting to database
//        $validatedData = $this->validate();
        $validator = Validator::make([
            'title'       => $this->title,
            'description'     => $this->description,
            'image'     => $this->image,
            'button_links'      => $this->button_links,
        ], $this->rules);

        if ($validator->fails()) {
            $err_msgs = $validator->getMessageBag();
            foreach ($err_msgs->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError('update.' . $field, $message);
                }
            }
            $this->dispatchBrowserEvent('ValidationError', $err_msgs->getMessages());
        } else {
            $this->dispatchBrowserEvent('ValidationSuccess', true);
            $this->storeImage();

            $validatedData = [
                'title'       => $this->title,
                'description'     => $this->description,
                'image'     => $this->image,
                'button_links'      => $this->button_links,
            ];
            $validatedData['image'] = $this->image_name;
            $this->banner_data = $validatedData;
            $this->banner_model->make_banner($validatedData) ? session()->flash('success', 'Slider Banner Created!') : session()->flash('error', 'Please try Again Later!');
        }
        //insert data into database
    }

    /**
     * Description: Store the image file in the designated folder in the server
     */
    public function storeImage(): void
    {
        //delete the old image when it updated
        if ($this->image_name && Storage::exists('/public/images/' . $this->image_name)) {
            Storage::delete('public/images/' . $this->image_name);
        }

        $time = time();
        $rand_num = Str::random(8);
        $extension = $this->image->getClientOriginalExtension();

        $image_name = "{$time}_{$rand_num}.{$extension}";
        $this->image->storeAs('/public/images', $image_name);

        $this->image_name = $image_name;
    }

    /**
     * TITLE: UPDATE BANNER
     * Description: Update specific banner identified using its unique ID
     *              to database.
     * @param string|int $banner_id unique identification for every slider banner
     * @return \Session (flash session) use for to display message to user.
     */
    public function update_banner(string|int $banner_id) :void
    {
        //validate Inputs data before inserting to database
        $validatedData = $this->validate();

        //get the prev banner data (image name and id)
        $banner_data = $this->banner_model->get_banner($banner_id);
        $this->image_name = $banner_data->image;
        $this->banner_id = $banner_data->id;

        //save image into the designated folder in the server
        $this->storeImage();
        $validatedData['image'] = $this->image_name;

        //inert or save into database
        $this->banner_data = $validatedData;
        $this->banner_model->update_banner($validatedData, $this->banner_id) ? session()->flash('success', 'Slider Banner Created!') : session()->flash('error', 'Please try Again Later!');
    }

    /**
     * @param string|int $banner_id
     * @return bool
     */
    public function delete_banner(string|int $banner_id): bool
    {
        $banner = HomeBanner::find($banner_id);

        if($this->banner_model->delete_banner($banner_id)){
            if (Storage::exists('/public/images/' . $banner->image)) {
                Storage::delete('public/images/' . $banner->image);
            }

            return true;
        }
        return false;
    }

    public function render()
    {
<<<<<<< HEAD
        $data = DB::table('banner')->get();
        return view('livewire.cms.slider', ['formData' => $this->banner_data, 'data' => $data])->layout("layouts.layout");
=======
        // testing
        $data = new HomeBanner();
        return view('livewire.cms.slider', ['formData' => $data->get_banner(5)])->layout("layouts.layout");
>>>>>>> f50f6505b564fc7b38d363d128732af8a17119a4
    }
}
