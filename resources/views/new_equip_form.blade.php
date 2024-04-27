@extends('layouts.equipamentos_layout')

@section('content')
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 offset-lg-3">

                <form action="{{route('new_equip_submit')}}" method="post">
                    @csrf

                    <h2>Equipamentos CNH</h2>
                    <hr>
                    <h3>Novo cadastro</h3>

                    <div class="input-group mb-2">
                        <label for="idSer" class="input-group-text" id="lblSer">Nº Série: </label>
                        <input type="text" class="form-control" placeholder="Ex.: 22993" aria-label="Ex.: 22993" aria-describedby="lblSer" id="idSer" name="txtSer">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idCli" class="input-group-text" id="lblCli">Nº Cliente: </label>
                        <input type="text" class="form-control" placeholder="Ex.: 229" aria-label="Ex.: 229" aria-describedby="lblCli" id="idCli" name="txtCli">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idTip" class="input-group-text" id="lblTip">Tipo: </label>
                        <input type="text" class="form-control" placeholder="Ex.: Talha elétrica de corrente" aria-label="Ex.: Talha elétrica de corrente" aria-describedby="lblTip" id="idTip" name="txtTip">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idMod" class="input-group-text" id="lblTip">Modelo: </label>
                        <input id="idMod" name="txtMod" type="text" class="form-control" placeholder="Ex.: Dc-pro 5" aria-label="Ex.: Dc-pro 5" aria-describedby="lblMod">
                    </div>
                   
                    <div class="input-group mb-2">
                        <label for="idCap" class="input-group-text">Capacidade:</label>
                        <input id="idCap" name="txtCap" type="number" class="form-control" aria-label="Ex.: 500" placeholder="Ex.: 500">
                        <span class="input-group-text">Kg</span>
                    </div>

                    <div class="input-group mb-2">
                        <label for="idFab" class="input-group-text" id="lblFab">Fabricante: </label>
                        <input type="text" class="form-control" placeholder="Ex.: Demag" aria-label="Ex.: Demag" aria-describedby="lblFab" id="idFab" name="txtFab">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idPre" class="input-group-text">Prédio:</label>
                        <input id="idPre" name="txtPre" type="text" class="form-control" aria-label="Ex.: P-80" placeholder="Ex.: P-10">
                        <label for="idAre" class="input-group-text">Área:</label>
                        <input id="idAre" name="txtAre" type="text" class="form-control" aria-label="Ex.: Solda" placeholder="Ex.: Solda">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idSet" class="input-group-text" id="lblFab">Setor:</label>
                        <input type="text" class="form-control" placeholder="Ex.: W-E 08" aria-label="Ex.: W-E 08" aria-describedby="lblSet" id="idSet" name="txtSet">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idAlim" class="input-group-text" id="lblAlim">Tensão de rede (V):</label>
                        <input type="number" class="form-control" placeholder="Ex.: 440" aria-label="Ex.: 440" aria-describedby="lblAlim" id="idAlim" name="txtAlim">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idCom" class="input-group-text" id="lblCom">Tensão de comando (V):</label>
                        <input type="number" class="form-control" placeholder="Ex.: 24" aria-label="Ex.: 24" aria-describedby="lblCom" id="idCom" name="txtCom">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idRes" class="input-group-text" id="lblRes">Banco de resist. (Ohms):</label>
                        <input type="number" class="form-control" placeholder="Ex.: 50" aria-label="Ex.: 50" aria-describedby="lblRes" id="idRes" name="txtRes">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idDirAlta" class="input-group-text" id="lblDirAlta">Corr. direção vel. alta (A):</label>
                        <input type="number" step="0.1" class="form-control" placeholder="Ex.: 1.1" aria-label="Ex.: 1.1" aria-describedby="lblDirAlta" id="idDirAlta" name="txtDirAlta">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idDirBaixa" class="input-group-text" id="lblDirBaixa">Corr. direção vel. baixa (A):</label>
                        <input type="number" step="0.1" class="form-control" placeholder="Ex.: 0.8" aria-label="Ex.: 0.8" aria-describedby="lblDirBaixa" id="idDirBaixa" name="txtDirBaixa">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idTenFreDir" class="input-group-text" id="lblTenFreDir">Tensão freio da direção (V):</label>
                        <input type="number" class="form-control" placeholder="Ex.: 220" aria-label="Ex.: 220" aria-describedby="lblTenFreDir" id="idTenFreDir" name="txtTenFreDir">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idElevAlta" class="input-group-text" id="lblElevAlta">Corr. Elevação vel. alta (A):</label>
                        <input type="number" step="0.1" class="form-control" placeholder="Ex.: 2.8" aria-label="Ex.: 2.8" aria-describedby="lblElevAlta" id="idElevAlta" name="txtElevAlta">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idElevBaixa" class="input-group-text" id="lblElevBaixa">Corr. Elevação vel. baixa (A):</label>
                        <input type="number" step="0.1" class="form-control" placeholder="Ex.: 1.8" aria-label="Ex.: 1.8" aria-describedby="lblElevBaixa" id="idElevBaixa" name="txtElevBaixa">
                    </div>

                    <div class="input-group mb-2">
                        <label for="idTenFreElev" class="input-group-text" id="lblTenFreElev">Tensão freio da Elevação (V):</label>
                        <input type="number" class="form-control" placeholder="Ex.: 220" aria-label="Ex.: 220" aria-describedby="lblTenFreElev" id="idTenFreElev" name="txtTenFreElev">
                    </div>

                    <div style="margin: 10px 0px;">
                        <input type="submit" class="btn btn-primary" value="SALVAR">
                        <a href="{{route('equip')}}" class="btn btn-secondary">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

