<style>
.headerbar .top ul li a {
    font-size: 15px;
    color: #000;
    font-weight: 700;
    padding: 5px 18px;
    border-radius: 1e3px;
    text-transform: uppercase;
}</style>
<head>

<meta name="viewport" content="width = 1238" >

	<meta charset="UTF-8">
	<title>Cryply RIG </title>
	<meta name="description" content="Город успеха">
	<meta name="keywords" content="Заработок на здания, вложения, заработать, город, денежный город, заработать на зданиях">
	<link href="/style/main.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>




	<div class="headerbar">
		<div class="top">
			<div class="wrapper">
				
				<a href="/" class="logo"></a>

				<ul>
				<li><a href="/">Главная</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="/rules">Правила</a></li>
				<li><a href="/about">Об игре</a></li>
				<!-- <li><a href="/payments" >Выплаты</a></li> -->
				<?php if ($_SESSION["user_id"]) : ?>   
    <li><a href="/account">аккаунт</a></li>
							<?php endif;?>
		<?php if (!$_SESSION["user_id"]) : ?>			
                                <li><a href="/login">Вход</a></li>
								<li><a href="/signup">Регистрация</a></li>
  <?php endif;?> 	                                		
										</ul>

			
				<div class="clr"></div>
			
			
			
		