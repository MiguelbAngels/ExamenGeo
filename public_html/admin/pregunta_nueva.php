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
	$idc = mysqli_num_rows($rs2) + 3;
	$idd = mysqli_num_rows($rs2) + 4;
	$idco = mysqli_num_rows($rs2) +$n ;
	$query="insert into reactivos(Pregunta,IDCorrecta,estado)values ('$preg','$idco','1')";
	$rs=mysqli_query($con,$query)or die("no se registro error error");
	$query6="SELECT * FROM `reactivos` WHERE Pregunta = '$preg' and IDCorrecta = '$idco'";
	$rs6=mysqli_query($con,$query6)or die("no se registro error error");

<<<<<<< HEAD
extract($_POST);
$idex = $_REQUEST['idex'];
require("../database.php");


$query="insert into reactivos(Pregunta,IDCorrecta,estado)values ('$preg','0','1')";
$rs=mysqli_query($con,$query)or die("no se registro error error");

$query0="SELECT * FROM `reactivos` WHERE 1";
$rs0=mysqli_query($con,$query0)or die("no se registro error error");

$nre = mysqli_num_rows($rs0) ;
mysqli_data_seek($rs0,$nre-1);
$reactivos = mysqli_fetch_array($rs0);

$idr= $reactivos[0];


$query3="insert into incisos(Inciso,IDReactivo)values ('$a','$idr')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error3i");
if ($n == 1){
    $query2="SELECT * FROM `incisos` WHERE 1";
    $rs2=mysqli_query($con,$query2)or die("no se registro error error2");
    $nincisos = mysqli_num_rows($rs2) ;
    mysqli_data_seek($rs2,$nincisos-1);
    $incisos = mysqli_fetch_array($rs2);

    $ultimoInciso = $incisos[0];
    $idc = $ultimoInciso;
}

$query4="insert into incisos(Inciso,IDReactivo)values ('$b','$idr')";
$rs4=mysqli_query($con,$query4)or die("no se registro error error4");
if ($n == 2){
    $query2="SELECT * FROM `incisos` WHERE 1";
    $rs2=mysqli_query($con,$query2 )or die("no se registro error error2");
    $nincisos = mysqli_num_rows($rs2) ;
    mysqli_data_seek($rs2,$nincisos-1);
    $incisos = mysqli_fetch_array($rs2);

    $ultimoInciso = $incisos[0];
    $idc = $ultimoInciso;
}
$query3="insert into incisos(Inciso,IDReactivo)values ('$c','$idr')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error3");
if ($n == 3){
    $query2="SELECT * FROM `incisos` WHERE 1";
    $rs2=mysqli_query($con,$query2)or die("no se registro error error2");
    $nincisos = mysqli_num_rows($rs2) ;
    mysqli_data_seek($rs2,$nincisos-1);
    $incisos = mysqli_fetch_array($rs2);

    $ultimoInciso = $incisos[0];
    $idc = $ultimoInciso;
}

$query4="insert into incisos(Inciso,IDReactivo)values ('$d','$idr')";
$rs4=mysqli_query($con,$query4)or die("no se registro error error4");
if ($n == 4){
    $query2="SELECT * FROM `incisos` WHERE 1";
    $rs2=mysqli_query($con,$query2)or die("no se registro error error2");
    $nincisos = mysqli_num_rows($rs2) ;
    mysqli_data_seek($rs2,$nincisos-1);
    $incisos = mysqli_fetch_array($rs2);

    $ultimoInciso = $incisos[0];
    $idc = $ultimoInciso;
}


//Actualizamos el id del inciso correspondiente a la respuesta correcta 
$queryC = "UPDATE reactivos set IDCorrecta = '$idc' WHERE IDReactivo = '$idr' ";
$rs=mysqli_query($con,$queryC)or die("no se registro error error");




echo "<p align=center>Reactivo <b>\"$testname\"</b> Agregado correctamente.</p>";

echo "<br><div align=center class=head1><a href=../nvo/lista_reactivos.php>Regresar</a></div>";
header("location: ../nvo/lista_reactivos.php"); 
unset($_POST);
=======
	while($mostrar=(mysqli_fetch_array($rs6))){
	    $idr = $mostrar['IDReactivo'];
	}

	$query3="insert into incisos(IDInciso,Inciso,IDReactivo)values ('$ida','$a','$idr')";
	$query4="insert into incisos(IDInciso,Inciso,IDReactivo)values ('$idb','$b','$idr')";
	$rs3=mysqli_query($con,$query3)or die("no se registro error error3");
	$rs4=mysqli_query($con,$query4)or die("no se registro error error4");
	$query3="insert into incisos(IDInciso,Inciso,IDReactivo)values ('$idc','$c','$idr')";
	$query4="insert into incisos(IDInciso,Inciso,IDReactivo)values ('$idd','$d','$idr')";
	$rs3=mysqli_query($con,$query3)or die("no se registro error error3");
	$rs4=mysqli_query($con,$query4)or die("no se registro error error4");

	echo "<p align=center>Reactivo <b>\"$testname\"</b> Agregado correctamente.</p>";
	echo "<br><div align=center class=head1><a href=../nvo/lista_reactivos.php>Regresar</a></div>";

	unset($_POST);
>>>>>>> 74572d60cc6530ca0c8491b82295127f1a679063
?>
</body>
</html>
