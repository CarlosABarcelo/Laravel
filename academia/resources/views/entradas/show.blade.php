@extends('layouts.layout')


@section('content')



    <div class="container">


        <?php if(Auth::guest() && $entrada->privado==true){?><?php echo"NO PUEDES VERLO"; }else{ ?>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

                <!-- Title -->
                <h1 class="mt-4">{{$entrada->titulo}}</h1>

                <!-- Author -->
                <p class="lead">
                    Autor:
                    <a href="#">{{$entrada->autor}}</a>
                </p>
                <!-- Author -->
                <p class="lead">
                    Privado:
                    <a href="#"><?php if($entrada->privado==1){ echo"SI";}else{echo"NO";}?></a>
                </p>
                <hr>

                <!-- Date/Time -->
                <p>{{$entrada->fecha_creacion}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="\uploads\{{$entrada->fichero}}" alt="">
                <?php

                    $extension = substr($entrada->fichero , -4);
                    $nombre = substr($entrada->fichero , 0);
                    if($extension === ".jpg" || $extension === ".png" || $extension === "jpeg"){
                        echo '<img class="img-fluid rounded" src="\\uploads\\'.$entrada->fichero.'" alt="">';
                    }else{
                        echo '<a href="\\uploads\\'.$entrada->fichero.'"><i class="fa fa-fw fa-download"></i>'. $nombre .'</a>';
                    }
                ?>

                <hr>

                <!-- Post Content -->

                {{$entrada->contenido}}
                <hr>
                <a href="javascript:history.go(-1)">Volver</a>
                <hr>

            </div>

        </div>
        <!-- /.row -->
    </div>

    <?php } ?>

@endsection
