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
    public $updateAnnArray = [];
    public $isPublished;
    public $isUpdatedPublished;
    public $to_update_id;

    protected $listeners = ['delete' => 'delete_announcement'];

    public function render(){
        $announcementModel = new AnnouncementModel();
        $postCategoryModel = new PostCategoryModel();
        return view('livewire.cms.announcements', [
                        'announcements' => $announcementModel->filter_search($this->from, date('Y-m-d', strtotime($this->to.' +1 day')), $this->category, $this->search), 
                        'categories' => $postCategoryModel->all()
                    ])
                ->layout('livewire.layout.laravel_layout');
    }

    public function mount(): void{
        $this->category = 0;

        $date_from = AnnouncementModel::select(DB::raw('MIN(timestamp) as min_timestamp'))->first();
        $this->from = date('Y-m-d', strtotime($date_from->min_timestamp));
        $date_to = AnnouncementModel::select(DB::raw('MAX(timestamp) as max_timestamp'))->first();
        $this->to = date('Y-m-d', strtotime($date_to->max_timestamp));

    }

    public function resetSearch(): void{
        $this->search = '';
    }

    public function updatingFrom(): void{
        $this->resetSearch();
    }

    public function updatingTo(): void{
        $this->resetSearch();
    }

    public function updatingCategory(): void{
        $this->resetSearch();
    }

    public function create_announcement(): void{
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

    public function to_update_announcement($id): void{
        $this->to_update_id = $id;
        $announcementModel = new AnnouncementModel();
        $ann = $announcementModel->get_announcement($id);
        $this->updateAnnArray['title'] = $ann->title;
        $this->updateAnnArray['excerpt'] = $ann->excerpt;
        $this->updateAnnArray['cat_id'] = $ann->cat_id;
        $this->isUpdatedPublished = ($ann->status == 'Published') ? true : false;
        $this->dispatchBrowserEvent('update_content', $ann->content);
    }

    public function update_announcement(): void{
        Validator::make($this->updateAnnArray, [
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

        if($this->isUpdatedPublished){
            $this->updateAnnArray['status'] = 'Published';
        }else{
            $this->updateAnnArray['status'] = 'Unpublished';
        }

        // TODO: get admin id
        $this->updateAnnArray['author'] = 1;
        
        $announcementModel = new AnnouncementModel();
        $ann = $announcementModel->update_announcement($this->updateAnnArray, $this->to_update_id);
        if($ann){
            $this->dispatchBrowserEvent('SuccessfullyUpdatedAnnouncement', true);
        }else{
            $this->dispatchBrowserEvent('UnsuccessfullyUpdatedAnnouncement', true);
        }
    }

    public function delete_announcement($id): void{
        $ann = AnnouncementModel::find($id);
        $deletedRows = $ann->delete();
    }

}
