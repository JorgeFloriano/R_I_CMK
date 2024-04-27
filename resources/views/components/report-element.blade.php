<div>
   @php
       foreach ($descrs as $descr) {
            if (!isset($_POST['txt'.$i])) {
                $_POST['txt'.$i] = "Não insp.";
            } else {
                if ($_POST['txt'.$i] == null || $_POST['txt'.$i] == "") {
                    $_POST['txt'.$i] = "Não insp.";
                }
            }
            echo 
            "<tr>
                <td style='width: 4%;'>".$i."</td><td>".$descr."</td><td>".$_POST['txt'.$i]."</td>
            </tr>";
            $i++;
        }
   @endphp
</div>