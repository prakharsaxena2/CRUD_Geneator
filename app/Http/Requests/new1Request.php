<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class new1Request extends FormRequest
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
