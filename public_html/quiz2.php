<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">





<link href="quiz.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.* {
box-sizing: border-box;
}

*:focus {
	outline: none;
}
body {
font-family: Arial;
background-color: #3498DB;
padding: 50px;
}
.login {
margin: 20px auto;
width: 300px;
}
.login-screen {
background-color: #FFF;
padding: 20px;
border-radius: 5px
}

.app-title {
text-align: center;
color: #777;
}

.login-form {
text-align: center;
}
.control-group {
margin-bottom: 10px;
}

input {
text-align: center;
background-color: #ECF0F1;
border: 2px solid transparent;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}

input:focus {
border: 2px solid #3498DB;
box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #3498DB;
  color: #ffffff;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 250px;
  margin: 0 auto;
}

.btn:hover {
  background-color: #2980B9;
}

.login-link {
  font-size: 12px;
  color: #444;
  display: block;
	margin-top: 12px;
}
-->
</style>


<?php
	extract($_GET);
	$n = $_REQUEST['n'];

include("database.php");

$user = $_SESSION[login];
if ($n==0){
    $_SESSION["correctas"]=0;
}
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
$npreg = $Fecha_limite[2];
?>
<span style="font-size:20px">Tiempo restante:</span>
 <span  id="demo" style="font-size:20px"></span>
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
	/*
	if ($contador2 >= 1 && $contestado != 1 ){
	    echo "ya realizo este examen, solo se puede realizar una vez.....";
	    echo "<br><div class=head1><a href=result.php?id=$user&idex=$subid>Ver resultados</a></div>";
	    exit;
	}
	*/

	date_default_timezone_set('America/Hermosillo');

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

      <?php
	$contador = 0;

	while( $mostrar1=(mysqli_fetch_array($result0))){

		$idex = $mostrar1['IDReactivo'];
		$query = "SELECT * FROM reactivos WHERE IDReactivo = $idex";
		$preguntas=mysqli_query($con,$query) or die(mysqli_error());
			mysqli_data_seek($preguntas,$contador);
		$Q_1= mysqli_fetch_row($preguntas);
		$arraypreg[1][$contador]=$Q_1[1];
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

		$R1_3= mysqli_fetch_row($resp1);
		$resp[2][$contador]=$R1_3[1];
		$resp11[2][$contador]=$R1_3[0];

		$R1_4= mysqli_fetch_row($resp1);
		$resp[3][$contador]=$R1_4[1];
		$resp11[3][$contador]=$R1_4[0];

		$ans[0][0] = 1;
		$contador++;
}

if ($n<$npreg){
?>
	<div class="login">
		<div class="login-screen">
			<form method="post" action="">
			<div >
				<strong> <?php echo $n+1 ?>.-

				<?php
				//Imprime la pregunta
				echo $arraypreg[1][$n];
				?></strong>
			</div>

			</br>

			<div align="center">
				<?php
					//imprime el primer inciso del reactivo
					echo "a)".$resp[0][$n]
				?>
				<input  type=radio name='ans1' value="1">

			</br>
			</br>
				<?php
					echo "b)".$resp[1][$n]
				?>
				<input type=radio name='ans1' value="2">
				</br>
			</br>
				<?php
					echo "c)".$resp[2][$n]
				?>
				<input type=radio name='ans1' value="3">
				</br>
			</br>
				<?php
					echo "d)".$resp[3][$n]
				?>
				<input type=radio name='ans1' value="4">

			</div>

	</div>

 <form method="post" action="">


 </br>


<td><div align="center">
	<input type=submit id=submit name=submit value='Siguiente' onclick="">
	<input type=submit id=daletiempo name=submit2 style="display: none;" onclick="alert('Se termino el tiempo.')">
	</form>
</div></td>

<?php
}



$contador = 0;
$correctas = 0;
$resp = $_POST['ans1'];


$cont =1;

if (isset($_POST['submit']) || isset($_POST['submit2'])) {
		$cont = 0;
    	if($resp==2){

		    if ($resp11[1][$n] == $rc[$n] ){

		        $_SESSION["correctas"]= $_SESSION["correctas"]+1;


		    }

    	}

    	if($resp==1){

		    if ($resp11[0][$n] == $rc[$n] ){

		          $_SESSION["correctas"]= $_SESSION["correctas"]+1;

		    }

		}

		if($resp==3){

		    if ($resp11[2][$n] == $rc[$n] ){

		        $_SESSION["correctas"]= $_SESSION["correctas"]+1;


		    }

		}

		if($resp==4){

		    if ($resp11[3][$n] == $rc[$n] ){

		        $_SESSION["correctas"]= $_SESSION["correctas"]+1;


		    }

    	}



	else{

	}
if ($n<$npreg){
$n++;
}



echo "<script language=Javascript> location.href=\"quiz2.php?subid=$subid&n=$n\"; </script>";



}
if ($n==$npreg)
{
     $_SESSION["terminado"]= $_SESSION["terminado"]+1;

}

if ($n==$npreg &&  $_SESSION["terminado"]==2) {
    $resp1 = $_POST['ans1'];

    $contestado=1;
    $correctas = $_SESSION["correctas"];
$query="insert into resultados(IDAlumno,IDExamen,NombreExamen,Lugar,AdminID,Fecha,IDRespuestas,RespCorrectas)values ('$user','$subid','$Fecha_limite[1]','$Fecha_limite[4]','$cont','$Fecha_limite[5]','$resp','$correctas')";

$rs=mysqli_query($con,$query) or die(mysqli_error());

echo "<script language=Javascript> location.href=\"result.php?id=$user&idex=$subid\"; </script>";

exit;
}


?>

</body>
</html>
