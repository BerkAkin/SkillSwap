<?php

namespace App\Http\Requests\MeetingRequests;

use App\Enums\StatusTypes;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
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
           'date'=>'required|date',
           'advert_id'=>'required',
           'offer_id'=> 'required',
           'meeting_type_id'=>'required'
        ];
    }
}
