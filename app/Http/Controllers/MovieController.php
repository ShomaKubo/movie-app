<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\View\View;


class MovieController extends Controller
{
    public function __construct()
    {
        $this->movie = new Movie();
    }

    /**
     * 動画一覧画面の表示
     */
    public function top(): View
    {
        $movies = $this->movie->findAllMovies();

        return view('movie.top', compact('movies'));
    }
}
