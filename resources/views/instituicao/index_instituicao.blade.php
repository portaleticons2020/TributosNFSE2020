@extends('layouts.backend')
@section('title','Instituição')

<!doctype html>
<html lang="pt-br">
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
            
<!--             
            <button type="button" class="btn btn-danger js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1" onclick="history.back();">
            <span class="click-ripple animate" style="height: 85.5938px; width: 85.5938px; top: -13.7969px; left: 13.2031px;"></span>
                <i class="fa fa-fw fa-plus mr-1"></i fa-times> Fechar </button> -->
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
                            <em class="text-muted">{{$instit->CNPJ}}</em>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <em class="text-muted">{{$instit->Responsavel}}</em>
                        </td>

                        <td class="text-center">
                            <div class="btn-group">
                                <a class="table-action" data-toggle="tooltip" data-original-title="Editar Instituição" href="#"> 
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Deletar Instituição" href="#" onclick="event.preventDefault();
                                document.getElementById('delete-form-{{$instit->id}}').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form id="delete-form-{{$instit->id}}" + action="#" method="post">
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
  
</body>



</html>