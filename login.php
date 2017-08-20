<?php
ob_start('ob_gzhandler');
session_start();

if($_GET['token']) {
	$token2 = $_GET['token'];
	if(preg_match("'access_token=(.*?)&expires_in='", $token2, $matches)){
		$token = $matches[1];
			}else{
		$token = $token2;
	}
$me = me($token);
if($me['id']){
$_SESSION['id'] = $me[id];
$_SESSION['name'] = $me[name];
$_SESSION['birthday'] = $me[birthday];
$_SESSION['email'] = $me[email];
$_SESSION['access_token'] = $token;
// thành công
echo '<i class="fa fa-check"></i> Success!
 <script language="javascript">
window.location.href = "index.php";
      </script>';
//end
}else{
session_destroy();
echo 'Đăng Nhập
 <script language="javascript">
alert("Token Die Rồi Cưng Ơi");
      </script>';
;
}
}
function me($access) {
return json_decode(auto('https://graph.facebook.com/me?access_token='.$access),true);
}

function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   ?>