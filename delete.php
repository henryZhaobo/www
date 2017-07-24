<?php
include 'common.php';
include 'checklogin.php';
//如果id为真的话
if($_GET['id']){
    $sql="delete from member where id=".$_GET['id'];
    $result=$pdo->exec($sql);
    if($result){
        echo "<script>alert('数据删除成功');
location.href='getall.php';
</script>";
//         header("location:getall.php");
    }else {
        echo "<script>alert('失败');location.href='getall.php'</script>";
    }
}else {
    //跳转：防止用户直接访问delete.php
    header("localtion:getall.php");
}
?>