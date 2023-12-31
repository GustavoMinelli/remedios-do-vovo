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

    /**
     * Cria um novo paciente e retorna para o form de criação
     *
     * @return View
     */
    public function create(): View {

        $patient = new Patient();

        $data = [
            'patient' => $patient,
        ];

        return view('patient.create-edit', $data);
    }

    public function edit(Patient $patient): View {

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

            Log::error('[PatientController][Insert] Erro ao criar paciente: ' . $e->getMessage());

            return redirect('pacientes')->with('error', 'Erro ao criar paciente!');
        }
    }

    /**
     * Atualiza um paciente ja existente
     *
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient): RedirectResponse {

        try {

            $this->save($request, $patient);

            return redirect('pacientes')->with('success', 'Paciente atualizado com sucesso!');
        } catch (\Exception $e) {

            Log::error('[PatientController][Update] Erro ao atualizar paciente: ' . $e->getMessage());

            return redirect('pacientes')->with('error', 'Erro ao atualizar paciente!');
        }
    }

    /**
     * Deleta um paciente
     *
     * @param PatientRequest $request
     * @param Patient $patient
     * @return void
     */
    public function delete(Patient $patient): RedirectResponse {

        try {

            $patient->delete();

            return redirect('pacientes')->with('success', 'Paciente deletado com sucesso!');

        } catch (\Exception $e) {

            Log::error('[PatientController][Delete] Erro ao deletar paciente: ' . $e->getMessage());

            return redirect('pacientes')->with('error', 'Erro ao deletar paciente!');
        }
    }

    /**
     * Salva o paciente no banco de dados
     *
     * @param PatientRequest $request
     * @param Patient $patient
     * @return void
     */
    private function save(PatientRequest $request, Patient $patient): void {
        $patient->name = $request->name;
        $patient->surname = $request->surname;
        $patient->cpf = $request->cpf;
        $patient->email = $request->email;
        $patient->birth_date = $request->birth_date;
        $patient->phone = $request->phone;

        $patient->save();
    }
}
