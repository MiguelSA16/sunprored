<div class="container-fluid py-4">
        <div class="container">
            <!-- Titulo -->
            <div class="row subrayar">
                <div class="col-md-8">
                    <p class="sub-subtitle">
                        Nuestros productos mas destacadas
                    </p>
                    <h1 class="title">
                        Nuestros productos
                        <small>
                            <i class="fas fa-stream text-sunpro"></i>
                        </small> 
                    </h1>
                </div>                
                <div class="col-md-4 d-lg-flex align-items-end justify-content-end pb-2">
                    <a href="category.html" class="text-muted text-sm link text-decoration-none">               
                        Ver todas las categorías <i class="fas fa-angle-double-right ml-2"></i>
                    </a>
                </div>
            </div>
            <div class=" line-subrayar ml-m-15"></div>
            
            <!-- Familias -->
            <div class="row  justify-content-md-center"> 
                @foreach ($familias as $familia)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 pb-3"  id="familia">
                        @if ($familia->grupo == 'FALSO')
                            <a href="familia/{{$familia->slug}}/articulos" class="text-decoration-none item">					
                        @else
                            <a href="familia/{{$familia->slug}}/categorias" class="text-decoration-none item">		
                        @endif
                        
                            <div class="img-familia">
                            <img src="{{asset('images/familias/'.$familia->imagen)}}" class="img-fluid rounded-circle img-thumbnail" alt="">
                            </div>
                            <div class="text-familia text-center my-3">
                                <h2 class="subtitle">
                                    {{$familia->nomfam}}							
                                </h2>
                            </div>	
                        </a>								
                    </div>                    
                @endforeach
            </div>		
        </div>	
    </div>