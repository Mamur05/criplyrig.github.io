<?php
class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: ����������� ������
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTPS_HOST']);
	
	}
	
	/*======================================================================*\
	Function:	SendRegKey
	Descriiption: ���������� ��������������� ����
	\*======================================================================*/
	function SendRegKey($email, $key){
	
		$text = "�� ��� Email ���� ��������� ������ ��� ����������� � ���� \"".$this->Hosts."\"<BR />";
		$text.= "���� �� �� ����������� ������, ������ �������������� ��� ���������. <BR /><BR />";
		$text.= "������ ��� �����������: <a href='http://".$this->Hosts."/signup/key/{$key}'>";
		$text.= "http://".$this->Hosts."/signup/key/{$key}</a>";
		$subject = "����������� � ���� \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendBugReport
	Descriiption: ���������� ������ � ��������
	\*======================================================================*/
	function SendBugReport($id, $mail = "ArtIncProject@yandex.ru"){

		$text = "������ � �������� � \"".$this->Hosts."\"<BR />";

		$text.= "<b>ID ����������:</b> {$id}<BR />";

		$subject = "������ � �������� � \"".$this->Hosts."\"";

		return $this->SendMail($mail, $subject, $text);

	}


	
	
	/*======================================================================*\
	Function:	RecoveryPassword
	Descriiption: �������������� ������
	\*======================================================================*/
	function RecoveryPassword($user, $pass, $email){
	
		$text = "���������, {$user}! <BR />";
		$text.= "��� ������ � ���� <a href='http://".$this->Hosts."/'>��������� 2</a> ��� �������<BR />";
		$text.= "<b>��� ����� ������:</b> {$pass}<BR />";
		$subject = "������ �������! - \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendAfterReg
	Descriiption: ���������� ������ ����� �����������
	\*======================================================================*/
	function SendAfterReg($user, $pass, $email){
	
		$text = "���������� ��� �� ����������� � ���� \"".$this->Hosts."\"<BR />";
		$text.= "���� ������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$user}<BR />";
		$text.= "<b>������:</b> {$pass}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/'>http://".$this->Hosts."/</a>";
		$subject = "���������� ����������� � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
	
	/*======================================================================*\
	Function:	SetNewPassword
	Descriiption: ���������� ������ ����� ����� ������
	\*======================================================================*/
	function SetNewPassword($user, $pass, $email){
	
		$text = "� ���������� ������ �������� ��� ������� ������<BR />";
		$text.= "���� ����� ������ ��� ����� � ������ ������� ������������: <BR />";
		$text.= "<b>�����:</b> {$user}<BR />";
		$text.= "<b>����� ������:</b> {$pass}<BR />";
		$text.= "������ ��� ����� � �������: <a href='http://".$this->Hosts."/'>http://".$this->Hosts."/</a>";
		$subject = "����� ������ � ������� \"".$this->Hosts."\"";
		
		return $this->SendMail($email, $subject, $text);
		
	}
	
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: �������� ���������� ������
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
	Descriiption: �����������
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "<br><br>
                <small>����������, �� ��������� �� ������ ������. ������ �������� ����� �� ����� ���� ����������� ��� ����� � ����. 
                ���� � ��� ���� �������, ����������� � support@cash-game.net</small>";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>