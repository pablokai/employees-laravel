@extends('layouts.app')


@section('content')
<div class="container-xxl">

@if(Session::has('mensaje'))
{{ Session::get('mensaje', 'default')}}
@endif
    


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<h1>Lista de empleados</h1>


<div class="busqueda">
   <div class="input-group">
    <p>Búsqueda avanzada </p>
    <input type="text" name="search" id="search" class="form-control" placeholder="Buscar..." />
   </div>
   
</div>

<br>
<br>

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <TH>Foto</TH>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Correo</th>
            <TH>Acciones</TH>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td>
                    
                    <img src="{{ asset('storage').'/'.$empleado->Foto}}">
                    
                   </td>
                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->PrimerApellido}}</td>
                <td>{{$empleado->SegundoApellido}}</td>
                <td>{{$empleado->Correo}}</td>
                <td >
                 <div class="acciones"> 
                <form action="{{ url('/empleado/'.$empleado->id.'/edit') }}" method="GET"> <!-- Accion de enviar form para editar, se concatena para redirigir -->
                    @csrf  <!--llave -->
                    <input class="btn btn-info"  type="submit" value="Editar" onclick="">
        
                </form>
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="POST"> <!-- Accion de enviar form para borrar, se envia parametro entre pantallas con .-->
                
                @csrf  <!--llave -->
                {{method_field('DELETE')}}
                <input class="btn btn-danger"  type="submit" value="Borrar" onclick="return confirm('¿Quieres borrar?')">

                </form>
            </div>  
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>

{{ $empleados->links() }}

</div>


<style>

body{
    background-color:  var(--bs-body-bg);
}


table{
    border-radius: 20px;
    border-collapse: collapse;
    overflow: hidden;
}

h1{
    text-align: center;
    font-weight: 700;
    padding: 8% 0 ; 
}

.acciones{
    display: flex;
    flex-direction: row;
    gap: 5%;
    height:  100% !important;
    padding: 1vh !important;
}

img{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.busqueda{
    display: flex;
    flex-direction: row;
    justify-items: flex-end;
    width: 40%;
    margin: 0;  
}

.input-group p{
    margin: 0;
    margin-right: 5%;
    vertical-align: middle;
    font-weight: 600;
}



</style>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script type="text/javascript">

    $('#search').on('keyup',function(){   

    $value=$(this).val();
        
    if($value !== ''){

    $.ajax({
    type : 'get',
    url : '{{URL::to('empleado/search')}}',
    data:{'search':$value},
        success:function(data){
        $('tbody').html(data);
        }
    });
    }else{
  
        $.ajax({
        type : 'get',
        url : '{{URL::to('empleado/')}}'
        });
    }
    })

    
</script>

@endsection

