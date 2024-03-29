<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
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
            $flat_images = Arr::flatten($images);
            $post = PostModel::find($post_id);

            if($post) {
                $imgs = $post->images()->whereIn('image_filename', $flat_images)->get();

                foreach ($imgs as $image) {
                    if (Storage::exists('/public/images/' . $image->image_filename)) {
                        Storage::delete('public/images/' . $image->image_filename);
                    }
                    $image->delete();

                }

                $deleted = $post->images()->whereIn('image_filename', $flat_images)->delete();

                return $deleted > 0;
            }

            return false;
        }
}
