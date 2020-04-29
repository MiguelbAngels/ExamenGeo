<html> 
<body> 
  
<?php 
extract($_POST);

if (!isset($buscar)){ 
      echo "Debe especificar una cadena a bucar"; 
      echo "</html></body> \n"; 
      exit; 
} 
include("../database.php") ;

$sql = "SELECT * FROM examen WHERE TestName LIKE '%$buscar%' "; 
$result = mysqli_query($con,$sql);
$result1 = $result;
$GLOBALS['result1'] = $result; 
while($mostrar=(mysqli_fetch_array($result))){
    echo $mostrar['TestName'];
}


?> 
<?php
header("location: departments.php?rs="); 
?>
  
</body> 
</html> 