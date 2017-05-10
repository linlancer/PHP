<?php
session_start();
class code{
	private $width;
	private $height;
	private $codeNum;
	private $secureCode;
	function __construct($w,$h,$cn){
		  $this->width 		=$w;	//验证码框的宽度
		  $this->height		=$h;	//验证码框的高度
		  $this->codeNum	=$cn;	//验证码的位数
		  $this->secureCode	=$this->loadImg();	//验证码
	}
	function loadImg(){			//载入图片背景并将数字依次以文本形式写入图片中
	 	  header("content-type:image/png");
		  $char="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01123456789";
		  $code="";
		  $img=imagecreatetruecolor($this->width,$this->height);
		  $black =imagecolorallocate($img,0,0,0);
		  $green =imagecolorallocate($img,0,255,0);
		  $white =imagecolorallocate($img,255,250,240);
		  $blue  =imagecolorallocate($img,0,0,255);
		  imagefill($img,0,0,$white);
		  for($i=0;$i<$this->codeNum;$i++){
			  $temp=$char[rand(0,strlen($char)-1)];
			  imagettftext($img,rand(20,30),rand(-5,5),rand(0,5)+($this->width/$this->codeNum)*$i,rand($this->height-15,$this->height),$black,"consola.ttf",$temp);
			  $code=$code.$temp;
	      }
		  $_SESSION["code"]=$code;							//传值到session
		  $this->pixel($img,$green);
		  $this->line($img,$blue);
		  imagepng($img);
	      imagedestroy($img);
		  return $code;
	}
	function pixel($image,$color){ 							//绘制像素点
		  for($i=0;$i<200;$i++){
	 	    imagesetpixel($image,rand(0,$this->width),rand(0,$this->height),$color);
		  }
	}
	function line($image,$color){							//绘制干扰线
		  for($i=0;$i<4;$i++){
	 	    imageline($image,rand(0,$this->width/2),rand(0,$this->height),rand($this->width/2,$this->width),rand(0,$this->height),$color);
		  }
	}
	static function loadCode($name,$wide,$high,$len){		//封装函数
	      $name=new code($wide,$high,$len);
		  $name->loadImg();
		  
	}
}
code::loadCode($st,110,45,4);




?>