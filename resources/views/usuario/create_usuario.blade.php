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
            <h2> Inserir Novo Usuário</h2>
        </div>
    </div>
</div>

<!-- </div> -->
<div class="content" style="color:black;">
    <form method="POST" action="{{route('usuario.insert', $vCodInst  )}}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="" name="email" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Instituição</label>
                    <select class="form-control" id="codinstituicao" name="codinstituicao">
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

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInput">Nível Usuário</label>
                    <select class="form-control" id="nivel" name="nivel">
                        <option value='0'>Visitante</option>
                        <option value='1'>Administrador</option>
                        <option value='2'>Usuário</option>
                    </select>
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
</body>

</html>