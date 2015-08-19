function countClicks(Times) {

        $.ajax({
                type:'get',
                dataType:'json', 
                url:'./click/backstage/ajaxClickcount.php',//请求数据的地址
                data:'time='+Times,
                success:function(data){
                    $("#clickvol").text(data);
                     
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                alert(XMLHttpRequest.status);
                                alert(XMLHttpRequest.readyState);
                                alert(textStatus);
                            }, 
        });
 };