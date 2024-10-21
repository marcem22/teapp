<?php

namespace App\Http\Controllers;
use App\Traits\ToastTrigger;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    use ToastTrigger;
    public function index()
    {
        $patients = Patient::paginate(5); // Carga 5 pacientes por página
        $title = 'Listado de Pacientes';  // Definir el título que quieres mostrar
        return view('patients.index', compact('patients', 'title'));
    }


    public function create()
    {
        $title = 'Nuevo Paciente';
        return view('patients.create', compact('title'));
    }
    public function store(PatientRequest $request)
    {
        // Los datos ya están validados en este punto
        $validatedData = $request->validated();

        // Crear un nuevo paciente con los datos validados
        $patient = new Patient($validatedData);
        $patient->save();

        // Redirigir o devolver una respuesta
        return redirect()->route('patients.index')->with('success', 'Paciente creado exitosamente.');
    }


    public function show(Patient $patient)
    {
        $title = 'Detalle';
        return view('patients.show', compact('patient', 'title'));
    }
    public function edit(Patient $patient)
    {
        $title = 'Modificar Datos';
        return view('patients.edit', compact('patient', 'title'));
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
