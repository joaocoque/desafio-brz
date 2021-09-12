<?php

namespace App\Http\Controllers;

use App\Http\Requests\InteressadoPostRequest;
use App\Http\Requests\InteressadoPutRequest;
use App\Models\Imovel;
use App\Models\Interessado;
use Illuminate\Http\Request;


class InteressadoController extends Controller
{
    private $interessado;
    private $imoveis;

    public function __construct(Interessado $interessado, Imovel $imoveis)
    {
        $this->interessado = $interessado;
        $this->imoveis = $imoveis;

    }

    public function index(Request $request)
    {
        $interessado = $this->interessado;

        if($request->nome !== null){
            $interessado = $interessado->where('nome', $request->nome);
        }

        if($request->email !== null){
            $interessado = $interessado->where('email', $request->email);
        }

        if($request->imovel_id !== null){
            $imovel_id = $request->imovel_id;
            $interessado = $interessado->whereHas('interesses', function ($q) use ($imovel_id){
                $q->where('imovel_id', $imovel_id);
            });
        }

        $data = $interessado->with('interesses')->get();

        return response()->json([
            'data' => $data,
            'message' => 'Feito',
        ],200);

    }

    public function store(InteressadoPostRequest $request)
    {
        if(!is_null($this->imoveis->find($request->imovel_id))){

            $interessado = $this->interessado->create($request->except('imovel_id'));

            $interessado->interesses()->attach($request->imovel_id);

            return response()->json([
                'data' => $interessado
            ], 200);
        }

        return response()->json([
            'message' => 'imóvel não encontrado',
        ], 200);

    }

    public function update(InteressadoPutRequest $request, $id)
    {
        $interessado = $this->interessado->find($id);

        if(!is_null($interessado)) {

            if (!is_null($request->imovel_id)) {
                $interessado->interesses()->sync($request->imovel_id);
            }

            $interessado->fill($request->all())->save();

            return response()->json([
                'data' => $interessado,
            ], 200);
        }else{
            return response()->json([
                "message"=> "interessado não encontrado"
            ],404);
        }
    }

    public function destroy(Request $request,$id)
    {
        $interessado = $this->interessado->findOrFail($id);

        if($interessado){

            $interessado->delete();

            return response()->json([
                'message' => 'Interessado deletado',
            ],200);
        }else{
            return response()->json([
                "message"=> "Interessado não encontrado"
            ],404);
        }
    }
}
