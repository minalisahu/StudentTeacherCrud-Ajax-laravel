<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'teacher_id' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:15|unique:students,phone',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:students,email|max:255',
            'subject' => 'required|string|max:255',
            'image' => 'nullable|image'
        ];
        if ($this->method() === 'PUT') {
            $rules['email'] = 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:students,email,' . $this->student->id;
            $rules['phone'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:15|unique:students,phone,' . $this->student->id;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'teacher_id.required' => 'The teacher field is required.'
        ];
    }
}
