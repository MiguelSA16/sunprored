<!DOCTYPE html>
<html lang="Es-es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('titulo') </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">        
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">       
       

    </head>
    <body>
        
        <section id="cabecera">
            @include('comun.front.cabecera')
            @include('comun.front.menu')         

        </section>

        <section id="cuerpo">           
            @yield('cuerpo')

        </section>

        <section id="pie">
            @include('comun.front.footer')
            
        </section>

        
        <!--JS-->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        
        
        

    </body>
</html>