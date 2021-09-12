<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelPostRequest;
use App\Http\Requests\ImovelPutRequest;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    private $imoveis;

    public function __construct(Imovel $imoveis){

        $this->imoveis = $imoveis;
    }

    public function index(Request $request)
    {
        $imoveis = $this->imoveis;

        if($request->codigo !== null){
            $imoveis = $imoveis->where('codigo', $request->codigo);
        }

        if($request->tipo !== null){
            $imoveis = $imoveis->where('tipo', $request->tipo);
        }

        if($request->pretensao !== null){
            $imoveis = $imoveis->where('pretensao', $request->pretensao);
        }

        if($request->titulo !== null){
            $imoveis = $imoveis->where('titulo', $request->titulo);
        }

        if($request->detalhes !== null){
            $imoveis = $imoveis->where('detalhes', $request->detalhes);
        }

        if($request->quartos !== null){
            $imoveis = $imoveis->where('quartos', $request->quartos);
        }

        if($request->valor !== null){
            $imoveis = $imoveis->where('valor', $request->valor);
        }

        if($request->max !== null && $request->min){
            $imoveis = $imoveis->whereBetween('valor',[$request->min, $request->max]);
        }

        $data = $imoveis->get();

        return response()->json([
            'data' => $data,
            'message' => 'Feito',
        ],200);
    }

    public function store(ImovelPostRequest $request)
    {
        $imovel = $this->imoveis->create($request->all());

        return response()->json([
            'data' => $imovel
        ],200);
    }

    public function update(ImovelPutRequest $request, $id)
    {
        $imovel = $this->imoveis->find($id);

        if(!is_null($imovel)) {

            $imovel->fill($request->all())->save();

            return response()->json([
                'data' => $imovel,
            ], 200);
        }else{
            return response()->json([
                "message"=> "imovel não encontrado"
            ],404);
        }
    }

    public function destroy(Request $request, $id)
    {
        $imovel = $this->imoveis->findOrFail($id);

        if($imovel){

            $imovel->delete();

            return response()->json([
                'message' => 'Imovel deletado',
            ],200);
        }else{
            return response()->json([
                "message"=> "Imovel não encontrado"
            ],404);
        }
    }
}
