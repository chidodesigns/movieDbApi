<?php

namespace App\Http\Controllers;


use App\Http\Resources\Movie as MovieResource;
use App\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $data = request()->validate([
            'searchTerm' => 'required',
        ]);

        $movies = Movie::search($data['searchTerm'])
            ->where('user_id', request()->user()->id())
            ->get();

        return MovieResource::collection($movies);

    }
}
