<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    protected $primaryKey = 'id_sucursales';
    protected $fillable = [
        'name',
        'location',
        'phone'
    ];
}
