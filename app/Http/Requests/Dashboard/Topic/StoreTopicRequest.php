<?php

namespace App\Http\Requests\Dashboard\Topic;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
            'title' => 'required|max:255|string',
            'forumId' => 'required|integer|exists:forums,id',
            'content' => 'required|string',
            'private' => 'integer',
            'selectedUsers' => '',
            'tags' => '',
            'images' => '',
            'files' => '',
            'type' => 'integer',
            'closeComments' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
