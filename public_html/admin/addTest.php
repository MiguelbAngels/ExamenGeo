<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Examen agregar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
require("../database.php");


$query2="SELECT * FROM `reactivos` WHERE 1";
$rs2=mysqli_query($con,$query2)or die("error al conectarse a bae de datos...");
$reactivosTotales = mysqli_num_rows($rs2) ;


if ($nre <= $reactivosTotales){
$query3="insert into examen(TestName,AdminID,Lugar,Fecha,HInicio,HFinal,PassExamen,Estado,nReactivos)values ('$name','3','$lugar','$fecha','$h_inicio','$h_fin','$passex','1','$nre')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error");
echo "<p align=center>Examen <b>\"$testname\"</b> agregado correctamente.</p>";
}


$rand = range(1, 13);
$contador = 4;

$sql = "SELECT * From examen WHERE TestName='$name' and Estado = '1' and nReactivos = '$nre' and Lugar = '$lugar' and PassExamen = '$passex'";
$result = mysqli_query($con,$sql);
$mostrar2=mysqli_fetch_array($result);
$idex = $mostrar2['IDExamen'];
unset($_POST);

$sql = "SELECT * FROM reactivos ORDER BY RAND() LIMIT $nre";
$result = mysqli_query($con,$sql);



if ($nre <= $reactivosTotales){
	while($mostrar=(mysqli_fetch_array($result))){
		$idr = $mostrar['IDReactivo'];
		$query3="insert into reactivosExamen(IDReactivo,IDExamen)values ('$idr','$idex')";
		$rs3=mysqli_query($con,$query3)or die("no se registro error error");
		echo "<p align=center>Preguntas <b>\</b> agregadadas correctamente.</p>";

		
		
	
	
	
	}
			echo "<br><div class=head1><a href=../nvo/add-department.php>Regresar</a></div>";
}
else{
	echo "<p align=center>No hay suficientes reactivos.</p>";
	echo "<br><div class=head1><a href=../nvo/add-department.php>Regresar</a></div>";
	
}
	




echo "<br><div class=head1><a href=../nvo/add-department.php>Regresar</a></div>";

?>
</body>
</html>


