@extends('layouts.equipamentos_layout')

@section('content')

     <div class="container">
        <div class="row mt-2">
            <div class="col-lg-6 offset-lg-3">

                <form action="{{route('edit_equip_submit')}}" method="post">
                    @csrf

                    <h2>Equipamento I.D. {{$equip->id}}</h2>
                    <hr>
                    <h3>Editar cadastro </h3>

                    <input type="hidden" name="txtNum" id="idNum" value="{{$equip->id}}">

                    <div class="input-group mb-2">
                        <label for="idSer" class="input-group-text" id="lblSer">Nº Série: </label>
                        <input type="text" class="form-control" placeholder="Ex.: 22993" aria-label="Ex.: 22993" aria-describedby="lblSer" id="idSer" name="txtSer" value="{{$equip->n_serie}}">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idCli" class="input-group-text" id="lblCli">Nº Cliente: </label>
                        <input type="text" class="form-control" placeholder="Ex.: 229" aria-label="Ex.: 229" aria-describedby="lblCli" id="idCli" name="txtCli" value="{{$equip->n_cliente}}">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idTip" class="input-group-text" id="lblTip">Tipo: </label>
                        <input type="text" class="form-control" placeholder="Ex.: Talha elétrica de corrente" aria-label="Ex.: Talha elétrica de corrente" aria-describedby="lblTip" id="idTip" name="txtTip" value="{{$equip->tipo}}">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idMod" class="input-group-text" id="lblTip">Modelo: </label>
                        <input id="idMod" name="txtMod" type="text" class="form-control" placeholder="Ex.: Dc-pro 5" aria-label="Ex.: Dc-pro 5" aria-describedby="lblMod" value="{{$equip->modelo}}">
                    </div>
                   
                    <div class="input-group mb-2">
                        <label for="idCap" class="input-group-text">Capacidade:</label>
                        <input id="idCap" name="txtCap" type="number" class="form-control" aria-label="Ex.: 500" placeholder="Ex.: 500" value="{{$equip->capacidade}}">
                        <span class="input-group-text">Kg</span>
                    </div>

                    <div class="input-group mb-2">
                        <label for="idFab" class="input-group-text" id="lblFab">Fabricante: </label>
                        <input type="text" class="form-control" placeholder="Ex.: Demag" aria-label="Ex.: Demag" aria-describedby="lblFab" id="idFab" name="txtFab" value="{{$equip->fabricante}}">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idPre" class="input-group-text">Prédio:</label>
                        <input id="idPre" name="txtPre" type="text" class="form-control" aria-label="Ex.: P-80" placeholder="Ex.: P-10" value="{{$equip->predio}}">
                        <label for="idAre" class="input-group-text">Área:</label>
                        <input id="idAre" name="txtAre" type="text" class="form-control" aria-label="Ex.: Solda" placeholder="Ex.: Solda" value="{{$equip->area}}">
                    </div>

                    <div class="input-group mb-3">
                        <label for="idSet" class="input-group-text" id="lblFab">Setor:</label>
                        <input type="text" class="form-control" placeholder="Ex.: W-E 08" aria-label="Ex.: W-E 08" aria-describedby="lblSet" id="idSet" name="txtSet" value="{{$equip->setor}}">
                    </div>
                    <hr>

                    <div><strong>VALORES DAS GRANDEZAS ELÉTRICAS</strong></div>

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
                            <input type="number" class="form-control" placeholder="Ex.: 440" aria-label="Ex.: 440" aria-describedby="lblAlim" id="idAlim" name="txtAlim" value="{{$t_e_c->v_rede}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 24" aria-label="Ex.: 24" aria-describedby="lblCom" id="idCom" name="txtCom" value="{{$t_e_c->v_com}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 50" aria-label="Ex.: 50" aria-describedby="lblRes" id="idRes" name="txtRes" value="{{$t_e_c->banc_res}}">
                        </div>
                    </div>

                    <div>MOTOR DE DIREÇÃO</div>

                    <div class="row g-2">
                        <div class="col-4">
                            <label for="idDirAlta" id="lblDirAlta">Cor. Alta (A)</label>
                        </div>
                        <div class="col-4">
                            <label for="idDirBaixa" id="lblDirBaixa">Cor. Baixa (A)</label>
                        </div>
                        <div class="col-4">
                            <label for="idTenFreDir" id="lblTenFreDir">Freio (V)</label>
                        </div>
                    </div>

                    <div class="row mb-3 g-2">
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 1.1" aria-label="Ex.: 1.1" aria-describedby="lblDirAlta" id="idDirAlta" name="txtDirAlta" value="{{$t_e_c->corr_dir_alta}}">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 0.8" aria-label="Ex.: 0.8" aria-describedby="lblDirBaixa" id="idDirBaixa" name="txtDirBaixa" value="{{$t_e_c->corr_dir_baixa}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 220" aria-label="Ex.: 220" aria-describedby="lblTenFreDir" id="idTenFreDir" name="txtTenFreDir" value="{{$t_e_c->v_dir_freio}}">
                        </div>
                    </div>

                    <div>MOTOR DE ELEVAÇÃO</div>

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
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 2.8" aria-label="Ex.: 2.8" aria-describedby="lblElevAlta" id="idElevAlta" name="txtElevAlta" value="{{$t_e_c->corr_el_alta}}">
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 1.8" aria-label="Ex.: 1.8" aria-describedby="lblElevBaixa" id="idElevBaixa" name="txtElevBaixa" value="{{$t_e_c->corr_el_baixa}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 220" aria-label="Ex.: 220" aria-describedby="lblTenFreElev" id="idTenFreElev" name="txtTenFreElev" value="{{$t_e_c->v_el_freio}}">
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
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 177.8" aria-label="Ex.: 177.8"  id="idNomElos" name="txtNomElos" value="{{$t_e_c->nom_elos}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 178.3" aria-label="Ex.: 178.3"  id="idMaxElos" name="txtMaxElos" value="{{$t_e_c->max_elos}}">
                        </div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Diâmetro elo
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 5.3" aria-label="Ex.: 5.3"  id="idNomElo" name="txtNomElo" value="{{$t_e_c->nom_elo}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 4.8" aria-label="Ex.: 4.8"  id="idMinElo" name="txtMinElo" value="{{$t_e_c->min_elo}}">
                        </div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Medida W1
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 36" aria-label="Ex.: 36"  id="idNomW1" name="txtNomW1" value="{{$t_e_c->nom_w1}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 39.6" aria-label="Ex.: 39.6"  id="idMaxW1" name="txtMaxW1" value="{{$t_e_c->max_w1}}">
                        </div>
                    </div>

                    <div class="row mb-2 g-2">
                        <div class="col-4">
                            Medida Y
                        </div>
                        <div class="col-4">
                            <input type="number" step="0.1" class="form-control" placeholder="Ex.: 24" aria-label="Ex.: 24"  id="idNomY" name="txtNomY" value="{{$t_e_c->nom_y}}">
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="Ex.: 21.6" aria-label="Ex.: 21.6"  id="idMinY" name="txtMinY" value="{{$t_e_c->min_y}}">
                        </div>
                    </div>

                    <div style="margin:10px 0;">
                        <input type="submit" class="btn btn-primary" value="SALVAR">
                        <a href="{{route('equip')}}" class="btn btn-secondary">VOLTAR</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

@endsection

