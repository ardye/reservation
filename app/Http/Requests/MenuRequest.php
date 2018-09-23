<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
        return [
            'namaMenu' => 'required|string|max:25',
            'deskMenu' => 'required',
            'rating' => 'required',
            'harga' => 'required',
            'idKategori' => 'required',
            'gambar' => 'sometimes|image|max:5000|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
