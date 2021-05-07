<?php

namespace App\Http\Controllers\Elasticsearch;

use App\Http\Controllers\Controller;
use App\Models\Elasticsearch\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $films = [];
        $search = $request->query('search');
        //if query search is not empty ==> user enters something in searchbox
        if ($search !== "") {
            //perform normal match query Elasticsearch
            $films = Film::complexSearch(
                [
                    'body' => [
                        "size" => 100,
                        'query' => [
                            'multi_match' => [
                                'query' => $search,
                                "fields" => ["title", "description"]
                            ]
                        ]
                    ]
                ]
            );
        }
        //If doesn't have search param in querystring, then get all records
        else {
            $films = Film::paginate(10);
        }

        return view('elasticsearch.film.index', compact('films'));
    }

    /**
     * TODO: For reference only
     *
     * @return void
     */
    // public function create()
    // {
    //     $staticFilmData = [
    //         'title' => '...',
    //         'description' => '...',
    //         'language_id' => '...'
    //     ];
    //     /**
    //      * 👀: No need to use user interface here
    //      * 💪: Add to index data created in elasticsearch, using createIndex() method
    //      */
    //     $book = Book::create($staticFilmData);
    // }
}
