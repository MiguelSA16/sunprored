@extends('layouts.front.nav-left')


@section('cuerpo')

<div class="container-fluid mt-3">
    <!-- Titulo -->
    <div class="row subrayar">
        <div class="col-md-12 text-center">            
            <h1 class="title">
                {{$familia_actual->nomfam}}
                <small>
                    <i class="fas fa-shopping-cart text-sunpro"></i>
                </small> 
            </h1>
            <p class="sub-subtitle pb-2">
                NUESTRAS ARTÍCULOS MAS DESTACADAS
            </p>
        </div> 
    </div>
    <div class=" line-subrayar ml-m-15"></div>

    <div class="row">       
            
        @foreach ($articulos as $articulo_iten)
            <!-- Muestra los articulos -->
            <div class="col-12 col-md-4 mb-3 ">
                <a href="{{url('articulo/'.$articulo_iten->slug.'/ver') }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-imagen">
                            <img src="{{asset('images/articulos/'.$articulo_iten->imagen)}}"  alt="...">
                        </div>							 	
                        <div class="card-body text-center">
                            <h5 class="card-title min-height-card titulo-articulo">
                                {{$articulo_iten->nombre}}                                
                            </h5>
                            @if($articulo_iten->art <= 1)
                            <button class="btn btn-gris btn-sm text-uppercase">
                                    Visita este articulo 
                            </button>
                        @else
                        <button class="btn btn-warning btn-sm text-uppercase">
                            {{$articulo_iten->art}}                            
                            Longitudes disponibles
                        </button>
                        @endif
                            <hr class="my-3">
                            <h6>
                                Referencia: <span class="badge badge-ref size-13">{{$articulo_iten->codigo}}</span>
                            </h6>		  	
                        </div>
                        <div class="card-footer text-center">
                            <div class="row">
                                <div class="col-12">
                                    <i class="far fa-file-pdf bg-pdf"></i>
                                    <small class="py-1">
                                        Ficha Tecnica
                                    </small> 
                                </div>
                            </div>                        
                        </div>
                    </div>
                </a>								
            </div>
            <!-- Fin Muestra los articulos -->
        @endforeach

        <div class="col-12">
                {!!$articulos->links()!!}
            </div>
        </div>
               
    </div>    
    
@endsection