@extends('layouts.relat_layout')

@section('content')
<section id="relatorio">
    @include('r_header')
    <div class="main">
        <section id="mecanica" class="half">
            <table>
                <tr><th colspan="3">INSPEÇÃO MECÂNICA</th></tr>
                <tr><th colspan="2">TROLE</th><th style="width: 20%;">500 kg</th></tr>
                <x-report-element num="1" :descriptions='[
                    "Rodas e rolamentos",
                    "Fixação da talha e parafusos de fechamento",
                    "Batentes fim de curso",
                    "Motor (não aplica)",
                    "Freio (não aplica)",
                    "Redutor (não aplica)"
                ]'/>
                <tr><th colspan="2">TALHA</th><th>500 kg</th></tr>
                <x-report-element num="7" :descriptions='[
                    "Guia da corrente",
                    "Batedor stop",
                    "Armazenador de corrente",
                    "Fixação superior",
                    "Fricção",
                    "Freio (regular se necessário)",
                    "Lubrificação",
                    "Carcaça",
                    "Teste de carga (kg)"
                ]'/>
                
                <tr><th colspan="2">REDUTOR</th><th></th></tr>
                <x-report-element num="16" :descriptions='[
                    "Vazamento de óleo ( retentores, juntas e bujões )",
                    "Nível de óleo (completar se necessário)",
                    "Ruídos e aquecimento anormal",
                    "Reapertar parafusos de fixação"
                ]'/>
                <tr><th colspan="2">CORRENTE DE CARGA</th><th></th></tr>
                <x-report-element num="20" :descriptions='[
                    "Limpeza e lubrificação da corrente",
                    "Corrente prende, salta ou produz ruído",
                    "Amassamentos, estrias, fissuras, respingos de solda, corrosão ou deformação",
                    "Montagem (não está torcida ou com a solda invertida)",
                    "Pino da corrente (se houver fissura, deformação ou desgaste visível, o mesmo deve ser substituido)"
                ]'/>
                <tr><th colspan="2" style="padding-top: 1px;">BLOCO INFERIOR</th><th>500 kg</th></tr>
                <x-report-element num="25" :descriptions='[
                    "Caixa do gancho",
                    "Carretel e rolamentos",
                    "Carcaça quanto à desgastes e trincas",
                    "Trava de gancho",
                    "Placa de identificação",
                    "Lubrificar caixa de gancho"
                ]'/>
            </table>
            
            <table>
        
                <tr><th colspan="6">MEDIÇÕES DA CORRENTE DE CARGA (mm)</th></tr>
                <tr>
                    <th colspan="3" rowspan="2" style="width: 55%;">NORMA TÉCNICA <br> NBR 1292/1990</th>
                    <th colspan="3">Medidas conforme a norma</th>
                </tr>
                <tr><th>Nominal</th><th>Máximo</th><th>Medido</th></tr>
        
                <tr>
                    <td style="width: 5%;">31</td><td colspan="2">Alongamento - Medida de 11 elos</td>
                    <td>177.8</td><td>180.3</td><td>{{$tec1name}}</td>
                </tr>
                <tr><td>32</td><td colspan="2">Medida DM-Diâmetro médio do elo</td><td>7.4</td><td>6.7</td><td>{{$tec1name}}</td></tr>
        
                <tr><th colspan="6">MEDIÇÕES DO GANCHO INFERIOR (mm)</th></tr>
                <tr>
                    <th rowspan="2">--</th>
                    <td rowspan="5" style="width: 19%;">
                        <img src="gancho.jpg" alt="figura do gancho" width="60px">
                    </td>
                    <th rowspan="2">NORMA TÉCNICA <br> NBR 10070/1987</th>
                    <th colspan="3">Medidas conforme a norma</th>
                </tr>
                <tr><th>Nominal</th><th>Máximo</th><th>Medido</th></tr>
        
                <tr>
                    <td>33</td>
                    <td>Medida W1</td><td>41</td><td>45.1</td><td>{{$tec1name}}</td>
                </tr>
                <tr><td>34</td><td>Medida Y</td><td>28</td><td>23.6</td><td>{{$tec1name}}</td></tr>
                <tr><td>35</td><td>Alinhamento</td><td colspan="3"><?= $_POST['txt35'] ?? "Não insp."?></td></tr>
            </table>
        </section>
        <section id="eletrica" class="half">
            <table>
                <tr><th colspan="3">INSPEÇÃO ELÉTRICA</th><tr>
                <tr><th colspan="2">TALHA</th><th style="width: 20%;"></th></tr>
                <x-report-element num="36" :descriptions='[
                    "Fixação do painel, tampa e limpeza",
                    "Chave geral, fusíveis e disjuntores",
                    "Motores (medições e aquecimento)",
                    "Caixa de ligação",
                    "Cabo de alimentação",
                    "Prensa cabos",
                    "Tomadas de engate rápido",
                    "Contatores e contatos",
                    "Trafos de potência e comando",
                    "Bornes e terminais",
                    "Banco de resistência (não aplica)",
                    "Célula de carga (não aplica)"
                ]'/>
                <tr><th colspan="2">BOTOEIRA</th><th></th></tr>
                <x-report-element num="48" :descriptions='[
                    "Funcionamento do botões",
                    "Cabo elétrico e prensa cabo",
                    "Cabo de aço de sustentação e fixação",
                    "Caixa de conexão",
                    "Carcaça e identificão dos botões"
                ]'/>
                <tr><th colspan="2">ELETRIFICAÇÃO TRANSVERSAL</th><th></th></tr>
                <x-report-element num="53" :descriptions='[
                    "Fixação e conservação dos cabos",
                    "Fixações e emendas do perfil da eletrificação",
                    "Carros porta cabos e arrastador"
                ]'/>
                <tr><th colspan="2">RÁDIO CONTROLE</th><th></th></tr>
                <x-report-element num="56" :descriptions='[
                    "Funcionamento e estado dos botões do emissor",
                    "Reaperto de todas as conexões e ligações",
                    "Estado de conservação da carcaça do rádio",
                    "Estado da bateria / pilhas do emissor",
                    "Sinais luminosos do receptor e transmissor"
                ]'/>
                <tr><th colspan="2">LIMITE DE FIM DE CURSO - Elevação</th><th></th></tr>
                <x-report-element num="61" :descriptions='[
                    "Funcionamento da chave limite",
                    "Cabos ou corrente do pino",
                    "Contatos, molas e articulação"
                ]'/>
                <tr><th colspan="2">LIMITE DE FIM DE CURSO - Direção</th><th></th></tr>
                <x-report-element num="64" :descriptions='[
                    "Funcionamento da chave limite",
                    "Cabos ou corrente do pino",
                    "Contatos, molas e articulação"
                ]'/>
            </table>
            <table>
                <tr><th colspan="5">MEDIÇÕES DAS GRANDEZAS ELÉTRICAS</th></tr>
                <tr><th colspan="3">VALORES CONSIDERADOS</th><th>Nominal</th><th>Medido</th></tr>
                <tr><td>67</td><td colspan="2">Tensão de rede (V)</td><td>440</td><td>{{$tec1name}}</td></tr>
                <tr><td>68</td><td colspan="2">Tensão do transformador de comando (VCA)</td><td>24</td><td>{{$tec1name}}</td></tr>
                <tr><td>69</td><td colspan="2">Medição do banco de resistências (Ohms)</td><td>Ñ aplica</td><td><?= $_POST['txt69'] ?? "Não insp."?></td></tr>
                <tr><td rowspan="3">70</td><th rowspan="3">MOTOR DE <br> DIREÇÃO</th><td>Corrente da alta (A)</td><td>1.0</td><td>{{$tec1name}}</td></tr>
                <tr><td>Corrente da baixa (A)</td><td>1.0</td><td>{{$tec1name}}</td></tr>
                <tr><td>Tensão do freio (VCC)</td><td>Ñ Insp.</td><td><?= $_POST['txt70_3'] ?? "Não insp."?></td></tr>
                <tr><td rowspan="3">71</td><th rowspan="3">MOTOR DE <br> ELEVAÇÃO</th><td>Corrente da alta (A)</td><td>1.8</td><td>{{$tec1name}}</td></tr>
                <tr><td>Corrente da baixa (A)</td><td>2.8</td><td>{{$tec1name}}</td></tr>
                <tr><td>Tensão do freio (VCC)</td><td>Ñ Insp.</td><td>{{$tec1name}}</td></tr>
        
            </table>
        </section>
    </div>

    <section id="status">
        <div id="status1">STATUS FINAL DA INSPEÇÃO: <?= $_POST['status'] ?? "RESTAM PENDÊNCIAS"?>!</div>
        <div id="status2">STATUS DO EQUIPAMENTO : <?= $_POST['apto'] ?? "NÃO APTO PARA OPERAR"?>!</div>
    </section>
    <section id="ressalvas">
        <strong>Ressalvas:</strong>{{$tec1name}}
    </section>
    <?php require ("r_footer.php")?>
    <section id="verso">
        <?php require ("r_header.php")?>
        <table id="tabVerso" class="z">
            <tr>
                <th colspan="4">Relação de pendências do equipamento:</th>
            </tr>
            <tr>
                <th>Ítem</th><th style="width: 620px;">Descrição</th><th>R.I.</th><th>Data</th>
            </tr>
            <?php require ("r_pend.php");?>
        <tr>
            <th colspan="4">Observações gerais e serviços executados durante a inspeção:</th>
        </tr>
        </table>
        <div id="versoObs">
                <p>
                    {{$tec1name}}
                </p>
        </div>
        <?php require ("r_footer.php")?>
    </section>
</section>
@endsection