<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class AgeLimit implements ValidationRule
{
    protected string $date_of_birth;
    protected int $age;

    public function __construct(int $age = null){
        $this->age = $age;
    }

    public function passes($attribute, $value): bool{
        $dob = date('Y-m-d', strtotime($value));
        $curr_date = Carbon::now();
        $age = $curr_date->diffInYears($dob);

        return $age >= $this->age;
    }

    public function message(): string
    {
        return "Applicant must be at least {$this->age} years old or above";
    }

    public function __toString(){
        return "age_limit:{$this->age}";
    }

    public static function parse($rule): ?static{
        preg_match('/^age_limit:(\d+)$/', $rule, $matches);
        return count($matches) > 0 ? new static((int) $matches[1]) : null;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
}
