@extends('layouts.backend')
@section('title','Instituição')



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
            <h2>Cadastro de Instituições</h2>
        </div>
        <div class="col-sm-6 text-right h1">
            <a class="btn btn-primary" href="{{route('instituicao.inserir')}}"><i class="fa fa-plus">
                    <span class="click-ripple animate" style="height: 85.5938px; width: 85.5938px; top: -13.7969px; left: 13.2031px;"></span>
                </i> Inserir Novo</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "order": [[0, "desc" ]],
            "language": {
                "url": "{{ URL::asset('js/Portuguese-Brasil.json')}}"
            }
        });
    })
</script>

<body>
    <div class="block">
        <div class="block-content block-content-full">
            <table id="dataTable" class="table table-bordered table-sm  table-vcenter js-dataTable-full">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Cód.</th>
                        <th style="width: 50%;">Nome da Instituição</th>
                        <th>CNPJ</th>
                        <th>Responsável</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instituicoes as $instit)
                    <tr>
                        <td class="text-center">{{$instit->id}}</td>
                        <td class="font-w600">
                            <a href="javascript:void(0)">{{$instit->instituicao}}</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <em class="text-muted">{{$instit->cnpj}}</em>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <em class="text-muted">{{$instit->responsavel}}</em>
                        </td>
                        <td class="text-center">
                            <?php
                            if ($instit->liberada == '0') {
                                echo '<span class="badge badge-danger">Inativo</span>';
                            } else if ($instit->liberada == '1') {
                                echo '<span class="badge badge-success">Liberado</span>';
                            }
                            ?>
                        </td>


                        <td class="text-center">
                            <div class="btn-group">
                                <a class="table-action" data-toggle="tooltip" data-original-title="Editar Instituição" href="{{route('instituicao.edit_instituicao',$instit)}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="table-action" href="{{route('instituicao.modal', $instit)}}" data-toggle="modal" data-target="#basicExampleModal" method="post">
                                    <i data-toggle="tooltip" data-original-title="excluir Instituição" class="fas fa-trash"></i>
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
                    <p>Deseja excluir a instituição ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="delete-form-{{$instit->id}}" + action="{{route('instituicao.delete', $instit)}}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

</body>