
<?php
//header("Content-Type: application/json");

$user="EDWS";
$pass="567WS74ED489";
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Authorization: Basic ".base64_encode("$user:$pass")."\r\n"
  ),
	"ssl"=>array(
       "verify_peer"=>false,
       "verify_peer_name"=>false,
    )
);

$context = stream_context_create($opts);
$fp = fopen('https://sgd.unac.edu.pe/ws/com.bintenex.documentmanagement.ed/orgchart', 'r', false, $context);
// read the content from $fp here.
$arr= stream_get_contents($fp);
//echo json_encode($arr);
echo $arr;

fclose($fp);


?>
