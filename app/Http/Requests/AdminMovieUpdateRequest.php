<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMovieUpdateRequest extends FormRequest
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
        ];
    }

    public function messages(){
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは255文字以内で入力してください',
            'sub_title.max' => 'サブタイトルは255文字以内で入力してください',
            'summary.max' => '概要は255文字以内で入力してください',
        ];
      }
}
