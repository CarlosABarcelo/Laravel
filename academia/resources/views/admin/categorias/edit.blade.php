@extends('admin.layouts.layout')

@section('content')

    <script src="http://academia.local/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="http://academia.local/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://academia.local/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <script>
        $(function () {
            //Colorpicker
            $('.my-colorpicker1').colorpicker();
        })
    </script>

    <section class="content-header">
        <h1>
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="{{ route('admin.categorias.update' , $categoria) }}" method="POST">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Editar Categoría
                            </h3>
                        </div>


                        <div class="box-body">
                            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>

                                <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre',$categoria->nombre) }}">
                                    {!! $errors->first('nombre', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>

                                <div class="col-sm-10">
                                    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion',$categoria->descripcion) }}">
                                    {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                                    <label for="color" class="col-sm-2 control-label">Color</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="color" class="form-control my-colorpicker1" value="{{ old('color',$categoria->color) }}">
                                        {!! $errors->first('color', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_padre" class="col-sm-2 control-label">Categoría Padre</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" class="form-control" name="id_padre" id="id_padre">
                                            <option value="0">Sin Categoría Padre</option>

                                            @foreach($listadocategorias as $listcat)


                                                <?php if( isset($categoria->id_padre) && $categoria->id_padre == $listcat->id): ?>
                                                <option value="<?= $listcat->id ?>" selected><?= $listcat->nombre ?>

                                                    @foreach($listadocategorias as $categori)
                                                        <?php if ($categori->id === $listcat->id_padre){ echo  $categori->nombre ; } ?>
                                                    @endforeach

                                                </option>
                                                <?php else: ?>
                                                <option value="<?= $listcat->id ?>" ><?= $listcat->nombre ?>

                                                    @foreach($listadocategorias as $categori)
                                                        <?php if ($categori->id === $listcat->id_padre){ echo  $categori->nombre ; } ?>
                                                    @endforeach

                                                </option>
                                                <?php endif ?>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right">Enviar</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>

@endsection
