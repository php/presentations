<?php
require_once 'SOAP/Value.php';
require_once 'SOAP/Fault.php';

require_once './example_types.php';

class SOAP_Example_Server {
    var $__dispatch_map = array();
    var $__typedef = array();

    function SOAP_Example_Server() {
        $this->__typedef['{http://soapinterop.org/xsd}SOAPStruct'] = 
                array(
                    'varString' => 'string',
                    'varInt' => 'int', 
                    'varFloat' => 'float'
                );

	$this->__dispatch_map['echoStruct'] =
            array(
                'in' => array('inputStruct' =>
                        '{http://soapinterop.org/xsd}SOAPStruct'),
                'out' => array('outputStruct' =>
                        '{http://soapinterop.org/xsd}SOAPStruct'),
            );
    }

    function __dispatch($methodname) {
        if (isset($this->__dispatch_map[$methodname]))
            return $this->__dispatch_map[$methodname];
        return NULL;
    }

    function echoStruct($inputStruct)
    {
        return $inputStruct->__to_soap('outputStruct');
    }
}

?>