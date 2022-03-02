<?php
session_start();
######################################
# Модуль Серфинг для Fruit Farm
# Автор APTEMOH
# E-mail: ArtIncProject@yandex.ru
# Skype: ArtIncProject
# VK.com: https://vk.com/id381626457
######################################
define('TIME', time());
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT']);

header("Content-type: text/html; charset=utf-8");

$id_user = $_SESSION['user_id'];

if (!isset($id_user)) { exit(); }

    if (isset($_POST['p1']))
    {
        function __autoload($name){ include(BASE_DIR."/classes/_class.".$name.".php");}

        $config = new config;

        # База данных
        $db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

        $db->Query("SET NAMES 'utf8'");
        $db->Query("SET CHARACTER SET 'utf8'");
        $db->Query("SET SESSION collation_connection = 'utf8_general_ci'");

        $id1 = (int)$_POST['p1'];
        $id2 = (int)$_POST['p2'];
        $id3 = (int)$_POST['p3'];

        $db->query("UPDATE db_users_b SET `money_b` = `money_b` - '1000'   WHERE id = '$id_user'");

        $db->Query("SELECT id FROM db_serfing WHERE `money` >= `price` and status = '2' and id = '$id1'");

        if ($db->NumRows())
        {
            echo 'account/serfing/view/'.$id1.'';
        }
    }

    $id = (int)$_POST['id'];
    if (isset($_POST['sendBug']) AND isset($_POST['id'])) {
        echo "Жалоба на №".$id." принята! Спасибо за сигнал! :)";

        function __autoload($name){ include(BASE_DIR."/classes/_class.".$name.".php");}
        $sender = new isender;
        $sender->SendBugReport($id);
    }
?>