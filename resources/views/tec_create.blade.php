@extends('layouts.equipamentos_layout')

@section('content')

     <div class="container">
        <div class="row mt-2">
            <div class="col-lg-6 offset-lg-3">
                @if (session()->has('message'))
                    {{session()->get('message')}}
                @endif

                <form action="{{route('tec_models.store')}}" method="post">
                    @csrf

                    <h2>Talha elétrica de corrente</h2>
                    <hr>
                    <h3>Novo cadastro</h3>

                    <div class="input-group mb-2">
                        <label for="idDescr" class="input-group-text" id="lblDescr">Modelo: </label>
                        <input type="text" class="form-control" placeholder="Ex.: DC PRO 01" aria-label="Ex.: DC PRO 01" aria-describedby="lblDescr" id="idDescr" name="descricao">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idFabr" class="input-group-text" id="lblFabr">Fabricante: </label>
                        <input type="text" class="form-control" placeholder="Ex.: Demag" aria-label="Ex.: Demag" aria-describedby="lblFabr" id="idFabr" name="fabricante">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idCap" class="input-group-text">Capacidade:</label>
                        <input id="idCap" name="capacidade" type="number" class="form-control" aria-label="Ex.: 500" placeholder="Ex.: 500">
                        <span class="input-group-text">Kg</span>
                    </div>
                    <hr>

                    <div><strong>VALORES ELÉTRICOS NOMINAIS</strong></div>

                    <div class="row g-2">
                        <div class="col-4">
                            <label for="idAlim" id="lblAlim">Rede (V)</label>
                        </div>
                        <div class="col-4">
                            <label for="idCom" id="lblCom">Comando( V)</label>
                        </div>
                        <div class="col-4">
                            <label for="idRes" id="lblRes">B. Res. (&#8486;)</label>
                        </div>
                    </div>

                    <div class="row mb-3 g-2">
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 440" aria-label="Ex.: 440" aria-describedby="lblAlim" id="idAlim" name="v_rede">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 24" aria-label="Ex.: 24" aria-describedby="lblCom" id="idCom" name="v_com">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 50" aria-label="Ex.: 50" aria-describedby="lblRes" id="idRes" name="banc_res">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-4">
                            <label for="idElevAlta" id="lblElevAlta">Cor. Alta (A)</label>
                        </div>
                        <div class="col-4">
                            <label for="idElevBaixa" id="lblElevBaixa">Cor. Baixa (A)</label>
                        </div>
                        <div class="col-4">
                            <label for="idTenFreElev" id="lblTenFreElev">Freio (V)</label>
                        </div>
                    </div>

                    <div class="row mb-3 g-2">
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 2.8" aria-label="Ex.: 2.8" aria-describedby="lblElevAlta" id="idElevAlta" name="corr_alta">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 1.8" aria-label="Ex.: 1.8" aria-describedby="lblElevBaixa" id="idElevBaixa" name="corr_baixa">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 220" aria-label="Ex.: 220" aria-describedby="lblTenFreElev" id="idTenFreElev" name="v_freio">
                        </div>
                    </div>
                    <hr>

                    <div><strong>REFERÊNCIA PARA MEDIÇÕES MECÂNICAS</strong></div>

                    <div class="row g-2">
                        <div class="col-4"></div>
                        <div class="col-4">Nominal</div>
                        <div class="col-4">Limite</div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Med. 11 elos
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 177.8" aria-label="Ex.: 177.8"  id="idNomElos" name="nom_elos">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 178.3" aria-label="Ex.: 178.3"  id="idMaxElos" name="max_elos">
                        </div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Diâmetro elo
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 5.3" aria-label="Ex.: 5.3"  id="idNomElo" name="nom_elo">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 4.8" aria-label="Ex.: 4.8"  id="idMinElo" name="min_elo">
                        </div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Medida W1
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 36" aria-label="Ex.: 36"  id="idNomW1" name="nom_w1">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 39.6" aria-label="Ex.: 39.6"  id="idMaxW1" name="max_w1">
                        </div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Medida Y
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 24" aria-label="Ex.: 24"  id="idNomY" name="nom_y">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 21.6" aria-label="Ex.: 21.6"  id="idMinY" name="min_y">
                        </div>
                    </div>

                    <div style="margin:10px 0;">
                        <button type="submit" class="btn btn-primary">SALVAR</button>
                        <a href="{{route('tec_models.index')}}" class="btn btn-secondary">VOLTAR</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

@endsection

