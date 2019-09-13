<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">  
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">  
        

        
    </head>
    <body id="page-top">
        <div id="app">            
            <div id="wrapper">
                <section id="menu-lateral" class="bg-gradient-primary">
                    @include('comun.admin.menu-lateral')           
                </section>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <section id="menu-superior">
                            @include('comun.admin.menu-superior')
                        </section>
    
                        <section id="cuerpo">                 
                            <div class="container-fluid">
                                @yield('cuerpo')
                            </div>
                        </section>
                    </div>
                    <section id="footer">
                        @include('comun.admin.footer')
                    </section>
                    
                </div>
            </div>

        </div>

       

        <!--JS-->            
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
       
        
       
    </body>
</html>