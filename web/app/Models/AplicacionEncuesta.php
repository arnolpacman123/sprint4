<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class AplicacionEncuesta extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'aplicaciones_encuestas';

    protected $guarded = [];

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'encuesta_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'aplicacion_encuesta_id');
    }
}
