<?php

class TemplateFunctionCall
	implements ezcTemplateCustomBlock, ezcTemplateCustomFunction
{
    public static function getCustomBlockDefinition( $name )
    {
        if( $name == "call" )
        {
            $def = new ezcTemplateCustomBlockDefinition();
            $def->class = __CLASS__;
            $def->method = "call_block";
            $def->hasCloseTag = false;
            $def->requiredParameters = array("object", "method");
            $def->optionalParameters = array("parameters");
            return $def;
        }

        return false;
    }

    public static function getCustomFunctionDefinition( $name )
    {
        if( $name == "call" )
        {
            $def = new ezcTemplateCustomFunctionDefinition();
            $def->class = __CLASS__;
            $def->method = "call_function";
            $def->parameters = array(
				"object", "method", "[parameters]"
			);
            return $def;
        }

        return false;
    }

    public static function call_block( $p )
    {
        return call_user_func_array(
			array($p["object"], $p["method"]),
			$p["parameters"]
		);
    }

    public static function call_function(
		$object, $method, $parameters = array()
	)
    {
        return call_user_func_array(
			array( $object, $method ), $parameters
		);
    }
}

?>
