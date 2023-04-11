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
    public static function addToLog(string $activity): void {
        $log = [];
        $log['activity'] = $activity;
        $log['end_point_access'] = Request::fullUrl();
        // TODO: JWT
        // $log['admin_id'] = auth()->check() ? auth()->user()->id : 1;

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