<?php

namespace App\Http\Controllers\Api;

use App\Models\AplicacionEncuesta;
use App\Models\Respuesta;
use App\Models\Valor;
use Illuminate\Http\Request;

class AplicacionEncuestaController extends Controller
{
    public function index()
    {
        $aplicaciones_encuestas = AplicacionEncuesta::with('respuestas.valores')->get();
        return response($aplicaciones_encuestas);
    }

    public function store(Request $request)
    {
        $aplicacion_encuesta = new AplicacionEncuesta();
        $aplicacion_encuesta = $aplicacion_encuesta->create([
            'fecha_creacion' => date('Y-m-d'),
            'encuesta_id' => $request->input('encuesta_id'),
        ]);
        foreach ($request->input('respuestas') as $respuesta) {
            $newRespuesta = new Respuesta();
            $newRespuesta = $newRespuesta->create([
                'pregunta_id' => $respuesta['pregunta_id'],
                'aplicacion_encuesta_id' => $aplicacion_encuesta->_id,
            ]);
            foreach ($respuesta['valores'] as $valor) {
                $valores[] = $valor;
                $newValor = new Valor();
                $newValor = $newValor->create([
                    'valor' => $valor['valor'],
                    'respuesta_id' => $newRespuesta->_id,
                ]);
            }
        }
        return response($aplicacion_encuesta->load('respuestas.valores'));
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
