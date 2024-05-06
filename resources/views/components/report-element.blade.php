<div>
   @php
       foreach ($descrs as $descr) {
            if (!isset($r['item'.$i])) {
                $r['item'.$i] = "Não insp.";
            } else {
                if ($r['item'.$i] == null || $r['item'.$i] == "") {
                    $r['item'.$i] = "Não insp.";
                }
            }
            echo 
            "<tr>
                <td style='width: 4%;'>".$i."</td><td>".$descr."</td><td>".$r['item'.$i]."</td>
            </tr>";
            $i++;
        }
   @endphp
</div>