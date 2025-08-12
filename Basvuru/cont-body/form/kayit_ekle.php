<fieldset>
<h2 style="color:gray;">Kayıt Ekleme</h2>
</fieldset>
<fieldset>
<form action="cont-body/uygulama/k_ekle.php" method="POST" enctype="multipart/form-data">
<table>
	<tr>
		<td>Ad</td>
		<td>:</td>
		<td><input type="text" name="ad"></td>
	</tr>
	<tr>
		<td>Soyad</td>
		<td>:</td>
		<td><input type="text" name="soyad"></td>
	</tr>
	<tr>
		<td>TC Kimli No</td>
		<td>:</td>
		<td><input type="text" name="kimlikno"></td>
	</tr>
	<tr>
		<td>Cinsiyet</td>
		<td>:</td>
		<td>
		<input type="radio" name="cinsiyet" value="bay"> Bay
        <input type="radio" name="cinsiyet" value="bayan"> Bayan
		</td>
	</tr>
	<tr>
		<td>Bölüm Adı</td>
		<td>:</td>
		<td><input type="text" name="bolum"></td>
	</tr>
	<tr>
		<td>Başvuru Dilekçesi</td>
		<td>:</td>
		<td><input type="file" name="dilekce"></td>
	</tr>
	<tr>
		<td>Kimlik Fotoğrafı</td>
		<td>:</td>
		<td><input type="file" name="kimlik"></td>
	</tr>
		<tr>
		<td></td>
		<td></td>
		<td>".doc" ya da ".pdp"</td>
	</tr>
	<tr>
		<td><input type="submit" value="Kaydı Ekle"></td>
	</tr>
</table>
</form>
</fieldset>
