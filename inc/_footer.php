<style> .footer-1 {
    padding: 40px 0;
    color: 00;
    background: #d8d1d585;
}
.footer-2 {
    padding: 25px 0;
    background: #ffffff7d;
    color: 000;
}
.headerbar .top ul li a {
    font-size: 15px;
    color: #0bad00;
    font-weight: 700;
    padding: 5px 18px;
    border-radius: 1e3px;
    text-transform: uppercase;
}</style>
<div class="footer-1">
	<div class="wrapper">
		
		<div class="item-33 left">
			
			<a href="" class="logo"></a>
			<div class="hr"></div>
			<p>������������� ��������� logotype.PW � 
������������ ������ �����.</p>
<p>���� ��������</p>
<p><a href="mailto:support@logotype.pw" target="_blank">support@logotype.pw</a></p>

		</div>

		<div class="item-33">

		</div>


	<div class="item-33 last">

<div class="title">��������</div>
			<div class="hr"></div>

			<ul>
				<td><font color="red">������ �������</font></td>
					<td><font color="red">������ �������</font></td>
						<td><font color="red">������ �������</font></td>
			</ul>

		</div>


	</div>
</div>
<div class="footer-2">
	<div class="wrapper">
		
<div class="le">Copyrights �2017 logotype All rights reserved.</div>		

<ul>
				<li><a href="/">�������</a></li>
				<li><a href="#">�������</a></li>
				<li><a href="/rules">�������</a></li>
				<li><a href="/about">�� ����</a></li>
				<li><a href="/payments">�������</a></li>
				
                               	<?php if ($_SESSION["user_id"]) : ?>   
    <li><a href="/account">�������</a></li>
							<?php endif;?>
		<?php if (!$_SESSION["user_id"]) : ?>			
                                <li><a href="/login">����</a></li>
								<li><a href="/signup">�����������</a></li>
  <?php endif;?> 	
                                			</ul>

				<div class="clr"></div>

	</div>
</div>