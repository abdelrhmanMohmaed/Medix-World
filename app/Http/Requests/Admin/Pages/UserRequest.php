<?php

namespace App\Http\Requests\Admin\Pages;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'fullName' => ['required', 'string', 'max:255'],
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,'.$this->user?->id,
            'tel' => ['required', 'string', 'regex:/^\+[0-9]{12}$/'],
            'password' => Auth::id() == $this->user?->id ? ['required', 'confirmed', Rules\Password::defaults()] : ['nullable'],
            'dateOfBirth' => ['required', 'date'],
            'gender' => ['required', 'in:1,2'],
        ];
    }
}
