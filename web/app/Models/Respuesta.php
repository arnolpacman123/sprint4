<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'respuestas';

    protected $guarded = [];

    public function aplicacion_encuesta()
    {
        return $this->belongsTo(AplicacionEncuesta::class, 'aplicacion_encuesta_id');
    }

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }

    public function valores()
    {
        return $this->hasMany(Valor::class, 'respuesta_id');
    }
}
