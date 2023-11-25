<?php
	include "controllers/check_admin.php";
	
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");;

	$sql = "SELECT * FROM `products` WHERE `product_id`=".$_GET["id"];
	$product = $connect->query($sql)->fetch_assoc();

	$result = $connect->query("SELECT * FROM `categories`");
	$categories = "";
	while($row = $result->fetch_assoc()) {
		$selected = ($product["category"] == $row["category"]) ? "selected" : "";
		$categories .= sprintf('<option value="%s" %s>%s</option>', $row["category"], $selected, $row["category"]);
	}

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
<div class="main">
	<div class="main_menu">
		<div class="logo">
		</div>
	   <div class="item">
		   <div class="menu_item">
		   <?= $menu ?>
		  </div>
		  
	  
			 </div>
	</div>
   </div>>

	<main>
		<div class="content">
			
			<div class="head">Изменить товара</div>
			<form enctype="multipart/form-data" action="controllers/update_product.php" method="POST">
				<input type="hidden" name="id" value="<?= $product["product_id"] ?>">
				<input type="hidden" name="path" value="<?= $product["path"] ?>">
				<input type="text" placeholder="Название" name="name" value="<?= $product["name"] ?>" required>
				<input type="number" placeholder="Цена" name="price" value="<?= $product["price"] ?>" required>
				<input type="text" placeholder="Страна производитель" name="country" value="<?= $product["country"] ?>" required>
				<input type="number" placeholder="Год выпуска" name="year" value="<?= $product["year"] ?>" required>
				<input type="text" placeholder="Модель" name="model" value="<?= $product["model"] ?>" required>
				<select name="category" required>
					<option value selected disabled>Категория</option>
					<?= $categories ?>
				</select>
				<input type="number" placeholder="Количество на складе" name="count" value="<?= $product["count"] ?>" required>
				<p class="text-left">Фотография товара</p>
				<input type="file" name="image">
				<button>Изменить</button>
			</form>

		</div>
	</main>



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