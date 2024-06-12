<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    const CHAPTER = [
        0 => 'AI基礎編',
        1 => 'AI応用編',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'sub_title',
        'summary',
        'chapter',
        'path',
        'uploader',
        'delete_flg',
    ];

    /**
     * 全ての動画データを取得
     */
    public function findAllMovies()
    {
        return Movie::all();
    }

    /**
     * 動画データを登録
     */
    public function store($title, $sub_title, $summary, $chapter, $path)
    {
        Movie::create([
            'title' => $title,
            'sub_title' => $sub_title,
            'summary' => $summary,
            'chapter' => self::CHAPTER[$chapter],
            'path' => $path,
            'uploader' => \Auth::user()->id,
        ]);
    }

    /**
     * 削除処理
     */
    public function deleteMovieById($id)
    {
        return $this->destroy($id);
    }
}
