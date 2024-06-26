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
        $tecms = $this->tecm->all();

        return view('tec_model_list', ['tecms' => $tecms]);
    }

    public function create()
    {
        return "create";
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tec_model $tec_model)
    {
        return view('tec_edit', ['tec_model' => $tec_model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy $id";

    }
}
