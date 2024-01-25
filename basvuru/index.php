<?php
    $id=1;
	if($_GET)
		@$id=$_GET['id'];
	if($_POST)
		@$id=$_POST['id'];		
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:160px;">
  <?php include("cont-body/navi.php"); ?>
</div>

<div class="w3-container" style="margin-left:160px">
<?php include("cont-body/main.php"); ?>
</div>

</body>
</html>
