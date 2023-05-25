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
    public static function addToLog(string $activity, string|int $user_id): void {
        try {
            $url = $url ?? request()->fullUrl();

            $admin_log = new UserLogs();

            $admin_log->admin_id = $user_id;
            $admin_log->activity = $activity;
            $admin_log->end_point = $url;

            $admin_log->save();
        } catch (\Throwable $th) {
            \Log::error('Failed to log user activity: ' . $th->getMessage());
        }
    }

    /**
     * TITLE: GET ALL LOGS
     * Description: Retrieve all available logs
     */
    public static function logActivityLists(){
    	return UserLogs::all();
    }
}
