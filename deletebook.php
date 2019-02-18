<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>删除图书页面</title>
	<link rel="stylesheet" type="text/css" href="./css/bg.css"/>
	<link rel="stylesheet" type="text/css" href="./css/deletebook.css"/>
</head>
<body>
<div id="deletebook_frame">
	<form  action="" method="post" name="form1" class="from_deletook">
        <h3>删除图书页面</h3>
				<p><input class="text_field" type="text" name="shum" placeholder="输入想要删除的书名"></p>
				<p><input class="text_field" type="submit" name="tj" value="删除"/></p>
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
	$selectSQ= "select * from Books";
	$selectBo= "select * from Borrow";
	if(isset($_POST["tj"])){
		$shum=$_POST['shum'];
	}
	$flag=0;
	$sum=0;
	$a=0;
	$b=0;
	$size=5;
	if(isset($_GET["curren"]))
		$curren=$_GET["curren"];
	else $curren=1;
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		$sum++;
	}
if(isset($_POST["tj"])){
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		if($shum==$row['book_name']){
			$deleted="delete from books where book_id={$row['book_id']}";
			$flag=1;
			break;
		}
		if($flag==1)
		break;
	}
	$resultBo = @mysql_query($selectBo);
	while($row1=mysql_fetch_array($resultBo)){
		if($shum==$row1['Bor_book']){
			$deleted1="delete from borrow where Bor_id={$row['Bor_id']}";
		}
	}
	$dele=@mysql_query($deleted);
	$dele1=@mysql_query($deleted1);
	if($dele&&$dele1)
		echo "<script>alert('成功删除！'); </script>";
	else
		echo "<script>alert('没有该书，删除失败！'); </script>";
}
else{
	echo "<table id='bg' border=1 width='1000px;'>";
	echo "<td background-color:#00FFFF>"; echo "书名"; echo "</td>";
	echo "<td background-color:#00FFFF>"; echo "图书类型"; echo "</td>";
	echo "<td background-color:#00FFFF>"; echo "作者"; echo "</td>";
	echo "</tr>";
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		$a++;
		while($a>$size*($curren-1)){
			$b++;
			echo "<td>".$row['book_name']."</td>";
			echo "<td>".$row['book_form']."</td>";
			echo "<td>".$row['book_author']."</td>";
			echo "</tr>";
			break;
		}
		if($b>=$size) 
		break;
	}
	echo "<table  id='bg' border=1 >";
	echo "<td>"."当前是第".($curren)."页"."</td>";
	echo "<td>"."一共有".(ceil($sum/$size))."页"."</td>";
	echo "<td>"."<a href='deletebook.php?curren=".(1)."'>首页</a>"."</td>";
	if($curren==1)
		echo "<td>"."<a href='deletebook.php?curren=".($curren=1)."'>上一页</a>"."</td>";
	else
		echo "<td>"."<a href='deletebook.php?curren=".($curren-1)."'>上一页</a>"."</td>";
	if($curren==ceil($sum/$size))
		echo "<td>"."<a href='deletebook.php?curren=".(ceil($sum/$size))."'>下一页</a>"."</td>";
	else 
		echo "<td>"."<a href='deletebook.php?curren=".($curren+1)."'>下一页</a>"."</td>";
	echo "<td>"."<a href='deletebook.php?curren=".(ceil($sum/$size))."'>尾页</a>"."</td>";
	echo "</tr>";
}
if(isset($_POST["fh"])){
		header("location:../deletebook.php");
}		
if(isset($_POST["fhgl"])){
		header("location:../guanli.php");
}	
?>