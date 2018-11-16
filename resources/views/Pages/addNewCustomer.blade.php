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
    
    <form class="form" action="{{ URL::to('/addCustomer') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field">
                <div class="field-label">
                    <label for="id_cliente">ID Cliente</label>
                </div>
                <div class="field-input">
                    <input type="text" name="id_cliente"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="correo_electronico">Correo electronico</label>
                </div>
                <div class="field-input">
                    <input type="text" name="correo_electronico"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="telefono">Telefono</label>
                </div>
                <div class="field-input">
                    <input type="text" name="telefono"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="provincia">Provincia</label>
                </div>
                <div class="field-input">
                    <input type="text" name="provincia"/><br>
                </div>
        </div>
        <div class="field">
            <div class="field-label">
                <label for="canton">Canton</label>
            </div>
            <div class="field-input">
                <input type="text" name="canton"/><br>
            </div>
        </div>
        <div class="field">
            <div class="field-label">
                <label for="distrito">distrito</label>
            </div>
            <div class="field-input">
                <input type="text" name="distrito"/><br>
            </div>
        </div>
        <div class="field">
            <div class="field-label">
                <label for="direccion_exacta">Direccion exacta</label>
            </div>
            <div class="field-input">
                <input type="text" name="direccion_exacta"/><br>
            </div>
        </div>
        <div class="field">
            <div class="field-label">
                <label for="otro_detalle">Otro detalle</label>
            </div>
            <div class="field-input">
                <input type="text" name="otro_detalle"/><br>
            </div>
        </div>
        <div class="field">
            <input type="submit" name="submit" value="Save"/>
        </div>
    </form>
@endsection