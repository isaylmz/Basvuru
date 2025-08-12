<?php

include("conn.php");
@$kimlikno = $_POST["kimlikno"];
@$secim = $_POST["secim"];
$sql = "SELECT * FROM kayitlar";
$liste = mysqli_query($conn, $sql);

if(mysqli_num_rows($liste)>0){
	if (!empty($secim)){
		echo ("<table border=\"1px solid black\";><tr><td>Adı</td> <td>Soyadı</td> <td>TC Kimlik Numarası</td> <td>Cinsiyeti</td> <td>Bölümü</td> <td>Dosya Yolu</td>");
		while($satir = mysqli_fetch_assoc($liste)){
			echo ("<tr><td>".$satir["adi"]."</td><td>".$satir["soyadi"]."</td><td>".$satir["tc"]."</td><td>".$satir["cinsiyet"]."</td><td>".$satir["bolum"]."</td><td>".$satir["dosya_yolu"]."</td></tr>");
		}
		echo ("</table>");
		mysqli_close($conn);
	}
	elseif (!empty($kimlikno)){
		$sql = "SELECT * FROM kayitlar WHERE tc ='$kimlikno'";
		$liste = mysqli_query($conn, $sql);
		echo ("<table border=\"1px solid black\";><tr><td>Adı</td> <td>Soyadı</td> <td>TC Kimlik Numarası</td> <td>Cinsiyeti</td> <td>Bölümü</td> <td>Dosya Yolu</td>");
		while($satir = mysqli_fetch_assoc($liste)){
			echo ("<tr><td>".$satir["adi"]."</td><td>".$satir["soyadi"]."</td><td>".$satir["tc"]."</td><td>".$satir["cinsiyet"]."</td><td>".$satir["bolum"]."</td><td>".$satir["dosya_yolu"]."</td></tr>");
		}
		echo ("</table>");
		mysqli_close($conn);
	}
}
else{
	mysqli_close($conn);
	echo ("Hiç kayıt bulunmamaktadır. Kayıt sayısı:0");
}

?>