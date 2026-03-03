<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ExperienceSettings extends Settings
{
    public array $experiences;

    public static function group(): string
    {
        return 'experiences';
    }
}
