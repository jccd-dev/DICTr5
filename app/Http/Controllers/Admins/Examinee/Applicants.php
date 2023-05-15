<?php

namespace App\Http\Controllers\Admins\Examinee;

use App\Http\Controllers\Controller;
use App\Models\Examinee\UsersData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class Applicants extends Controller
{

    public ?string $gender = null;
    public ?string $curr_status = null;
    public ?string $municipality = null;
    public ?string $search_text = null;
    public string|int|null $reg_status = null;
    public string $order_by = 'asc';


    public function render(Request $request): View {

        $data = UsersData::with('tertiaryEdu', 'trainingSeminars', 'addresses', 'submittedFiles', 'userLogin')
            ->paginate(20);

        return view('AdminFunctions/examinees-list', ['data' => $data, 'try' => $this->municipality]);
    }

    public function select_examinees(int $examinees_id): View|RedirectResponse {

        $examinees_data = UsersData::with('addresses', 'tertiaryEdu', 'trainingSeminars', 'submittedFiles', 'regDetails', 'userHistory')->where('id', $examinees_id)->first();

        // if record is null or not found
        if(!$examinees_data){
            return redirect()->back()->with('error', 'Record cannot found');
        }

        return view('record.show', ['examinees_data' => $examinees_data]);
    }

    public function search_examinees(Request $request): View
    {
        $this->gender = $request->gender;
        $this->curr_status = $request->curr_status;
        $this->municipality = $request->municipality;
        $this->search_text = $request->search_text;
        $this->reg_status = $request->reg_status;
        $this->order_by = $request->order_by;

        $data = UsersData::query()
            ->when($this->gender, function ($query, $genderValue){
                $query->where('gender', $genderValue);
            })
            ->when($this->reg_status, function ($query, $statusValue){
                $query->whereHas('regDetails', function ($query) use ($statusValue){
                    $query->where('status', $statusValue);
                });
            })
            ->when($this->search_text, function($query, $searchValue){
                $query->where(function ($query) use ($searchValue){
                    $query->where('fname', 'like', '%'.$searchValue.'%')
                        ->orWhere('lname', 'like', '%'.$searchValue.'%')
                        ->orWhere('designation', 'like', '%'.$searchValue.'%');
                })
                ->orWhereHas('tertiaryEdu', function ($query) use ($searchValue){
                    $query->where('degree', 'like', '%'.$searchValue.'%');
                });
            })
            ->when($this->curr_status, function ($query, $currStatusValue){
                $query->where('current_status', $currStatusValue);
            })
            //parent closure, with reference value
            ->when($this->municipality, function ($query, $municipalityValue){
                // nested closure, capture the reference value from parent
                $query->whereHas('addresses', function ($query) use ($municipalityValue){
                    $query->where('municipality', $municipalityValue);
                });
            })
            // related tables
            ->with('tertiaryEdu', 'addresses', 'regDetails')
            ->orderBy('timestamp', $this->order_by)
            ->paginate(20);

        return view('AdminFunctions/result', ['data' => $data]);
    }




}

