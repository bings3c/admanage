
<?php  
      header("Content-Type: text/html; charset=UTF-8");
      include '../connect.php';
      $mdn=$_GET['mdn'];
      $deletesql="delete from adhost where AdHostTel=$mdn";
      if(mysql_query($deletesql)){
         echo "<script>alert('删除成功');history.go(-1); </script>";
      }else{
         echo "<script>alert('删除失败');history.go(-1);</script>";
      }

    
  
?>