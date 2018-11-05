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
                background-color: blue;
            }
            .topnav{
                background-color: gray;
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
                background-color: gray;
                width: 100%;
                position: absolute;
                bottom: 0;
            }

        </style>

    </head>
    <body>
        <nav class="topnav">
            <div class="login-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Username" name="username">
                    <input type="text" placeholder="Password" name="psw">
                    <button type="submit">Login</button>
                </form>
            </div>
        </nav>
        
        <h1 class="mainheader">Vehicle System MyCarAutho</h1>        
    
    </body>
    <footer>
            <div class="footerbottom">
                <p>Universidad Nacional de Costa Rica</p>
                <p>Proyecto 4</p>
                <p>Modelo datos Car Authority Registration</p>
            </div>
    </footer>
</html>