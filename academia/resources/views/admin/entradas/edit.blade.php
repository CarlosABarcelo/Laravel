@extends('admin.layouts.layout')

@section('content')
    <script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- CK Editor -->
    <script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/ckeditor/ckeditor.js"></script>
    <!--<script>  $(function () { CKEDITOR.replace('contenido') })  </script> NO ME OBTIENE LA VARIABLE EN LARAVEL ; MIRAR LUEGO -->


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
            <form action="{{ route('admin.entradas.update' , $entrada) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}  {{ method_field('PUT') }}
            <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Editar Entrada
                            </h3>
                        </div>


                        <div class="box-body">
                            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                <label for="titulo" class="col-sm-2 control-label">titulo</label>

                                <div class="col-sm-10">
                                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo',$entrada->titulo) }}">
                                    {!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('contenido') ? 'has-error' : '' }}">
                                <label for="contenido" class="col-sm-2 control-label">contenido</label>

                                <div class="col-sm-10">
                                    <input type="text" name="contenido" class="form-control" value="{{ old('contenido',$entrada->contenido) }}">
                                    {!! $errors->first('contenido', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('resumen') ? 'has-error' : '' }}">
                                    <label for="resumen" class="col-sm-2 control-label">resumen</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="resumen" class="form-control" value="{{ old('resumen',$entrada->resumen) }}">
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('id_categoria') ? 'has-error' : '' }}">
                                    <label for="id_categoria" class="col-sm-2 control-label">Categorías</label>
                                    <div class="col-sm-10" >
                                        <select class="form-control" class="form-control" name="id_categoria" id="id_categoria">

                                            @foreach ($categorias as $categoria)
                                                        <option value="<?= $categoria->id ?>"@if( old('id_categoria',$entrada->id_categoria) == $categoria->id) selected @endif>
                                                    {{$categoria->nombre}}
                                                    @foreach ($categorias as $categori)
                                                        <?php if ($categori->id === $categoria->id_padre){ echo " ----- " . $categori->nombre ; } ?>
                                                    @endforeach
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="privado" class="col-sm-2 control-label">Privado</label>
                                    <div class="col-sm-4">

                                        <select class="form-control" name="privado" id="privado">
                                        <option value="0" <?php if (old('privado',$entrada->privado)==0){ echo "selected";} ?>>NO</option>
                                        <option value="1" <?php if (old('privado',$entrada->privado)==1){ echo "selected";} ?>>SI</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4"><input id="fichero" name="fichero" size="30" type="file" /><p style="color: red">La imagen será reemplazada</p></div>
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
