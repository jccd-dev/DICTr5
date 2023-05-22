<?php

namespace App\Helpers;
use App\Models\Examinee\UsersData;

class SearchExamineesHelper
{
    public static function search_with_cache($searchValues){

       return UsersData::query()
            ->when($searchValues['gender'], function ($query, $genderValue){
                $query->where('gender', $genderValue);
            })
            ->when($searchValues['reg_status'], function ($query, $statusValue){
                $query->whereHas('regDetails', function ($query) use ($statusValue){
                    $query->where('status', $statusValue);
                });
            })
            ->when($searchValues['is_applied'], function ($query, $applyValue){
                $query->whereHas('regDetails', function ($query) use ($applyValue){
                    $query->where('apply', $applyValue);
                });
            })
            ->when($searchValues['search_text'], function($query, $searchValue){
                $query->where(function ($query) use ($searchValue){
                    $query->where('fname', 'like', '%'.$searchValue.'%')
                        ->orWhere('lname', 'like', '%'.$searchValue.'%')
                        ->orWhere('designation', 'like', '%'.$searchValue.'%');
                })
                ->orWhereHas('tertiaryEdu', function ($query) use ($searchValue){
                    $query->where('degree', 'like', '%'.$searchValue.'%');
                });
            })
            ->when($searchValues['curr_status'], function ($query, $currStatusValue){
                $query->where('current_status', $currStatusValue);
            })
            //parent closure, with reference value
            ->when($searchValues['municipality'], function ($query, $municipalityValue){
                // nested closure, capture the reference value from parent
                $query->whereHas('addresses', function ($query) use ($municipalityValue){
                    $query->where('municipality', $municipalityValue);
                });
            })
            // related tables
            ->with('tertiaryEdu', 'addresses', 'regDetails')
            ->orderBy('timestamp', $searchValues['order_by'])
            ->paginate(20);
    }
}
