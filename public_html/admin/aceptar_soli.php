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
      $sql = "SELECT * FROM usuarios where ID='$lid'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	
if($count>0 && $lid != $id)
	{
	
	echo "<br><br><br><div class=head1>El expediente ingresado ya pertenece a otro alumno</div>";
	exit;
	}
 
  
   
 
$query="UPDATE usuarios SET Estado = '1' WHERE ID = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";

echo "<br><div class=head1><a href=alumnosp_gestion.php>Regresar</a></div>";


?>
</body>
</html>

