<?php
$fp = file_get_contents('29239_15680.json');
$json = json_decode($fp, true);
$length = count($json);
$use = $json[$length-1];
print_r($use['chat_time']);
echo '<br>';
echo date('d-M h:i', strtotime($use['chat_time']));
?>