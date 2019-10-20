<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedidos;

class Produto extends Model
{
    protected $table = "produtos";
    protected $fillable = [
        'name','descricao'
    ];

    protected $primaryKey = "id";
    public function id(){
        return $this->hasMany(Pedidos::class);
    }
}
