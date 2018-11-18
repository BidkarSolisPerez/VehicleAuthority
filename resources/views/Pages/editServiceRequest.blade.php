@extends('Layouts.base')

@section('style')
    <style>
         html,body{
                height: 100%;
                margin:0;
            }

            body{
                background-color: white;
            }
            .topnav{
                background-color: #D7D7D7;
                overflow: hidden;
            }

            .login-container{
                float: right;
            }

            .mainheader{
                text-align:center;
            }

            .footerbottom{
                width: 95%;
                margin: auto;
            }

            .form{
                display: inline;
            }

            .field{
                margin-left:40%;
                display: flex;
                margin-top: 1%;
            }

            .field-label{
                width: 20%;
            }

            footer{
                background-color: #D7D7D7;
                width: 100%;
                position: absolute;
                bottom: 0;
            }

    </style>
@endsection

@section('content')
    <nav class="topnav">
            <div class="login-container">
                <form action="{{ URL::to('/loginme') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    Username: <input type="text" placeholder="Username" name="username">
                    Password: <input type="text" placeholder="Password" name="password">
                    <button type="submit" name="loginButton">Login</button>
                </form>
            </div>
    </nav>
        
    
    <h1 class="mainheader">Vehicle System MyCarAutho</h1>
    
<form class="form" action = "/editServiceRequest/<?php echo $request[0]->id_servicio_consulta; ?>" method = "post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field">
                <div class="field-label">
                    <label for="id_servicio_consulta">ID Servicio</label>
                </div>
                <div class="field-input">
                    <input type="text" name="id_servicio_consulta" value="{{ $request[0]->id_servicio_consulta }}" readonly/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="is_servicio_consulta_previo">Previo Servicio</label>
                </div>
                <div class="field-input">
                    <input type="text" name="is_servicio_consulta_previo" value="{{ $request[0]->is_servicio_consulta_previo }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="id_cliente">Id Cliente</label>
                </div>
                <div class="field-input">
                    <input type="text" name="id_cliente" value="{{ $request[0]->id_cliente }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="id_vehiculo">Id Vehiculo</label>
                </div>
                <div class="field-input">
                    <input type="text" name="id_vehiculo" value="{{ $request[0]->id_vehiculo }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="id_servicio">ID Servicio</label>
                </div>
                <div class="field-input">
                    <input type="text" name="id_servicio" value="{{ $request[0]->id_servicio }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="fecha_servicio_solicitada">Fecha Servicio Solicitado</label>
                </div>
                <div class="field-input">
                    <input type="text" name="fecha_servicio_solicitada" value="{{ $request[0]->fecha_servicio_solicitada }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="fecha_servicio_efectuado">Fecha Servicio Realizado </label>
                </div>
                <div class="field-input">
                    <input type="text" name="fecha_servicio_efectuado" value="{{ $request[0]->fecha_servicio_efectuado }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="costo_servicio">Costo Servicio</label>
                </div>
                <div class="field-input">
                    <input type="text" name="costo_servicio" value="{{ $request[0]->costo_servicio }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="id_prueba_adicional">Id Prueba Adicional</label>
                </div>
                <div class="field-input">
                    <input type="text" name="id_prueba_adicional" value="{{ $request[0]->id_prueba_adicional }}"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="otro_detalle">Detalles</label>
                </div>
                <div class="field-input">
                    <input type="text" name="otro_detalle" value="{{ $request[0]->otro_detalle }}"/><br>
                </div>
        </div>
        <div class="field">
            <input type="submit" name="submit" value="Save"/>
        </div>
    </form>
@endsection