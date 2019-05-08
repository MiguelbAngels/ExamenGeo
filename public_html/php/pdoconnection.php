<?php

$db_host = "localhost";

$db_username = "u442507923_udaq";

$db_pass = "1q2w3e";

$db_name = "u442507923_udaq";

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


?>