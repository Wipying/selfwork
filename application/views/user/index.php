<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome!</title>
	<?php $this->load->view('common/commonheader') ?>
</head>
<body>
<?php $this->load->view('common/header') ?>
<div id="container">
	<h1>Welcome to visit our site!</h1>

	<div id="body">
		<p>If you can visit our site, you can get closed to your beautiful life!</p>

		<p>Please enjoy!</p>

		<p><a href="user/register">Signup</a></p>
		
	</div>

	
</div>

</body>
</html>