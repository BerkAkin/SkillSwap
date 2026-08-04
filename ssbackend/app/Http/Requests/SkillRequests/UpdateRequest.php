<?php

namespace App\Http\Requests\SkillRequests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name'=>'required|max:50|min:10|string',
            'description'=>'required|max:200|min:10|string'
        ];
    }
}
