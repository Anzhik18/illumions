<?php
	session_start();
$menu = '
		<div class="logo">
             <a href="index.php">
                <img src="assets/img/Illuminos.svg" alt="">
            </a>
        </div>
        <li><a href="login.php">Подписка</a></li>

			<li><a href="films.php">Фильмы</a></li>
			<li><a href="serial.php">Сериалы</a></li>
			
                       <input name="s" placeholder="Поиск" type="search">
                    
			%s
		';
	
		
		$m = '';
		if(isset($_SESSION["role"])) {
			$m = '<li><a href="tarif.php">Подписка</a></li>';
			$m = '<li><a href="cart.php">Избранное</a></li>';
			
			
			$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php">Изменения</a></li>' : '';
            $m .= '<li><a href="controllers/logout.php">Выход</a></li>';
		} else
			$m = '
				<li><a href="login.php">Вход</a></li>
				<li><a href="register.php">Регистрация</a></li>
			';
		$menu = sprintf($menu, $m);
	?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300i,400,700&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <title></title>
</head>
<body>
   <!-- шапка -->
   
                  <div class="main1">
        <div class="main_menu">
                       <div class="item">
               <div class="menu_item">
                    
                   <?= $menu ?>

              </div>
              
          
                 </div>
        </div>
       </div>
       
                    
                </nav>
               
            </div>
        </div>
    </header>

    <!-- Intro -->
    <div class="intro" id="intro">
    </div><!-- /.intro -->
<BR><br><BR><br><BR><br>
   <!-- блок с личной инфой -->
<div class="lich_infa">
<h2 class="section__tite">Личная информация</h2>
<div class="d2"> 
<div class="d1"></div>
<div class="d3"> <h3 class="section__tite">Имя:</h3>
Полина
<h3 class="section__tite">Пол:</h3>
Женский
<h3 class="section__tite">E-mail:</h3>
poli1@gmail.com</div>
</div>
<hr>

   <!-- блок с покупками и избранными -->
<div class="der">
<br><h3 class="section__tite">Подписка</h3><br>
<p><b>Illuminos</b><br>Месяц за 1 ₽, затем месяц за 199 ₽, дальше — 399 ₽⁠/⁠месяц
</p>
<p>- Более 70 000 фильмов, сериалов и мультфильмов <br>
- Загрузка и просмотр без интернета<br>
- Прямые трансляции Okko Sport<br>
- Детский профиль и родительский контроль
</p>
   <br><br>
</div>
<br><br>
<div class="der">
<br><h3 class="section__tite">История просмотра</h3><br>
<img src="assets/img/вызов.png" alt="" width="180" height="280" >
<img src="assets/img/жиза.png" alt="" width="180" height="280">
<img src="assets/img/плюс.png" alt="" width="180" height="280">

   <br><br>
</div>
<br>
</div>
    <!-- подвал сайта -->
    <footer class="footer">
    <div class="container-footer">
        <div class="copyright">
	 Illuminos
        </div>
		<div class="copyright">
	 Фильмы
        </div>
		<div class="copyright">
	 Сериалы
        </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script  src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>