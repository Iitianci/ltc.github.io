<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>注册页面</title>
	<link rel="stylesheet" type="text/css" href="./css/zhuce.css"/>
</head>
<body>
	<div id="zhuce_frame">
		<form  action="" method="post" name="form1" class="from_zhuce">
      		    <h3>管理员注册</h3>
                <p><label class="label_input">用户名：</label>
                <input type="text" name="xm" class="text_field"/></p>
                <p><label class="label_input">密码：</label>
                <input type="password" name="mm" class="text_field"/></p>
                <p><label class="label_input">确认密码：</label>
                <input type="password" name="qrmm" class="text_field"/></p>
		<div>
        <input  class="button" type="submit" name="tj" value="提交" />
		<input  class="button" type="reset" name="reset" value="全部重写" "/>
		<input  class="button" type="submit" name="fh" value="返回登录页面"/>
		</div>
		</form>
	</div>
</body>
</html>
<?php
if(isset($_POST["tj"]))
{
	$xm=$_POST["xm"];
	$mm=$_POST["mm"];
	$qrmm=$_POST["qrmm"];
	$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
	$selectSQ= "select * from Administrator";
	$result = @mysql_query($selectSQ);
	if ($xm==null)
	{
		echo"<script>alert('用户名不能为空！'); </script>";
	}
	else if($xm!=null)
	{
		while($row=mysql_fetch_array($result))
		{
			$xm1=$row['adm_name'];
			if($xm==$xm1)
			{
				echo"<script>alert('该用户名已存在！'); </script>";
				break;
			}
		}
	
		if(strlen($mm)<6){
			echo"<script>alert('密码不能少于6位！'); </script>";
		}
		else if($mm!=$qrmm){
			echo"<script>alert('两次密码不一致！'); </script>";
		}
		else{
			$exec="insert into Administrator values('null','$xm','$mm')";
			$result=@mysql_query($exec);
			if($result) 
			{
				echo "<script>alert('注册成功'); </script>";
			}
			else echo "<script>alert('注册失败'); </script>";
		}
	}	
}
$close=@mysql_close($con);
if(isset($_POST["fh"])){
		header("location:../index.php");
}
?>