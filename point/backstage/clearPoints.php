
<?php  
	  header("Content-Type: text/html; charset=UTF-8");
      include '../connect.php';
      $mdn=$_GET['mdn'];
      $clearSql = mysql_query("UPDATE aduser SET RemainingPoints =0 WHERE AdUserPhone='$mdn'");
      if(mysql_query($clearSql )){
         echo "<script>alert('积分清零成功');history.go(-1); </script>";
      }else{
         echo "<script>alert('积分清零失败');history.go(-1);</script>";
      }

    
  
?>