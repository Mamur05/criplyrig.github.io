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


if (!isset($_SESSION['user_id'])) { exit(); }

    if (isset($_POST['p1']))
    {
        function __autoload($name){ include(BASE_DIR."/classes/_class.".$name.".php");}

        $config = new config;

        # База данных
        $db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

        $db->Query("SET NAMES 'utf8'");
        $db->Query("SET CHARACTER SET 'utf8'");
        $db->Query("SET SESSION collation_connection = 'utf8_general_ci'");

        $id = (int)$_POST['p1'];

        $db->Query("SELECT id FROM db_serfing WHERE `money` >= `price` and status = '2' and id = '".$id."'");

        if ($db->NumRows())
        {
            echo 'account/serfing/view/'.$id.'';
        }
    }
?>