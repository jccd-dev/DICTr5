<?php
namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Examinee\UsersData;

class FileHandler
{
    private UsersData $userModel;

    private $accepted_file_types = [
        'docs' => ['doc', 'pdf'],
        'images' => ['png', 'jpg', 'jpeg']
    ];
    public function __construct()
    {
        $this->userModel = new UsersData();
    }

    /**
     * @description store files to database and server storage
     * @param mixed $file
     * @param $submit
     * @param string $req_type
     * @param $user_name
     * @return true
     */
    public function store_files(mixed $file, $submit, string $req_type, string $lname): bool
    {

        $file_extension = $file->getClientOriginalExtension();
        $new_file_name = $this->file_namer($lname, $req_type, $file_extension);

        in_array(strtolower($file_extension), $this->accepted_file_types['docs']) ? $file_type = 'Document' : $file_type = 'Image';

        // insert into database a new file record
        $submitted = $submit->create([
            'file_name'        => $new_file_name,
            'file_type'        => $file_type,
            'requirement_type' => $req_type
        ]);

        // then insert the actual file into the folder after the inserting into database
        if($submitted){
            $file->storeAs('/public/fileSubmits', $submitted->file_name);
            return true;
        }

        return false;
    }

    /**
     * Description: Just simply create a new name for the file.
     * @param string $applicant_name "{first name}_{last name}";
     * @param string $req_type
     * @param string $file_ext
     * @return string
     */
    public function file_namer(string $applicant_name, string $req_type,string $file_ext): string {
        $timestamp = date('ymd', strtotime('now'));
        $time = time();
        return "{$applicant_name}_{$req_type}_{$timestamp}{$time}.{$file_ext}";
    }

    /**
     * @description delete file into server and database.
     * @param $file_name
     * @param $userId
     * @return bool
     */
    public function delete_file($file_name, $userId) :bool {
        $file = $this->userModel::find($userId);

        if($file){
            $file->submittedFiles()->where('file_name', $file_name)->delete();
            Storage::delete('/public/fileSubmits/'.$file_name);
            return true;
        }

        return false;
    }

    /**
     * @description update a submitted file in server folder and database.
     * @param $new_file
     * @param $user
     * @param $req_type
     * @return bool
     */
    public function update_the_file($new_file, $user, $req_type):bool{
        $old_file_name = '';
        $lname = $user->lname;
        $user_id = $user->id;
        $file = $user->submittedFiles()
            ->where('user_id', $user_id)
            ->first();

        if ($file){
            $old_file_name = $file->file_name;
        }

        $file_extension = $new_file->getClientOriginalExtension();

        in_array(strtolower($file_extension), $this->accepted_file_types['docs']) ? $file_type = 'Document' : $file_type = 'Image';

        $new_file_name = $this->file_namer($lname, $req_type ,$file_extension);

        try {
            $updated = $user->submittedFiles()->updateOrCreate(
                ['requirement_type' => $req_type],
                [
                    'user_id'          => $user_id,
                    'file_name'        => $new_file_name,
                    'file_type'        => $file_type,
                    'requirement_type' => $req_type
                ]
            );

            // if the file is updated then delete the old file into folder
            if(!$updated->wasRecentlyCreated) {
                Storage::delete('/public/fileSubmits/' . $old_file_name);
            }

            //store insert the new uploaded file into folder
            $new_file->storeAs('/public/fileSubmits', $updated->file_name);

            return true;
        }catch (Exception){
            return false;
        }

    }


}
