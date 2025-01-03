<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'old_password'=>['required'],
            'password'=>['required','confirmed','min:8'],
            'password_confirmation'=>['required'],
        ];
    }
    public function messages(): array
    {
        return [
           'old_password.required'=>'Please! enter current password',
            'password.required'=>'Please! enter new password',
            'password_confirmation.required'=>'Please! enter confirm password',
        ];
    }
}
