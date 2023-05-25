<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Str;

class SystemLogs extends Controller
{
    public function display_logs(): View{

        $logFile = storage_path('logs/laravel.log');
        $logs = [];

        if (file_exists($logFile)) {
            $currentMonth = date('Y-m');
            $handle = fopen($logFile, 'r');

            if ($handle !== false) {
                while (($log = fgets($handle)) !== false) {
                    $logTimestamp = $this->extractLogTimestamp($log);

                    if ($logTimestamp && Str::startsWith($logTimestamp, $currentMonth)) {
                        $logs[] = $log;
                    }
                }

                fclose($handle);
            }
        }
        
        return view('Adminfunctions/system-logs', compact('logs'));
    }

    private function extractLogTimestamp($log)
    {
        if (preg_match('/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $log, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
