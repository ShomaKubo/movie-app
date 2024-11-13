<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => ['required', 'max:255'],
            'sub_title' => ['max:255'],
            'summary' => ['max:255'],
            'movie' => ['required','file','mimes:mp4,mov,x-ms-wmv,mpeg,avi','max:2000000'],
            'thumbnail' => ['required','file','mimes:jpg,jpeg,png','max:10000'],
        ];
    }

    public function messages(){
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは255文字以内で入力してください',
            'sub_title.max' => 'サブタイトルは255文字以内で入力してください',
            'summary.max' => '概要は255文字以内で入力してください',
            'movie.required' => '動画ファイルを選択してください',
            'movie.mimes' => '無効な拡張子です',
            'movie.max' => '動画ファイルのサイズが大きすぎます',
            'thumbnail.required' => 'サムネイル画像を選択してください',
            'thumbnail.mimes' => '無効な拡張子です',
            'thumbnail.max' => 'サムネイル画像のサイズが大きすぎます',
        ];
      }
}
