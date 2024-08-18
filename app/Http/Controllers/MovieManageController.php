<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminMovieUpdateRequest;
use App\Models\MovieWatchLog;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MovieManageController extends Controller
{
    public function __construct()
    {
        $this->movie = new Movie();
        $this->movie_watch_log = new MovieWatchLog();
    }

    /**
     * 動画一覧画面（管理用）の表示
     */
    public function list(): View
    {
        $movies = $this->movie->findAllMovies();

        return view('movie-list.list', compact('movies'));
    }

    /**
     * 編集画面の表示
     */
    public function edit($movie_id): View
    {
        $movie = $this->movie->find($movie_id);

        return view('movie-list.edit', compact('movie'));
    }

    /**
     * IDで動画を編集
     */
    public function update(AdminMovieUpdateRequest $request, $movie_id): RedirectResponse
    {
        $movie = $this->movie->find($movie_id);
        // 編集処理
        $this->movie->updateMovie($request, $movie);

        return redirect()->route('movie-list.list');
    }

    /**
     * IDで動画を削除
     */
    public function destroy($movie_id): RedirectResponse
    {
        $movie = $this->movie->find($movie_id);

        if (!is_null($movie) && Storage::exists('public/' . $movie->movie_path)) {
            // 指定されたIDのレコードを削除
            $this->movie->deleteMovieById($movie_id);

            // 動画視聴ログを削除
            $this->movie_watch_log->deleteMovieWatchLogByMovieId($movie_id);

            // ストレージから動画とサムネイル画像を削除
            Storage::delete(['public/' . $movie->movie_path, 'public/' . $movie->thumbnail_path]);
        } else {

            return redirect()->route('movie-list.list')->with('error', '動画の削除に失敗しました');
        }

        return redirect()->route('movie-list.list')->with('success', '動画を削除しました');
    }
}
