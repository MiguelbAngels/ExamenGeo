<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");

$idex = $_REQUEST['idex'];
require("database.php");
$contador = 30000;
$idc = 666;

while($contador != 0){
$query="insert into reactivos(Pregunta,IDCorrecta)values ('$contador','$idc')";
$rs=mysqli_query($con,$query)or die("no se registro error error");
$contador--;
if ($contador == 0){
	echo "<p align=center>Reactivos <b>\"$testname\"</b> Agregado correctamente.</p>";
	exit;
}
}








?>

</body>
</html>
