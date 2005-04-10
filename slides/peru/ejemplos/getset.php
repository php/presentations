<?php
 class Secretos {
  private $claves = array ('jorge'=>'ogrej', 'diana'=>'azul123');

  function __get($varName) {
            if (array_key_exists($varName, $this->claves)) {
                return $this->claves[$varName];
            }
  }

  function __set($varName, $value) {
            $this->claves[$varName] = $value;
  }

 }

 $obj = new Secretos();
 $obj->hugo = 'gregorian-chants_rewl';
 echo "La clave de Diana es {$obj->diana}\n";
 echo "Hugo prefiere {$obj->hugo}\n";
 echo "Mientras que Jorge astutamente usa {$obj->jorge}\n";
?>
