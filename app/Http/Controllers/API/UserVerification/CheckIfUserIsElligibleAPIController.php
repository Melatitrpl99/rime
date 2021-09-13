<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CheckIfUserIsElligibleAPIController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $validate = [
            'nik'          => $user->nik,
            'nama_lengkap' => $user->namaLengkap,
            'jk'           => $user->jk,
            'tempat_lahir' => $user->tempatLahir,
            'tgl_lahir'    => $user->tglLahir,
            'alamat'       => $user->alamat,
            'no_hp'        => $user->noHp,
            'no_wa'        => $user->noWa,
        ];

        $validator = Validator::make($validate, [
            'nik'          => ['required', 'unique:users', 'string', 'max:255'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'jk'           => ['required'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir'    => ['required', 'date'],
            'alamat'       => ['required', 'string', 'max:65535'],
            'no_hp'        => ['nullable', 'unique:users', 'regex:/^(\+62|0)\w+/g'],
            'no_wa'        => ['required_if:no_hp,null', 'unique:users', 'regex:/^(\+62|0)\w+/g'],
        ], [
            'nik.required'          => 'NIK tidak boleh kosong!',
            'nik.unique'            => 'NIK sudah terdaftar!',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong!',
            'jk.required'           => 'Jenis Kelamin tidak boleh kosong!',
            'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong!',
            'tgl_lahir.required'    => 'Tanggal lahir tidak boleh kosong!',
            'alamat.required'       => 'Alamat tidak boleh kosong!',
            'no_hp.required'        => 'Nomor handphone tidak boleh kosong!',
            'no_wa.required_if'     => 'Nomor WA tidak boleh kosong apabila Nomor Handphone kosong',
        ]);

        return response()->json($validator->validate());
    }
}
