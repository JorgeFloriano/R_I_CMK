@extends('layouts.r_i_form_layout')

@section('content')

<title>Relatório de Inspeção</title>
</head>

<body id="body">
    <div class="container">
        <div class="row mt-1">
            <div class="col-lg-6 offset-lg-3">
                <div id="hForm">
                    <div id="header1">
                        <img src="{{asset('assets/img/logo_cmk.jpg')}}" alt="logo cmk" width="70px">
                    </div>
                    <div id="header2">
                        <div>TALHA ELÉTRICA</div>
                        <div>DE CORRENTE</div>
                    </div>
                    <div id="header3">
                        Nº {{$relat->id}}
                    </div>
                </div>
                <main>
                    <section id="info">
                        <table style="width: 100%;font-size: 10px;">
                            <tr><td style="width: 33%;">Cliente: <strong>CNH</strong></td><td style="width: 33%;">Unidade: <strong>Sorocaba</strong></td><td>Solicitante: <strong>Lucas M.</strong></td></tr>
                            <tr><td>Nº Série: <strong>{{$equip->n_serie}}</strong></td><td>Nº Cliente: <strong>CNH-{{$equip->n_cliente}}</strong></td><td>Nº CMK: <strong>{{$equip->id}}</strong></td></tr>
                            <tr><td>Fabricante: <strong>{{$equip->fabricante}}</strong></td><td>Modelo: <strong>{{$equip->modelo}}</strong></td><td>Capacidade: <strong>{{$equip->capacidade}} kg</strong></td></tr>
                            <tr><td>Prédio: <strong>{{$equip->predio}}</strong></td><td>Setor: <strong>{{$equip->setor}}</strong></td><td>Área : <strong>{{$equip->area}}</strong></td></tr>
                        </table>
                        <div id="legend">
                                Legenda: 
                                <i class="fa fa-thumbs-up iconl" style="margin-left: 0px;"></i>Ok 
                                <i class="fa fa-wrench iconl"></i>Recuperar
                                <i class="fa fa-thumbs-down iconl"></i>Trocar
                        </div>
                    </section>
                    <form id="form" action="{{route('relat_form_submit')}}" method="post">
                        @csrf

                        <input type="hidden" name="txtRelatId" value="{{$relat->id}}">

                        <section id="insp" class="insp">
                            INSPEÇÃO MECÂNICA
                        </section>

                        <section id="trole" class="element">
                            TROLE - Capacidade: {{$equip->capacidade}} kg
                        </section>
                        <x-item-status num="1" message="Rodas e rolamentos"/>
                        <x-item-status num="2" message="Fixação da talha e parafusos de fechamento"/>
                        <x-item-status num="3" message="Batentes fim de curso"/>

                        <section id="trole" class="element">
                            TALHA - Capacidade: {{$equip->capacidade}} kg
                        </section>
                        <x-item-status num="7" message="Guia da corrente"/>
                        <x-item-status num="8" message="Batedor stop"/>
                        <x-item-status num="9" message="Armazenador de corrente"/>
                        <x-item-status num="10" message="Fixação superior"/>
                        <x-item-status num="11" message="Fricção"/>
                        <x-item-status num="12" message="Freio (regular se necessário)"/>
                        <x-item-status num="13" message="Lubrificação"/>
                        <x-item-status num="14" message="Carcaça"/>

                        <section class="item">
                            <section class="ask">
                                <div class="lab"><label for="id15">15-Teste de carga (kg)</label></div>
                                <div class="opt">
                                    <input style="width: 65px;" min="0" type="number" name="txt15" id="id15">
                                </div>
                            </section>
                        </section>

                        <section id="trole" class="element">
                            REDUTOR
                        </section>
                        <x-item-status num="16" message="Vazamento ( retentores, juntas e bujões )"/>
                        <x-item-status num="17" message="Nível de óleo (completar se necessário)"/>
                        <x-item-status num="18" message="Ruídos e aquecimento anormal"/>
                        <x-item-status num="19" message="Reapertar parafusos de fixação"/>

                        <section id="trole" class="element">
                            CORRENTE
                        </section>
                        <x-item-status num="20" message="Limpeza e lubrificação da corrente"/>
                        <x-item-status num="21" message="Corrente prende, salta ou produz ruído"/>
                        <x-item-status num="22" message="Amassamentos, estrias, fissuras, respingos de solda, corrosão ou deformação elo a elo"/>
                        <x-item-status num="23" message="Montagem (verificar se a corrente não está torcida ou com a posição da solda invertida)"/>
                        <x-item-status num="24" message="Pino de fixação (substituir no caso de qualquer imperfeição visível)"/>

                        <section id="trole" class="element">
                            BLOCO INFERIOR - Capacidade: {{$equip->capacidade}} kg
                        </section>
                    
                        <x-item-status num="25" message="Caixa do gancho"/>
                        <x-item-status num="26" message="Carretel e rolamentos"/>
                        <x-item-status num="27" message="Carcaça quanto à desgastes e trincas"/>
                        <x-item-status num="28" message="Trava de gancho"/>
                        <x-item-status num="29" message="Placa de identificação"/>
                        <x-item-status num="30" message="Lubrificar caixa de gancho"/>

                        <section id="trole" class="element">
                            MEDIÇÕES DA CORRENTE DE CARGA (mm)
                        </section>

                        <section class="item">
                            <table class="med">
                                <tr>
                                    <th style="width: 60%;">NORMA NBR 1292/1990</th>
                                    <th style="width: 15%;">Nominal</th>
                                    <th style="width: 15%">Limite</th>
                                    <th>Medido</th>
                                </tr>
                                <tr>
                                    <td>31-Alongam. - Med. 11 elos</td>
                                    <td>248</td>
                                    <td>253</td>
                                    <td><input class="medido" min="0" step="0.1" type="number" name="txt31" id="id31" value="{{$r_t_e_c->med_elos ?? ''}}"></td>
                                </tr>
                                <tr>
                                    <td>32-Diâmetro médio do elo</td>
                                    <td>7.4</td>
                                    <td>6.7</td>
                                    <td><input class="medido" step="0.1" min="0" type="number" name="txt32" id="id32" value="{{$r_t_e_c->med_elo ?? ''}}"></td>
                                </tr>
                            </table>
                        </section>

                        <section id="trole" class="element">
                            MEDIÇÕES DO GANCHO INFERIOR (mm)
                        </section>

                        <section class="item">
                            <table class="med" style="height: 105px;">
                                <tr>
                                    <th style="width: 60%;" colspan="2">NORMA NBR 10070/1987</th>
                                    <th style="width: 15%;">Nominal</th>
                                    <th style="width: 15%;">Limite</th>
                                    <th>Medido</th>
                                </tr>
                                <tr>
                                    <td rowspan="3"><img src="{{asset('assets/img/gancho.jpg')}}" alt="figura do gancho" width="80px"></td>
                                    <td>33-Medida W1</td>
                                    <td>41</td>
                                    <td>45.1</td>
                                    <td><input class="medido" min="0" step="0.1" type="number" name="txt33" id="id33" value="{{$r_t_e_c->med_w1 ?? ''}}"></td>
                                </tr>
                                <tr>
                                    <td>34-Medida Y</td>
                                    <td>28</td>
                                    <td>23.6</td>
                                    <td><input class="medido" step="0.1" min="0" type="number" name="txt34" id="id34" value="{{$r_t_e_c->med_y ?? ''}}"></td>
                                </tr>
                                <tr>
                                    <td>35-Alinhamento</td>
                                    <td>
                                        <label for="35_Ok">Ok </label><input type="radio" name="txt35" id="35_Ok" value="Alinhamento Ok">
                                    </td>
                                    <td colspan="2">
                                        <label for="35_T">Substituir </label><input type="radio" name="txt35" id="35_T" value="Desalinhado, substituir gancho">
                                    </td>
                                </tr>
                            </table>
                        </section>

                        <section id="insp" class="insp">
                            INSPEÇÃO ELÉTRICA
                        </section>

                        <section id="trole" class="element">
                            TALHA
                        </section>
                        <x-item-status num="36" message="Fixação do painel, tampa e limpeza"/>
                        <x-item-status num="37" message="Chave geral, fusíveis e disjuntores"/>
                        <x-item-status num="38" message="Motores (medições e aquecimento)"/>
                        <x-item-status num="39" message="Caixa de ligação"/>
                        <x-item-status num="40" message="Cabo de alimentação"/>
                        <x-item-status num="41" message="Prensa cabos"/>
                        <x-item-status num="42" message="Tomadas de engate rápido"/>
                        <x-item-status num="43" message="Contatores e contatos"/>
                        <x-item-status num="44" message="Trafos de potência e comando"/>
                        <x-item-status num="45" message="Bornes e terminais"/>
                        
                        <section id="trole" class="element">
                            BOTOEIRA
                        </section>
                    
                        <x-item-status num="48" message="Funcionamento do botões"/>
                        <x-item-status num="49" message="Cabo elétrico e prensa cabo"/>
                        <x-item-status num="50" message="Cabo de aço de sustentação e fixação"/>
                        <x-item-status num="51" message="Caixa de conexão"/>
                        <x-item-status num="52" message="Carcaça e identificão dos botões"/>

                        <section id="trole" class="element">
                            ELETRIFICAÇÃO TRANSVERSAL
                        </section>

                        <x-item-status num="53" message="Fixação e conservação dos cabos"/>
                        <x-item-status num="54" message="Estado do perfil, fixações e emendas"/>
                        <x-item-status num="55" message="Carros porta cabos e arrastador"/>

                        <section id="trole" class="element">
                            RÁDIO CONTROLE
                        </section>

                        <x-item-status num="56" message="Funcionamento e estado do emissor"/>
                        <x-item-status num="57" message="Reaperto de todas as conexões e ligações"/>
                        <x-item-status num="58" message="Estado de conservação da carcaça"/>
                        <x-item-status num="59" message="Estado da bateria / pilhas do emissor"/>
                        <x-item-status num="60" message="Sinais luminosos do receptor e transmissor"/>

                        <section id="trole" class="element">
                            LIMITE DE FIM DE CURSO - Elevação
                        </section>

                        <x-item-status num="61" message="Funcionamento da chave limite"/>
                        <x-item-status num="62" message="Cabos ou corrente do pino"/>
                        <x-item-status num="63" message="Contatos, molas e articulação"/>
                        
                        <section id="trole" class="element">
                            LIMITE DE FIM DE CURSO - Direção
                        </section>

                        <x-item-status num="64" message="Funcionamento da chave limite"/>
                        <x-item-status num="65" message="Cabos ou corrente do pino"/>
                        <x-item-status num="66" message="Contatos, molas e articulação"/>
                        
                        <section id="trole" class="element">
                            MEDIÇÕES DAS GRANDEZAS ELÉTRICAS
                        </section>

                        <section class="item">
                        <table class="med" style="height: 270px;">
                            <thead>
                                <tr>
                                    <th style="width: 90%;" colspan="3">VALORES CONSIDERADOS</th>
                                    <th style="width: 15%;">Nominal</th>
                                    <th>Medido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>67-</td>
                                    <td colspan="2">Tensão de rede (V)</td>
                                    <td>{{$t_e_c->v_rede}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt67" id="id67">
                                    </td>
                                </tr>
                                <tr>
                                    <td>68-</td>
                                    <td colspan="2">Tensão trafo de comando (VCA)</td>
                                    <td>{{$t_e_c->v_com}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt68" id="id68">
                                    </td>
                                </tr>
                                <tr>
                                    <td>69-</td>
                                    <td colspan="2">Med. banco de resistências (Ohms)</td>
                                    <td>{{$t_e_c->banc_res}}</td>
                                    <td>
                                        <input class="medido" disabled step="0.1" min="0" type="number" name="txt69" id="id69">
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3">70-</td>
                                    <th rowspan="3" class="motor" >MOTOR DE <br> DIREÇÃO</th>
                                    <td>Corr. da alta (A)</td>
                                    <td>{{$t_e_c->corr_dir_alta}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt70" id="id70">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Corr. da baixa (A)</td>
                                    <td>{{$t_e_c->corr_dir_baixa}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt70_2" id="id70_2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tensão freio (VCC)</td>
                                    <td>{{$t_e_c->v_dir_freio}}</td>
                                    <td>
                                        <input class="medido" disabled step="0.1" min="0" type="number" name="txt70_3" id="id70_3">
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="3">71-</td>
                                    <th rowspan="3" class="motor" >MOTOR DE <br> ELEVAÇÃO</th>
                                    <td>Corr. da alta (A)</td>
                                    <td>{{$t_e_c->corr_el_alta}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt71" id="id71">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Corr. da baixa (A)</td>
                                    <td>{{$t_e_c->corr_el_baixa}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt71_2" id="id71_2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tensão freio (VCC)</td>
                                    <td>{{$t_e_c->v_el_freio}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt71_3" id="id71_3">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </section>

                        <section class="item" style="flex-direction: column;">
                            <div>
                                <strong>OBSERVAÇÕES GERAIS E SERVIÇOS EXECUTADOS: </strong>
                                <textarea name="txtObservacoes" id="observacoes" class='autoExpand' rows='1' data-min-rows='1'></textarea>
                            </div>
                        </section>

                        <section class="item" style="flex-direction: column;">
                            <div>
                                <strong>STATUS FINAL DA INSPEÇÃO: </strong>
                            </div>
                            <div >
                                <div>
                                    <input type="radio" name="status" id="stat100" value="100% FINALIZADA">
                                    <label for="stat100">100% FINALIZADA</label>
                                </div>
                                <div>
                                    <input type="radio" name="status" id="statRP" value="RESTAM PENDÊNCIAS">
                                    <label for="statRP">RESTAM PENDÊNCIAS</label>
                                </div>
                                <div>
                                    <input type="radio" name="status" id="statRPA" value="RESTAM PENDÊNCIAS ANTERIORES">
                                    <label for="statRPA">RESTAM PENDÊNCIAS ANTERIORES</label>
                                </div>
                            </div>
                        </section>

                        <section id="secApto" class="item" style="flex-direction: column;">
                            <div>
                                <strong>EQUIPAMENTO APTO PARA OPERAR: </strong>
                            </div>
                            <div >
                                <div onclick="displayoff('secRessalva', 'secApto', 'idressalvas')">
                                    <input type="radio" name="apto" id="apto" value="APTO PARA OPERAR">
                                    <label for="apto">SIM</label>
                                </div>
                                <div onclick="displayoff('secRessalva', 'secApto', 'idressalvas')">
                                    <input type="radio" name="apto" id="nApto" value="NÃO APTO PARA OPERAR">
                                    <label for="nApto">NÃO</label>
                                </div>
                                <div onclick="displayon('secRessalva', 'secApto')">
                                    <input type="radio" name="apto" id="aptoCR" value="APTO PARA OPERAR COM RESSALVAS">
                                    <label for="aptoCR">SIM COM RESSALVAS</label>
                                </div>
                            </div>
                            <section id="secRessalva" class="obs">
                                <label for="idressalvas"><strong>RESSALVAS:</strong></label>
                                <textarea name="txtRessalvas" id="idressalvas" class='autoExpand' rows='1' data-min-rows='1' placeholder='Ex.: Elevação apenas com a velocidade baixa.'></textarea>
                            </section>
                        </section>

                        <div id="infoTec1" class="infoTec">
                            <p><b>APONTAMENTO DO TÉCNICO 1</b></p>
                            <div class="itInfTec">
                                <label class="ltec" for="tec1Name">Nome: </label>
                                <input class="itec" type="text" name="txtTec1Name" id="tec1Name" required>
                            </div>
                            <div class="itInfTec">
                                <label class="ltec" for="tec1Func">Função: </label>
                                <input class="itec" type="text" name="txtTec1Func" id="tec1Func" required>
                            </div>
                            <div class="itInfTec">
                                <label class="ltec" for="tec1data">Data: </label>
                                <input class="itec" type="date" name="txtTec1Data" id="tec1data" max="<?= date("Y-m-d")?>">
                            </div>
                            <div class="itInfTec">
                                <label class="horario" for="tec1HI">H. inicial: </label>
                                <input class="horario" type="time" name="txtTec1HI" id="tec1HI">
                                <label class="horario" for="tec1HF" style="margin-left: 5px;">H. final: </label>
                                <input class="horario" type="time" name="txtTec1HF" id="tec1HF">
                            </div>
                            <p>
                                <a id="pen1" href="#" class="signature-button"><i class="fa fa-pencil" aria-hidden="true"></i>Assinar </a>
                                <a id="okSign1" href="#" class="signature-button"><i class="fa fa-check" aria-hidden="true"></i>Ok </a>
                                <a id="clear1" href="#" class="signature-button"><i class="fa fa-eraser" aria-hidden="true"></i>Apagar </a>
                            </p>
                            <div class="signature">
                                <canvas height="200" width="300" class="signature-pad" id="canv1"></canvas>
                            
                                <input type="hidden" name="signTec1" id="idSignTec1">
                            </div>
                        </div>

                        <div id="infoTec2" class="infoTec">
                            <p><b>APONTAMENTO DO TÉCNICO 2</b></p>
                            <div class="itInfTec">
                                <label class="ltec" for="tec2Name">Nome: </label>
                                <input class="itec" type="text" name="txtTec2Name" id="tec2Name">
                            </div>
                            <div class="itInfTec">
                                <label class="ltec" for="tec2Func">Função: </label>
                                <input class="itec" type="text" name="txtTec2Func" id="tec2Func">
                            </div>
                            <div class="itInfTec">
                                <label class="ltec" for="tec2data">Data: </label>
                                <input class="itec " type="date" name="txtTec2Data" id="tec2data" max="<?= date("Y-m-d")?>">
                            </div>
                            <div class="itInfTec">
                                <label class="horario" for="tec2HI">H. inicial: </label>
                                <input class="horario" type="time" name="txtTec2HI" id="tec2HI"
                                >
                                <label class="horario" for="tec2HF" style="margin-left: 5px;">H. final: </label>
                                <input class="horario" type="time" name="txtTec2HF" id="tec2HF" 
                                >
                            </div>
                            <p>
                                <a id="pen2" href="#" class="signature-button"><i class="fa fa-pencil" aria-hidden="true"></i>Assinar </a>
                                <a id="okSign2" href="#" class="signature-button"><i class="fa fa-check" aria-hidden="true"></i>Ok </a>
                                <a id="clear2" href="#" class="signature-button"><i class="fa fa-eraser" aria-hidden="true"></i>Apagar </a>
                            </p>
                            <div class="signature">
                                <canvas height="200" width="300" class="signature-pad" id="canv2" aria-placeholder="assine aqui"></canvas>
                                <input type="hidden" name="signTec2" id="idSignTec2">
                            </div>
                        </div>

                        <button onclick="unlockScreen(),limitDate('tec2data','tec2HI','tec2HF'),limitDate('tec1data','tec1HI','tec1HF')" type="submit" class="btn" style="width: 100%;">CONFIRMA</button>
                    </form>
                    <script src="{{asset('assets/js/signature.js')}}"></script>
                    <script src="{{asset('assets/js/signature2.js')}}"></script>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
@endsection

