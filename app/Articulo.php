<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    
    protected $fillable = ['nombre','familia_id','grupo','color','longitud','ancho','imagen'];

    public function familia()
    {
        return $this->belongsTo('App\Familia');
    }
}
