<?php

namespace App\Http\Livewire\CMS;

use Livewire\Component;
use App\Helpers\AdminLogActivity;
use App\Models\CMS\POST\PostCategory;
use Illuminate\Support\Facades\Validator;

class Category extends Component
{

    public string $category;
    public mixed $myModal;
    public string $search;
    private PostCategory $postCategoryModel;

    public function __construct()
    {
        parent::__construct();
        $this->postCategoryModel = new PostCategory();
    }

    public function mount()
    {
        $this->myModal = null;
        $this->search = '';
    }

    public function create_category(): bool
    {
        $validator = Validator::make([
            'category' => ucfirst($this->category)
        ], [
            'category' => 'required|unique:post_categories,category'
        ], [
            'category.unique' => 'Category is already in used'
        ]);

        if ($validator->fails()) {
            $err_msg = $validator->getMessageBag();
            foreach ($err_msg->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->dispatchBrowserEvent('ValidationCategoryError', $err_msg->getMessages());
            return false;
        }

        $category = $this->postCategoryModel::firstOrNew([
            'category' => ucfirst($this->category)
        ]);

        AdminLogActivity::addToLog("created a category", session()->get('admin_id'));
        if ($category->exists) {
            session()->flash('error', 'Category exist!');
            return false;
        } else {
            $category->save();
            session()->flash('success', 'Category Created!');
            return true;
        }
    }

    public function delete_category(string|int $category_id)
    {
        $category = $this->postCategoryModel::findOrFail($category_id);
        // Delete the post and its related images

        if ($category->delete() > 0) {
            $this->dispatchBrowserEvent('DeleteCategorySuccess', true);
        } else {
            $this->dispatchBrowserEvent('DeleteCategoryFail', true);
        }

        AdminLogActivity::addToLog("deleted a category", session()->get('admin_id'));
        return $category->delete() > 0;
    }


    public function render()
    {
        $cat_data = new PostCategory();
        return view('livewire.cms.category', ['data' => $cat_data->get()])->layout("layouts.layout");
    }
}
