<?php
/***********************************************
               Code Update Token By Lê Thế Tuấn
Không Xóa Dòng Này Nếu Bạn là người Có Học
************************************************/

$cooke = $_GET['cookie'];

$app = '41158896424';

$url = curl('https://developers.facebook.com/tools/debug/accesstoken/?app_id='.$app.'',$cooke);
//echo $url;



$dau1 = strstr($url,'required="1" name="q" value="');
$nd2 = str_replace($url,'',$dau1);
$nd2 = str_replace('required="1" name="q" value=','',$nd2);
$nd2 = str_replace('aria-label=Nhập một mã truy ','',$nd2);
$puarudz= explode('<input type="hidden" autocomplete="off" id="hidden_version_input" name="version" value="v2.8" />',$nd2);
$title = explode('"',$puarudz[0]); //Lấy nội dung từ title đến hết 
$token = explode('" aria-label="Nhập một mã truy cập để sửa lỗi." aria-required="true" />',$title[1]); // Lấy mảng thứ 2 


echo $token[0];



function auto($url) {
   $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
    curl_close($ch);
}

function curl($uu,$cookie)
{
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $uu);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:'
    ));
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
}
