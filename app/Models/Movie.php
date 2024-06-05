<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'sub_title',
        'summary',
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
    public function store($title, $sub_title, $summary, $path)
    {
        Movie::create([
            'title' => $title,
            'sub_title' => $sub_title,
            'summary' => $summary,
            'path' => $path,
            'uploader' => \Auth::user()->id,
        ]);
    }
}
