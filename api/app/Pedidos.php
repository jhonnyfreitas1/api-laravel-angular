<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Produto;

class Pedidos extends Model
{
    protected $table = "pedido";
    protected $fillable = [
        'email_comprador','id_produto'
    ];
    protected $primaryKey = "id";
    public function email_comprador(){
        return $this->belongsTo(User::class);
    }
    public function id_produto(){
        return $this->belongsTo(Produto::class);
    }
}
