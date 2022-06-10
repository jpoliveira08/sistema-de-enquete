<?php

namespace App\Http\Requests;

use App\Rules\MinOptionsRule;
use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'header.title' => ['required', 'string'],
            'header.begins_in' => ['required', 'date'],
            'header.expires_in' => ['required', 'date', 'after:header.begins_in'],
            'options.*.name' => ['required', 'string'],
            'options' => [new MinOptionsRule()],
        ];
    }
}
