<?php

$db_host = "localhost";

$db_username = "id1327277_examgeo";

$db_pass = "geoexam";

$db_name = "id1327277_geoexamen";

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


?>