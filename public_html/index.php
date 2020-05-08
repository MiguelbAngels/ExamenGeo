<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="logo.ico">
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->




<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="nvo/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/owl.carousel.css">
    <link rel="stylesheet" href="nvo/css/owl.theme.css">
    <link rel="stylesheet" href="nvo/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="nvo/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="nvo/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="nvo/js/vendor/modernizr-2.8.3.min.js"></script>


</head>
<body>
	<?php

	include("database.php");
	extract($_POST);

	if(isset($submit))
	{


	      $sql = "SELECT * FROM usuarios WHERE ID='$loginid' and Password='$pass' and Clase ='1' and Estado = '1'";
		  $sql2 = "SELECT * FROM usuarios WHERE ID='$loginid' and  Clase ='0' and Estado = '1' and Password='$pass'" ;



		$rs=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
		$rs2=mysqli_query($con,$sql2);

		$row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC);
		$row2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC);
	    $count = mysqli_num_rows($rs);
		$count2 = mysqli_num_rows($rs2);

		if($count<1 && $count2 < 1 )
		{
			$found="N";
		}
		else
		{
			if ($count < 1 &&  $count2 >= 1){
				$_SESSION[login]=$loginid;
				$query0="UPDATE usuarios SET Conectado = '1' WHERE ID = '$loginid'";
                $rs0=mysqli_query($con,$query0)or die("Could Not Perform the Query");
			}
			else{
				if ($count >=1){
				    $_SESSION['alogin']="true";
				$_SESSION[alogin]=$loginid;
				}
				else{
				    $query0="UPDATE usuarios SET Conectado = '0' WHERE ID = '$loginid'";
                $rs0=mysqli_query($con,$query0)or die("Could Not Perform the Query");
				    $found="N";
				}

			}



		}
	}
	if (isset($_SESSION[login]) )

	{
	    echo "<script>location.href='nvo/alumno.php';</script>";
	    die();
	    $sql5 = "SELECT * FROM usuarios WHERE ID=' $_SESSION[login]'";
	   $result5 = mysqli_query($con,$sql5);
	   	$mostrar5=(mysqli_fetch_array($result5));



		header("Cache-Control: no-cache, must-revalidate");
		if(isset($_SESSION['login']))
		{
		 echo "<div align=\"right\"><strong><a href=\"perfil.php\"> Perfil </a>|<a href=\"index.php\"> Inicio </a>|<a href=\"signout.php\">Desconectar</a></strong></div>";
		 }
		 else
		 {
		 	echo "&nbsp;";
		 }
    $nombre = $mostrar5['Nombre'];
    ?>
    <iframe src="reloj.php"></iframe>
    <a href="https://time.is/Hermosillo" id="time_is_link" rel="nofollow" style="font-size:36px">Hora local en Hermosillo:</a>
    <span id="Hermosillo_z13d" style="font-size:36px"></span>
    <script src="//widget.time.is/t.js"></script>
    <script>
        time_is_widget.init({Hermosillo_z13d:{}});
    </script>

    <center>
        </br>
        </br>
        <?php

	echo "<h1 class='style8' align=center>Bienvenido $nombre</h1>";

			echo '<table width="28%"  border="0" align="center">
			</br>
			</br>

	  <tr>
	    <td  width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="45" height="40" align="middle"></td>
	    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="alert alert-danger">Ingresar a un examen </a></td>
	  </tr>
	  <tr>
	    <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="40" height="40" align="absmiddle"></td>
	    <td valign="bottom"> <a href="resultados.php" class="alert alert-danger">Resultados </a></td>
	  </tr>
	</table>';
	?>
	</center>
    <?php

			exit;


	}
	if (isset($_SESSION[alogin]) ){
		if(isset($_SESSION['alogin']))
		echo "<script>location.href='nvo/index.php';</script>";
	    die();
	}
	?>











	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="login100-pic js-tilt"  data-tilt>
				<img src="imagenes/unison.png" alt="IMG" width="190" height="190">
			</div>
			<div class="text-center m-b-md custom-login">
				<h3>Por favor ingresa tus datos :)</h3>
				<p>Login necesario para ingresar al portal</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" id="loginForm" name="form1" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Expediente" title="Please enter you username" required=""  name="loginid" id="loginid2" class="form-control">
                                <span class="help-block small">Tu expediente único</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required=""  name="pass" id="pass2" class="form-control">
                                <span class="help-block small">Tu contraseña</span>
							</div>
							<span class="errors">
			       	 			<?php
									if(isset($found))
									{
										echo '<center style="color:#eff502">Usuario o contraseña invalido</center>';
									}
								  ?>
		         			 </span>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks">  Recuérdame </label>
                                <p class="help-block small">(si el dispositivo es privado)</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn" name="submit" type="submit" id="submit" >Login</button>
                            <a class="btn btn-default btn-block" href="signup.php">Registrar</a>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2020. Todos los derechos reservados</p>
			</div>
		</div>
    </div>



<!-- jquery
		============================================ -->
		<script src="nvo/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="nvo/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="nvo/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="nvo/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="nvo/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="nvo/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="nvo/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="nvo/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="nvo/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="nvo/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="nvo/js/metisMenu/metisMenu.min.js"></script>
    <script src="nvo/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="nvo/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="nvo/js/icheck/icheck.min.js"></script>
    <script src="nvo/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="nvo/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="nvo//main.js"></script>
    <!-- tawk chat JS
		============================================ -->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>









</body>
</html>