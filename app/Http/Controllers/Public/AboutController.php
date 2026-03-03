<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Setting;
use App\Settings\CertificationSettings;
use App\Settings\ExperienceSettings;

class AboutController extends Controller
{
    public function index(ExperienceSettings $exp, CertificationSettings $certification)
    {
        $technologies = Technology::orderBy('category')->orderBy('sort_order')->get()
            ->groupBy('category');

        $experiences = $exp->experiences;
        $certifications = $certification->certificate;

        return view('pages.about.index', compact('technologies', 'experiences', 'certifications'));
    }
}
