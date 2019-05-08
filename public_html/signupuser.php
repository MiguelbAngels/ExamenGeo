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
extract($_POST);
include("database.php");

      $sql = "SELECT * FROM usuarios where ID='$username'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	if($count>0)
	{

	echo "<br><br><br><div class=head1>Expediente ingresado ya existe</div>";
	exit;
	}





$query="insert into usuarios(ID,Nombre,Correo,Password,Clase,IDExamen,Estado) values('$username','$name','$email','$pass','0','12','0')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Tu cuenta ha sido creada exitosamente.</div>";
echo "<br><div class=head1>Para concluir su registro, algun administrador debera confirmar su registro</div>";
echo "<br><div class=head1><a href=index.php>Inicio</a></div>";


?>
</body>
</html>

