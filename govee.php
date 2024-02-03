<?php
  apikey = "e25527fb-1ba4-47e5-8ee8-559c59826936";

  $arr = get_devices ($apikey);

  foreach ($arr->data->devices as $device) {
    print "MAC: " . $device->device . "\n";
    print "Model: " . $device->model . "\n";
    print "Name: " . $device->deviceName . "\n\n";

  }

//  $arr = onoff ($apikey, "B4:0E:D4:AD:FC:A6:99:18", "H6008", false);
//  print_r ($arr);

//  $arr = changecolor ($apikey, "B4:0E:D4:AD:FC:A6:99:18", "H6008", 185, 214, 235);
//  print_r ($arr);

//  $arr = brightness ($apikey, "B4:0E:D4:AD:FC:A6:99:18", "H6008", 100);
//  print_r ($arr);

//  $arr = changetemp ($apikey, "2B:29:D4:AD:FC:A6:88:D0", "H6008", 6500);
//  print_r ($arr);

function brightness ($apikey, $device, $model, $brightness) {
  $url = "https://developer-api.govee.com/v1/devices/control";

    $postarray = array (
      "device" => $device,
      "model" => $model,
      "cmd" => array ("name" => "brightness", "value" => $brightness));

    $postdata = json_encode ($postarray);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, trim($postdata));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", "Govee-API-Key: $apikey"));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    $result = curl_exec ($ch);
    $arr = json_decode ($result);

    return $arr;
}

function changetemp ($apikey, $device, $model, $temp) {
  $url = "https://developer-api.govee.com/v1/devices/control";

    $postarray = array (
      "device" => $device,
      "model" => $model,
      "cmd" => array ("name" => "colorTem", "value" => $temp));

    $postdata = json_encode ($postarray);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, trim($postdata));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", "Govee-API-Key: $apikey"));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    $result = curl_exec ($ch);
    $arr = json_decode ($result);

    return $arr;
}


function changecolor ($apikey, $device, $model, $r, $g, $b) {
  $url = "https://developer-api.govee.com/v1/devices/control";

    $postarray = array (
      "device" => $device,
      "model" => $model,
      "cmd" => array ("name" => "color", "value" => array ("r" => $r, "g" => $g, "b" => $b)));

    $postdata = json_encode ($postarray);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, trim($postdata));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", "Govee-API-Key: $apikey"));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    $result = curl_exec ($ch);
    $arr = json_decode ($result);

    return $arr;
}

function onoff ($apikey, $device, $model, $on) {
  $url = "https://developer-api.govee.com/v1/devices/control";

  if ($on)
    $turn = "on";
  else
    $turn = "off";

    $postarray = array (
      "device" => $device,
      "model" => $model,
      "cmd" => array ("name" => "turn", "value" => $turn));

    $postdata = json_encode ($postarray);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, trim($postdata));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", "Govee-API-Key: $apikey"));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    $result = curl_exec ($ch);
    $arr = json_decode ($result);

    return $arr;
}

function get_devices ($apikey) {

    $url = "https://developer-api.govee.com/v1/devices";;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", "Govee-API-Key: $apikey"));

    $result = curl_exec ($ch);
    $arr = json_decode ($result);

    return $arr;

}

?>

