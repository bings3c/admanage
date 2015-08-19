
<?php  

    require('../connect.php');

    $adhostname=$_GET['adhostname'];
    $adhostTel=$_GET['adhostTel'];
    $adhostaddress=$_GET['adhostaddress'];

    $insertAdhost=mysql_query("insert into adhost (`AdHostName`,`AdHostTel`,`AdHostAddress`,`AdHostAdMoney`,`AdHostRealMoney`) values ('$adhostname','$adhostTel','$adhostaddress','1000','100')");

    if($insertAdhost){
      echo "1";
    }else{
      echo "0";
    }
    
?>