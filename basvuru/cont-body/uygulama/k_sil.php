<?php

$kayit = "../../kayitlar/";
@$kimlikno = $_POST["kimlikno"];
@$bolum = $_POST["bolum"];
@$kayit = "$kayit"."$bolum"."/"."$kimlikno";

if(!empty($kimlikno) && !empty($bolum)){
	if(file_exists($kayit)){
		if(file_exists($kayit."/dilekçe.pdf")){
			unlink($kayit."/dilekçe.pdf");
		}
		if(file_exists($kayit."/dilekçe.doc")){
			unlink($kayit."/dilekçe.doc");
		}
		if(file_exists($kayit."/kimlik.pdf")){
			unlink($kayit."/kimlik.pdf");
		}
		if(file_exists($kayit."/kimlik.doc")){
			unlink($kayit."/kimlik.doc");
		}
		rmdir($kayit);
	
		include("conn.php");
		$sql = "DELETE FROM kayitlar WHERE tc = '$kimlikno'; ";
		$islem = mysqli_query($conn, $sql);

		if($islem && !file_exists($kayit)){
			echo ("\"$kimlikno\" TC Kimlik numaralı kayıt başarıyla silindi.");
			mysqli_close($conn);
		}
	}
	else{
		echo ("\"$bolum\" bölümünün içinde \"$kimlikno\" TC kimliğine ait bir kayıt bulunmamaktadır.");
	}
}
else{
	echo ("Lütfen bütün alanları doldurunuz.");
}














?>