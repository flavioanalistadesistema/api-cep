<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CepService
{
    public function consultarCep($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->failed()) {
            return ['error' => 'CEP não encontrado', 'status' => 404];
        }

        return $response->json();
    }
}
