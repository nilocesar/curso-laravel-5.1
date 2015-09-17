<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use Illuminate\Validation\Factory;
use App\Models\Painel\Turma;

class TurmaController extends StandardController
{
    protected $request;
    protected $model;
    protected $validator;
    protected $nameView = 'turmas';
    protected $titulo = 'Turmas';


    public function __construct(Request $request, Turma $turma, Factory $validator) {
        $this->request      = $request;
        $this->model        = $turma;
        $this->validator    = $validator;
    }
}