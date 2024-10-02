<?php

namespace App\Http\Controllers;

use App\Traits\ToastTrigger;
use Illuminate\Http\Request;

class ContadorController extends Controller
{
    use ToastTrigger;

    public function index()
    {
        $número = 0; // Inicializa el contador en 0
        return view('contador', compact('número'));
    }

    public function incrementar($número)
    {
        if ($número < 10) {
            $número++;
            $this->alert('Número incrementado');
        } else {
            $this->errorToast('El número no puede ser mayor a 10', 'error');
        }

        return view('contador', ['número' => $número]);
    }

    public function decrementar($número)
    {
        if ($número > 0) {
            $número--;
            $this->alert('Contador decrementado');
        } else {
            $this->errorToast('El número no puede ser menor a 0', 'error');
        }

        return view('contador', ['número' => $número]);
    }

    public function reset()
    {
        $número = 0; // Reinicia el contador a 0
        return view('contador', compact('número'));
    }

    public function duplicar($número)
    {
        $número *= 2; // Duplica el valor
        return view('contador', ['número' => $número]);
    }

    public function establecer($valor)
    {
        return view('contador', ['número' => $valor]);
    }
}
