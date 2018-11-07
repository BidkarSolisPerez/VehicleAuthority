<!doctype html>
<html>
    <head> 

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Proyecto Arquiteture de la informacion: Vehicle Authority System</title>
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
            
            footer{
                background-color: #D7D7D7;
                width: 100%;
                position: absolute;
                bottom: 0;
            }

        </style>

    </head>
    <body>
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
    
    </body>
    <footer>
            <div class="footerbottom">
                <p>Universidad Nacional de Costa Rica</p>
                <p>Proyecto 4</p>
                <p>Modelo datos <a href="http://www.databaseanswers.org/data_models/vehicle_registration_authority/index.htm" target="_blank">Car Authority Registration</a></p>
            </div>
    </footer>
</html>