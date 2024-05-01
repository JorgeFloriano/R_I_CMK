<div class="header">
    <div id="h">
        <div id="header1">
            <img src="{{asset('assets/img/logo_cmk.jpg')}}" alt="logo cmk" width="80px">
        </div>
        <div id="header2">
            <div>INSTRUÇÃO DE INSPEÇÃO</div>
            <div>TALHA ELÉTRICA DE CORRENTE</div>
        </div>
        <div id="header3">
            RI Nº 000
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Cliente: CNH</th><th>Unidade: Sorocaba</th><th>Solicitante: Lucas Moraes</th><th>Nº Serie: {{$e->n_serie}}</th><th>Nº Cliente: CNH-{{$e->n_cliente}}</th><th>Nº CMK: {{$e->id}}</th>
            </tr>
            <tr>
                <th>Fabricante: {{$e->fabricante}}</th><th>Modelo: {{$e->modelo}}</th><th>Capacidade: {{$e->capacidade}} kg</th><th>Prédio: {{$e->predio}}</th><th>Setor: {{$e->setor}}</th><th>Área : {{$e->area}}</th>
            </tr>
        </thead>
    </table>
</div>