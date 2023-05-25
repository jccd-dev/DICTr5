<?php

namespace App\Http\Livewire\Admin;

use App\Models\CMS\Feedback;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Inbox extends Component
{
    use Actions;
    use WithPagination;
    // Content can be 1 or 2.
    // Content 1 is for Feedback
    // Content 2 is for Tech4Ed Request
    // Content 3 is for Sent Emails
    public $content = 1;
    public $search;

    // FOR FEEDBACK
    public $feedbackContent;
    public $onReadFeedback;
    public $toDeleteFeedback = 0;
    public bool $feedback_modal;

    public function render()
    {
        if($this->content == 1) {
            $data = [
                'feedbacks' => Feedback::where('is_tech4ed', 0)
                    ->where('is_archived', 0)
                    ->where(fn($query) => $query
                        ->where('content', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('name', 'like', '%' . $this->search . '%')
                    )
                    ->orderByDesc('timestamp')
                    ->paginate(5)
            ];
        }elseif ($this->content == 2){
            $data = [
                'tech4ed_requests' => Feedback::where('is_tech4ed', 1)
                    ->where('is_archived', 0)
                    ->where(fn($query) => $query
                        ->where('content', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('organization', 'like', '%' . $this->search . '%')
                        ->orWhere('tech4ed_course_training', 'like', '%' . $this->search . '%')
                    )
                    ->orderByDesc('timestamp')
                    ->paginate(5)
            ];
        }else{
            $data = [];

        }
        return view('livewire.admin.inbox', $data)
            ->layout('layouts.layout');
    }

    public function mount(){
        $this->feedbackContent = '';
        $this->onReadFeedback = 0;
        $this->feedback_modal = false;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    // Called when content changes
    public function changeContent($content){
        $this->content = $content;
        $this->search = '';
        $this->resetPage();
    }

    // In opening feedback messages
    public function openFeedback($id){
        $feedback =  Feedback::find($id);
        $this->feedbackContent = $feedback->content;
        $feedback->is_read = true;
        $feedback->save();
        $this->onReadFeedback = $id;
    }

    // trigger when delete icon is clicked
    public function prepare_to_delete($id){
        $this->toDeleteFeedback = $id;
        $this->feedback_modal = true;
    }

    // Delete feedback
    public function delete_feedback(){
        $this->feedback_modal = false;
        $feedback = Feedback::find($this->toDeleteFeedback);
        $feedback->is_archived = 1;
        $feedback->save();
        $this->notification()->success(
            $title = 'Feedback Deleted',
            $description = 'Successfully archived the feedback'
        );
    }
    //FOR SENT EMAILS
    // ...
}
