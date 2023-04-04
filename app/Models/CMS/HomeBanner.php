<?php

namespace App\Models\CMS\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeBanner extends Model
{
    use HasFactory;

    protected $table = 'banner';


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
        $banner_save = DB::table($this->table)->insertOrIgnore($data);

        return $banner_save;
    }

    /**
       TITLE: UPDATE OR INSERT BANNER
     * Description: update the the banner data into database if exist else insert a new one
     * @param array $data: since it is  for update and basic insert its recommended to use
     *                     associative array
     * @param string $title: use to identity if the data is alreay existed in database using the
     *                       the given title of the banner
     * @return boolean $isUpdate: if true the a new banner is inserted else updated
     */
    public function update_banner(array $data, string $title): bool {

        $isUpdate = DB::table($this->table)
            ->updateOrInsert(
                ['title' => $title],
                $data
            );

        return $isUpdate;
    }

    /**
       TITLE: DELETE BANNER
     * Description: Use to delete or remove banner in database
     * @param int $banner_id: unique id to identify what banner should be deleted in database
     * @return boolean $delete_banner: alam na this
     */
    public function delete_banner(int $banner_id): bool {

        $delete_banner = DB::table($this->table)
            ->where('id', $banner_id)
            ->delete();

        return $delete_banner;
    }

}
