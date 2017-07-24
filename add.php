<?php
include 'common.php';
include 'checklogin.php';
// var_dump($_POST);
if($_POST['send']){
    if($_POST['username']){
        
    }else {
        echo "<script>alert('未写用户名')
                 history.go(-1)
</script>";
        return false;
    }
    if($_POST['pwd']){
        
    }else {
        echo "<script>alert('未写密码')
                 history.go(-1)
</script>";
        return false;
    }
    $searchSql="select * 
                from member
                 where username='".$_POST['username']."'";
    $searchResult=$pdo->query($searchSql);
    $oneUser=$searchResult->fetchAll(PDO::FETCH_OBJ);
    var_dump($oneUser[0]);
    if($oneUser){
        echo "<script>alert('该用户名存在')
                 history.go(-1)
</script>";
    }
  
    
    //添加数据
    $sql="insert into member (
username,
pwd,
email,
regTime
)values(
'".$_POST['username']."',
'".md5($_POST['pwd'])."',
'".$_POST['email']."',
'".date('Y-m-d H:i:s')."'
)";
//     echo $sql;
$result=$pdo->exec($sql);
if($result){
    echo "ok";
    echo "<script>alert('数据添加成功');
location.href='getall.php';
</script>";
}else {
    echo "fail";
}
    
}
?>


<!-- <form action='' method="post" class="reg"> -->
<!-- 用户名：<input type="text" name="username"><br> -->
<!-- 密码：<input type="password" name="pwd"><br> -->
<!-- email：<input type="text" name="email"><br> -->
<!-- <input type="submit" name="send" value="submit"> -->
<!-- </form> -->
<form class="form-horizontal" action='' method="post">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password"  name="pwd" class="form-control"  placeholder="Password">
        
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" name="email" class="form-control email"  placeholder="Email" id="email">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <input type="submit"  name="send" class="btn btn-default add" value='Submit'>
      </div>
    </div>
  </fieldset>
</form>
<script src=Tools.js></script>
<script>
var addbtn=document.querySelector(".add")
var email=document.querySelector(".email")
 console.log(email);
addbtn.addEventListener("click",function(){
if(!validate_email(email.value)){
	alert("邮箱格式不正确")；
	evt.preventDfault();
}
	//阻止
evt.preventDefault();
})
</script>
<style>
.form-horizontal{
	width:70%;
	margin:0 auto;
}
.reg input{
	margin-top:5px;
	width:90%;
}
.form-horizontal input{
	width:50%;
}
.form-horizontal .add{
	width:80px;
}
</style>
 <link rel="stylesheet" href="https://bootswatch.com/cyborg/bootstrap.css">