    
    <a href="{{ url('empleado/') }}">Regresar</a>
    
    <h1>{{ $modo}} empleado</h1>

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"  value="{{ isset($empleado->Nombre ) ? $empleado->Nombre : "" }}" id="Nombre"> <!-- ISSET VALIDA SI EXISTE UN VALOR -->
    <br>
    <br>
    <label for="primerApellido">Primer Apellido</label>
    <input type="text" name="primerApellido" id="PrimerApellido" value="{{ isset( $empleado->PrimerApellido)? $empleado->PrimerApellido : ""  }}" >
    <br>
    <br>
    <label for="segundoApellido">Segundo Apellido</label>
    <input type="text" name="segundoApellido" id="SegundoApellido" value="{{ isset($empleado->SegundoApellido) ? $empleado->SegundoApellido : "" }}">
    <br>
    <br>
    <label for="correo">Correo</label>
    <input type="text" name="correo" id="Correo" value="{{ isset( $empleado->Correo ) ? $empleado->Correo : "" }}">
    <br>
    <br>
    <label for="foto" style="vertical-align: middle;">Foto</label>
    @if (isset ($empleado->Foto))
    <img src="{{  asset('storage').'/'.$empleado->Foto  }}">       
    @else
        <h2>Sin foto</h2>
    @endif
    <input type="file" name="foto" id="Foto">
    <br>
    <br>
    <input type="submit" value=" {{ $modo }}">




    
<style>

    
    
    img{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        
    }
    
    
    </style>
