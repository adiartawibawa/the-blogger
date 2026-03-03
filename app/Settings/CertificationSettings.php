<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CertificationSettings extends Settings
{
    public array $certificate;

    public static function group(): string
    {
        return 'certifications';
    }
}
