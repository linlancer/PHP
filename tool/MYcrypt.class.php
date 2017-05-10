<?php
class MYcrypt{
	/*加密密码$key
	 *加密模式$mode
	 *加密源$source
	 *加密向量$iv
	 *明文$clear
	 *算法$alg
	 */
	private $key;
	private $mode;
	private $source;
	private $iv;
	private $clear;
	private $alg;
	//
	function __construct($key,$mode,$clear){
	//根据密码长度选择加密算法
		switch(strlen($key)){
			case 8:
				$this->alg=MCRYPT_DES;
			break;
			case 16:
				$this->alg=MCRYPT_RIJNDAEL_128;
			break;
			case 32:
				$this->alg=MCRYPT_RIJNDAEL_256;
			break;
			default:
				die('KEY must be 8/16/32 bit!');
		}
	//选择加密模式
		switch(strtolower($mode)){
			case'ecb':
				$this->mode=MCRYPT_MODE_ECB;
			break;
			case'cbc':
				$this->mode=MCRYPT_MODE_CBC;
			break;
			case'cfb':
				$this->mode=MCRYPT_MODE_CFB;
			break;
			default:
				$this->mode=MCRYPT_MODE_CFB;
		}
		$this->key=substr(md5($key),0,strlen($key));
		$this->clear=$clear;
		echo $mode;
		//检查是否为ecb模式，是则向量为空，否则调用向量生成函数
		$mode=='ecb'?$this->iv=null:$this->getIV();	
		$this->encrypt();
	}
	//生成向量iv并确定密钥长度
	function getIV(){
		$source=PHP_OS=='WINNT'?MCRYPT_RAND:MCRYPT_DEV_URANDOM;
		$size=mcrypt_get_iv_size($this->alg,$this->mode);
		$iv=mcrypt_create_iv($size,$source);
		$this->iv=base64_encode($iv);
		return $this->iv;
	}
	//加密函数
	function encrypt(){
		if($this->mode==MCRYPT_MODE_ECB){
			$cipher=mcrypt_encrypt($this->alg,$this->key,$this->clear,$this->mode);
		}else{
			$iv=base64_decode($this->iv);
			$cipher=mcrypt_encrypt($this->alg,$this->key,$this->clear,$this->mode,$iv);
		}
		$cip_encode=base64_encode($cipher);
		return $cip_encode;
	}
	//解密函数
	function decrypt($arr){
		$cipher=base64_decode($arr[1]);
		$iv=base64_decode($arr[2]);
		$clear=mcrypt_decrypt($this->alg,$this->key,$cipher,$this->mode,$iv);
		return $clear;
	}
	function action(){
		$arr=array($this->key,$this->iv);
	//返回生成的密钥和向量
		return $arr;
	}
}

?>