<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 *
 * Controller de Remédios
 * @author Iure Santiago <iuresantiago16@email.com>
 * @since 08/11/23
 * @version
 *
 */
class MedicineController extends Controller
{
    /**
     * Lista todos os remédios do banco de dados
     *
     * @param Request $request
     *
     * @return View
     *
     */
    public function index(Request $request): View
    {

        $medications = Medicine::orderBy('id')->paginate(10);

        $data = [
            'medications' => $medications,
        ];

        return view('medicine.index', $data);
    }

    /**
     * Mostra o form para inserção de um novo remédio no databse
     *
     * @return View
     */
    public function create(): View
    {

        $medicine = new Medicine();

        $data = [
            'medicine' => $medicine,
        ];

        return view('medicine.form', $data);
    }


    /**
     * Insere um novo remédio no database
     *
     * @param MedicineRequest $request
     */
    public function insert(MedicineRequest $request)
    {
        try {

            //Tenta buscar um id de Medicine
            $medicine = Medicine::findOrFail($request->id);

            $this->save($request, $medicine);

            return redirect('remedios')->with('success', 'Remédio atualizado com sucesso!');

        //Se não encontrar um id de medicine, identifica o erro
        } catch (\Exception $e) {

            return redirect('remedios')->with('error', 'Remédio não encontrado!');

        }

    }

    public function update(MedicineRequest $request): RedirectResponse
    {

        try {

            $medicine = Medicine::findOrFail($request->id);

            $this->save($request, $medicine);

            return redirect('remedios')->with('success', 'Remédio atualizado com sucesso!');

        } catch (ModelNotFoundException $e) {

            return redirect('remedios')->with('error', 'Remédio não encontrado!');

        } catch (\Exception $e) {

            return redirect('remedios')->with('error', 'Erro ao atualizar remédio!');

        }

    }

    private function save(MedicineRequest $request, Medicine $medicine): bool {

        try {

            $medicine->name = $request->name;
            $medicine->type = $request->type;

            $medicine->save();

            return true;

        } catch (\Exception $e) {

            Log::error("[MedicineController][Save] Erro ao salvar remédio: " . $e->getMessage());

            return false;
        }

    }

}
