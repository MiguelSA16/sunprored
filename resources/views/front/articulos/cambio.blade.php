@foreach($articulos as $articulo)

@php
    $pvpoferta=$articulo->pvpoferta;  
    $pvpofertaNew=str_replace(',', '.', $pvpoferta);
@endphp
<p>
    Update articulos set pvpoferta={{$pvpofertaNew}} where id={{$articulo->id}};
</p>


@endforeach


