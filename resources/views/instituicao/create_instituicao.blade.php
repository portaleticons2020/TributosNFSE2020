@extends('layouts.backend')
@section('content')

<?php
 session_start();
 $vCodInst = @$_SESSION['inst_id'];
?>


<!doctype html>
<html lang="pt-br">
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <div class="col-sm-6">
            <h2> Inserir Nova Instituição</h2>
        </div>
    </div>
</div>


<!-- </div> -->
<div class="content" style="color:black;">
    <form method="POST" action="{{route('instituicao.insert',$vCodInst)}}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Instituição</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" required>
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CEP</label>
                    <input type="cep" class="form-control" id="cep" name="cep" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Responsável</label>
                    <input type="text" class="form-control" id="responsavel" name="responsavel" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Liberada</label>
                    <input type="text" class="form-control" id="liberada" name="liberada" required>
                </div>
            </div>
        </div>
        
        <p align="right">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <input type="button" value="Cancelar" class="btn btn-danger" onclick="history.back();" />
        </p>
</div>
</form>


@endsection
</body>

</html>