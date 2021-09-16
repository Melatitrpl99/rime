<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class CheckIfUserIsElligibleAPIController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        if ($user->hasRole('reseller')) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $validate = [
            'nik'          => $user->nik,
            'nama_lengkap' => $user->nama_lengkap,
            'jk'           => $user->jk,
            'tempat_lahir' => $user->tempat_lahir,
            'tgl_lahir'    => $user->tgl_lahir,
            'alamat'       => $user->alamat,
            'no_hp'        => $user->no_hp,
            'no_wa'        => $user->no_wa,
        ];

        $unique = Rule::unique('users')->ignore($user);

        $validator = Validator::make($validate, [
            'nik'          => ['required', $unique, 'string', 'max:255'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'jk'           => ['required'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir'    => ['required', 'date'],
            'alamat'       => ['required', 'string', 'max:65535'],
            'no_hp'        => ['nullable', $unique, 'regex:/^(\+62|0)\w+/'],
            'no_wa'        => ['required_if:no_hp,null', $unique, 'regex:/^(\+62|0)\w+/'],
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

        return response()->json(!$validator->fails());
    }
}
