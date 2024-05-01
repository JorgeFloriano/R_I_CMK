<?php
    $contpend = 0;
    foreach ($js as $j) {
        $contpend++;
        echo "<tr>
            <td>".$j->num_item."</td>
            <td>".$j->descricao. "</td>
            <td>".$j->relatorio_id."</td>
            <td>".date("d/m/Y")."</td></tr>";
    }
    $linvaz = 21 - $contpend;
    for ($i=1;$i<$linvaz;$i++) {
        echo "<tr><td>---</td>
        <td> </td>
        <td>---</td><td>---</td></tr>";
    }
?>
