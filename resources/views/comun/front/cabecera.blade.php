<div class="row">
</div>
<div class="container-fluid borde-inferior">
    <div class="container">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item mr-auto d-none d-sm-block">
                <a class="nav-link disabled">
                    <i class="fas fa-phone"></i> +34 915 00 79 63
                </a>
            </li>  
            
            <li class="nav-item d-none d-sm-block">
                <a class="nav-link disabled">
                    <i class="fas fa-envelope"></i> comercial@sunprored.es
                </a>
            </li>
              
            <li class="nav-item d-none d-sm-block">		  		
                <a class="redes-sociales" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>	    	
            
                <a class="redes-sociales" href="#">
                    <i class="fab fa-youtube"></i>
                </a>	
            
                <a class="redes-sociales" href="#">
                    <i class="fab fa-instagram"></i>
                </a>	
            
                <a class="redes-sociales" href="#">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>

            <ul class=" nav">
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Hola, {{ Auth::user()->name }} 
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link  text-decoration-none">
                            <i class="fas fa-fingerprint"></i> 
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link text-decoration-none">
                            <i class="fas fa-user-plus"></i>
                            Register
                        </a>
                        @endif
                    </li>                       
                    @endauth
                </div>
                @endif
            </ul>

            <li class="nav-item mr-auto d-block d-sm-none">
                <a class="nav-link disabled">
                    <button type="button" class="btn btn-success btn-sm">
                        <i class="fas fa-phone"></i> Llamanos
                    </button>
                </a>
                </li>  

                <li class="nav-item mr-auto d-block d-sm-none">
                <a class="nav-link disabled">
                    <button type="button" class="btn btn-info btn-sm">
                        <i class="fas fa-envelope"></i> Escribenos
                    </button>
                </a>
            </li>  			  


        </ul>
    </div>
</div>

