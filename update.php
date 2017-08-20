<?php
$id = $_POST['id'];
$cookie = $_POST['cookie'];
include'config.php';
$token = file_get_contents($dm.'/htc.php?cookie='.urlencode($cookie));
if(!$token) {
die('Cookie Này Không Hợp Lệ<br>Hoặc Chưa Cài HTC');
}


// check id xem có life ko
$check = json_decode(file_get_contents('https://graph.facebook.com/'.$id.'/?access_token='.$token),true);
if (!$check['id']) {
die('ID ko tồn tại');
}else {
$name = $check['name'];
}

// kết nối
$connection = mysql_connect($host,$username,$password);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db($dbname) or die(mysql_error());

    $result = mysql_query("
      SELECT
         *
      FROM
         curl
      WHERE
         user_id = '" . $check['id'] . "'
   ");

   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);

      if($row){
mysql_query(

"UPDATE
curl
SET
`cookie` = '" . $cookie . "',
`trangthai` = 'Live'
WHERE
`user_id` = " . $check['id'] . "
");
       echo ' Đã Cập Nhật Cookie<br>Cho User '.$check['name'];
      }else {
echo 'User '.$name.' Chưa Đăng Kí Vip <br>Trên Hệ Thống';
   }
}
// thành công cmnr





?>