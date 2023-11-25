<?php
	include "check.php";
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");

	$id = $_GET["id"];

	$order = $connect->query("SELECT * FROM `orders` WHERE `user_id`='".$_SESSION["user_id"]."' AND `order_id`=".$id)->fetch_assoc();

	if($order["status"] != "Новый")
		return header("Location:../cart.php?message=Удалять можно только заказы со статусом \"Новый\"");

	$connect->query("DELETE FROM `orders` WHERE `order_id`=".$order["order_id"]);

	return header("Location:../cart.php?");
