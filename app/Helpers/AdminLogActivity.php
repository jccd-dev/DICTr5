<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Models\Admin\AdminLogs as AdminLogModel;

class AdminLogActivity{

    /**
     * TITLE: ADD ADMIN LOG
     * Description: insert admin logs to database
     * @param string $activity: string value
     * @return void
     */
    public static function addToLog(Request $request, string $activity, string|int $admin_id): void {
        $log = [];
        $log['activity'] = $activity;
        $log['end_point_access'] = $request->fullUrl();
        $log['admin_id'] = $admin_id;

        AdminLogModel::create($log);
    }

    /**
     * TITLE: GET ALL LOGS
     * Description: Retrieve all available logs
     * @return collection of Std Class: data from 'admin_logs' table
     */
    public static function logActivityLists(){
    	return AdminLogModel::latest()->get();
    }
}
