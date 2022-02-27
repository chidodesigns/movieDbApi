<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Movie as MovieResource;

class MoviesController extends Controller
{
    
    public function index()
    {
        $this->authorize('viewAny', Movie::class);
        return MovieResource::collection(request()->user()->movies);
    }


    public function store()
    {
        $this->authorize('viewAny', Movie::class);

        $movie = request()->user()->movies()->create($this->validateData());

        return (new MovieResource($movie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Movie $movie)
    {
       
        $this->authorize('view', $movie);

        return new MovieResource($movie);
    }

    public function update(Movie $movie)
    {
        $this->authorize('update', $movie);
        $movie->update($this->validateData());

        return (new MovieResource($movie))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Movie $movie)
    {
        $this->authorize('delete', $movie);

        $movie->delete();

       return response([], Response::HTTP_NO_CONTENT);


    }

    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'director' => 'required',
            'writers' => 'required',
            'stars' => 'required',
            'synopsis' => 'required',
            'storyline' => 'required'
        ]);
    }

}
