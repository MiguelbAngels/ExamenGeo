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

      $sql = "SELECT * FROM alumno where Expediente='$lid'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	if($count>0)
	{
	echo "<br><br><br><div class=head1>Expediente ingresado ya existe</div>";
	exit;
	}

 
   $pass = password_hash($pass,PASSWORD_BCRYPT);
   $pass = password_hash($pass,PASSWORD_DEFAULT);
   
 
$query="insert into alumno(Expediente,Nombre,Correo) values('$lid','$name','$email')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Your Login ID  $lid Created Sucessfully</div>";
echo "<br><div class=head1>Inicie sesión usando su ID de inicio de sesión para tomar Quiz</div>";
echo "<br><div class=head1><a href=index.php>Login</a></div>";


?>
</body>
</html>

