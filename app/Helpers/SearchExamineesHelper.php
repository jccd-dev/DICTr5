<?php

namespace App\Helpers;
use App\Models\Examinee\UsersData;

class SearchExamineesHelper
{
    public static function search_with_cache($searchValues){

       return UsersData::query()
            ->when($searchValues['retake'], function ($query, $retakeValue){
                $query->where('is_retaker', $retakeValue);
            })
            ->when($searchValues['reg_status'], function ($query, $statusValue){
                $query->whereHas('regDetails', function ($query) use ($statusValue){
                    $query->where('status', $statusValue);
                });
            })
            ->when($searchValues['is_applied'], function ($query, $applyValue){
                if($applyValue == 1){
                    $query->whereHas('regDetails', function ($query) use ($applyValue){
                        $query->where('apply', $applyValue);
                    });
                }
                else{
                    $query->whereHas('regDetails', function ($query) use ($applyValue){
                        $query->where('apply', $applyValue);
                    })->orWhereDoesntHave('regDetails');
                }

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
            ->with('tertiaryEdu', 'addresses', 'regDetails', 'userLogin', 'userHistoryLatest')
            // use this one to filder by order the user by appproved_date if statatus is
            // 4 => approved || 5 => scheduled for exam || 6 => waiting for result.
            // else it is order by timestamp when the registered
            ->orderByRaw("(CASE WHEN (SELECT `status` FROM `reg_details` WHERE `reg_details`.`user_id` = `users_data`.`id`) IN (4, 5, 6) THEN (SELECT `approved_date` FROM `reg_details` WHERE `reg_details`.`user_id` = `users_data`.`id`) END) {$searchValues['order_by']}, timestamp {$searchValues['order_by']}")
            ->paginate(20);
    }
}
