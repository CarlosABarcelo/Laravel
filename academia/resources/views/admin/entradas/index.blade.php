@extends('admin.layouts.layout')


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de categorias</h3>



        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table id="users-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>

                    <th>Autor</th>

                    <th>Resumen</th>
                    <th>Categoria</th>
                    <th>Curso</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($entradas as $entrada)

                <tr>
                    <td>{{ $entrada->id}}</td>
                    <td>{{ $entrada->titulo }}</td>

                    <td>{{ $entrada->autor }}</td>
                    <td>{{ $entrada->resumen }}</td>

                    <td>
                        <?php foreach ($categorias as $categoria) : ?>
                        <?php if ($categoria->id === $entrada->id_categoria){ echo  $categoria->nombre ; } ?>
                    <?php endforeach ?>

                    </td>
                    <td>

                        <?php foreach ($categorias as $categoria) : ?>
                            <?php if( $entrada->id_categoria  == $categoria->id): ?>
                                    <?php foreach ($categorias as $categori) : ?>
                                        <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                                    <?php endforeach ?>
                            <?php endif ?>
                        <?php endforeach ?>


                    </td>
                    <td>{{ $entrada->fecha_creacion }}</td>

                    <td>
                        <a href="{{ route('entrada.ver',$entrada) }}" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('admin.entradas.edit',$entrada) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

                        <form action="{{ route('admin.entradas.destroy',$entrada) }}" method="POST" style="display : inline">
                            {!! csrf_field() !!} {!!  method_field('DELETE') !!}
                            <button href="#" class="btn btn-xs btn-danger"
                                    onclick="return confirm('¿Seguro que quieres eliminar esta entrada? {{ $entrada->titulo }}')">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach

                </tbody>






            </table>



        </div>
        <!-- /.box-body -->
    </div>

@endsection