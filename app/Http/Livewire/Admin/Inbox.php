<?php

namespace App\Http\Livewire\Admin;

use App\Models\CMS\Feedback;
use Livewire\Component;
use Livewire\WithPagination;

class Inbox extends Component
{
    use WithPagination;
    // Content can be 1 or 2.
    // Content 1 is for Feedback
    // Content 2 is for Sent Emails
    public $content = 1;
    public $search;

    // FOR FEEDBACK
    public $feedbackContent;
    public $onReadFeedback;

    public function render()
    {
        if($this->content == 1){
            $data = [
                'feedbacks' => Feedback::where('content', 'like', '%'.$this->search.'%')
                                    ->orWhere('email', 'like', '%'.$this->search.'%')
                                    ->orderByDesc('timestamp')
                                    ->paginate(5)
            ];
        }else{
            $data = [];

        }
        return view('livewire.admin.inbox', $data)
            ->layout('livewire.layout.laravel_layout');
    }
    
    public function mount(){
        $this->feedbackContent = '';
        $this->onReadFeedback = 0;
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

    //FOR SENT EMAILS
    // ...
}
