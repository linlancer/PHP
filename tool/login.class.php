<?php
session_start;//$_SESSION["code"] session中的验证码
include("DB.class.php");
$aName=$_POST["aName"];
$aPsw=$_POST["aPsw"];
$code=$_POST["code"];
class login extends DB {
  private $password;
  private $userName;
  private $code;
  function __construct($aName,$aPsw,$code){
    parent::__construct("localhost","root","root1234","demo","admin");
    $this->password  =$aPsw;
    $this->userName  =$aName;
    $this->code	     =$code;
	$this->checkCode();
	
  }

//检查验证码是否匹配
  function checkCode(){
    $sCode=$_SESSION["code"];
	  if($this->code!=$sCode){
	  echo "验证码输入有误 请重新输入.<br>";
	  ?> <meta http-equiv="refresh" content="2;url=login.class.php"><?php 
	  exit;
	  }else{
	    $this->checkName();
	  }
	  
  }
//检查用户名是否存在
  function checkName(){
    $sql="select * from admin where aName='{$this->userName}' ";
	$res=DB::query($sql);
	if($res==null){
	  echo "用户不存在.<br>";
	  ?> <meta http-equiv="refresh" content="2;url=login.class.php"><?php 
	  exit;
	}else{
	  $this->checkPassword();
	}
  }
  
//检查用户名对应的密码是否正确
  function checkPassword(){
    $sql="select * from admin where aName='{$this->userName}'&& aPsw='{$this->password}'";
	$res=$this->query($sql);
	if($res==null){
	  echo "密码输入有误 请重新输入.<br>";
	  ?> <meta http-equiv="refresh" content="2;url=login.class.php"><?php 
	  exit;
	}else{
	  $this->link();//////
	}
  }
//全部匹配正确 跳转至登录页
  function link(){
    ?> <meta http-equiv="refresh" content="2;url=index.php"><?php    
  }

}
$st=new login($aName,$aPsw,$code);
$st->close();

?>