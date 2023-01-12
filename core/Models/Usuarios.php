<?php
namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Expression as raw;
use Illuminate\Database\Capsule\Manager as Capsule;

// Ejemplo de implementacion de eloquent

class Usuarios extends Model {
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = [
        "user_id",
        "name",
        "created_at",
        "updated_at"
    ];
}

