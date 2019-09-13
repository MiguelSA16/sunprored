<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Articulos de Alta
    public function index( Request $request)
    {
        if($request->ajax()){
            $articulos = Articulo::where('baja_web','NO')->orderBy('id','DESC')->get();
                return response()->json([
                'articulos'=>$articulos
            ]);
        } 

        return;   
    }

    //Articulos de sin grupo
    public function sin_grupo( Request $request)
    {
        if($request->ajax()){
            $articulos = Articulo::where('baja_web','NO')
            ->where('grupo','-')
            ->orderBy('id','DESC')->get();
                return response()->json([
                'articulos'=>$articulos
            ]);
        } 

        return;   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $articulo = Articulo::find($id);

        if($request->get('imagen'))
        {
            
            $exploded = explode(',' , $request->imagen);
            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            } else{
                $extension = 'png';
            }

            $fileNane = str_random().'.'.$extension;
            $path = public_path().'/images/articulos/'.$fileNane;
            file_put_contents($path,$decoded);
        }else{
            $fileNane = $articulo->imagen;
        }


       

        $articulo->update([
            'nombre' => $request->get('nombre'),
            'familia_id' => $request->get('familia_id'),
            'grupo' => $request->get('grupo'),
            'color' => $request->get('color'),
            'longitud' => $request->get('longitud'),
            'imagen' =>$fileNane,
            'ancho' => $request->get('ancho')
        ]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
