<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>借书页面</title>
	<link rel="stylesheet" type="text/css" href="./css/borrowbook.css"/>
</head>
<body>
<div id="borrowbook_frame">
	<form  action="" method="post" name="form1" class="borrowbook">
        <h3>借书页面</h3>

                <p>
                <label class="label_input">书名：</label>
                <input class="text_field" type="text" name="shum" />
				</p>
				<p>
                <label class="label_input">借书人：</label>
                <input class="text_field" type="text" name="xm" />
				</p>
				<P>
                <label class="label_input">密码：</label>
                <input class="text_field" type="password" name="mm" />
				</P>
				<p>
                <label class="label_input">借书时间：</label>
                <input class="text_field" type="text" name="time" />
				</p>
		<div>
        <input class="button" type="submit" name="tj" value="提交"/>
		<input class="button" type="reset" name="reset" value="重写"/>

		<input class="button" type="submit" name="fh" value="返回管理页面" />
		</div>
		</form>
</div>

</body>
</html>
<?php
if(isset($_POST["tj"]))
{
	$shum=$_POST["shum"];
	$xm=$_POST["xm"];
	$mm=$_POST["mm"];
	$time=$_POST["time"];
	$flag1=0;
	$flag2=0;
	if($shum==null)
	{
		echo"<script>alert('书名不能为空！'); </script>";
	}
	else if($xm==null)
	{
		echo"<script>alert('借书人不能为空！'); </script>";
	}
	else if($mm==null)
	{
		echo"<script>alert('密码不能为空！'); </script>";
	}
	else if($time==null)
	{
		echo"<script>alert('借书时间不能为空！'); </script>";
	}
	else{
	$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
	$selectSQ= "select * from Books";
	$result = @mysql_query($selectSQ);
	$selectUs= "select * from user";
	$resultUs = @mysql_query($selectUs);
	while($row1=mysql_fetch_array($resultUs))
	{
		$usname=$row1['user_name'];
		if($xm==$usname&&$mm==$row1['password']){
			$flag1=1;
			break;
		}
	}
	if($flag1==0)
		echo "<script>alert('借书人或密码错误，借书失败'); </script>";
	else{
		while($row=mysql_fetch_array($result))
		{
			$sm1=$row['book_name'];
			if($shum==$sm1)
			{
				$flag2=1;
				if($row['book_amount']<=0){
					echo "<script>alert('该书数量不足，借书失败'); </script>";
				}
				else{
					$num=$row['book_amount']-1;
					$num1=$row['book_borrow']+1;
					$exec="update books set book_amount={$num} where book_id={$row['book_id']}";
					$exec0="update books set book_borrow={$num1} where book_id={$row['book_id']}";
					$exec1="insert into borrow values('null','$shum','$xm','$time')";
					break;
				}
			}
			if($flag2==1)
				break;
		}
		if($flag2==0)
			echo "<script>alert('没有这本书，借书失败'); </script>";
	}
	$resu=@mysql_query($exec);
	$resu0=@mysql_query($exec0);
	$resu1=@mysql_query($exec1);
	if($resu&&$resu0&&$resu1) 
	{
		echo "<script>alert('借书成功'); </script>";
	}
	$close=@mysql_close($con)or die("连接失败".mysql_error());
	}
}
if(isset($_POST["fh"])){
		header("location:../guanli.php");
}
?>