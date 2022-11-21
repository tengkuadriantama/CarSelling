<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mobil::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Data!',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mesin'     => 'required',
                'kapasitas_penumpang'   => 'required',
                'tipe'   => 'required',
                'stok'   => 'required',


            ],
            [
                'mesin.required' => 'Harap Lengkapi Data!',
                'kapasitas_penumpang.required' => 'Harap Lengkapi Data!',
                'tipe.required' => 'Harap Lengkapi Data!',
                'stok.required' => 'Harap Lengkapi Data!',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Mobil::create([
                'mesin'     => $request->input('mesin'),
                'kapasitas_penumpang'   => $request->input('kapasitas_penumpang'),
                'tipe'   => $request->input('tipe'),
                'stok'   => $request->input('stok'),

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mobil::find($id);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mesin'     => 'required',
                'kapasitas_penumpang'   => 'required',
                'tipe'   => 'required',
                'stok'   => 'required',


            ],
            [
                'mesin.required' => 'Harap Lengkapi Data!',
                'kapasitas_penumpang.required' => 'Harap Lengkapi Data!',
                'tipe.required' => 'Harap Lengkapi Data!',
                'stok.required' => 'Harap Lengkapi Data!',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Mobil::find($request->input('id'))->update([
                'mesin'     => $request->input('mesin'),
                'kapasitas_penumpang'   => $request->input('kapasitas_penumpang'),
                'tipe'   => $request->input('tipe'),
                'stok'   => $request->input('stok'),

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mobil::findOrFail($id);
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
