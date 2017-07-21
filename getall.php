<?php
/* //链接服务器
//执行指定的代码，如果出错就在catch中抛出错误；
try{
    $pdo=new PDO("mysql:host=localhost;dbname=web13","root","");
}catch (PDOException $e){
   echo $e->getMessage();
   //$e=new PDOException();
   //PDOException()内置类
   //php中对象的属性和方法是->调用$e的getMessage()方法。
}
//设置操作数据库字符集
$pdo->query("set names utf8"); */
include 'common.php';
$total=$pdo->query("select * from member")->rowCount();
//总记录数；
// echo $total;
$pagesize=3;//每页显示数据的条数
//总页数
$pagetotal=ceil($total/$pagesize);
//查询的sql语句
if($_GET['page']){
    $page=$_GET['page'];
    if($page>=$pagetotal){
        //当前页大于总页数时就等于总特殊
        $page=$pagetotal;
    }
}else{
    
    $page=1;
}
$sql="select * from member order by id desc limit ".($page-1)*$pagesize.",".$pagesize;
$result=$pdo->query($sql);
$data=$result->fetchAll(PDO::FETCH_OBJ);
echo "<table border='1' align='center' width=90% cellpadding=0 cellspacing=0>";
echo "<tr><th>用户名</th><th>邮箱</th><th>注册时间</th><th>操作</th><tr>";
foreach ($data as $key=>$value){
//     var_dump($value->username);
echo "<tr>";
echo "<td>".$value->username."</td>";
echo "<td>".$value->email."</td>";
echo "<td>".$value->regTime."</td>";
echo "<td>";
echo "<a href='update.php?id=".$value->id."'>修改</a>&nbsp;&nbsp;&nbsp;";
echo "<a href='delete.php?id=".$value->id."'>删除</a>";
echo "</td>";
echo "</tr>";
}
echo "<tr><td colspan='4'><a href='add.php'>添加数据</a></td></tr>";
echo "</table>";
echo "<div class='page'>";
echo "<ul>";
echo "<li><a href='?page=".($page-1)."'>上一页</a></li>";
echo "<li><a href='?page=".($page+1)."'>下一页</a></li>";
echo "<li><input type='text' value='".$page."'class='changePage'></li>";
echo "<li><span class='present'>".$page."</span>/".$pagetotal."</li>";
echo "</ul>";
echo "</div>";
/* echo "<pre>";
var_dump($result->fetchAll(PDO::FETCH_OBJ));
// 结果集对象的方法
// $result->fetchAll();
// 返回一个包含所有结果集条数的数组
echo "</pre>"; */
?>
<style>
.page{
	border:1px solid green;
}
.page ul{
	text-align:center;
}
.page ul li{
	display:inline-block;
	margin-left:5px;
}
.present{
	color:red;
}
.changPage{
	width:20px;
}
</style>
<script>
var changePage=document.querySelector(".changePage");
changePage.addEventListener("keyup",function(){
	location.href="?page="+this.value;
console.log(location.href);
})

</script>



