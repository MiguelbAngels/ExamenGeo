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
extract($_POST);
include("../database.php");
	$id = $_REQUEST['id'];
      
echo $id;
//Marcamos el examen como inactivo cambiando su estado a 0
$query="UPDATE examen SET Estado = '0' WHERE IDExamen = '$id' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
$query="DELETE FROM inscripciones WHERE IDExamen = '$id' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Examen borrado correctamente.</div>";

header("location: ../nvo/departments.php"); 
=======
	include("../database.php");

	$id = $_REQUEST['id'];

	echo $id;
>>>>>>> 74572d60cc6530ca0c8491b82295127f1a679063

	$query="UPDATE examen SET Estado = '0' WHERE IDExamen = '$id' ";
	$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

	echo "<br><br><br><div class=head1>Examen borrado correctamente.</div>";
?>
</body>
</html>

