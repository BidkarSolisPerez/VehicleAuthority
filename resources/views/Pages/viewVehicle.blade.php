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
            <p>{{ session('user')}}</p>
            <form action="{{ URL::to('/logoutme') }}" method="post">
                <button type="submit" name="loginButton">Login Out</button>
            </form>
        </div>
</nav>
    

<h1 class="mainheader">Vehicle System MyCarAutho</h1>

<button type="button" onclick="window.location='{{ url('/NewVehicle') }}'">Nuevo Vehiculo</button>

<table class="tableView">
        <tr>
            <th>ID Vehiculo</th>
            <th>ID Categoria</th>
            <th>ID Fabricante</th>
            <th>ID Modelo</th>
            <th>Anno Registro</th>
            <th>Otro Detalle</th>                        
            @if (count($vehiculos) > 0)
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->id_vehiculo }}</td>
                        <td>{{ $vehiculo->codigo_categoria }}</td> 
                        <td>{{ $vehiculo->codigo_fabricante }}</td>
                        <td>{{ $vehiculo->codigo_modelo }}</td> 
                        <td>{{ $vehiculo->año_registro }}</td>                        
                        @if ($vehiculo->otro_detalle == NULL)
                            <td></td>        
                        }@else
                            <td>{{ $vehiculo->otro_detalle }}</td>
                        @endif
                    <td><a href = "/editVehicle/{{$vehiculo->id_vehiculo}}">Edit</a>|<a href="/deleteVehicle/{{$vehiculo->id_vehiculo}}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tr>
</table>
@endsection