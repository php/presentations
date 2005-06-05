<?php
if (!extension_loaded('pdf')) {
    echo '<a href="invoice.pdf">Bajar la factura</a>';
    exit;
}
$pdf = pdf_new();
pdf_open_file($pdf);
pdf_set_info($pdf, "Author","Jesús M. Castagnetto");
pdf_set_info($pdf, "Title","Ejemplo de Factura");
pdf_set_info($pdf, "Creator", "Jesús M. Castagnetto");
pdf_set_info($pdf, "Subject", "Ejemplo de Factura");

$sizes = array('a4'=>'595x842', 'letter'=>'612x792', 'legal'=>'612x1008');

if(!isset($type)) $type='a4';
list($x,$y) = explode('x',$sizes[$type]);

$items = array(array('Un programa simple que hace de todo','299.99'),
               array('El programa especial sin el que el anterior no corre','1899'),
               array('Una libreria de comunicacion','29.95'),
               array('Un programa para bloquear la comunicacion','49.95'),
               array('Una libreria que comprime todo a 1 byte','49.9'),
               array('Y un programa que permite recuperar lo comprimido a 1 byte','39999.95'),
              );

pdf_begin_page($pdf, $x, $y);

$imagepath = realpath('../images/booger.jpg');
$im = pdf_open_jpeg($pdf, $imagepath);
pdf_place_image($pdf, $im, 5, $y-72, 0.5);
pdf_close_image ($pdf,$im);

pdf_set_value($pdf, 'textrendering', 0); // fill

pdf_set_font($pdf, "Helvetica" , 12, winansi);
pdf_show_xy($pdf, 'Micro Snot & L4m3r5 S.R.L.',145,$y-20);
pdf_continue_text($pdf, '123 Calle del Dolor');
pdf_continue_text($pdf, 'Tacora, Lima 666');

pdf_set_font($pdf, "Helvetica" , 10, winansi);
pdf_show_xy($pdf, 'Cliente Sin Salvacion S.A.',20,$y-100);
pdf_continue_text($pdf, '1 Calle Pequena');
pdf_continue_text($pdf, 'Cuidad Perdida, Puno 123');

pdf_set_font($pdf, "Helvetica" , 10, winansi);
pdf_show_xy($pdf, 'Terminos: Pago Completo 15 horas',150,$y-100);
pdf_continue_text($pdf, 'Apt. Postal:  12345');

pdf_set_font($pdf, "Helvetica-Bold" , 30, winansi);
pdf_show_xy($pdf, "* F A C T U R A *",$x-250,$y-112);

pdf_setcolor($pdf,'fill','gray',0.9,0,0,0);
pdf_rect($pdf,20,80,$x-40,$y-212);
pdf_fill_stroke($pdf);

$offset = 184; $i=0;
while($y-$offset > 80) {
	pdf_setcolor($pdf,'fill','gray',($i%2)?0.8:1,0,0,0);
	pdf_setcolor($pdf,'stroke','gray',($i%2)?0.8:1,0,0,0);
	pdf_rect($pdf,21,$y-$offset,$x-42,24);
	pdf_fill_stroke($pdf);
	$i++; $offset+=24;
}

pdf_setcolor($pdf,'fill','gray',0,0,0,0);
pdf_setcolor($pdf,'stroke','gray',0,0,0,0);
pdf_moveto($pdf, 20,$y-160);
pdf_lineto($pdf, $x-20,$y-160);
pdf_stroke($pdf);

pdf_moveto($pdf, $x-140,$y-160);
pdf_lineto($pdf, $x-140,80);
pdf_stroke($pdf);

pdf_set_font($pdf, "Times-Bold" , 18, winansi);
pdf_show_xy($pdf, "Articulo",30,$y-150);
pdf_show_xy($pdf, "Precio",$x-100,$y-150);


pdf_set_font($pdf, "Times-Italic" , 15, winansi);

$offset = 177;
foreach($items as $item) {
	pdf_show_xy($pdf, $item[0],30,$y-$offset);
	pdf_show_boxed($pdf, '$'.number_format($item[1],2), $x-55, $y-$offset, 0, 0, 'right');
	$offset+=24;
	$total += $item[1];
}

pdf_set_font($pdf, "Times-Bold" , 17, winansi);
$offset+=24;
pdf_show_xy($pdf, 'Total',30,$y-$offset);
pdf_show_boxed($pdf, '$'.number_format($total,2), $x-55, $y-$offset, 0, 0, 'right');

pdf_end_page($pdf);
pdf_close($pdf);

$data = pdf_get_buffer($pdf);
header('Content-type: application/pdf');
header("Content-disposition: inline; filename=invoice.pdf");
header("Content-length: " . strlen($data));
echo $data;
?>
