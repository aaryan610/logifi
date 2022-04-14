<?php
	try
	{
		$pdo = new PDO('mysql:host=localhost;dbname=target_upsc','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
	}
	catch(PDOException $e)
	{
		include '500.html.php';
		exit();
	}
?>
