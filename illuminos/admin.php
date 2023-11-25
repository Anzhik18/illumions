<?php
	include "controllers/check_admin.php";
	
	
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");

	$sql = "SELECT * FROM `categories`";
	$result = $connect->query($sql);
	$categories = "";
	while($row = $result->fetch_assoc())
		$categories .= sprintf('<option value="%s">%s</option>', $row["category"], $row["category"]);

	$sql = "SELECT * FROM `orders` INNER JOIN `users` USING(`user_id`) ORDER BY `created_at` DESC";
	$result = $connect->query($sql);
	$orders = "";
	while($row = $result->fetch_assoc()) {
		$adv = ($row["status"] == "Новый") ? '
			<form action="controllers/confirm_order.php" class="w100" method="POST">
				<input type="hidden" value="'.$row["order_id"].'" name="id" />
				<button>Подтвердить заказ</button>
			</form>
			<h3 class="text-center">Отменить заказ</h3>
			<form action="controllers/cancel_order.php" class="w100" method="POST">
				<input type="hidden" value="'.$row["order_id"].'" name="id" />
				<textarea placeholder="Причина отмены" name="reason" required></textarea>
				<button style="margin:0">Отменить заказ</button>
			</form>
		' : '';
		$adv = ($row["status"] == "Отменённый") ? '
			<h3 class="text-center">Причина отмены:</h3>
			<p class="reason">'.$row["reason"].'</p>
		' : $adv;
		$orders .= sprintf('
			<div class="col text-left">
				<h2>Заказ %s</h2>
				<p>Заказчик: <b>%s %s %s</b></p>
				<p>Статус заказа: <b>%s</b></p>
				<p>Количество товаров: <b>%s</b></p>
				<input type="hidden" value="%s" name="order_id" />
				%s
				<p class="text-small text-right">%s</p>
			</div>
		', $row["number"], $row["name"], $row["surname"], $row["patronymic"], $row["status"], $row["count"], $row["order_id"], $adv, $row["created_at"]);
	}
	if(!$orders)
		$orders = '<h3 class="text-center">Заказы отсутствуют</h3>';

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
            
           <div class="item">
               <div class="menu_item">
			          <?= $menu ?>
              </div>
              
          
                 </div>
        </div>
       </div>

	<main>
		<div class="content">
			<div class="head">Категории</div>
			<form action="controllers/category_add.php" method="POST">
				<div class="part">
					<input type="text" placeholder="Название категории" name="category" required>
					<button>Добавить</button>
				</div>
			</form>
			<form action="controllers/category_delete.php" method="POST">
				<div class="part">
					<select name="category" required>
						<option value selected disabled>Категории</option>
						<?= $categories ?>
					</select>
					<button>Удалить</button>
				</div>
			</form>

			<div class="head">Добавить </div>
			<form enctype="multipart/form-data" action="controllers/add_product.php" method="POST">
				<input type="text" placeholder="Название" name="name" required>
				<input type="number" placeholder="Возраст" name="price" required>
				<select name="category" required>
					<option value selected disabled>Категория</option>
					<?= $categories ?>
				</select>
				<p class="text-left">Фотография товара</p>
				<input type="file" name="image" required>
				<button>Добавить</button>
			</form>

			
		</div>
	</main>

	<script>filter.orders()</script>
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