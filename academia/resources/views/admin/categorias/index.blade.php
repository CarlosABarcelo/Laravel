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
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Categoria Padre</th>
                    <th>Acciones</th>
                </tr>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td style="width: 1px"><i class="fa fa-fw fa-paint-brush" style="color:{{ $categoria->color }} "></i></td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            @foreach ($categorias as $categori)
                            <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                            @endforeach
                        </td>
                        <td>

                            <a href="{{ route('admin.categorias.edit',$categoria) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('admin.categorias.destroy' , $categoria) }}" method="POST" style="display : inline">
                                {!! csrf_field() !!} {{ method_field('DELETE') }}
                                <button href="#" class="btn btn-xs btn-danger"
                                        onclick="return confirm('¿Seguro que quieres eliminar esta categoria?')">
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