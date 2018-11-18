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
                    <h3>{{ session('currentUser')}}</h3>
                    <form action="{{ URL::to('/logoutme') }}" method="post">
                        <button type="submit" name="loginButton">Log Out</button>
                    </form>
            </div>
    </nav>
        
    
    <h1 class="mainheader">Vehicle System MyCarAutho</h1>
    
    <button type="button" onclick="window.location='{{ url('/NewServiceRequest') }}'">Nuevo Requerimiento</button>
    <table class="tableView">
        <tr>
                <th>ID Solicitud</th>
                <th>ID Cliente</th>
                <th>ID Vechiculo</th>
                <th>ID Servicio</th>
                <th>Fecha Servicio</th>
                <th>Costo</th>
                <th>Actualizacion</th>
                @if (count($requests) > 0)
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->id_servicio_consulta }}</td>
                            <td>{{ $request->id_cliente }}</td>
                            <td>{{ $request->id_vehiculo }}</td>
                            <td>{{ $request->id_servicio }}</td>
                            <td>{{ $request->fecha_servicio_efectuado}}</td>
                            <td>{{ $request->costo_servicio }}</td>
                            <td><a href = "/editServiceRequest/{{$request->id_servicio_consulta}}">Edit</a>|<a href="/deleteServiceRequest/{{$request->id_servicio_consulta}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </tr>
    </table>
@endsection