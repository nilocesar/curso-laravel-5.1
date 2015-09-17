<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection as collect;

class CollectionController extends Controller {

    public $produtos;
    public $collect;

    public function __construct()
    {
        $this->produtos = [
            ["codigo"=>1, "produto"=>'Abacaxi', "preco"=>'2,99', "categoria"=>'frutas'],
            ["codigo"=>2, "produto"=>'Laranja', "preco"=>'1,50', "categoria"=>'frutas'],
            ["codigo"=>3, "produto"=>'Picanha', "preco"=>'33,00', "categoria"=>'Carnes'],
            ["codigo"=>4, "produto"=>'Lombo', "preco"=>'23,00', "categoria"=>'Carnes'],
            ["codigo"=>5, "produto"=>'Suco de Uva', "preco"=>'1,00', "categoria"=>'Bebidas']
        ];

        $this->collect = collect($this->produtos);
    }


    public function getIndex() {
       return "Modulo 03 - Aula 08 - collects";
    }


    public function getArray(){

        dd($this->collect->toArray());
    }



    public function getJson(){

        dd($this->collect->toJson());
    }



    public function getChunk($n){
        $chunks = $this->collect->chunk($n);

        dd($chunks->toArray());
    }



    public function getContains($i,$v){
        
        if($this->collect->contains($i,$v))
        {
            $msg = 'A collect contém '.$v;
        }else {
            $msg = 'Não foi encontrado '.$v.' na collect';
        }

        return $msg;
    }


    public function getCount()
    {
        return $this->collect->count();
    }

    public function getWhere($c,$v)
    {
        $where = $this->collect->where($c,$v);

        dd($where->toArray());
    }

    public function getUsers(){

        $users = \App\User::all();

        dd($users->toArray());

    }


}
