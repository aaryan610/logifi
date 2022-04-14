<?php
	session_start();

	function adminIsLoggedIn()
	{
		if(isset($_POST['action']) and $_POST['action'] =='adminLogin')
		{
			if (!isset($_POST['username']) or $_POST['username'] == '' or !isset($_POST['password']) or $_POST['password'] == '')
			{
				$GLOBALS['loginError']= 'Please Fill In Both Fields';
				return FALSE;
			}

			$password = md5($_POST['password']);

			if(databaseContainsAdminUser($_POST['username'],$password))
			{
				$_SESSION['adminUsername']=$_POST['username'];
				$_SESSION['adminPassword']=$password;

				if(isset($_POST['remember']) && $_POST['remember'] !=''){
					setcookie("adminUsername", $_POST['username'], time() + (86400 * 30), "/");
				}

				return TRUE;
			}
			else
			{
				unset($_SESSION['adminUsername']);
				unset($_SESSION['adminPassword']);

				setcookie("adminUsername", "", time() - 3600);

				$GLOBALS['loginError'] ='Username Or Password Is Incorrect';
				return FALSE;
			}
		}

		if (isset($_POST['action']) and $_POST['action'] == 'logout')
		{
			if(isset($_COOKIE['adminUsername'])) {
				setcookie("adminUsername", "", time() - 3600);
			}

			unset($_SESSION['adminUsername']);
			unset($_SESSION['adminPassword']);

			unset($_SESSION['console']);
			unset($_SESSION['consoleName']);
			unset($_SESSION['subconsole']);
			header('Location:'. $_POST['goto']);
			exit();
		}

		if (isset($_SESSION['adminPassword']))
		{
			return databaseContainsAdminUser($_SESSION['adminUsername'],$_SESSION['adminPassword']);
		}

		if(isset($_COOKIE['adminUsername'])) {
			$_SESSION['adminUsername']= $_COOKIE['adminUsername'];
			return TRUE;
		}
	}

	function databaseContainsAdminUser($username,$password)
	{
		include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

		try
		{
			$sql='SELECT COUNT(*) FROM account WHERE username=:username AND password=:password';
			$s= $pdo->prepare($sql);
			$s->bindValue(':username',$username);
			$s->bindValue(':password',$password);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in fetching account';
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
			exit();
		}

		$row=$s->fetch();
		if($row[0]>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
