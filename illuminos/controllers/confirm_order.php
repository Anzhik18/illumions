<?php
	include "check_admin.php";
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");
	$connect->query("UPDATE `orders` SET `status`='Подтверждённый' WHERE `order_id`=".$_POST["id"]);
	return header("Location:../admin?message=Статус заказа изменёна на \"Подтверждённый\"");
