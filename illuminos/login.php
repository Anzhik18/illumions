<?php
	session_start();
	
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");;

	$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC LIMIT 5";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('
			<div class="slide col">
				<img src="%s" alt="" />
				<h3><a href="product.php?id=%s">%s</a></h3>
			</div>
		', $row["path"], $row["product_id"], $row["name"]);

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

		$menu = '
		<div class="logo">
             <a href="index.php">
                <img src="assets/img/Illuminos.svg" alt="">
            </a>
        </div>
		    <li><a href="tarif.php">Подписка</a></li>
			<li><a href="films.php">Фильмы</a></li>
			<li><a href="serial.php">Сериалы</a></li>
			
                       <input name="s" placeholder="Поиск" type="search">
                  
			%s
		';
	
		$m = '';
		if(isset($_SESSION["role"])) {
			$m = '<li><a href="index2.php">Личный кабинет</a></li>';
			$m = '<li><a href="cart.php">Избранное</a></li>';
			$m = '<a href="index2.php">Личный кабинет</a>';

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
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style1.css">
		<script src="assets/scripts/filter.js"></script>
        <script src="assets/js/slider.js"></script>
        <script>
		let role = "<?= (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest" ?>";
	</script>
      </head>
      <body>
           <!--Меню-->
    <div class="main1">
        <div class="main_menu">
            <div class="logo">
            </div>
           <div class="item">
               <div class="menu_item">
			   <?= $menu ?>
              </div>
              
          
                 </div>
        </div>
       </div>
<div class="avtor1">
	<main>
<br>
			<div class="head" id="login">Вход</div>
			<form action="controllers/login.php" method="POST">
				<input type="text" placeholder="Логин" name="login" required>
				<input type="password" placeholder="Пароль" name="password" required>
				<input type="submit" value="Войти" class="search-button" name="search">
			</form>

		</div>
	</main>
	</div>
	<br><br><br>

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