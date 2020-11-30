@extends('layouts.backend')

@section('content')

<!-- <div class="bg-body-light"> -->
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <div class="col-sm-6">
            <h2> Editar Usuário</h2>
        </div>

    </div>
</div>
<!-- </div> -->

<div class="content" style="color:black;">
    <form method="POST" action="{{route('usuario.editar',$item)}}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input value='{{$item->nome}}' type="text" class="form-control" id="nome" name="nome">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input value='{{$item->login}}' type="text" class="form-control" id="login" name="login" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input value='{{$item->cpf}}' type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value='{{$item->email}}' type="email" class="form-control" id="" name="email" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput">Instituição</label>
                    <select class="form-control" id="codinstituicao" name="codinstituicao">
                        <?php

                        use App\Models\instituicao;

                        $tabela = instituicao::all();
                        $instituicao = instituicao::where('id', '=', $item->idinstituicao)->first();
                        if ($item->idinstituicao != '0') {
                            $instituicao = $instituicao->instituicao;
                        } else {
                            $instituicao = '0';
                        }
                        ?>
                        <?php if ($instituicao != '0') { ?>
                            <option value='{{$item->idinstituicao}}'>{{$instituicao}}</option>
                        <?php } ?>

                        <option value='0'>Selecionar Instituição</option>
                        @foreach($tabela as $val)
                        <?php if ($instituicao != $val->instituicao) { ?>
                            <option value='{{$val->id}}'>{{$val->instituicao}}</option>
                        <?php } ?>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInput">Nível Usuário</label>
                    <select class="form-control" id="nivel" name="nivel">
                        <?php
                        $nivel = $item->nivel;
                        ?>
                        <?php if ($nivel == '0') { ?>
                            <option value='{{$item->nivel}}'>Visitante</option>
                        <?php } ?>
                        <?php if ($nivel == '1') { ?>
                            <option value='{{$item->nivel}}'>Administrador</option>
                        <?php } ?>
                        <?php if ($nivel == '2') { ?>
                            <option value='{{$item->nivel}}'>Usuário</option>
                        <?php } ?>

                        <?php
                        $wcr = array(
                            '0' => "Visitante",
                            '1' => "Administrador",
                            '2' => "Usuário"
                        );
                        foreach ($wcr as $short_code => $descriptive) { ?>
                            <?php if ($short_code != $nivel) { ?>
                                <option value="<?php echo $short_code; ?>"><?php echo $descriptive; ?></option>
                            <?php } ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <p align="right">
            <input value='{{$item->nome}}' type="hidden" name="oldnome">
            <input type="button" value="Cancelar" class="btn btn-danger" onclick="history.back();" />
            <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
</div>
</form>



@endsection