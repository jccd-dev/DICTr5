<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS\POST\PostCategory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ApiController extends Controller
{
    public function request_category(Request $request): collection{
        return PostCategory::query()
            ->select('id', 'category')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('category', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }

    // public function create_new(Request $request){
    //     $category = PostCategory::create([
    //         'category' => $request->category
    //     ]);
        
    // }
}
