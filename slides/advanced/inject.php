$dir = $_GET['directory'];
$contents = `ls $dir`;
echo $contents;
