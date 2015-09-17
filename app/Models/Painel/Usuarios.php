<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
	protected $table = 'users';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

}