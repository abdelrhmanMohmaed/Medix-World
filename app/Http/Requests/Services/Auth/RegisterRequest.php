<?php

namespace App\Http\Requests\Services\Auth;
use Illuminate\Validation\Rules;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name.*' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase','email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tel' => ['required', 'string', 'regex:/^\+[0-9]{12}$/'], 
            'dateOfBirth' => ['required', 'date'],
            'gender' => ['required', 'in:1,2'],
            
            'city_id'=>['required', 'exists:cities,id'],
            'region_id'=>['required', 'exists:regions,id'],
            'title_id'=>['required', 'exists:titles,id'],
            'major_id'=>['required', 'exists:majors,id'],
            'summary.*' => ['required', 'string'],
            'address.*' => ['required', 'string'],
            'bookingPrice' => ['required', 'numeric', 'min:0'],
            'profileImage'=>['required','image','max:2048'],
            'medical_association_card' => ['required','image','max:2048' ],
            'clinicTel' => ['required', 'string', 'regex:/^\+[0-9]/'],
            'clinicTelTwo' => ['nullable', 'string', 'regex:/^\+[0-9]/'],
            'term' => ['required', 'accepted'],
        ];
    }
}
