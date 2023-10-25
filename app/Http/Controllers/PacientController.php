<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientRequest;
use App\Models\Pacient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PacientController extends Controller
{

    /**
     * Retorna a view de listagem de pacientes.
     *
     * @param PacientRequest $request
     * @return View
     */
    public function index(PacientRequest $request): View {
        
        $pacient = Pacient::searchWeb($request)->paginate(10);

        $data = [

        ];

        return view('pacient.index', $data);
    }

}
