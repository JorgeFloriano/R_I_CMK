<?php 

    namespace App\Class;

    class MyClass{

        public function isEmpty($i, $msg = "Não insp.") {
            if ($i == null || $i == "" || !isset($i)) {
                return $msg;
            }
            return $i;
        }

        public function limitMedIni($nom, $lim, $med) {
            if (($nom < $lim && $lim < $med) || ( $nom > $lim && $lim > $med)) {
                 $data = [
                    'cont' => 1,
                    'border' => '1px solid red',
                    'box_shadow' => '0 0 0 .25rem rgba(253, 13, 13, 0.25)',
                ];
            } else {
                $data = [
                    'cont' => 0,
                    'border' => '1px solid #86b7fe',
                    'box_shadow' => $lim . '0 0 0 .25rem rgba(13,110,253,.25)',
                ];
            }
            return $data;
        }
    }
?>