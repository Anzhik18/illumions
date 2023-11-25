<?php
	include "check_admin.php";
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");

	$connect->query("INSERT INTO `categories`(`category`) VALUES('".$_POST["category"]."')");

	return header("Location:../admin?");