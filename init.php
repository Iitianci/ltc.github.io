<?php
$con=@mysql_connect('localhost','root',"root")or die("连接失败".mysql_error());
mysql_query("set names utf8");
mysql_query("set character set utf8");
mysql_query("set character_set_set_results= utf8");
$sql = "create database BookLoanSystem";
$my=@mysql_query($sql);
if($my)
echo "创建BookLoanSystem数据库成功！<br/>";
else
echo"创建BookLoanSystem数据库失败！<br/>";
$con=@mysql_select_db("BookLoanSystem") or die('选择数据库失败');
$form1="
create table  Administrator(
	adm_id int auto_increment primary key,
	adm_name char(20) not NULL unique,
	password char(20) not NULL
)";
$f1=@mysql_query($form1);
if($f1)
echo "创建Administrator表成功！<br/>";
else
echo"创建Administrator表失败！<br/>";
$form2="
create table  Books(
	book_id int auto_increment primary key,
	book_name char(20) not NULL unique,#名字
	book_form char(20) not NULL,#类型
	book_author char(20) not NULL,#作者
	book_price char(20) not NULL,#价格
	book_amount int unsigned not NULL,#目前数量
	book_borrow int unsigned default 0 not NULL#借了多少本书
)";
$f2=@mysql_query($form2);
if($f2)
echo "创建Books成功！<br/>";
else
echo"创建Books表失败！<br/>";
$form3="
create table User(
	user_id int auto_increment primary key,
	user_name char(20) not NULL,
	user_sex char(4) not NULL,
	password char(20) not NULL
)";
$f3=@mysql_query($form3);
if($f3)
echo "创建User表成功！<br/>";
else
echo"创建User表失败！<br/>";
$form4="
create table  Borrow(
	Bor_id int auto_increment primary key,
	Bor_book char(20) not NULL,
	Bor_user char(20) not NULL,
	Bor_time varchar(20) not NULL,
	constraint FK_BookLoanSystem_Boooks foreign key(Bor_book) references Books(book_name),
	constraint FK_BookLoanSystem_User foreign key(Bor_user) references User(user_name)
)";
$f4=@mysql_query($form4);
if($f4)
echo "创建Borrow成功！<br/>";
else
echo"创建Borrow表失败！<br/>";
$xm0="杨小芳";
$xm1="张钢";
$xm2="吴龙";
$xm3="叶少伟";
$xm4="麦志广";
$xm5="卢晓君";
$xm6="周志华";
$xm7="张志伟";
$xm8="凌志超";
$xm9="何兵";
$xm10="李虎";
$xm11="赵龙";
$xm12="洛心辰";
$xm13="梁衡";
$xm14="黄思婷";
$xm15="李志尘";
$xm16="郭晓敏";
$xm17="蔡婷婷";
$xm18="张凯棱";
$xm19="郭小明";
$xm20="王天泽";
$xm21="李珂";
$xb1="男";
$xb2="女";
$mm="123456";
$exec="insert into User values('null','$xm0','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm1','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm2','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm3','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm4','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm5','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm6','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm7','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm8','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm9','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm10','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm11','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm12','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm13','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm14','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm15','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm16','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm17','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm18','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm19','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm20','$xb1','$mm')";
$result=@mysql_query($exec);
$exec="insert into User values('null','$xm21','$xb2','$mm')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','计算机维护与维修','科学技术','钱海','45','4','3')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','Java语言程序设计','科学技术','朱晓龙','50','2','1')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','艺术哲学','哲学伦理','王德峰','51','3','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','先秦两汉文学史','历史人文','李婕','30','2','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','幸福之路','历史人文','罗素','38','5','1')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','明清小说史','历史人文','谭邦和','27','3','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','三国演义','古诗小说','罗贯中','54','6','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','倾城之恋','古诗小说','张爱玲','44','2','1')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','王阳明心学全书','哲学伦理','罗志','38','1','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','论语','古诗小说','韩高年','20','1','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','马克思为什么是对的','政治社会','特里・伊格尔顿','18','2','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','反杜林论','政治社会','恩格斯','23','3','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','剩余价值学说史','政治社会','马克思','31','3','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','家','艺术文学','巴金','41','2','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','呐喊','艺术文学','鲁迅','33','4','1')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','边城','艺术文学','沈从文','31','3','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','无限的清单','艺术文学','翁贝托・艾柯','20','2','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','丑的历史','艺术文学','翁贝托・艾柯','27','1','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','绿山墙的安妮','儿童读物','蒙哥马利','10','2','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','单翼天使不孤单','儿童读物','伍美珍','18','2','')";
$result=@mysql_query($exec);
$exec="insert into Books values('null','到你心里躲一躲','儿童读物','汤汤','20','1','')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','计算机维护与维修','$xm0','2018-11-7')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','Java语言程序设计','$xm0','2018-10-17')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','呐喊','$xm0','2018-9-10')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','计算机维护与维修','$xm1','2018-10-18')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','计算机维护与维修','$xm2','2018-12-10')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','倾城之恋','$xm4','2018-11-11')";
$result=@mysql_query($exec);
$exec="insert into Borrow values('null','幸福之路','$xm5','2018-10-27')";
$result=@mysql_query($exec);
$close=@mysql_close($con)or die("连接失败".mysql_error());
if($close){
	echo "关闭MySQL服务器连接成功！<br/>";
}else{
	exit("关闭MySQL服务器连接失败！程序终止运行！");
}
?>