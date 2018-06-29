<?php

namespace App\Http\Controllers\Api;

use App\Despesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return Despesa::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $despesa = Despesa::create([
            'nota_fiscal' => $request->nota_fiscal,
            'valor'       => $request->valor,
            'descricao'   => $request->descricao,
            'observacao'  => $request->observacao,
        ]);

        session()->flash('success', 'Despesa adicionada com sucesso!');

        return $despesa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $despesa = Despesa::find($id);

        $despesa->nota_fiscal = $request->nota_fiscal;
        $despesa->valor = $request->valor;
        $despesa->descricao = $request->descricao;
        $despesa->observacao = $request->observacao;
        $despesa->save();

        return $despesa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Despesa::find($id);

        return $despesa->delete();
    }
}
