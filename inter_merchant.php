<?PHP
# ������������� �������
function __autoload($name){ include("classes/_class.".$name.".php");}

# ����� ������� 
$config = new config;

# �������
$func = new func;

# ���� ������
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

//extract($_POST);

$fk_merchant_id = '111111'; //merchant_id ID �������� � free-kassa.ru (http://free-kassa.ru/merchant/cabinet/help/)
$fk_merchant_key = 'dfgdfgfdgfdgfg'; //��������� ����� http://free-kassa.ru/merchant/cabinet/profile/tech.php
$fk_merchant_key2 = 'dfgfdgdfgdgdfgfdg'; //��������� �����2 (result) http://free-kassa.ru/merchant/cabinet/profile/tech.php

$ik_payment_amount = round(floatval($_POST['AMOUNT']),2);
$user_id = $_POST['us_id'];
	
$hash = md5($fk_merchant_id.":".$_POST['AMOUNT'].":".$fk_merchant_key2.":".$_POST['MERCHANT_ORDER_ID']);

if ($hash != $_POST['SIGN']) die("SumError");
    
   
   	# ���������
	$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
	$sonfig_site = $db->FetchArray();
   
   $db->Query("SELECT user, referer_id FROM db_users_a WHERE id = '{$user_id}' LIMIT 1");
   $user_ardata = $db->FetchArray();
   $user_name = $user_ardata["user"];
   $refid = $user_ardata["referer_id"];
   
    # ��������� ������
   $serebro = sprintf("%.4f", floatval($sonfig_site["ser_per_wmr"] * $ik_payment_amount) );
   
    #--------
   $db->Query("SELECT insert_sum FROM db_users_b WHERE id = '{$user_id}'LIMIT 1");
   $ins_sum = $db->FetchRow();
   
    $serebro = intval($ins_sum <= 0.01) ? ($serebro + ($serebro * 0.50) ) : $serebro;
   $add_tree  = ( $ik_payment_amount >= 9.99)  ? 1 : 0;
   $lsb = time();
   $to_referer = ($serebro * 0.20);
   $to_refererballs = ($ik_payment_amount * 0.20);
   
   $db->Query("UPDATE db_users_b SET money_b = money_b + '$serebro', insert_sum = insert_sum + '$ik_payment_amount'  WHERE id = '{$user_id}'");
   
   # ��������� �������� ��������
   
  $db->Query("UPDATE db_users_b SET money_b = money_b + $to_referer, from_referals = from_referals + $to_referer WHERE id = '$refid'");
   
   # ���������� ����������
 #  $da = time();
 #  $dd = $da + 60*60*24*15;
   $db->Query("INSERT INTO db_insert_money (user, user_id, money, serebro, date_add, date_del) 
   VALUES ('$user_name','$user_id','$ik_payment_amount','$serebro','$da','$dd')");
   
   
   
   # ���������� ���������� �����
   $db->Query("UPDATE db_stats SET all_insert = all_insert + '$ik_payment_amount' WHERE id = '1'");


?>