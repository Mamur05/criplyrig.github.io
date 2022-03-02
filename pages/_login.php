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
    background: url(../images/headers.png) no-repeat center top;
    position: relative;
    z-index: 99;
}
.footer-1 {
    padding: 40px 0;
    color: 00;
    background: #d8d1d585;
    margin-top: 524px;
}
</style>
<div class="container">
		<div class="wrapper">

							<div class="dop-navi">
					<ul>
					<li><a href="/login" class="active">Авторизация</a></li>
						<li><a href="/signup">Регистрация</a></li>
						<li><a href="/recovery">Забыли пароль?</a></li>
					</ul>
				</div>		
										
				
<div class="rigth-bar">
						


			

<form action="" method="post" class="cp">
<h3>Войти в личный кабинет</h3>
<input placeholder="Введите ваш емайл" name="log_email" type="text" size="23" maxlength="35" class="lg">
<input placeholder="Введите ваш пароль" name="pass" type="password" size="23" maxlength="35" class="lg">
<input type="button" class="button login" data-effect="mfp-zoom-in" value="Вход в аккаунт" onclick="submit();">
<center><?PHP

	if(isset($_POST["log_email"])){
	
	$lmail = $func->IsMail($_POST["log_email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, user, pass, referer_id, banned FROM db_users_a WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["pass"]) == strtolower($_POST["pass"])){
				
					if($log_data["banned"] == 0){
						
						# Считаем рефералов
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users_a SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["user"] = $log_data["user"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						Header("Location: /account");
						
					}else echo "<center><font color = 'red'><b>Аккаунт заблокирован</b></font></center><BR />";
				
				}else echo "<center><font color = 'red'><b>Email и/или Пароль указан неверно</b></font></center><BR />";
			
			}else echo "<center><font color = 'red'><b>Указанный Email не зарегистрирован в системе</b></font></center><BR />";
			
		}else echo "<center><font color = 'red'><b>Email указан неверно</b></font></center><BR />";
	
	}

?></center>
</form>

			</div>
				
<div class="clr"></div>				</div>
<div class="clr"></div>	
	</div>	
</div>