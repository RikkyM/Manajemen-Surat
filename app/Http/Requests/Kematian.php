<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Kematian extends FormRequest
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
    public function rules(): array
    {
        return [
            'nama' => 'required|min:3|max:30',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'tempat_meninggal' => 'required|min:5|max:20',
            'tempat_lahir' => 'required|min:5|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required|min:5|max:30',
            'alamat' => 'required|min:8|max:50'
        ];
    }

    
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama perlu diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 30 karakter',
            'tanggal.required' => 'Tanggal perlu diisi',
            'jam.required' => 'Jam perlu diisi',
            'tempat_meninggal.required' => 'Tempat Lahir perlu diisi',
            'tempat_meninggal.min' => 'Tempat Lahir minimal 5 angka',
            'tempat_meninggal.max' => 'Tempat Lahir maksimal 20 angka',
            'tempat_lahir.required' => 'Tempat Lahir perlu diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 5 angka',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 20 angka',
            'tanggal_lahir.required' => 'Tanggal lahir perlu diisi',
            'jenis_kelamin.required' => 'Jenis kelamin perlu diisi',
            'pekerjaan.required' => 'Pekerjaan perlu diisi',
            'pekerjaan.min' => 'Pekerjaan minimal 5 karakter',
            'pekerjaan.max' => 'Pekerjaan maksimal 30 karakter',
            'alamat.required' => 'Alamat perlu diisi',
            'alamat.min' => 'Alamat minimal 8 karakter',
            'alamat.max' => 'Alamat maksimal 50 karakter',
        ];
    }
}
