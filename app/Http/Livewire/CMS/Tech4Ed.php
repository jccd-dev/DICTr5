<?php

namespace App\Http\Livewire\CMS;

use Livewire\Component;
use App\Helpers\AdminLogActivity;
use App\Models\CMS\Tech4EdModel;
use Illuminate\Support\Facades\Validator;

class Tech4Ed extends Component
{
    public string $course;

    public string $search;
    public mixed $myModal;

    public function mount()
    {
        $this->myModal = null;
        $this->search = '';
    }

    public function create_course(): bool
    {
        $validator = Validator::make([
            'course' => ucfirst($this->course)
        ], [
            'course' => 'required'
        ], [
            'course.unique' => 'course is already exist'
        ]);

        if ($validator->fails()) {
            $err_msg = $validator->getMessageBag();
            foreach ($err_msg->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->dispatchBrowserEvent('ValidationCourseError', $err_msg->getMessages());
            return false;
        }

        $course = Tech4EdModel::firstOrNew([
            'courses' => ucfirst($this->course)
        ]);

        AdminLogActivity::addToLog("created a course", session()->get('admin_id'));
        if ($course->exists) {
            session()->flash('error', 'course exist!');
            return false;
        } else {
            $course->save();
            session()->flash('success', 'course Created!');
            return true;
        }
    }

    public function delete_course(string|int $course_id)
    {
        $course = Tech4EdModel::findOrFail($course_id);
        // Delete the post and its related images

        if ($course->delete() > 0) {
            $this->dispatchBrowserEvent('DeleteCourseSuccess', true);
        } else {
            $this->dispatchBrowserEvent('DeleteCourseFail', true);
        }

        AdminLogActivity::addToLog("deleted a course", session()->get('admin_id'));
        return $course->delete() > 0;
    }


    public function render()
    {
        $cat_data = new Tech4EdModel();
        return view('livewire.cms.tech4ed', ['data' => $cat_data->get()])->layout("layouts.layout");
    }

}
