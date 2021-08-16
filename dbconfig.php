


<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="fernando";
$password="Sistemas21";
$dbname="inventario_it";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();


    



