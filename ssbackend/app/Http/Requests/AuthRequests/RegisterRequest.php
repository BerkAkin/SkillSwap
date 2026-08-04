<?php

namespace App\Http\Requests\AuthRequests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname'=>'required|string|max:50',
            'lastname'=>'required|string|max:50',
            'phone_number'=>'required|string|max:13|unique:users,phone_number',
            'email'=>'required|email|unique:users,email',
            'password'=>['required',Password::defaults()],
            'gender'=>'required|in:m,f',
        ];
    }
}
