<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>管理页面</title>
	<link rel="stylesheet" type="text/css" href="./css/guanli.css"/>
</head>
<body>
 	<div id="zhuce_frame">
	<form  action="" method="post" name="form1">
        <h3>图书管理</h3>
        <p>
		<input class="button" type="submit" name="sousuo" value="搜索图书" />
		<input class="button" type="submit" name="addbook" value="添加图书"/>
		<input class="button" type="submit" name="deletebook" value="删除图书"/>
		</p>
		<p>
		<input class="button" type="submit" name="borrowbook" value="图书借阅"/>
		<input class="button" type="submit" name="returnbook" value="归还图书"/>
		<input class="button" type="submit" name="fh" value="返回登录页面"/>
		</p>

        <h3>会员管理</h3>
		<p>
		<input class="button" type="submit" name="adduser" value="添加会员"/>
		<input class="button" type="submit" name="queryuser" value="搜索会员"/>
		<input class="button" type="submit" name="deleteuser" value="删除会员"/>
		</p>
		<p>
		<input class="button" type="submit" name="borrowuser" value="借书信息"/>
		<input class="button" type="submit" name="fh" value="返回登录页面"/>
		</p>
	</form>
	</div>
</body>
</html>
<?php
if(isset($_POST["sousuo"])){
		header("location:../tushuzhu.php");
}	
if(isset($_POST["addbook"])){
		header("location:../addtushu.php");
}	
if(isset($_POST["deletebook"])){
		header("location:../deletebook.php");
}	
if(isset($_POST["borrowbook"])){
		header("location:../borrowbook.php");
}	
if(isset($_POST["returnbook"])){
		header("location:../returnbook.php");
}	
if(isset($_POST["adduser"])){
		header("location:../adduser.php");
}	
if(isset($_POST["queryuser"])){
		header("location:../queryuser.php");
}	
if(isset($_POST["deleteuser"])){
		header("location:../deleteuser.php");
}	
if(isset($_POST["borrowuser"])){
		header("location:../borrowuser.php");
}	
if(isset($_POST["fh"]))
{
	header("location:../index.php");
}
?>