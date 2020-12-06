@extends('layouts.backend')
@section('title','Usuários')
@section('content')



<?php
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



<!-- <script type="text/javascript">
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
</script> -->



<body>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
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


                                    <form method="post" action="{{route('usuario.delete', $usuario->id)}}" onclick="return confirm('Deseja mesmo deletar o usuário {{$usuario->id}}?');">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit"  style="border:none; background-color: transparent;">
                                            <i class="fas fa-trash" style="color:red" data-toggle="tooltip" data-original-title="excluir usuario" ></i>
                                        </button>
                                    </form>



                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    @endsection

</body>