<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        Documento::create($request->all());
    }
    
    public function traerDocumentos()
    {       
        return Documento::all();
    }

    public function eliminarDocumento(Request $request)
    {               
        $data = Documento::find($request->IdDocumento);
        $data->delete();
    }
    public function getDocumento(Request $request)
    {               
        $data = Documento::findOrFail($request->id);
        return $data;
    }

    public function editarDocumento(Request $request)
    {                       
        $data = Documento::findOrFail($request->IdDocumento);
        $data->documento = $request->documento;
        $data->proceso = $request->proceso;
        $data->tipo = $request->tipo;
        $data->codigo = $request->codigo;
        $data->save();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
