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
                <form action="{{ route('admin.categorias.store') }}" method="POST">
                {{ csrf_field() }}
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Crear Categoría
                            </h3>
                        </div>


                        <div class="box-body">
                            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>

                                <div class="col-sm-10">
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                                {!! $errors->first('nombre', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>

                                <div class="col-sm-10">
                                <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
                                {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}
                            </div>

                            <div class="form-group ">
                                <label for="color" class="col-sm-2 control-label">Color</label>

                                <div class="col-sm-10">
                                    <input type="text" name="color" class="form-control my-colorpicker1" value="{{ old('color') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_padre" class="col-sm-2 control-label">Categoría Padre</label>

                                <div class="col-sm-10">
                                    <select class="form-control" class="form-control" name="id_padre" id="id_padre">
                                        <option value="0">Sin Categoría Padre</option>

                                        @foreach($categorias as $categoria)


                                            <?php if( isset($datos['id_padre']) && $datos['id_padre'] == $categoria->id): ?>
                                            <option value="<?= $categoria->id ?>" selected><?= $categoria->nombre ?>

                                                @foreach($categorias as $categori)
                                                    <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                                                @endforeach

                                            </option>
                                            <?php else: ?>
                                            <option value="<?= $categoria->id ?>" ><?= $categoria->nombre ?>

                                                @foreach($categorias as $categori)
                                                    <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
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
