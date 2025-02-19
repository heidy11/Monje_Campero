@extends('layouts/main')
@section('titulo_pagina','registro de usuario')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('registrar') }}" method="post">
                        @csrf
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        <label for="">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control">
                        <label for="">Edad</label>
                        <input type="text" name="edad" id="edad" class="form-control">
                        <label for="">Telefono</label>
                        <input type="text" name="celular" id="celular" class="form-control">
                        <label for="">Correo</label>
                        <input type="email" class="form-control" name="correo_electronico" id="correo_electronico">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena">
                        <button class="btn btn-primary mt-4">Registrarse</button>
                        <a href="{{ route('login') }}" class="btn btn-info mt-4">Loguearse</a>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection