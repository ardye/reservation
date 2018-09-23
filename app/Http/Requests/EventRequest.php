<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'namaEvent' => 'required|string|max:25',
            'deskEvent' => 'required',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
            'gambar' => 'sometimes|image|max:5000|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
