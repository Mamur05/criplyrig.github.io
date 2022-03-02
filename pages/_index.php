<style>.headerbar .top .regh1 {
    font-size: 86px;
    text-align: center;
    text-shadow: 1px 1px #000;
    color: #fff;
    font-weight: 600;
    margin-top: 140px;
    display: block;
    position: relative;
    top: -23px;
}</style><?PHP
$_OPTIMIZATION["title"] = "Cryply RIG";
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();
?>

	<a href="/" class="regh1">Cryply RIG</a>
			<a href="/" class="regh2">ЭКОНОМИЧЕСКИЙ СИМУЛЯТОР</a>
			<?php if ($_SESSION["user_id"]) : ?>   
			<a href="/account" class="button-grad">перейти в профиль</a>
				<?php endif;?>
					<?php if (!$_SESSION["user_id"]) : ?>	
			<a href="/signup" class="button-grad">НАЧАТЬ ЗАРАБАТЫВАТЬ!</a>
 <?php endif;?> 	
			</div>
		</div>

	</div>	<div class="stats_board" id="counts">

	<div class="wrapper">
	<div class="inner">
			
			
				<div class="title_main"> статистика <span>проекта</span><a name="stat" id="stat"></a></div>
<div class="block one circles">
	<div class="img"><img src="images/stats-ico1.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><?=$stats_data["all_users"]+0; ?></ttn> <span>чел.</span></div>
	<div class="hr"></div>
	<div class="info">Всего участников</div>
</div>

				
<div class="block two circles">
	<div class="img"><img src="images/stats-ico2.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><?=sprintf("%.2f",$stats_data["all_insert"]-$stats_data["all_payment"]+0000); ?></ttn> <span>руб.</span></div>
	<div class="hr"></div>
	<div class="info">Сумма пополнений</div>
</div>

				
<div class="block third circles">
	<div class="img"><img src="images/stats-ico3.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><?=sprintf("%.2f",$stats_data["all_payment"]); ?></ttn> <span>руб.</span></div>
	<div class="hr"></div>
	<div class="info">Заработано участниками</div>
</div>
				
<div class="block six circles">
	<div class="img"><img src="images/stats-ico4.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><script language=JavaScript>
<!--
d0 = new Date('March 07, 2018');
d1 = new Date();
dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);
document.write('<B>' + Math.round(dt) + '</B>');
-->
</script></ttn> <span>день</span></div>
	<div class="hr"></div>
	<div class="info">Время работы</div>
</div>

		</div>

	</div>
</div>

<div class="zahvat1">
	<div class="wrapper">
		<br>
		<div class="desc">
			
			<h3>НАЧНИ ЗАРАБАТЫВАТЬ РЕАЛЬНЫЕ ДЕНЬГИ!</h3>
<p>
Представляем Вашему вниманию новый проектCryply RIG. Покупайте здания, собирайте кредиты и получайте реальные деньги от продажи! </p>




		</div>

		<div class="link">	<?php if ($_SESSION["user_id"]) : ?>   
			<a href="/account" class="button-grad">перейти в профиль</a>
				<?php endif;?>
					<?php if (!$_SESSION["user_id"]) : ?>	
			<a href="/signup" class="button-grad">НАЧАТЬ ЗАРАБАТЫВАТЬ!</a>
 <?php endif;?> 	</div>


	</div>
</div>


<div class="shop">
	
<div class="wrapper">

		<div class="title_main">Lucky <span>магазин</span></div>
		<!-- 180000 Цена <br>90000 Получаем итоговое число <br>90000 Процент <br>3000В день  <br>125В час -->

<div class="item">
	
	<div class="img"><img src="images/10.png" alt=""></div>
	<div class="pname"> Intel Core i5-4460</div>
	<div class="desc"> 550H/s</div>
	<a href="/account/farm" class="link">купить видеокарту</a>

</div>

<div class="item">
	
	<div class="img"><img src="images/11.png" alt=""></div>
	<div class="pname">Intel Core i7 770k</div>
	<div class="desc"> 980H/s</div>
	<a href="/account/farm" class="link">купить видеокарту</a>

</div>


<div class="item">
	
	<div class="img"><img src="images/12.png" alt=""></div>
	<div class="pname">Intel Core i7 3770k </div>
	<div class="desc">1300H/s</div>
	<a href="/account/farm" class="link">купить видеокарту</a>

</div>


<div class="item">
	
	<div class="img"><img src="images/13.png" alt=""></div>
	<div class="pname"> Intel Xeon 2630v4</div>
	<div class="desc">2800H/s</div>
	<a href="/account/farm" class="link">купить видеокарту</a>

</div>


<div class="item">
	
	<div class="img"><img src="images/14.png" alt=""></div>
	<div class="pname">Intel Xeon Platinum </div>
	<div class="desc">5200H/s</div>
	<a href="/account/farm" class="link">купить видеокарту</a>

</div>


</div>

</div>


<div class="zahvat2">
	<div class="wrapper">
		
		<div class="t1">ПОЛУЧИТЕ В ПОДАРОК "ЧАСТНЫЙ ДОМ"</div>
		<div class="t2">ПРИ РЕГИСТРАЦИИ СЕЙЧАС</div>

		<center><img src="../images/deal.png" alt=""></center>

		<div class="t3">комфортного старта вCryply RIG м в подарок. <br>	 Начните знакомство с проектом в полном обьеме!</div>
	<?php if ($_SESSION["user_id"]) : ?>   
			<a href="/account" class="button-grad">перейти в профиль</a>
				<?php endif;?>
					<?php if (!$_SESSION["user_id"]) : ?>	
			<a href="/signup" class="button-grad">НАЧАТЬ ЗАРАБАТЫВАТЬ!</a>
 <?php endif;?> 	

	</div>
</div>






