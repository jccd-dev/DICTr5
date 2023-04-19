<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\CMS\POST\PostCategory;

class Category extends Component
{

    public string $category;
    private PostCategory $postCategoryModel;

    public function __construct() {
        $this->postCategoryModel = new PostCategory();
    }

    public function create_category() :bool {
        $validator = Validator::make([
            'category' => ucfirst($this->category)
        ],[
            'category' => 'required|unique:post_categories,category'
        ], [
            'category.unique' => 'Category is already in used'
        ]);

        if ($validator->fails()) {
            $err_msg = $validator->getMessageBag();
            $this->dispatchBrowserEvent('validation-errors', $err_msg->getMessages());
            return false;
        }

        $category = $this->postCategoryModel::firstOrCreate(
            [
                'category' => ucfirst($this->category)
            ]);

        if ($category) {
            //the category is already used.
            session()->flash('error', 'Category Not inserted!');
            return false;
        }

        session()->flash('success', 'Category Created!');
        return true;

    }

    public function delete_category (string|int $category_id){
        $category = $this->postCategoryModel::findOrFail($category_id);
        // Delete the post and its related images
        return $category->delete() > 0;
    }


    public function render()
    {
        return view('livewire.cms.category');
    }
}
