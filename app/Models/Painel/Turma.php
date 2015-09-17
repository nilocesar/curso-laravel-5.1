<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['nome'];


    public $rules = [
        'nome' => 'required|min:3|max:60',
    ];
}