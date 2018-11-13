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

<button type="button" onclick="window.location='{{ url('/NewDepartment') }}'">Nuevo Departamento</button>

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
                        @if ($departamento->otros_detalles == NULL)
                            <td></td>        
                        }@else
                            <td>{{ $departamento->otros_detalles }}</td>
                        @endif
                    <td><a href = "editDepartment/{{$departamento->id_departamento}}">Edit</a>|<a href="/deleteDepartament/{{$departamento->id_departamento}}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tr>
</table>
@endsection