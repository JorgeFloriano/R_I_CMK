@extends('layouts.r_i_form_layout')

@section('content')

<title>Relatório de Inspeção</title>
</head>

<body onload="limitMed('nom11elos', 'max11elos', 'med11elos'),
              limitMed('nomElo', 'minElo', 'medElo'),
              limitMed('nomW1', 'maxW1', 'medW1'),
              limitMed('nomY', 'minY', 'medY')
              " id="body">
    <div class="container">
        <div class="row mt-1">
            <div class="col-lg-6 offset-lg-3">
                <div id="hForm">
                    <div id="header1">
                        <div>INSTRUÇÃO DE INSPEÇÃO</div>
                        <div>TALHA ELÉTRICA DE CORRENTE</div>
                    </div>
                </div>
                <main>
                    <section id="info">
                        <table style="width: 100%;font-size: 11px;">
                            <tr><td style="width: 33%;">Cliente: <strong>ZF</strong></td><td style="width: 33%;">Unidade: <strong>Sorocaba</strong></td><td>Solicitante: <strong>Peterson</strong></td></tr>
                            <tr><td>Nº Série: <strong>{{$equip->n_serie}}</strong></td><td>Nº Cliente: <strong>{{$equip->n_cliente}}</strong></td><td>Nº CMK: <strong>{{$equip->id}}</strong></td></tr>
                            <tr><td>Fabricante: <strong>{{$equip->fabricante}}</strong></td><td>Modelo: <strong>{{$equip->modelo}}</strong></td><td>Capacidade: <strong>{{$equip->capacidade}} kg</strong></td></tr>
                            <tr><td>Prédio: <strong>{{$equip->predio}}</strong></td><td>Setor: <strong>{{$equip->setor}}</strong></td><td>Área : <strong>{{$equip->area}}</strong></td></tr>
                        </table>
                        <div id="legend">
                            Legenda: 
                            <i class="fa fa-thumbs-up iconl" style="margin-left: 0px;color: #198754"></i>Ok 
                            <i class="fa fa-wrench iconl" style="color: rgb(50, 50, 50)"></i>Recuperar / Regular
                            <i class="fa fa-thumbs-down iconl" style="color: #dc3545"></i>Trocar
                        </div>
                    </section>
                    <form id="form" action="{{route('relat_form_submit')}}" method="post" autocomplete="on" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="txtEquipId" value="{{$equip->id}}">
                        <input type="hidden" name="txtPrevRelatId" value="{{$prev_relat_id}}">

                        <section class="item">
                            <section class="ask">
                                <div class="lab"><label for="idRelatNumber">Número do relatório:</label></div>
                                <div class="opt">
                                    <input style="width: 65px;" min="0" type="number" name="relatNumber" id="idRelatNumber" value="{{$report->id ?? ''}}">
                                </div>
                            </section>
                        </section>

                        <section id="insp" class="insp">
                            INSPEÇÃO MECÂNICA
                        </section>

                        <section id="trole" class="element">
                            TROLE - Capacidade: {{$equip->capacidade}} kg
                        </section>
                        <x-item-status :report="$report->id ?? null" :important="$imp[1] ?? null" :stat="$prev_r_t_e_c->item1 ?? null" :justif="$pends" num="1" message="Rodas e rolamentos"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[2] ?? null" :stat="$prev_r_t_e_c->item2 ?? null" :justif="$pends" num="2" message="Fixação da talha e parafusos de fechamento"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[3] ?? null" :stat="$prev_r_t_e_c->item3 ?? null" :justif="$pends" num="3" message="Batentes fim de curso"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[4] ?? null" :stat="$prev_r_t_e_c->item4 ?? null" :justif="$pends" num="4" message="Motor"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[5] ?? null" :stat="$prev_r_t_e_c->item5 ?? null" :justif="$pends" num="5" message="Freio"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[6] ?? null" :stat="$prev_r_t_e_c->item6 ?? null" :justif="$pends" num="6" message="Redutor"/>

                        <section id="trole" class="element">
                            TALHA - Capacidade: {{$equip->capacidade}} kg
                        </section>
                        <x-item-status :report="$report->id ?? null" :important="$imp[7] ?? null" :stat="$prev_r_t_e_c->item7 ?? null" :justif="$pends" num="7" message="Guia da corrente"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[8] ?? null" :stat="$prev_r_t_e_c->item8 ?? null" :justif="$pends" num="8" message="Batedor stop"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[9] ?? null" :stat="$prev_r_t_e_c->item9 ?? null" :justif="$pends" num="9" message="Armazenador de corrente"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[10] ?? null" :stat="$prev_r_t_e_c->item10 ?? null" :justif="$pends" num="10" message="Fixação superior"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[11] ?? null" :stat="$prev_r_t_e_c->item11 ?? null" :justif="$pends" num="11" message="Fricção"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[12] ?? null" :stat="$prev_r_t_e_c->item12 ?? null" :justif="$pends" num="12" message="Freio (regular se necessário)"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[13] ?? null" :stat="$prev_r_t_e_c->item13 ?? null" :justif="$pends" num="13" message="Lubrificação"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[14] ?? null" :stat="$prev_r_t_e_c->item14 ?? null" :justif="$pends" num="14" message="Carcaça"/>

                        <section class="item">
                            <section class="ask">
                                <div class="lab"><label for="id15">15-Teste de carga (kg)</label></div>
                                <div class="opt">
                                    <input style="width: 65px;" min="0" type="number" name="txt15" id="id15" value="{{$prev_r_t_e_c->item15 ?? ''}}">
                                </div>
                            </section>
                        </section>

                        <section id="trole" class="element">
                            REDUTOR
                        </section>
                        <x-item-status :report="$report->id ?? null" :important="$imp[16] ?? null" :stat="$prev_r_t_e_c->item16 ?? null" :justif="$pends" num="16" message="Vazamento ( retentores, juntas e bujões )"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[17] ?? null" :stat="$prev_r_t_e_c->item17 ?? null" :justif="$pends" num="17" message="Nível de óleo (completar se necessário)"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[18] ?? null" :stat="$prev_r_t_e_c->item18 ?? null" :justif="$pends" num="18" message="Ruídos e aquecimento anormal"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[19] ?? null" :stat="$prev_r_t_e_c->item19 ?? null" :justif="$pends" num="19" message="Reapertar parafusos de fixação"/>

                        <section id="trole" class="element">
                            CORRENTE
                        </section>
                        <x-item-status :report="$report->id ?? null" :important="$imp[20] ?? null" :stat="$prev_r_t_e_c->item20 ?? null" :justif="$pends" num="20" message="Limpeza e lubrificação da corrente"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[21] ?? null" :stat="$prev_r_t_e_c->item21 ?? null" :justif="$pends" num="21" message="Corrente prende, salta ou produz ruído"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[22] ?? null" :stat="$prev_r_t_e_c->item22 ?? null" :justif="$pends" num="22" message="Amassamentos, estrias, fissuras, respingos de solda, corrosão ou deformação elo a elo"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[23] ?? null" :stat="$prev_r_t_e_c->item23 ?? null" :justif="$pends" num="23" message="Montagem (verificar se a corrente não está torcida ou com a posição da solda invertida)"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[24] ?? null" :stat="$prev_r_t_e_c->item24 ?? null" :justif="$pends" num="24" message="Pino de fixação (substituir no caso de qualquer imperfeição visível)"/>

                        <section id="trole" class="element">
                            BLOCO INFERIOR - Capacidade: {{$equip->capacidade}} kg
                        </section>
                    
                        <x-item-status :report="$report->id ?? null" :important="$imp[25] ?? null" :stat="$prev_r_t_e_c->item25 ?? null" :justif="$pends" num="25" message="Caixa do gancho"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[26] ?? null" :stat="$prev_r_t_e_c->item26 ?? null" :justif="$pends" num="26" message="Carretel e rolamentos"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[27] ?? null" :stat="$prev_r_t_e_c->item27 ?? null" :justif="$pends" num="27" message="Carcaça quanto à desgastes e trincas"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[28] ?? null" :stat="$prev_r_t_e_c->item28 ?? null" :justif="$pends" num="28" message="Trava de gancho"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[29] ?? null" :stat="$prev_r_t_e_c->item29 ?? null" :justif="$pends" num="29" message="Placa de identificação"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[30] ?? null" :stat="$prev_r_t_e_c->item30 ?? null" :justif="$pends" num="30" message="Lubrificar caixa de gancho"/>

                        <section id="trole" class="element">
                            MEDIÇÕES DA CORRENTE DE CARGA (mm)
                        </section>

                        <section class="item">
                            <table class="med" style="height: 100px;">
                                <tr>
                                    <th style="width: 60%;">NORMA NBR 1292/1990</th>
                                    <th style="width: 15%;">Nom.</th>
                                    <th style="width: 15%">Lim.</th>
                                    <th>Med.</th>
                                </tr>
                                <tr>
                                    <td>31-Along. - Med. 11 elos</td>
                                    <td id="nom11elos">{{$model->nom_elos ?? ''}}</td>
                                    <td id="max11elos">{{$model->max_elos ?? ''}}</td>
                                    <td><input onchange="limitMed('nom11elos', 'max11elos', 'med11elos')" class="medido" min="0" step="0.1" type="number" name="txt31" id="med11elos" value="{{$prev_r_t_e_c->item31 ?? ''}}"></td>
                                </tr>
                                <tr>
                                    <td>32-Diâmetro médio elo</td>
                                    <td id="nomElo">{{$model->nom_elo ?? ''}}</td>
                                    <td id="minElo">{{$model->min_elo ?? ''}}</td>
                                    <td><input onchange="limitMed('nomElo', 'minElo', 'medElo')" class="medido" step="0.1" min="0" type="number" name="txt32" id="medElo" value="{{$prev_r_t_e_c->item32 ?? ''}}"></td>
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
                                    <th style="width: 15%;">Nom.</th>
                                    <th style="width: 15%;">Lim.</th>
                                    <th>Med.</th>
                                </tr>
                                <tr>
                                    <td rowspan="3"><img src="{{asset('assets/img/gancho.jpg')}}" alt="figura do gancho" width="80px"></td>
                                    <td>33-Med. W1</td>
                                    <td id="nomW1">{{$model->nom_w1 ?? ''}}</td>
                                    <td id="maxW1">{{$model->max_w1 ?? ''}}</td>
                                    <td><input onchange="limitMed('nomW1', 'maxW1', 'medW1')" class="medido" min="0" step="0.1" type="number" name="txt33" id="medW1" value="{{$prev_r_t_e_c->item33 ?? ''}}"></td>
                                </tr>
                                <tr>
                                    <td>34-Med. Y</td>
                                    <td id="nomY">{{$model->nom_y ?? ''}}</td>
                                    <td id="minY">{{$model->min_y ?? ''}}</td>
                                    <td><input onchange="limitMed('nomY', 'minY', 'medY')" class="medido" step="0.1" min="0" type="number" name="txt34" id="medY" value="{{$prev_r_t_e_c->item34 ?? ''}}"></td>
                                </tr>
                                <tr>
                                    <td>35-Alinham.</td>
                                    <td>
                                        <label for="35_Ok">Ok </label><input type="radio" name="txt35" id="35_Ok" value="Ok (alinhado)">
                                    </td>
                                    <td colspan="2">
                                        <label for="35_T">Trocar</label><input type="radio" name="txt35" id="35_T" value="Substituir (desalinhado)">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="txtContadorApto" id="contApto" value="{{$num_imp ?? 0}}">
                        </section>

                        <section id="insp" class="insp">
                            INSPEÇÃO ELÉTRICA
                        </section>

                        <section id="trole" class="element">
                            TALHA
                        </section>
                        <x-item-status :report="$report->id ?? null" :important="$imp[36] ?? null" :stat="$prev_r_t_e_c->item36 ?? null" :justif="$pends" num="36" message="Fixação do painel, tampa e limpeza"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[37] ?? null" :stat="$prev_r_t_e_c->item37 ?? null" :justif="$pends" num="37" message="Chave geral, fusíveis e disjuntores"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[38] ?? null" :stat="$prev_r_t_e_c->item38 ?? null" :justif="$pends" num="38" message="Motores (medições e aquecimento)"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[39] ?? null" :stat="$prev_r_t_e_c->item39 ?? null" :justif="$pends" num="39" message="Caixa de ligação"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[40] ?? null" :stat="$prev_r_t_e_c->item40 ?? null" :justif="$pends" num="40" message="Cabo de alimentação"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[41] ?? null" :stat="$prev_r_t_e_c->item41 ?? null" :justif="$pends" num="41" message="Prensa cabos"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[42] ?? null" :stat="$prev_r_t_e_c->item42 ?? null" :justif="$pends" num="42" message="Tomadas de engate rápido"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[43] ?? null" :stat="$prev_r_t_e_c->item43 ?? null" :justif="$pends" num="43" message="Contatores e contatos"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[44] ?? null" :stat="$prev_r_t_e_c->item44 ?? null" :justif="$pends" num="44" message="Trafos de potência e comando"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[45] ?? null" :stat="$prev_r_t_e_c->item45 ?? null" :justif="$pends" num="45" message="Bornes e terminais"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[46] ?? null" :stat="$prev_r_t_e_c->item46 ?? null" :justif="$pends" num="46" message="Banco de resistências"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[47] ?? null" :stat="$prev_r_t_e_c->item47 ?? null" :justif="$pends" num="47" message="Célula de carga"/>
                        
                        <section id="trole" class="element">
                            BOTOEIRA
                        </section>
                    
                        <x-item-status :report="$report->id ?? null" :important="$imp[48] ?? null" :stat="$prev_r_t_e_c->item48 ?? null" :justif="$pends" num="48" message="Funcionamento do botões"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[49] ?? null" :stat="$prev_r_t_e_c->item49 ?? null" :justif="$pends" num="49" message="Cabo elétrico e prensa cabo"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[50] ?? null" :stat="$prev_r_t_e_c->item50 ?? null" :justif="$pends" num="50" message="Cabo de aço de sustentação e fixação"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[51] ?? null" :stat="$prev_r_t_e_c->item51 ?? null" :justif="$pends" num="51" message="Caixa de conexão"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[52] ?? null" :stat="$prev_r_t_e_c->item52 ?? null" :justif="$pends" num="52" message="Carcaça e identificão dos botões"/>

                        <section id="trole" class="element">
                            ELETRIFICAÇÃO TRANSVERSAL
                        </section>

                        <x-item-status :report="$report->id ?? null" :important="$imp[53] ?? null" :stat="$prev_r_t_e_c->item53 ?? null" :justif="$pends" num="53" message="Fixação e conservação dos cabos"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[54] ?? null" :stat="$prev_r_t_e_c->item54 ?? null" :justif="$pends" num="54" message="Estado do perfil, fixações e emendas"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[55] ?? null" :stat="$prev_r_t_e_c->item55 ?? null" :justif="$pends" num="55" message="Carros porta cabos e arrastador"/>

                        <section id="trole" class="element">
                            RÁDIO CONTROLE
                        </section>

                        <x-item-status :report="$report->id ?? null" :important="$imp[56] ?? null" :stat="$prev_r_t_e_c->item56 ?? null" :justif="$pends" num="56" message="Funcionamento e estado do emissor"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[57] ?? null" :stat="$prev_r_t_e_c->item57 ?? null" :justif="$pends" num="57" message="Reaperto de todas as conexões e ligações"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[58] ?? null" :stat="$prev_r_t_e_c->item58 ?? null" :justif="$pends" num="58" message="Estado de conservação da carcaça"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[59] ?? null" :stat="$prev_r_t_e_c->item59 ?? null" :justif="$pends" num="59" message="Estado da bateria / pilhas do emissor"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[60] ?? null" :stat="$prev_r_t_e_c->item60 ?? null" :justif="$pends" num="60" message="Sinais luminosos do receptor e transmissor"/>

                        <section id="trole" class="element">
                            LIMITE DE FIM DE CURSO - Elevação
                        </section>

                        <x-item-status :report="$report->id ?? null" :important="$imp[61] ?? null" :stat="$prev_r_t_e_c->item61 ?? null" :justif="$pends" num="61" message="Funcionamento da chave limite"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[62] ?? null" :stat="$prev_r_t_e_c->item62 ?? null" :justif="$pends" num="62" message="Cabos ou corrente do pino"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[63] ?? null" :stat="$prev_r_t_e_c->item63 ?? null" :justif="$pends" num="63" message="Contatos, molas e articulação"/>
                        
                        <section id="trole" class="element">
                            LIMITE DE FIM DE CURSO - Direção
                        </section>

                        <x-item-status :report="$report->id ?? null" :important="$imp[64] ?? null" :stat="$prev_r_t_e_c->item64 ?? null" :justif="$pends" num="64" message="Funcionamento da chave limite"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[65] ?? null" :stat="$prev_r_t_e_c->item65 ?? null" :justif="$pends" num="65" message="Cabos ou corrente do pino"/>
                        <x-item-status :report="$report->id ?? null" :important="$imp[66] ?? null" :stat="$prev_r_t_e_c->item66 ?? null" :justif="$pends" num="66" message="Contatos, molas e articulação"/>
                        
                        <section id="trole" class="element">
                            MEDIÇÕES DAS GRANDEZAS ELÉTRICAS
                        </section>

                        <section class="item">
                        <table class="med" style="height: 390px;">
                            <thead>
                                <tr>
                                    <th style="width:80%;" colspan="2">VALORES CONSIDERADOS</th>
                                    <th style="width:18%;">Nom.</th>
                                    <th>Med.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:20px;">67-</td>
                                    <td>Tensão de rede (V)</td>
                                    <td>{{$t_e_c->v_rede}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt67" id="id67" value="{{$prev_r_t_e_c->v_rede ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>68-</td>
                                    <td>Tensão de comando (VCA)</td>
                                    <td>{{$t_e_c->v_com}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt68" id="id68" value="{{$prev_r_t_e_c->v_com ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>69-</td>
                                    <td>Banco de resistências (&#8486;)</td>
                                    <td>{{$t_e_c->banc_res}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt69" id="id69" value="{{$prev_r_t_e_c->banc_res ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="5">MOTOR DE DIREÇÃO:</th>
                                </tr>
                                <tr>
                                    <td>70-</td>
                                    <td>Corrente da alta (A)</td>
                                    <td>{{$t_e_c->corr_dir_alta}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt70" id="id70" value="{{$prev_r_t_e_c->corr_dir_alta ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>70-</td>
                                    <td>Corrente da baixa (A)</td>
                                    <td>{{$t_e_c->corr_dir_baixa}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt70_2" id="id70_2" value="{{$prev_r_t_e_c->corr_dir_baixa ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>70-</td>
                                    <td>Tensão do freio (VCC)</td>
                                    <td>{{$t_e_c->v_dir_freio}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt70_3" id="id70_3" value="{{$prev_r_t_e_c->v_dir_freio ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="5" >MOTOR DE ELEVAÇÃO:</th>
                                </tr>
                                <tr>
                                    <td>71-</td>
                                    <td>Corrente da alta (A)</td>
                                    <td>{{$t_e_c->corr_el_alta}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt71" id="id71" value="{{$prev_r_t_e_c->corr_el_alta ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>71-</td>
                                    <td>Corrente da baixa (A)</td>
                                    <td>{{$t_e_c->corr_el_baixa}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt71_2" id="id71_2" value="{{$prev_r_t_e_c->corr_el_baixa ?? ''}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>71-</td>
                                    <td>Tensão freio (VCC)</td>
                                    <td>{{$t_e_c->v_el_freio}}</td>
                                    <td>
                                        <input class="medido" step="0.1" min="0" type="number" name="txt71_3" id="id71_3" value="{{$prev_r_t_e_c->v_el_freio ?? ''}}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </section>

                        <section class="item" style="flex-direction: column;">
                            <div>
                                <strong>OBSERVAÇÕES GERAIS E SERVIÇOS EXECUTADOS: </strong>
                                <textarea name="txtObservacoes" id="observacoes" class='autoExpand' rows='1' data-min-rows='1'>{{$prev_relat_obs ?? ''}}</textarea>
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
                            <div {{$n_apto_hidden ?? "hidden"}} id="nAptoAlert" class="alert alert-danger text-center">EQUIPAMENTO ESTÁ COM {{$num_imp ?? ''}} ÍTENS CRÍTICOS EM CONDIÇÕES RUÍNS, RECOMENDA-SE O BLOQUEIO DO MESMO!!</div>
                            <div>
                                <strong>EQUIPAMENTO APTO PARA OPERAR: </strong>
                            </div>
                            <div >
                                <div onclick="displayoff('secRessalva', 'secApto', 'idressalvas')">
                                    <input type="radio" name="apto" id="apto" value="APTO PARA OPERAR">
                                    <label for="apto">SIM</label>
                                </div>
                                <div onclick="displayoff('secRessalva', 'secApto', 'idressalvas')">
                                    <input {{$n_apto_checked ?? ""}} type="radio" name="apto" id="nApto" value="NÃO APTO PARA OPERAR">
                                    <label for="nApto">NÃO</label>
                                </div>
                                <div onclick="displayon('secRessalva', 'secApto')">
                                    <input type="radio" name="apto" id="aptoCR" value="APTO PARA OPERAR COM RESSALVAS">
                                    <label for="aptoCR">SIM COM RESSALVAS</label>
                                </div>
                            </div>
                            <section id="secRessalva" class="obs">
                                <label for="idressalvas"><strong>RESSALVAS:</strong></label>
                                <textarea name="txtRessalvas" id="idressalvas" class='autoExpand' rows='1' data-min-rows='1' placeholder='Ex.: Elevação apenas com a velocidade baixa.'>{{$prev_relat_ressalva ?? ''}}</textarea>
                            </section>
                        </section>

                        <div id="infoTec1" class="infoTec">
                            <p><b>APONTAMENTO DO TÉCNICO 1</b></p>
                            
                            <div class="itInfTec">
                                <label class="ltec" for="tec1Id">Nome: </label>
                                <select name="txtTec1Id" id="tec1Id" class="itec">
                                    <option value="{{auth()->user()->id}}">
                                        {{auth()->user()->name}} {{auth()->user()->surname}}
                                    </option>
                                    @foreach ($tecs as $tec)
                                        @if (auth()->user()->id != $tec->id)
                                            <option value="{{$tec->id}}">{{$tec->name}} {{$tec->surname}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="itInfTec">
                                <label class="ltec" for="tec1data">Data: </label>
                                <input class="itec" type="date" value="{{ date("Y-m-d") }}" name="txtTec1Data" id="tec1data" max="<?= date("Y-m-d")?>">
                            </div>
                            <div class="itInfTec">
                                <label class="horario" for="tec1HI">H. inicial: </label>
                                <input class="horario" type="time" name="txtTec1HI" id="tec1HI" value="{{ date('h:i', strtotime('-2 hours'))}}">
                                <label class="horario" for="tec1HF" style="margin-left: 5px;">H. final: </label>
                                <input class="horario" type="time" name="txtTec1HF" id="tec1HF" value="{{ date("h:i") }}">
                            </div>

                            <button class="btn btn-outline-primary" id="pen1" href="#" class="signature-button" data-bs-toggle="modal"     data-bs-target="#signature1Modal" style="width: 100%;"><i class="fa fa-pencil" aria-hidden="true"></i>ASSINAR
                            </button>
                        </div>
                        
                        <!-- Modal signature 01-->
                        <div class="modal fade" id="signature1Modal" tabindex="-1" aria-labelledby="signature1ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="signature1ModalLabel">Assinatura do Técnico 01</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body signature">
                                        <canvas height="200" width="320" class="signature-pad" id="canv1"></canvas>
                                        <input type="hidden" name="signTec1" id="idSignTec1">
                                    </div>

                                    <div class="modal-footer">
                                        <a id="okSign1" href="#" class="signature-button" data-bs-dismiss="modal">
                                            <i class="fa fa-check" aria-hidden="true" ></i>Ok
                                        </a>
                                        <a id="clear1" href="#" class="signature-button">
                                            <i class="fa fa-eraser" aria-hidden="true"></i>Apagar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div id="infoTec2" class="infoTec">
                            <p><b>APONTAMENTO DO TÉCNICO 2</b></p>
                            <div class="itInfTec">
                                <label class="ltec" for="tec2Id">Nome: </label>
                                <select name="txtTec2Id" id="tec2Id" class="itec">
                                    @foreach ($tecs as $tec)
                                        @if (auth()->user()->id != $tec->id)
                                            <option value="{{$tec->id}}">{{$tec->name}} {{$tec->surname}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="itInfTec">
                                <label class="ltec" for="tec2data">Data: </label>
                                <input class="itec " type="date" value="{{ date("Y-m-d") }}" name="txtTec2Data" id="tec2data" max="<?= date("Y-m-d")?>">
                            </div>
                            <div class="itInfTec">
                                <label class="horario" for="tec2HI">H. inicial: </label>
                                <input class="horario" type="time" name="txtTec2HI" id="tec2HI" value="{{ date('h:i', strtotime('-2 hours'))}}"
                                >
                                <label class="horario" for="tec2HF" style="margin-left: 5px;">H. final: </label>
                                <input class="horario" type="time" name="txtTec2HF" id="tec2HF" value="{{ date("h:i") }}"
                                >
                            </div>
                            
                            <button class="btn btn-outline-primary" id="pen2" href="#" class="signature-button" data-bs-toggle="modal" data-bs-target="#signature2Modal" style="width: 100%;"><i class="fa fa-pencil" aria-hidden="true"></i>ASSINAR
                            </button>
                           
                        </div>
                        
                        <!-- Modal signature 02-->
                        <div class="modal fade" id="signature2Modal" tabindex="-1" aria-labelledby="signature2ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="signature2ModalLabel">Assinatura do Técnico 02</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body signature">
                                        <canvas height="200" width="320" class="signature-pad" id="canv2" aria-placeholder="assine aqui"></canvas>
                                        <input type="hidden" name="signTec2" id="idSignTec2">
                                    </div>

                                    <div class="modal-footer">
                                    <a id="okSign2" href="#" class="signature-button" data-bs-dismiss="modal"><i class="fa fa-check" aria-hidden="true"></i>Ok </a>
                                    <a id="clear2" href="#" class="signature-button"><i class="fa fa-eraser" aria-hidden="true"></i>Apagar </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Button trigger confirm modal -->
                        <button id="confirm_button" onclick="limitDate('tec2data','tec2HI','tec2HF'),limitDate('tec1data','tec1HI','tec1HF'),requiredItem()" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#confirmModal" style="width: 100%;">
                            CONFIRMA
                        </button>
                        
                        <!-- Confirm Modal -->
                        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="confirmModalLabel">Concluir inspeção?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body mx-2">
                                <p>Atenção!<br> <span id="reqItem"></span> Após a confirmação, os dados deste relatório serão salvos e não poderão ser alterados posteriormente!</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                <button onclick="limitDate('tec2data','tec2HI','tec2HF'),limitDate('tec1data','tec1HI','tec1HF'),requiredItem()" id="submit_button" type="submit" class="btn btn-primary mb-2" data-bs-dismiss="modal">Ok</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        

                        
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

