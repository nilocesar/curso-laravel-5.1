<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use Illuminate\Validation\Factory;
use App\Models\Painel\Pai;

class PaiController extends StandardController
{
    protected $request;
    protected $model;
    protected $validator;
    protected $nameView = 'pais';
    protected $titulo = 'Pais';


    public function __construct(Request $request, Pai $pai, Factory $validator) {
        $this->request      = $request;
        $this->model        = $pai;
        $this->validator    = $validator;
    }
    
    
    public function getIndex(){
        $data = $this->model->paginate($this->totalItensPorPagina);
        
        $titulo = $this->titulo;
        
        return view("painel.{$this->nameView}.index", compact('data', 'titulo'));
    }
}