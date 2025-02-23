<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'add' => 'required',
           'gender' => 'required',
            'dob' => 'required|date',
           'email' => 'required|email',
          'password' => 'required|min:6|max:20',
           'photo' => 'nullable|image|max:2048',
           //'photo' => 'nullable|mimes:jpeg,png,gif'
           //cv' => 'required|mimes:docx,rtf,adt'
           
        ];
    }
    

    public function messages():array
    {
        return
        [
        'name.required' => 'Oops name is empty!', 
        'password.min' =>'Your password should be  between 6 an 20!',
        ];
    }
}
