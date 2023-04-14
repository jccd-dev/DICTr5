<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class WordCount implements ValidationRule
{
    protected int $count;

    public function __construct(int $count = null)
    {
        $this->count = $count;
    }

    public function passes($attribute, $value): bool
    {
        $words = str_word_count($value);
        return $words <= $this->count;
    }

    public function message(): string
    {
        return "The :attribute must not more than {$this->count} words.";
    }

    public function __toString()
    {
        return "word_count:{$this->count}";
    }

    public static function parse($rule): ?static
    {
        preg_match('/^word_count:(\d+)$/', $rule, $matches);
        return count($matches) > 0 ? new static((int) $matches[1]) : null;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // TODO: Implement validate() method.
    }
}
