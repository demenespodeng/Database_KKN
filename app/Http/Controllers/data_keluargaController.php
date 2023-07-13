<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\data_keluarga;

class data_keluargaController extends Controller
{
    public function index(Request $request){
        $datas = DB::select('select * from data_keluarga');
        return view('data_keluarga.index')
        ->with('datas', $datas);
    }

    public function create() {
        return view('data_keluarga.add');
    }

    public function delete($id) {
        DB::delete('DELETE FROM data_keluarga WHERE id_data = :id_data', ['id_data' => $id]);
        return redirect()->route('data_keluarga.index')->with('success', 'Data berhasil dihapus');
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_data' => 'required',
            'kk' => 'required',
            'namakk' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE data_keluarga SET id_data = :id_data, kk = :kk, namakk = :namakk, alamat = :alamat, dusun = :dusun, desa = :desa, kecamatan = :kecamatan, 
        kota = :kota, provinsi = :provinsi, rt = :rt, rw = :rw WHERE id_data = :id',
        [
            'id' => $id,
            'id_data' => $request->id_data,
            'kk' => $request->kk,
            'namakk' => $request->namakk,
            'alamat' => $request->alamat,
            'dusun' => $request->dusun,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]
        );

        return redirect()->route('data_keluarga.index')->with('success', 'Data data_keluarga berhasil diubah');
    }

    public function edit($id) {
        $data = DB::table('data_keluarga')->where('id_data', $id)->first();

        return view('data_keluarga.edit')->with('data', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'id_data' => 'required',
            'kk' => 'required',
            'namakk' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO data_keluarga(id_data, kk, namakk, alamat, dusun, desa, kecamatan, kota, provinsi, rt, rw) 
        VALUES (:id_data, :kk, :namakk, :alamat, :dusun, :desa, :kecamatan, :kota, :provinsi, :rt, :rw)',
        [
            'id_data' => $request->id_data,
            'kk' => $request->kk,
            'namakk' => $request->namakk,
            'alamat' => $request->alamat,
            'dusun' => $request->dusun,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]
        );

        return redirect()->route('data_keluarga.index')->with('success', 'Data berhasil disimpan');
    }
}
