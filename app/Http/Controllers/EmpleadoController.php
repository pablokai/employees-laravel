<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Stmt\Foreach_;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(4); //array de json obtiene de db
        return view('empleado.index', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {

            $datos = Empleado::where('nombre', $request->search)->get();
      
            if ($datos) {
                $output = "";
                foreach($datos as $empleado){
                $output .= 
                '<tr>
                <td>'.$empleado->id.'</td>
                <td>
                    
                    <img src="'.asset('storage').'/'.$empleado->Foto.'">
                    
                   </td>
                <td>'.$empleado->Nombre.'</td>
                <td>'.$empleado->PrimerApellido.'</td>
                <td>'.$empleado->SegundoApellido.'</td>
                <td>'.$empleado->Correo.'</td>
                <td>'.$empleado->Correo.'</td>'; 

            }
                
                return Response($output);

        }
    

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('empleado.create');
    }


    /* EL CREATE RECIBE LO ANTES, ENVIA AL STORE, ESTE VALIDA DATOS ANTES DE GUARDAR */




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token'); //se guardan datos excepto el token

        if($request->hasFile('foto')){
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public'); //si existe se guarda en storage/uploads, y se obtiene de ahí el archivo, de esta manera se obtiene el formato correcto y no un .tmp
        }else{

        }
        
        Empleado::insert($datosEmpleado);  //por medio del modelo se ingresan los datos digitados
        return redirect('empleado')->with('mensaje', 'Empleado agregado con éxito');  //retorna en json con la info

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $datosEmpleado = request()->except(['_token', '_method']); 

        if($request->hasFile('foto')){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public'); //si existe se guarda en storage/uploads, y se obtiene de ahí el archivo, de esta manera se obtiene el formato correcto y no un .tmp
        }
        
        Empleado::where('id', '=', $id)->update($datosEmpleado);  //se busca con el orm por id y si encuentra se modifica
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            Empleado::destroy($id);         
        }

        return redirect('empleado')->with('mensaje', 'Empleado  eliminado con éxito'); 

        //regresa a la vista
    }
}
