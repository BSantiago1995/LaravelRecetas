<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use PHPUnit\Framework\MockObject\Verifiable;

class RecetaController extends Controller
{
    //constructor para que valore las rutas
    public function __construct() //siempre es doble guion bajo 
    {
        $this->middleware('auth',['except'=>'show']);
    }
    //
    public function index(){
        $usuario = Auth::user();
        $userRecetas=Auth::user()->userRecetas;
        return view('recetas.index')->with('userRecetas',$userRecetas)
                                    ->with('usuario',$usuario);
       
    }
    public function create(){
        $categorias=DB::table('categoria_recetas')->get()->pluck('nombre','id');
        //$categorias = CategoriaRecetas::all(['id','nombre']) haciendo sentencia sql
        return view('recetas.create')->with('categorias',$categorias);
       
    }
    public function store(Request $request)
    {
    
        /// la variable es cualquiera //validacion para campos vacios
        $data=$request -> validate([
            'nombre'=> 'required|min:6',
            'categorias' => 'required',
            'ingrediente' => 'required',
            'preparacion' => 'required',
             //'imagen'=>'required|image'
        ]);
        // añadir la url de la imagen
        $ruta_imagen=$request['imagen']->store('upload-image','public');
        
        // para redimensionar la imagen
        /*$img= Image::make(public_path("storage/{$ruta_imagen}"))-> fit(1100,550);
        $img->save();*/
        //insert sin modelos
        //insertar la informacion del formulario a la base de datos
        /*DB::table('recetas')-> insert([
          'nombre' => $data['nombre'],
          'ingredientes'=> $data['ingrediente'],
          'preparacion'=> $data['preparacion'],
          'imagen' =>$ruta_imagen,
          'user_id' => Auth::user()->id,
          'categoria_id'=> $data['categorias'],          
          
          ]);*/

          //insertar desde l modelo
          Auth::user()->userRecetas()->create([
            'nombre' => $data['nombre'],
            'ingredientes'=> $data['ingrediente'],
            'preparacion'=> $data['preparacion'],
            'imagen' =>$ruta_imagen,
            'categoria_id'=> $data['categorias'],   
          ]);
        // se redirecciona a la vistea 
        return redirect()-> action([RecetaController::class, 'index']);
        //dd($request->all());//para visualizar todo lo que enviamos en el metodo Post
    }
    public function show(Receta $receta){
        return view('recetas.show')->with('receta',$receta);
    }
    public function edit(Receta $receta){
        $this->authorize('update',$receta);
        $categorias=DB::table('categoria_recetas')->get()->pluck('nombre','id');
        return view('recetas.edit')->with('categorias',$categorias)
                                    ->with('receta',$receta);
    }
    public function update(Request $request, Receta $receta){
        //verificacion de policy
        $this->authorize('update',$receta);
        $data=$request -> validate([
            'nombre'=> 'required|min:6',
            'categorias' => 'required',
            'ingrediente' => 'required',
            'preparacion' => 'required',
             
        ]);
        //asignar valores 

        $receta->nombre=$data['nombre'];
        $receta->categoria_id=$data['categorias'];
        $receta->ingredientes=$data['ingrediente'];
        $receta->preparacion=$data['preparacion'];
        
        //para controlar si es nueva imagen

        if($request['imagen']){
            //guardar la nueva imagen
            $ruta_imagen=$request['imagen']->store('upload-image','public');
            //estilo
            $img= Image::make(public_path("storage/{$ruta_imagen}"))-> fit(1100,550);
            $img->save();
            $receta->imagen=$ruta_imagen;
        }

        //guardo informacion
        $receta->save();
        return redirect()-> action([RecetaController::class, 'index']);
    }
    public function destroy(Receta $receta){
        //verificacion 
        $this->authorize('delete',$receta);
        //agregar metodo para eliminar 
        $receta->delete();
        return redirect()-> action([RecetaController::class, 'index']);
    }
}   
