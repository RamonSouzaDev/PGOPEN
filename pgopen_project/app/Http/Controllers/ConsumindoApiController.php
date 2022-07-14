<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use Illuminate\Support\Facades\Http;

class ConsumindoApiController extends Controller
{
    public function consumirApi($codremessa)
    {

        $url = "http://app-pgopen.com.br/tracken/api/pedido/historico?codremessa=".$codremessa;

        $response = Http::withBasicAuth('ramon', 'testedev')->get($url);

        $this->createMaster($response->json());
    }

    public function createMaster($dados) {

        foreach($dados[0]['historicos'] as $encomenda) {
            $encomenda['codigo_remessa'] = $dados[0]['codremessa'];
            $this->createEncomenda($encomenda);
        }
    
        return response()->json([
            "message" => "Master criada com sucesso !"
        ], 200);
    }

    public function createEncomenda($dados){       
        $encomenda = new Encomenda();
        $verificaEncomenda = Encomenda::where('codhistorico', $dados['codhistorico'])->first();
        
        if ($verificaEncomenda != true) {
        $encomenda->codremessa = $dados['codigo_remessa'];
        $encomenda->codhistorico = $dados['codhistorico'];
        $encomenda->codstatus = $dados['codstatus'];
        $encomenda->dtstatus = $dados['dtstatus'];
        $encomenda->hrstatus = $dados['hrstatus'];
        $encomenda->status = $dados['status'];
        $encomenda->observacao = $dados['observacao'];
        $encomenda->save();
        }
    }
}
