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

           .tableView{
               width: 90%;
           }

           .table, th, td{
               border: 1px solid black;
           }

           .table, td{
               text-align:center;
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

<button>Agregar nuevo</button>

<table class="tableView">
        <tr>
            <th>ID Departamento</th>
            <th>Nombre Departamento</th>
            <th>Descripcion</th>
            <th>Otros detalles</th>
            <th>Actualizacion</th>
            @if (count($departamentos) > 0)
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->id_departamento }}</td>
                        <td>{{ $departamento->nombre_departamento }}</td>
                        <td>{{ $departamento->descripcion_departamento }}</td>
                        @if ($departamento->otros_detalles = NULL)
                            <td></td>        
                        }@else
                            <td>{{ $departamento->otros_detalles }}</td>
                        @endif
                        <td><a>Edit</a>|<a>Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tr>
</table>
@endsection