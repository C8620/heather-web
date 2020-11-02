<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="60">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=3.0&ak=h8Weg0npp2lF03n6VjFzGoWg7TqYQqUg"></script>
    <title>GPSTranslate</title>
</head>
<body>
    <div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    //GPS坐标
   <?php
   	$fn=$_COOKIE['heatherLoginInf'];
   	setcookie('heatherLoginInf',$fn,time()+120);
   	//echo $_COOKIE['heatherLoginInf']
	//$file = fopen("$fn", "r") or die("Unable to open file!");
	//$locx = fgets($file);
	//$locy = fgets($file);
	
	$link = mysqli_connect('mysql.hostinger.com.hk','u209837112_heath','qwertyuiop','u209837112_heath'); 
    $result= mysqli_query($link,"select * from $fn order by timestamp desc LIMIT 1;");
    $data= mysqli_fetch_array($result);
    echo "var x = ".$data["lat"].";\n";
    echo "var y = ".$data["lon"].";\n";
	fclose($file);
	?>
    var ggPoint = new BMap.Point(x,y);

    //地图初始化
    var bm = new BMap.Map("allmap");
    bm.centerAndZoom(ggPoint, 20);
    bm.addControl(new BMap.NavigationControl());

    //坐标转换完之后的回调函数
    translateCallback = function (data){
      if(data.status === 0) {
        var marker = new BMap.Marker(data.points[0]);
        bm.addOverlay(marker);
        <?php 
        echo "var label = new BMap.Label(\"".$data["timestamp"]."(UTC)\\n最后设备上传位置\",{offset:new BMap.Size(20,-10)});";
        ?>
        marker.setLabel(label); //添加百度label
        bm.setCenter(data.points[0]);
      }
    }
    
    translateCallback2 = function (data){
      if(data.status === 0) {
        var marker = new BMap.Marker(data.points[0]);
        bm.addOverlay(marker);
        <?php 
        echo "var label = new BMap.Label(\"".$data["lat"]." ".$data["lon"]."\",{offset:new BMap.Size(20,10)});";
        ?>
        marker.setLabel(label); //添加百度label
        bm.setCenter(data.points[0]);
      }
    }
    

    setTimeout(function(){
        var convertor = new BMap.Convertor();
        var pointArr = [];
        pointArr.push(ggPoint);
        convertor.translate(pointArr, 1, 5, translateCallback)
    }, 1000);
</script>