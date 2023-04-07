<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\CMS\Announcement as AnnouncementModel;
use App\Models\CMS\PostCategory as PostCategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Announcements extends Component
{
    public $search = '';
    public $from = '';
    public $to = '';
    public $category;
    public $insertAnnArray = [];
    public $isPublished;

    public function render(){
        $announcementModel = new AnnouncementModel();
        $postCategoryModel = new PostCategoryModel();
        return view('livewire.cms.announcements', [
                        'announcements' => $announcementModel->filter_search($this->from, date('Y-m-d', strtotime($this->to.' +1 day')), $this->category, $this->search), 
                        'categories' => $postCategoryModel->all()
                    ])
                ->layout('livewire.layout.laravel_layout');
    }

    public function mount(){
        $this->category = 0;

        $date_from = AnnouncementModel::select(DB::raw('MIN(timestamp) as min_timestamp'))->first();
        $this->from = date('Y-m-d', strtotime($date_from->min_timestamp));
        $date_to = AnnouncementModel::select(DB::raw('MAX(timestamp) as max_timestamp'))->first();
        $this->to = date('Y-m-d', strtotime($date_to->max_timestamp));
    }

    public function resetSearch(){
        $this->search = '';
    }

    public function updatingFrom(){
        $this->resetSearch();
    }

    public function updatingTo(){
        $this->resetSearch();
    }

    public function updatingCategory(){
        $this->resetSearch();
    }

    public function create_announcement(){
        Validator::make($this->insertAnnArray, [
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'cat_id' => 'required',
        ],[
            'title.required' => 'Announcement title field is required',
            'excerpt.required' => 'Short description field is required',
            'content.required' => 'Content field is required',
            'cat_id.required' => 'Category field is required',
        ])->validate();

        if($this->isPublished){
            $this->insertAnnArray['status'] = 'Published';
        }else{
            $this->insertAnnArray['status'] = 'Unpublished';
        }

        // TODO: get admin id
        $this->insertAnnArray['author'] = 1;

        $announcementModel = new AnnouncementModel();
        if($announcementModel->create_announcement($this->insertAnnArray)){
            $this->dispatchBrowserEvent('SuccessfullyCreatedAnnouncement', true);
        }else{
            $this->dispatchBrowserEvent('UnsuccessfullyCreatedAnnouncement', true);
        }

        $this->insertAnnArray = [];

    }

}
