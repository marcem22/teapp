<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    public function index(): View
    {
        $patients = Patient::paginate(5); // Carga 5 pacientes por página
        $title = 'Listado de Pacientes';  // Definir el título que quieres mostrar
        return view('patients.index', compact('patients', 'title'));
    }


    public function create(): View
    {
        $title= 'Nuevo Paciente';
        return view('patients.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:patients',
            'apellidos' => 'required',
            'nombres' => 'required',
            'dni' => 'required|unique:patients',
            'nacimiento' => 'required|date',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:patients',
            'direccion' => 'required',
        ]);
        Patient::create($request->all());
        return redirect()->route('patients.index');
    }

    public function show(Patient $patient): View
    {
        $title='Detalle';
        return view('patients.show', compact('patient','title'));
    }

    public function edit(Patient $patient): View
    {
        $title='Modificar Datos';
        return view('patients.edit', compact('patient','title'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'codigo' => 'required|unique:patients,codigo,' . $patient->id,
            'apellidos' => 'required',
            'nombres' => 'required',
            'dni' => 'required|unique:patients,dni,' . $patient->id,
            'nacimiento' => 'required|date',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'direccion' => 'required',
        ]);
        $patient->update($request->all());
        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
