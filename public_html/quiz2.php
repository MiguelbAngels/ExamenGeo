<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    	

 <a href="https://time.is/Hermosillo" id="time_is_link" rel="nofollow" style="font-size:36px">Hora local en Hermosillo:</a>
<span id="Hermosillo_z13d" style="font-size:36px"></span>
<script src="//widget.time.is/t.js"></script>
<script>
time_is_widget.init({Hermosillo_z13d:{}});
</script>


<link href="quiz.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style9 {
	color: #000099;
	font-weight: bold;
}
.style10 {
	color: #330066;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
<table border="0" width="100%" cellspacing="0" cellpadding="0" background="image/topbkg.jpg">
  <tr>
    <td width="90%" valign="top">
<!--You can modify the text, color, size, number of loops and more on the flash header by editing the text file (fence.txt) included in the zip file.-->
<div align="left"></div></td>
    <td width="10%">&nbsp;</td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="img/blackbar.jpg">
  <tr>
    <td width="100%"><img border="0" src="image/blackbar.jpg" width="89" height="15"></td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="89%"><span class="style9">Examen en linea</span></td>
    <td width="11%">&nbsp;</td>
  </tr>
<?php
	extract($_GET);
	
include("database.php");
$user = $_SESSION[login];
$contador = 0;
$query0 = "SELECT * FROM reactivosExamen WHERE IDExamen = $subid";

$query2 = "SELECT * FROM examen WHERE IDExamen = $subid";
$sql = "SELECT * From inscripcion WHERE IDAlumno='$user' and IDExamen = '$subid'";
$result = mysqli_query($con,$sql);
$result0 = mysqli_query($con,$query0);
$result2 = mysqli_query($con,$query2);
$contador2 = 0;
mysqli_data_seek($result2,0);
$Fecha_limite = mysqli_fetch_row($result2);
?>
<span style="font-size:36px">Tiempo restante:</span>
 <span  id="demo" style="font-size:36px"></span>
<script language="JavaScript">
// function to calculate local time
// in a different city
// given the city's UTC offset
function calcTime(city, offset) {
    // create Date object for current location
    d = new Date();
    
    // convert to msec
    // add local time zone offset 
    // get UTC time in msec
    utc = d.getTime() + (d.getTimezoneOffset() * 60000);
    
    // create new Date object for different city
    // using supplied offset
    nd = new Date(utc + (3600000*offset));
    
    // return time as a string
    return nd;
}
// get Singapore time
//alert(calcTime('Singapore', '+8'));
// get London time
//alert(calcTime('London', '+1'));
</script>
<script>
//confirm("¿Esta seguro que desea rechazar esta solicitud?");
// Set the date we're counting down to
var countDownDate =<?php echo "new  Date( '$Fecha_limite[5] $Fecha_limite[7]' )"?>;
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  //var now = new Date().getTime();
  var now = calcTime('Hermosillo', '-7').getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('daletiempo').click();
  }
}, 1000);
</script>
<?php
	
	while($mostrar=(mysqli_fetch_array($result))){
	
	
	
		
    $contador2 = $contador2 + 1;
	
	
	}
	
	if ($contador2 >= 1 && $contestado != 1 ){
	    echo "ya realizo este examen, solo se puede realizar una vez.....";
	    echo "<br><div class=head1><a href=result.php?id=$user&idex=$subid>Ver resultados</a></div>";
	    exit;
	}
	
	date_default_timezone_set('America/Hermosillo');
	$nameex;
	while($mostrar2=(mysqli_fetch_array($result2))){
		$date = date("H:i:s");
		$dateEx = $mostrar2['HInicio'];
		$nameex = $mostrar2['NombreExamen'];
		$nameex = $mostrar2['Lugar'];
		$dateEx2 = $mostrar2['HFinal'];
		if ($dateEx > $date || $dateEx2 < $date ){
		    echo "aun no inicia este examen.... </br>";
		    echo "Son las: $date </br>";
		    echo "El examen inicia a las: $dateEx </br>";
		    exit;
		}
	
	}
	echo "</br></br>";
	
	
?>	
  <form method="post" action="">
      <?php	
	$contador = 0;
	
	while( $mostrar1=(mysqli_fetch_array($result0))){
	   
	    $idex = $mostrar1['IDReactivo'];
	$query = "SELECT * FROM reactivos WHERE IDReactivo = $idex";
$preguntas=mysqli_query($con,$query) or die(mysqli_error());
	mysqli_data_seek($preguntas,$contador);
$Q_1= mysqli_fetch_row($preguntas);
$arraypreg[1][0]=$Q_1[1];
$rc[$contador] = $Q_1[2];

$query = "SELECT * FROM incisos WHERE IDReactivo = $Q_1[0] ";
$resp1=mysqli_query($con,$query) or die(mysqli_error());
	mysqli_data_seek($resp1,0);
$R1_1= mysqli_fetch_row($resp1);
$resp[0][$contador]=$R1_1[1];
$resp11[0][$contador]=$R1_1[0];
	mysqli_data_seek($resp1,1);
$R1_2= mysqli_fetch_row($resp1);
$resp[1][$contador]=$R1_2[1];

$resp11[1][$contador]=$R1_2[0];


$ans[0][0] = 1;


?>

</table>
<table width="304"  border="0" align="center">
  <tr>
    <td width="298"><div align="left"><strong> <?php echo $contador+1 ?>.- 
		<?php 
		echo $arraypreg[1][0];
		?></strong> </div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
		
		      
        
			  <?php echo "a)".$resp[0][$contador]?>
			  </br>
	<?php echo "b)".$resp[1][$contador] ?>
	</br>
	<input type=text name='ans1[]' value="">
    
		
  </tr>

</table>







<?php
$contador++;

}
?>

<td><div align="center">
	
  		<input type=submit id=submit name=submit value='Terminar' onclick="">
		<input type=submit id=daletiempo name=submit2 style="display: none;" onclick="alert('Se termino el tiempo.')">
	</form>
</div></td>

<?php
$contador = 0;
$correctas = 0;
$resp = $_POST['ans1'];
$cresp=0;
if (isset($_POST['submit']) || isset($_POST['submit2'])) {
    
 

        foreach ($_POST['ans1'] as $value){
          
        }
        for ( $i=0;$i<5;$i++){
           
        }
}
while($contador < 5){
   
     
    echo "</br>";
if (isset($_POST['submit']) || isset($_POST['submit2'])) {
     
     
    
    	if($resp[$contador]==2){
    	    
		    if ($resp11[1][$contador] == $rc[$contador] ){
		      
		        $correctas++;
		    }
		    
    	}
		
	

    	if($resp[$contador]==1){
    	  
		    if ($resp11[0][$contador] == $rc[$contador] ){
		        
		        $correctas++;
		    }
		   
    	}
		
	

	else{
	    
	}
    
}

$contador++;
}
if (isset($_POST['submit']) || isset($_POST['submit2'])) {
    $contestado=1;
$query="insert into inscripcion(IDAlumno,IDExamen,NombreExamen,Lugar,AdminID,Fecha,IDRespuestas,RespCorrectas)values ('$user','$subid','$Fecha_limite[1]','$Fecha_limite[4]','12','$Fecha_limite[5]','12','$correctas')";

$rs=mysqli_query($con,$query) or die(mysqli_error());
header("Location: result.php?id=$user&idex=$subid&idr=$idrespuestas");
exit;
echo "<br><div class=head1><a href=result.php?id=$user&idex=$subid>Ver resultados</a></div>";
exit;
}


?>

</body>
</html>
