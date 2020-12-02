@extends('layouts.backend')
@section('title','Usuários')

<!doctype html>
<html lang="pt-br">
@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">''
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/oneui.min.css') }}">

@endsection

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
            <a class="btn btn-primary" href="{{route('usuario.inserir')}}"><i class="fa fa-plus"></i> Inserir Novo</a>
            <button type="button" class="btn btn-danger js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;"><span class="click-ripple animate" style="height: 85.5938px; width: 85.5938px; top: -13.7969px; left: 13.2031px;"></span>
                <i class="fa fa-fw fa-plus mr-1"></i fa-times> Fechar </button>
        </div>
    </div>
</div>

<body>
    <div class="block">
        <div class="block-content block-content-full">
            <table id="example" class="table table-bordered table-sm  table-vcenter js-dataTable-full">
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
                                <!-- <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#modal-block-normal" title="" data-original-title="Edit Client"> -->
                                <a class="table-action" data-toggle="tooltip" data-original-title="Editar Usuário" href="{{route('usuario.edit_usuario',$usuario)}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Deletar Usuário" href="{{ route('usuario.delete',$usuario) }}" onclick="event.preventDefault();
                                document.getElementById('delete-form-{{$usuario->id}}').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form id="delete-form-{{$usuario->id}}" + action="{{route('usuario.delete', $usuario)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <!-- </button> -->
                            </div>
        </div>


        @csrf
        @method('DELETE')
    </div>
    </td>
    @endforeach

    @endsection

    @section('js_after')
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/pages/be_tables_datatables.min.js') }}"></script>

    @endsection
</body>


<script>
    $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
                    }
                });
    }
</script>


</html>