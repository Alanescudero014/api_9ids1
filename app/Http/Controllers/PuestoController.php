<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function view (Request $req)
    {
        if($req->id)
        {
            $puesto = Puesto::find($req->id);
        }
        else
        {
            $puesto = new Puesto();
        }

        return view('puesto', compact('puesto'));
    }

    public function index ()
    {
        $puestos = Puesto::all();

        return view('puestos',compact('puestos'));
    }
    
    public function store(Request $req)
    {
        if($req->id != 0)
        {
            $puesto = Puesto::find($req->id);
        }
        else
        {
            $puesto = new Puesto();
        }
        

        $puesto->codigo = $req->codigo;
        $puesto->nombre = $req->nombre;

        $puesto->save();
    
        return redirect()->to('/puestos');
    }

    public function delete (Request $req)
    {
        $puesto = Puesto::find($req->id);
        $puesto->delete();
        return redirect()->route('puestos');
    }
}
