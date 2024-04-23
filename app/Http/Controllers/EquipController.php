<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipController extends Controller
{
    //----------------------------------------------------------
    public function equip() {
        //get equipments
        $equips = Equipamento::where('ativo', 1)
                    ->orderBy('id')
                    ->get();

        //$equips = Equipamento::orderBy('created_at', 'desc')->get();

        return view('equipList', ['equips' => $equips, 
                                'msg' => 'Desativados',
                                'route' => 'desat_list',
                                'cond' => 'Des.',
                                'title' => 'Equipamentos Cadastrados']);
    }

    //----------------------------------------------------------
    public function desat_list() {
        //get disabled equipments
        $equips = Equipamento::where('ativo', 0)
                    ->orderBy('id')
                    ->get();

        //$equips = Equipamento::orderBy('created_at', 'desc')->get();

        return view('equipList', ['equips' => $equips, 
                                'msg' => 'Voltar',
                                'route' => 'equip',
                                'cond' => 'Ativ.',
                                'title' => 'Equipamentos Desativados']);
    }

    //----------------------------------------------------------
    public function new_equip() {
        //display new equipment from
        return view('new_equip_form');
    }

    //----------------------------------------------------------
    public function new_equip_submit(Request $request) {

        //echo '<pre>';
        //print_r($request->input());
        // print_r($request->all());
        // die();

        // get the new equipment definition
        $tipo = $request->input('txtTip');
        $id = $request->input('txtNum');
        $mod = $request->input('txtMod');
        $cap = $request->input('txtCap');
        $fab = $request->input('txtFab');
        $ser = $request->input('txtSer');
        $cli = $request->input('txtCli');
        $pre = $request->input('txtPre');
        $are = $request->input('txtAre');
        $set = $request->input('txtSet');

        // save equipment in to the database
        $equip = new Equipamento();
        $equip->tipo = $tipo;
        $equip->id = $id;
        $equip->modelo = $mod;
        $equip->fabricante = $fab;
        $equip->capacidade = $cap;
        $equip->n_serie = $ser;
        $equip->n_cliente = $cli;
        $equip->predio = $pre;
        $equip->area = $are;
        $equip->setor = $set;
        $equip->save();
        
        // return to the equipment list page
        return redirect()->route('equip');
    }

    //---------------------------------------------------------
    public function edit_equip($id) {
       
        //get selected equip
        $equip = Equipamento::find($id);

        //display edit equipment from
        return view('edit_equip_form', ['equip' => $equip]);

    }

    //---------------------------------------------------------
    public function edit_equip_submit(Request $request) {
        
        // get the new equipment definition
        $tipo = $request->input('txtTip');
        $id = $request->input('txtNum');
        $mod = $request->input('txtMod');
        $cap = $request->input('txtCap');
        $fab = $request->input('txtFab');
        $ser = $request->input('txtSer');
        $cli = $request->input('txtCli');
        $pre = $request->input('txtPre');
        $are = $request->input('txtAre');
        $set = $request->input('txtSet');

        // update equipment in to the database
        $equip = Equipamento::find($id);
        $equip->tipo = $tipo;
        $equip->id = $id;
        $equip->modelo = $mod;
        $equip->fabricante = $fab;
        $equip->capacidade = $cap;
        $equip->n_serie = $ser;
        $equip->n_cliente = $cli;
        $equip->predio = $pre;
        $equip->area = $are;
        $equip->setor = $set;
        $equip->save();
        
        // return to the equipment list page
        return redirect()->route('equip');
    }

    //---------------------------------------------------------
    public function desat_equip($id) {
        $equip = Equipamento::find($id);
        $equip->ativo = 0;
        $equip->save();

        // return to the equipment list page
        return redirect()->route('equip');
    }

    //---------------------------------------------------------
    public function ativ_equip($id) {
        $equip = Equipamento::find($id);
        $equip->ativo = 1;
        $equip->save();

        // return to the equipment list page
        return redirect()->route('equip');
    }
}
