<?php
  // 네이버 지도 Open API 예제 - 주소좌표변환
  $client_id = "YOUR_CLIENT_ID"; // 네이버 개발자센터에서 발급받은 CLIENT ID
  $client_secret = "YOUR_CLIENT_SECRET";// 네이버 개발자센터에서 발급받은 CLIENT SECRET
  $encText = urlencode("불정로 6");
  $url = "https://openapi.naver.com/v1/map/geocode?query=".$encText;
  $is_post = false;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, $is_post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $headers = array();
  $headers[] = "X-Naver-Client-Id: ".$client_id;
  $headers[] = "X-Naver-Client-Secret: ".$client_secret;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec ($ch);
  $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close ($ch);
  echo "!! status_code:".$status_code."<br>";
  if($status_code == 200) {
    echo $response;
  } else {
    echo "Error 내용:".$response;
  }
?>
