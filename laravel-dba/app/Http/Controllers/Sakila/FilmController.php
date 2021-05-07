<?php

namespace App\Http\Controllers\Sakila;

use App\Http\Controllers\Controller;

class FilmController extends Controller
{
    public function index()
    {
        return view('elasticsearch.film.index');
    }
}
