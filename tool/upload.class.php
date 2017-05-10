<?php
date_default_timezone_set('Asia/Shanghai');
$img=$_FILES["img"];
//array( [name] => IMG_1072.PNG [type] => image/png [tmp_name] => C:\Windows\Temp\phpC968.tmp [error] => 0 [size] => 159212 )
class upload{
     private $arr;
  function __construct($arrImg){
	 $this->arr =$arrImg;
     $this->checkSize();
	 $this->checkType();
	 $this->createData();
  }
//检查文件大小
  function checkSize(){
    if($this->arr["size"]>=2000000){
	  echo"文件过大，请压缩上传";
	  exit;
	}
  }
//获取文件的扩展名并检查类型
  function checkType(){
	  $type=array("png","jpeg","jpg","gif","bmp");
	  $lastName=strtolower($this->arr["type"]);
	  $name=end(explode("/",$lastName));
	  if(in_array($name,$type)==false){
	    echo "不支持的文件类型"."<br>";
		exit;
	  }
	  return $name;
  }
//建立缓存文件夹并且按日期建立文件夹存储//返回存储目录并将值存入数据库
  function createData(){
    if(is_dir("upload")){
	}else{
	  mkdir("upload");
	}
	$name=date(Ymd);
	if(is_dir("upload"."/".$name)){
	}else{
	  mkdir("upload"."/".$name);
	}
	$rename=$name.rand(10000,99999).".".$this->checkType();
	$this->arr["name"]=$rename;
	$filePath="upload"."/".$name."/".$rename;
	move_uploaded_file($this->arr["tmp_name"],$filePath);
	return $filePath;
  }
}
$st=new upload($img);

?>