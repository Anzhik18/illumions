<?php
	include "check_admin.php";
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");
	$connect->query("DELETE `products`, `orders` FROM `products` RIGHT JOIN `orders` USING(`product_id`) WHERE `product_id`=".$_GET["id"]);
	return header("Location:../admin?");