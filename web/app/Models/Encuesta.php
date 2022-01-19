<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'encuestas';

    protected $primaryKey = '_id';

    protected $guarded = [];

    public function aplicaciones_encuestas()
    {
        return $this->hasMany(AplicacionEncuesta::class);
    }

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'encuesta_id');
    }

    public function encuestador()
    {
        return $this->belongsTo(User::class, 'encuestador_id');
    }

    public function incrementDay()
    {
        $stringFecha = substr($this->fecha_vigencia, 0, 8);
        $day = substr($this->fecha_vigencia, 8, 2);
        $day = $day + 1;
        return $stringFecha . $day;
    }
}
