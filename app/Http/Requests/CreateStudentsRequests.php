<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateStudentsRequests extends FormRequest
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
            'name'=>'required',
            'active'=>'required',
            'phone'=>'required',
            'country_id'=>'required',
            'national_id'=>'required',
            
            
        ];
    }
public function messages(){
 return [
            'name.required'=>'حقل الاسم مطلوب ',
            'active.required'=>'حقل التسجيل مطلوب ',
            'phone.required'=>'حقل الهاتف مطلوب ',
            'country_id.required'=>'حقل الدولة مطلوب ',
            'national_id.required'=>'حقل الرقم القومي مطلوب '
        ];
}
}
