<div class="container-fluid bg-migas size-13">
    <div class="container">
        <nav aria-label="breadcrumb bg-migas">
            <ol class="breadcrumb m-0 p-2">        

                <li class="breadcrumb-item">
                    <a href="{{url('/')}}" class="text-decoration-none link-camino-migas">
                        INICIO
                    </a>
                </li>         
                
                @isset($articulo->familia)
                    @php
                        $familia_actual = $articulo->familia;
                    @endphp
                @endisset
                

                @if (isset($familia_actual))

                    <li class="breadcrumb-item">
                        <a href="{{url('/nuestros-productos')}}" class="text-decoration-none link-camino-migas">
                            FAMILIAS 
                        </a>
                    </li> 

                    @if (isset($familia_actual->padre->padre))
                        <li class="breadcrumb-item">
                            <a href="{{url('familia/'.$familia_actual->padre->padre->slug.'/categorias')}}" class="text-decoration-none link-camino-migas">
                                {{$familia_actual->padre->padre->nomfam}}
                            </a>
                        </li> 
                    @endif 

                    @if ($familia_actual->padre)
                        <li class="breadcrumb-item">
                            <a href="{{url('familia/'.$familia_actual->padre->slug.'/categorias')}}" class="text-decoration-none link-camino-migas">
                                {{$familia_actual->padre->nomfam}}
                            </a>
                        </li>          
                    @endif    

                    @if (isset($articulo->familia) )

                        <li class="breadcrumb-item">
                            <a href="{{url('familia/'.$articulo->familia->slug.'/articulos')}}" class="text-decoration-none link-camino-migas">
                                {{$articulo->familia->nomfam}}
                            </a>
                        </li>    

                        <li class="breadcrumb-item text-uppercase">
                            {{$articulo->nombre}} 
                        </li>   
                        
                    @else
                    
                        <li class="breadcrumb-item">
                            {{$familia_actual->nomfam}}
                        </li> 

                    @endif        
                
                    

                @else

                    <li class="breadcrumb-item">
                        FAMILIAS
                    </li>   

                @endif  

            </ol>
        </nav>

    </div>
</div>