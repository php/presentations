<?php

class Cipher{
    var $cipher,
        $data,
        $iv,
        $key,
        $mode,
        $td;

    function Cipher( $key, $cipher=MCRYPT_RIJNDAEL_256, $mode=MCRYPT_MODE_CFB, $cipher_dir='',
                     $mode_dir='' ){
        $this->key = $key;
        $this->cipher = $cipher;
        $this->mode = $mode;
        $this->cipher_dir = $cipher_dir;
        $this->mode_dir = $mode_dir;

        # Open the modules to support the chosen cipher and mode
        $this->td = mcrypt_module_open( $this->cipher, $this->cipher_dir, $this->mode,
                                        $this->mode_dir );
        
        # Create an initialization vector for the open modules from a random source
        $this->iv = mcrypt_create_iv( mcrypt_enc_get_iv_size($this->td), MCRYPT_DEV_RANDOM );
    }

    function init(){
        # Initialize the buffers required for encryption/decryption
        mcrypt_generic_init ($this->td, $this->key, $this->iv);
    }
    
    function Encrypt( $data ){
        $this->init();
        return mcrypt_generic( $this->td, $data );
    }

    function Decrypt( $encrypted_data ){
        $this->init();
        return mdecrypt_generic( $this->td, $encrypted_data );
    }

    function Cleanup(){
        mcrypt_generic_deinit( $this->td );
        mcrypt_module_close( $this->td );
    }
}

/* Cipher Test
$cipher   = new Cipher('boo');
$enc_data = $cipher->Encrypt("J. Random Data");
echo "Encrypted data: ", $enc_data, "\n";

$dec_data = $cipher->Decrypt($enc_data);
echo "Decrypted data: ", $dec_data, "\n";

$cipher->Cleanup();
*/
?>
