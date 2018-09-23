<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $redirect = '/'.'#register';
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
        return [
            'username' => 'required|string|max:25|unique:users,username',
            'nama' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
            'telepon' => 'required|numeric|digits_between:10,15',
            'gambar' => 'sometimes|image|max:5000|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
