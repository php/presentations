<?php
require 'ezc-setup.php';
$out = new ezcConsoleOutput;
$out->formats->headline->color = 'red';
$out->formats->headline->style = array( 'bold' );

$table = new ezcConsoleTable( $out, 60 );
$table[0]->format = 'headline';
$table[0]->borderFormat = 'headline';

$table[0][0]->content = 'Headline 1';
$table[0][1]->content = 'Headline 2';
$table[1][0]->content = "The next cell will wrap:";
$table[1][1]->content = <<<END
If there is a lot of text in a specific cell then the
ezcConsoleTable will correctly wrap around.
END;
$table[1][1]->align = ezcConsoleTable::ALIGN_RIGHT;

$table->outputTable();
?>
