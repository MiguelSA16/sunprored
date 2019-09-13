@extends('layouts.front.vertical')

@section('cuerpo')
    @include('comun.front.camino-migas')

    <div class="container-fluid py-4">
        <div class="container">
            <!-- Titulo -->
            <div class="row text-center">
                <div class="col-md-12 pb-2">                   
                    <h1 class="title">
                        {{$articulo->nombre}}                        
                    </h1>
                    <p class="sub-subtitle  ">
                        Articulos al por mayor en Madrid
                    </p>
                </div>                
            </div>
            <div class=" subrayar"></div>
            <div class=" line-subrayar"></div>
            <div class="row">
                <div class="col-4">
                    <img src="{{url('/images/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" class=" w-100">
                </div>        
    
                <div class="col-8">
        
                    <p class="subtitle pb-3 font-weight-bold">                
                        Caracteristicas:
                    </p> 
        
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="text-uppercase font-weight-normal border-0">Nombre</th>
                                <td class="text-muted border-0">{{$articulo->nombre}}</td>
                            </tr>
                            <tr>
                                <th class="text-uppercase font-weight-normal">
                                    Referencia
                                </th>
                                <td class="text-muted">
                                    <span class="badge badge-ref size-13">
                                        {{$articulo->codigo}}
                                    </span>
                                </td>
        
                            </tr>
                            <tr>
                                <th class="text-uppercase font-weight-normal">F. Tecnica</th>
                            @if ($articulo->pdf == 'NO DISPONIBLE')
                                <td class="text-muted"> 
                                    <i class="far fa-file-pdf size-20 bg-pdf"></i> NO DISPONIBLE               
                                </td>
                            @else
                                <td class="text-muted"> 
                                    <a href="{{asset('pdf/articulos/'.$articulo->pdf)}}" class="text-decoration-none" target="_black">                                
                                        <i class="far fa-file-pdf size-20 bg-pdf"></i> {{$articulo->pdf}}      
                                    </a>         
                                </td>
                            @endif
                            </tr>
                            <tr class=" border-bottom">
                                <th class="text-uppercase font-weight-normal">Color</th>
                                <td class="text-muted"> {{$articulo->color}} </td>
                            </tr>
                            <tr class=" border-bottom">
                                <th class="text-uppercase font-weight-normal">longitud</th>
                                <td class="text-muted"> {{$articulo->longitud}} </td>
                            </tr>

                            <tr class=" border-bottom">
                                <th class="text-uppercase font-weight-normal">Grupo</th>
                                <td class="text-muted"> {{$articulo->grupo}} </td>
                            </tr>
                        </tbody>
                    </table>        
                    
                </div>  
                @if($longitudes->count() != 0)
                <div class="col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">                
                        Longitudes Disponibles:
                    </p> 
                    @foreach ($longitudes as $longitud)
                        <a href="{{url('articulo/'.$longitud->slug.'/ver') }}" class="text-decoration-none">
                            <button class=" btn btn-outline-sunpro py-0 my-1">{{$longitud->longitud}}</button>
                        </a>
                    @endforeach
                </div>
                @endif

                @if($anchos->count() != 0)
                <div class=" col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">                
                        Anchos Disponibles:
                    </p> 
                    @foreach ($anchos as $ancho)
                        <a href="{{url('articulo/'.$ancho->slug.'/ver') }}" class="text-decoration-none">
                            <button class=" btn btn-outline-primary py-0 my-1">{{$ancho->ancho}}</button>
                        </a>
                    @endforeach
                </div>
                @endif
                                        
                @if($colores->count() != 0)
                <div class=" col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">                
                        Colores Disponibles:
                    </p> 
                    @foreach ($colores as $color)
                        <a href="{{url('articulo/'.$color->slug.'/ver') }}" class="text-decoration-none">
                            <button class=" btn btn-outline-{{$color->color}} py-0 my-1">{{$color->color}}</button>
                        </a>
                    @endforeach
                </div>
                @endif

                
                <div class="col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">                
                        Descripcion:
                    </p> 
                    <span>
                        {!!$articulo->descripcion!!}
                    </span>
                </div>

                <div class="col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">                
                        Otros Clientes Tambien Compraron:
                    </p> 
                    <div class="row">
                        @foreach ($art_relacionados as $art_relacionado)                   
                            <div class="col-2 py-1 ">
                                <div class="card border-success">
                                    <div class="card-imagen border-0">
                                        <img src="{{url('/images/articulos/'.$art_relacionado->imagen)}}" alt="{{$art_relacionado->nombre}}" class=" img-fluid p-2">
                                    </div>
                                    <div class="card-body p-2 bg-success text-center">
                                        <span class=" text-white ">
                                            {{$art_relacionado->nombre}}
                                        </span>
                                    </div>	
                                </div>
                                
                            </div>
                                
                                      
                        @endforeach
                    </div>
                   
                </div>
    
            </div>                  
        </div>
    </div>
    @include('comun.front.carusel-items')
@endsection