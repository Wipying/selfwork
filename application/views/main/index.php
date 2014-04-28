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

	<div class="container">

		<hr class="soften">
		<div class="marketing">
		  <h1>Welcome to visit out site!</h1><a class="btn" href="user/register">Signup</a>
		  
		</div>
    </div>
</body>
</html>