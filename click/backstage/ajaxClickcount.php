
<?php  
      include 'connect.php';
      $timeSignal=$_GET['time'];
     
      $dTime=date('Y-m-d H:i:s');
      $ymdvalue=explode(" ", $dTime)['0'];

      //获取y年份、m月份和d天
      $yvalues=explode("-", $ymdvalue)['0'];//年份
      $yvalue=intval($yvalues);

      $mvalues=explode("-", $ymdvalue)['1'];//本月
      $mvalue=intval($mvalues);

      $dvalues=explode("-", $ymdvalue)['2'];//今天
      $dvalue=intval($dvalues);
 

      $yesterDay_ymd=date("Y-m-d",strtotime("-1 day"));//昨天Y-m-d
      $y_dvalues=explode("-", $yesterDay_ymd)['2'];//获取昨天d
      $y_dvalue=intval($y_dvalues);
 
      
      $lastMonth_ymd=date("Y-m-d",strtotime("last month"));//上个月Y-m-d
      $last_mvalues=explode("-", $lastMonth_ymd)['1'];//上个月m
      $last_mvalue=intval($last_mvalues);

      $lastYear_ymd=date("Y-m-d",strtotime("-1 years"));//去年Y-m-d
      $lastYears=explode("-",$lastYear_ymd)['0'];//去年y
      $lastYear=intval($lastYears);//整型

      // //根据是否闰年、几月份、当天是几号执行不同策略
      // $thrityoneArray="2,4,6,8,9,11";//上个月是三十一天的月份--1月份单独判断，还要操作年份
      // $thrityArray="5,7,10,12";//上个月是三十天的月份---3月份单独判断,2月份天数与闰年和平年有关
      // $thrityone=explode(',',$thrityoneArray);
      // $thrity=explode(',',$thrityArray);

      // if($dvalue==1){                                     //----今天是1号
      //       if($mvalue==3){                               //----3月份--即3月1号
      //             if(($yvalue%4==0&&$yvalue%100!=0)||($yvalue%400==0)){   //--闰年                     
      //                   $y_dvalue='29';
      //             }else{                                  //--平年
      //                   $y_dvalue='28';
      //             }
      //       }
      //       if(in_array($mvalue,$thrity)){          //--上个月是31天的月份
      //              $y_dvalue='30';
      //       }
      //       if(in_array($mvalue,$thrityone)){       //--上个月是30天的月份
      //              $y_dvalue='31';
      //       }
      //       if($mvalue==1){                         //--一月份（1月1号）
      //             $yvalue=$yvalue-1;
      //             $last_mvalue='12';
      //             $y_dvalue='31';  
      //       }
      // }

      switch ($timeSignal) {
      	case 'today':
      		$sql="select count(AdID) from `adlog` where `OptDay`='$dvalue' and `OptMonth`='$mvalue' and `OptYear`='$yvalue' ";
		      $query=mysql_query($sql);
		      $row=mysql_fetch_array($query);
		      //echo $row['count(AdID)'];
      		break;
      	
      	case 'yesterday':
                  if($dvalue==1){
                        if($mvalue==1){//一月1号
                              $sql="select count(AdID) from `adlog` where `OptDay`='$y_dvalue' and `OptMonth`='$last_mvalue' and `OptYear`='$lastYear' ";
                        }else{//其他月份1号
                              $sql="select count(AdID) from `adlog` where `OptDay`='$y_dvalue' and `OptMonth`='$last_mvalue' and `OptYear`='$yvalue' ";
                        }
                        
                  }else{//非一号
                        $sql="select count(AdID) from `adlog` where `OptDay`='$y_dvalue' and `OptMonth`='$mvalue' and `OptYear`='$yvalue' ";
                  }                 
		      $query=mysql_query($sql);
		      $row=mysql_fetch_array($query);
		      //echo $row['count(AdID)'];
      		break;

      	case 'thisMonth':
      		$sql="select count(AdID) from `adlog` where `OptMonth`='$mvalue' and `OptYear`='$yvalue' ";
		      $query=mysql_query($sql);
		      $row=mysql_fetch_array($query);
		      //echo $row['count(AdID)'];
      		break;

      	case 'lastMonth':
                  if($mvalue==1){//本月是一月份
                        $sql="select count(AdID) from `adlog` where `OptMonth`='$last_mvalue' and `OptYear`='lastYear' ";
                  }else{
                        $sql="select count(AdID) from `adlog` where `OptMonth`='$last_mvalue' and `OptYear`='$yvalue' ";
                  }
		      $query=mysql_query($sql);
		      $row=mysql_fetch_array($query);
		      //echo $row['count(AdID)'];
      		break;

            case 'thisYear':
                 
                  $sql="select count(AdID) from `adlog` where `OptYear`='$yvalue' ";

                  $query=mysql_query($sql);
                  $row=mysql_fetch_array($query);
                  //echo $row['count(AdID)'];
                  break;
      		
      }
      echo $row['count(AdID)'];

  
?>