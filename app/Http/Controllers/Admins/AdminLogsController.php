<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Admin\AdminLogs;
use App\Models\Admin\AdminModel;
use App\Helpers\AdminLogActivity;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminLogsController extends Controller
{
    public function render(): View
    {
        $logs_data = AdminLogs::with('admin')->orderBy('timestamp', 'desc')->paginate(20);
        $admin_names = AdminModel::select('name')->get();

        return view('AdminFunctions.system-logs', ['data' => $logs_data, 'names' => $admin_names]);
    }

    /**
     * @uses CLEAN_LOGS
     * @description soft delete logs that more than 1 year old
     *              and permanently delete, softdeleted logs that
     *              more than 3 years
     */
    public function clean_logs(): RedirectResponse
    {
        $oneYearAgo = Carbon::now()->subYear();
        $_3YearsAgo = Carbon::now()->subYears(3);
        // $sixMonthsAgo = Carbon::now()->subMonths(6);

        AdminLogs::where('timestamp', '<', $oneYearAgo)->delete();
        AdminLogs::where('deleted_at', '<', $_3YearsAgo)->forceDelete();
        AdminLogActivity::addToLog("Cleaned the Logs", session()->get('admin_id'));
        return redirect()->back();
    }

    public function filter_logs(Request $request){
        $admin_name = $request->get('admins');

        $data = AdminLogs::query()
            ->when($admin_name, function($query, $nameValue){
                $query->whereHas('admin', function($query) use ($nameValue){
                    $query->where('name', $nameValue);
                });
            })
            ->orderBy('timestamp', 'desc')
            ->paginate(20);

        return view('AdminFunctions/logs-results', ['data' => $data]);
    }

    /**
     * @uses name::GENERATE_LOGS_FILE
     * @description: only generate the softdeleted files from database
     */
    public function generate_logs_file()
    {
        $softDeletedLogs = AdminLogs::with('admin')->onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        $fileName = 'soft_deleted_logs_' . time() . '.txt'; // Unique filename with a timestamp
        $filePath = storage_path('app/logs' . $fileName);

        $content = '';

        foreach ($softDeletedLogs as $log) {
            $content .= "ID: $log->id| Admin: {$log->admin->name} | Timestamp: $log->timestamp | Message: $log->activity | URL: $log->end_point";
        }

        File::put($filePath, $content);

        return response()->streamDownload(function () use ($filePath) {
            echo File::get($filePath);
            File::delete($filePath);
        }, $fileName);
    }
}
