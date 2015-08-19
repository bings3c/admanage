
<?php  
      include 'connect.php';
      date_default_timezone_set('Asia/Shanghai');
      $Now=date("Y-m-d H:i:s");
      $ymd=explode(" ", $Now)['0'];//获取今天Y-m-d

      $years=explode("-", $ymd)['0'];//获取当前年份
      $year=intval($years);//整型

      $thisMonths=explode("-", $ymd)['1'];//获取当前月份
      $thisMonth=intval($thisMonths);//整型

      $todays=explode("-", $ymd)['2'];//获取今天d
      $today=intval($todays);//整型

      $thisMonth=explode("-", $ymd)['1'];
      $thisMonth=intval($thisMonths);//整型

      $lastMonth_ymd=date("Y-m-d",strtotime("last month"));//上个月Y-m-d
      $lastMonths=explode("-",$lastMonth_ymd)['1'];//上个月m
      $lastMonth=intval($lastMonths);//整型

      $lastYear_ymd=date("Y-m-d",strtotime("-1 years"));//去年Y-m-d
      $lastYears=explode("-",$lastYear_ymd)['0'];//去年y
      $lastYear=intval($lastYears);//整型

      //根据是否闰年、几月份、当天是几号执行不同策略
      $thrityoneArray="5,7,10,12";//三十一天的月份--1，8月份单独判断，涉及到上个月份操作；3月份单独判断，还要操作上个月（2月份）
      $thrityArray="4,6,9,11";//三十天的月份---3月份单独判断,2月份天数与闰年和平年有关
      $thrityone=explode(',',$thrityoneArray);
      $thrity=explode(',',$thrityArray);

      $thisMontharray= array();
      $lastMontharray= array();

      if($thisMonth==1||$thisMonth==8){
          $thisMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30","31"];  
          $lastMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30","31"];  
      }

      if($thisMonth==2){
        if(($year%4==0&&$year%100!=0)||($year%400==0)){   //--闰年                     
                $thisMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29"];  
              
        }else{                                  //--平年
                $thisMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28"];     
        }
        $lastMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30","31"];  
      }

       if($thisMonth==3){ 
              $thisMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30","31"];  
            if(($year%4==0&&$year%100!=0)||($year%400==0)){   //--闰年       
                    $lastMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                    "20","21","22","23","24","25","26","27","28","29"];  
                  
            }else{                                            //--平年
                    $lastMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                    "20","21","22","23","24","25","26","27","28"];     
            }
       
      }

      if(in_array($thisMonth,$thrityone)){
              $thisMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30","31"];  
              $lastMontharray==["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30"];  
      }
      if(in_array($thisMonth,$thrity)){
              $thisMontharray=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30"];  
              $lastMontharray==["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19",
                "20","21","22","23","24","25","26","27","28","29","30","31"];  
      }

      $timeSignal=$_GET['time'];
     
      $clicks=array();
      switch ($timeSignal) {
        case 'thisMonth':
          for($i=0;$i<count($thisMontharray);$i++){
            $sql="select count(AdID) from adlog where `OptDay`='$thisMontharray[$i]' and `OptMonth`='$thisMonth' and `OptYear`='$year' ";
            $res=mysql_query($sql);
            $row=mysql_fetch_array($res);
            array_push($clicks,$row['count(AdID)']); 
          }
          array_push($clicks,"-");
          for($j=0;$j<count($thisMontharray);$j++){
               array_push($clicks,$thisMontharray[$j]);
          }
          break;
        
        case 'lastMonth':
          for($i=0;$i<count($lastMontharray);$i++){
            if($thisMonth==1){
             $sql="select count(AdID) from `adlog` where `OptDay`='$lastMontharray[$i]' and `OptMonth`='$lastMonth' and `OptYear`='$lastYear' ";
            }else{
             $sql="select count(AdID) from `adlog` where `OptDay`='$lastMontharray[$i]' and `OptMonth`='$lastMonth' and `OptYear`='$year' ";
            }
            $res=mysql_query($sql);
            $row=mysql_fetch_array($res);
            array_push($clicks,$row['count(AdID)']);
          
          }
          array_push($clicks,"-");
          for($j=0;$j<count($lastMontharray);$j++){
               array_push($clicks,$lastMontharray[$j]);
          }
         break;
      }

      
      echo json_encode($clicks);
  
  

    
     //  $query=mysql_query($sql);
     //  if($query&&mysql_num_rows($query)){
     //    while ($row=mysql_fetch_assoc($query)) {
     //      $value[]=$row['clickTime'];
     //    }
     //  }

     //  //获取yy-mm-dd格式的时间数组
     //  $ymdvalue= array();
     //     foreach($value as $yvalue){
     //     $ymd_value=explode(" ", $yvalue)['0'];
     //     array_push($ymdvalue,$ymd_value);
     //  }

     //  //获取hh:mm:ss格式的时间数组
     //  $hvalue= array();
     //     foreach($value as $dvalue){
     //     $datevalue=explode(" ", $dvalue)['1'];
     //     array_push($hvalue,$datevalue);
     //  }
     // //print_r($hvalue);
     
     //  //获取mm时间数组
     //  $datam=array();
     //    foreach($ymdvalue as $mval){
     //    $mvalue=explode("-", $mval)['1'];
     //    array_push($datam,$mvalue);
     //  }
     //  //print_r($datam);

     //   //获取dd时间数组
     //  $datad=array();
     //    foreach($ymdvalue as $dval){
     //    $dvalue=explode("-", $dval)['2'];
     //    array_push($datad,$dvalue);
     //  }
     //  //print_r($datad);


     // //获取hh时间数组
     //  $datah=array();
     //    foreach($hvalue as $hval){
     //    $rvalue=explode(":", $hval)['0'];
     //    array_push($datah,$rvalue);
     //  }

?>

