<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'secciones';

    protected $guarded = [];

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'encuesta_id');
    }

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'seccion_id');
    }
}
