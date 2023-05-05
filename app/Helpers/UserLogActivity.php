<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Models\Examinee\UserLogs;

class UserLogActivity{

    /**
     * TITLE: ADD ADMIN LOG
     * Description: insert admin logs to database
     * @param Request $request
     * @param string $activity : string value
     * @param string|int $user_id
     * @return void
     */
    public static function addToLog(Request $request, string $activity, string|int $user_id): void {

        UserLogs::create([
            'user_id' => $user_id,
            'activity' => $activity,
            'end_point' => $request->fullUrl()
        ]);
    }

    /**
     * TITLE: GET ALL LOGS
     * Description: Retrieve all available logs
     * @return collection of Std Class: data from 'admin_logs' table
     */
    public static function logActivityLists(){
    	return UserLogs::orderByDesc('timestamp')->get();
    }
}
