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

                if ($curr_name && Storage::exists('/public/images/'.$curr_name)) {
                    continue;
                }
                else {
                    $image_name = $this->image_namer($image);
                    $this->image_names[] = $image_name;
                }

            }

            return $this->image_names;
        }

        return $this->image_namer($images);


    }

    public function image_namer(mixed $image) : string {

        $time = time();
        $rand_num = Str::random(8);
        $extension = $image->getClientOriginalExtension();

        return "{$time}_{$rand_num}.{$extension}";

    }

    public function delete_image(mixed $image_names, string|int $post_id) :bool {


        if(is_array($image_names)){
            foreach ($image_names as $names) {
                if ($names && Storage::exists('/public/images/' . $names)) {

                    Storage::delete('public/images/' . $names);

                }
            }
            return true;
        }

        if ($image_names && Storage::exists('/public/images/' . $image_names)) {
            Storage::delete('public/images/' . $image_names);
            return true;
        }

        $post = PostModel::find($post_id);
        $post->images()->whereIn('image_filename', $image_names)->delete();

        return false;
    }
}
