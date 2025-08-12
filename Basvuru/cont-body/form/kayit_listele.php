<fieldset>
<h2 style="color:gray;">Kayıt Listeleme</h2>
</fieldset>
<fieldset>
<form action="cont-body/uygulama/k_listele.php" method="POST" enctype="multipart/form-data">
<table>
	<tr>
		<td>TC Kimli No</td>
		<td>:</td>
		<td><input type="text" name="kimlikno"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>
			<input type="checkbox" name="secim" value="tumu" style="border-left-style:solid; border-color:red "> Tüm Kayıtları
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" value="Listele"></td>
	</tr>
</table>
</form>
</fieldset>
