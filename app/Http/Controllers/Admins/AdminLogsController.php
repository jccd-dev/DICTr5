<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Admin\AdminLogs;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminLogsController extends Controller
{
    public function render(): View
    {
        $logs_data = AdminLogs::with('admin')->paginate(20);

        return view('AdminFunctions.system-logs', ['data' => $logs_data]);
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
}
