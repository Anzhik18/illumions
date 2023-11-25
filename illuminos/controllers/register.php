<?php
	$connect = new mysqli("localhost", "root", "", "up1");
	$connect->set_charset("utf8");
	$sql = sprintf("INSERT INTO `users` VALUES(NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
		$_POST["name"], $_POST["surname"], $_POST["patronymic"], $_POST["login"], $_POST["email"], $_POST["password"], "client"
	);
	if(!$connect->query($sql))
		return die("Ошибка добавления данных: ". $connect->error);

	return header("Location:../index.php?message=");