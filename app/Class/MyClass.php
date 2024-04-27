<?php 

    namespace App\Class;

    class MyClass{

        public function isEmpty($i, $msg = "Não insp.") {
            if ($i == null || $i == "" || !isset($i)) {
                $i = $msg;
            }
        }
    }
?>