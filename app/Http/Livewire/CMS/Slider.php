<?php

namespace App\Http\Livewire\CMS;

use Livewire\Component;
use mysql_xdevapi\Session;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\CMS\HomeBanner;
use App\Helpers\AdminLogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class Slider extends Component
{

    use WithFileUploads;
    /**
     INITIALIZED variable to hold value from the form submit
     */
    public $myModal;
    public $displayFormat;
    public $updateModal;
    public string $title = "";
    public $description = "";
    public $image = null;
    public string $image_name = '';
    public string $button_links = "";
    public $temp_image;
    private $banner_model;
    private $banner_id = null;
    private $banner_data = [];
    public int $updateID = 0;
    public int $content = 0;

    public string $search;
    public mixed $to = null;
    public mixed $from = null;

    protected $except = ['myModal'];

    //Input validation rules
    protected $rules = [
        'title'        => 'required|word_count:7',
        'description'  => 'required|word_count:20',
        'image'        => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:8192|dimensions:min_width=940,min_height=635',
        'button_links' => 'required|regex:/https/',
    ];
    protected $rulesUpdate = [
        'title'        => 'required|word_count:7',
        'description'  => 'required|word_count:20',
        'image'        => 'required|string',
        'button_links' => 'required|regex:/https/',
    ];

    // Custom validation messages
    protected $messages = [
        'button_links.required' => 'This :attribute is required',
        'image.mimes'       => 'Only accept jpg, jpeg, png, bmp, gif, svg, or webp format',
        'image.dimensions'   => 'Image minimum width and height should be 950 x 635 pixels'
    ];

    public function mount()
    {
        $this->banner_model = new HomeBanner();
        $this->title = "";
        $this->content = 0;
        $this->description = "";
        $this->image = null;
        $this->button_links = "";
        $this->search = "";
        $this->to = null;
        $this->from = null;
    }

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->banner_model = new HomeBanner();
    }

    /**
     * TITLE: SUBMIT
     * Description: Handle the data submitted from the form
     * @return \Session (flash session) use for to display message to user.
     */
    public function submit(): void
    {
        $this->resetValidation();
        //validate Inputs data before inserting to database
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
                    $this->addError($field, $message);
                }
            }
            $this->dispatchBrowserEvent('ValidationError', $err_msgs->getMessages());
        } else {
            try{
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
                $this->dispatchBrowserEvent('ValidationSuccess', true);
                AdminLogActivity::addToLog("created a banner", session()->get('admin_id'));
            } catch(\Illuminate\Database\QueryException $e) {

                $message = 'Invalid text. Change Font Style to regular';
                if(strpos($e->getMessage(), 'title')) {
                    $this->addError('title', $message);
                    $this->dispatchBrowserEvent('ValidationError', ['title' => $message]);
                }
                else if(strpos($e->getMessage(), 'description')) {

                    $this->addError('description', $message);
                    $this->dispatchBrowserEvent('ValidationError', ['description' => $message]);
                }
            }
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
    public function update_banner(string|int $banner_id): void
    {
        $this->resetValidation();
        //validate Inputs data before inserting to database
        if ($this->image) {
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
                        $this->addError($field, $message);
                    }
                }
                $this->dispatchBrowserEvent('UpdateSliderFailed', $err_msgs->getMessages());
            } else {
                try{
                    //get the prev banner data (image name and id)
                    $banner_data = $this->banner_model->get_banner($banner_id);
                    $this->image_name = $banner_data->image;
                    $this->banner_id = $banner_data->id;

                    $validatedData = [
                        'title'       => $this->title,
                        'description'     => $this->description,
                        'button_links'      => $this->button_links,
                        'content_toggler'      => $this->content,
                    ];

                    //save image into the designated folder in the server
                    $this->storeImage();
                    $validatedData['image'] = $this->image_name;

                    //inert or save into database
                    $this->banner_data = $validatedData;
                    if ($this->banner_model->update_banner($validatedData, $this->banner_id)) {
                        $this->dispatchBrowserEvent('UpdateSliderSuccess', true);
                        session()->flash('success', 'Slider Banner Created!');
                        AdminLogActivity::addToLog("updated banner", session()->get('admin_id'));
                    } else {
                        $this->dispatchBrowserEvent('UpdateSliderFailed', true);
                        session()->flash('error', 'Please try Again Later!');
                    }
                } catch(\Illuminate\Database\QueryException $e) {

                    $message = 'Invalid text. Change Font Style to regular';
                    if(strpos($e->getMessage(), 'title')) {
                        $this->addError('title', $message);
                        $this->dispatchBrowserEvent('ValidationError', ['title' => $message]);
                    }
                    else if(strpos($e->getMessage(), 'description')) {

                        $this->addError('description', $message);
                        $this->dispatchBrowserEvent('ValidationError', ['description' => $message]);
                    }
                }
            }
        } else {
            $validator = Validator::make([
                'title'       => $this->title,
                'description'     => $this->description,
                'image'     => $this->temp_image,
                'button_links'      => $this->button_links,
            ], $this->rulesUpdate);

            if ($validator->fails()) {
                $err_msgs = $validator->getMessageBag();
                foreach ($err_msgs->getMessages() as $field => $messages) {
                    foreach ($messages as $message) {
                        $this->addError($field, $message);
                    }
                }
                $this->dispatchBrowserEvent('UpdateSliderFailed', $err_msgs->getMessages());
            } else {
                try{
                    $validatedData = [
                        'title'       => $this->title,
                        'description'     => $this->description,
                        'button_links'      => $this->button_links,
                        'content_toggler'      => $this->content,
                    ];

                    //get the prev banner data (image name and id)
                    $banner_data = $this->banner_model->get_banner($banner_id);
                    $this->image_name = $banner_data->image;
                    $this->banner_id = $banner_data->id;

                    //save image into the designated folder in the server
                    $validatedData['image'] = $this->temp_image;

                    //inert or save into database
                    $this->banner_data = $validatedData;
                    if ($this->banner_model->update_banner($validatedData, $this->banner_id)) {
                        $this->dispatchBrowserEvent('UpdateSliderSuccess', true);
                        session()->flash('success', 'Slider Banner Created!');
                        AdminLogActivity::addToLog("updated banner", session()->get('admin_id'));
                    } else {
                        $this->dispatchBrowserEvent('UpdateSliderFailed', ["" => $validatedData]);
                        session()->flash('error', 'Please try Again Later!');
                    }
                } catch(\Illuminate\Database\QueryException $e) {

                    $message = 'Invalid text. Change Font Style to regular';
                    if(strpos($e->getMessage(), 'title')) {
                        $this->addError('title', $message);
                        $this->dispatchBrowserEvent('ValidationError', ['title' => $message]);
                    }
                    else if(strpos($e->getMessage(), 'description')) {

                        $this->addError('description', $message);
                        $this->dispatchBrowserEvent('ValidationError', ['description' => $message]);
                    }
                }
            }
        }
    }

    public function get_banner_data(int $id)
    {
        $data = $this->banner_model->get_banner($id);
        $this->title = $data->title;
        $this->description = $data->description;
        $this->button_links = $data->button_links;
        $this->temp_image = $data->image;
        $this->content = $data->content_toggler;
    }

    /**
     * @param string|int $banner_id
     * @return bool
     */
    public function delete_banner(string|int $banner_id): bool
    {
        $banner = HomeBanner::find($banner_id);

        if ($this->banner_model->delete_banner($banner_id)) {
            if (Storage::exists('/public/images/' . $banner->image)) {
                Storage::delete('public/images/' . $banner->image);
            }

            $this->dispatchBrowserEvent('DeleteSliderSuccess', true);
            return true;
        }
        $this->dispatchBrowserEvent('DeleteSliderFailed', true);
        return false;
    }

    public function search_post(): Collection|array
    {
        $banner_model = $this->banner_model::query();

        $search_term = $this->search;
        $current = date('Y-m-d', strtotime('now'));
        $to_date = $this->to;

        if (!$search_term == '') {
            $banner_model = $banner_model->where(function ($query) use ($search_term) {
                $query->where('title', 'like', '%' . $search_term . '%')
                    ->orWhere('description', 'like', '%' . $search_term . '%');
            });
            //return $banner_model->with('images')->get();
        }

        if ($this->from != null) {
            if (is_null($to_date)) {
                $from = date('Y-m-d', strtotime($this->from));
                $banner_model = $banner_model->whereDate('timestamp', '>=', $from)
                    ->whereDate('timestamp', '<=', $current);
            }
        }

        if ($this->from != null && !is_null($to_date)) {
            $from = date('Y-m-d', strtotime($this->from));
            $to_date = date('Y-m-d', strtotime($to_date));
            $banner_model = $banner_model->whereDate('timestamp', '>=', $from)
                ->whereDate('timestamp', '<=', $to_date);
        }

        return $banner_model->get();
    }

    public function render()
    {
        $data = $this->search_post();
        return view('livewire.cms.slider', ['formData' => $this->banner_data, 'data' => $data])->layout("layouts.layout");
    }
}
