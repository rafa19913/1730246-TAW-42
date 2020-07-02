<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $empleados = Empleado::latest()->paginate(5);
        return view('empleados.index',compact('empleados'))

        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'lugar_nacimiento' => 'required',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'telefono' => 'required',
            'id_dep' => 'required',
        ]);


        Empleado::create($request->all());

   

        return redirect()->route('empleados.index')

                        ->with('success','Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([

            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'lugar_nacimiento' => 'required',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'telefono' => 'required',
            'id_dep' => 'required',

        ]);

  

        $empleado->update($request->all());

  

        return redirect()->route('empleados.index')

                        ->with('success','Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

  

        return redirect()->route('empleados.index')

                        ->with('success','Empleado eliminado correctamente');
    }
}
