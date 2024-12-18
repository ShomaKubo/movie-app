<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieWatchLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class MovieWatchLogController extends Controller
{
    public function __construct()
    {
        $this->movie = new Movie();
        $this->movie_watch_log = new MovieWatchLog();
    }

    /**
     * 動画視聴ログ保存処理
     */
    public function addMovieLog($movie_id): RedirectResponse
    {
        
        $user_id = Auth::id();

        // DBに動画視聴ログ情報を登録
        $this->movie_watch_log->store($user_id, $movie_id);

        return redirect('movie.detail', ['id' => $movie_id]);
    }
}
