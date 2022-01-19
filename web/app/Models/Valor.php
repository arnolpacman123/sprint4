<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Valor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'valores';

    protected $guarded = [];

    public function respuesta()
    {
        $this->belongsTo(Respuesta::class, 'respuesta_id');
    }
}
