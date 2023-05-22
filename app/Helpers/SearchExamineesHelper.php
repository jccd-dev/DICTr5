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
                    $query->where('school_attended', 'like', '%'.$searchValue.'%');
                })
                ->orWhereHas('addresses', function ($query) use ($searchValue){
                    $query->where('province', 'like', '%'.$searchValue.'%')
                        ->orWhere('municipality', 'like', '%'.$searchValue.'%')
                        ->orWhere('barangay', 'like', '%'.$searchValue.'%');
                });
            })
            ->when($searchValues['curr_status'], function ($query, $currStatusValue){
                $query->where('current_status', $currStatusValue);
            })
            ->when($searchValues['applicant'], function ($query, $applicantValue){
                if($applicantValue == 1){
                    $query->where('user_login_id', '!=', null);
                }
                else{
                    $query->where('user_login_id', '=', null);
                }
            })
            // related tables
            ->with('tertiaryEdu', 'addresses', 'regDetails')
            ->orderBy('timestamp', $searchValues['order_by'])
            ->paginate(20);
    }
}
