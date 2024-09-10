<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Domisili extends FormRequest
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
            'nik' => 'required|size:16',
            'kk' => 'required|size:16',
            'tempat_lahir' => 'required|min:5|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required|min:4|max:20',
            'agama' => 'required',
            'pekerjaan' => 'required|min:5|max:30',
            'alamat' => "required|min:8|max:50"
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama perlu diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 30 karakter',
            'nik.required' => 'Nik perlu diisi',
            'nik.size' => 'Nik harus berisi 16 angka',
            'kk.required' => 'Nomor Kartu Keluarga perlu diisi',
            'kk.size' => 'Nomor Kartu Keluarga harus berisi 16 angka',
            'tempat_lahir.required' => 'Tempat Lahir perlu diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 5 angka',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 20 angka',
            'tanggal_lahir.required' => 'Tanggal lahir perlu diisi',
            'jenis_kelamin.required' => 'Jenis kelamin perlu diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan perlu diisi',
            'kewarganegaraan.min' => 'Kewarganegaraan minimal 4 angka',
            'kewarganegaraan.max' => 'Kewarganegaraan maksimal 20 angka',
            'agama.required' => 'Agama perlu diisi',
            'pekerjaan.required' => 'Pekerjaan perlu diisi',
            'pekerjaan.min' => 'Pekerjaan minimal 5 karakter',
            'pekerjaan.max' => 'Pekerjaan maksimal 30 karakter',
            'alamat.required' => 'Alamat perlu diisi',
            'alamat.min' => 'Alamat minimal 8 karakter',
            'alamat.max' => 'Alamat maksimal 50 karakter',
        ];
    }
}
