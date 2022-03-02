<?PHP

$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "referrals": include("pages/account/_referrals.php"); break; // Рефералы
		case "farm": include("pages/account/_farm.php"); break; // Моя ферма
		case "store": include("pages/account/_store.php"); break; // Склад
              case "insert": include("pages/account/_insert.php"); break; // Выбор пополнения
              case "insert_r": include("pages/account/_insert_r.php"); break; // Пополнение
              case "insert_f": include("pages/account/_insert_f.php"); break; // Пополнение
              case "insertp": include("pages/account/_insertp.php"); break; // Пополнение
			  	case "insertfk": include("pages/account/_insertfk.php"); break; // Пополнение баланса
              case "qiwi_insert": include("pages/account/_qiwi_insert.php"); break; // Пополнение
              case "insert_w": include("pages/account/_insert_w.php"); break; // Пополнение
  case "insert_web": include("pages/account/_insert_web.php"); break; // Пополнение
              case "zakaz_payment": include("pages/account/_zakaz_payment.php"); break; // Выбор выплаты
      		case "payment1": include("pages/account/_payment1.php"); break; // Ручная выплата
      		case "payment": include("pages/account/_payment.php"); break; //  Авто выплата
      case "config": include("pages/account/_config.php"); break; // Настройки
	  
case "insertfk": include("pages/account/_insertfk.php"); break; // Пополнение баланса
case "orel": include("pages/account/_orel.php"); break; // орёл или решка
                            case "kamikadze2": include("pages/account/_kamikadze2.php"); break; // игра
		case "market": include("pages/account/_market.php"); break; // Рынок
		case "swap": include("pages/account/_swap.php"); break; // Обмен золота
		case "referals": include("pages/account/_referals.php"); break; // Рефералы
                            case "thimble": include("pages/account/_thimble.php"); break; // Наперстки 2
                            case "games": include("pages/account/_games.php"); break; // games
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // Выплата QIWI
		case "insert": include("pages/account/_insert.php"); break; // Пополнение баланса
		case "balance": include("pages/account/_balance.php"); break; // chat by Rich

                case "advpic": include("pages/account/_advpic.php"); break;

case "bonus6": include("pages/account/_bonus6.php"); break; // Бонус 5 часов
				case "chat": include("pages/account/chat.php"); break; // chat by Rich
			


		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
			
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>