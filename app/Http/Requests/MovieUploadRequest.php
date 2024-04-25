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
            'movie'=>['required','file','mimes:mp4,mov,x-ms-wmv,mpeg,avi,jpeg,jpg,png',
            'max:1000000'],
        ];
    }
}
