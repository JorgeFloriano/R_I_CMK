<table style="margin-bottom: 100px;">
    <tr>
        <th>Assinatura do cliente.</th>
        <th colspan="6">Apontamento de Horas e relação dos técnicos</th>
    </tr>
    <tr>
        <td rowspan="5" style="width: 150px;"></td>
    </tr>
    <tr>
        <td>Nome:{{$r['n_tec1']}}</td>
        <td style="width: 150px;" rowspan="4">
            <img src={{$r['sign_tec1']}} alt="imagem" width="100%">
        </td>
        <td>Nome:{{$r['n_tec2']}}</td>
        <td style="width: 150px;" rowspan="4">
            <img src={{$r['sign_tec2']}} alt="imagem" width="100%">
        </td>
    </tr>
    <tr><td>Função:{{$e->id}}</td><td>Função:{{$e->id}}</td></tr>
    <tr><td>Data:{{$e->id}}</td><td>Data:{{$e->id}}</td></tr>
    <tr><td>Início:{{$e->id}}h / Final:{{$e->id}}h</td><td>Início:{{$e->id}}h / Final:{{$e->id}}h</td></tr>
</table>