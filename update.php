<?php
include 'common.php';
if($_GET['id']){
    $sql="select * from member where id=".$_GET['id'];
//     echo $sql;
    $result=$pdo->query($sql);
    $data=$result->fetchAll(PDO::FETCH_OBJ);
//     var_dump($data[0]);
if($data[0]==null){
    echo "数据不存在";
}
if($_POST['send']){
    if($_POST['pwd2']==$_POST['pwd']){
        $pwd=$_POST['pwd'];
    }else {
        $pwd=md5($_POST['pwd']);
    }
    $sql= "update member set username='".$_POST['username']."',
                              pwd='".$pwd."',
                               email='".$_POST['email']."'
where id=".$_GET['id'];
    $result=$pdo->exec($sql);
    if($result){
        echo "<script>alert('数据修改成功');
location.href='getall.php';
</script>";
    }else if ($result==0){
            echo "未修改";
        }else {
            echo "修改失败";
        }
}
}else {
    header("location:getall.php");
}
?>
<style>
.reg{
	border:1px,solid black;
	position:absolute;
	padding:15px;
	left:0;
	right:0;
	top:0;
	bottom:0;
	margin:auto;
	width:205px;
	height:136px;
	box-shadow:0 0 3px #ddd;
}
.reg input{
	margin-top:5px;
	width:90%;
}
</style>
<form action='' method="post" class="reg">
<input type="hidden" name=pwd2 value=<?php echo $data[0]->pwd;?>>
用户名：<input type="text" name="username" value=<?php echo $data[0]->username;?>><br>
密码：<input type="password" name="pwd" value=<?php echo $data[0]->pwd;?>><br>
email：<input type="text" name="email" value=<?php echo $data[0]->email;?>><br>
<input type="submit" name="send" value="submit">
</form>