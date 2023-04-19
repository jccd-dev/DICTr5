<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\CMS\POST\PostImages;
use App\Models\CMS\POST\PostModel;

class ImageHandlerHelper {

    public array $image_names = [];



    public function extract_image_names(mixed $images): array|string
    {

        if(is_array($images)) {
            $image_names = [];

            foreach ($images as $image) {

                $originalName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $curr_name = "{$originalName}.{$extension}";

                if (Storage::exists('/public/images/'.$curr_name)) {
                    $this->image_names[] = $curr_name;
                }
                else {
                    $image_name = $this->image_namer($image);
                    $this->image_names[] = $image_name;
                }

            }

            return $this->image_names;
        }

        $originalName = $images->getClientOriginalName();
        $extension = $images->getClientOriginalExtension();
        $curr_name = "{$originalName}.{$extension}";

        return Storage::exists('/public/images/'.$curr_name) ? $curr_name : $this->image_namer($images);

    }

    public function image_namer(mixed $image) : string {

        $time = time();
        $rand_num = Str::random(8);
        $extension = $image->getClientOriginalExtension();

        return "{$time}_{$rand_num}.{$extension}";

    }

    //delete on folder and database
        public function del_image_on_db(mixed $images, string|int $post_id) : bool{
            $post = PostModel::find($post_id);

            if($post) {
                $images = $post->images()->whereIn('image_filename', $images)->get();

                foreach ($images as $image) {

                    $image->delete();
                    if (Storage::exists('/public/images/' . $image)) {
                        Storage::delete('public/images/' . $image);
                    }

                }

                return true;
            }

            return false;
        }
}
