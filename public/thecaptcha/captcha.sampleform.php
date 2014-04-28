<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
include("captcha.function.php");
session_start();
if (!isset($_POST['action']) || $_POST['action'] != 'submit') {
?>	<html>
		<head>
			<title>My contact form</title>
		</head>
		<body>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform">
				<input type="hidden" name="action" value="submit">
				<img src="captcha.image.php?nocache=<?php echo md5(time()); ?>" border="0"><br>
				<input name="magicword" type="text" tabindex="4">
				</div>
				<div><button type="submit" tabindex="5">Submit your message</button></div>
			</form>
		</body>
	</html>
	<?php
}else {
	// Now let's check The CAPTCHA
	if (!captcha_verify_word()) {
		?>
		Incorrect, try again with <a href="./captcha.sampleform.php">this link</a>
		<?php
	} else {
		?>
		Success <a href="./captcha.sampleform.php">try again</a>
		<?php
	}
}


?>
