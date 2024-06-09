<table style="margin-bottom: 100px;">
    <tr>
        <th>Assinatura do cliente.</th>
        <th colspan="6">Apontamento de Horas e relação dos técnicos</th>
    </tr>
    <tr>
        <td rowspan="5" style="width: 150px;"></td>
    </tr>
    <tr>
        <td>Nome: {{$r->n_tec1 ?? '----------------------'}}</td>
        <td style="width: 150px;" rowspan="4">
            <img src={{$r->sign_tec1}} alt="imagem" width="100%">
        </td>
        <td>Nome: {{$r->n_tec2 ?? '----------------------'}}</td>
        <td style="width: 150px;" rowspan="4">
            <img src={{$r->sign_tec2}} alt="imagem" width="100%">
        </td>
    </tr>
    <tr>
        <td>Função: {{$r->f_tec1 ?? '--------------------'}}</td>
        <td>Função: {{$r->f_tec2 ?? '--------------------'}}</td>
    </tr>
    <tr>
        <td>Data: {{$r->d_tec1 ?? '------------------------'}}</td>
        <td>Data: {{$r->d_tec2 ?? '------------------------'}}</td>
    </tr>
    <tr>
        <td>Início: {{$r->h_i_tec1 ?? '----'}} h / Final: {{$r->h_f_tec1 ?? '----'}} h</td>
        <td>Início: {{$r->h_i_tec2 ?? '----'}} h / Final: {{$r->h_f_tec2 ?? '----'}} h</td>
    </tr>
</table>