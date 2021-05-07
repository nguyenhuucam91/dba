<?php

namespace App\Http\Controllers\Sakila;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('elasticsearch.settings.index');
    }
    public function sync()
    {
    }
}
