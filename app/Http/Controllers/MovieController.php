<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\MovieUploadRequest;
use Illuminate\Http\RedirectResponse;
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

    /**
     * 動画アップロード画面の表示
     */
    public function upload(): View
    {
        return view('movie.upload');
    }

    /**
     * 動画アップロード画面の表示
     */
    public function store(MovieUploadRequest $request): RedirectResponse
    {
        // 動画ファイル投稿用のパス
        $movie_path = '';
        $movie = $request->file('movie');
        if(isset($movie) === true)
        {
            // storage/app/public/videosにパスを保存
            $movie_path = $movie->store('videos','public');
        }

        // サムネイル画像投稿用のパス
        $thumbnail_path = '';
        $thumbnail = $request->file('thumbnail');
        if(isset($thumbnail) === true)
        {
            // storage/app/public/thumbnailsにパスを保存
            $thumbnail_path = $thumbnail->store('thumbnails','public');
        }

        // DBに動画情報を登録
        $this->movie->store($request->title, $request->sub_title, $request->summary, $request->chapter, $movie_path, $thumbnail_path);

        return redirect()->route('movie.upload')->with('success', 'アップロードしました');
    }

    /**
     * 動画詳細画面の表示
     */
    public function detail($id): View
    {
        $movie = $this->movie->find($id);

        return view('movie.detail', compact('movie'));
    }
}
