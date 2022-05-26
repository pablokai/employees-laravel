@extends('layouts.app')


@section('content')
<div class="container">



<form  action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data">   <!-- enctype para images   -->

    @csrf <!-- LLAVE DE SEGURIDAD, verificar que se envio desde el sistema -->

    @include('empleado.form' , ['modo' => 'Crear'])

</form>

</div>

@endsection