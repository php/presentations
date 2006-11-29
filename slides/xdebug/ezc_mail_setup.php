<?php
ini_set( 'include_path', '/home/httpd/ezcomponents/trunk:.' );
require 'Base/src/base.php';

function __autoload( $className )
{
    ezcBase::autoload( $className );
}

class ezcMailPrettyPrinter
{
    private static $indentLevel = 0;
    private static $indentString = "   ";
    private static $lineBreak = "\n";

    static public function printMail( ezcMail $mail )
    {
        echo "\n";
        self::printAddresses( $mail->to, "To" );
        self::printAddresses( array( $mail->from ), "From" );
        echo self::indent( "[Subject] => " . $mail->subject  . "\n" );
        if( is_object( $mail->body ) )
        {
            self::printPart( $mail->body, "Body" );
        }
    }

    static public function printAddresses( $addresses, $varName )
    {
        foreach( $addresses as $addr )
        {
            echo self::indent( "[$varName] => " . get_class( $addr ) . " object\n{\n" );
            self::$indentLevel++;
            echo self::indent( "[name] => {$addr->name}\n" );
            echo self::indent( "[email] => {$addr->email}\n" );
            self::$indentLevel--;
            echo self::indent( "}\n" );
        }
    }

    static public function printPart( ezcMailPart $part, $varName )
    {
        $class = get_class( $part );
        echo self::indent( "[$varName] => " . $class . " object\n{\n" );
        self::$indentLevel++;

        switch( $class )
        {
            case 'ezcMailFile':
                self::printFile( $part );
                break;
            case 'ezcMailText':
                self::printText( $part );
                break;
            case 'ezcMailMultipartMixed':
                self::printMultipartMixed( $part );
                break;
            case 'ezcMailMultipartAlternative':
                self::printMultipartAlternative( $part );
                break;
            default:
                throw new Exception( "Pretty printing of $class is not implemented" );
                break;
        }
        self::$indentLevel--;
        echo self::indent( "}\n" );
    }

    static public function printText ( ezcMailText $text )
    {
        echo self::indent( "[text] => {$text->text}\n" );
        echo self::indent( "[charset] => {$text->charset}\n" );
        echo self::indent( "[subType] => {$text->subType}\n" );
    }

    static public function printFile ( ezcMailFile $file )
    {
        echo self::indent( "[fileName] => {$file->fileName}\n" );
        echo self::indent( "[mimeType] => {$file->mimeType}\n" );
        echo self::indent( "[contentType] => {$file->contentType}\n" );
    }

    static public function printMultipartMixed( ezcMailMultipartMixed $mixed )
    {
//        var_dump( $mixed );
        echo self::indent( "[parts] => array\n{\n" );
        $counter = 0;
        self::$indentLevel++;

        foreach( $mixed->getParts() as $part )
        {
            self::printPart( $part, $counter );
            $counter++;
        }
        self::$indentLevel--;
        echo self::indent( "}\n" );
    }

    static public function printMultipartAlternative( ezcMailMultipartAlternative $mixed )
    {
//        var_dump( $mixed );
        echo self::indent( "[parts] => array\n{\n" );
        $counter = 0;
        self::$indentLevel++;

        foreach( $mixed->getParts() as $part )
        {
            self::printPart( $part, $counter );
            $counter++;
        }
        self::$indentLevel--;
        echo self::indent( "}\n" );
    }


    private static function indent( $text )
    {
        if ( self::$indentLevel == 0 )
            return $text;

        $textArray = explode( self::$lineBreak, $text );
        $newTextArray = array();
        foreach ( $textArray as $text )
        {
            if ( trim( $text ) != ''  )
            {
                $textLine = str_repeat( self::$indentString, self::$indentLevel ) . $text;
            }
            else
            {
                $textLine = $text;
            }
            $newTextArray[] = $textLine;
        }
        return implode( self::$lineBreak, $newTextArray );
    }

}


?>
