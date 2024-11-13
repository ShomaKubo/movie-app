<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieWatchLog;
use App\Models\User;
use Illuminate\View\View;


class UserProgressController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->movie = new Movie();
        $this->movie_watch_log = new MovieWatchLog();
    }

    /**
     * ユーザー進捗一覧画面の表示
     */
    public function list(): View
    {
        $users  = $this->user->findAllUserProgress();

        $movie_count = $this->movie->count();

        return view('user-progress.list', compact('users', 'movie_count'));
    }

    /**
     * ユーザー進捗詳細画面の表示
     */ 
    public function detail($user_id): View
    {
        $user = $this->user->find($user_id);

        $movies = $this->movie->findAllMoviesUserProgress($user_id);

        return view('user-progress.detail', compact('user', 'movies'));
    }
}
