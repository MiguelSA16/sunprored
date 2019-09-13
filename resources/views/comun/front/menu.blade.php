<div class="container-fluid borde-inferior">
        <nav class="container navbar navbar-expand-lg navbar-light">              
                
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('/images/logo.png')}}" class="logo d-inline-block" alt="optolan technology"> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">	
                    <a class="nav-link menu" href="{{url('/nuestros-productos')}}">			
                        <li class="nav-item">
                            <i class="fas fa-stream text-sunpro"></i> 
                            Nuestros Productos
                       </li>
                    </a>

                    <a class="nav-link menu" href="{{url('/ofertas')}}">
                        <li class="nav-item">
                            <i class="fas fa-gift text-sunpro"></i> 
                            Ofertas
                        </li>
                    </a>

                    <a class="nav-link menu" href="{{url('/descargas')}}">
                        <li class="nav-item">                        
                            <i class="fas fa-download text-sunpro"></i> 
                            Descargas                        
                        </li>
                    </a>

                    <a class="nav-link menu" href="{{url('/contactanos')}}">
                        <li class="nav-item">
                            <i class="far fa-smile-wink text-sunpro"></i>
                            Contactanos                        
                        </li>
                    </a>
                </ul>

                <form method="GET" action="{{url('/buscador')}}" class="form-inline my-2 my-lg-0">
                    <div class=" input-group">
                        @if (isset($cad_buscada))
                            <input class="form-control " type="search" placeholder="Buscar" aria-label="Buscar" name="qq" value="{{$cad_buscada}}">
                        @else
                            <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" name="qq">
                        @endif
                        <span class="input-group-btn">        
                            <button class="btn btn-sunpro border-y-radius-l-0" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </div>
               
                </form>

                

            </div>
        </nav>
    </div>