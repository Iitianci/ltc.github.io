<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>添加会员页面</title>
	<link rel="stylesheet" type="text/css" href="./css/adduser.css"/>
</head>
<body>
<div id="adduser_frame">
	<form  action="" method="post" name="form1" class="adduser">
        <h3>添加会员</h3>
      		    <p>
                <label class="label_input">姓名：</label>
                <input  class="text_field" type="text" name="xm" />
				</p>
				<p>
				<label class="label_input" style="margin-left: -200px;">性别：</label>
				<input type="radio" name="xb" value="男"/>男 
				<input type="radio" name="xb"  value="女"/>女
				</p>
				<p>
                <label class="label_input">密码：</label>
                <input  class="text_field" type="password" name="mm" />
				</p>

        <input class="button" type="submit" name="tj" value="提交"/>
		<input class="button" type="reset" name="reset" value="全部重写"/>
		<input class="button" type="submit" name="fh" value="返回管理页面"/>

	</form>
</body>
</html>
<?php
if(isset($_POST["tj"]))
{
	$xm=$_POST["xm"];
	$xb=$_POST["xb"];
	$mm=$_POST["mm"];
	$flag = 1;
	$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
	$selectSQ= "select * from User";
	$result = @mysql_query($selectSQ);
	if ($xm==null)
	{
		echo"<script>alert('用姓名名不能为空！'); </script>";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			$xm1=$row['user_name'];
			if($xm==$xm1&&$xb==$row['user_sex'])
			{
				$flag=0;
				echo"<script>alert('该用户名已存在！'); </script>";
				break;
			}
		}
		if(strlen($mm)<6){
			echo"<script>alert('密码不能少于6位！'); </script>";
		}
		else if($flag==1){
			$exec="insert into user values('null','$xm','$xb','$mm')";
			$result=@mysql_query($exec);
			if($result) 
			{
				echo "<script>alert('添加成功'); </script>";
			}
			else echo "<script>alert('添加失败'); </script>";
		}
	}	
}
$close=@mysql_close($con);
if(isset($_POST["fh"])){
		header("location:../guanli.php");
}
?>