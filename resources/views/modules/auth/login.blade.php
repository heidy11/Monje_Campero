@extends('layouts/main')
@section('titulo_pagina','login de usuario')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="email" id="email">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <button class="btn btn-primary mt-4">Ingresar</button>
                        <a href="{{route('registro')}}">Registrate aqui</a>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
    

        