<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Prueba en línea - Lista de prueba</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/exam/exam/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
   <link href="http://localhost/exam/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- INCLUYE AL BOSSTRAP ALA WEB -->
    <link href="http://localhost/exam/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <script src="http://localhost/exam/exam/datespicker/css/datepicker.css"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->      
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript"></script>
</head>
<body>
<?php
include("header.php");
	
include("database.php");
  $sql1 = "SELECT IDExamen from usuarios where ID=$_SESSION[login]";
  $rs = mysqli_query($con,$sql1);
  $row = mysqli_fetch_array($rs,MYSQL_ASSOC);
  $row=mysqli_fetch_row($rs);
  $sql2 = "SELECT * FROM examen where IDExamen=$row[0] and Estado = '1' ";
	$rs=mysqli_query($con,$sql2);
  $row = mysqli_fetch_array($rs,MYSQL_ASSOC);
    $count = mysqli_num_rows($rs);
if($count==0){
  echo "<h2 class=head1> Usuario actual no se encuentra inscrito a algun examen.</h2>";
} else{
  echo "<h2 class=head1> Seleccione un exámen para comenzar:</h2>";
  echo "</br></br>"; 
  echo "<table align=center class='table' border='2'>";
    
  
    
  while($row=mysqli_fetch_row($rs))
  {
    echo "<tr class='success' ><td align=center class='text-danger'><a  href=prequiz.php?subid=$row[0]><font  size=4 >$row[1]</font></a>";
  }
  echo "</table>";
}
?>
</body>
</html>