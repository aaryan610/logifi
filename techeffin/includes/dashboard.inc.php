<?php

  /////////////////////////////////UTILITY//////////////////////////////////////

  try
  {
    $sql='SELECT COUNT(*) FROM exam';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting subject';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalExam = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM subject';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting subject';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalSubject = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM topic';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting exam';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalTopic = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM subtopic';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting sub topic';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalsubTopic = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM heading';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting chapter';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalHeading = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM chapter';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting topic';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalChapter = $result->fetch();

////////////////////////////////////////////////////////////////////////////////

  try
  {
    $sql='SELECT COUNT(*) FROM youtube';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting console';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalVideos = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM `study material`';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting console';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalMaterial = $result->fetch();

  ///////////////////////////////////INSTITUTE/////////////////////////////////////////////

  try
  {
    $sql='SELECT COUNT(*) FROM chapter';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting chapter';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalChapters = $result->fetch();

  try
  {
    $sql='SELECT COUNT(*) FROM topic';
    $result= $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in counting chapter';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $totalTopics = $result->fetch();

  //////////////////////////////STUDENT///////////////////////////////////////////

  try
  {
    $sql="SELECT COUNT(*) FROM student WHERE type ='offline' AND status='active' AND session=:session";
    $s=$pdo->prepare($sql);
    $s->bindValue(':session',$companyProfile['session']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $error='error in counting account';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $result= $s->fetchAll();
  $offlineStudentCount = $result[0];

  try
  {
    $sql="SELECT COUNT(*) FROM student WHERE type ='offline' AND status='inactive' AND session=:session";
    $s=$pdo->prepare($sql);
    $s->bindValue(':session',$companyProfile['session']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $error='error in counting account';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $result= $s->fetchAll();
  $offlineInactiveStudentCount = $result[0];

  try
  {
    $sql="SELECT COUNT(*) FROM student WHERE type ='offline' AND status='left' AND session=:session";
    $s=$pdo->prepare($sql);
    $s->bindValue(':session',$companyProfile['session']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $error='error in counting account';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $result= $s->fetchAll();
  $offlineLeftCount = $result[0];

  try
  {
    $sql="SELECT COUNT(*) FROM student WHERE NOT type ='offline' AND session=:session";
    $s=$pdo->prepare($sql);
    $s->bindValue(':session',$companyProfile['session']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $error='error in counting unregistered students';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $result= $s->fetchAll();
  $onlineStudentCount = $result[0];

  //////////////////////////////////////////////////////////////////////////////


	///////////////////////////BIRTHDAY///////////////////////////////////////////////////

	if(isset($_POST['action']) and $_POST['action']=='sms')
	{
		try
		{
			$sql='SELECT * FROM student WHERE code=:code AND session=:session';
			$s=$pdo->prepare($sql);
			$s->bindValue(':code',$_POST['code']);
			$s->bindValue(':session',$companyProfile['session']);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in fetching id';
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
			exit();
		}
		$row=$s->fetch();

		$firstName=$row['first name'];
		$lastName=$row['last name'];
		$contact=$row['contact'];
		$fees=$_POST['fees'];
		$sender=$companyProfile['name'];
		$type='student fees';
		$templateid='1207161742895224062';

		$message = urlencode("Dear Parent,\nPlease Clear Your ward $firstName $lastName Due Fees of $fees.\nKindly Ignore if already paid.\nRegards, \n$sender");

		sms($contact,$message,$senderid,$templateid,$type,$myProfile['account id']);
		sms('8005867008',$message,$senderid,$templateid,$type,$myProfile['account id']);
		exit();
	}
