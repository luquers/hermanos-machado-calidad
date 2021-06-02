<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'avatar' => 'nullable|file',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'name' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'avatar' => __('global.avatar'),
            'username' => __('global.username'),
            'email' => __('global.email'),
            'name' => __('global.name'),
            'surname' => __('global.surname'),
            'password' => __('global.password'),
            'password_confirmation' => __('global.password_confirmation')
        ];
    }
}
