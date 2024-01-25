<?php

include("conn.php");
$kayitlar = "../../kayitlar/";
@$bolum = $_POST["bolum"];
@$byolu = "$kayitlar"."$bolum"."/";
$sql = "SELECT * FROM kayitlar WHERE bolum = '$bolum'; ";
$liste = mysqli_query($conn, $sql);

if(file_exists("$kayitlar"."$bolum")){
	if(mysqli_num_rows($liste)>0){
		while($satir = mysqli_fetch_assoc($liste)){
			if(file_exists("$byolu".$satir["tc"]."/dilekçe.pdf")){
				unlink("$byolu".$satir["tc"]."/dilekçe.pdf");
			}
			if(file_exists("$byolu".$satir["tc"]."/dilekçe.doc")){
				unlink("$byolu".$satir["tc"]."/dilekçe.doc");
			}
			if(file_exists("$byolu".$satir["tc"]."/kimlik.pdf")){
				unlink("$byolu".$satir["tc"]."/kimlik.pdf");
			}
			if(file_exists("$byolu".$satir["tc"]."/kimlik.doc")){
				unlink("$byolu".$satir["tc"]."/kimlik.doc");
			}
			if("$byolu".$satir["tc"]){
				rmdir("$byolu".$satir["tc"]);
			}
		}
		$sql = "DELETE FROM kayitlar WHERE bolum = '$bolum'; ";
		$islem = mysqli_query($conn, $sql);
	}
	rmdir("$kayitlar"."$bolum");
	if(!file_exists("$kayitlar"."$bolum") || $islem){
		mysqli_close($conn);
		echo("\"$bolum\" adlı bölüm başarıyla silindi.");
	}
	else{
		mysqli_close($conn);
		echo("\"$bolum\" adlı bölüm silinemedi.");
	}
}
else{
	mysqli_close($conn);
	echo("\"$bolum\" adlı bölüm hedef alanda bulunamamıştır.");
}

?>