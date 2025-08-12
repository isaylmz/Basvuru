<?php

$kayit = "../../kayitlar/";
$uzanti = array("doc", "pdf");

//Verilerin çekilmesi
@$ad = $_POST["ad"];
@$soyad = $_POST["soyad"];
@$kimlikno = $_POST['kimlikno'];
@$cinsiyet = $_POST['cinsiyet'];
@$bolum = $_POST['bolum'];
@$dilekce = $_FILES["dilekce"];
@$kimlik = $_FILES["kimlik"];

//Dilekçe uzantı kontrolü
$duzanti = explode(".", $dilekce["name"]);
$duzanti = $duzanti[count($duzanti)-1];
$donay = in_array($duzanti, $uzanti);

//Kimlik uzantı kontrolü
$kuzanti = explode(".", $kimlik["name"]);
$kuzanti = $kuzanti[count($kuzanti) -1];
$konay = in_array($kuzanti, $uzanti);

if(!empty($kimlikno) && !empty($bolum)){
	if(file_exists("$kayit"."$bolum"."/"."$kimlikno")){
		if(!empty($ad)){
			include("conn.php");
			$sql = "UPDATE kayitlar
					SET adi='$ad'
					WHERE tc = '$kimlikno'; ";

			if(mysqli_query($conn, $sql)){
				echo ("Adı başarıyla güncellendi.<br><br>");
				mysqli_close($conn);
			}
		}
		if(!empty($soyad)){
			include("conn.php");
			$sql = "UPDATE kayitlar
					SET soyadi='$soyad'
					WHERE tc = '$kimlikno'; ";

			if(mysqli_query($conn, $sql)){
				echo ("Soyadı başarıyla güncellendi.<br><br>");
				mysqli_close($conn);
			}
		}
		if(!empty($cinsiyet)){
			include("conn.php");
			$sql = "UPDATE kayitlar
					SET cinsiyet='$cinsiyet'
					WHERE tc = '$kimlikno'; ";

			if(mysqli_query($conn, $sql)){
				echo ("Cinsiyeti başarıyla güncellendi.<br><br>");
				mysqli_close($conn);
			}
		}
		if ($donay){
			$d_yolu = "$kayit"."$bolum"."/"."$kimlikno"."/";
			$hdilekce = "$kayit"."dilekçe."."$duzanti";
			$dkaydi = move_uploaded_file($dilekce["tmp_name"], $hdilekce);
			echo ("Başvuru dilekçesi kaydı başarıyla güncellendi.<br><br>");
		}
		if ($konay){
			$k_yolu = "$kayit"."$bolum"."/"."$kimlikno"."/";
			$hkimlik = "$kayit"."kimlik."."$kuzanti";
			$kkaydi = move_uploaded_file($kimlik["tmp_name"], $hkimlik);
			echo ("Kimlik fotoğrafı kaydı başarıyla güncellendi.<br><br>");
		}
	}
	else{
		echo ("\"$bolum\" bölümünün içinde \"$kimlikno\" TC kimliğine ait bir kayıt bulunmamaktadır.");
	}
}
else{
	echo ("Lütfen gerekli alanları doldurunuz.");
}



?>
