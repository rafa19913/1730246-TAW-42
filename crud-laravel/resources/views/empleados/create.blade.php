@extends('empleados.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar nuevo empleado</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Volver</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Error!</strong> Algunos problemas al crear..<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('empleados.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nombres:</strong>
                <input type="text" name="nombres" class="form-control" placeholder="Nombres">
                
                <strong>Apellidos:</strong>
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos">

                
                <strong>Cedula:</strong>
                <input type="text" name="cedula" class="form-control" placeholder="Cedula">

                
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email">

                
                <strong>Lugar de nacimiento:</strong>
                <input type="text" name="lugar_nacimiento" class="form-control" placeholder="Lugar de nacimiento">

                <strong>Sexo:</strong>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="masculino">Hombre</option>
                    <option value="femenino">Mujer</option>
                    <option value="otro">Otro</option>
                </select>


                <strong>Estado civil:</strong>
                <select name="estado_civil" id="estado_civil" class="form-control">
                    <option value="soltero">Soltero</option>
                    <option value="casado">Casado</option>
                </select>
                
                <strong>Teléfono:</strong>
                <input type="number" name="telefono" class="form-control" placeholder="Teléfono">

                <strong>ID departamento:</strong>
                <input value="1" type="number" name="id_dep" class="form-control" placeholder="ID departamento">


                <button type="submit" class="btn btn-primary">Aceptar</button>
                
            </div>

        </div>


    </div>

   

</form>

@endsection