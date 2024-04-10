<?php

namespace App\Http\Requests;

use App\Rules\UpperCaseRule;
use Illuminate\Foundation\Http\FormRequest;

class MyRequest extends FormRequest
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
            'fname'=> ["required","string",new UpperCaseRule],
            'sname'=> ["required","string",new UpperCaseRule],
            'email'=> ['email','required','unique:users,email'],
            'password'=> ['required','string','min:8'],
            'role'=> ['required','string'],
        ];
    }
    public function messages(): array{


        return [
                'fname.required'=> 'pls fill the name of the account man it is required  ',
                  'email.required' => 'pls fill the email it is required man',
                  'email.unique' => 'pls make it unique email this is important',
                  "password.min" => 'the password should be at least 8 letters',
                  'role.required' => 'this is an very important feild u should fill it '
    
        ];
    }
}
