@extends('admin.layouts.layout')

@section('content')

    <script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/jquery/dist/jquery.min.js"></script>
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
            <form action="{{ route('admin.usuarios.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Crear Usuario
                            </h3>
                        </div>


                        <div class="box-body">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="col-sm-2 control-label">email</label>

                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="col-sm-2 control-label">password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="col-sm-2 control-label">name</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="profesor" class="col-sm-2 control-label">profesor</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="profesor" id="profesor">
                                            <option value="0">NO</option><option value="1">SI</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4"><input id="imagen" name="imagen" size="30" type="file" /></div>
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
