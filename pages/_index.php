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
			<a href="/" class="regh2">������������� ���������</a>
			<?php if ($_SESSION["user_id"]) : ?>   
			<a href="/account" class="button-grad">������� � �������</a>
				<?php endif;?>
					<?php if (!$_SESSION["user_id"]) : ?>	
			<a href="/signup" class="button-grad">������ ������������!</a>
 <?php endif;?> 	
			</div>
		</div>

	</div>	<div class="stats_board" id="counts">

	<div class="wrapper">
	<div class="inner">
			
			
				<div class="title_main"> ���������� <span>�������</span><a name="stat" id="stat"></a></div>
<div class="block one circles">
	<div class="img"><img src="images/stats-ico1.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><?=$stats_data["all_users"]+0; ?></ttn> <span>���.</span></div>
	<div class="hr"></div>
	<div class="info">����� ����������</div>
</div>

				
<div class="block two circles">
	<div class="img"><img src="images/stats-ico2.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><?=sprintf("%.2f",$stats_data["all_insert"]-$stats_data["all_payment"]+0000); ?></ttn> <span>���.</span></div>
	<div class="hr"></div>
	<div class="info">����� ����������</div>
</div>

				
<div class="block third circles">
	<div class="img"><img src="images/stats-ico3.png" alt=""></div>
	<div class="number value"><ttn class="spincrement" style="opacity: 1; visibility: visible;"><?=sprintf("%.2f",$stats_data["all_payment"]); ?></ttn> <span>���.</span></div>
	<div class="hr"></div>
	<div class="info">���������� �����������</div>
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
</script></ttn> <span>����</span></div>
	<div class="hr"></div>
	<div class="info">����� ������</div>
</div>

		</div>

	</div>
</div>

<div class="zahvat1">
	<div class="wrapper">
		<br>
		<div class="desc">
			
			<h3>����� ������������ �������� ������!</h3>
<p>
������������ ������ �������� ����� ������Cryply RIG. ��������� ������, ��������� ������� � ��������� �������� ������ �� �������! </p>




		</div>

		<div class="link">	<?php if ($_SESSION["user_id"]) : ?>   
			<a href="/account" class="button-grad">������� � �������</a>
				<?php endif;?>
					<?php if (!$_SESSION["user_id"]) : ?>	
			<a href="/signup" class="button-grad">������ ������������!</a>
 <?php endif;?> 	</div>


	</div>
</div>


<div class="shop">
	
<div class="wrapper">

		<div class="title_main">Lucky <span>�������</span></div>
		<!-- 180000 ���� <br>90000 �������� �������� ����� <br>90000 ������� <br>3000� ����  <br>125� ��� -->

<div class="item">
	
	<div class="img"><img src="images/10.png" alt=""></div>
	<div class="pname"> Intel Core i5-4460</div>
	<div class="desc"> 550H/s</div>
	<a href="/account/farm" class="link">������ ����������</a>

</div>

<div class="item">
	
	<div class="img"><img src="images/11.png" alt=""></div>
	<div class="pname">Intel Core i7 770k</div>
	<div class="desc"> 980H/s</div>
	<a href="/account/farm" class="link">������ ����������</a>

</div>


<div class="item">
	
	<div class="img"><img src="images/12.png" alt=""></div>
	<div class="pname">Intel Core i7 3770k </div>
	<div class="desc">1300H/s</div>
	<a href="/account/farm" class="link">������ ����������</a>

</div>


<div class="item">
	
	<div class="img"><img src="images/13.png" alt=""></div>
	<div class="pname"> Intel Xeon 2630v4</div>
	<div class="desc">2800H/s</div>
	<a href="/account/farm" class="link">������ ����������</a>

</div>


<div class="item">
	
	<div class="img"><img src="images/14.png" alt=""></div>
	<div class="pname">Intel Xeon Platinum </div>
	<div class="desc">5200H/s</div>
	<a href="/account/farm" class="link">������ ����������</a>

</div>


</div>

</div>


<div class="zahvat2">
	<div class="wrapper">
		
		<div class="t1">�������� � ������� "������� ���"</div>
		<div class="t2">��� ����������� ������</div>

		<center><img src="../images/deal.png" alt=""></center>

		<div class="t3">����������� ������ �Cryply RIG � � �������. <br>	 ������� ���������� � �������� � ������ ������!</div>
	<?php if ($_SESSION["user_id"]) : ?>   
			<a href="/account" class="button-grad">������� � �������</a>
				<?php endif;?>
					<?php if (!$_SESSION["user_id"]) : ?>	
			<a href="/signup" class="button-grad">������ ������������!</a>
 <?php endif;?> 	

	</div>
</div>






