<?PHP

$_OPTIMIZATION["title"] = "�������";
$_OPTIMIZATION["description"] = "������� ������������";
$_OPTIMIZATION["keywords"] = "�������, ������ �������, ������������";

# ���������� ������
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // �������� ������
		case "referrals": include("pages/account/_referrals.php"); break; // ��������
		case "farm": include("pages/account/_farm.php"); break; // ��� �����
		case "store": include("pages/account/_store.php"); break; // �����
              case "insert": include("pages/account/_insert.php"); break; // ����� ����������
              case "insert_r": include("pages/account/_insert_r.php"); break; // ����������
              case "insert_f": include("pages/account/_insert_f.php"); break; // ����������
              case "insertp": include("pages/account/_insertp.php"); break; // ����������
			  	case "insertfk": include("pages/account/_insertfk.php"); break; // ���������� �������
              case "qiwi_insert": include("pages/account/_qiwi_insert.php"); break; // ����������
              case "insert_w": include("pages/account/_insert_w.php"); break; // ����������
  case "insert_web": include("pages/account/_insert_web.php"); break; // ����������
              case "zakaz_payment": include("pages/account/_zakaz_payment.php"); break; // ����� �������
      		case "payment1": include("pages/account/_payment1.php"); break; // ������ �������
      		case "payment": include("pages/account/_payment.php"); break; //  ���� �������
      case "config": include("pages/account/_config.php"); break; // ���������
	  
case "insertfk": include("pages/account/_insertfk.php"); break; // ���������� �������
case "orel": include("pages/account/_orel.php"); break; // ��� ��� �����
                            case "kamikadze2": include("pages/account/_kamikadze2.php"); break; // ����
		case "market": include("pages/account/_market.php"); break; // �����
		case "swap": include("pages/account/_swap.php"); break; // ����� ������
		case "referals": include("pages/account/_referals.php"); break; // ��������
                            case "thimble": include("pages/account/_thimble.php"); break; // ��������� 2
                            case "games": include("pages/account/_games.php"); break; // games
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // ������� QIWI
		case "insert": include("pages/account/_insert.php"); break; // ���������� �������
		case "balance": include("pages/account/_balance.php"); break; // chat by Rich

                case "advpic": include("pages/account/_advpic.php"); break;

case "bonus6": include("pages/account/_bonus6.php"); break; // ����� 5 �����
				case "chat": include("pages/account/chat.php"); break; // chat by Rich
			


		case "exit": @session_destroy(); Header("Location: /"); return; break; // �����
			
	# �������� ������
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>