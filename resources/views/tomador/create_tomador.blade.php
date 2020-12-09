@extends('layouts.backend')
@section('content')


<script src="{{ asset('js/buscacep.js') }}"></script>

<?php
session_start();
$vCodInst = @$_SESSION['inst_id'];
?>


<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <div class="col-sm-6">
            <h2> Novo Tomador</h2>
        </div>
    </div>
</div>
<div class="content" style="color:black;">
    <form method="POST" action="{{route('tomador.insert', $vCodInst  )}}">
        <div class="block block-transparent pull-x pull-t">
            <ul class="nav nav-tabs nav-tabs-alt nav-left" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#cadastro">
                        <i class="far fa-address-card text-gray mr-1"></i> Cadastro
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#endereco">
                        <i class="far fa-file-alt text-gray mr-1"></i> Dados Pessoais
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#outrasinform">
                        <i class="far fa-newspaper text-gray mr-1"></i> Outras Informações
                    </a>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane pull-x fade fade-left show active" id="cadastro" role="tabpanel">
                    <div class="container mt-0">
                        <div class="row">
                            <div class="col-md-8">
                                <div action="" class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" id="nomeTomador" name="nomeTomador" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Documento</label>
                                    <input type="text" class="form-control" id="documento" name="documento">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo </label>
                                    <input type="text" class="form-control" id="tipoTomador" name="tipoTomador">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Data do Cadastro</label>
                                <input type="date" class="form-control" id="dataCadastro" name="dataCadastro">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Insc. Municipal</label>
                                <input type="text" class="form-control" id="" name="inscricao_municipal">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Insc. Estadual</label>
                                <input type="text" class="form-control" id="" name="inscricao_estadual">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Contato</label>
                                <input type="text" class="form-control" id="" name="Contato">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Atividade</label>
                                <input type="text" class="form-control" id="" name="idAtividade">
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Regime</label>
                                <input type="text" class="form-control" id="" name="Regime">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane pull-x fade fade-right" id="endereco" role="tabpanel">
                    <div class="container mt-0">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" onfocusout="getEndereco()">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Endereço</label>
                                    <input type="text" class="form-control" id="logradouro" name="endereco">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Número</label>
                                    <input type="text" class="form-control" id="numero" name="Numero">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <select class="form-control" id="uf" name="uf">
                                        <option value="estado">Selecione o Estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane pull-x fade fade-right" id="outrasinform" role="tabpanel">
                    <div class="container mb-4  mt-0">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="1" id="ativo" name="ativo" value="1">
                                    <label class="form-check-label" for="example-checkbox-inline1">Ativo</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInput">Instituição</label>
                                    <select class="form-control" id="instituicao" name="idinstituicao">
                                        <option value='0'>Selecionar Instituição</option>
                                        <?php

                                        use App\Models\instituicoe;

                                        $tabela = instituicoe::all();
                                        ?>
                                        @foreach ($tabela as $item)
                                        <option value='{{$item->id}}'>{{$item->instituicao}}</option>
                                        @endforeach
                                        }
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Observação</label>
                                    <input type="text" class="form-control" id="" name="observacao" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <input type="button" value="Cancelar" class="btn btn-danger" onclick="history.back();" />
    </p>
</div>




@endsection