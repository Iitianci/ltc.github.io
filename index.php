<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>登录页面</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css"/>
</head>
<body>

<div id="login_frame">
	<p id="image_logo"><img src="./tp/logo.jpg"></p>  <!--logo-->
	<form  action="" method="post" class="form_login">
        <h3>用户登录</h3>
        <p><label class="label_input">用户名</label><input type="text" id="username" name="xm" class="text_field"/></p>
        <p><label class="label_input">密码</label><input type="password" id="password" name="mm" class="text_field"/></p>

     <div>
        <input class="button" type="submit" name="tj" value="登录"/>
		<input  class="button" type="submit" name="zhuce" value="注册"/>
		<input class="button" type="button" value="初始化" onclick="window.location.href='init.php'">
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
	$flag=0;
	$con=@mysql_connect('localhost','root','root');
	if(!$con)
		{
			echo"<script>alert('服务器连接失败！'); </script>";
		}
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem");
	if(!$s)
	{
		echo"<script>alert('数据表连接失败！'); </script>";
	}
	$selectSQ= "select * from Administrator";
	$result = @mysql_query($selectSQ);
	if ($xm==null||$mm==NULL)
	{
		echo"<script>alert('用户名或者密码为空！'); </script>";
	}
	else 
	{
		while($row=mysql_fetch_array($result))
		{
			if($mm==$row['password']&&$xm==$row['adm_name'])
			{
				$flag=1;
				header("location:../guanli.php");
			}
		}
		if($flag==0){
			echo"<script>alert('用户名或者密码错误！'); </script>";
		}
	}	
}
if(isset($_POST["zhuce"])){
		header("location:../zhuce.php");
}
?>