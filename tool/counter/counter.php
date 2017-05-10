<?php
function counter(){
	if(!is_dir(dirname(__FILE__)."\\tmp")){
		 mkdir( dirname(__FILE__)."\\tmp");
		 $counterFile=fopen('tmp\counter.txt','r');
		 $num =+fgets($counterFile,'6');
		 echo "您是第{$num}个访客\t";
		 fclose($counterFile);
		 $num+=1;
		 $counterFile=fopen('tmp\counter.txt','w');
		 fwrite($counterFile,$num);
		 fclose($counterFile);
	}else{
		 $counterFile=fopen('tmp\counter.txt','r');
		 $num =+fgets($counterFile,'6');
		 $num+=1;
		 echo "您是第{$num}个访客\t";
		 fclose($counterFile);
		  $counterFile=fopen('tmp\counter.txt','w');
		 fwrite($counterFile,$num);
		 fclose($counterFile);
	}
}
if(!file_exists('tmp\counter.txt')){$counterFile=fopen('tmp\counter.txt','w');
fwrite($counterFile,0);}


?>