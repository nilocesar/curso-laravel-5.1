<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Painel\Carro;
use Illuminate\Http\Request;
use Validator;
use Cache;
use Crypt;

class CarrosController extends Controller
{

	public function getIndex(){
		$carros = Carro::paginate(2);

		$titulo = 'Listagem dos Carros';

		return view('painel.carros.index', compact('carros', 'titulo'));
	}

	public function getAdicionar(){
		$titulo = 'Adicionar Novo Carro';

		return view('painel.carros.create-edit', compact('titulo'));
	}

	public function postAdicionar(Request $request){
		/*
		$carro = new Carro;
		$carro->nome = $request->input('nome');
		$carro->placa = $request->input('placa');
		$carro->save();
		*/
		$dadosForm = $request->except('file');

		$validator = Validator::make($dadosForm, Carro::$rules);
		if( $validator->fails() ){
			return redirect('carros/adicionar')
						->withErrors($validator)
						->withInput();
		}
		$file = $request->file('file');

		if( $request->hasFile('file') && $file->isValid() ){
			if($file->getClientMimeType() == "image/jpeg" || $file->getClientMimeType() == "image/png"){
				$file->move('assets/uploads/images', $file->getClientOriginalName());
			}
		}


		$carro = Carro::create($dadosForm);

		return redirect("carros/editar/$carro->id");
	}

	public function getEditar($idCarro){
		$carro = Carro::find($idCarro);

		return view('painel.carros.create-edit', compact('carro'));
	}

	public function postEditar(Request $request, $idCarro){
		$dadosForm = $request->except('_token');

		$validator = Validator::make($dadosForm, Carro::$rules);
		if( $validator->fails() ){
			return redirect("carros/editar/$idCarro")
						->withErrors($validator)
						->withInput();
		}

		Carro::where('id', $idCarro)->update($dadosForm);

		return redirect('carros');
	}

	public function getDeletar($idCarro){
		$carro = Carro::find($idCarro);
		$carro->delete();

		return redirect('carros');
	}

	public function getListaCarrosLuxo(){
		return 'Listando os carros de luxo';
	}

	public function missingMethod($params = array()){
		return 'Erro 404, página não encontrada!';
	}

	public function getListarCarrosCache(){

		// Cache::put('carros', Carro::all() , 3);
		// $carros = Cache::get('carros','Nao existe carros');

		$carros = Cache::remember('carros', 3, function() {
		    return Carro::all();
		});


		$titulo = Crypt::encrypt('Cache Carros');

		return view('painel.carros.cache', compact('carros','titulo'));

		//return $carros;
	}
}