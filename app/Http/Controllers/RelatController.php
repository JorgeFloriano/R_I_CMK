<?php

namespace App\Http\Controllers;

use App\Class\MyClass;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Justificativa;
use App\Models\Relatorio;
use App\Models\T_e_c_relatorio;

class RelatController extends Controller
{

    //---------------------------------------------------------------------------------
    public function teste() {

        //return view('test');

        $num =1; // id do relatorio

        $equip = Relatorio::find($num)->equipamento; // equipment data (header)

        $relat = Relatorio::find($num); // report data (parent class)

        $talEleCorr = Relatorio::find($num)->talEleCorr; // report data (child class)

        $dadosEqup = Equipamento::find($equip->id)->talEleCorr; // eletric chain hoist data (nominal and limit)

        $just = Relatorio::find($num)->justifs()->where('num_item', 29)->first(); // Justification for pending issues

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

        echo '<h3>Pendência do ítem 29 (trava de gancho)</h3>'. $just->descricao;

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

        // Pendings
        $justs = Relatorio::find($prev_relat->id ?? 0)->justifs;

        //dd($justs);
        $j = [];
        foreach ($justs as $just) {
            $j += 
                [$just->num_item => $just->descricao]
            ;
        };

        // return relatorio form eletric chain hoist report
        $data = [
            'title' => 'Relatório de inspeção',
            'equip' => $equip,
            'relat' => $relat,
            't_e_c' => $t_e_c,
            'prev_r_t_e_c' => $prev_r_t_e_c ?? '', // previous report
            'j' => $j,
        ];
        return view('relatorio_form', $data);
    }

    //-------------------------------------------------------------------------------------
    public function relat_form_submit(Request $request) {

        $r_id = $request->txtRelatId;

        $equip = Relatorio::find($r_id)->equipamento; // equipment data (header)

        $relat = Relatorio::find($r_id); // report data (parent class)

        $r_t_e_c = Relatorio::find($r_id)->talEleCorr; // report data (child class)

        $d_t_e_c = Equipamento::find($equip->id)->talEleCorr; // eletric chain hoist data (nominal and limit)

        // Saving pending issues in the database
        for ($i=1; $i < 67; $i++) { 
            $just = $request->input('txtJust'.$i);
            if (isset($just) || $just != '') {
                $j = new Justificativa();
                $j->relatorio_id = $r_id;
                $j->num_item = $i;
                $j->descricao = $just;
                $j->save();
            }
        }

        $justs = Relatorio::find($r_id)->justifs; // Justification for pending issues

        $r_t_e_c->med_elos = $request->input('txt31');
        $r_t_e_c->med_elo = $request->input('txt32');
        $r_t_e_c->med_w1 = $request->input('txt33');
        $r_t_e_c->med_y = $request->input('txt34');
        $r_t_e_c->save();



        $c = new MyClass();

        $data = [
            'e' => $equip,
            'r' => $r_t_e_c,
            'title' => 'R.I.',
            'js' => $justs
        ];

        return view('relatorio', $data);

    }
}
