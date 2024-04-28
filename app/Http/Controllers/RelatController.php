<?php

namespace App\Http\Controllers;

use App\Class\MyClass;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Relatorio;
use App\Models\T_e_c_relatorio;

class RelatController extends Controller
{
    public function teste() {

        return view('test');

        //------------------------------------------------------
        $num = 2; // id do relatorio

        $equip = Relatorio::find($num)->equipamento; // dados genericos do equipamento (cabeçalho do relatório)

        $relat = Relatorio::find($num); // identificação do relatório (classe pai)

        $talEleCorr = Relatorio::find($num)->talEleCorr; // dados do relatório de talha elétrica de corrente (classe filho)

        $dadosEqup = Equipamento::find($equip->id)->talEleCorr; // dados específicos do equipamento talha elétrica de corrente

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


        //-------------------------------------------------------
        $num = 1;
        $relats = Equipamento::find($num)->relatorios; // todos os relatorios do equipamento 1

        echo '<h2>RELATÓRIOS DO EQUIPAMENTO Nº CMK '.$num.'</h2>';
        
        foreach ($relats as $relat) {
            echo 'Relatório Nº: '.$relat->id.'<br>
            mês: '. $relat->mes.'<br><br>';
        };
    }

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
        
        // Specific data from the previous eletric chain hoist report
        
        $prev_relat = Relatorio::where('finalizado',1)
            ->where('equipamento_id', $equip->id)
            ->orderBy('id', 'DESC')
            ->first('id');

        $prev_r_t_e_c = Relatorio::find($prev_relat->id ?? 0)->talEleCorr ?? 0;

        // return relatorio form eletric chain hoist report
        $data = [
            'title' => 'Relatório de inspeção',
            'equip' => $equip,
            'relat' => $relat,
            't_e_c' => $t_e_c,
            'prev_r_t_e_c' => $prev_r_t_e_c,
        ];
        return view('relatorio_form', $data);
    }

    public function relat_form_submit(Request $request) {

        $relat = Relatorio::where('finalizado',0)->where('equipamento_id', $request->txtRelatId)->get()[0];


        dd($relat);
        $c = new MyClass();

        $data = [
            'tec1name' => $request->txtTec1Name,
            'tec1func' => $request->txtTec1Func,
            'title' => 'R.I.'
        ];
        dd($request);
        return view('relatorio', $data);
        
    }
}
