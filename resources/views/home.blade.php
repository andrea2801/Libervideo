@extends('layouts.app')

@section('content')
    <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
@endsection
