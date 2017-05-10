<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/demo8/Public/css/pintuer.css">
<link rel="stylesheet" href="/demo8/Public/css/admin.css">
<script src="/demo8/Public/js/jquery.js"></script>
<script src="/demo8/Public/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
<?php if(is_array($msg) ==false){ ?>
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加会员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/demo8/admin.php/Home/index/update" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="uName" data-validate="required:请输入姓名" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="file" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片小于2M</div>
        </div>
      </div>   
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="" name="uPsw" data-validate="required:请输入密码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>性别：</label>
        </div>
        <div class="field">
          <input type="radio"  value="1" name="uSex" checked="true" >男&nbsp;&nbsp;<input type="radio"  value="2" name="uSex" >女
          <div class="tips"></div>
        </div>
      </div><div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="uTel" data-validate="required:请输入电话" />
          <div class="tips"></div>
        </div>
      </div><div class="form-group">
        <div class="label">
          <label>邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="email" data-validate="required:请输入邮箱" />
          <div class="tips"></div>
        </div>
      </div><div class="form-group">
          <div class="field">
          <input type="submit" class="input w50" value="提交" name="" style="margin-left:170px" />
          <div class="tips"></div>
        </div>
      </div>  
      
      
      
    </form>
  </div>
</div>
<?php }else{ ?>
<?php print_r($msg) ?>
	<div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改会员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/demo8/admin.php/Home/index/update/id/<?php echo ($msg["id"]); ?>" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value='<?php echo ($msg["uname"]); ?>' name="uName" data-validate="required:请输入姓名" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="file" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片小于2M</div>
        </div>
      </div>   
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value='<?php echo ($msg["upsw"]); ?>' name="uPsw" data-validate="required:请输入密码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>性别：</label>
        </div>
        <div class="field">
          <input type="radio"  value="1" name="uSex" checked="true" >男&nbsp;&nbsp;<input type="radio"  value="2" name="uSex" >女
          <div class="tips"></div>
        </div>
      </div><div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value='<?php echo ($msg["utel"]); ?>' name="uTel" data-validate="required:请输入电话" />
          <div class="tips"></div>
        </div>
      </div><div class="form-group">
        <div class="label">
          <label>邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value='<?php echo ($msg["email"]); ?>' name="email" data-validate="required:请输入邮箱" />
          <div class="tips"></div>
        </div>
      </div><div class="form-group">
          <div class="field">
          <input type="submit" class="input w50" value="确认提交修改" name="" style="margin-left:170px" />
          <div class="tips"></div>
        </div>
      </div> 
      
      
      
    </form>
  </div>
</div>
<?php } ?>
</body></html>