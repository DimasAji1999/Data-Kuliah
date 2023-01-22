<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatterHelper;
use Illuminate\Http\Request;
use App\Models\M_matkul;
use Illuminate\Support\Facades\Auth;

class MatkulController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->component = "Component Matkul";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $M_matkul = M_matkul::get();

            $M_matkul_list = array("component" => $this->component, "data_component" => $M_matkul);

            if ($M_matkul == null)
                return ResponseFormatterHelper::successResponse(null, 'Data null');
            else if ($M_matkul)
                return ResponseFormatterHelper::successResponse($M_matkul_list, 'Success Get Data Matkul');
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
            $M_matkuls = [
                'siswa' => $request->siswa,
                'matkul' => $request->matkul,
                'sks' => $request->sks,
            ];

		    M_matkul::create($M_matkuls);

            return ResponseFormatterHelper::successResponse($M_matkuls, 'Create Matkul');
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
            $M_matkul = M_matkul::find($id);

            $M_matkul_list = array("component" => $this->component, "data_component" => $M_matkul);

            if ($M_matkul == null)
                return ResponseFormatterHelper::successResponse(null, 'Data null');
            else if ($M_matkul)
                return ResponseFormatterHelper::successResponse($M_matkul_list, 'Success Get by ID Matkul');
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
            $M_matkuls = M_matkul::find($id);

            $M_matkulx = [
                'siswa' => $request->siswa,
                'matkul' => $request->matkul,
                'sks' => $request->sks,
            ];

            $M_matkuls->update($M_matkulx);

            return ResponseFormatterHelper::successResponse($M_matkulx, 'Update Matkul Success');
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
            M_matkul::destroy($id);

            return ResponseFormatterHelper::successResponse('Matkul', 'Delete Matkul Success');
        } catch (\Throwable $th) {
            return ResponseFormatterHelper::errorResponse(null, $th);
        }
    }
}