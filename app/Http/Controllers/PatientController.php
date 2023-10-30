<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Lista os pacientes
     *
     * @return View
     */
    public function index(): View {

        $patients = Patient::orderBy('id')->paginate(10);

        $data = [
            'patients' => $patients,
        ];
        
        return view('patient.index', $data);

    }

    public function create(): View {

        $patient = new Patient();

        $data = [
            'patient' => $patient,
        ];
        
        return view('patient.create-edit', $data);
    }

    public function insert() {

    }

}
