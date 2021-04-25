@extends('layouts.app')

@section('content')
   <div>Añade un libro</div><br>
    <form method="POST" action="{{ route('add') }}" enctype="multipart/form-data">
        @csrf
        <label>Titulo</label>
        <input type="text" name="name" >
        <label>Descripcion</label>
        <input type="text" name="description">
        <label>Codigo ISBN</label>
        <input type="text" name="isbn">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
        <input type="submit" name="subir" value="Añadir">
    </form>
@endsection
