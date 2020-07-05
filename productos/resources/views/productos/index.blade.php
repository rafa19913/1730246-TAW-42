@extends('productos.layout')

 

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD de productos con laravel</h2>
            </div>

            <div class="pull-right">
        

            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productos.create') }}"> Crear nuevo departamento</a>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productos.index') }}"> Ver Empleados</a>
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
            <th>Nombre</th>
        <th width="280px">Acción</th>
        </tr>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>
                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('productos.show',$producto->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('productos.edit',$producto->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $productos->links() !!}


@endsection