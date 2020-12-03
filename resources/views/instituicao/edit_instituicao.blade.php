@extends('layouts.backend')
@section('content')


<!doctype html>
<html lang="pt-br">
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <div class="col-sm-6">
            <h2>Editar Instituição</h2>
        </div>
    </div>
</div>



<!-- </div> -->
<div class="content" style="color:black;">
    <form method="POST" action="{{route('instituicao.editar',$item)}}">
        @csrf
        @method('patch')


        <?php
        $statusRecebido = (isset($_REQUEST['liberada'])) ? $_REQUEST['liberada'] : '0';
        echo $statusRecebido . "<br/>";

        ?>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Instituição</label>
                    <input value='{{$item->instituicao}}' type="text" class="form-control" id="nome" name="nome">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CNPJ</label>
                    <input value='{{$item->cnpj}}' type="text" class="form-control" id="cnpj" name="cnpj">
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input value='{{$item->endereco}}' type="text" class="form-control" id="endereco" name="endereco">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Número</label>
                    <input value='{{$item->numero}}' type="text" class="form-control" id="numero" name="numero">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bairro</label>
                    <input value='{{$item->bairro}}' type="text" class="form-control" id="bairro" name="bairro">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CEP</label>
                    <input value='{{$item->cep}}' type="cep" class="form-control" id="cep" name="cep">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input value='{{$item->fone}}' type="text" class="form-control" id="telefone" name="telefone">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Responsável</label>
                    <input value='{{$item->responsavel}}' type="text" class="form-control" id="responsavel" name="responsavel">
                </div>
            </div>
            <!-- <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Liberada</label>
                    <input value='{{$item->liberada}}' type="text" class="form-control" id="liberada" name="liberada">
                </div>
            </div> -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="{{old('is_current')}}" id="liberada" name="liberada">';
                <label class="form-check-label" for="example-checkbox-inline1">Liberada</label>
            </div>
        </div>

        <p align="right">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <input type="button" value="Cancelar" class="btn btn-danger" onclick="history.back();" />
        </p>
</div>
</form>
<?php
if (isset($_POST['liberada'])) echo ('<p>' . $_POST['liberada'] . '</p>');
?>

@endsection
</body>

</html>