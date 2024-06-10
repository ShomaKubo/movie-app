<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieUploadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['max:255'],
            'sub_title' => ['max:255'],
            'summary' => ['max:255'],
            'movie' => ['required','file','mimes:mp4,mov,x-ms-wmv,mpeg,avi','max:1000000'],
        ];
    }

    public function messages(){
        return [
            'title.max' => 'タイトルは255文字以内で入力してください',
            'sub_title.max' => 'サブタイトルは255文字以内で入力してください',
            'summary.max' => '概要は255文字以内で入力してください',
            'movie.required' => '動画ファイルを選択してください',
            'movie.mimes' => '無効な拡張子です',
            'movie.max' => '動画ファイルのサイズが大きすぎます'
        ];
      }
}
