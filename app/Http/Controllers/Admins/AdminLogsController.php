<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Admin\AdminLogs;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminLogsController extends Controller
{
    public function render(): View
    {
        $logs_data = AdminLogs::with('admin')->paginate(20);
        $admin_names = AdminModel::select('name')->get();

        return view('AdminFunctions.system-logs', ['data' => $logs_data, 'names' => $admin_names]);
    }

    /**
     * @uses CLEAN_LOGS
     * @description delete logs that more than 1 year old
     */
    public function clean_logs(): RedirectResponse
    {
        $oneYearAgo = Carbon::now()->subYear();
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        AdminLogs::where('timestamp', '<', $oneYearAgo)->delete();
        return redirect()->back();
    }

    public function filter_logs(Request $request){
        $admin_name = $request->get('admins');

        $data = AdminLogs::query()
            ->when($admin_name, function($query, $nameValue){
                $query->whereHas('admin', function($query) use ($nameValue){
                    $query->where('name', $nameValue);
                });
            })->paginate(20);

        return view('AdminFunctions/logs-results', ['data' => $data]);
    }
}
