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
            'options.*.name' => ['required'],
            'options' => [new MinOptionsRule()],
        ];
    }

    public function messages()
    {
        return [
            'header.title.required' => 'A enquete deve possuir um título.',
            'header.title.string' => 'O título da enquete deve ser em formato de texto.',
            'header.begins_in.required' => 'A enquete deve possuir uma data inicial.',
            'header.begins_in.date' => 'A data inicial deve ser em formato de data.',
            'header.expires_in.required' => 'A enquete deve possuir uma data final.',
            'header.expires_in.date' => 'A data final deve ser em formato de data.',
            'header.expires_in.after' => 'A data final deve ser maior que a data inicial.',
            'options.*.name.required' => 'Todas opções devem ser preenchidas.'
        ];
    }
}
