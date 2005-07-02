<?php
    abstract class Combustible {
        abstract function usar();
    }

	class Kerosene extends Combustible {
		function usar() {
			return "Glub, glub, glub!";
		}
	}
	
	class Gasolina extends Combustible {
		function usar() {
            return "Tink, tink, tink!";
		}
	}
	
	class Cocina {
	   function llenar(Kerosene $comb) {
	       echo 'cocina: '.$comb->usar();
	   }
	}

	class Carcocha {
		function llenar(Combustible $comb) {
			echo 'carcocha: '.$comb->usar();
		}
	}

    $kero = new Kerosene();
    $gas = new Gasolina();
    
    $combi = new Carcocha();
    $coci = new Cocina();
    
    // no hay problema
	$combi->llenar($kero);
	$combi->llenar($gas);
	
	$coci->llenar($kero);
	// la línea siguiente generaria un error
	$coci->llenar($gas);
?>
