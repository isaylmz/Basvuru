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

//Veriler boş mu
if(empty($ad) || empty($soyad) || empty($kimlikno) || empty($cinsiyet) ||
   empty($bolum) || empty($kimlik) || !$donay || !$konay ){
	echo ("Lütfen formda bulunun bütün alanları, istenilen şekilde doldurunuz.");
}
else{
	//Bölüm var mı kontrolü
	if(file_exists("$kayit"."$bolum")){
		$kayit = "$kayit"."$bolum"."/" ;
		//Kişiye ait kayıt var mı kotrolü
		if(!file_exists("$kayit"."$kimlikno")){
			mkdir("$kayit"."$kimlikno");//dizi oluşturma
			$kayit = "$kayit"."$kimlikno"."/";
			
			//Dilekçe belgesinin dosyaya aktarılması
			$hdilekce = "$kayit"."dilekçe."."$duzanti";
			$dkaydi = move_uploaded_file($dilekce["tmp_name"], $hdilekce);
			//Kimliğin belgesinin dosyaya aktarılması
			$hkimlik = "$kayit"."kimlik."."$kuzanti";
			$kkaydi = move_uploaded_file($kimlik["tmp_name"], $hkimlik);
			
			//İşlemlerin başarıyla geliştiğine dair geri dönüş.
			$sonuc = "başarılı";
		}
		else{
			echo("\"$ad\" kişisine ait \"$kimlikno\" adlı kayıt zaten mevcuttur.");
		}
	}
	else{
		echo ("\"$bolum\" adında bir bölüm mevcut değildir.");
	}
}

//Veri tabanı kaydı
if (!empty($sonuc)){
	include("conn.php");
	$kayit = "kayitlar/"."$bolum"."/"."$kimlikno";
	$sql = "INSERT INTO kayitlar (adi, soyadi, tc, cinsiyet, bolum, dosya_yolu)
	                    VALUES ('$ad', '$soyad', '$kimlikno', '$cinsiyet', '$bolum', '$kayit')";
	
	if(mysqli_query($conn, $sql)){
		echo ("Kayıt başarıyla eklendi.");
		mysqli_close($conn);
	}
}

?>