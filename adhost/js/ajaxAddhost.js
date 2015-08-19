function submiter() {

        $.ajax({
                type:'get',
                dataType:'json', 
                url:'./adhost/backstage/ajaxAddhost.php',//请求数据的地址
                data:{adhostname:$("#adhostname").val(), adhostTel:$("#adhostTel").val(),adhostaddress:$("#adhostaddress").val(),adhostadmoney:$("#adhostadmoney").val(),adhostrealmoney:$("#adhostrealmoney").val()},
                success:function(data){
                    if(data=="1"){
                       swal({   title: "添加成功!",   text: "3秒钟后关闭窗口.",   timer: 5000 });
                       location.reload();
                    }else{
                        alert("添加失败！");   
                    }
                     
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                alert(XMLHttpRequest.status);
                                alert(XMLHttpRequest.readyState);
                                alert(textStatus);
                }, 
                    
        });
   
 };