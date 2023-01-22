<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatterHelper;
use Illuminate\Http\Request;
use App\Models\M_siswa;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->component = "Component Siswa";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $M_siswa = M_siswa::get();

            $M_siswa_list = array("component" => $this->component, "data_component" => $M_siswa);

            if ($M_siswa == null)
                return ResponseFormatterHelper::successResponse(null, 'Data null');
            else if ($M_siswa)
                return ResponseFormatterHelper::successResponse($M_siswa_list, 'Success Get Data Siswa');
            else
                return ResponseFormatterHelper::errorResponse(null, 'Data null');
        } catch (\Throwable $th) {
            return ResponseFormatterHelper::errorResponse(null, $th);
        }
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
       try {
            $M_siswas = [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ];

		    M_siswa::create($M_siswas);

            return ResponseFormatterHelper::successResponse($M_siswas, 'Create Siswa');
        } catch (\Throwable $th) {
            return ResponseFormatterHelper::errorResponse(null, $th);
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
        try {
            $M_siswa = M_siswa::find($id);

            $M_siswa_list = array("component" => $this->component, "data_component" => $M_siswa);

            if ($M_siswa == null)
                return ResponseFormatterHelper::successResponse(null, 'Data null');
            else if ($M_siswa)
                return ResponseFormatterHelper::successResponse($M_siswa_list, 'Success Get by ID Siswa');
            else
                return ResponseFormatterHelper::errorResponse(null, 'Data null');
        } catch (\Throwable $th) {
            return ResponseFormatterHelper::errorResponse(null, $th);
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
    public function update(Request $request, $id)
    {
        try {
            $M_siswas = M_siswa::find($id);

            $M_siswax = [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ];

            $M_siswas->update($M_siswax);

            return ResponseFormatterHelper::successResponse($M_siswax, 'Update Siswa Success');
        } catch (\Throwable $th) {
            return ResponseFormatterHelper::errorResponse(null, $th);
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
        try {
            M_siswa::destroy($id);

            return ResponseFormatterHelper::successResponse('Siswa', 'Delete Siswa Success');
        } catch (\Throwable $th) {
            return ResponseFormatterHelper::errorResponse(null, $th);
        }
    }
}