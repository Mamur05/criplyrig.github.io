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
	<meta name="description" content="����� ������">
	<meta name="keywords" content="��������� �� ������, ��������, ����������, �����, �������� �����, ���������� �� �������">
	<link href="/style/main.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>




	<div class="headerbar">
		<div class="top">
			<div class="wrapper">
				
				<a href="/" class="logo"></a>

				<ul>
				<li><a href="/">�������</a></li>
				<li><a href="#">�������</a></li>
				<li><a href="/rules">�������</a></li>
				<li><a href="/about">�� ����</a></li>
				<!-- <li><a href="/payments" >�������</a></li> -->
				<?php if ($_SESSION["user_id"]) : ?>   
    <li><a href="/account">�������</a></li>
							<?php endif;?>
		<?php if (!$_SESSION["user_id"]) : ?>			
                                <li><a href="/login">����</a></li>
								<li><a href="/signup">�����������</a></li>
  <?php endif;?> 	                                		
										</ul>

			
				<div class="clr"></div>
			
			
			
		