<?php

$doc = new DOMDocument;

$node = SchemaSimple::domSerialize($doc,
                                   'tagName',
                                   $value);

$val = SchemaSimple::domDeserialize($node);

?>