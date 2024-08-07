@extends('layouts.relat_layout')

@section('content')

<style media="print">
    #buttonGroup {
        display: none;
    }
</style>

<section id="relatorio">
    @include('relat_parts/r_header')
    <div class="main">
        <section id="mecanica" class="half">
            <table>
                <tr><th colspan="3">INSPEÇÃO MECÂNICA</th></tr>
                <tr><th colspan="3">TROLE - {{$e->capacidade}} kg</th></tr>
                <x-report-element :relat="$rt" num="1" :descriptions='[
                    "Rodas e rolamentos",
                    "Fixação da talha e parafusos de fechamento",
                    "Batentes fim de curso",
                    "Motor",
                    "Freio",
                    "Redutor"
                ]'/>
                <tr><th colspan="3">TALHA - {{$e->capacidade}} kg</th></tr>
                <x-report-element :relat="$rt" num="7" :descriptions='[
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
                
                <tr><th colspan="3">REDUTOR</th></tr>
                <x-report-element :relat="$rt" num="16" :descriptions='[
                    "Vazamento de óleo ( retentores, juntas e bujões )",
                    "Nível de óleo (completar se necessário)",
                    "Ruídos e aquecimento anormal",
                    "Reapertar parafusos de fixação"
                ]'/>
                <tr><th colspan="3" style="padding-top: 1px;">CORRENTE DE CARGA</th></tr>
                <x-report-element :relat="$rt" num="20" :descriptions='[
                    "Limpeza e lubrificação da corrente",
                    "Corrente prende, salta ou produz ruído",
                    "Amassamentos, estrias, fissuras, respingos de solda, corrosão ou deformação",
                    "Montagem (não está torcida ou com a solda invertida)",
                    "Pino da corrente (se houver fissura, deformação ou desgaste visível, o mesmo deve ser substituido)"
                ]'/>
                <tr><th colspan="3" style="padding-top: 1px;">BLOCO INFERIOR - {{$e->capacidade}} kg</th></tr>
                <x-report-element :relat="$rt" num="25" :descriptions='[
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
                    <td>{{$model->nom_elos}}</td><td>{{$model->max_elos}}</td><td>{{$rt['item31']}}</td>
                </tr>
                <tr><td>32</td><td colspan="2">Medida DM-Diâmetro médio do elo</td><td>{{$model->nom_elo}}</td><td>{{$model->min_elo}}</td><td>{{$rt['item32']}}</td></tr>
        
                <tr><th colspan="6">MEDIÇÕES DO GANCHO INFERIOR (mm)</th></tr>
                <tr>
                    <th rowspan="2">--</th>
                    <td rowspan="5" style="width: 19%;border: none">
                        <img src="{{asset('assets/img/gancho.jpg')}}" alt="figura do gancho" width="60px">
                    </td>
                    <th rowspan="2">NORMA TÉCNICA <br> NBR 10070/1987</th>
                    <th colspan="3">Medidas conforme a norma</th>
                </tr>
                <tr><th>Nominal</th><th>Máximo</th><th>Medido</th></tr>
        
                <tr>
                    <td>33</td>
                    <td>Medida W1</td><td>{{$model->nom_w1}}</td><td>{{$model->max_w1}}</td><td>{{$rt['item33']}}</td>
                </tr>
                <tr><td>34</td><td>Medida Y</td><td>{{$model->nom_y}}</td><td>{{$model->min_y}}</td><td>{{$rt['item34']}}</td></tr>
                <tr><td>35</td><td>Alinhamento</td><td colspan="3">{{$rt['item35']}}</td></tr>
            </table>
        </section>
        <section id="eletrica" class="half">
            <table>
                <tr><th colspan="3">INSPEÇÃO ELÉTRICA</th><tr>
                <tr><th colspan="3">TALHA</th></tr>
                <x-report-element :relat="$rt" num="36" :descriptions='[
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
                    "Banco de resistência",
                    "Célula de carga"
                ]'/>
                <tr><th colspan="3">BOTOEIRA</th></tr>
                <x-report-element :relat="$rt" num="48" :descriptions='[
                    "Funcionamento do botões",
                    "Cabo elétrico e prensa cabo",
                    "Cabo de aço de sustentação e fixação",
                    "Caixa de conexão",
                    "Carcaça e identificão dos botões"
                ]'/>
                <tr><th colspan="3">ELETRIFICAÇÃO TRANSVERSAL</th></tr>
                <x-report-element :relat="$rt" num="53" :descriptions='[
                    "Fixação e conservação dos cabos",
                    "Fixações e emendas do perfil da eletrificação",
                    "Carros porta cabos e arrastador"
                ]'/>
                <tr><th colspan="3">RÁDIO CONTROLE</th></tr>
                <x-report-element :relat="$rt" num="56" :descriptions='[
                    "Funcionamento e estado dos botões do emissor",
                    "Reaperto de todas as conexões e ligações",
                    "Estado de conservação da carcaça do rádio",
                    "Estado da bateria / pilhas do emissor",
                    "Sinais luminosos do receptor e transmissor"
                ]'/>
                <tr><th colspan="3">LIMITE DE FIM DE CURSO - Elevação</th></tr>
                <x-report-element :relat="$rt" num="61" :descriptions='[
                    "Funcionamento da chave limite",
                    "Cabos ou corrente do pino",
                    "Contatos, molas e articulação"
                ]'/>
                <tr><th colspan="3">LIMITE DE FIM DE CURSO - Direção</th></tr>
                <x-report-element :relat="$rt" num="64" :descriptions='[
                    "Funcionamento da chave limite",
                    "Cabos ou corrente do pino",
                    "Contatos, molas e articulação"
                ]'/>
            </table>
            <table>
                <tr><th colspan="5">MEDIÇÕES DAS GRANDEZAS ELÉTRICAS</th></tr>
                <tr><th colspan="3">VALORES CONSIDERADOS</th><th>Nominal</th><th>Medido</th></tr>
                <tr><td>67</td><td colspan="2">Tensão de rede (V)</td><td>{{$t->v_rede}}</td><td>{{$rt['v_rede']}}</td></tr>
                <tr><td>68</td><td colspan="2">Tensão do transformador de comando (VCA)</td><td>{{$t->v_com}}</td><td>{{$rt['v_com']}}</td></tr>
                <tr><td>69</td><td colspan="2">Medição do banco de resistências (Ohms)</td><td>{{$t->banc_res}}</td><td>{{$rt['banc_res'] ?? "Não insp."}}</td></tr>
                <tr><td rowspan="3">70</td><th rowspan="3">MOTOR DE <br> DIREÇÃO</th><td>Corrente da alta (A)</td><td>{{$t->corr_dir_alta}}</td><td>{{$rt['corr_dir_alta']}}</td></tr>
                <tr><td>Corrente da baixa (A)</td><td>{{$t->corr_dir_baixa}}</td><td>{{$rt['corr_dir_baixa']}}</td></tr>
                <tr><td>Tensão do freio (VCC)</td><td>{{$t->v_dir_freio}}</td><td>{{$rt['v_dir_freio'] ?? "Não insp."}}</td></tr>
                <tr><td rowspan="3">71</td><th rowspan="3">MOTOR DE <br> ELEVAÇÃO</th><td>Corrente da alta (A)</td><td>{{$t->corr_el_alta}}</td><td>{{$rt['corr_el_alta']}}</td></tr>
                <tr><td>Corrente da baixa (A)</td><td>{{$t->corr_el_baixa}}</td><td>{{$rt['corr_el_baixa']}}</td></tr>
                <tr><td>Tensão do freio (VCC)</td><td>{{$t->v_el_freio}}</td><td>{{$rt['v_el_freio']}}</td></tr>
            </table>
        </section>
        <section id="status">
            <div id="status1" class="{{$insp_stat}}">STATUS FINAL DA INSPEÇÃO: {{$r->stat_insp ?? "RESTAM PENDÊNCIAS"}}!</div>
            <div id="status2" class="{{$equip_stat}}">STATUS DO EQUIPAMENTO :{{ $r->stat_equip ?? "NÃO APTO PARA OPERAR"}}!</div>
        </section>
        <section id="ressalvas">
            <strong>RESSALVAS: {{$r->ressalva ?? 'Sem ressalvas!'}}</strong>
        </section>
        @include('relat_parts/r_footer')
    </div>

    <section id="verso">
        @include('relat_parts/r_header')
        
        <div id="pendencias">
            @include('relat_parts/r_pend')
        </div>
            
        <div id="versoObs">
            <p>
                {{$r->obs ?? 'Sem observações!'}}
            </p>
        </div>
        @include('relat_parts/r_footer')
    </section>
</section>
<div id="buttonGroup">
    <button id="btnPdf" class="btn btn-info">BAIXAR PDF</button>
    <a href="{{route('relatorios')}}" class="btn btn-secondary ms-2">VOLTAR</a>
</div>
@endsection