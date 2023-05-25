<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Models\Admin\AdminLogs as AdminLogModel;

class AdminLogActivity{

    /**
     * TITLE: ADD ADMIN LOG
     * Description: insert admin logs to database
     * @param string $activity: string value = use the function name
     * @return void
     */
    public static function addToLog(string $activity, string|int $admin_id, ?string $url = null): void {
        try {
            $url = $url ?? request()->fullUrl();

            $admin_log = new AdminLogModel();

            $admin_log->admin_id = $admin_id;
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
    	return AdminLogModel::all();
    }
}
