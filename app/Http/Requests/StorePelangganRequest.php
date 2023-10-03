<?php

namespace App\Http\Requests;

use App\Models\Pelanggan;
use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return[

            'kode_pelanggan.required' => 'Isi data pelanggan',
            'nama_pelanggan.required' => 'Isi data pelanggan',
            'alamat.required' => 'Isi data pelanggan',
            'no_telp.required' => 'Isi data pelanggan',
            'email.required' => 'Isi data pelanggan',
        ];
    }
}
