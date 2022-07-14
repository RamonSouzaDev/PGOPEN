<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Encomenda as EncomendaResource;
use App\Models\Encomenda as Encomenda;

class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encomendas = Encomenda::paginate(15);
        return EncomendaResource::collection($encomendas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encomenda = new Encomenda();
        $encomenda->codhistorico = $request->input('codhistorico');
        $encomenda->codstatus = $request->input('codstatus');
        $encomenda->dtstatus = $request->input('dtstatus');
        $encomenda->hrstatus = $request->input('hrstatus');
        $encomenda->status = $request->input('status');
        $encomenda->observacao = $request->input('observacao');
        $encomenda->codremessa = $request->input('codremessa');

        if( $encomenda->save() ){
          return new EncomendaResource( $encomenda );
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
        $encomenda = Encomenda::find($id);
        return new EncomendaResource($encomenda);
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
        $encomenda = Encomenda::findOrFail($request->id);
        $encomenda->codhistorico = $request->input('codhistorico');
        $encomenda->codstatus = $request->input('codstatus');
        $encomenda->dtstatus = $request->input('dtstatus');
        $encomenda->hrstatus = $request->input('hrstatus');
        $encomenda->status = $request->input('status');
        $encomenda->observacao = $request->input('observacao');
        $encomenda->codremessa = $request->input('codremessa');
        
        if( $encomenda->save() ){
          return new EncomendaResource( $encomenda );
        }
    }

}
