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

            switch ($r['item'.$i]) {
            case 'Ok':
                $class = 'light-good';
                break;
            case 'Recuperar':
                $class = 'light-m_o_l';
                break;
            case 'Trocar':
                $class = 'light-bad';
                break;
            default:
                $class = '';
        }

            echo 
            "<tr>
                <td style='width: 4%;'>".$i."</td>
                <td>".$descr."</td>
                <td style='text-align: center;width: 20%;' class='".$class."'>".$r['item'.$i]."</td>
            </tr>";
            $i++;
        }
   @endphp
</div>