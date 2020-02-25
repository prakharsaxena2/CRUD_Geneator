<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class EmpwwdddddRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }
        public function rules()
        {
            return [];
        }
    }
