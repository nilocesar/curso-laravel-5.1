@extends('painel.templates.index')

@section('content')
<p>{!!HTML::link('users/adicionar', 'Cadastrar Novo Usuário', ['class' => 'btn btn-success'])!!}</p>

<h1>Listagem dos usuários do painel ({{$users->total()}})</h1>

<table class="table table-bordered">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th width="150">Ações</th>
    </tr>
    {{-- Listagem dos carros --}}
    @forelse( $users as $user )
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{!! HTML::link("users/editar/{$user->id}", 'Editar') !!} | {!! HTML::link("users/deletar/$user->id", 'Deletar')!!}</td>
    </tr>
    @empty
    <p>Nenhum Usuário Cadastrado!</p>
    @endforelse
</table>

{!!$users->render()!!}

@endsection