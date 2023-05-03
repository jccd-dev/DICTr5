<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Examinee\UsersData;

class FileHandler
{
    private $userModel;

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
     * @param mixed $files
     * @param int|string $applicant_id
     * @param string $applicant_name
     * @return void
     */
    public function store_files(mixed $files, int|string $userId){
        $file = $this->userModel::find($userId);

        //get the old file (filename) and username
        $user_name = "{$file->lname}_{$file->fname}";
        foreach ($files as $key => $file) {
            $file_extension = $file->getClientOriginalExtension();
            $file_type = '';

            in_array(strtolower($file_extension), $this->accepted_file_types['docs']) ? $file_type = 'Document' : $file_type = 'Image';

            $new_file_name = $this->file_namer($user_name, $file_extension);

            //insert the files here,

            $this->userModel->user_id          = $userId;
            $this->userModel->file_name        = $new_file_name;
            $this->userModel->file_type        = $file_type;
            $this->userModel->requirement_type = $key;

            if($this->userModel->save()){
                $file->storeAs('/public/fileSubmits', $new_file_name);
            }

        }

    }

    /**
     * Description: Just simply create a new name for the file.
     * @param string $applicant_name "{first name}_{last name}";
     * @param string $file_ext
     * @return string
     */
    public function file_namer(string $applicant_name, string $file_ext): string {
        $timestamp = date('ymd', strtotime('now'));
        $time = time();
        return "{$timestamp}{$time}_{$applicant_name}.{$file_ext}";
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
            $file->submitted_files()->where('file_name', $file_name)->delete();
            Storage::delete('/public/fileSubmits/'.$file_name);
            return true;
         }

        return false;
    }

    /**
     * @description update a submitted file in server folder and database.
     * @param $new_file
     * @param string|int $userId
     * @return bool
     */
    public function update_the_file($new_file, string|int $userId):bool{
        $file = $this->userModel::find($userId);

        //get the old file (filename) and username
        $user_name = "{$file->lname}_{$file->fname}";
        // $old_file_name = $file->submitted_file()->where('id', $file_name)->value('file_name');
        $old_file_name = $file->file_name;

        $file_extension = $new_file->getClientOriginalExtension();

        in_array(strtolower($file_extension), $this->accepted_file_types['docs']) ? $file_type = 'Document' : $file_type = 'Image';

        $new_file_name = $this->file_namer($user_name, $file_extension);

        //since it's just for update
        $updated = $file->submitted__files()->where('file_name', $old_file_name)
            ->update([
                'file_name' => $new_file_name,
                'file_type' => $file_type,
            ]);

        if($updated > 0) {
            //delete the old file into folder
            Storage::delete('/public/fileSubmits/'.$old_file_name);
            //store insert the new uploaded file into folder
            $new_file->storeAs('/public/fileSubmits', $new_file_name);
            return true;
        }

        return false;
    }


}
