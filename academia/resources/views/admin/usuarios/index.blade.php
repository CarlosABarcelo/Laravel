@extends('admin.layouts.layout')


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Usuarios</h3>



        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Profesor (S/N)</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?= $usuario->id?></td>
                    <td><?= $usuario->name ?></td>
                    <td><?= $usuario->email ?></td>
                    <td><?php if (($usuario->profesor)==True){ echo "SI";} else { echo "NO";} ?></td>


                    <td><b>
                            <form action="{{ route('admin.usuarios.destroy',$usuario) }}" method="POST" style="display : inline">
                                {!! csrf_field() !!} {!!  method_field('DELETE') !!}
                                <button href="#" class="btn btn-xs btn-danger"
                                        onclick="return confirm('¿Seguro que quieres eliminar esto usuario? {{ $usuario->email }}')">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            <a href="{{ route('admin.usuarios.edit',$usuario) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

                </tr>
                <?php endforeach ?>

                </tbody>
            </table>



        </div>
        <!-- /.box-body -->
    </div>

@endsection