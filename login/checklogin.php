<?php  
    require_once('../include/connect.php'); 
    $user = $_POST['user'];  
    $password = $_POST['password'];  
    $sql="select * from admin where name='$user' and password='$password'";
    $query=mysql_query($sql);
    if($result=mysql_fetch_array($query)){
    	$_SESSION['user'] = $user;
    }
    echo json_encode($result);
  ?>  

