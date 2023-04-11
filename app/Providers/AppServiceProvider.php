<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\WordCount;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('word_count', function ($attribute, $value, $parameters, $validator) {
            $count = $parameters[0] ?? null;
            $rule = new WordCount($count);
            return $rule->passes($attribute, $value);
        });

        Validator::replacer('word_count', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':count', $parameters[0], $message);
        });
    }
}

