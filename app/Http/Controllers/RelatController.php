<?php

namespace App\Http\Controllers;

use App\Class\MyClass;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Pendencia;
use App\Models\Relatorio;
use App\Models\PendenciaRelatorio;
use App\Models\T_e_c_relatorio;
use Symfony\Component\VarDumper\VarDumper;

class RelatController extends Controller
{

    //---------------------------------------------------------------------------------
    public function teste() {

        //return view('test');

        $num =2; // id do relatorio

        $equip = Relatorio::find($num)->equipamento; // equipment data (header)

        $relat = Relatorio::find($num); // report data (parent class)

        $talEleCorr = Relatorio::find($num)->talEleCorr; // report data (child class)

        $dadosEqup = Equipamento::find($equip->id)->talEleCorr; // eletric chain hoist data (nominal and limit)


         // Pending issues from report
        $n = 4;
        $pends = Relatorio::find($n)->pendencias()->orderBy('num_item', 'asc')->get();

        echo '<h2>Pendências do relatorio nº '.$n.'</h2>';
        
        if (isset($pends)) {
            $pend_list = [];
            foreach ($pends as $pend) {
                if (!isset($pend->solucao)) {
                    $pend_list += [$pend->num_item => $pend];
                }
            };
        }
        echo '<pre>';
        print_r($pend_list);

        die;




        $rel = Pendencia::find(10)->relatorios; // Justification for pending issues

        //dd($pends);

        echo '<h2>DADOS DO RELATÓRIO NÚMERO '.$num.'</h2>';
        echo "Mês da programação (falta formatar a data para mês): ".$relat->mes.'<br>'.
        'Número do relatorio: '.$relat->id.'<br>'.
        'Número do equipamento: '.$equip->id.'<br>'.
        'Modelo do equipamento: '.$equip->modelo.'<br>'.
        'Capacidade: '.$equip->capacidade.'<br>'.
        'Fabricante: '.$equip->fabricante.'<br>'.
        '<h3>Medição de 11 elos</h3>
        Nominal: '.$dadosEqup->nom_elos.' / Máximo: '.$dadosEqup->max_elos.' / Medido: '.$talEleCorr->med_elos.'<br>'.
        '<h3>Medição W1</h3>
        Nominal: '.$dadosEqup->nom_w1.' / Máximo: '.$dadosEqup->max_w1.' / Medido: '.$talEleCorr->med_w1.'<br>'.
        '<h3>Medição Y</h3>
        Nominal: '.$dadosEqup->nom_y.' / Máximo: '.$dadosEqup->min_y.' / Medido: '.$talEleCorr->med_y.'<br>'
        ;

        //echo '<h3>Pendência do ítem 29 (trava de gancho)</h3>'. $justs->descricao;

        //-------------------------------------------------------
        $num = 1;
        $relats = Equipamento::find($num)->relatorios; // todos os relatorios do equipamento 1

        echo '<h2>RELATÓRIOS DO EQUIPAMENTO Nº CMK '.$num.'</h2>';

        foreach ($relats as $relat) {
            echo 'Relatório Nº: '.$relat->id.'<br>
            mês: '. $relat->mes.'<br><br>';
        };
    }

    //------------------------------------------------------------------------------------
    public function relat_form($id) {

        //get selected equip
        $equip = Equipamento::find($id);

        // Especifc data of eletric chain hoist
        $t_e_c = Equipamento::find($equip->id)->talEleCorr;

        // Select the open report according to the equipment id
        $relat = Relatorio::where('finalizado',0)->where('equipamento_id', $equip->id)->get();

        if (isset($relat[0])) {
            $r_t_e_c = T_e_c_relatorio::where('relatorio_id', $relat[0]->id)->get();

            if (isset($r_t_e_c[0])) {
                if (count($r_t_e_c) !== 1 || count($relat) !== count($r_t_e_c)) {
                    if (isset($relat[0])) {
                        $relat[0]->delete();
                    }
                    if (isset($r_t_e_c[0])) {
                        $r_t_e_c[0]->delete();
                    }
                }
            } else {
                $relat[0]->delete();
            }
        }

        // If not, create a new report
        if (!isset($relat[0]) || $relat[0] == null) {
            $relat = new Relatorio();
            $relat->equipamento_id = $equip->id;
            $relat->finalizado = 0;
            $relat->save();

            $r_t_e_c = new T_e_c_relatorio();
            $r_t_e_c->relatorio_id = $relat->id;
            $r_t_e_c->save();

        } else {
            $relat = $relat[0];
        }

        // PREVIOUS REPORT
        $prev_relat = Relatorio::where('finalizado',1)
            ->where('equipamento_id', $equip->id)
            ->orderBy('id', 'DESC')
            ->first('id');

        // Eletric chain hoist data
        $prev_r_t_e_c = Relatorio::find($prev_relat->id ?? 0)->talEleCorr ?? 0;

        // Preparing list of pendings
        $pends = Relatorio::find($prev_relat->id ?? 0)->pendencias ?? null;
        if (isset($pends)) {
            $pends = Relatorio::find($prev_relat->id ?? 0)->pendencias()->orderBy('num_item', 'asc')->get();    
        }
        
        if (isset($pends)) {
            $pend_list = [];
            foreach ($pends as $pend) {
                if (!isset($pend->solucao)) {
                    $pend_list += [$pend->num_item => $pend];
                }
            }
            $pends = $pend_list;
        }

        //dd($pends);

        // return relatorio form eletric chain hoist report
        $data = [
            'title' => 'Relatório de inspeção',
            'equip' => $equip,
            'relat' => $relat,
            't_e_c' => $t_e_c,
            'prev_r_t_e_c' => $prev_r_t_e_c ?? null, // previous report
            'pends' => $pends ?? null,
            'prev_relat_id' => $prev_relat->id ?? null
        ];
        return view('relatorio_form', $data);
    }

    //-------------------------------------------------------------------------------------
    public function relat_form_submit(Request $request) {

        $r_id = $request->txtRelatId;

        $p_r_id = $request->txtPrevRelatId;

        $equip = Relatorio::find($r_id)->equipamento; // equipment data (header)

        $relat = Relatorio::where('finalizado', 0)->find($r_id); // report data (parent class)

        $d_t_e_c = Equipamento::find($equip->id)->talEleCorr; // eletric chain hoist data (nominal and limit)

        $r_t_e_c = Relatorio::find($r_id)->talEleCorr; // report data (child class)

        // Updated pending issues in the database
        for ($i=1; $i < 67; $i++) { 

            $just = $request->input('txtJust'.$i);
            $stat = $request->input('txt'.$i);

            // Pending according according to item number
            $pend = Relatorio::find($p_r_id)->pendencias()->where('num_item', $i)->get();

            $pend_rel = new PendenciaRelatorio();


            if ((isset($just) || $just != '') && $stat == 'Ok') {

                $pend[0]->solucao = $just;
                $pend[0]->save();

                $pend_rel->pendencia_id = $pend[0]->id;
                $pend_rel->relatorio_id = $r_id;
                $pend_rel->save();



                //dd($pend[0]->solucao);
                
                // $j = new Pendencia();
                // $j->relatorio_id = $r_id;
                // $j->num_item = $i;
                // $j->descricao = $just;
                // $j->save();
            }
        }

        $justs = Relatorio::find($r_id)->pendencias()->orderBy('num_item')->get(); // Justification for pending issues

        // Saving the form data in the database
        for ($i=1; $i < 67; $i++) { 
            T_e_c_relatorio::where('relatorio_id', $relat->id)->update(['item'.$i => $request->input('txt'.$i)]);
        }

        $r_t_e_c->v_rede = $request->txt67;
        $r_t_e_c->v_com = $request->txt68;
        $r_t_e_c->banc_res = $request->txt69;
        $r_t_e_c->corr_dir_alta = $request->txt70;
        $r_t_e_c->corr_dir_baixa = $request->txt70_2;
        $r_t_e_c->v_dir_freio = $request->txt70_3;
        $r_t_e_c->corr_el_alta = $request->txt71;
        $r_t_e_c->corr_el_baixa = $request->txt71_2;
        $r_t_e_c->v_el_freio = $request->txt71_3;
        $r_t_e_c->stat_insp = $request->status;
        $r_t_e_c->stat_equip = $request->apto;
        $r_t_e_c->ressalva = $request->txtRessalvas;
        $r_t_e_c->obs = $request->txtObservacoes;
        $r_t_e_c->n_tec1 = $request->txtTec1Name;
        $r_t_e_c->f_tec1 = $request->txtTec1Func;
        $r_t_e_c->d_tec1 = $request->txtTec1Data;
        $r_t_e_c->h_i_tec1 = $request->txtTec1HI;
        $r_t_e_c->h_f_tec1 = $request->txtTec1HF;
        $r_t_e_c->sign_tec1 = $request->signTec1;
        $r_t_e_c->n_tec2 = $request->txtTec2Name;
        $r_t_e_c->f_tec2 = $request->txtTec2Func;
        $r_t_e_c->d_tec2 = $request->txtTec2Data;
        $r_t_e_c->h_i_tec2 = $request->txtTec2HI;
        $r_t_e_c->h_f_tec2 = $request->txtTec2HF;
        $r_t_e_c->sign_tec2 = $request->signTec2;
        $r_t_e_c->save();
        
        //$c = new MyClass();

        $r_t_e_c = Relatorio::find($relat->id)->talEleCorr; // report data updated (child class)

        $r_t_e_c = $r_t_e_c->toArray();

        $data = [
            'e' => $equip,
            'r' => $r_t_e_c,
            'title' => 'R.I.',
            'js' => $justs,
            't' => $d_t_e_c
        ];

        return view('relatorio', $data);

    }
}

        // $pends = Equipamento::find($equip->id)->pends;

        // dd($pends);

        // echo '<h2>RELATÓRIOS DO EQUIPAMENTO Nº CMK '.$equip->id.'</h2>';

        // $id_r_list = [];
        // foreach ($pends as $relat) {
        //     echo 'Relatório Nº: '.$relat->id.'<br>
        //     finalizado: '. $relat->finalizado.'<br><br>';
        //     if ($relat->finalizado == 1) {
        //         array_push($id_r_list, $relat->id);
        //     }
        // };

        // $pend_list = [];
        // foreach ($id_r_list as $id_r) {
        //     $pend = Relatorio::find($id_r)->justifs;
        //     if (isset($pend)) {
        //         $pend_list[$id_r] = $pend;
        //     }
        // }
        // dd($pend_list);

        // // Pendings
        // $justs = Relatorio::find($prev_relat->id ?? 0)->justifs ?? null;

        // if (isset($justs)) {
        //     $j = [];
        //     foreach ($justs as $just) {
        //         $j += 
        //             [$just->num_item => $just->descricao]
        //         ;
        //     };
        // }