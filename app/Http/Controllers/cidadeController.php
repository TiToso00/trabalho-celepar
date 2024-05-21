<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class cidadeController extends Controller
{


    public function buscarCidades($query)
    {
        if (strlen($query) < 2) {
            return [];
        }

        try {
            $response = file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/municipios');
            $data = json_decode($response, true);
            $localidades = array_map(function ($localidade) {
                return $localidade['nome'];
            }, $data);

            return array_filter($localidades, function ($localidade) use ($query) {
                return stripos($localidade, $query) !== false;
            });
        } catch (Exception $error) {
            echo 'Erro ao buscar localidades: ' . $error->getMessage();
            return [];
        }
    }
}


