<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('category')->orderBy('sort_order')->get()
            ->groupBy('category');

        $experiences = Setting::get('experiences', '[]');
        if (is_string($experiences)) {
            $experiences = json_decode($experiences, true) ?? [];
        }

        return view('pages.about.index', compact('technologies', 'experiences'));
    }
}
