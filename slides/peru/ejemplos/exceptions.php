<?php
    class Calc {
        static function log($num) {
            if ($num < 0) {
                throw new Exception('Logaritmo de un '.
                            'negativo es indefinido');
            } else {
                return log($num);
            }
        }
    }

 try {
        Calc::log(-15);
 } catch (Exception $e) {
  echo $e->getMessage();
 }
?>
