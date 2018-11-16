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

<button type="button" onclick="window.location='{{ url('/NewCustomer') }}'">Nuevo Cliente</button>

<table class="tableView">
        <tr>
            <th>ID Cliente</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Provincia</th>
            <th>Canton</th>
            <th>Distrito</th>
            <th>Direccion Exacta</th>
            <th>Otros detalles</th>
            <th>Actualizacion</th>
            @if (count($customers) > 0)
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id_cliente }}</td>
                        <td>{{ $customer->telefono }}</td>
                        <td>{{ $customer->correo_electronico }}</td>
                        <td>{{ $customer->provincia }}</td>
                        <td>{{ $customer->canton }}</td>
                        <td>{{ $customer->distrito }}</td>
                        <td>{{ $customer->direccion_exacta }}</td>
                        <td>{{ $customer->otro_detalle }}</td>
                        <td><a href = "/editCustomer/{{$customer->id_cliente}}">Edit</a>|<a href="/deleteCustomer/{{$customer->id_cliente}}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tr>
</table>
@endsection