<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'id_inventory';
    protected $fillable = [
        'sucursal_id', 
        'name_comic', 
    ];

    public function sucursal(){
        return $this->hasOne(Sucursal::class, 'id_sucursales', 'sucursal_id');
    }
}
