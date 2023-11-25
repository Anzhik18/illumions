<?php
	session_start();

	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");

	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	$sql = "SELECT * FROM `categories`";
	$result = $connect->query($sql);
	$categories = "";
	while($row = $result->fetch_assoc())
		$categories .= sprintf('<option value="%s">%s</option>', $row["category"], $row["category"]);

	$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('  
			<div class="col">
				<img src="%s" alt="">
				<div class="row">
					<h3><a href="product.php?id=%s">%s</a></h3>
					<p>%s+</p>
					<input type="hidden" value="%s" name="product_id">
					<input type="hidden" value="%s" name="year">
					<input type="hidden" value="%s" name="category">
				</div>
				%s
				%s
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["year"], $row["category"],
		($role == "admin") ? '
			<div class="row">
				<p><a href="update.php?id='.$row["product_id"].'" class="text-small">Редактировать</a></p>
				<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
			</div>
		' : '',
		($role != "guest") ? '<p class="text-right"><a href="controllers/add_cart.php?id='. $row["product_id"] .'" class="text-small">В корзину</a></p>' : '');

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

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
			$m = '<li><a href="cart.php">Избранное</a></li>';
			$m = '<a href="index2.php">Личный кабинет</a>';
            $m = '<a href="tarif.php">Подписка</a>';
			
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
    <div class="main">
        <div class="main_menu">
                       <div class="item">
               <div class="menu_item">
                    
                   <?= $menu ?>

              </div>
              
          
                 </div>
        </div>
       </div>
     <!--header-->
<div class="section">
   <div class="header">
       <h1>НОВЕНЬКИЕ</h1>
       <p>Все страхи родом из детства. Финальный сезон <br> при участии победительницы шоу «Новые <br> пацанки» Киры Медведевой уже на Illuminos</p>
       <div class="button">
           <span>Смотреть бесплатно </span>
           <img src="assets/img/Polygon.png" alt="">
       </div>
   </div>
</div>
    <!--Слайдер-->
       <script>
    document.addEventListener('DOMContentLoaded', function() {
        new Slider(document.querySelector('.carousel'), {
            inFrame: 4, // два элемента в кадре
            offset: 1, // смещать на один элемент
        });
    });
</script>
    <div class="container">
       <div class="rec">
             <h1>Рекомендуем</h1>
      </div>
      <div class="carousel">
          <div class="carousel-window">
              <div class="carousel-slides">
                  <div class="carousel-item">
                      <img src="assets/img/смычок.png" alt="">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/сахар.png" alt="">
                </div>
                  <div class="carousel-item">
                      <img src="assets/img/zhiza.png" alt="">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/смычок.png" alt="">
                </div>
                  <div class="carousel-item">
                      <img src="assets/img/сахар.png" alt="">
                  </div>
                  <div class="carousel-item">
                      <img src="assets/img/чв.png" alt="">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/zhiza.png" alt="">
                </div>
                               </div>
          </div>
          <a href="#" class="carousel-prev">
              <span class="carousel-prev-icon">&lt;</span>
          </a>
          <a href="#" class="carousel-next">
              <span class="carousel-next-icon">&gt;</span>
          </a>
      </div>
  </div>
  <!--section-->
<div class="section2">
    <div class="rec">
        <h1>Новинки </h1>
 </div>
<div class="card1">
    <div class="card">
        <img src="assets/img/плакса.png" alt="">
        <div class="card-text">
            <p>Плакса</p>
            <p>2023</p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/чо.png" alt="">
        <div class="card-text">
            <p>Черное облако</p>
            <p>2023</p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/пилигрим.png" alt="">
        <div class="card-text">
            <p>Пилигрим</p>
            <p>2023</p>
        </div>
    </div>
  </div>

  
<div class="card2">
    <div class="card">
        <img src="assets/img/новенькие.png" alt="">
        <div class="card-text">
            <p>Новенькие</p>
            <p>2023</p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/пищеблок.png" alt="">
        <div class="card-text">
            <p>Пищеблок</p>
            <p>2023</p>
        </div>
    </div>
    <div class="card">
        <img src="assets/img/плюс.png" alt="">
        <div class="card-text">
            <p>Продолжение 14+</p>
            <p>2023</p>
        </div>
    </div>
  </div>
  <!-- Категории -->
  <div class="rec">
    <h1>Категории </h1>
</div>



  
</div>
<main>

		<div class="content">

			<div class="row" style="margin-bottom: 20px">
			<div class="fil" >
				<select id="category" onchange="filter.filter('category', 'filter')">
					<option value disabled selected>Фильтрация по категориям</option>
					<?= $categories ?>
				</select></div>
			</div>

			<div class="row" id="products">
				<?= $data ?>
			</div>

		</div>
	</main>

	<script>filter.products()</script>
	
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
      </body>
      </html>