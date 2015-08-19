<?php  
      include 'connect.php';
      date_default_timezone_set('Asia/Shanghai');
      $Now=date("Y-m-d H:i:s");
      $ymd=explode(" ", $Now)['0'];//获取今天Y-m-d
      $years=explode("-", $ymd)['0'];//获取当前年份
      $year=intval($years);//整型
      
      $timeSignal=$_GET['time'];

      $clicks=array();
      for($i=1;$i<=12;$i++){
        $sql="select count(AdID) from adlog where `OptMonth`='$i' and `OptYear`='$year' ";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        $res=mysql_query($sql);  
        $row=mysql_fetch_array($res);
        array_push($clicks,$row['count(AdID)']);
      }

      echo json_encode($clicks);
  
?>
