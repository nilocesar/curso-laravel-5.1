@extends('painel.templates.index')

@section('content')

<h1 class="titulo-pg-painel">Listagem  das Turmas ({{$data->count()}}):</h1>

<div class="divider"></div>

<div class="col-md-12">
    <form class="form-padrao form-inline padding-20 form-pesquisa" method="POST" send="/painel/alunos/pesquisar/">
        <a href="" class="btn-cadastrar" data-toggle="modal" data-target="#modalGestao"><i class="fa fa-plus-circle"></i> Cadastrar</a>
        <input type="text" placeholder="Pesquisa" class="texto-pesquisa">
    </form>
    
    @if( isset($palavraPesquisa) )
        <p>Resultados para a pesquisa <b>{{$palavraPesquisa}}</b></p>
    @endif
</div>

<table class="table table-hover">
    <tr>
        <th>Nome</th>
        <th width="70px;"></th>
    </tr>
    @forelse($data as $turma)
    <tr>
        <td>{{$turma->nome}}</td>
        <td>
            <a class="edit" onclick="edit('/painel/turmas/editar/{{$turma->id}}')">
                <i class="fa fa-pencil-square-o"></i>
            </a>
            <a class="delete" onclick="del('/painel/turmas/deletar/{{$turma->id}}')">
                <i class="fa fa-times"></i>
            </a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="500">Nenhuma turma cadastrada!</td>
    </tr>
    @endforelse
</table>

<nav>
    {!!$data->render()!!}
</nav>




<!-- Modal Para Gestão -->
<div class="modal fade" id="modalGestao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-padrao4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Gestão de Turma</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning msg-war" role="alert" style="display: none"></div>
                <div class="alert alert-success msg-suc" role="alert" style="display: none"></div>

                <form class="form-padrao form-gestao" action="/painel/turmas/adicionar" send="/painel/turmas/adicionar">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" placeholder="Nome da Turma">
                    </div>
                    
                    <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')    
    <script>
        var urlAdd = '/painel/turmas/adicionar';
    </script>
@endsection