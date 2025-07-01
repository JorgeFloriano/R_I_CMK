@extends('layouts.equipamentos_layout')

@section('content')

     <div class="container">
        <div class="row mt-2">
            <div class="col-lg-6 offset-lg-3">

                <form action="{{route('tec_models.destroy' , ['tec_model' => $tec_model->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" id="idNum" value="DELETE">

                    <h2>Talha elétrica de corrente - {{$tec_model->id}}</h2>
                    <hr>
                    <h3>Deletar cadastro </h3>

                    <div class="input-group mb-2">
                        <label for="idDescr" class="input-group-text" id="lblDescr">Modelo: </label>
                        <input disabled type="text" class="form-control" placeholder="Ex.: DC PRO 01" aria-label="Ex.: DC PRO 01" aria-describedby="lblDescr" id="idDescr" name="descricao" value="{{$tec_model->descricao}}">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idFabr" class="input-group-text" id="lblFabr">Fabricante: </label>
                        <input disabled type="text" class="form-control" placeholder="Ex.: Demag" aria-label="Ex.: Demag" aria-describedby="lblFabr" id="idFabr" name="fabricante" value="{{$tec_model->fabricante}}">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idCap" class="input-group-text">Capacidade:</label>
                        <input disabled id="idCap" name="capacidade" type="number" class="form-control" aria-label="Ex.: 500" placeholder="Ex.: 500" value="{{$tec_model->capacidade}}">
                        <span class="input-group-text">Kg</span>
                    </div>
                    <hr>

                    <div class="alert alert-danger">
                        Ao deleter o cadastro todos os dados deste modelo de equipamento serão perdidos.
                    </div>
                    <div style="margin:10px 0;">
                        <button type="submit" class="btn btn-danger me-2">DELETAR</button>
                        <a href="{{route('tec_models.index')}}" class="btn btn-secondary">VOLTAR</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

@endsection

