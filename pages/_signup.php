<style>
.headerbar .top ul li a {
    font-size: 15px;
    color: #ffffff;
    font-weight: 700;
    padding: 5px 18px;
    border-radius: 1e3px;
    text-transform: uppercase;
}
.headerbar .top {
    /* height: 156px; */
    /* background: url(../images/top.png) no-repeat center top; */
    height: 100px;
    background: rgba(0,0,0,.5);
color: #fff;} 
.headerbar {
   height: 1269px;
    background: url(../images/headers1.png) no-repeat center top;
    position: relative;
    z-index: 99;
}
</style>
	
<div class="container">
		<div class="wrapper">

							<div class="dop-navi">
					<ul>
						<li><a href="/login">�����������</a></li>
						<li><a href="/signup" class="active">�����������</a></li>
						<li><a href="/recovery">������ ������?</a></li>
					</ul>
				</div>				


							<div class="rigth-bar">
						


			
<h3>�����������</h3>

<center>
<?PHP

	# �����������

	if(isset($_POST["login"])){

	if(isset($_SESSION["captcha"]) AND strtolower($_SESSION["captcha"]) == strtolower($_POST["captcha"])){
	unset($_SESSION["captcha"]);

	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	$ipregs = $db->Query("SELECT * FROM `db_users_a` WHERE INET_NTOA(db_users_a.ip) = '$ip' ");
	$ipregs = $db->NumRows();

	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";

	if($referer_id != 1){
		$db->Query("SELECT user FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "Admin"; }
	}else{ $referer_id = 1; $referer_name = "Admin"; }

		if($rules){
			if($ipregs == 0) {

			if($email !== false){

			if($login !== false){

				if($pass !== false){

					if($pass == $_POST["repass"]){

						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE user = '$login'");
						if($db->FetchRow() == 0){

						# ������ ������������
                                                # +5 ������� �������� �� ����

                                                if (empty($referer_name)){

                                                //echo "�����, ������ �� ������!";

                                                }

                                                else

                                                {

                                                $db->Query("SELECT referer, referer_id FROM db_users_a WHERE id = '$lid' ");

                                                $ref_bonus = $db->FetchArray();

                                                $user_name = $ref_bonus["referer"];

                                                $ref_id = $ref_bonus["referer_id"];



                                                 $db->Query("UPDATE db_users_b SET money_p = money_p +5 WHERE user = '$user_name' AND id = '$ref_id' ");

}
						$db->Query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, date_reg, ip)
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$time',INET_ATON('$ip'))");

						$lid = $db->LastInsert();

						$db->Query("INSERT INTO db_users_b (id, user, a_t, last_sbor) VALUES ('$lid','$login','2', '".time()."')");

						# ��������� ����������
                                                # +5 ������� �������� �� ����

if (empty($referer_name)){

//echo "�����, ������ �� ������!";

}

else

{

$db->Query("SELECT referer, referer_id FROM db_users_a WHERE id = '$lid' ");

$ref_bonus = $db->FetchArray();

$user_name = $ref_bonus["referer"];

$ref_id = $ref_bonus["referer_id"];



$db->Query("UPDATE db_users_b SET money_p = money_p +5 WHERE user = '$user_name' AND id = '$ref_id' ");

}
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");

						echo "<center><b><font color = '#33ff00'>�� ������� ������������������. ����������� ����� ����� ��� ����� � �������</font></b></center><BR />";
						?></div>
						<div class="clr"></div>
						<?PHP
						return;
						}else echo "<center><b><font color = 'red'>��������� ����� ��� ������������</font></b></center><BR />";

					}else echo "<center><b><font color = 'red'>������ � ������ ������ �� ���������</font></b></center><BR />";

				}else echo "<center><b><font color = 'red'>������ �������� �������</font></b></center><BR />";

			}else echo "<center><b><font color = 'red'>����� �������� �������</font></b></center><BR />";

		}else echo "<center><font color = 'red'><b>Email ����� �������� ������</b></font></center>";

		}else echo "<center><font color = 'red'><b>����������� � ����� IP ��� �������������</b></font></center>";

		}else echo "<center><b><font color = 'red'>�� �� ����������� �������</font></b></center><BR />";

		}else echo "<center><font color = 'red'><b>������� � �������� ������� �������</b></font></center>";

	}


?>
</center>
<div class="silver-bk"><div class="clr"></div>	
<br>
<form action="" method="post" class="rega">
<table border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td align="left" colspan="4"><input placeholder="���������� � ������� �����" name="login" type="text" size="25" maxlength="10" value="" class="lg"><small>���� ����� ������ ����� �� 4 �� 10 �������� (������ ����. �������).</small></td>
  </tr>
  <tr>
<td align="left" colspan="4"><input name="pass" placeholder="���������� � ������� ������" type="password" size="25" maxlength="20" class="lg"><small>���� ������ ������ ����� �� 6 �� 20 �������� (������ ����. �������).</small></td>
  </tr>
  <tr>
<td align="left" colspan="4"><input name="repass" placeholder="��������� ������" type="password" size="25" maxlength="20" class="lg"><small>������ ������ ���������.</small></td>  </tr>
	
		  <tr>
<td align="left" colspan="4"><input name="email" placeholder="������� ���� �����" type="email" size="25" maxlength="50" class="lg"></td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;">
	<a href="#" onclick="ResetCaptcha(this);"><img src="/captcha.php?rnd=0.4165869640463924" border="0"></a>
	</td>
    <td align="left" style="padding:3px;">������� ������� � ��������<input name="captcha" type="text" size="25" maxlength="50"></td>
  </tr>
<tr><td colspan="4" align="center" height="60px"><input name="rules" type="checkbox"> � <a href="/rules" target="_blank" class="stn">���������</a> ������� ����������(�) � ��������	</td></tr>
    <tr height="5">
    <td colspan="4" align="center"><input type="button" class="button login" data-effect="mfp-zoom-in" value="������������������" onclick="submit();"></td>
  </tr>
  
</tbody></table>

</form></div>


<div class="clr"></div>				</div>
<div class="clr"></div>	
	</div>	
</div>
</div>