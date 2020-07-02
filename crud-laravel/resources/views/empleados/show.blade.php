@extends('empleados.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Empleado</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Volver</a>
            </div>
        </div>
    </div>

   

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombres:</strong>
                {{ $empleado->nombres }}
<br>
                <strong>Apellidos:</strong>
                {{ $empleado->apellidos }}
<br>
                <strong>Cedula:</strong>
                {{ $empleado->cedula }}
<br>
                <strong>Email:</strong>
                {{ $empleado->email }}
<br>
                <strong>Lugar de nacimiento:</strong>
                {{ $empleado->lugar_nacimiento }}
<br>
                <strong>Sexo:</strong>
                {{ $empleado->sexo }}
<br>
                <strong>Estado Civil:</strong>
                {{ $empleado->estado_civil }}
<br>
                <strong>Teléfono:</strong>
                {{ $empleado->telefono }}
<br>
                <strong>ID departamento:</strong>
                {{ $empleado->id_dep }}

            </div>
        </div>
    </div>

@endsection