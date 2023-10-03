<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
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
            'kode_barang' => 'required',
            'produk_id' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'ditarik' => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kode_barang.required' => 'Isi Kode Barang!',
            'nama_barang.required' => 'Isi Nama Barang!',
            'satuan.required' => 'Isi Satuannya!',
            'harga_jual.required' => 'Isi Harga Jual Barang!',
            'stok.required' => 'Isi Stok Barang!',
            'ditarik.required' => 'Isi Ditariknya Barang!',
        ];

    }
}
