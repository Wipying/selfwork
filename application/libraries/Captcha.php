<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha{
	private $captcha_method = 'session';
	private $captcha_show_credits = false;

	public function __construct($config = array())
	{
		@session_start();
		empty($config) OR $this->initialize($config);
		log_message('debug', 'Captcha Class Initialized');
	}

	public function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
		return $this;
	}

	public function showimage() {
		$this->captcha_show_credits ? $captcha_image = imagecreate(200, 51) : $captcha_image = imagecreate(200, 40);
		$captcha_backgrounds = array('FF0000', '00FF00', '0000FF');
		$captcha_color_scheme = $captcha_backgrounds[mt_rand(0, 2)];
		$captcha_colors = array(hexdec('0x'.$captcha_color_scheme{0}.$captcha_color_scheme{1}), hexdec('0x'. $captcha_color_scheme{2}.$captcha_color_scheme{3}), hexdec('0x'.$captcha_color_scheme{4}.$captcha_color_scheme{5}));
		$captcha_image_bgcolor = imagecolorallocate($captcha_image, $captcha_colors[0], $captcha_colors[1], $captcha_colors[2]);
		
		// Let's make some lighter and darker colors
		if ($captcha_color_scheme == 'FF0000') {
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0], $captcha_colors[1]+mt_rand(230, 240), $captcha_colors[2]+mt_rand(230, 240));
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0], $captcha_colors[1]+mt_rand(230, 240), $captcha_colors[2]+mt_rand(230, 240));
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0], $captcha_colors[1]+mt_rand(160, 220), $captcha_colors[2]+mt_rand(160, 220));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]-mt_rand(50, 100), $captcha_colors[1]+mt_rand(0, 50), $captcha_colors[2]+mt_rand(0, 50));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]-mt_rand(50, 100), $captcha_colors[1]+mt_rand(0, 50), $captcha_colors[2]+mt_rand(0, 50));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]-mt_rand(50, 100), $captcha_colors[1]+mt_rand(0, 50), $captcha_colors[2]+mt_rand(0, 50));
		} elseif ($captcha_color_scheme == '00FF00') {
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(230, 240), $captcha_colors[1], $captcha_colors[2]+mt_rand(230, 240));
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(230, 240), $captcha_colors[1], $captcha_colors[2]+mt_rand(230, 240));
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(150, 190), $captcha_colors[1], $captcha_colors[2]+mt_rand(150, 190));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(0, 130), $captcha_colors[1]-mt_rand(50, 100), $captcha_colors[2]+mt_rand(0, 130));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(0, 130), $captcha_colors[1]-mt_rand(50, 100), $captcha_colors[2]+mt_rand(0, 130));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(0, 130), $captcha_colors[1]-mt_rand(50, 100), $captcha_colors[2]+mt_rand(0, 130));
		} else {
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(210, 230), $captcha_colors[1]+mt_rand(210, 230), $captcha_colors[2]);
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(210, 230), $captcha_colors[1]+mt_rand(210, 230), $captcha_colors[2]);
			$captcha_image_lcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(180, 200), $captcha_colors[1]+mt_rand(180, 200), $captcha_colors[2]);
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(0, 100), $captcha_colors[1]+mt_rand(0, 100), $captcha_colors[2]-mt_rand(70, 150));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(0, 100), $captcha_colors[1]+mt_rand(0, 100), $captcha_colors[2]-mt_rand(70, 150));
			$captcha_image_dcolor[] = imagecolorallocate($captcha_image, $captcha_colors[0]+mt_rand(0, 100), $captcha_colors[1]+mt_rand(0, 100), $captcha_colors[2]-mt_rand(70, 150));
		}
		
		// Background
		for ($i = 0; $i <= 10; $i++) {
			imagefilledrectangle($captcha_image, $i*20+mt_rand(4, 26), mt_rand(0, 39), $i*20-mt_rand(4, 26), mt_rand(0, 39), $captcha_image_dcolor[mt_rand(0, 2)]);
		}
		
		// Grid
		for ($i = 0; $i <= 10; $i++) {
			imageline($captcha_image, $i*20+mt_rand(4, 26), 0, $i*20-mt_rand(4, 26), 39, $captcha_image_lcolor[mt_rand(0, 2)]);
		}
		for ($i = 0; $i <= 10; $i++) {
			imageline($captcha_image, $i*20+mt_rand(4, 26), 39, $i*20-mt_rand(4, 26), 0, $captcha_image_lcolor[mt_rand(0, 2)]);
		}
		
		// This creates the captcha word
		$symbols = array('2', '3', '4', '5', '6', '7', '8', '9', 'A', 'C', 'E', 'G', 'H', 'K', 'M', 'N', 'P', 'R', 'S', 'U', 'V', 'W', 'Z', 'Y', 'Z');
		$captcha_word = '';
		for ($i = 0; $i <= 4; $i++) {
			$captcha_word .= $symbols[mt_rand(0, 24)];
		}
		
		// Let's place the word. Each letter will have random position, size, angle and font
		
		if (function_exists('imagettftext')) {
			for($i = 0; $i <= 4; $i++) {
				imagettftext($captcha_image, mt_rand(24, 28), mt_rand(-20, 20), $i*mt_rand(30, 36)+mt_rand(2,4), mt_rand(32, 36), $captcha_image_lcolor[mt_rand(0, 1)], './application/libraries/captcha/'.mt_rand(1, 4).'.ttf', $captcha_word{$i});
			}
		} else {
			for($i = 0; $i <= strlen($captcha_word); $i++) {
				imagestring($captcha_image, imageloadfont('./application/libraries/captcha/'.mt_rand(1, 3).'.gdf'), $i*mt_rand(20, 26), 0+mt_rand(2, 4), $captcha_word{$i}, $captcha_image_lcolor[mt_rand(0, 1)]);
			}
		}
		
		// Noise over the word
		imagesetstyle($captcha_image, array($captcha_image_dcolor[mt_rand(0, 2)], $captcha_image_dcolor[mt_rand(0, 2)], $captcha_image_dcolor[mt_rand(0, 2)], $captcha_image_dcolor[mt_rand(0, 2)], $captcha_image_dcolor[mt_rand(0, 2)], $captcha_image_dcolor[mt_rand(0, 2)], $captcha_image_dcolor[mt_rand(0, 2)]));
		for ($i = 0; $i <= 4; $i++) {
			imageline($captcha_image, 0, mt_rand(0, 39), 199, mt_rand(0, 39), IMG_COLOR_STYLED);
		}
		$captcha_image_lineys = array(mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39));
		$captcha_image_lineye = array(mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39), mt_rand(0, 39));
		for ($i = 0; $i <= 4; $i++) {
			imageline($captcha_image, $i*20+mt_rand(1, 6), $captcha_image_lineys[$i], $i*16+mt_rand(1, 6), $captcha_image_lineye[$i], $captcha_image_lcolor[mt_rand(0, 1)]);
			imageline($captcha_image, $i*20+mt_rand(1, 6), $captcha_image_lineys[$i], $i*16+mt_rand(1, 6), $captcha_image_lineye[$i], $captcha_image_lcolor[mt_rand(0, 1)]);
		}
		// Credits
		if ($this->captcha_show_credits) {
			$captcha_creditsimg = imagecreatefrompng('protected.png');
			imagecopy($captcha_image, $captcha_creditsimg, 0, 40, 0, 0, 200, 11);
		}
		
		// Now we'll send a cookie or store the word in a session file
		if ($this->captcha_method == 'cookie') {
			setcookie('magicword', md5($captcha_word), 0, '/');
		} else {
			@session_start();
			$_SESSION['magicword'] = md5($captcha_word);
		}
		header('Content-type: image/png');
		header('Expires: Sun, 1 Jan 2000 12:00:00 GMT');
		header('Last-Modified: '.gmdate("D, d M Y H:i:s").'GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');
		imagepng($captcha_image);
		imagedestroy($captcha_image);
	}



	public function verify() {
		if ($this->captcha_method == 'cookie') {
			if (md5($_POST['magicword']) != $_COOKIE['magicword'] || empty($_COOKIE['magicword']) || !isset($_COOKIE['magicword'])) {
				setcookie('magicword', '', 0, '/');
				return false; 
			} else {
				setcookie('magicword', '', 0, '/');
				return true; 
			}
		} else {
			if (md5($_POST['magicword']) != $_SESSION['magicword'] || empty($_SESSION['magicword']) || !isset($_SESSION['magicword'])) {
				unset($_SESSION['magicword']);
				return false;
			} else {
				unset($_SESSION['magicword']);
				return true;
			}
		}
	}
}
