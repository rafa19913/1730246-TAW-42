@extends('departamentos.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar nuevo departamento</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Volver</a>

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

   

<form action="{{ route('departamentos.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del departamento">
            

                <button type="submit" class="btn btn-primary">Aceptar</button>
                
            </div>

        </div>


    </div>

   

</form>

@endsection