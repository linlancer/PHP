<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	protected function  index(){
		$this->display();
	}
	private function  main(){
		$this->display();
	}
	public function userlist(){
		$User = M('users'); // 实例化User对象
		$count = $User->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$rs = $User->limit($Page->firstRow.','.$Page->listRows)->
		select();
		$this->assign('rs',$rs);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		}
	public function delete(){
		$uid=$_GET['id'];
		$users=M('users');
		$users->where("id='$uid'")->delete();
		$this->display('userlist');
		 
	}
	public function update(){
		$users=M('users');
		$uid=$_GET['id'];
		$arr['uName']=$_POST['uName'];
		$arr['uSex']=$_POST['uSex'];
		$arr['uTel']=$_POST['uTel'];
		$arr['email']=$_POST['email'];
		$arr['uPsw']=$_POST['uPsw'];
		print_r($arr);
		echo"<br>.{$uid}";
		if($_GET['id']){
			$addUser=$users->where("id='{$uid}'")->save($arr);
			echo $users->getLastSql();
		}else{
			$users->add($arr);
		}
	}
	public function add(){
	 	$uid=$_GET['id'];
	 	$users=M('users');
		$msg=$users->where("id='$uid'")->find();
		//print_r($msg);
		$this->assign('msg',$msg);
		$this->display('add');
	}
	public function alert(){
		$this->display();
	}
	public function code(){
		$config=array(
			'expire'=>30,
			'length'=>4,
			'fontSize'=>35,
			'useCurve'=>false,
		);
		$verify=new\Think\Verify($config);
		$verify->entry();
	}
	public function check_verify($code){
		$verify = new \Think\Verify();
		return $verify->check($code);
	}
	public function checkLogin(){
		$code=$_POST['code'];
		if($this->check_verify($code)==false){
			$this->error('验证码输入有误');
			exit;
		}
		$admin=M('admin');
		
		$aName=$_POST['aName'];
		$aPsw=$_POST['aPsw'];
		$judge=$admin->where("aName='$aName'")->find();
		if($judge==null){
			$this->error('用户不存在');
			exit;
		}elseif($admin->where("aPsw='$aPsw' and aName='$aName'")->find()==null){
			$this->error('密码输入有误');
			exit;
		}else{
			$this->display('main');
		}
		
		//echo $aPsw;
		//print_r($rs);
		//echo $_SESSION['verify_code'];
	}
	
}















