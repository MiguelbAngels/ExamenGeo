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
include("../database.php");
	$id = $_REQUEST['id'];
 
$query="UPDATE reactivos SET  Pregunta = '$preg' WHERE IDReactivo = '$id' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><div class=head1>Reactivo guardado correctamente. </div>";

$sql2 = "SELECT* From incisos WHERE IDReactivo = '$id'";
$result2 = mysqli_query($con,$sql2);
$mostrar2=(mysqli_fetch_array($result));
//Nos posicionamos en la primer fila de la consulta
mysqli_data_seek($result2,0);
$reactivos = mysqli_fetch_array($result2);
//Obtenemos el id del inciso con el arreglo obtenido de la consulta
$inciso_a = $reactivos[0];

$query="UPDATE incisos SET  Inciso = '$a'  WHERE IDInciso = '$inciso_a' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

mysqli_data_seek($result2,1);
$reactivos = mysqli_fetch_array($result2);
$inciso_b = $reactivos[0];
$query="UPDATE incisos SET  Inciso = '$b'  WHERE IDInciso = '$inciso_b' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

mysqli_data_seek($result2,2);
$reactivos = mysqli_fetch_array($result2);
$inciso_c = $reactivos[0];
$query="UPDATE incisos SET  Inciso = '$c'  WHERE IDInciso = '$inciso_c' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

mysqli_data_seek($result2,3);
$reactivos = mysqli_fetch_array($result2);
$inciso_d = $reactivos[0];
$query="UPDATE incisos SET  Inciso = '$d'  WHERE IDInciso = '$inciso_d' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

echo "<br><br><div class=head1>Incisos guardados correctamente. </div>";

echo "<br><div class=head1><a href=../nvo/departments.php>Regresar</a></div>";
if($tipo == 2){
    header("location: ../nvo/departments.php"); 
}

header("location: ../nvo/lista_reactivos.php"); 
?>

</body>
</html>

