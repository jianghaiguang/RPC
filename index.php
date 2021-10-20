<?php


$client = stream_socket_client("tcp://127.0.0.1:8887", $errno, $errstr);
if(!$client) {
	echo "异常代码：".$errno.",异常信息：".$errstr;exit;
}
$data['class'] = 'user';
$data['method'] = 'get_name';
// $data['param'] = 12;
$_data = json_encode($data);
fwrite($client, $_data);

$server_data = fread($client, 2048);
$result = json_decode($server_data, true);
fclose($client);
print_r($result);






?>







