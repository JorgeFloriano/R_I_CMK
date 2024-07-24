<?php
    $contpend = 0;
    foreach ($js as $j) {
        if (!isset($j->solucao) || $j->solucao == '') {
            $contpend++;
            $class = "";
            if (in_array($j->num_item, $important_itens)) {
                $class = "light-bad";
            }
            echo "<tr>
            <td class='".$class."'' >".$j->num_item."</td>
            <td>".$j->descricao."</td>
            <td>".$j->created_r_i."</td>
            <td>".date('d/m/Y',strtotime($j->created_at))."</td></tr>
            <tr><td colspan='4'><img src=".asset('storage/pend_photos/img_report'.$r->id.'_item'.$j->num_item.'.jpg')." width='100%'></td></tr>";
        } else {
            $contpend++;
            echo "<tr>
            <td>".$j->num_item."</td>
            <td>".$j->descricao." (pendência foi solucionada - ".$j->solucao.")</td>
            <td>".$j->created_r_i."</td>
            <td>".date('d/m/Y',strtotime($j->created_at))."</td></tr>";
        }
    }
    $linvaz = 21 - $contpend;
    for ($i=1;$i<$linvaz;$i++) {
        echo "<tr><td>---</td>
        <td> </td>
        <td>---</td><td>---</td></tr>";
    }
?>
