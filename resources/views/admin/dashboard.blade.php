@extends('admin.layouts.layout')
@section('content')
    <h1>DashBoard</h1>
    <p>Usuario Atenticado:  {{ auth()->user()->name }}</p>
    <p>Correo Electronico:  {{ auth()->user()->email }}</p>
@endsection