<?php

@$bolum = $_POST["bolum"];
$kayitlar = "../../kayitlar/";

if(file_exists("$kayitlar"."$bolum")){
	echo("Oluşturmak istediğiniz \"$bolum\" adlı bölümlum zaten mevcut.");
}
else{
	mkdir("$kayitlar"."$bolum");//dizin oluşturma
	if(file_exists("$kayitlar"."$bolum")){
		echo("\"$bolum\" adlı bölüm başarıyla eklendi.");
	}
	else{
		echo("\"$bolum\" adlı bölüm eklenemedi.");
	}
}

?>
