<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\detail;

class detailController extends Controller
{
    public function index(Request $request){
        $datas = DB::select('select * from detail');
        return view('detail.index')
        ->with('datas', $datas);
    }

    public function create() {
        return view('detail.add');
    }

    public function delete($id) {
        DB::delete('DELETE FROM detail WHERE id_detail = :id_detail', ['id_detail' => $id]);
        return redirect()->route('detail.index')->with('success', 'Data berhasil dihapus');
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_detail' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE detail SET id_detail = :id_detail, nik = :nik, nama = :nama, ttl = :ttl WHERE id_detail = :id',
        [
            'id' => $id,
            'id_detail' => $request->id_detail,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
        ]
        );

        return redirect()->route('detail.index')->with('success', 'Data detail berhasil diubah');
    }

    public function edit($id) {
        $data = DB::table('detail')->where('id_detail', $id)->first();

        return view('detail.edit')->with('data', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'id_detail' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO detail(id_detail, nik, nama, ttl) VALUES (:id_detail, :nik, :nama, :ttl)',
        [
            'id_detail' => $request->id_detail,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'ttl' => $request->ttl
        ]
        );

        return redirect()->route('detail.index')->with('success', 'Data berhasil disimpan');
    }
}
