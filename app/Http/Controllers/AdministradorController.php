<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function index(){

        return view('admin.index');
    }

    public function ariculos_alta(){

        return view('admin.articulos.alta');
    }

    
    
    public function herramienta_agrupar(){
        return view('admin.articulos.agrupar');
    }

    public function agrupar(Request $request){

        Articulo::where('familia_id',$request->get('familia_id'))
            ->where($request->get('columna'),'like',$request->get('buscar'))
            ->update([
                'grupo'=>$request->get('grupo'),
                'color'=>$request->get('color')
                ]);
        return;
    }
}
