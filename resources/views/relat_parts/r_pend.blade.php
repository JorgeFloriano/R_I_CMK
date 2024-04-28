<?php
    $contpend = 0;
    for ($i=1;$i<67;$i++) {
        if (isset($tec2name) && $tec2name !== '') {
            $contpend++;
            echo "<tr>
                <td>".$i."</td>
                <td>".$tec2name. "</td>
                <td>000</td>
                <td>".date("d/m/Y")."</td></tr>";
        }
    }
    $linvaz = 21 - $contpend;
    for ($i=1;$i<$linvaz;$i++) {
        echo "<tr><td>---</td>
        <td> </td>
        <td>---</td><td>---</td></tr>";
    }
?>