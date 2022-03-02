<?php
class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: Конструктор класса
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTPS_HOST']);
	
	}
	
	/*======================================================================*\
	Function:	SendRegKey
	Descriiption: Отправляет регистрационный ключ
	\*======================================================================*/
	function SendRegKey($email, $key){
	
		$text = "На ваш Email была запрошена ссылка для регистрации в игре \"".$this->Hosts."\"<BR />";
		$text.= "Если вы не запрашивали ссылку, просто проигнорируйте это сообщение. <BR /><BR />";
		$text.= "Ссылка для регистрации: <a href='http://".$this->Hosts."/signup/key/{$key}'>";
		$text.= "http://".$this->Hosts."/signup/key/{$key}</a>";
		$subject = "Регистрация в игре \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendBugReport
	Descriiption: Отправляет жалобу с серфинга
	\*======================================================================*/
	function SendBugReport($id, $mail = "ArtIncProject@yandex.ru"){

		$text = "Жалоба с серфинга с \"".$this->Hosts."\"<BR />";

		$text.= "<b>ID обьявления:</b> {$id}<BR />";

		$subject = "Жалоба с серфинга с \"".$this->Hosts."\"";

		return $this->SendMail($mail, $subject, $text);

	}


	
	
	/*======================================================================*\
	Function:	RecoveryPassword
	Descriiption: Восстановление пароля
	\*======================================================================*/
	function RecoveryPassword($user, $pass, $email){
	
		$text = "Уважаемый, {$user}! <BR />";
		$text.= "Ваш пароль в игре <a href='http://".$this->Hosts."/'>Камикадзе 2</a> был изменен<BR />";
		$text.= "<b>Ваш новый Пароль:</b> {$pass}<BR />";
		$subject = "Пароль изменен! - \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendAfterReg
	Descriiption: Отправляет данные после регистрации
	\*======================================================================*/
	function SendAfterReg($user, $pass, $email){
	
		$text = "Благодарим вас за регистрацию в игре \"".$this->Hosts."\"<BR />";
		$text.= "Ваши данные для входа в личный кабинет пользователя: <BR />";
		$text.= "<b>Логин:</b> {$user}<BR />";
		$text.= "<b>Пароль:</b> {$pass}<BR />";
		$text.= "Ссылка для входа в кабинет: <a href='http://".$this->Hosts."/'>http://".$this->Hosts."/</a>";
		$subject = "Завершение регистрации в системе \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
	
	/*======================================================================*\
	Function:	SetNewPassword
	Descriiption: Отправляет данные после смены пароля
	\*======================================================================*/
	function SetNewPassword($user, $pass, $email){
	
		$text = "В настройках вашего аккаунта был изменен пароль<BR />";
		$text.= "Ваши новые данные для входа в личный кабинет пользователя: <BR />";
		$text.= "<b>Логин:</b> {$user}<BR />";
		$text.= "<b>Новый пароль:</b> {$pass}<BR />";
		$text.= "Ссылка для входа в кабинет: <a href='http://".$this->Hosts."/'>http://".$this->Hosts."/</a>";
		$subject = "Смена пароля в системе \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
		
	}
	
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: Создание заголовков письма
	\*======================================================================*/
	function Headers(){
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=Windows-1251\r\n";
	$headers.= "Date: ".date("m.d.Y H:i:s")."\r\n";
	$headers.= "From: ".$this->Hosts." <support@".$this->Hosts."> \r\n";
	
		return $headers;
	
	}
	
	/*======================================================================*\
	Function:	SendMail
	Descriiption: Отправитель
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "<br><br>
                <small>Пожалуйста, не отвечайте на данное письмо. Данный почтовый адрес не может быть использован для связи с нами. 
                Если у вас есть вопросы, обращайтесь в support@cash-game.net</small>";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>