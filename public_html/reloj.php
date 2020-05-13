<html>
<head>
<title>
    Reloj
</title>
<?php
    ///Tomamos la hora del servidor con php
    date_default_timezone_set('America/Hermosillo');
    $fechahora =  getdate();
    ///La usamos para construir momentoactual del lado cliente... puede que haya algun milisegundo de diferencia!!!!
?>
<script type="text/javascript">
var H= <?php echo date("H",$fechahora[0]);?>;
var i=<?php echo date("i",$fechahora[0]);?>;
var s=<?php echo date("s",$fechahora[0]);?>;
    
function suma1Segundo(){
    if(s+1<60){
        s++;
    }else{
        s=0;
        if(i+1<60){
            i++;
        }else{
            i=0;
            if(H+1<24){
                H++;
            }else{
                H=0;
            }
        }
    }
    document.getElementById("rellotge").innerHTML=checkTime(H)+":"+checkTime(i)+":"+checkTime(s);
    t=setTimeout(function(){suma1Segundo()},1000);
}
function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</head>
<body onload="suma1Segundo()">
 
<div  id="rellotge"></div>
</body>
</html>