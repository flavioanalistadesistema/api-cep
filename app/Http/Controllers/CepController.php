<?php

namespace App\Http\Controllers;

use App\Services\CepService;
use Illuminate\Http\Request;

class CepController extends Controller
{
    protected $cepService;

    public function __construct(CepService $cepService)
    {
        $this->cepService = $cepService;
    }

    public function consultar($cep)
    {
        $result = $this->cepService->consultarCep($cep);

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], $result['status']);
        }

        return response()->json($result);
    }
}
