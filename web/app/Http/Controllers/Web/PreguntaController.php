<?php

namespace App\Http\Controllers\Web;

use App\Models\Pregunta;
use App\Models\Seccion;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Seccion $seccion)
    {
        return view('preguntas.create', compact('seccion'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Pregunta $pregunta)
    {
        //
    }

    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
