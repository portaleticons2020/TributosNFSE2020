@extends('layouts.backend')
@section('title','Usuários')

<!doctype html>
<html lang="pt-br">

<?php
if (!isset($id)) {
    $id = "";
}
?>

@section('content')

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <h2>Cadastro de Usuários</h2>
        </div>
        <div class="col-sm-6 text-right h1">
            <a class="btn btn-primary" href="{{route('usuario.inserir')}}">
                <i class="fa fa-plus">
                    <span class="click-ripple animate" style="height: 85.5938px; width: 85.5938px; top: -13.7969px; left: 13.2031px;"></span>
                </i> Inserir Novo</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
            }
        });
    })
</script>




<?php
if (@$id != "") {
    echo "<script>$('#exampleModal').modal('show');</script>";
}
?>

<body>
    <div class="block">
        <div class="block-content block-content-full">
            <table id="dataTable" class="table table-bordered table-sm  table-vcenter js-dataTable-full">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Cód.</th>
                        <th style="width: 50%;">Nome</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="text-center">{{$usuario->id}}</td>
                        <td class="font-w600">
                            <a href="javascript:void(0)">{{$usuario->nome}}</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <em class="text-muted">{{$usuario->email}}</em>
                        </td>
                        <td class="text-center">
                            <?php
                            if ($usuario->nivel == '0') {
                                echo '<span class="badge badge-warning">Visitante</span>';
                            } else if ($usuario->nivel == '1') {
                                echo '<span class="badge badge-danger">Adminstrador</span>';
                            } else if ($usuario->nivel == '2') {
                                echo '<span class="badge badge-success">Usuário</span>';
                            }
                            ?>
                        </td>

                        <td class="text-center">
                            <div class="btn-group">
                                <a class="table-action" data-toggle="tooltip" data-original-title="Editar Usuário" href="{{route('usuario.edit_usuario',$usuario)}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="table-action" href="{{route('usuario.modal', $usuario)}}"  data-toggle="modal"  data-target="#basicExampleModal" method="post">
                                    <i data-toggle="tooltip" data-original-title="excluir Usuário" class="fas fa-trash"></i>
                                </a>
                            </div>
        </div>
        @csrf
        @method('DELETE')
    </div>
    </td>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir o registro de nome {{$usuario->nome}} ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="delete-form-{{$usuario->id}}" + action="{{route('usuario.delete', $usuario)}}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection



</body>


</html>