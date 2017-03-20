<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
        $user = auth()->user();
        return [
            'username' => 'required|max:255|unique:users,username,'.$user->id,
            'firstname' => 'required|string',
            'lastname' => 'nullable|string',
            'sex' => 'nullable|alpha',
            'phone_number' => 'nullable|regex:/[0-9]{10}/',
            'dob' => 'nullable|date',
            'handicap' => 'digits_between:0,52',
            'lang' => 'nullable|string'
        ];
    }
}
