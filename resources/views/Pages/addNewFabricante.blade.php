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
    
    <form class="form" action="{{ URL::to('/addFabricante') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field">
                <div class="field-label">
                    <label for="codigo_fabricante">ID Fabricante</label>
                </div>
                <div class="field-input">
                    <input type="text" name="codigo_fabricante"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="nombre_fabricante">Nombre Fabricante</label>
                </div>
                <div class="field-input">
                    <input type="text" name="nombre_fabricante"/><br>
                </div>
        </div>
        <div class="field">
                <div class="field-label">
                    <label for="otro_detalle">Otros Detalles</label>
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