@extends('layouts.layout')

@section('content')
    <h1>Estoy en Home</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi corporis cum cupiditate deleniti eum exercitationem harum in maiores nisi perferendis placeat possimus quod sunt suscipit tempora, unde veniam voluptate voluptatem.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cupiditate dicta error quasi quos totam! Blanditiis doloribus ea et, fugit maiores minus odit perspiciatis repellat sint sit veniam voluptatem voluptatibus?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi deleniti deserunt, enim et eveniet impedit ipsam magnam magni modi mollitia omnis perferendis quas qui quis rem vel. Non, quo.</p>
@endsection

@section('sidebar')
    @parent
    <p>Enlace sólo en home</p>
@endsection
