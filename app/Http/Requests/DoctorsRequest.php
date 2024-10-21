<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorsRequest extends FormRequest
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
    protected function onCreate(){
        return[
            'id'=>['required','integer'],
            'name'=>['required'],
            'email'=>['required'],
            'photo'=>'mimes:jpeg,jpg,png',
            'department'=>['required']
        ];
    }
    protected function onUptade(){
        return[
            'name'=>['required'],
            'email'=>['required'],
            'photo'=>'nullable|mimes:jpeg,jpg,png',
            'department'=>['required']
        ];
    }
    public function rules(): array
    {
        return request()->isMethod('post')?$this->onCreate():$this->onUptade();
    }
    public function messages()
    {
        return[
            'id.required'=>'doctor id required',
            'id.integer'=>'id must be integer',
            'name.required'=>'doctor name required',
            'email.required'=>'doctor email required',
            'department.required'=>'doctor department required'
        ];
    }
    public function attributes()
    {
        return[
            'id'=>'product id',
            'name'=>'product name',
            'email'=>'product email',
            'department'=>'product department'
        ];
    }
}
