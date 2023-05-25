<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Models\Examinee\UserLogs;
use Tymon\JWTAuth\Claims\Collection;

class UserLogActivity{

    /**
     * TITLE: ADD ADMIN LOG
     * Description: insert admin logs to database
     * @param string $activity: string value
     * @return void
     */
    public static function addToLog(Request $request, string $activity, string|int $user_id): void {
        $log = [];
        $log['user_id'] = $user_id;
        $log['activity'] = $activity;
        $log['end_point'] = $request->fullUrl();

       UserLogs::create($log);
    }

    /**
     * TITLE: GET ALL LOGS
     * Description: Retrieve all available logs
     */
    public static function logActivityLists(){
    	return UserLogs::all();
    }
}
