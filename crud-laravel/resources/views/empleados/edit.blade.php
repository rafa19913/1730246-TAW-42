@extends('empleados.layout')

   

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar Empleado</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Volver</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Error!</strong> Algunos problemas al editar.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('empleados.update',$empleado->id) }}" method="POST">

        @csrf

        @method('PUT')

   

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombres:</strong>
                    <input type="text" name="nombres" value="{{ $empleado->nombres }}" class="form-control" placeholder="nombres">
                    
                    <strong>Apellidos:</strong>
                    <input type="text" name="apellidos" value="{{ $empleado->apellidos }}" class="form-control" placeholder="apellidos">

                    <strong>Cedula:</strong>
                    <input type="text" name="cedula" value="{{ $empleado->cedula }}" class="form-control" placeholder="cedula">

                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $empleado->email }}" class="form-control" placeholder="email">

                    <strong>Lugar de nacimiento:</strong>
                    <input type="text" name="lugar_nacimiento" value="{{ $empleado->lugar_nacimiento }}" class="form-control" placeholder="lugar_nacimiento">

                    <strong>Sexo:</strong>

                    <select name="sexo" id="sexo" class="form-control">
                        <option value="{{ $empleado->sexo }}">{{ $empleado->sexo }}</option>
                        <option value="masculino">Hombre</option>
                        <option value="femenino">Mujer</option>
                        <option value="otro">Otro</option>
                    </select>

                    <strong>Estado civil:</strong>

                    <select name="estado_civil" id="estado_civil" class="form-control">
                        <option value="{{ $empleado->estado_civil }}">{{ $empleado->estado_civil}}</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                    </select>

        
                    <strong>Teléfono:</strong>
                    <input type="text" name="telefono" value="{{ $empleado->telefono }}" class="form-control" placeholder="telefono">


                    <strong>ID_Departamento:</strong>
                    <input type="text" name="id_dep" value="{{ $empleado->id_dep }}" class="form-control" placeholder="ID departamento">

                    <button type="submit" class="btn btn-primary">Aceptar</button>

                </div>
            </div>
        </div>
    </form>

@endsection