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

<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 会员查看</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="10%">姓名</th>
        <th>性别</th>
        <th>电话</th>
        <th>邮箱</th>
        <th>备注</th>
        <th width="310">操作</th>
      </tr>
      <?php if(is_array($rs)): foreach($rs as $key=>$vo): ?><tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" /><?php echo ($vo["id"]); ?></td>
          <td><?php echo ($vo["uname"]); ?></td>
          <td width="10%"><?php echo ($vo['usex']==1?'男':'女'); ?></td>
          <td><?php echo ($vo["utel"]); ?></td>
          <td><?php echo ($vo["email"]); ?></td>
          <td></td>
          <td><div class="button-group"> 
              <a class="button border-main" href="/demo8/admin.php/Home/index/add/id/<?php echo ($vo["id"]); ?>"><span class="icon-edit"></span> 修改</a> 
              <a class="button border-red" href="/demo8/admin.php/Home/index/delete/id/<?php echo ($vo["id"]); ?>" onclick=""><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr><?php endforeach; endif; ?>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;">
        	<a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a>
            <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 
      </tr>
      <tr>
        <td colspan="8"><div class="pagelist"> <?php echo ($page); ?> <a href="/demo8/admin.php/Home/index/userlist">返回首页</a></div></td>
      </tr>
    </table>
  </div>
</form>

</body>
</html>