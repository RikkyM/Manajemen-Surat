<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Profil extends FormRequest
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
        $user = Auth::user()->id;
        return [
            'email' => "required|min:8|max:35|unique:users,email,$user",
            'nama' => 'required|min:3|max:30',
            'pekerjaan' => 'required|min:5|max:30',
            'ponsel' => 'required|min:10|max:13',
            'nik' => 'required|min:16|max:16',
            'agama' => 'required',
            'tempat_lahir' => 'required|min:5|max:20',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => "required|min:8|max:50"
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email perlu diisi',
            'email.min' => 'Email minimal 8 angka',
            'email.max' => 'Email maksimal 35 angka',
            'email.unique' => 'Email sudah digunakan',
            'nama.required' => 'Nama perlu diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 30 karakter',
            'pekerjaan.required' => 'Pekerjaan perlu diisi',
            'pekerjaan.min' => 'Pekerjaan minimal 5 karakter',
            'pekerjaan.max' => 'Pekerjaan maksimal 30 karakter',
            'ponsel.required' => 'Nomor HP perlu diisi',
            'ponsel.min' => 'Nomor HP minimal 10 karakter',
            'ponsel.max' => 'Nomor HP maksimal 13 karakter',
            'nik.required' => 'Nomor Induk Kependudukan perlu diisi',
            'nik.min' => 'Nomor Induk Kependudukan minimal 16 angka',
            'nik.max' => 'Nomor Induk Kependudukan maksimal 16 angka',
            'agama.required' => 'Agama perlu diisi',
            'tempat_lahir.required' => 'Tempat Lahir perlu diisi',
            'tempat_lahir.min' => 'Tempat Lahir minimal 5 angka',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 20 angka',
            'jenis_kelamin.required' => 'Jenis kelamin perlu diisi',
            'tanggal_lahir.required' => 'Tanggal lahir perlu diisi',
            'alamat.required' => 'Alamat perlu diisi',
            'alamat.min' => 'Alamat minimal 8 karakter',
            'alamat.max' => 'Alamat maksimal 50 karakter',
        ];
    }
}
