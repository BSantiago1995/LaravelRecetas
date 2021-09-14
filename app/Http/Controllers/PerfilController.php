<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Receta;
use Exception;
use Illuminate\Http\Request;


class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function update(Request $request, Perfil $perfil)
    {
        //policy"
            $this->authorize('update',$perfil);
        //validar
            $data=request()->validate([
                'nombre' => 'required',
                'url'=>'required',
                'biografía'=> 'required',
            ]);
        //si el usuario sube una imagen
         if($request['imagen']){
            $ruta_imagen=$request['imagen']->store('upload-perfil','public');
            $ruta_imagen->save();

            //arreglo de imagenes // array merge es para enviar dos paramtros 
            $array_imagen = ['imagen'=>$ruta_imagen];
         }

        // dd(data)
            auth()->user()->name=$data['nombre'];
            auth()->user()->name=$data['url'];
            auth()->user()->save();
        //eliminar url y name de data
            unset($data['nombre']);
            unset($data['url']);
    
        // guardar información
            auth()->user()->userPerfil()->update(array_merge( // dos paramtros de tipo array 
                $data,
                $ruta_imagen ?? [] //almacena la imagen
            )             
            );
        
        //Redireccionar    

        return redirect()->action([RecetaController::class,'index']);
    }   

    public function edit(Perfil $perfil)
    {
        //policy
        //$this->authorize('view',$perfil);
        return view('perfiles.edit')->with('perfil', $perfil);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show')->with('perfil', $perfil);
    }

   

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     /
    public function update(Request $request, Perfil $perfil)
    {
        //
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     
    public function destroy(Perfil $perfil)
    {
        
    }
    */
}
