<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotorController extends Controller
{
    public function index()
    {

        $data = Motor::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Data!',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'mesin'     => 'required',
                'suspensi'   => 'required',
                'transmisi'   => 'required',
                

            ],
            [
                'mesin.required' => 'Harap Lengkapi Data!',
                'suspensi.required' => 'Harap Lengkapi Data!',
                'transmisi.required' => 'Harap Lengkapi Data!',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Motor::create([
                'mesin'     => $request->input('mesin'),
                'suspensi'   => $request->input('suspensi'),
                'transmisi'   => $request->input('transmisi'),
             
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $data = Motor::find($id);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Detail data!',
                'data'    => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'mesin'     => 'required',
                'suspensi'   => 'required',
                'transmisi'   => 'required',


            ],
            [
                'mesin.required' => 'Harap Lengkapi Data!',
                'suspensi.required' => 'Harap Lengkapi Data!',
                'transmisi.required' => 'Harap Lengkapi Data!',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Motor::find($request->input('id'))->update([
                'mesin'     => $request->input('mesin'),
                'suspensi'   => $request->input('suspensi'),
                'transmisi'   => $request->input('transmisi'),
             
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'data Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'data Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function delete($id)
    {
        $data = Motor::findOrFail($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'data Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data Gagal Dihapus!',
            ], 400);
        }
    }
}
