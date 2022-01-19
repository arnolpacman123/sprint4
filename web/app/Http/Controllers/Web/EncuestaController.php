<?php

namespace App\Http\Controllers\Web;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncuestaController extends Controller
{
    public function index()
    {
        $encuestas = Auth::user()->encuestas;
        return view('encuestas.index', compact('encuestas'));
    }

    public function create()
    {
        return view('encuestas.create');
    }

    public function store(Request $request)
    {
        $encuesta = new Encuesta();
        $encuesta = $encuesta->create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_vigencia' => $request->input('fecha_vigencia'),
            'encuestador_id' => Auth::user()->_id,
        ]);
//        return view('secciones.create', compact('encuesta'));

        return redirect()->route('encuestas.secciones.create', [
            'encuesta' => $encuesta->_id,
        ]);
    }


    public function show(Encuesta $encuesta)
    {
        return view('encuestas.show', compact('encuesta'));
    }

    public function edit(Encuesta $encuesta)
    {
        return view('encuestas.edit', compact('encuesta'));
    }

    public function update(Request $request, Encuesta $encuesta)
    {
        $encuesta->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_vigencia' => $request->input('fecha_vigencia'),
        ]);
        return redirect()->route('encuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Encuesta $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encuesta $encuesta)
    {
        //
    }
}
