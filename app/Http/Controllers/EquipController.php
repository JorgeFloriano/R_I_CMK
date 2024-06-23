<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\T_e_c_dado;
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
                                'title' => 'Ativos']);
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
                                'title' => 'Desativados']);
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
        // save equipment in to the database
        $equip = new Equipamento();
        $equip->id = $request->input('txtId');
        $equip->tipo = $request->input('txtTip');
        $equip->modelo = $request->input('txtMod');
        $equip->fabricante = $request->input('txtFab');
        $equip->capacidade = $request->input('txtCap');
        $equip->n_serie = $request->input('txtSer');
        $equip->n_cliente = $request->input('txtCli');
        $equip->predio = $request->input('txtPre');
        $equip->area = $request->input('txtAre');
        $equip->setor = $request->input('txtSet');
        $equip->save();
        
        // Especific data of eletric chain hoist
        $t_e_c = new T_e_c_dado();

        $t_e_c->id = $request->input('txtId');
        $t_e_c->equipamento_id = $request->input('txtId');
        $t_e_c->v_rede = $request->input('txtAlim');
        $t_e_c->v_com = $request->input('txtCom');
        $t_e_c->banc_res = $request->input('txtRes');
        $t_e_c->corr_dir_alta = $request->input('txtDirAlta');
        $t_e_c->corr_dir_baixa = $request->input('txtDirBaixa');
        $t_e_c->v_dir_freio = $request->input('txtTenFreDir');
        $t_e_c->corr_el_alta = $request->input('txtElevAlta');
        $t_e_c->corr_el_baixa = $request->input('txtElevBaixa');
        $t_e_c->v_el_freio = $request->input('txtTenFreElev');
        $t_e_c->nom_elos = $request->input('txtNomElos');
        $t_e_c->max_elos = $request->input('txtMaxElos');
        $t_e_c->nom_elo = $request->input('txtNomElo');
        $t_e_c->min_elo = $request->input('txtMinElo');
        $t_e_c->nom_w1 = $request->input('txtNomW1');
        $t_e_c->max_w1 = $request->input('txtMaxW1');
        $t_e_c->nom_y = $request->input('txtNomY');
        $t_e_c->min_y = $request->input('txtMinY');
        $t_e_c->save();
        
        // return to the equipment list page
        return redirect()->route('equip');
    }

    //---------------------------------------------------------
    public function edit_equip($id) {
       
        //get selected equip
        $equip = Equipamento::find($id);
        $t_e_c = Equipamento::find($equip->id)->talEleCorr;

        //display edit equipment from
        return view('edit_equip_form', [
            'equip' => $equip,
            't_e_c' => $t_e_c]);

    }

    //---------------------------------------------------------
    public function edit_equip_submit(Request $request) {
        
        // get the new equipment definition
        // update equipment in to the database
        $equip = Equipamento::find($request->input('txtNum'));
        $equip->id = $request->input('txtId');
        $equip->tipo = $request->input('txtTip');
        $equip->id = $request->input('txtNum');
        $equip->modelo = $request->input('txtMod');
        $equip->fabricante = $request->input('txtFab');
        $equip->capacidade = $request->input('txtCap');
        $equip->n_serie = $request->input('txtSer');
        $equip->n_cliente = $request->input('txtCli');
        $equip->predio = $request->input('txtPre');
        $equip->area = $request->input('txtAre');
        $equip->setor = $request->input('txtSet');
        $equip->save();
        
        // Especifc data of eletric chain hoist
        $t_e_c = Equipamento::find($equip->id)->talEleCorr;

        $t_e_c->v_rede = $request->input('txtAlim');
        $t_e_c->v_com = $request->input('txtCom');
        $t_e_c->banc_res = $request->input('txtRes');
        $t_e_c->corr_dir_alta = $request->input('txtDirAlta');
        $t_e_c->corr_dir_baixa = $request->input('txtDirBaixa');
        $t_e_c->v_dir_freio = $request->input('txtTenFreDir');
        $t_e_c->corr_el_alta = $request->input('txtElevAlta');
        $t_e_c->corr_el_baixa = $request->input('txtElevBaixa');
        $t_e_c->v_el_freio = $request->input('txtTenFreElev');
        $t_e_c->nom_elos = $request->input('txtNomElos');
        $t_e_c->max_elos = $request->input('txtMaxElos');
        $t_e_c->nom_elo = $request->input('txtNomElo');
        $t_e_c->min_elo = $request->input('txtMinElo');
        $t_e_c->nom_w1 = $request->input('txtNomW1');
        $t_e_c->max_w1 = $request->input('txtMaxW1');
        $t_e_c->nom_y = $request->input('txtNomY');
        $t_e_c->min_y = $request->input('txtMinY');
        $t_e_c->save();
        
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
