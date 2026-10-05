<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MataKuliahController extends Controller
{

    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    public function create(){
        return "Membuat Data matakuliah: ";
    }

    public function store(Request $request){
        return "Menyimpan data matakuliah: ";
    }

    public function show(string $param1){
        if($param1 == 'ST445'){
            return view ('halaman-matakuliah-show');
        }else{
            return view('masukkan-kode-matakuliah');
        }
    }

    public function edit(string $id){
        return "Mengedit data matakuliah: ";
    }

    public function update(Request $request, String $id){
        return "Mengupdate data matakuliah: ";
    }

    public function destroy(string $id){
        return "Menghapus data matakuliah: ";
    }
}
