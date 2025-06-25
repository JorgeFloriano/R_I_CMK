<?php

namespace App\Http\Controllers;

use App\Models\Tec_model;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {

        //dd(Hash::make('science123J'));
        // Check if the user is logged out
        if(auth()->user()) {
            return redirect()->route('programacao');
        }
        return view('login');
    }

    public function table() {
       
        $tecm = new Tec_model();
        $tecms = $tecm->orderBy('descricao')->get();

        return view('tec_table', ['tecms' => $tecms]);
    }
}
