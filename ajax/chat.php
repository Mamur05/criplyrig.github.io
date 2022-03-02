<?php
session_start();
header("Content-type: text/html; charset=utf-8");

//header("Content-type: text/html; charset=windows-1251");
//$db->query("SET NAMES cp1251");

function __autoload($name){ include("../classes/_class.".$name.".php");}

		$config = new config;
		$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
		$db->query("SET NAMES utf8");
		
    function send_err($text){
    return '<span style="color:red">'.$text.'</span>';
    }
	
	function send_good($text){
		return '<span style="color:#fff">'.$text.'</span>';
	}
	
	# форматирование ввода данных
    function protect($string) {
    	$protection = htmlspecialchars(trim($string), ENT_QUOTES);
    	return $protection;
    }
	
$uID = intval($_SESSION["user_id"]);

$send = intval($_GET["p"]);
if($send =="1"){
$text_chat = $_POST["comment"];

$text_chat = protect($text_chat);

if(empty($_POST['comment'])){
echo send_err("Введите сообщение");
}else{

		// поиск ссылок и запросов SQL и блокировка их
		if (strpos($text_chat, '"') !== false OR strpos($text_chat, "'") !== false OR strpos($text_chat, 'SELECT') !== false){ 
		echo send_err("Нельзя вводить запрещенные символы");
        } else {
		if(strpos($text_chat, "http") !== false OR strpos($text_chat, ".com") !== false OR strpos($text_chat, ".ru") !== false OR strpos($text_chat, ".biz") !== false OR strpos($text_chat, ".pro") !== false OR strpos($text_chat, ".xyz") !== false){
		echo send_err("Ссылки запрещены");
		} else {
		//

$db->query('SELECT * FROM db_users_a WHERE id = "'.$uID.'"');
$row = $db->FetchArray();
$user_id = $row["id"];
$user_name = $row["user"];
$admin = $row["admin"];
$date_chat = time();
$db->query("INSERT INTO rich_chat (nick,text,date,admin) VALUES ('$user_name','$text_chat','$date_chat','$admin')");
echo send_good("Сообщение отправлено");

}
}
}
}

if($send =="2"){
$id_sms = intval($_POST["del"]);
$db->query('SELECT * FROM rich_chat WHERE id = "'.$id_sms.'"');
if($db->NumRows()>0){
$db->query("DELETE FROM rich_chat WHERE id = '$id_sms'");
echo send_good("Удалено сообщение #{$id_sms}");
}else echo send_err("Такого сообщения не существует");
}

if($send =="3"){
$nick_sms = protect($_POST["ban"]);
$db->query('SELECT * FROM db_users_a WHERE id = "'.$uID.'"');
if($db->NumRows()>0){

$db->query('SELECT * FROM rich_chatban WHERE nick = "'.$nick_sms.'"');
if($db->NumRows()<1){

$time_ban = time() + 60*60*72; // 72 часа бана
$db->query("INSERT INTO rich_chatban (nick,last_date) VALUES ('$nick_sms','$time_ban')");
echo send_good("Пользователь #{$nick_sms} забанен");

}else echo send_err("Пользователь уже забанен");
}else echo send_err("Такого пользователя нет в базе");
}
?>