<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Relatorio;

class MainController extends Controller
{
    //----------------------------------------------------------
    public function programacao() {
        //get equipments
        $equips = Equipamento::where('ativo', 1)
                    ->orderBy('id')
                    ->get();

        //$equips = Equipamento::orderBy('created_at', 'desc')->get();

        return view('programacao', ['equips' => $equips, 
                                'Programação de Abril' => 'Equipamentos',
                                'title' => 'Programação',
                            ]);
    }

    //----------------------------------------------------------
    public function relatorios() {
        //get equipments
        $relats = Relatorio::where('finalizado', 1)
                    ->orderBy('id')
                    ->simplePaginate(5);

        //$relats = Equipamento::orderBy('created_at', 'desc')->get();

        return view('relat_list', ['relats' => $relats, 
                                'Programação de Abril' => 'Equipamentos',
                                'title' => 'Relatorios',
                            ]);
    }
}
