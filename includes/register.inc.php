<?php

  if(isset($_POST['action']) and $_POST['action'] =='send otp'){
    $contact = $_POST['contact'];
    $otp = $_POST['otp'];
    $name= $_POST['name'];
    $sender = $companyProfile['name'];

    sms($contact,$name,$otp,$sender);

    exit();
  }

  if(isset($_POST['action']) and $_POST['action'] =='send otp reset'){
    $contact = $_POST['contact'];
    $otp = $_POST['otp'];

    try
    {
      $sql='SELECT * FROM student WHERE contact=:id';
      $s=$pdo->prepare($sql);
      $s->bindValue(':id',$contact);
      $s->execute();
    }
    catch(PDOException $e)
    {
      $error='error in fetching id';
      include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
      exit();
    }
    $row=$s->fetch();
    if(isset($row['name'])){
      $name= $row['name'];
      $sender = $companyProfile['name'];

      sms($contact,$name,$otp,$sender);
      exit();
    }
    else{
      echo "false" ;
  		exit();
    }


  }

  if(isset($_POST['action']) and $_POST['action'] =='register'){
    try
		{
			$sql='SELECT * FROM student WHERE contact=:contact';
			$s=$pdo->prepare($sql);
			$s->bindValue(':contact',$_POST['contact']);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in checking student';
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		}
		$row=$s->fetch();
		if($row>0)
		{
			echo "<script>alert('Contact Number Already Exists');
			window.location.href = '';</script>" ;
			exit();
		}

		$accountID = mt_rand(111,999).mt_rand(111,999).mt_rand(11,99).mt_rand(11,99);
    $password = md5($_POST['password']);

		try
		{

			$sql='INSERT INTO student SET
				`code`=:accountID,
				`name`=:name,
				`fatherName`=:fatherName,
				fatherContact=:fatherContact,
				exam=:exam,
				class=:class,
				contact=:contact,
        password=:password,
        email=:email,
				created=NOW()';

			$s= $pdo->prepare($sql);
			$s->bindValue(':accountID',$accountID);
			$s->bindValue(':name',$_POST['name']);
			$s->bindValue(':fatherName',$_POST['fatherName']);
			$s->bindValue(':fatherContact',$_POST['fatherContact']);
			$s->bindValue(':exam',$_POST['exam']);
			$s->bindValue(':class',$_POST['class']);
      $s->bindValue(':contact',$_POST['contact']);
      $s->bindValue(':password',$password);
      $s->bindValue(':email',$_POST['email']);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in inserting student'.$e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
			exit();
		}

		echo "<script>alert('Student Registered Successfully !!!');
		window.location.href = '../login.html';</script>" ;
		exit();
  }

  if(isset($_POST['action']) and $_POST['action'] =='reset-password'){
    $password = md5($_POST['password']);

    try
    {
      $sql='UPDATE student SET
        password=:password,
        updated=NOW()
        WHERE contact=:contact';
      $s= $pdo->prepare($sql);
      $s->bindValue(':password',$password);
      $s->bindValue(':contact',$_POST['contact']);
      $s->execute();
    }
    catch(PDOException $e)
    {
      $error='error in updating student'.$e->getmessage();
      include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
      exit();
    }

		echo "<script>alert('Password Reset Successfully !!!');
		window.location.href = '../login.html';</script>" ;
		exit();
  }

  if(isset($_POST['action']) and $_POST['action'] =='studentLogin'){
    $password = md5($_POST['password']);

    if(databaseContainsAdminUser($_POST['username'],$password))
    {
      $_SESSION['studentUsername']=$_POST['username'];
      $_SESSION['studentPassword']=$password;

      if(isset($_POST['remember']) && $_POST['remember'] !=''){
        setcookie("studentUsername", $_POST['username'], time() + (86400 * 30), "/");
      }

      echo "<script>
  		window.location.href = '../courses';</script>" ;
  		exit();
    }
    else
    {
      unset($_SESSION['studentUsername']);
      unset($_SESSION['studentPassword']);

      setcookie("studentUsername", "", time() - 3600);

      $GLOBALS['loginError'] ='Contact Number Or Password Is Incorrect';
      return FALSE;
    }


  }

  function databaseContainsAdminUser($username,$password)
	{
		include $_SERVER['DOCUMENT_ROOT'].'/techeffin/includes/db.inc.php';

		try
		{
			$sql='SELECT COUNT(*) FROM student WHERE contact=:username AND password=:password';
			$s= $pdo->prepare($sql);
			$s->bindValue(':username',$username);
			$s->bindValue(':password',$password);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in fetching student account';
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

  if(isset($_POST['action']) and $_POST['action'] =='logout'){

    unset($_SESSION['studentUsername']);
    unset($_SESSION['studentPassword']);

    setcookie("studentUsername", "", time() - 3600);

    echo "<script>alert('Student Logout Successfully !!!');
    window.location.href = '..';</script>" ;
    include "../popups.html.php";
    exit();
  }
