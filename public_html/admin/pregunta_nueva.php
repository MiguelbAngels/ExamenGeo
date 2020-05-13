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
?>
</body>
</html>
