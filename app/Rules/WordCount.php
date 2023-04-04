<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordCount implements Rule
{
    protected $maxWords;

    /**
     * Create a new rule instance.
     * @param integer $maxWords
     *
     * @return void
     */
    public function __construct($maxWords) {
        $this->maxWords = $maxWords;
    }


    public function passes($attribute, $value){

        $cwords = str_word_count($value);
        return $cwords <= $this->maxWords;
    }

    public function message() {
        return "The :attribute cannot be longer than {this->maxWords}";
    }
}
