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

<button type="button" onclick="window.location='{{ url('/NewCategoria') }}'">Nuevo Categoria</button>

<table class="tableView">
        <tr>
            <th>ID Categoria</th>            
            <th>Descripcion</th>            
            @if (count($categorias) > 0)
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->codigo_categoria_vehiculo }}</td>                        
                        @if ($categoria->descripcion_categoria == NULL)
                            <td></td>        
                        }@else
                            <td>{{ $categoria->descripcion_categoria }}</td>
                        @endif
                    <td><a href = "/editCategoria/{{$categoria->codigo_categoria_vehiculo}}">Edit</a>|<a href="/deleteCategoria/{{$categoria->codigo_categoria_vehiculo}}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tr>
</table>
@endsection