<?php
namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Expression as raw;
use Illuminate\Database\Capsule\Manager as Capsule;

// Ejemplo de implementacion de eloquent

class MisBienes extends Model {
    public $timestamps = false;
    protected $table = 'mis_bienes';
    protected $fillable = [
        "data_bienes_id"
    ];

    public function data_bienes() {
        return $this->belongsTo(DataBienes::class, 'data_bienes_id');
    }

}

