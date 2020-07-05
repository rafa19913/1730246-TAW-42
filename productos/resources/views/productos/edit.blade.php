@extends('productos.layout')

   

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar productos</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('productos.index') }}"> Volver</a>

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

  

    <form action="{{ route('productos.update',$producto->id) }}" method="POST">

        @csrf

        @method('PUT')

   

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" placeholder="nombre">

                    <button type="submit" class="btn btn-primary">Aceptar</button>

                </div>
            </div>
        </div>
    </form>

@endsection