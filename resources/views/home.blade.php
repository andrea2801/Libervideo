@extends('layouts.app')

@section('content')
    <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
    <a class="subir_videos" href="{{ route('store') }}"> <buttom>Añadir libro</buttom></a>
@endsection
