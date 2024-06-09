<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinimumDuration implements Rule
{
    protected $minimumMinutes;

    public function __construct($minimumMinutes = 10)
    {
        $this->minimumMinutes = $minimumMinutes;
    }

    public function passes($attribute, $value)
    {
        // تحويل القيمة إلى دقائق
        list($hours, $minutes) = sscanf($value, '%d:%d');
        $totalMinutes = $hours * 60 + $minutes;

        return $totalMinutes >= $this->minimumMinutes;
    }

    public function message()
    {
        return "The duration must be at least {$this->minimumMinutes} minutes.";
    }
}
