<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>还书页面</title>
	<link rel="stylesheet" type="text/css" href="./css/returnbook.css"/>
</head>
<body>
<div id="returnbook_frame">
	<form  action="" method="post" name="form1" id="returnbook">
        <h3>还书页面</h3>
				<p>
                <label class="label_input">书名：</label>
                <input class="text_field" type="text" name="shum" />
				</p>
				<p>
                <label class="label_input">借书人：</label>
                <input class="text_field" type="text" name="xm" />
				</p>

        <input class="button" type="submit" name="tj" value="提交"/>
		<input class="button" type="reset" name="reset" value="重写"/>
		<input class="button" type="submit" name="fh" value="返回管理页面"/>

	</form>
</body>
</html>
<?php
if(isset($_POST["tj"]))
{
	$shum=$_POST["shum"];
	$xm=$_POST["xm"];
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
	else{
	$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
	mysql_query("set names utf8");
	mysql_query("set character set utf8");
	mysql_query("set character_set_set_results= utf8");
	$s=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
	$selectSQ= "select * from Books";
	$result = @mysql_query($selectSQ);
	$selectUs= "select * from borrow";
	$resultUs = @mysql_query($selectUs);
	while($row1=mysql_fetch_array($resultUs))
	{
		$book1=$row1['Bor_book'];
		if($shum==$book1&&$xm==$row1['Bor_user']){
			$flag1=1;
			break;
		}
	}
	if($flag1==0)
		echo "<script>alert('此人没有借这本书，还书失败!'); </script>";
	else{
		while($row=mysql_fetch_array($result))
		{
			$sm1=$row['book_name'];
			if($shum==$sm1)
			{
				$flag2=1;
				$num=$row['book_amount']+1;
				$num1=$row['book_borrow']-1;
				$exec="update books set book_amount={$num} where book_id={$row['book_id']}";
				$exec0="update books set book_borrow={$num1} where book_id={$row['book_id']}";
				$exec1="delete from borrow where Bor_id={$row1['Bor_id']}";
				break;
			}
		}
	}
	$resu=@mysql_query($exec);
	$resu0=@mysql_query($exec0);
	$resu1=@mysql_query($exec1);
	if($resu&&$resu0&&$resu1) 
	{
		echo "<script>alert('还书成功'); </script>";
	}
	$close=@mysql_close($con)or die("连接失败".mysql_error());
	}
}
if(isset($_POST["fh"])){
		header("location:../guanli.php");
}
?>