<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    /**
     * Lista os pacientes
     *
     * @return View
     */
    public function index(Request $request): View {

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


    /**
     * Insere um novo paciente na base de dados
     *
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function insert(PatientRequest $request): RedirectResponse {

        try {

            $patient = new Patient();
    
            $this->save($request, $patient);
    
            return redirect('pacientes')->with('success', 'Paciente criado com sucesso!');

        } catch (\Exception $e) {
            return redirect('pacientes')->with('error', 'Erro ao criar paciente!');
        }
    }

    public function update(PatientRequest $request): RedirectResponse {

        try {

            $patient = Patient::findOrFail($request->id);

            $this->save($request, $patient);

            return redirect('pacientes')->with('success', 'Paciente atualizado com sucesso!');
            
        } catch (ModelNotFoundException $e) {

            return redirect('pacientes')->with('error', 'Paciente não encontrado!');

        } catch (\Exception $e) {

            return redirect('pacientes')->with('error', 'Erro ao atualizar paciente!');

        }
    }


    /**
     * Salva o paciente no banco de dados
     *
     * @param PatientRequest $request
     * @param Patient $patient
     * @return boolean
     */
    private function save(PatientRequest $request, Patient $patient): bool {

        try {

            $patient->name = $request->name;
            $patient->cpf = $request->cpf;

            $patient->save();
    
            return true;

        } catch (\Exception $e) {

            Log::error("[PatientController][Save] Erro ao salvar paciente: " . $e->getMessage());

            return false;
        }

    }
}
