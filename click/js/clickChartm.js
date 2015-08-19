
    $.ajax({
        type:'get',
        dataType:'json', 
        url:'./click/backstage/ajaxClickchartm.php',//请求数据的地址
        data:'time='+Times,
        success:function(data){
            transferData(data,Times);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                    }, 
    });

   function transferData(tdata,tTimes){

          var dateTime=new Date();
          var year=dateTime.getFullYear();//哪一年
          var month=dateTime.getMonth()+1;//几月
          var date=dateTime.getDate();//几号

          if(tTimes=="today"){//----------今天
              var Day=new Date();
          }else{              //----------昨天
              var oneDay= dateTime.getTime()-24*60*60*1000;

              function add0(m){return m<10?'0'+m:m }
              function format(shijianchuo){
              //shijianchuo是整数，否则要parseInt转换
                var time = new Date(shijianchuo);
                var y = time.getFullYear();
                var m = time.getMonth()+1;
                var d = time.getDate();
                var h = time.getHours();
                var mm = time.getMinutes();
                var s = time.getSeconds();
                return y+'-'+add0(m)+'-'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
              }
              var Day=format(oneDay);
           }
        
      $('#container').highcharts({
     
          credits:{
            // enabled:false // 禁用版权信息
              text: 'CHINATELECOM',
              href: 'http://www.chinatelecom.com.cn/'
          },
          title: {
              text: '点击量报表',
              x: -20 //center
          },
          // subtitle: {
          //     text: 'Source: WorldClimate.com',
          //     x: -20
          // },
          xAxis: {
               categories: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00',
                            '06:00', '07:00', '08:00', '09:00', '10:00', '11:00',
                            '12:00', '13:00', '14:00', '15:00', '16:00', '17:00',
                            '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'] 
          },
          yAxis: {
              title: {
                  text: '(次)'
              },
              min:0,
              plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
              }]
          },
          //提示框显示
          tooltip: {
              valueSuffix: '次点击'
          },
          // legend: {
          //     layout: 'vertical',
          //     align: 'center',
          //     verticalAlign: 'bottom',
          //     borderWidth: 0
          // },
          series: [{
              name: Highcharts.dateFormat('%Y-%m-%d', Day),
              color:'blue',
              data: eval("[" + tdata + "]"),

            }
          ]
      });
   }
