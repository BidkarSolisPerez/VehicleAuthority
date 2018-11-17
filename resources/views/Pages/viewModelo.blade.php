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

<button type="button" onclick="window.location='{{ url('/NewModelo') }}'">Nuevo Modelo</button>

<table class="tableView">
        <tr>
            <th>ID Modelo</th>
            <th>Nombre Modelo</th>
            <th>ID Fabricante</th>            
            @if (count($modelos) > 0)
                @foreach ($modelos as $modelo)
                    <tr>
                        <td>{{ $modelo->codigo_modelo }}</td>
                        <td>{{ $modelo->nombre_modelo }}</td>
                        <td>{{ $modelo->codigo_fabricante }}</td>                        
                    <td><a href = "/editModelo/{{$modelo->codigo_modelo}}">Edit</a>|<a href="/deleteModelo/{{$modelo->codigo_modelo}}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tr>
</table>
@endsection