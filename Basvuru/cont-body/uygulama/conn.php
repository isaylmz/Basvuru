<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "basvuru";

//Veri tabanına bağlanma işlemi
$conn = mysqli_connect($servername, $username, $password, $database);

//Veri tabanı bağlantı kontrolü
if(!$conn){
	echo("Veri tabanına bağlanılamadı.".mysqli_error());
}

//mysqli_query("SET NAME UTF8");


?>
