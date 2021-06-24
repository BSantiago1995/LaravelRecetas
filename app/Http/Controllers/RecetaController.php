<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    //constructor para que valore las rutas
    public function __construct() //siempre es doble guion bajo 
    {
        $this->middleware('auth');
    }
    //
    public function index(){
       
        return view('recetas.index');
       
    }
    public function create(){
        $categorias=DB::table('categorias_recetas')->get()->pluck('nombre','id');
        return view('recetas.create')->with('categorias',$categorias);
       
    }
    public function store(Request $request)
    {
        
        /// la variable es cualquiera //validacion para campos vacios
        $data=$request -> validate([
            'nombre'=> 'required|min:6'
        ]);
        //insertar la informacion del formulario a la base de datos
      DB::table('recetas')-> insert([
          'nombre' => $data['nombre']
          ]);
        // se redirecciona a la vistea 
        return redirect()-> action([RecetaController::class, 'index']);
        //dd($request->all());//para visualizar todo lo que enviamos en el metodo Post
    }
}
