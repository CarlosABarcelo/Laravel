
@extends('layouts.layout')

@section('content')
<div class="container section" >

    {{ Form::open(['route' => ['entradas'], 'method' => 'GET']) }}
    <p>{{ Form::text('titulo', null , array('placeholder'=>'Buscar...')) }}</p>
    <p>{{ Form::submit('Search') }}</p>
    {{ Form::close() }}

    @foreach ($entradas as $entrada)
    <div class="row">


        <!-- Post Content Column -->
        <div class="col-lg-12" style="margin: 5% 0% ;background-color: whitesmoke;border-radius: 50px;border: 1px solid skyblue">
<div style="background-color: #0b97c4;padding: 10px;color:white;float:right">
        @foreach ($categorias as $categoria)
            @if ($categoria->id === $entrada->id_categoria)
            {{  $categoria->nombre }}
                @foreach ($categorias as $catpadre)
                    @if ($categoria->id_padre === $catpadre->id)
                        {{  $catpadre->nombre }}
                    @endif
                @endforeach
            @endif
        @endforeach
</div>

            <!-- Title -->
            <h2 class="mt-4"><a style="color: black;" href="/entradas/<?= $entrada->id?>"><?= $entrada->titulo ?></a></h2>

            <!-- Author -->
            <p class="lead">
                Autor:
                <a href="#"><?= $entrada->autor ?></a>
            </p>
            <hr>
            <!-- Date/Time -->
            <p><?= $entrada->fecha_creacion ?></p>
            <hr>
            <!-- Post Content -->
            <?= $entrada->resumen ?>
            <hr>
            <!--*******************************************VALIDAR USUARIO REGISTRADO Y ENTRADA PRIVADA*************************************************-->
            <?php if (!isset($_SESSION['user_name']) && $entrada->privado==true){ echo"<p style='color: red'>Solo para usuarios registrados</p><hr>";} ?>

        </div>

    </div><br>
    @endforeach


</div>


@endsection