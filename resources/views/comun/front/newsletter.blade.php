<div class="container-fluid bg-gris py-5">
        <div class="container">
            
            <!--Titulo carusel-->
            <div class="row mb-4 text-center">
                <div class="col-md-12">
                    <p class="sub-subtitle">
                        ¡Enterate, de todas nuestras ofertas!
                    </p>
                    <h2 class="title">
                        Suscríbete a nuetra newsletter
                        <small>
                            <i class="fas fa-envelope text-sunpro"></i>
                        </small> 
                    </h2>
                </div>
            </div><!--FIN Titulo carusel-->	
    
            <!--Formulario Newletter-->
                    
            <div class="col-md-12">
                <form action="{{url('newsletter')}}" method="POST" id="needs-validation" novalidate>
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="col-md-9 mb-3">
                            <div class="input-group">
                                <input type="email" class="form-control" id="nombre" placeholder="Suscríbete: Introduce tu email" name="email" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-sunpro border-y-radius-l-0" type="submit"> Suscríbete <i class="far fa-envelope"></i></button>
                                </span>
                            </div>
                        </div>           
                    </div>
                    
                </form>

                
            </div>
        </div>
    </div>