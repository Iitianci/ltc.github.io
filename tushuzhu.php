<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>查询图书页面</title>
	<link rel="stylesheet" type="text/css" href="./css/bg.css"/>
	<link rel="stylesheet" type="text/css" href="./css/tushuzhu.css"/>
</head>
<body>
<div id="tushuzhu_frame">
	<form  action="" method="post" name="form1" class="tushuzhu">
        <h3>查询图书页面</h3>
				<p><input class="text_field" type="text" name="shum" placeholder="输入想要查找的书名" ></p>
				<p><input class="button" type="submit" name="tj" value="搜索" /></p>
           
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
	$selectUs= "select * from Borrow";
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
	$shum=$_POST['shum'];
	$flag=0;
	$result = @mysql_query($selectSQ);
	while($row=mysql_fetch_array($result)){
		if($shum==$row['book_name']){			
			echo "<table id='bg' border=1 width='1000px'>";
			echo "<td>"; echo "书名"; echo "</td>";
			echo "<td>"; echo "图书类型"; echo "</td>";
			echo "<td>"; echo "作者"; echo "</td>";
			echo "<td>"; echo "价格"; echo "</td>";
			echo "<td>"; echo "剩余数量"; echo "</td>";
			echo "<td>"; echo "被借数量"; echo "</td>";
			echo "<td>"; echo "借书的人"; echo "</td>";
			echo "<td>"; echo "借书时间"; echo "</td>";
			echo "</tr>";
			echo "<td>".$row['book_name']."</td>";
			echo "<td>".$row['book_form']."</td>";
			echo "<td>".$row['book_author']."</td>";
			echo "<td>".$row['book_price']."</td>";
			echo "<td>".$row['book_amount']."</td>";
			echo "<td>".$row['book_borrow']."</td>";
			echo "<td>";
			$resultUs= @mysql_query($selectUs);
			while($row1=mysql_fetch_array($resultUs)){
				if($shum==$row1['Bor_book'])
				{
					echo $row1['Bor_user'];
					echo "<br>";
				}
			}
			echo "</td>";
			echo "<td>";
			$resultUs= @mysql_query($selectUs);
			while($row1=mysql_fetch_array($resultUs)){
				if($shum==$row1['Bor_book'])
				{
					echo $row1['Bor_time'];
					echo "<br>";
				}
			}
			echo "</td>";
			echo "</tr>";
			$flag=1;
			break;
		}
		if($flag==1)
		break;
	}
	if($flag==0){
		echo "<script>alert('没有该书！'); </script>";
	}
}
else{
	echo "<table id='bg' border=1 width='1000px;'>";
	echo "<td>"; echo "书名"; echo "</td>";
	echo "<td>"; echo "图书类型"; echo "</td>";
	echo "<td>"; echo "作者"; echo "</td>";
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
	echo "<table id='bg' border=1 width='400px;'>";
	echo "<td>"."当前是第".($curren)."页"."</td>";
	echo "<td>"."一共有".(ceil($sum/$size))."页"."</td>";
	echo "<td>"."<a href='tushuzhu.php?curren=".(1)."'>首页</a>"."</td>";
	if($curren==1)
		echo "<td>"."<a href='tushuzhu.php?curren=".($curren=1)."'>上一页</a>"."</td>";
	else
		echo "<td>"."<a href='tushuzhu.php?curren=".($curren-1)."'>上一页</a>"."</td>";
	if($curren==ceil($sum/$size))
		echo "<td>"."<a href='tushuzhu.php?curren=".(ceil($sum/$size))."'>下一页</a>"."</td>";
	else 
		echo "<td>"."<a href='tushuzhu.php?curren=".($curren+1)."'>下一页</a>"."</td>";
	echo "<td>"."<a href='tushuzhu.php?curren=".(ceil($sum/$size))."'>尾页</a>"."</td>";
	echo "</tr>";
}		
if(isset($_POST["fh"])){
		header("location:../tushuzhu.php");
}
if(isset($_POST["fhgl"])){
		header("location:../guanli.php");
}
	
?>