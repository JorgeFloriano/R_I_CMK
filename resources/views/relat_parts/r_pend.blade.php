<div class="row m-0">
    <div class="col-4 pends">
        <img src={{asset('storage/pend_photos/img_report'.$r->id.'_item17.jpg')}} width='100%' alt="Sem imagem para exibir.">
        teste 01
    </div>
    <div class="col-4 pends">
        <img src={{asset('assets/img/logo_cmk.jpg')}} width='100%' alt="Sem imagem para exibir.">
        teste 02
    </div>
    <div class="col-4 pends">
        <img src={{asset('storage/pend_photos/img_report'.$r->id.'_item17.jpg')}} width='100%' alt="Sem imagem para exibir.">
        teste 01
    </div>
</div>

{{-- <table id="tabVerso" class="z">
    <tr>
        <th colspan="5">Relação de pendências do equipamento:</th>
    </tr>
    <tr>
        <th>Ítem</th>
        <th style="width: 400px;">Descrição</th>
        <th style="width: 200px;">Imagem</th>
        <th>R.I.</th>
        <th>Data</th>
    </tr>
    <?php
        $contpend = 0;
        foreach ($js as $j) {
            if (!isset($j->solucao) || $j->solucao == '') {
                $contpend++;
                $class = "";
                if (in_array($j->num_item, $important_itens)) {
                    $class = "light-bad";
                } ?>
                <tr>
                    <td class="{{$class}}">{{$j->num_item}}</td>
                    <td>{{$j->descricao}}</td>
                    <td>
                        <img src={{asset('storage/pend_photos/img_report'.$r->id.'_item'.$j->num_item.'.jpg')}} width='100%' alt="Sem imagem para exibir.">
                    </td>
                    <td>{{$j->created_r_i}}</td>
                    <td>{{date('d/m/Y',strtotime($j->created_at))}}</td>
                </tr>
                
            <?php } else {
                $contpend++; ?>
                <tr>
                    <td>{{$j->num_item}}</td>
                    <td>{{$j->descricao}} (pendência foi solucionada - {{$j->solucao}})</td>
                    <td>
                        <img src={{asset('storage/pend_photos/img_report'.$r->id.'_item'.$j->num_item.'.jpg')}} width='100%' alt="Sem imagem para exibir.">
                    </td>
                    <td>{{$j->created_r_i}}</td>
                    <td>{{date('d/m/Y',strtotime($j->created_at))}}</td>
                </tr>
            <?php }
        }
        $linvaz = 21 - $contpend;
        for ($i=1;$i<$linvaz;$i++) { ?>
            <tr>
                <td>---</td>
                <td>-----</td>
                <td>-----</td>
                <td>---</td>
                <td>---</td>
            </tr>
        <?php }
    ?>
    <tr>
        <th colspan="5">Observações gerais e serviços executados durante a inspeção:</th>
    </tr>
</table>
 --}}
