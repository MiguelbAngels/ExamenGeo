<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="logo.ico">
	<title>GeoExamen - Inicia Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php

	include("database.php");
	extract($_POST);

	if(isset($submit))
	{


	      $sql = "SELECT * FROM usuarios WHERE ID='$loginid' and Password='$pass' and Clase ='1'";
		  $sql2 = "SELECT * FROM usuarios WHERE ID='$loginid' and  Clase ='0' and Estado = '1'" ;
		  $sql3 = "SELECT * FROM usuarios WHERE Password='$pass'";


		$rs=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
		$rs2=mysqli_query($con,$sql2);
		$rs3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC);
		$row2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC);
	    $count = mysqli_num_rows($rs);
		$count2 = mysqli_num_rows($rs2);
		$count3 = mysqli_num_rows($rs3);
		if($count<1 && $count2 < 1 && $count3 < 1)
		{
			$found="N";
		}
		else
		{
			if ($count < 1 && $count3 >= 1 && $count2 >= 1){
				$_SESSION[login]=$loginid;
			}
			else{
				if ($count >=1)$_SESSION['alogin']="true";
				else{
				    $found="N";
				}

			}



		}
	}
	if (isset($_SESSION[login]) )
	{
		header("Cache-Control: no-cache, must-revalidate");
		if(isset($_SESSION['login']))
		{
		 echo "<div align=\"right\"><strong><a href=\"index.php\"> Casa </a>|<a href=\"signout.php\">Desconectar</a></strong></div>";
		 }
		 else
		 {
		 	echo "&nbsp;";
		 }

	echo "<h1 class='style8' align=center>Bien venido al examen en línea</h1>";
			echo '<table width="28%"  border="0" align="center">
	  <tr>
	    <td  width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
	    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="alert alert-danger">Sujeto para el cuestionario </a></td>
	  </tr>
	  <tr>
	    <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
	    <td valign="bottom"> <a href="result.php" class="alert alert-danger">Resultado </a></td>
	  </tr>
	</table>';

			exit;


	}
	if (isset($_SESSION[alogin]) ){
		if(isset($_SESSION['alogin']))
		echo "<script>location.href='admin/login.php?removido=true';</script>";
	    die();
	}
	?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="imagenes/unison.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" name="form1" method="post" action="">
					<span class="login100-form-title">
						Iniciar Sesion
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingresar Expediente">
						<input class="input100" type="text" name="loginid" id="loginid2" placeholder="Expediente">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingresar Contraseña">
						<input class="input100" type="password" name="pass" id="pass2" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<span class="errors">
			       	 <?php
						  if(isset($found))
						  {
						  	echo '<font color="#ecca1dfc"><center>Usuario o contraseña invalido</center></font>';
						  }
					  ?>
		          </span>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit" id="submit" value="Login">
							Iniciar Sesion
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="signup.php">
							Registrarse
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>