<?php // apd_set_pprof_trace();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Simple PHP Benchmark</title></head>
<body>
<h2>String Manipulation</h2>
<p>
<?php
$str = 'This is just a silly benchmark that doesn\'t do anything useful.';
$str .= 'Here we are just uppercasing the first two characters of every word ';
$str .= 'in this long string';
$parts = explode(' ',$str);
foreach($parts as $part) {
	$new[] = strtoupper(substr($part,0,2)).substr($part,2);
}
echo implode(' ',$new);
?>
</p>
<h2>Some defines</h2>
<?php
define('ABC',123);
define('DEF',456);
define('GHI',789);
define('JKL','abc');
define('MNO','def');
define('PQR','ghi');
define('STU','A longer string just to mix it up a little bit');
define('RETURN_CODE_1',1);
define('RETURN_CODE_2',2);
define('RETURN_CODE_3',3);
define('RETURN_CODE_4',4);
define('RETURN_CODE_5',5);
define('RETURN_CODE_6',6);
define('RETURN_CODE_7',7);
define('RETURN_CODE_8',8);
echo ABC,DEF,GHI,JKL,MNO,PQR,STU,RETURN_CODE_1,
     RETURN_CODE_2,RETURN_CODE_3,RETURN_CODE_4,RETURN_CODE_5,
	 RETURN_CODE_6, RETURN_CODE_7, RETURN_CODE_8;
?>
<p>
<h2>Including 2 files</h2>
<p>
<?php
include 'bench_include1.inc';
include 'bench_include2.inc';
?>
</p>
<h2>for-loop and calling a function many times</h2>
<p>
<?php
$a = range(1,200);
$b = range(200,1);
for($i=0; $i<200; $i++) {
	echo foo($a[$i],$b[$i]);
}
?>
</p>
<h1>Define and Instantiate an object and call some methods</h2>
<p>
<?php
class test_class {
	var $test_var1;
	var $test_var2;
	var $test_var3;
	var $test_var4;

	function test_class($arg1, $arg2) {
		echo "Constructor args: $arg1, $arg2<br />\n";
	}

	function set_var1($value) {
		$this->test_var1 = $value;
		echo "test_var1 property set to $value<br />\n";
		return true;
	}
	function set_var2($value) {
		$this->test_var2 = $value;
		echo "test_var2 property set to $value<br />\n";
		return true;
	}
	function set_var3($value) {
		$this->test_var3 = $value;
		echo "test_var3 property set to $value<br />\n";
		return true;
	}
	function set_var4($value) {
		$this->test_var4 = $value;
		echo "test_var4 property set to $value<br />\n";
		return true;
	}
	function disp() {
		echo "<pre>";
		var_dump($this);
		echo "</pre>";
	}
}

$obj = new test_class(1,'arg2');
$obj->set_var1('test1');
$obj->set_var2(123);
$obj->set_var3($a);  /* Array from previous test */
$obj->set_var4(array(1,2,3,4,5,6,7,8,9));
$obj->disp();
?>
<h2>And finally a bit of XML and XSLT</h2>
<?php
$xml = domxml_open_file('presentations/slides/intro/menu.xml');
$xsl = domxml_xslt_stylesheet_file('presentations/slides/intro/menu.xsl');
$out = $xsl->process($xml);
echo $out->dump_mem();
?>
</p>
</body>
</html>
