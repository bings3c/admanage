<!DOCTYPE html>
<html>
<head>
<title>北京电信广告管家</title>
<meta charset="utf-8">
<meta name="author" content="caohaitao">
<meta name="keywords" content="北京电信，广告管家">
<meta name="description" content="北京电信广告管家">
<script type="text/javascript" src="./include/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./include/bootstrap.min.js"></script>
<script type="text/javascript" src="./include/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./include/highcharts.js"></script>
<script type="text/javascript" src="./include/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="./include/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./include/sweetalert.css">
<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<style type="text/css">
table thead tr th {text-align:center; }
table tbody tr td {padding: 2px 10px}
</style>
<body style="font-family:microsoft yahei">
<!--显示用户名\退出登录-->
<?php
	error_reporting(E_ALL & ~E_NOTICE); 
	session_start();

 //    if(isset($_SESSION['username']) && $_SESSION['username'] !== ''){
	// 	$username =$_SESSION['username'];
	// }else{
	// 	echo "<script type='text/javascript'>alert('请先登录')</script>";
	// 	echo "<script type='text/javascript'>window.location.href='./login/index.html'</script>";
	// }
	$_session['username']=$_GET['username'];
	if(!isset($_session['username'])){
    	echo "<script type='text/javascript'>alert('请先登录')</script>";
		echo "<script type='text/javascript'>window.location.href='./login/index.html'</script>";
	}else{
		$username=$_session['username'];
	}
?>
<!--logo-->
<div style="width:20%;height:100px;float:left">
	<img src="./img/logo1.jpg">
</div>

<div style="width:10%;height:75px;margin-top:25px;float:right">
	<a id="exitnow" data-toggle="modal" data-target="#exitModal" class="btn btn-primary">退出</a>
</div>
	
<div style="width:10%;height:75px;margin-top:25px;float:right">
	<span style="font-size:20px;"><?php echo $username;?></span>
</div>


<div class="container" id="summary-container" style="width:96%">
	<div style="width:100%;height:10px;padding:120px 10px 10px" ></div>
	<ul class="nav nav-tabs" role="tablist" id="tab-list">
		  <li class="active" onmouseover="movein(0)" onmouseout="moveout()">
		  <a href="#admanage" data-toggle="tab" role="tab" >广告任务管理</a>
		  </li>
		  <li onmouseover="movein(1)" onmouseout="moveout()">
		  <a href="#clickcount" role="tab" data-toggle="tab" >广告统计报告</a>
		  </li>
		  <li onmouseover="movein(2)" onmouseout="moveout()">
		  <a href="#userpoint" role="tab" data-toggle="tab" >用户积分管理</a>
		  </li>
		  <li onmouseover="movein(3)" onmouseout="moveout()">
		  <a href="#adhost" role="tab" data-toggle="tab" >广告主管理</a>
		  </li>
		  <li onmouseover="movein(4)" onmouseout="moveout()">
		  <a href="#floatmanage" role="tab" data-toggle="tab">流量卡密管理</a>
		  </li>
	</ul>

	<!--广告管理-->
	<ul id="ul0" class="nav nav-pills" onmouseover="movein(0)" onmouseout="moveout()" style="display:none;">
	   <li class="active"><a href="#">Home</a></li>
	   <li><a href="#">SVN</a></li>
	   <li><a href="#">iOS</a></li>
	   <li><a href="#">VB.Net</a></li>
	   <li><a href="#">Java</a></li>
	   <li><a href="#">PHP</a></li>
	</ul>
	<!--效果管理-->
	<ul id="ul1" class="nav nav-pills" onmouseover="movein(1)" onmouseout="moveout()" style="display:none;">
	   <li class="active"><a href="#">Home</a></li>
	   <li><a href="#">SVN0</a></li>
	   <li><a href="#">iOS</a></li>
	   <li><a href="#">VB.Net</a></li>
	   <li><a href="#">Java</a></li>
	   <li><a href="#">PHP</a></li>
	</ul>
	<!---用户积分-->
	<ul id="ul2" class="nav nav-pills" onmouseover="movein(2)" onmouseout="moveout()" style="display:none;">
	   <li class="active"><a href="#">Home</a></li>
	   <li><a href="#">SVN1</a></li>
	   <li><a href="#">iOS</a></li>
	   <li><a href="#">VB.Net</a></li>
	   <li><a href="#">Java</a></li>
	   <li><a href="#">PHP</a></li>
	</ul>
	<!---广告币-->
	<ul id="ul3" class="nav nav-pills" onmouseover="movein(3)" onmouseout="moveout()" style="display:none;">
	   <li class="active"><a href="#">Home</a></li>
	   <li><a href="#">SVN2</a></li>
	   <li><a href="#">iOS</a></li>
	   <li><a href="#">VB.Net</a></li>
	   <li><a href="#">Java</a></li>
	   <li><a href="#">PHP</a></li>
	</ul>
	<!---流量管理-->
	<ul id="ul4" class="nav nav-pills" onmouseover="movein(4)" onmouseout="moveout()" style="display:none;">
	   <li class="active"><a href="#">Home</a></li>
	   <li><a href="#">SVN3</a></li>
	   <li><a href="#">iOS</a></li>
	   <li><a href="#">VB.Net</a></li>
	   <li><a href="#">Java</a></li>
	   <li><a href="#">PHP</a></li>
	</ul>

<!--导航显示-->
<script type="text/javascript" src="./click/js/moveInOut.js"></script>

<div class="tab-content" style="margin-top:20px;">

<!----------------------------广告任务管理 开始------------------------------------>
		<div class="tab-pane active" id="admanage">
			<div class="row feature">
				<div class="col-md-3" style="border:1px solid #DDDDDD">
					<p class="lead">Google Chrome，又称Google浏览器，是一个由Google（谷歌）公司开发的网页浏览器。该浏览器是基于其他开源软件所撰写，包括WebKit，目标是提升稳定性、速度和安全性，并创造出简单且有效率的使用者界面。</p>
				</div>
				<div class="col-md-9">
					
				</div>
			</div>
		</div>
<!----------------------------广告任务管理 结束------------------------------------>

<!----------------------------点击统计报告 开始------------------------------------>
		<div class="tab-pane" id="clickcount">
			<div class="row feature">
				<div class="col-md-3" style="border:1px solid #DDDDDD">
					<ul id="ulist" class="list-group" style="margin-top:20px">
						<?php
							require('./include/connect.php');
							$sql1="select * from admaininformation ";
							$query1=mysql_query($sql1);
							if($query1&&mysql_num_rows($query1)){
								while ($row1=mysql_fetch_assoc($query1)) {
									$data1[]=$row1;
								}

							}else{
								$data1=array();
							}
						?>
						<?php
							if(!empty($data1)){
								foreach ($data1 as $value1) {		
						?>
						     
							<li class="list-group-item" onclick=""> <?php echo $value1['AdName']?></li>
						<?php 
								}
							}
						?>
						
					
					</ul>
				</div>

				<div class="col-md-9">
					<div style="width:100%;border:1px solid #DDDDDD">
						<span style="font-size:16px"><b>广告报告</b></span>
						<div style="margin-top:10px">
							<ol class="breadcrumb">
							  <li class="active"><a href="#" id="triggera" onclick="getData('today')">今天</a></li>
							  <li><a href="#" onclick="getData('yesterday')">昨天</a></li>
							  <li><a href="#" onclick="getData('thisMonth')">本月</a></li>
							  <li><a href="#" onclick="getData('lastMonth')">上月</a></li>
							  <li><a href="#" onclick="getData('thisYear')">今年</a></li>
							</ol>
						</div>
						<hr class="divider">
						<table class="tableb" style="cellspacing:20">
							<thead style="line-height:30px;">
								<tr>
									<th id="showvol">0</th>
									<th id="clickvol">0</th>
									<th id="convervol">0</th> 
								</tr>
							</thead>
							<tbody style="line-height:30px">
								<tr>
									<td>展现量</td>
									<td>点击量</td>
									<td>成功转化量</td>
								</tr>
							</tbody>
						</table>

						<hr class="divider">
						<div id="container" style="min-width:900px;">
							
						</div>
					</div>
				</div>

			</div><!--div class="col-md-9"-->
		</div>

			<!--触发点击今天-->
			<script type="text/javascript">
			function triggerClick(){

				var Ul=document.getElementById("ulist"); //获取Ul

				function getByClass(oParent, sClass) { //根据class获取元素
				        var oReasult = [];
				        var oEle = oParent.getElementsByTagName("*");
				        for (i = 0; i < oEle.length; i++) {
				            if (oEle[i].className == sClass) {
				                oReasult.push(oEle[i])
				            }
				        };
				        return oReasult;
				}

				var ulArray=getByClass(Ul,'list-group-item');//调用getByClass(),获取数组

				for (var j=1;j<=ulArray.length;j++){ 
					ulArray[j].id="li"+j;//循环给li添加id
					midfunc(j);
					
				} 

				function midfunc(j){ 
						$("#li"+j).click(function(){//循环添加点击事件

							t(j);
						});	
				} 
				 
				
			}

			function triggerClickcount(j){
				var triggerClick=setTimeout(function(){
					$("#triggera").trigger("click");

				},200);
			}
				
			</script>
			<!--引入点击量和绘图js-->
			<script type="text/javascript">
				function getData(value){

					countClicks(value);//-------------clickCount.js
					getCharts(value); //---------------triggerClickChart.js

				}
			</script>
			
			<!--引入js统计点击量-->
			<script type="text/javascript" src="./click/js/clickCount.js"></script>
			<!--引入js绘图-->
		    <script type="text/javascript" src="./click/js/triggerClickChart.js"></script>
<!----------------------------点击统计报告 结束------------------------------------>

<!----------------------------用户积分管理 开始------------------------------------>

		<div class="tab-pane" id="userpoint">
				<div class="row feature">
					<div class="col-md-12" style="border:1px solid #DDDDDD">
						<?php
								$page_num =15;//每页记录数
						        if (!isset($_GET['page_no']))//page_no 空
						          {
						              $page_no = 1;
						          }
						        else {
						            $page_no = $_GET['page_no'];
						        }
						          $start_num = $page_num * ($page_no - 1);//起始行号
						          $sqlp = "SELECT * from aduser limit $start_num, $page_num";
							$resultp=mysql_query($sqlp);
						  	$numsp = mysql_num_rows($resultp); 
							if($resultp&&mysql_num_rows($resultp)){
								while($rowp=mysql_fetch_assoc($resultp)){
									$datap[]=$rowp;
								}
							}
							//判断当前页码-------------end------------------------------
						?>
						<?php
							require_once('./include/connect.php');
							$sql2="select * from aduser";
							$query2=mysql_query($sql2);
							if($query2&&mysql_num_rows($query2)){
								while ($row2=mysql_fetch_assoc($query2)) {
									$data2[]=$row2;
								}

							}else{
								$data2=array();
							}
						?>
						<table class="table table-hover">
							  <thead>
							      <tr>
							         <th>用户ID</th>
							         <th>用户手机号</th>
							         <th>积分数</th>
							         <th>被投放广告数量</th>
							         <th>点击数量</th>
							         <th>转化数量</th>
							         <th>操作</th>
							      </tr>
							  </thead>
							  <tbody>
								<?php
								if(!empty($data2)){
									foreach ($data2 as $value2) {		
							    ?>
								<tr style="text-align:center">
									<td><?php $id=$value2['AdUserID'];echo $id;?></td>
									<td><?php $mdn=$value2['AdUserPhone'];echo $mdn;?></td>
									<td><?php $points=$value2['RemainingPoints'];echo $points;?></td>
									<td><?php $userShow=$value2['UserShow'];echo $userShow;?></td>
									<td><?php $userClick=$value2['UserClick'];echo $userClick;?></td>
									<td><?php $userConver=$value2['UserConver'];echo $userConver;?></td>
									<td>
									<a href="javascript:if(confirm('确认删除吗?'))window.location='./point/backstage/userDel.php?mdn=<?php echo $value2['AdUserPhone']?>' ">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="javascript:if(confirm('确认将积分清零?'))window.location='./point/backstage/clearPoints.php?mdn=<?php echo $value2['AdUserPhone']?>' ">清零</a>
					
									</td>
									</tr>
								<?php 
										}
									}
								?>
							</tbody>
						</table>
						
						
						<div id="menu">
				  		<span id="jilu1">显示<?php echo $numsp; ?>条记录</span>
				   		 <span id="jilu2">
						<?php
							$sqlp1 = "SELECT * from aduser ";
							$resultp1 = mysql_query($sqlp1);
							$numssp1 = mysql_num_rows($resultp1);
							$page = ceil($numssp1/$page_num);
						    if ($page_no > 1) {
						            echo "<a href ='admanage.php?page_no=".($page_no-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
						        }else{
						            echo '<span>上一页</span>&nbsp;&nbsp;&nbsp;';
						        }
						        echo '<strong>第'.$page_no.'页/共'.$page.'页</strong>';
						        if ($numsp == $page_num) {
						            echo "&nbsp;&nbsp;&nbsp;<a href ='admanage.php?page_no=".($page_no+1)."'>下一页</a>";
						        }else{
						            echo '&nbsp;&nbsp;&nbsp;<span>下一页</span>';
						        }
						?>
					    </span>          
					    </div>
	<!------------------------分页end-------------------------->
					</div>
				</div>
		</div>
<!----------------------------用户积分管理 结束------------------------------------>

<!----------------------------广告主管理 开始------------------------------------>
		<div class="tab-pane" id="adhost">
				<div class="row feature">

					<div class="col-md-12" style="border:1px solid #DDDDDD">
						<?php
								$page_num2 =15;//每页记录数
						        if (!isset($_GET['page_no2']))//page_no 空
						          {
						              $page_no2 = 1;
						          }
						        else {
						            $page_no2 = $_GET['page_no2'];
						        }
						          $start_num2 = $page_num2 * ($page_no2 - 1);//起始行号
						          $sqlp2 = "SELECT * from adhost limit $start_num2, $page_num2";
							$resultp2=mysql_query($sqlp2);
						  	$numsp2 = mysql_num_rows($resultp2); 
							if($resultp2&&mysql_num_rows($resultp2)){
								while($rowp2=mysql_fetch_assoc($resultp2)){
									$datap2[]=$rowp2;
								}
							}
							//判断当前页码-------------end------------------------------
						?>
						<?php
							require_once('./include/connect.php');
							$sql3="select * from adhost";
							$query3=mysql_query($sql3);
							if($query3&&mysql_num_rows($query3)){
								while ($row3=mysql_fetch_assoc($query3)) {
									$data3[]=$row3;
								}

							}else{
								$data3=array();
							}
						?>
						<div id="addHost" data-toggle="modal" data-target="#myModal"; style="width:10%;height:30px;float:right;margin-top:10px">
							<a class="btn btn-success">添加广告主</a>
						</div>
							<hr class="divider" style="margin-top:50px;margin-bottom:10px">
						<table class="table table-hover">
							  <thead>
							      <tr>
							         <th>广告主编号</th>
							         <th>广告主名称</th>
							         <th>广告主联系方式</th>
							         <th>广告主联系地址</th>
							         <th>广告币</th>
							         <th>实际金额</th>
							         <th>操作</th>
							      </tr>
							  </thead>
							  <tbody>
								<?php
								if(!empty($data3)){
									foreach ($data3 as $value3) {		
							    ?>
								<tr style="text-align:center">
									<td><?php $id=$value3['AdHostID'];echo $id;?></td>
									<td><?php $name=$value3['AdHostName'];echo $name;?></td>
									<td><?php $mdn=$value3['AdHostTel'];echo $mdn;?></td>
									<td><?php $address=$value3['AdHostAddress'];echo $address;?></td>
									<td><?php $admoney=$value3['AdHostAdMoney'];echo $admoney;?></td>
									<td><?php $realmoney=$value3['AdHostRealMoney'];echo $realmoney;?></td>
									<td>
									<a href="javascript:if(confirm('确认删除吗?'))window.location='./adhost/backstage/delHost.php?mdn=<?php echo $value3['AdHostTel']?>' ">删除</a>
									<!--  -->
					
									</td>
									</tr>
								<?php 
										}
									}
								?>
							</tbody>
						</table>
						
						
						<div id="menu2">
				  		<span id="jilu2">显示<?php echo $numsp2; ?>条记录</span>
				   		 <span id="jilu">
						<?php
							$sqlp2 = "SELECT * from adhost ";
							$resultp2 = mysql_query($sqlp2);
							$numssp2 = mysql_num_rows($resultp2);
							$page2 = ceil($numssp2/$page_num2);
						    if ($page_no2 > 1) {
						            echo "<a href ='admanage.php?page_no2=".($page_no2-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
						        }else{
						            echo '<span>上一页</span>&nbsp;&nbsp;&nbsp;';
						        }
						        echo '<strong>第'.$page_no2.'页/共'.$page2.'页</strong>';
						        if ($numsp2 == $page_num2) {
						            echo "&nbsp;&nbsp;&nbsp;<a href ='admanage.php?page_no2=".($page_no2+1)."'>下一页</a>";
						        }else{
						            echo '&nbsp;&nbsp;&nbsp;<span>下一页</span>';
						        }
						?>
					    </span>          
					    </div>
						
						
					</div>
				</div>
		</div>
<!----------------------------广告主管理 结束------------------------------------>

<!----------------------------流量卡密管理 开始------------------------------------>
		<div class="tab-pane" id="floatmanage">
				<div class="row feature">
					<div class="col-md-12" style="border:1px solid #DDDDDD">
						<?php
								$page_num3 =15;//每页记录数
						        if (!isset($_GET['page_no3']))//page_no 空
						          {
						              $page_no3 = 1;
						          }
						        else {
						            $page_no3 = $_GET['page_no3'];
						        }
						          $start_num3 = $page_num3 * ($page_no3 - 1);//起始行号
						          $sqlp3 = "SELECT * from floatcard limit $start_num3, $page_num3";
							$resultp3=mysql_query($sqlp3);
						  	$numsp3 = mysql_num_rows($resultp3); 
							if($resultp3&&mysql_num_rows($resultp3)){
								while($rowp3=mysql_fetch_assoc($resultp3)){
									$datap3[]=$rowp3;
								}
							}
							//判断当前页码-------------end------------------------------
						?>
						<?php
							require_once('./include/connect.php');
							$sql4="select * from floatcard";
							$query4=mysql_query($sql4);
							if($query4&&mysql_num_rows($query4)){
								while ($row4=mysql_fetch_assoc($query4)) {
									$data4[]=$row4;
								}

							}else{
								$data4=array();
							}
						?>
						<!-- <div id="addHost" data-toggle="modal" data-target="#myModal"; style="width:10%;height:30px;float:right;margin-top:10px">
							<a class="btn btn-success">添加广告主</a>
						</div> -->
							<hr class="divider" style="margin-top:50px;margin-bottom:10px">
						<table class="table table-hover">
							  <thead>
							      <tr>
							         <th>流量卡编号</th>
							         <th>流量卡卡号</th>
							         <th>流量卡密码&nbsp;|&nbsp;<button type="button" class="btn btn-info btn-xs" onclick="jpwd()">显示明文密码</button> </th>
							         <th>流量卡类型</th>
							         <th>激活状态</th>
							         <th>用户手机号</th>
							         <th>用户所花积分数</th>
							         <th>操作</th>
							      </tr>
							  </thead>
							  <tbody>
								<?php
								if(!empty($data4)){
									foreach ($data4 as $value4) {		
							    ?>
								<tr style="text-align:center">
									<td><?php $id=$value4['TrafficCardID'];echo $id;?></td>
									<td><?php $num=$value4['TrafficCardNum'];echo $num;?></td>
									<td id="pwd"><?php $md5pwd=$value4['md5Pwd'];echo $md5pwd;?></td>
									<td><?php $type=$value4['TrafficCardType'];echo $type;?></td>
									<td><?php $state=$value4['state'];echo $state;?></td>
									<td><?php $mdn=$value4['AdUserPhone'];echo $mdn;?></td>
									<td><?php $UserPoints=$value4['UserPoints'];echo $UserPoints;?></td>
									<td>
									<a href="javascript:if(confirm('确认删除吗?'))window.location='./floatcard/backstage/delfloat.php?mdn=<?php echo $mdn ?>' ">删除</a>
									<!--  -->
					
									</td>
									</tr>
								<?php 
										}
									}
									
								?>

							</tbody>
						</table>
		
						<script type="text/javascript">
							function jpwd(){
								$.ajax({
									type:"POST",
									url:"./floatcard/backstage/password.php",
									dataType:"json",
									success:function(data){
										console.log(data);
							                 $("#pwd").text(data);
									},
									 error:function(){      
										  alert("异常！");    
							     		}   
								});  
								
							}
							
						</script>
						
						<div id="menu3">
				  		<span id="jilu3">显示<?php echo $numsp3; ?>条记录</span>
				   		 <span id="jilu">
						<?php
							$sqlp3 = "SELECT * from floatcard ";
							$resultp3 = mysql_query($sqlp3);
							$numssp3 = mysql_num_rows($resultp3);
							$page3 = ceil($numssp3/$page_num3);
						    if ($page_no3 > 1) {
						            echo "<a href ='admanage.php?page_no3=".($page_no3-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
						        }else{
						            echo '<span>上一页</span>&nbsp;&nbsp;&nbsp;';
						        }
						        echo '<strong>第'.$page_no3.'页/共'.$page3.'页</strong>';
						        if ($numsp3 == $page_num3) {
						            echo "&nbsp;&nbsp;&nbsp;<a href ='admanage.php?page_no3=".($page_no3+1)."'>下一页</a>";
						        }else{
						            echo '&nbsp;&nbsp;&nbsp;<span>下一页</span>';
						        }
						?>
					    </span>          
					    </div>
					
					</div>
					
				</div>
		</div>
<!----------------------------流量卡密管理 结束------------------------------------>

</div>

<!--模态窗口 退出窗口-->
<div class="modal fade" id="exitModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <div style="width:50%;margin:0 auto"><p style="font-size:20px">注销成功,&nbsp;正在退出...</p></div>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--模态窗口 添加广告主-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel" style="text-align:center">
             添加广告主
            </h4>
         </div>
         <div class="modal-body">
          	<table class="table">  
			   <tbody>
			      <tr>
			         <td>广告主名称</td>
			         <td><input id="adhostname" type="text" size=30px placeholder="个人、单位"/></td>
			      </tr>
			      <tr>
			         <td>广告主联系方式</td>
			         <td><input id="adhostTel" type="text" size=30px placeholder="手机号码"/></td>
			      </tr>
			       <tr>
			         <td>广告主地址</td>
			         <td><input id="adhostaddress" type="text" size=30px /></td>
			      </tr>
			      <tr>
			         <td>广告币</td>
			         <td><input id="adhostadmoney" type="text" size=30px placeholder="广告币"/></td>
			      </tr>
			       <tr>
			         <td>实际金额</td>
			         <td><input id="adhostrealmoney" type="text" size=30px placeholder="实际金额"/></td>
			      </tr>
			   </tbody>
			</table>
         </div>
         <div class="modal-footer">
            
            <button type="button" class="btn btn-primary" onclick="submiter()">
               确定添加
            </button>
         </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--新加广告主-->

<script type="text/javascript" src="./adhost/js/ajaxAddhost.js"></script>

<!--用户退出-->
<script type="text/javascript">
	$("#exitnow").click(function(){
		var exit=setTimeout(function(){
		$("#exitModal").hide();
		window.location.href='./login/logout.php';
		},2000);
	});
	
</script>


		<hr class="divider" style="margin-top:50px">
		<footer>
			
			<o>&copy;2015. 中国电信北京分公司 京ICP证XXXXX号</p>
		</footer>
</div>
<script type="text/javascript">
function request(strParame) { 
var args = new Object( ); 
var query = location.search.substring(1); 

var pairs = query.split("&"); // Break at ampersand 
for(var i = 0; i < pairs.length; i++) { 
var pos = pairs[i].indexOf('='); 
if (pos == -1) continue; 
var argname = pairs[i].substring(0,pos); 
var value = pairs[i].substring(pos+1); 
value = decodeURIComponent(value); 
args[argname] = value; 
} 
return args[strParame]; 
} 
var name=request('username');
alert(name);
</script>
</body>
</html>