<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>查询会员页面</title>
	<link rel="stylesheet" type="text/css" href="./css/bg.css"/>
	<link rel="stylesheet" type="text/css" href="./css/queryuser.css"/>
</head>
<body>
<div id="queryuser_frame">
	<form  action="" method="post" name="form1">

        <h3>查询会员页面</h3>
        		<p>
				<input  class="text_field" type="text" name="xm" placeholder="输入想要查找的会员名字">
				</p>
				<p>
				<input  class="button" type="submit" name="tj" value="搜索" />
				</p>
		<input class="button" type="submit" name="fh" value="刷新"/>
		<input class="button" type="submit" name="fhgl" value="返回管理页面"/>
	</form>
</body>
</html>
<?php
	$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
	$selectSQ= "select * from User";
	$sum=0;
	$a=0;
	$b=0;
	$size=5;				//一页的显示的数据个数
	if(isset($_GET["curren"]))
		$curren=$_GET["curren"];
	else $curren=1;
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		$sum++;
	}
if(isset($_POST["tj"])){
	$xm=$_POST['xm'];
	$flag=0;
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		if($xm==$row['user_name']){
			echo "<table  id='bg' border=1 width='1000px;'>";
			echo "<td>"; echo "姓名"; echo "</td>";
			echo "<td>"; echo "性别"; echo "</td>";
			echo "<td>"; echo "密码"; echo "</td>";
			echo "</tr>";
			echo "<td>".$row['user_name']."</td>";
			echo "<td>".$row['user_sex']."</td>";
			echo "<td>".$row['password']."</td>";
			echo "</tr>";
			$flag=1;
			break;
		}
		if($flag==1)
		break;
	}
	if($flag==0){
		echo "<script>alert('没有该会员！'); </script>";
	}
}
else{
	echo "<table id='bg' border=1 width='500px;'>";
	echo "<td>"; echo "姓名"; echo "</td>";
	echo "<td>"; echo "性别"; echo "</td>";
	echo "</tr>";
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		$a++;
		while($a>$size*($curren-1)){
			$b++;
			echo "<td>".$row['user_name']."</td>";
			echo "<td>".$row['user_sex']."</td>";
			echo "</tr>";
			break;
		}
		if($b>=$size) 
		break;
	}
	echo "<table  id='bg' border=1 width='400px;'>";
	echo "<td>"."当前是第".($curren)."页"."</td>";
	echo "<td>"."一共有".(ceil($sum/$size))."页"."</td>";
	echo "<td>"."<a href='queryuser.php?curren=".(1)."'>首页</a>"."</td>";
	if($curren==1)
		echo "<td>"."<a href='queryuser.php?curren=".($curren=1)."'>上一页</a>"."</td>";
	else
		echo "<td>"."<a href='queryuser.php?curren=".($curren-1)."'>上一页</a>"."</td>";
	if($curren==ceil($sum/$size))
		echo "<td>"."<a href='queryuser.php?curren=".(ceil($sum/$size))."'>下一页</a>"."</td>";
	else 
		echo "<td>"."<a href='queryuser.php?curren=".($curren+1)."'>下一页</a>"."</td>";
	echo "<td>"."<a href='queryuser.php?curren=".(ceil($sum/$size))."'>尾页</a>"."</td>";
	echo "</tr>";
}		
if(isset($_POST["fh"])){
		header("location:../queryuser.php");
}
if(isset($_POST["fhgl"])){
		header("location:../guanli.php");
}
	
?>