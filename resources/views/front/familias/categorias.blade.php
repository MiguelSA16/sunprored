@extends('layouts.front.vertical')

@section('cuerpo')
    @include('comun.front.camino-migas')

    <div class="container-fluid py-4">
        <div class="container">
            <!-- Titulo -->
            <div class="row subrayar">
                <div class="col-md-8">
                    <p class="sub-subtitle">
                        Nuestras categorías mas destacadas
                    </p>
                    <h1 class="title">
                        {{$familia_actual->nomfam}}
                        <small>
                            <i class="fas fa-stream text-sunpro"></i>
                        </small> 
                    </h1>
                </div>   
                <div class="col-md-4 d-lg-flex align-items-end justify-content-end pb-2">
                    <a href="category.html" class="text-muted text-sm link text-decoration-none">               
                        Volver a las familias <i class="fas fa-angle-double-right ml-2"></i>
                    </a>
                </div> 
            </div>
            <div class=" line-subrayar ml-m-15"></div>
            
            <!-- Familias -->
            <div class="row  justify-content-md-center"> 
                @foreach ($familia_actual->categorias as $categoria)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 pb-3"  id="familia">
                        @if ($categoria->grupo == 'FALSO')
                            <a href="{{url('familia/'.$categoria->slug.'/articulos')}}" class="text-decoration-none item">					
                        @else
                            <a href="{{url('familia/'.$categoria->slug.'/categorias')}}" class="text-decoration-none item">		                                
                        @endif
                        
                            <div class="img-familia">
                            <img src="{{asset('images/categorias/'.$categoria->imagen)}}" class="img-fluid rounded-circle img-thumbnail" alt="">
                            </div>
                            <div class="text-familia text-center my-3">
                                <h6 class="subtitle">
                                    {{$categoria->nomfam}}

                                </h6>
                            </div>	
                        </a>								
                    </div>                    
                @endforeach
            </div>		
        </div>	
    </div>

    @include('comun.front.carusel-items')
    
@endsection