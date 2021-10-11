<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $title
 * @property mixed $content_text
 * @property mixed $thumbnail
 */
class form extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content_text' => 'required',
            'thumbnail' => 'required',
        ];
    }
}
