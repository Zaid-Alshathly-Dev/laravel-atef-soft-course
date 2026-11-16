<?php

namespace App\Http\Requests\Api;

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
        'name'=>['required','string','max:255'],
        'email'=>['required','string','email','unique:users,email'],
        'password'=>['required','confirmed',Password::defaults()],
        ];
    }

    public function messages(){
        return [
            'name.required'=>'حقل الاسم مطلوب',
            'email.required'=>'حقل البريد الالكتروني مطلوب',
            'email.email'=>'صيغة البريد الالكتروني غير صحيحة',
            'email.unique'=>'البريد الالكتروني موجود مسبقا',
            'password.required'=>'حقل كلمة المرور مطلوب',
            'password.confirmed'=>'كلمة المرور غير متطابقة مع تأكيد كلمة المرور'
        ];
    }
}
