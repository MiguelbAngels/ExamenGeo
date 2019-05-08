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
require("../database.php");
$query3="insert into examen(IDExamen,TestName,AdminID,Lugar,Fecha,HInicio,HFinal,PassExamen)values ('14','$testname','3','$lugar','$fecha','$hinicio','$hfin','$passex')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error");
echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";

unset($_POST);

?>
</body>
</html>

