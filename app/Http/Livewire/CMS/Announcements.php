<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Helpers\GetAdmin;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Helpers\AdminLogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\CMS\Announcement as AnnouncementModel;
use App\Models\CMS\POST\PostCategory as PostCategoryModel;

class Announcements extends Component
{
    use WithPagination;
    use Actions;

    public $search = '';
    public $from = '';
    public $to = '';
    public $category;
    public $insertAnnArray = [];
    public $updateAnnArray = [];
    public $statuses = [];
    public $isPublished;
    public $isUpdatedPublished;
    public $to_update_id;

    public array $admin_data = [];

    protected $listeners = ['delete' => 'delete_announcement'];

    public function render(){
        if (Auth::check()) {
            // User is authenticated, retrieve the authenticated user
            $user = Auth::user();
            // Access the 'role' property
            $this->admin_data = [
                'id'   => $user->id,
                'name' => $user->name,

            ];
        }

        $announcementModel = new AnnouncementModel();
        $postCategoryModel = new PostCategoryModel();
        return view('livewire.cms.announcements', [
            'announcements' => $this->filter_search($this->from,
            date('Y-m-d', strtotime($this->to.' +1 day')),
            $this->category, $this->search),
            'categories' => $postCategoryModel->all()
        ])->layout('layouts.layout');
    }

    public function mount(): void{
        date_default_timezone_set('Asia/Manila');
        $this->category = 0;

        $date_from = AnnouncementModel::select(DB::raw('MIN(start_duration) as min_timestamp'))->first();
        $this->from = date('Y-m-d', strtotime($date_from->min_timestamp));
        $date_to = AnnouncementModel::select(DB::raw('MAX(end_duration) as max_timestamp'))->first();
        $this->to = date('Y-m-d', strtotime($date_to->max_timestamp));

        $this->insertAnnArray['start_duration'] = date('Y-m-d H:i:s');
        $this->insertAnnArray['end_duration'] = '';
        $this->insertAnnArray['cat_id'] = '';

        $this->updateAnnArray['cat_id'] = '';
        $this->updateAnnArray['start_duration'] = '';
        $this->updateAnnArray['end_duration'] = '';
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
            'excerpt' => 'required|max:150',
            'content' => 'required',
            'cat_id' => 'required',
            'start_duration' => 'required',
            'end_duration' => 'required',
        ],[
            'title.required' => 'Announcement title field is required',
            'excerpt.required' => 'Short description field is required',
            'content.required' => 'Content field is required',
            'cat_id.required' => 'Category field is required',
            'start_duration.required' => 'Start Date field is required',
            'end_duration.required' => 'End Date field is required',
        ])->validate();

        if($this->isPublished){
            $this->insertAnnArray['status'] = 1;
        }else{
            $this->insertAnnArray['status'] = 0;
        }

        $this->insertAnnArray['admin_id'] = $this->admin_data['id'];
        $this->insertAnnArray['author'] = $this->admin_data['name'];

        $announcementModel = new AnnouncementModel();
        if($announcementModel->create_announcement($this->insertAnnArray)){
            $this->dispatchBrowserEvent('SuccessfullyCreatedAnnouncement', true);
        }else{
            $this->dispatchBrowserEvent('UnsuccessfullyCreatedAnnouncement', true);
        }

        $this->insertAnnArray = [];
        AdminLogActivity::addToLog("created announcement", session()->get('admin_id'));

    }

    public function to_update_announcement($id): void{
        $this->to_update_id = $id;
        $announcementModel = new AnnouncementModel();
        $ann = $announcementModel->get_announcement($id);
        $this->updateAnnArray['title'] = $ann->title;
        $this->updateAnnArray['excerpt'] = $ann->excerpt;
        $this->updateAnnArray['cat_id'] = $ann->cat_id;
        $this->updateAnnArray['start_duration'] = $ann->start_duration;
        $this->updateAnnArray['end_duration'] = $ann->end_duration;
        $this->isUpdatedPublished = $ann->status;
        $this->dispatchBrowserEvent('update_content', $ann->content);
        $this->showModal('update_modal', true);
    }

    public function update_announcement(): void{
        Validator::make($this->updateAnnArray, [
            'title' => 'required',
            'excerpt' => 'required|max:150',
            'content' => 'required',
            'cat_id' => 'required',
        ],[
            'title.required' => 'Announcement title field is required',
            'excerpt.required' => 'Short description field is required',
            'content.required' => 'Content field is required',
            'cat_id.required' => 'Category field is required',
        ])->validate();

        if($this->isUpdatedPublished){
            $this->updateAnnArray['status'] = 1;
        }else{
            $this->updateAnnArray['status'] = 0;
        }


        $this->showModal('update_modal', false);

        $announcementModel = new AnnouncementModel();
        $ann = $announcementModel->update_announcement($this->updateAnnArray, $this->to_update_id);
        if($ann){
            $this->dispatchBrowserEvent('SuccessfullyUpdatedAnnouncement', true);
        }else{
            $this->dispatchBrowserEvent('UnsuccessfullyUpdatedAnnouncement', true);
        }

        AdminLogActivity::addToLog("updated announcement", session()->get('admin_id'));
    }

    public function delete_announcement($id): void{
        $ann = AnnouncementModel::find($id);
        $deletedRows = $ann->delete();
        AdminLogActivity::addToLog("deleted announcement", session()->get('admin_id'));
    }

    public function create_category($category){
        $created_category = PostCategoryModel::create([
            'category' => $category
        ]);
        $this->insertAnnArray['cat_id'] = $created_category->id;
        $this->updateAnnArray['cat_id'] = $created_category->id;

        AdminLogActivity::addToLog("created category", session()->get('admin_id'));
    }

    public $create_modal = false;
    public $update_modal = false;
    public function showModal($id, $isOpen){
        if($id == 'create_modal')
            $this->create_modal = $isOpen;
        elseif($id == 'update_modal')
            $this->update_modal = $isOpen;
    }

    // For Pagination
    public function filter_search(string|null $from, string|null $to, int $category = null, string $search = null){
        if($from == null || $to == null){
            return AnnouncementModel::join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                ->orderBy('announcements.start_duration', 'desc')
                ->paginate(10);
        }
        if($search == null || $search == ''){
            if($category == null || $category == 0)
                return AnnouncementModel::join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                    ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                    ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                    ->where('announcements.start_duration', '<=', $to)
                    ->where('announcements.end_duration', '>=', $from)
                    ->orderBy('announcements.start_duration', 'asc')
                    ->paginate(10);
            else
                return AnnouncementModel::join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                    ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                    ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                    ->where('announcements.start_duration', '<=', $to)
                    ->where('announcements.end_duration', '>=', $from)
                    ->where('announcements.cat_id', $category)
                    ->orderBy('announcements.start_duration', 'asc')
                    ->paginate(10);
        }else{
            return AnnouncementModel::join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                ->where('announcements.title', 'like', '%'.$search.'%')
                ->orWhere('announcements.excerpt', 'like', '%'.$search.'%')
                ->orWhere('announcements.content', 'like', '%'.$search.'%')
                ->orWhere('post_categories.category', 'like', '%'.$search.'%')
                ->orderBy('announcements.start_duration', 'desc')
                ->paginate(10);
        }
    }

    public function change_status($id, $status){
        $announcement = AnnouncementModel::find($id);
        if($status){
            $announcement->status = 1;
        }else{
            $announcement->status = 0;
        }
        $announcement->save();
        $this->notification()->success(
            $title = 'Status Update',
            $description = 'Announcement Status has been updated'
        );
    }

}
