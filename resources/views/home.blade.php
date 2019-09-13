@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BINVENIDO</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success " role="alert" >
                        
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->role->nombre == 'admin')
                        {{ 'eres un adminstrador' }}                           
                        
                    @else
                        You are logged in!
                    @endif
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="alert alert-dark alert-dismissble fade show" >
    <button try="button" class="close" data-dismiss="alert">&times;</button>
        
        @if (Auth::user()->role->nombre == 'admin')
            {{ 'ERES ADMINISTRADORyy' }}   
        @else
            You are logged in!
        @endif
</div>
