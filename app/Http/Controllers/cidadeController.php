<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class cidadeController extends Controller
{
    public function buscarCidades($query)
    {
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        try {
            $response = file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/municipios');
            $data = json_decode($response, true);
            $localidades = array_map(function ($localidade) {
                return $localidade['nome'];
            }, $data);

            $resultados = array_filter($localidades, function ($localidade) use ($query) {
                return stripos($localidade, $query) !== false;
            });

            return response()->json(array_values($resultados));
        } catch (Exception $error) {
            return response()->json(['error' => 'Erro ao buscar localidades: ' . $error->getMessage()], 500);
        }
    }
}
