<?php

namespace App\Http\Controllers;

use App\Models\Tec_model;
use Illuminate\Http\Request;

class TecModelController extends Controller
{
    public readonly Tec_model $tecm;

    public function __construct()
    {
        $this->tecm = new Tec_model();
    }

    public function index()
    {
        $tecms = $this->tecm->orderBy('descricao')->get();

        if (!isset(auth()->user()->type)) {
            return view('tec_table', ['tecms' => $tecms]);
        }
        if (auth()->user()->type == 1) {
            return view('tec_model_list', ['tecms' => $tecms]);
        }
        return view('tec_model_user_list', ['tecms' => $tecms]);
    }

    public function create()
    {
        return view('tec_create');
    }

    public function store(Request $request)
    {
        $descrs = $this->tecm->get(['descricao']);
        foreach ($descrs as $key => $descr) {
            if ($descr->descricao == $request->input('descricao')) {
                $exist = true;
            }
        }
        
        if (isset($exist)) {
            return redirect()->route('tec_models.create')
            ->with(
                'message', 'Não é possível cadastrar mais de um equipamento com a mesma descrição de modelo!'
            );
        }

        $created = $this->tecm->create([
            'descricao' => $request->input('descricao'),
            'fabricante' => $request->input('fabricante'),
            'capacidade' => $request->input('capacidade'),
            'nom_elos' => $request->input('nom_elos'),
            'max_elos' => $request->input('max_elos'),
            'nom_elo' => $request->input('nom_elo'),
            'min_elo' => $request->input('min_elo'),
            'nom_w1' => $request->input('nom_w1'),
            'max_w1' => $request->input('max_w1'),
            'nom_y' => $request->input('nom_y'),
            'min_y' => $request->input('min_y'),
            'v_com' => $request->input('v_com'),
            'corr_alta' => $request->input('corr_alta'),
            'corr_baixa' => $request->input('corr_baixa'),
            'v_freio' => $request->input('v_freio'),
        ]);
        if ($created) {
            return redirect()->route('tec_models.index')->with('message', 'Cadastro realizado com sucesso.');
        }
        return redirect()->route('tec_models.index')->with('message', 'Erro no cadastro.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tec_model $tec_model)
    {
        return view('tec_show_delete', ['tec_model' => $tec_model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tec_model $tec_model)
    {
        if (auth()->user()->type == 1) {
            $disabled = '';
        } else {
            $disabled = 'disabled';
        }

        return view('tec_edit', [
            'tec_model' => $tec_model,
            'disabled' => $disabled
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->tecm->where('id', $id)->update($request->except(['_token', '_method', 'v_rede', 'banc_res']));

        if ($updated) {
            return redirect()->back()->with('message', 'Cadastro atualizado com sucesso.');
        }
        return redirect()->back()->with('message', 'Erro no cadastro.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->tecm->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('tec_models.index')->with('message', 'Cadastro deletado com sucesso.');
        }
        return redirect()->route('tec_models.index')->with('message', 'Erro ao deletar cadastro.');

    }
}
