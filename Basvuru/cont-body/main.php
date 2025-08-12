<?php						
	switch(@$id)
	{							
		case '1'	: 	include("cont-body/anasayfa.php");																																										
						break;
		case '10'	:	include("cont-body/form/kayit_ekle.php");																								
						break;
		case '20'	: 	include("cont-body/form/kayit_sil.php");																					
						break;
		case '30'	: 	include("cont-body/form/kayit_duzenle.php");																																				
						break;
		case '40'	: 	include("cont-body/form/kayit_listele.php");																																				
						break;
		case '50'	: 	include("cont-body/form/bolum_duzenle.php");																																				
						break;
		default  	:  	include("cont-body/main.php");
						break;
	}					
?>