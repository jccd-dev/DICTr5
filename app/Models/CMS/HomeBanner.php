<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeBanner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    /**
       * TITLE: GET BANNER DATA
     * Description: Get specific banner data in database using its unique ID if banner ID
     *              is provided if null it will return all banner data in database by default.
     * @param int|null $banner_id
     * @return object/array $banner_data
     */
    public function get_banner(int $banner_id = NULL): object
    {
        $banner_data = DB::table($this->table)
            ->select('*');

        if($banner_id) {
            $banner_data->where('id', $banner_id)
                ->get();

            return $banner_data;
        }

        $banner_data->get();


        return $banner_data;
    }

    /**
       TITLE: MAKE BANNER
     * Description: Insert Banner to the banner table database
     * @param array $data: array data of banner that will be inserted to database
     *                     it can be an associative array or multidimensional array
     *
     *                     - title => string value
     *                     - description => string value
     *                     - image => string value (only the file name)
     *                     - button_links => string value
     *
     * @return boolean $banner_save: identify if inserting is success or not
     */
    public function make_banner(array $data): bool {
        return DB::table($this->table)->insertOrIgnore($data);
    }

    /**
       TITLE: UPDATE OR INSERT BANNER
     * Description: update the banner data into database if exist else insert a new one
     * @param array $data: since it is  for update and basic insert it's recommended to use
     *                     associative array
     * @param string $title: use to identity if the data is already existed in database using the
     *                       the given title of the banner
     * @return boolean $isUpdate: if true the new banner is inserted else updated
     */
    public function update_banner(array $data, string $title): bool {

        return DB::table($this->table)
            ->updateOrInsert(
                ['title' => $title],
                $data
            );
    }

    /**
     * TITLE: DELETE BANNER
     * Description: Use to delete or remove banner in database
     * @param int $banner_id
     * @return boolean
     */
    public function delete_banner(int $banner_id): bool {

        return DB::table($this->table)
            ->where('id', $banner_id)
            ->delete();
    }

}
