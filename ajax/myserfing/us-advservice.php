<?php
session_start();
######################################
# ?????? ??????? ??? Fruit Farm
# ????? APTEMOH
# E-mail: ArtIncProject@yandex.ru
# Skype: ArtIncProject
# VK.com: https://vk.com/id381626457
######################################
define('TIME', time());
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT']);

header("Content-type: text/html; charset=utf-8");

if (!isset($_SESSION['user_id'])) { exit(); }

function __autoload($name){ include(BASE_DIR."/classes/_class.".$name.".php");}

$config = new config;

# ???? ??????
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

$db->Query("SET NAMES 'utf8'");
$db->Query("SET CHARACTER SET 'utf8'");
$db->Query("SET SESSION collation_connection = 'utf8_general_ci'");

$db->Query("SELECT * FROM db_users_b WHERE id = '".$_SESSION['user_id']."'");
$users_info = $db->FetchArray();


if (isset($_POST['cnt']) && $_POST['cnt'] == $_SESSION['cnt'])
{
    $user_name = $_SESSION['user'];
    $adv = isset($_POST['adv']) ? (int) $_POST['adv'] : 0;
    $mode = isset($_POST['mode']) ? (int) $_POST['mode'] : 0;
    $use = isset($_POST['use']) ? (int) $_POST['use'] : 0;

    if (!$adv && !$mode && !$use) exit('no1');

    #if (isset($_SESSION['admin']))
    if ($config->serfIdAdmin() == $usid)
    {
        $db->query("SELECT * FROM db_serfing WHERE id = '".$adv."'");
    }
    else
    {
        $db->query("SELECT * FROM db_serfing WHERE user_name = '".$user_name."' and id = '".$adv."'");
    }

    if (!$db->NumRows()) exit('no2');

    $result = $db->FetchArray();

    switch ($use)
    {
        //??????
        case 1:

            if ($result['status'] == 3 && $result['money'] >= $result['price'])
            {
                $db->query("UPDATE db_serfing SET status = '2' WHERE id = '".$adv."'");

                exit('1');
            }

        break;

        //?????
        case 2:

            if ($result['status'] == 2)
            {
                $db->query("UPDATE db_serfing SET status = '3' WHERE id = '".$adv."'");

                exit('1');
            }

        break;

        //??????? ??????????
        case 3:

            if ($result['view'] > 0)
            {
                $db->query("UPDATE db_serfing SET view = '0' WHERE id = '".$adv."'");

                exit('1');
            }

        break;

        //????????
        case 4:

            #if ($result['money'] > 0) exit('no3');

            if ($mode == 2) exit();

            # ?????? ?????
            $user_id = $_SESSION['user_id'];
            $user_money = $result['money'];
            $db->query("UPDATE db_users_b SET `serf` = `serf` + '$user_money'  WHERE id = '$user_id'");

            $db->query("DELETE FROM db_serfing WHERE id = '$adv'");

            #$db->query("DELETE FROM db_serfing_view WHERE ident = '".$adv."'");

            exit('1');

        break;

        //???????? ??????????
        case 5:

            $speed = ($result['speed'] + 1) <= 7 ? $result['speed'] + 1 : 1;

            $db->query("UPDATE db_serfing SET speed = '".$speed."' WHERE id = '".$adv."'");

            exit(''.$speed.'');

        break;

        //???????? ?? ?????????
        case 6:

            if ($result['status'] == 0)
            {
                $db->query("UPDATE db_serfing SET status = '1' WHERE id = '".$adv."'");

                exit('1');
            }

        break;

        //????????? ???????
        case 10:

            if ($result['status'] == 1)
            {
                $db->query("UPDATE db_serfing SET status = '2' WHERE id = '".$adv."'");

                exit('1');
            }

        break;

        //???????? ???????
        case 11:

            $db->query("DELETE FROM db_serfing WHERE id = '".$adv."'");
            #$db->query("DELETE FROM db_serfing_view WHERE ident = '".$adv."'");

            exit('1');

        break;

        //?????????? ???????
        case 12:

            $money = floatval($_POST['price']);

            if ($money <= 0) exit('YOU BAD CHEL )))');

            #if (isset($_SESSION['admin']))
    		if ($config->serfIdAdmin() == $usid)
            {
                $db->query("UPDATE db_serfing SET `money` = `money` + '".$money."' WHERE id = '".$adv."'");

                exit('1');
            }
            else
            {
                if ($users_info['money_b'] >= $money)
                {

                    $db->query("UPDATE db_serfing SET `money` = `money` + '".$money."' WHERE id = '".$adv."'");

                    $db->query("UPDATE db_users_b SET `money_b` = `money_b` - '".$money."'	WHERE id = '".$_SESSION['user_id']."'");

                    exit('1');
                }
                else
                {
                    exit('NO MONEY');
                }
            }

        break;

        default:
        break;
    }
}

exit('no4');
?>