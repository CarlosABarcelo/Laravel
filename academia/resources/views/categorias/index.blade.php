


@extends('layouts.layout')

@section('content')

<div class="contanier">
    <div class="row">
        @foreach($categorias as $categoria)
            <?php  if ( $categoria->id_padre == "0" ) { ?>
<div class="col-md-4">
    <div class="btn btn-block btn-info btn-lg"><?= $categoria->nombre ?></div>
    @foreach($categorias as $cathijo)
    <?php if ( $categoria->id == $cathijo->id_padre) {?>

        {{ Form::open(['route' => ['entradas'], 'method' => 'GET']) }}
        <p>{{ Form::hidden('id_categoria',  $cathijo->id , array('placeholder'=>'Buscar...','class'=>'btn btn-block btn-primary btn-md')) }}</p>
        <p>{{ Form::submit($cathijo->nombre, array('class'=>'btn btn-block btn-primary btn-md')) }}</p>
        {{ Form::close() }}
    <?php } ?>
    @endforeach </div>
<?php } ?>
        @endforeach
</div>
</div>


@endsection