<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class TermsRequest extends FormRequest
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
            'title.*' => ['required', "unique_translation:terms_condations,title,{$this->term?->id}"],
            'sub_description.*' => ['required', "unique_translation:terms_condations,sub_description,{$this->term?->id}"],
            'description.*' => ['required', "unique_translation:terms_condations,description,{$this->term?->id}"],

        ];
    }
}
