@extends('empleados.layout')

 

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD de empleados con laravel</h2>
            </div>

            <div class="pull-right">
        

            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('empleados.create') }}"> Crear nuevo empleado</a>
            </div>

            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departamentos.index') }}"> Ver Departamentos</a>
            </div>

        

        </div>
    </div>

   

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

   

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula</th>
            <th>Email</th>
            <th>Lugar de nacimiento</th>
            <th>Sexo</th>
            <th>Estado civil</th>
            <th>Teléfono</th>
            <th>ID departamento</th>
        <th width="280px">Acción</th>
        </tr>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombres }}</td>
            <td>{{ $empleado->apellidos }}</td>
            <td>{{ $empleado->cedula }}</td>
            <td>{{ $empleado->email }}</td>
            <td>{{ $empleado->lugar_nacimiento }}</td>
            <td>{{ $empleado->sexo }}</td>
            <td>{{ $empleado->estado_civil }}</td>
            <td>{{ $empleado->telefono }}</td>
            <td>{{ $empleado->id_dep }}</td>
            <td>
                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('empleados.show',$empleado->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('empleados.edit',$empleado->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $empleados->links() !!}


@endsection