<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

include("../database.php");

	$idr = $_REQUEST['idr'];
      

 
$query2 = "SELECT * FROM reactivosExamen WHERE IDReactivo ='$idr'";
$result2 = mysqli_query($con,$query2);



   
 
$query="DELETE FROM reactivosExamen WHERE IDReactivo = '$idr' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

$query="DELETE FROM reactivos WHERE IDReactivo = '$idr' ";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

echo "<br><br><br><div class=head1>Reactivo borrado correctamente.</div>";



header("location: ../nvo/lista_reactivos.php"); 


?>

</body>
</html>

