@extends('layouts.layout')

@section('content')
    {!! Form::open(['url' => 'contact/submit']) !!}

    <div class="form-group">
        {{ Form::label('name','Nombre') }}
        {{ Form::text('name','',['class' => 'form-control','placeholder' => 'Introduce tu nombre']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email','E-mail') }}
        {{ Form::email('email','',['class' => 'form-control','placeholder' => 'Introduce tu email']) }}
    </div>
    <div class="form-group">
        {{ Form::label('message','Mensaje') }}
        {{ Form::textarea('message','',['class' => 'form-control','placeholder' => 'Introduce el mensaje']) }}
    </div>
    <div>
        {{Form::submit('submit',['class' => 'btn btn-primary'])}}
    </div>

    {!!  Form::close()  !!}


@endsection