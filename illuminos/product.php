<?php
	session_start();
	
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");

	
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
	$id = (isset($_GET["id"])) ? $_GET["id"] : 0;

	$sql = "SELECT * FROM `products` WHERE `count` > 0 AND `product_id`=". $id;
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	if(!$product = $result->fetch_assoc())
		return header("Location:index.php?message=Товар отсутствует");
	
/******МЕНЮ******/
$menu = '
<div class="logo">
	 <a href="index.php">
		<img src="assets/img/Illuminos.svg" alt="">
	</a>
</div>
<li><a href="login.php">Подписка</a></li>

	<li><a href="index.php">Фильмы</a></li>
	<li><a href="catalog.php">Сериалы</a></li>
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
	<main>
		<div class="content">
		<div class="section__header">
		
            </div>
			<div class="head"></div>
			<div class="product wrap">
				      <video controls width="800">
					         <source src="<?= $product["video"] ?>" alt="">
                    </video>
				<div class="text">
					<h3><b><?= $product["name"] ?></b></h3><br>
					<p><b><?= $product["count"] ?>.0</b>      <b><?= $product["year"] ?>г.</b>   <b><?= $product["time"] ?> </b>      <b><?= $product["price"] ?>+</b></p>
					<p><b><?= $product["country"] ?> </b> <b> <?= $product["model"] ?></b></p>
					</div>
					<BR><BR><BR><BR>
				
					
					<?php
						if($role == "admin")
							echo '
								<div class="row">
									<p><a href="update.php?id='.$product["product_id"].'" class="text-small">Редактировать</a></p>
									<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$product["product_id"].'" class="text-small">Удалить</a></p>
								</div>
							';

						if($role != "guest")
							echo '<a href="controllers/add_cart.php?id='. $product["product_id"] .'" ><div class="pr">В избранное</div></div>';
					?>
				</div>
				<div class="opisanie">
				<?= $product["sezon"] ?>

					<div class="opis1">
                      <p><b><?= $product["opisanie"] ?></p>				
                    </div>
					<div class="opis2">
					<p>Актеры: <br>
					<?= $product["acters"] ?>
                    </p>
					<p>Режисcеры: <br>
					<b><?= $product["rejiser"] ?>
                    </p>
</div>

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
             <h1>Фильмы в подборках</h1>
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







		






	</main>
	

	<script src="scripts/slider.js"></script>
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
		<body>
		