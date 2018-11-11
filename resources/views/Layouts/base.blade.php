<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @yield('style')

    </head>
    <body>
        @yield('content')
    </body>
    <footer>
            <div class="footerbottom">
                <p>Universidad Nacional de Costa Rica</p>
                <p>Proyecto 4</p>
                <p>Modelo datos <a href="http://www.databaseanswers.org/data_models/vehicle_registration_authority/index.htm" target="_blank">Car Authority Registration</a></p>
            </div>
    </footer>
</html>