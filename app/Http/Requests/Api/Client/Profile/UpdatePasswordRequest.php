<?php

namespace App\Http\Requests\Api\Client\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'oldPassword' => 'required|min:8|max:64',
            'password' => 'required|min:8|max:64',
            'passwordConfirmation' => 'required|min:8|max:64|same:password'
        ];
    }
}
