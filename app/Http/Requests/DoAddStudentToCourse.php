<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DoAddStudentToCourse extends FormRequest
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
            'student_id' => 'required',
            'enrolment_date' => 'required',
            
        ];
    }

public function messages(){
        return [
            'student_id.required' => 'حقل الطالب مطلوب',
            'enrolment_date.required' => 'حقل تاريخ التسجيل مطلوب',
        ];
    }
    }

