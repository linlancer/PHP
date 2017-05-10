<?php
class DB{
  private $userName;
  private $userId;
  private $userPassword;
  private $host;
  private $database;
  private $sheet;
  
  function __construct($h,$un,$up,$db,$s){
    $this->database     =$db;
	$this->host			=$h;
	$this->sheet		=$s;
	$this->userName		=$un;
	$this->userPassword =$up;
	
	$this->connectDB();	

  }
  function connectDB(){
    $link=@mysql_connect($this->host,$this->userName,$this->userPassword) or die("数据库连接错误".mysql_error());
	$sql="set names utf8";
	$this->query($sql);
	mysql_select_db($this->database,$link);
	return $link;
	
  }
  function query($command){
	 $res=mysql_query($command);
	 return $res;
  }
  function getOne(){
    $sql="select * from {$this->sheet}";
	$arr=$this->query($sql);
	$result=mysql_fetch_row($arr);
	print_r($result);
  }
  function getAll(){
    $sql="select * from {$this->sheet} ";
	$res=$this->query($sql);
	while($arr=mysql_fetch_assoc($res)){
	  	  print_r($arr);
	    echo "<br>";
	}
  }
  function close(){
    mysql_close($this->connectDB());
  }
}








?>