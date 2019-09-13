<?php

namespace App\Http\Controllers;

use App\Albaranl;
use Illuminate\Http\Request;
use App\Articulo;
use App\Familia;

class FrontController extends Controller
{
    public function index(){

        $ofertas = Articulo::selectRaw('* , count("codigo") as art')->where('oferta','SI')->groupBy('grupo')->get();          
        $familias = Familia::where('claparent','0')->where('baja_web','FALSO')->orderBy('orden')->get();      
        
        //return $familias;
        return view('front.index', compact('ofertas','familias'));
    }
    
    public function get_categorias($url_familia){

        //Familia_actual  se usa para el camino de migas y con su Metodo Categoria me devuelve todas sus scategorias. 
        $familia_actual = Familia::where('slug',$url_familia)->first();        
        
        //return ($familia_actual);
        $ofertas = Articulo::selectRaw('* , count("codigo") as art')->where('oferta','SI')->groupBy('grupo')->get();

        return view('front.familias.categorias',compact('familia_actual','ofertas'));        
    }

    public function get_articulos(Request $request, $url_familia){

        $familia_actual = Familia::where('slug',$url_familia)->first();    
        $articulos = Articulo::selectRaw('* , count("codigo") as art')->where('familia_id',$familia_actual->id)->where('baja_web','NO')->groupBy('grupo')->paginate(9);        
        $familias = Familia::where("claparent","0")->where('baja_web','FALSO')->get(); 

        $colores = Articulo::where('familia_id',$familia_actual->id)->where('color','!=',null)->where('baja_web','NO')->groupBy('color')->get();           
        $longitudes = Articulo::where('familia_id',$familia_actual->id)->where('longitud','!=',null)->where('baja_web','NO')->groupBy('longitud')->get();           
        return view('front.articulos.listar',compact('articulos','familia_actual','familias','colores','longitudes'));        
    }

    public function nuestros_productos(){

        $familias = Familia::where("claparent","0")->where('baja_web','FALSO')->orderBy('orden')->get();      
        $ofertas = Articulo::selectRaw('* , count("codigo") as art')->where('oferta','SI')->groupBy('grupo')->get();

        return view('front.familias.index',compact('familias','ofertas'));
    }

    public function ver_articulo($url_articulo){

        $articulo = Articulo::where("slug",$url_articulo)->first();             
        $longitudes =  Articulo::where("grupo", $articulo->grupo)->where("familia_id", $articulo->familia_id)->where('longitud', '!=', null)->get();     
        $familia_actual = $articulo->familia;        
        $ofertas = Articulo::selectRaw('* , count("codigo") as art')->where('oferta','SI')->groupBy('grupo')->get();         
        
        $porciones = explode(".", $articulo->grupo);
        $buscar_color = $porciones[0].'.'.$porciones[1].'.L.';

        //return $buscar_color;
        $anchos = Articulo::where("longitud",$articulo->longitud)->where("familia_id", $articulo->familia_id)->where('ancho', '!=', null)->groupBy('ancho')->get(); 
        $colores = Articulo::selectRaw('* , count("codigo") as t_color')->where("grupo","LIKE", $buscar_color.'%')->where("familia_id", $articulo->familia_id)->where('color', '!=', null)->groupBy('grupo')->get();
        
        $id= $articulo->id;

        $art_relacionados = Albaranl::join('articulos', 'articulos.id', '=', 'albaranl.claart')->select('articulos.imagen', 'articulos.nombre','articulos.grupo','albaranl.*')->selectRaw('count("albaranl.claart") as t_claart')
            ->whereIn('albaranl.claalb', function($query) use ($id){            
                $query->select('claalb')->from('albaranl')->where('claart', $id);
            })->where('albaranl.codigo', '!=', null)->groupBy('articulos.grupo')->get();     

        
        //return $art_relacionados;

        return view('front.articulos.ver',compact('articulo','art_relacionados','familia_actual','ofertas','longitudes','colores','anchos'));
    }


    public function cambio()
    {
        $articulos=Articulo::all();
        //return $articulo;
        return view('front.articulos.cambio', compact('articulos'));
    }
}
