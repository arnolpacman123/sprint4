<?php

namespace App\Http\Controllers\Api;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function index()
    {
        $encuestas = Encuesta::with('secciones.preguntas.opciones')->get();
        return response($encuestas);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
