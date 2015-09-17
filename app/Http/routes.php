<?php

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){
    Route::controller('alunos', 'Painel\AlunoController');
    Route::controller('turmas', 'Painel\TurmaController');
    
    Route::controller('/', 'Painel\PainelController');
});


// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');


// Password reset link request routes...
//Route::get('recuperar-senha', 'Auth\PasswordController@getEmail');
Route::post('recuperar-senha', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('resetar-senha/{token}', 'Auth\PasswordController@getReset');
Route::post('resetar-senha/', 'Auth\PasswordController@postReset');


<<<<<<< HEAD
Route::controller('/', 'Site\HomeController');
=======
Route::controller('carros', 'CarrosController');

Route::controller('users', 'UserController');

Route::get('sessao/gravar', function(){
	
	echo "GRAVAR: Gravando sessão";
	session(['msg'=>'Gravando sessão no Laravel!']);
	
});

Route::get('sessao/exibir', function(){
	
	$msg = session('msg');

	return $msg;
});

Route::controller('collection', 'CollectionController');


Route::get('email', function(){
	
	Mail::raw('Mensagem de testo puro', function ($m) {
    	 $m->to('querotestar.isso@yahoo.com.br','João')->subject('Enviando E-mails pelo Laravel');
	});


});
>>>>>>> origin/master
