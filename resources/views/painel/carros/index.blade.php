@extends('painel.templates.index')

@section('slide')
	@parent
	Conteúdo do slide
@endsection


@section('content')
	<p>{!!HTML::link('carros/adicionar', 'Cadastrar Novo Carro', ['class' => 'btn btn-success'])!!}</p>

	<h1>Listagem dos carros do painel ({{$carros->total()}})</h1>
	{!!'<h2>Olá eu sou um h2</h2>'!!}

	<table class="table table-bordered">
  		<tr>
  			<th>Nome</th>
  			<th>Placa</th>
  			<th width="150">Ações</th>
  		</tr>
			{{-- Listagem dos carros --}}
			@forelse( $carros as $carro )
		<tr>
			<td>{{$carro->nome}}</td>
			<td>{{$carro->placa}}</td>
			<td>{!! HTML::link("carros/editar/{$carro->id}", 'Editar') !!} | {!! HTML::link("carros/deletar/$carro->id", 'Deletar')!!}</td>
		</tr>
			@empty
				<p>Nenhum Carro Cadastrado!</p>
			@endforelse
	</table>

	{!!$carros->render()!!}

{{-- Inclusão da página de captura de e-mail --}}
@include('painel.includes.email')

@endsection