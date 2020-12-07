@extends('layouts.backend')
@section('content')


<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <div class="col-sm-6">
            <h2> Novo Tomador</h2>
        </div>

    </div>
</div>

<div class="content-side">
    <!-- Side Overlay Tabs -->
    <div class="block block-transparent pull-x pull-t">
        <ul class="nav nav-tabs nav-tabs-alt nav-left" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#cadastro">
                    <i class="fa fa-fw fa-coffee text-gray mr-1"></i> Cadastro
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#endereco">
                    <i class="fa fa-fw fa-chart-line text-gray mr-1"></i> Dados Pessoais
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#outrasinform">
                    <i class="fa fa-fw fa-chart-line text-gray mr-1"></i> Outras Informações
                </a>
            </li>
        </ul>
        <div class="block-content tab-content overflow-hidden">
            <!-- Overview Tab -->
            <div class="tab-pane pull-x fade fade-left show active" id="cadastro" role="tabpanel">

                <div class="container mt-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipo </label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Data do Cadastro</label>
                            <input type="date" class="form-control" id="" name="email" required>
                        </div>
                        <div class="col-md-3">

                            <label for="exampleInputEmail1">Insc. Municipal</label>
                            <input type="text" class="form-control" id="" name="email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Insc. Estadual</label>
                            <input type="text" class="form-control" id="" name="email" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane pull-x fade fade-right" id="endereco" role="tabpanel">
                campo do Endereços
            </div>


            <div class="tab-pane pull-x fade fade-right" id="outrasinform" role="tabpanel">
                campo de outras Informações
            </div>
        </div>
    </div>
</div>



@endsection