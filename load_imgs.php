<?php
$access_key = getenv('UNSPLASH_PUBLIC_KEY');
$url = "https://api.unsplash.com/search/photos/?count=20&client_id={$access_key}&query=Sri%20Lanka";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);

$imgs = json_decode($res);
$pics_map = "";
foreach ($imgs->results as $img) {
  $raw = file_get_contents($img->urls->full);
  $img_name = 'img'.md5(time()).'.jpg';
  file_put_contents("pics/{$img_name}", $raw);
  $pics_map .= $img_name.',';
}
file_put_contents('pics/picsmap.txt', $pics_map);
?>