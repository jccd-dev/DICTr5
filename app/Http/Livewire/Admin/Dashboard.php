<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\ExamSchedule;
use App\Models\Examinee\UsersData;
use App\Models\Examinee\RegDetails;
use App\Models\Examinee\UserHistory;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use App\Models\Admin\ExamSchedule;

class Dashboard extends Component
{
    public array $admin_data = [];

    public ?string $year = null;
    public function render()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // User is authenticated, retrieve the authenticated user
            $user = Auth::user();
            // Access the 'role' property
            $role = $user->role;
            $name = $user->name;
            $examSchedData = ExamSchedule::all();
            return view('livewire.admin.dashboard', [
                'role' => $role,
                'name' => $name,
                'exam_sched' => $examSchedData,
                'data' => $this->getAnalyticsData()
            ])->layout("layouts.layout");
        }

        return view('livewire.admin.dashboard')->layout("layouts.layout");
    }

    /**
     * @return array
     * @uses GETANALYTICSDATA
     * @description
     */
    public function getAnalyticsData(): array
    {

        $year = isNull($this->year) ? date('Y', strtotime('now')) : $this->year;
        $total_applicants = UsersData::count();
        $total_examinees = RegDetails::where('status', 5)->count();
        $pending_requirements = RegDetails::where('status', 2)->count();
        $complete_requirements = RegDetails::where('status', 4)->count();
        $byMonthExamData = [];

        $analytics = UserHistory::selectRaw('MONTH(timestamp) as month, COUNT(*) as count')
            ->where('exam_result', 'passed')
            ->whereRaw("DATE_FORMAT(timestamp, '%Y') = '$year'")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        foreach ($analytics as $data) {
            $month = date('F', mktime(0, 0, 0, $data->month, 1));
            $byMonthExamData[$month] = $data->count;
        }

        return [
            'applicants'   => $total_applicants,
            'examinees'    => $total_examinees,
            'pending'      => $pending_requirements,
            'complete'     => $complete_requirements,
            'analytics'    => $byMonthExamData
        ];
    }
    /**
     * @description use for logout redirect to log out route
     * @return null
     */
    public function logout()
    {
        return $this->redirect('/admin/logout');
    }
}
