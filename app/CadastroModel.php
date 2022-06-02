<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadastroModel extends Model
{
    protected $table = "cadastro";
    protected $primaryKey = 'id';

    public $timestamp = false;

    protected $fillabel = ['nome','email','senha','situacao','criado_at','excluido_at','atualizado_at'];
}
