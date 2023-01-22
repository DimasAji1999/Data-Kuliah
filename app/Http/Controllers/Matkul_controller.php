<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_matkul;

use App\Models\M_siswa;

class Matkul_controller extends Controller
{
    public function index(){
        $title = 'List Matkul';
        $data = M_matkul::orderBy('matkul', 'asc')->get();

        return view('matkul.index',compact('title','data'));
    }
    public function add(){
        $title = 'Tambah Matkul';
        $siswa = M_siswa::get();

        return view('matkul.add',compact('title','siswa'));
    }
    public function store( Request $request){
        $this->validate($request,[
            'siswa'=>'required',
            'matkul'=>'required',
            'sks'=>'required'
        ]);
        $data = $request->except(['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        M_matkul::insert($data);

        \Session::flash('sukses','Data berhasil ditambahkan');
        return redirect('matkul/add');
    }
    public function edit($id){
        $title = 'Update Matkul';
        $siswa = M_siswa::get();
        $dt = M_matkul::find($id);

        return view('matkul.edit',compact('title','siswa','dt'));
    }   
    public function update( Request $request, $id){
        $this->validate($request,[
            'siswa'=>'required',
            'matkul'=>'required',
            'sks'=>'required'
        ]);
        $data = $request->except(['_token','_method']);
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        M_matkul::where('id',$id)->update($data);

        \Session::flash('sukses','Data berhasil ditambahkan');
        return redirect('matkul/add');
    }
    public function delete($id){
        try{
            M_matkul::where('id', $id)->delete();

            \Session::flash('sukses','Data Berhasil Dihapus');
            }catch (Exception $e){
                    \Session::flash('gagal',$e->getMessage());
            }
            return redirect()->back();
            }
}
