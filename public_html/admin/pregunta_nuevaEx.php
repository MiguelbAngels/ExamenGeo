<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
extract($_POST);
$idex = $_REQUEST['idex'];
require("../database.php");



$query0="SELECT * FROM `reactivos` WHERE 1";

$rs0=mysqli_query($con,$query0)or die("no se registro error error");



$query2="SELECT * FROM `incisos` WHERE 1";
$rs2=mysqli_query($con,$query2)or die("no se registro error error2");
$ida = mysqli_num_rows($rs2) + 1;
$idb = mysqli_num_rows($rs2) + 2;
$idc = mysqli_num_rows($rs2) +$n ;

$query="insert into reactivos(Pregunta,IDCorrecta)values ('$preg','$idc')";

$rs=mysqli_query($con,$query)or die("no se registro error error");

$query6="SELECT * FROM `reactivos` WHERE Pregunta = '$preg' and IDCorrecta = '$idc'";
$rs6=mysqli_query($con,$query6)or die("no se registro error error");
	while($mostrar=(mysqli_fetch_array($rs6))){
    $idr = $mostrar['IDReactivo'];
}


$query3="insert into incisos(IDInciso,Inciso,IDReactivo)values ('$ida','$a','$idr')";
$query4="insert into incisos(IDInciso,Inciso,IDReactivo)values ('$idb','$b','$idr')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error3");
$rs4=mysqli_query($con,$query4)or die("no se registro error error4");



echo "<p align=center>Reactivo <b>\"$testname\"</b> Agregado correctamente a reactivos.</p>";

$query3="insert into reactivosExamen(IDReactivo,IDExamen)values ('$idr','$idex')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error3");


echo "<p align=center>Reactivo <b>\"$testname\"</b> Agregado correctamente a reactivos Examen.</p>";
$query7="SELECT * FROM `examen` WHERE IDExamen = '$idex' ";
$rs7=mysqli_query($con,$query7)or die("no se registro error error");
	while($mostrar7=(mysqli_fetch_array($rs7))){
    $nre = $mostrar7['nReactivos'];
}
$nre=$nre+1;
$query6="UPDATE examen SET  nReactivos = '$nre' WHERE IDExamen = '$idex'";
$rs6=mysqli_query($con,$query6)or die("no se registro error error");

echo "<p align=center>Reactivo <b>\"$testname\"</b> Agregado correctamente a examen nreact.</p>";





echo "<br><div class=head1><a href=../nvo/gestion_reactivos.php?id=$idex>Regresar</a></div>";

unset($_POST);
?>

</body>
</html>