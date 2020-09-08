<!DOCTYPE html>
<html>
<head>
	<title>Qrcode</title>
</head>
<body>
	<?php 
		$aux = 'php/qr_img.php?';
		$aux .= 'd=https://www.google.com'; 
	?>
	<div style="float:left;border:1px solid;">
		<img src="<?php echo $aux?>">
	</div>
</body>
</html>