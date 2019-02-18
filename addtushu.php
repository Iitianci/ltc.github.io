<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>添加图书页面</title>
	<link rel="stylesheet" type="text/css" href="./css/addtushu.css"/>
</head>
<body>
<div id="addtushu_frame">
	<form  action="" method="post" name="form1" class="addtushu">
        <h3>添加图书页面</h3>
                <p>
                <label style="margin-left: 33px;">书名：</label>
                <input class="label_input" type="text" name="shum" />
                </p>
                <p>
		        <label style="margin-left: 32px;">图书类型：</label>
				<select name="leix">
				<option>科学技术</option>
				<option>政治社会</option>
				<option>历史人文</option>
				<option>艺术文学</option>
				<option>哲学伦理</option>
				<option>儿童读物</option>
				<option>古诗小说</option>
				</select> 
				</p>
				<p>
                <label style="margin-left: 33px;">作者：</label>
                <input class="label_input" type="text" name="zuoz" />
				</p>
				<p>
                <label style="margin-left: 33px;">价格：</label>
                <input class="label_input" type="text" name="jiag" />
				</p>
				<p>
                <label style="margin-left: 33px;">数量：</label>
                <input class="label_input" type="text" name="shul" /> 
                </p>
  		
	<div>
        <input class="button" type="submit" name="tj" value="添加"/>
		<input class="button" type="reset" name="reset" value="重写"/>
		<input class="button" type="submit" name="fh" value="返回管理页面"/>
	</div>
	</form>
</body>
</html>
<?php
if(isset($_POST["tj"]))
{
	$shum=$_POST["shum"];
	$leix=$_POST["leix"];
	$zuoz=$_POST["zuoz"];
	$jiag=$_POST["jiag"];
	$shul=$_POST["shul"];
	$flag=0;
	if($shum==null)
	{
		echo"<script>alert('书名不能为空！'); </script>";
	}
	else if($zuoz==null)
	{
		echo"<script>alert('作者不能为空！'); </script>";
	}
	else if($jiag==null)
	{
		echo"<script>alert('价格不能为空！'); </script>";
	}
	else if($shul==null)
	{
		echo"<script>alert('数量不能为空！'); </script>";
	}
	else{
	$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
	$selectSQ= "select * from Books";
	$result = @mysql_query($selectSQ);
		while($row=mysql_fetch_array($result))
		{
			$sm1=$row['book_name'];
			if($shum==$sm1)
			{
				$num=$row['book_amount']+$shul;
				$exec="update books set book_amount={$num} where book_id={$row['book_id']}";
				$flag=1;
				break;
			}
		}
		if($flag==0){
			$exec="insert into Books values('null','$shum','$leix','$zuoz','$jiag','$shul','')";			
		}
		$resu=@mysql_query($exec);
			if($resu) 
			{
				echo "<script>alert('图书添加成功'); </script>";
			}
	//else echo "<script>alert('图书添加失败'); </script>";
	$close=@mysql_close($con)or die("连接失败".mysql_error());
	}
}
if(isset($_POST["fh"])){
		header("location:../guanli.php");
}
?>