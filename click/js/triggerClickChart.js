function getCharts(Times){

	if ((Times=='today'||Times=="yesterday")) {

	    $.ajax({
	        type:'get',
	        dataType:'json', 
	        url:'./click/backstage/ajaxClickchartd.php',//请求数据的地址
	        data:'time='+Times,
	        success:function(data){

	            transferDatad(data,Times);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	                        alert(XMLHttpRequest.status);
	                        alert(XMLHttpRequest.readyState);
	                        alert(textStatus);
	                    }, 
	    });

	   function transferDatad(tdata,tTimes){

	          var dateTime=new Date();
	          var year=dateTime.getFullYear();//哪一年
	          var month=dateTime.getMonth()+1;//几月
	          var date=dateTime.getDate();//几号

	          if(tTimes=="today"){//----------今天
	              var Day=new Date();
	          }
	          if(tTimes=="yesterday"){              //----------昨天
	              var oneDay= dateTime.getTime()-24*60*60*1000;
	              var Day=new Date(oneDay);
	           }
	        
	      $('#container').highcharts({
	     
	          credits:{
	            // enabled:false // 禁用版权信息
	              text: 'CHINATELECOM',
	              href: 'http://www.chinatelecom.com.cn/'
	          },
	          title: {
	              text: '日点击量报表',
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
	   }//---------------------------------------transferData();

	}else if((Times=='thisMonth'||Times=="lastMonth")){//--------------------本月/上月
		$.ajax({
	        type:'get',
	        dataType:'json', 
	        url:'./click/backstage/ajaxClickchartm.php',//请求数据的地址
	        data:'time='+Times,
	        success:function(data){
	        	var sdata=data.join();
	            var data1=sdata.split(",-,")['0'];
	            var data2=sdata.split(',-,')['1'];
	            var vdata1=data1.split(",");
	            var vdata2=data2.split(",");
	            transferDatam(vdata1,vdata2,Times);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	                        alert(XMLHttpRequest.status);
	                        alert(XMLHttpRequest.readyState);
	                        alert(textStatus);
	                    }, 
   		 });

	   function transferDatam(tdata1,tdata2,tTimes){

	          var dateTime=new Date();
	          var year=dateTime.getFullYear();//哪一年
	          var month=dateTime.getMonth()+1;//几月
	          var date=dateTime.getDate();//几号

	          if(tTimes=="thisMonth"){//----------本月
	              var DayMonth=year+"年"+month+"月";
	          }else{              //----------上月
	              var t=0;
	              var thrityone=Array(1,3,5,7,8,10,12);
	              var thrity=Array(4,6,9,11);

	                function in_array(search,array){
					 for(var i in array){
					       if(array[i]==search){
					            return true;
					       }
					    }
					    return false;
				    }

				    if(in_array(month,thrityone)){
					    t=31;
					   
					}else if(in_array(month,thrity)){
					    t=30;
					   
					}else{
					    if((year%4==0&&year%100!=0)||(year%400==0)){
					        t=29;
					    }else{
					        t=28;
					    }
					}
	              var oneDay= dateTime.getTime()-t*24*60*60*1000;

	              function add0(m){return m<10?'0'+m:m }
	              function format(shijianchuo){
	              //shijianchuo是整数，否则要parseInt转换
	                var time = new Date(shijianchuo);
	                var y = time.getFullYear();
	                var m = time.getMonth()+1;
	             
	                return y+'年'+add0(m)+'月';
	              }
	              var DayMonth=format(oneDay);
	           }
	        
	      $('#container').highcharts({
	     
	          credits:{
	            // enabled:false // 禁用版权信息
	              text: 'CHINATELECOM',
	              href: 'http://www.chinatelecom.com.cn/'
	          },
	          title: {
	              text: '月点击量报表',
	              x: -20 //center
	          },
	          // subtitle: {
	          //     text: 'Source: WorldClimate.com',
	          //     x: -20
	          // },
	          xAxis: {
	               categories: eval("[" + tdata2 + "]"),
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
	              name: DayMonth,
	              color:'green',
	              data: eval("[" + tdata1 + "]"),

	            }
	          ]
	      });
	   }//-----------------transferDatam();

	}else{               //--------------else今年
		$.ajax({
	        type:'get',
	        dataType:'json', 
	        url:'./click/backstage/ajaxClickcharty.php',//请求数据的地址
	        data:'time='+Times,
	        success:function(data){
	        	
	            transferDatay(data);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	                        alert(XMLHttpRequest.status);
	                        alert(XMLHttpRequest.readyState);
	                        alert(textStatus);
	                    }, 
   		 });

	   function transferDatay(tdata){

	          var dateTime=new Date();
	          var Year=dateTime.getFullYear()+"年";
	        
	      $('#container').highcharts({
	     
	          credits:{
	            // enabled:false // 禁用版权信息
	              text: 'CHINATELECOM',
	              href: 'http://www.chinatelecom.com.cn/'
	          },
	          title: {
	              text: '年点击量报表',
	              x: -20 //center
	          },
	          // subtitle: {
	          //     text: 'Source: WorldClimate.com',
	          //     x: -20
	          // },
	          xAxis: {
	               categories: ["1","2","3","4","5","6","7","8","9","10","11","12"]
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
	              name: Year,
	              color:'red',
	              data: eval("[" + tdata + "]"),

	            }
	          ]
	      });
	   }//-----------------transferDatay();

	}
}//---------------------------getCharts();