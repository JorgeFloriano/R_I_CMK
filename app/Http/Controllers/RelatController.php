<?php

namespace App\Http\Controllers;

use App\Class\MyClass;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Pendencia;
use App\Models\Relatorio;
use App\Models\PendenciaRelatorio;
use App\Models\T_e_c_relatorio;
use App\Models\Tec_model;
use App\Models\User;
use Symfony\Component\VarDumper\VarDumper;

class RelatController extends Controller
{

    public $important_itens;

    public function __construct()
    {
        $this->important_itens = [2,9,10,12,21,22,23,24,25,27,28,29,36,54,55];
    }

    //---------------------------------------------------------------------------------
    private function process_report_data($relat, $equip, $r_t_e_c, $justs, $d_t_e_c, $model) {
        if (!isset($relat->stat_equip)) {
            $relat->stat_equip = 'NÃO APTO PARA OPERAR';
        }

        switch ($relat->stat_equip) {
            case 'NÃO APTO PARA OPERAR':
                $equip_stat = 'bad';
                break;
            case 'APTO PARA OPERAR':
                $equip_stat = 'good';
                break;
            default:
                $equip_stat = 'm_o_l';
        }

        if ($relat->stat_insp == '100% FINALIZADA') {
            $insp_stat = 'light-good';
        } else {
            $insp_stat = 'light-m_o_l';
        }

        if (isset($relat->d_tec1)) {
            $relat->d_tec1 = date('d/m/Y',strtotime($relat->d_tec1));
        }
        if (isset($relat->d_tec2)) {
            $relat->d_tec2 = date('d/m/Y',strtotime($relat->d_tec2));
        }
        if (isset($relat->h_i_tec1)) {
            $relat->h_i_tec1 = date('H:i',strtotime($relat->h_i_tec1));
        }
        if (isset($relat->h_f_tec1)) {
            $relat->h_f_tec1 = date('H:i',strtotime($relat->h_f_tec1));
        }
        if (isset($relat->h_i_tec2)) {
            $relat->h_i_tec2 = date('H:i',strtotime($relat->h_i_tec2));
        }
        if (isset($relat->h_f_tec2)) {
            $relat->h_f_tec2 = date('H:i',strtotime($relat->h_f_tec2));
        }

        $r_t_e_c = $r_t_e_c->toArray();

        $data = [
            'e' => $equip,
            'r' => $relat,
            'rt' => $r_t_e_c,
            'title' => 'R.I.',
            'js' => $justs,
            't' => $d_t_e_c,
            'back' => 'relatorios',
            'equip_stat' => $equip_stat,
            'insp_stat' => $insp_stat,
            'model' => $model[0] ?? null,
            'important_itens' => $this->important_itens
        ];

        return ($data);
    }
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

        // Technical
        $tecs = User::select('id', 'name', 'surname')->get();

        // get selected equip
        $equip = Equipamento::find($id);

        // Especifc data of eletric chain hoist
        $t_e_c = Equipamento::find($equip->id)->talEleCorr;

        // Especifc model of eletric chain hoist
        $model = Tec_model::where('descricao', $equip->modelo)->get();

        // Select the open report according to the equipment id
        $report = Relatorio::where('finalizado',0)->where('equipamento_id', $equip->id)->first();

        // PREVIOUS REPORT
        $prev_relat = Relatorio::where('finalizado',1)
            ->where('equipamento_id', $equip->id)
            ->orderBy('id', 'DESC')
            ->select('id', 'obs', 'ressalva')
            ->get();

        // Eletric chain hoist data
        $prev_r_t_e_c = Relatorio::find($prev_relat[0]->id ?? 0)->talEleCorr ?? 0;

        // Important items
        $num_imp = 0;
        $imp = [];

        if ($prev_r_t_e_c !== 0) {
            $array_prev_r_t_e_c = $prev_r_t_e_c->toArray();
        }   

        for ($i=1; $i < 67; $i++) { 
            if (in_array($i, $this->important_itens, $imp[$i] = false)) {
                $imp[$i] = True;
                if (isset($array_prev_r_t_e_c['item'.$i])) {
                    if ($array_prev_r_t_e_c['item'.$i] == "Trocar") {
                        $num_imp++;
                    }
                }
            }
        }

        if ($num_imp !== 0) {
            $hidden = '';
            $checked = 'checked';
        }

        // Preparing list of pendings
        $pends = Relatorio::find($prev_relat[0]->id ?? 0)->pendencias ?? null;
        if (isset($pends)) {
            $pends = Relatorio::find($prev_relat[0]->id ?? 0)->pendencias()->orderBy('num_item', 'asc')->get();    
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

        // return relatorio form eletric chain hoist report
        $data = [
            'report' => $report ?? null,
            'title' => 'R.I.',
            'equip' => $equip,
            'tecs' => $tecs,
            't_e_c' => $t_e_c,
            'prev_r_t_e_c' => $prev_r_t_e_c ?? null, // previous report
            'pends' => $pends ?? null,
            'prev_relat_id' => $prev_relat[0]->id ?? null,
            'prev_relat_obs' => $prev_relat[0]->obs ?? null,
            'prev_relat_ressalva' => $prev_relat[0]->ressalva ?? null,
            'imp' => $imp ?? null,
            'num_imp' => $num_imp ?? null,
            'n_apto_hidden' => $hidden ?? 'hidden',
            'n_apto_checked' => $checked ?? '',
            'model' => $model[0] ?? null
        ];
        return view('relatorio_form', $data);
    }

    //-------------------------------------------------------------------------------------
    public function relat_form_submit(Request $request) {

        // Equipment id
        $equip_id = $request->txtEquipId;

        // Select the open report according to the equipment id
        $relat = Relatorio::where('finalizado',0)->where('equipamento_id', $equip_id)->get();

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
            $relat->equipamento_id = $equip_id;
            $relat->finalizado = 0;
            $relat->save();

            $r_t_e_c = new T_e_c_relatorio();
            $r_t_e_c->relatorio_id = $relat->id;
            $r_t_e_c->save();

        } else {
            $relat = $relat[0];
        }

        // Previous report id
        $p_r_id = $request->txtPrevRelatId;

        //get selected equip
        $equip = Equipamento::find($equip_id);

        // Especifc model of eletric chain hoist
        $model = Tec_model::where('descricao', $equip->modelo)->get();

        $d_t_e_c = Equipamento::find($equip->id)->talEleCorr; // eletric chain hoist data (nominal and limit)

        $r_t_e_c = Relatorio::find($relat->id)->talEleCorr; // report data (child class)

        // Updated pending issues in the database
        for ($i=1; $i < 67; $i++) { 

            $just = $request->input('txtJust'.$i);
            $stat = $request->input('txt'.$i);

            if ($request->file('imagePend'.$i) !== null && $request->file('imagePend'.$i) !== '') {      
                $image = $request->file('imagePend'.$i)->store('pend_photos');
            }
                
            // If there is previous report id
            if (isset($p_r_id)) {

                // Previous item pending issues
                $pend = Relatorio::find($p_r_id)->pendencias()->where('num_item', $i)->get();

            }

            // Pivot table
            $pend_rel = new PendenciaRelatorio();

            // If there is previous pending issue
            if (isset($pend[0])) {

                // If there is justification
                if (isset($just) && $just != '') {

                    // If item status is Ok
                    if ($stat == 'Ok') {

                        $pend_soluc = new Pendencia();
                        $pend_soluc->created_r_i = $pend[0]->created_r_i;
                        $pend_soluc->num_item = $pend[0]->num_item;
                        $pend_soluc->descricao = $pend[0]->descricao;
                        $pend_soluc->solucao = $just;
                        $pend_soluc->soluc_img = $image ?? '';
                        $pend_soluc->save();

                        $pend_rel_exists = PendenciaRelatorio::where('pendencia_id', $pend_soluc->id)->where('relatorio_id', $relat->id)->get();
                        if (!isset($pend_rel_exists[0])) {
                            $pend_rel->pendencia_id = $pend_soluc->id;
                            $pend_rel->relatorio_id = $relat->id;
                            $pend_rel->save();
                        }
                        
                    // If item status is not ok
                    } else {

                        // If the justification is not changed
                        if ($pend[0]->descricao == $just) {

                            $pend_rel_exists = PendenciaRelatorio::where('pendencia_id', $pend[0]->id)->where('relatorio_id', $relat->id)->get();
                            if (!isset($pend_rel_exists[0])) {
                                $pend_rel->pendencia_id = $pend[0]->id;
                                $pend_rel->relatorio_id = $relat->id;
                                $pend_rel->save();
                            }

                        // If the justification was changed
                        } else {

                            $pend_exists = Pendencia::where('created_r_i', $relat->id)->where('num_item', $i)->get();
                            if (!isset($pend_exists[0])) {
                                $pend = new Pendencia();
                                $pend->created_r_i = $relat->id;
                                $pend->num_item = $i;
                                $pend->descricao = $just;
                                $pend->descr_img = $image ?? '';
                                $pend->save();
                            }

                            $pend_rel_exists = PendenciaRelatorio::where('pendencia_id', $pend->id)->where('relatorio_id', $relat->id)->get();
                            if (!isset($pend_rel_exists[0])) {
                                $pend_rel->pendencia_id = $pend->id;
                                $pend_rel->relatorio_id = $relat->id;
                                $pend_rel->save();
                            }
                        }
                    }
                }   

            // If there is not previous pending issue
            } else {

                if (isset($just) && $just != '' && $stat != 'Ok') {

                    $pend_exists = Pendencia::where('created_r_i', $relat->id)->where('num_item', $i)->get();
                    if (!isset($pend_exists[0])) {
                        $pend = new Pendencia();
                        $pend->created_r_i = $relat->id;
                        $pend->num_item = $i;
                        $pend->descricao = $just;
                        $pend->descr_img = $image ?? '';
                        $pend->save();
                    }

                    // If New pending issue was created
                    if(isset($pend->id)) {
                        $pend_rel->pendencia_id = $pend->id;
                        $pend_rel->relatorio_id = $relat->id;
                        $pend_rel->save();
                    }
                }
            }

            // if (isset($image)) {
            //     return redirect()->route('relat_form', [
            //         'id' => $equip->id
            //     ]);
            // }
            // $image = null;
        }    

        // Justification for pending issues
        $justs = Relatorio::find($relat->id)->pendencias()->orderBy('num_item')->get();

        // Saving the form data in the database
        for ($i=1; $i < 67; $i++) { 
            T_e_c_relatorio::where('relatorio_id', $relat->id)->update(['item'.$i => $request->input('txt'.$i)]);
        }

        if (isset($request->relatNumber)) {
            if ($request->relatNumber !== '') {
                $r_t_e_c->id = $request->relatNumber;
                $r_t_e_c->relatorio_id = $request->relatNumber;
            }
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
        $r_t_e_c->save();

        if (isset($request->relatNumber)) {
            if ($request->relatNumber !== '') {
                $relat->id = $request->relatNumber;
            }
        }

        $tec1 = User::select('name', 'surname', 'function')->find($request->txtTec1Id);
        $tec2 = User::select('name', 'surname', 'function')->find($request->txtTec2Id);

        $relat->stat_insp = $request->status;
        $relat->stat_equip = $request->apto;
        $relat->ressalva = $request->txtRessalvas;
        $relat->obs = $request->txtObservacoes;
        $relat->n_tec1 = $tec1->name.' '.$tec1->surname;
        $relat->f_tec1 = $tec1->function;
        $relat->d_tec1 = $request->txtTec1Data;
        $relat->h_i_tec1 = $request->txtTec1HI;
        $relat->h_f_tec1 = $request->txtTec1HF;
        $relat->sign_tec1 = $request->signTec1;
        $relat->n_tec2 = $tec2->name.' '.$tec2->surname;
        $relat->f_tec2 = $tec2->function;
        $relat->d_tec2 = $request->txtTec2Data;
        $relat->h_i_tec2 = $request->txtTec2HI;
        $relat->h_f_tec2 = $request->txtTec2HF;
        $relat->sign_tec2 = $request->signTec2;
        $relat->finalizado = 1;
        $relat->save();

        $r_t_e_c = Relatorio::find($relat->id)->talEleCorr; // report data updated (child class)

        $data = $this->process_report_data($relat, $equip, $r_t_e_c, $justs, $d_t_e_c, $model);

        return view('relatorio', $data);
    }

    //-----------------------------------------------------------------------------------
    public function relat_show($id) {

        $equip = Relatorio::find($id)->equipamento; // equipment data (header)

        // Especifc model of eletric chain hoist
        $model = Tec_model::where('descricao', $equip->modelo)->get();

        $relat = Relatorio::where('finalizado', 1)->find($id); // report data (parent class)

        $d_t_e_c = Equipamento::find($equip->id)->talEleCorr; // eletric chain hoist data (nominal and limit)

        $justs = Relatorio::find($id)->pendencias()->orderBy('num_item')->get(); // Justification for pending issues

        $r_t_e_c = Relatorio::find($id)->talEleCorr; // report data updated (child class)

        $data = $this->process_report_data($relat, $equip, $r_t_e_c, $justs, $d_t_e_c, $model);
        return view('relatorio', $data);
    }
}
