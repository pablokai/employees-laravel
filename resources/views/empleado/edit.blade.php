@extends('layouts.app')


@section('content')
<div class="container">



<form  action="{{ url('/empleado/'.$empleado->id) }}" method="POST" enctype="multipart/form-data">   <!-- enctype para images   -->

    @csrf <!-- LLAVE DE SEGURIDAD, verificar que se envio desde el sistema -->
    {{method_field('PATCH')}}
    @include('empleado.form', ['modo' => 'Editar'])   <!-- pasar información a la inclusión -->

</form>
</div>

@endsection

