<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('empresario.index');
        //$email = $request->input('email');
        //console.log('Llego en ingreso');
        //echo ('Llego en ingreso');
        //alert('Llego en ingreso');
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
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }


    // Saber si existe 
    public function ingreso(Request $request){
        //return true;
        //$email = $request->input('email');
        //redirect()->route('empresario.index'); 
        
        //return view('principal.hola');

        /*$request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        //Producto::create($request->all());
      
        //echo $email;
        //echo $password;
        
        return redirect()->route('principal.index')
                        ->with('success','Ruta creado correctamente.');  */
    }





    
}


?>

<script>

    function exampleHola(){
        alert('hola en function php');
    }

</script>

