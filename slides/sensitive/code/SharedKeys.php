<?php
class SharedKeys{
	function Create($secret, $people, $show = false){
		$step = 1;
		
		# Truncate/Pad $secret to 16 characters
		$secret = sprintf( "%-' 16s", substr($secret, 0, 16) );
		$keys = array();

		# Generate an array of random keys
		if( $show ){
			echo "\nGenerating Random Keys\n";
		}
		for( $n = 1; $n < $people; ++$n ){
			# Create the binary string from an md5 hash
			# Use mt_rand() to seed the hash
			$keys[] = pack("H*", md5(mt_rand()));
			
			if( $show ){
				echo "Generating Random Key: ", $keys[count($keys) - 1],"\n";
			}
		}

		# Generate the final key by XORing the 
		# previous keys together with the secret
		if( $show ){
			echo "\nDeconstructing Original Key\n",
			     "Deconstructing Original Key (Step 1): ", $secret, "\n";
		}
		
		$out = $secret;
		foreach( $keys as $key ){
			$out ^= $key;
			if( $show ){
				echo "Deconstructing Original Key (Step ", ++$step, "): " , $out,"\n";
			}
		}
		
		array_push($keys, $out);

		# Don't always allow $out to come last in the array
		sort($keys);
		return $keys;
	}

	function Assemble($keys, $show = false){
		$step = 0;
		$out = array_pop($keys);
		if( $show ){
			echo "\nReconstructing Original Key\n",
			     "Reconstructing Original Key (Step ", ++$step, "): " , $out,"\n";
		}
		
		foreach($keys as $key){
			$out ^= $key;
			if( $show ){
				echo "Reconstructing Original Key (Step ", ++$step, "): ", $out,"\n";
			}
		}
		return $out;
	}
}
?>
