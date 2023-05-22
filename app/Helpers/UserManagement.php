<?php

namespace App\Helpers;

use App\Helpers\FileHandler;
use App\Models\Examinee\UsersData;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class UserManagement
{

    public $rules = [
        'givenName'     => "required|regex:/^[A-Za-z\s]+$/",
        'middleName'    => "required|regex:/^[A-Za-z\s]+$/",
        'surName'       => "required|regex:/^[A-Za-z\s]+$/",
        'tel'           => "required|regex:/^09\d{9}$/",
        'region'        => "required",
        'province'      => "required",
        'municipality'  => "required",
        'barangay'      => "required",
        'email'         => "required|email",
        'pob'           => "required",
        'dob'           => "required",
        'gender'        => "required",
        'citizenship'   => "required",
        'civilStatus'   => "required",
        'pl'            => "required",
        'signature'     => "required",
        'passport'      => "mimes:jpg,jpeg,png|max:5120|dimensions:min_width=826,min_height=1062|max:5120",
        'psa'           => "mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'validId'       => "mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'diploma'       => "mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'trainings.*.center' => 'required|string',
        'trainings.*.course' => 'required|string',
        'trainings.*.hours' => 'required|numeric',
    ];

    public array $student_rule = [
        'yearLevel' => "required|numeric"
    ];

    public array $prof_rule = [
        'presentOffice'       => "required",
        'telNum'              => "required",
        'officeAddress'       => "required",
        'officeCategory'      => "required",
        'designationPosition' => "required",
        'yearsPresentPosition' => "required|numeric"
    ];

    public function insert_users_data(array $organized_data): bool|array
    {
        $user = new UsersData();
        $file_helper = new FileHandler();

        $user->fill($organized_data['main_data']);

        // insert into main table users data
        if ($user->save()) {
            $user_id = $user->id;
            $last_name = $user->lname;

            // insert into tertiary education table
            $user->tertiaryEdu()->create($organized_data['ter_edu']);

            // insert into training seminars table
            $user->trainingSeminars()->createMany($organized_data['training']);

            // insert into address table
            $user->addresses()->create($organized_data['address']);

            $submit = $user->submittedFiles();
            // insert files into folder and database
            $organized_data['files']['passport'] != null ? $file_helper->store_files($organized_data['files']['passport'], $submit, 'passport', $last_name) : null;
            $organized_data['files']['psa'] != null ? $file_helper->store_files($organized_data['files']['psa'], $submit, 'psa', $last_name) : null;
            $organized_data['files']['validId'] != null ? $file_helper->store_files($organized_data['files']['validId'], $submit, 'validId', $last_name) : null;
            $organized_data['files']['diploma'] != null ? $file_helper->store_files($organized_data['files']['diploma'], $submit, 'diploma_TOR', $last_name) : null;
            $organized_data['files']['cert'] != null ? $file_helper->store_files($organized_data['files']['cert'], $submit, 'coe', $last_name) : null;

            return [true, $user->id];
        }

        return false;
    }

    public function update_users_data(array $organized_data, $user_id)
    {

        $user = UsersData::find($user_id);

        $user->update($organized_data['main_data']);

        $user->tertiaryEdu->update($organized_data['ter_edu']);
        $user->addresses->update($organized_data['address']);

        foreach ($organized_data['training'] as $training) {
            $training_id = $training['id'] ?? null;
            $training['user_id'] = $user->id; // Set the user_id
            // if $this->>trainings has no id then i will create bew record, else update
            $user->trainingSeminars()->updateOrCreate(['id' => $training_id], $training);
        }

        // in case the user remove the training data
        if (!is_null($organized_data['to_del_trainings'])) {
            foreach ($organized_data['to_del_trainings'] as $training_id) {
                $training = $user->trainingSeminars()->where('id', $training_id)->first();
                $training ? $training->delete() : null;
            }
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_passport($user_id, $passport): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($passport, $user, 'passport');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_psa($user_id, $psa): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($psa, $user, 'psa');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_id($user_id, $validId): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($validId, $user, 'validId');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_diploma($user_id, $diploma): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($diploma, $user, 'diploma_TOR');
    }

    public function update_COE($user_id, $cert): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($cert, $user, 'coe');
    }
}
