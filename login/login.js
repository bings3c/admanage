
   
    $("#login").click(function(){  
     var user = $("#user").val();  
     var password = $("#password").val(); 
     var md5passwd=hex_md5(password); 
    console.log(md5passwd);
       $.ajax({
		type:"POST",
		url:"./checklogin.php",
		data:{user:$("#user").val(),password:md5passwd},
		dataType:"json",
		success:function(data){
			console.log(data);
                    	if(data){
                        con.innerHTML = '<font color="green" size="3">登录成功，跳转中...</font>';
		                var timer1=setTimeout(function(){
		                     location = '../admanage.php?username='+user;
		                },1000);  
                    	}else{
                        con.innerHTML = '<font color="red" size="3">用户名或密码错误！</font>';
		                var timer2=setTimeout(function(){
		                    $("#user").val("");  
		                    $("#password").val("");  
		                },1000);
                    	}
		},
		 error:function(){      
			  alert("异常！");    
     		}   
	});  
    });
