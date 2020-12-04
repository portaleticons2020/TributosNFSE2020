@extends('layouts.backend')
@section('title','Usuários')
@section('content')


<?php
@session_start();

if (!isset($id)) {
    $id = "";
}
?>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <h2>Cadastro de Usuários {{$id}}</h2>
        </div>
        <div class="col-sm-6 text-right h1">
            <a class="btn btn-primary" href="{{route('usuario.inserir')}}">
                <i class="fa fa-plus">
                    <span class="click-ripple animate" style="height: 85.5938px; width: 85.5938px; top: -13.7969px; left: 13.2031px;"></span>
                </i> Inserir Novo</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "order": [
                [0, "desc"]
            ],
            "language": {
                "url": "{{ URL::asset('js/Portuguese-Brasil.json')}}"
            }
        });
    })
</script>



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
                            <a class="table-action" href="{{route('usuario.modal', $usuario)}}" data-toggle="modal" data-target="#modaldelete" method="post">
                                <i data-toggle="tooltip" data-original-title="excluir usuário" class="fas fa-trash"></i>
                            </a>


                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja excluir o Usuário ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="delete-form-{{$usuario->id}}" + action="{{route('usuario.delete', $usuario->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
if (@$id != "") {
    echo "<script>$('#modaldelete').modal('show');</script>";
}
?>

@endsection