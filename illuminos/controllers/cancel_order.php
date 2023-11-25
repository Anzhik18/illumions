<?php
	include "check_admin.php";
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");

	$connect->query(sprintf("UPDATE `orders` SET `status`='Отменённый',`reason`='%s' WHERE `order_id`='%s'", $_POST["reason"], $_POST["id"]));
	return header("Location:../admin?message=Статус заказа изменёна на \"Отменённый\"");
