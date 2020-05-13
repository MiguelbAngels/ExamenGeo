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
<<<<<<< HEAD
include("../database.php");

//Guardamos los datos obtenidos del formulario.
$id = $_REQUEST['id'];
$tipo = $_REQUEST['tipo'];
$idex = $_REQUEST['idex'];
$sql = "SELECT * FROM usuarios where ID='$lid'";
$rs=mysqli_query($con,$sql);
$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
$count = mysqli_num_rows($rs);

//Verificamos si el expediente ya esta registrado.
=======

include("../database.php");
	$id = $_REQUEST['id'];
	$tipo = $_REQUEST['tipo'];
	$idex = $_REQUEST['idex'];
      $sql = "SELECT * FROM usuarios where ID='$lid'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	
>>>>>>> parent of 7e9336b... Ultima version
if($count>0 && $lid != $id)
	{
	
	echo "<br><br><br><div class=head1>El expediente ingresado ya pertenece a otro alumno</div>";
	exit;
	}
 
  
   
 
$query="UPDATE usuarios SET ID = '$lid', Nombre = '$name', Correo = '$email' WHERE ID = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";

echo "<br><div class=head1><a href=../nvo/all-students.php>Regresar</a></div>";
if($tipo == 2){
    header("location: ../nvo/all_students.php?id=".$idex); 
}
?>

</body>
</html>

