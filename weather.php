<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/11/16
 * Time: 13:37
 */
$str = $_GET['city'];
//var_dump($str);die;
//$str = "北京";
$key = 'e9514868386c4921b26540b5b793de1f ';
$url = "https://free-api.heweather.com/s6/weather/forecast?location=$str&key=$key";
//$str=curl_get($url);
//$data=json_decode($str,true);
//$data=$data['HeWeather6'][0]['daily_forecast'];
$data = file_get_contents($url);
//var_dump($data);
$data=json_decode($data,true);
$arr = array();
$arr = $data['HeWeather6']['0']['daily_forecast'];
//var_dump($arr);
$pdo=new PDO('mysql:host=localhost;dbname=test','root','root');
foreach ($arr as $key =>$val){
    $date=$val['date'];
    $tmp_max = $val['tmp_max'];
    $tmp_min = $val['tmp_min'];
    $sql = "insert into weather(city,date,maxtemp,mintemp) values('$str','$date','$tmp_max','$tmp_min')";
    $pdo->exec($sql);
}
$str=json_encode($data);		// 将PHP数组转换成json格式字符串，我们是将字符串存放到redis中的
echo $str;













//print_r($data);
//$pdo=new PDO('mysql:host=localhost;dbname=1607a','root','root');
//foreach ($data as $key => $value) {
//    $date=$value['date'];
//    $maxTemp=$value['tmp_max'];		// 最高温度
//    $minTemp=$value['tmp_min'];		// 最低温度
//    $sql="insert into weather(city,date,maxtemp,mintemp) values('$city','$date','$maxTemp','$minTemp')";
//    echo $sql;
//    $pdo->exec($sql);
//}

//
//function curl_get($url){
//    // 1 初始化curl对象
//    $ch=curl_init();
//    // 2 设置参数
//    curl_setopt($ch,CURLOPT_URL,$url);
//    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
//    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//    //curl_setopt($ch,CURLOPT_SSL_,$url);
//    // 3 发送请求，获取数据
//    $str=curl_exec($ch);
//    // 4 关闭请求，释放资源
//    curl_close($ch);
//    // 5 返回查询结果
//    return $str;
//}

