<?php

namespace App\Http\Requests\Api\Client\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'message' => 'string',
            'files' => '',
            'images' => '',
            //'replyId' => 'integer|exists:posts,id',
        ];
    }
}
