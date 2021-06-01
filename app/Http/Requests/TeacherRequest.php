<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:15|unique:teachers,phone',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:teachers,email|max:255',
            'subject' => 'required|string|max:255',
            'image' => 'nullable|image'
        ];
        if ($this->method() === 'PUT') {
            $rules['email'] = 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:teachers,email,' . $this->teacher->id;
            $rules['phone'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:15|unique:teachers,phone,' . $this->teacher->id;
        }
        return $rules;
    }
}
