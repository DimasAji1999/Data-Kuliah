<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_siswa;

class Siswa_controller extends Controller
{
    public function index(){
        $title = 'Master Data Siswa';
        $data = M_siswa::orderBy('nama','asc')->get();

        return view('siswa.index',compact('title','data'));
    }
    public function add(){
        $title = 'Tambah Data Siswa';

        return view('siswa.add',compact('title'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'nama'=>'required',
            'nim'=>'required',
            'no_telp'=>'required',
            'alamat'=>'required'
        ]);
        $a['nama'] = $request->nama;
        $a['nim'] = $request->nim;
        $a['no_telp'] = $request->no_telp;
        $a['alamat'] = $request->alamat;
        $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        M_siswa::insert($a);
        \Session::flash('sukses','Data Berhasil Ditambahkan');

        return redirect('siswa');
    }
    public function edit($id){
        $title = 'Update Data Siswa';
        $dt = M_siswa::find($id);

        return view('siswa.edit',compact('title','dt'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'nama'=>'required',
            'nim'=>'required',
            'no_telp'=>'required',
            'alamat'=>'required'
        ]);
        $a['nama'] = $request->nama;
        $a['nim'] = $request->nim;
        $a['no_telp'] = $request->no_telp;
        $a['alamat'] = $request->alamat;
        // $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        M_siswa::where('id',$id)->update($a);
        \Session::flash('sukses','Data Berhasil Diupdate');

        return redirect('siswa');
    }
    public function delete($id){
        try{
            M_siswa::where('id', $id)->delete();

            \Session::flash('sukses','Data Berhasil Dihapus');
    }catch (Exception $e){
            \Session::flash('gagal',$e->getMessage());
    }
    return redirect('siswa');
    }
}
