<?php
namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Expression as raw;
use Illuminate\Database\Capsule\Manager as Capsule;

// Ejemplo de implementacion de eloquent

class DataBienes extends Model {
    public $timestamps = false;
    protected $table = 'data_bienes';
    protected $fillable = [
        "direccion",
        "ciudad",
        "telefono",
        "codigo_postal",
        "tipo",
        "precio"
    ];
}

