<?php

class SOAPStruct implements
    SchemaTypeInfo, SchemaSerializable {

    public $varInt = 123;
    public $varFloat = 123.123;
    public $varString = 'hello world';

    public static function getTypeName() {
        return 'SOAPStruct';
    }
    
    public static function getTypeNamespace() {
        return 'http://soapinterop.org/xsd';
    }
    
    public function schemaSerialize() {
        return new domelement('SOAPStruct');
    }

    public function schemaDeserialize($node) {
        $this->whoami = $node->getAttribute('whoami');
    }
}

?>