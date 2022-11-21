<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kendaraan::with('idmotor','idmobil')->latest()->get();
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
                'tahun_keluaran' => 'required',
                'warna' => 'required',
                'harga' => 'required',
                'jenis_kendaraan' => 'required',
                'stok' => 'required',
                'status' => 'required',

            ],
            [
    
                'tahun_keluaran.required' => 'Harap Lengkapi Data!',
                'warna.required' => 'Harap Lengkapi Data!',
                'harga.required' => 'Harap Lengkapi Data!',
                'jenis_kendaraan.required' => 'Harap Lengkapi Data!',
                'stok.required' => 'Harap Lengkapi Data!',
                'status.required' => 'Harap Lengkapi Data!'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Kendaraan::create([
                'tahun_keluaran' => $request->input('tahun_keluaran'),
                'warna' => $request->input('warna'),
                'harga' => $request->input('harga'),
                'jenis_kendaraan' => $request->input('jenis_kendaraan'),
                'stok' => $request->input('stok'),
                'status' => $request->input('status'),
                'id_kendaraan_motor' => $request->input('id_kendaraan_motor'), 
                'id_kendaraan_mobil' => $request->input('id_kendaraan_mobil')
                
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
        $data = Kendaraan::with('idmotor','idmobil')->find($id);

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
                'tahun_keluaran' => 'required',
                'warna' => 'required',
                'harga' => 'required',
                'jenis_kendaraan' => 'required',
                'stok' => 'required',
                'status' => 'required',

            ],
            [

                'tahun_keluaran.required' => 'Harap Lengkapi Data!',
                'warna.required' => 'Harap Lengkapi Data!',
                'harga.required' => 'Harap Lengkapi Data!',
                'jenis_kendaraan.required' => 'Harap Lengkapi Data!',
                'stok.required' => 'Harap Lengkapi Data!',
                'status.required' => 'Harap Lengkapi Data!'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Kendaraan::find($request->input('id'))->update([
                'tahun_keluaran' => $request->input('tahun_keluaran'),
                'warna' => $request->input('warna'),
                'harga' => $request->input('harga'),
                'jenis_kendaraan' => $request->input('jenis_kendaraan'),
                'stok' => $request->input('stok'),
                'status' => $request->input('status'),
                'id_kendaraan_motor' => $request->input('id_kendaraan_motor'),
                'id_kendaraan_mobil' => $request->input('id_kendaraan_mobil')
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
        $data = Kendaraan::findOrFail($id);
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