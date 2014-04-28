<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome!</title>
		<?php $this->load->view('common/commonheader') ?>
		<script>
		$(function(){
			$('form.user-register').submit(function(){
				$.post($(this).attr('action'),$(this).serialize(),function(result){
					alert(result.message);
				},'json');
				return false;
			});
			$('.reload-captcha').on('click',function(){
				$('.captcha-image').prop('src', '/torrang/common/showcaptchaimage/'+Math.random());
			});
			$('input[name=password]').on('keyup', function(e){
				$.get('/torrang/common/getpwdstrength/'+$(this).val(), function(strength){
					var ww = $('input[name=password]').width()+12;
					var p = strength.percent; p = (p>100)?100:p;
					$('.pwd-strength').css({
						width: ww*(p/100)
					}).show();
				},'json');
			});
			$('.pwd-strength').parent().css({position:'relative'});
			$('.pwd-strength').css({
				position: 'absolute',
				display: 'block',
				width: 0,
				height: 3,
				left: $('input[name=password]').position().left,
				top: $('input[name=password]').position().top+$('input[name=password]').height()+10,
				'border':'solid 1px #ccc',
				'background-color':'green'
			}).hide();
			
		});
		</script>
		<style>
			label{float: left; width: 150px;}
		</style>

	</head>
	<body>
		<?php $this->load->view('common/header') ?>
		<br><br><br>
		<div class="row">
			<div class="span3"></div>
			<div class="span6">
				<div id="container">
					<h1>Signup</h1>
					<form action="save" method="post" class="user-register">
						<p><label>Product secret code :</label><input type="text" name="secretcode" /></p>
						<p><label>Name :</label><input type="text" name="name" /></p>
						<p><label>Username :</label><input type="text" name="user" /></p>
						<p><label>Password :</label><input type="password" name="password" />
							<span class='pwd-strength'></span>
						</p>
						<p><label>Confirm Password :</label><input type="password" name="password_confirm" /></p>
						<p><label>Email Address :</label><input type="text" name="email" /></p>
						<p>	<label>Captcha code</label>
							<img src="/torrang/common/showcaptchaimage/<?php echo mt_rand();?>" class='captcha-image' />
							<a class='btn reload-captcha' href="javascript:;">Reload</a>
						</p>
						
						<div class="input-group">
						  <span class="input-group-addon">
							<input type="checkbox">
						  </span>
						  <label>Agree to Terms</label>
						</div>
						<br>
						<p><input type="submit" value="Signup" class="btn" /></p>
					</form>
				</div>
			</div>
			<div class="span3"></div>
		</div>
	</body>
</html>