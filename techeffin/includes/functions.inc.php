<?php
	if (!adminIsLoggedIn())
	{
		include 'login.html.php';
		exit();
	}

	try
	{
		$sql='SELECT account.*, role.name AS roleName FROM account INNER JOIN role ON account.role = role.`code` WHERE account.username=:username';
		$s=$pdo->prepare($sql);
		$s->bindValue(':username',$_SESSION['adminUsername']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error='error in fetching account';
		include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		exit();
	}
	$row=$s->fetch();
	if(isset($row['code'])){
		$myProfile=array(
			'id'=>$row['id'],
			'code'=>$row['code'],
			'name'=>$row['name'],
			'role id'=>$row['role'],
			'roleName'=>$row['roleName'],
			'username'=>$row['username'],
			'theme'=>$row['theme'],
			'sidebar'=>$row['sidebar'],
			'session'=>$row['session'],
			'password update'=>$row['password_update']);
	}
	else
	{
		include 'login.html.php';
		exit();
	}

	//////////////////////////////////////////////////////////////////////////////

	try
	{
		$sql='SELECT * FROM company';
		$s=$pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error='error in fetching company profile';
		include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		exit();
	}
	$row=$s->fetch();
	if(isset($row['id']))
	{
		$companyProfile=array(
			'id'=>$row['id'],
			'name'=>$row['name'],
			'tagline'=>$row['tagline'],
			'short description'=>$row['short description'],
			'url'=>$row['url'],
			'contact'=>$row['contact'],
			'email'=>$row['email'],
			'address'=>$row['address'],
			'profile'=>$row['profile'],
			'favicon'=>$row['favicon'],
			'background'=>$row['background'],
			'title'=>$row['title'],
			'meta title'=>$row['meta title'],
			'keyword'=>$row['keyword'],
			'description'=>$row['description'],
			'seo'=>$row['seo'],
			'facebook'=>$row['facebook'],
			'twitter'=>$row['twitter'],
			'google'=>$row['google'],
			'youtube'=>$row['youtube'],
			'instagram'=>$row['instagram'],
			'telegram'=>$row['telegram'],
			'discord'=>$row['discord'],
			'linkedIn'=>$row['linkedIn'],
			'sms status'=>$row['sms status'],
			'sms'=>$row['sms'],
			'pushID'=>$row['push id'],
			'pushKey'=>$row['push key'],
			'session'=>$row['session'],
			'map'=>$row['map']);

			if($row['sms']==''){
				$senderid = 'TECFIN';
			}
			else{
				$senderid = $row['sms'];
			}
	}
	else
	{
		$companyProfile = NULL;
	}

	//////////////////////////////////////////////////////////////////////////////

	try
	{
		$sql="SELECT * FROM console WHERE console = '' ORDER BY sequence ASC";
		$result=$pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error='error in fetching console';
		include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		exit();
	}
	foreach($result as $row)
	{
		$consoles[]=array(
			'id'=>$row['id'],
			'icon'=>$row['icon'],
			'name'=>$row['name'],
			'console'=>$row['console'],
			'url'=>$row['url'],
			'description'=>$row['description'],
			'sequence'=>$row['sequence']);
	}

	try
	{
		$sql="SELECT * FROM console WHERE console != '' ORDER BY sequence ASC";
		$result=$pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error='error in fetching sub console';
		include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		exit();
	}
	foreach($result as $row)
	{
		$subconsoles[]=array(
			'id'=>$row['id'],
			'icon'=>$row['icon'],
			'name'=>$row['name'],
			'console'=>$row['console'],
			'url'=>$row['url'],
			'description'=>$row['description'],
			'sequence'=>$row['sequence']);
	}

	$_SESSION['console']= array();
	$_SESSION['subconsole']= array();
	$_SESSION['consoleName']= array();

	try
	{
		$sql='SELECT roleconsole.*, console.url AS consoleName FROM roleconsole LEFT JOIN console ON roleconsole.consoleid = console.id WHERE roleconsole.roleid=:roleid';
		$s=$pdo->prepare($sql);
		$s->bindValue(':roleid',$myProfile['role id']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error='error in fetching roleconsole';
		include $_SERVER['DOCUMENT_ROOT'].'/includes/admin/error.html.php';
		exit();
	}
	foreach ($s as $row)
	{
		$_SESSION['console'][] = $row['consoleid'];
		$_SESSION['consoleName'][] = $row['consoleName'];
	}

	try
	{
		$sql="SELECT * FROM console WHERE console != '' ";
		$result=$pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error='error in fetching console';
		include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		exit();
	}
	foreach($result as $row)
	{
		$_SESSION['subconsole'][] = $row['console'];
	}

	//////////////////////////////////////////////////////////////////////////////

	function sms($contact,$message,$senderid,$templateid,$type,$parent){

		include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
		// create a new cURL resource
		$ch = curl_init();

		$url = "http://198.24.149.4/API/pushsms.aspx?loginID=techeffin&password=jatboys&mobile=".$contact."&text=".$message."&senderid=".$senderid."&route_id=2&Unicode=0&Template_id=$templateid";
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $url);

		// grab URL and pass it to the browser
		$void = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);

		$transaction = rand(111, 999) . rand(111,999) . rand(11, 99) . rand(11, 99);

		try
		{
			$sql='SELECT * FROM company';
			$s=$pdo->query($sql);
		}
		catch(PDOException $e)
		{
			$error='error in fetching company profile';
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
			exit();
		}
		$row=$s->fetch();
		if($row[0]>0)
		{
			$session=$row['session'];
		}

		try
		{
			$sql='INSERT INTO sms SET
				transaction=:transaction,
				parent=:parent,
				message=:message,
				type=:type,
				session=:session,
				contact=:contact,
				created=NOW()';

			$s= $pdo->prepare($sql);
			$s->bindValue(':transaction',$transaction);
			$s->bindValue(':parent',$parent);
			$s->bindValue(':message',urldecode($message));
			$s->bindValue(':type',$type);
			$s->bindValue(':session',$session);
			$s->bindValue(':contact',$contact);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in inserting sms';
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
			exit();
		}
	}

	//////////////////////////////////////////////////////////////////////////////

	function send_notification($message,$profile,$type,$pushID,$pushKey,$parent){
		include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

		$content = array(
        "en" => "$message"
        );

		$fields = array(
			'app_id' => "$pushID",
			'included_segments' => array('All'),
			'data' => array("foo" => "bar"),
			'large_icon' =>"../assets/img/$profile",
			'contents' => $content
		);

		$fields = json_encode($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												"Authorization: Basic $pushKey"));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

		$transaction = rand(111, 999) . rand(111,999) . rand(11, 99) . rand(11, 99);

		try
		{
			$sql='SELECT * FROM company';
			$s=$pdo->query($sql);
		}
		catch(PDOException $e)
		{
			$error='error in fetching company profile';
			include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
			exit();
		}
		$row=$s->fetch();
		if($row[0]>0)
		{
			$session=$row['session'];
		}

		try
		{
		  $sql='INSERT INTO notification SET
		    transaction=:transaction,
		    message=:message,
		    parent=:parent,
				type=:type,
				session=:session,
		    created=NOW()';

		  	$s=$pdo->prepare($sql);
		  	$s->bindValue(':transaction',$transaction);
		 		$s->bindValue(':message',$message);
				$s->bindValue(':type',$type);
				$s->bindValue(':session',$session);
		  	$s->bindValue(':parent',$parent);
		  	$s->execute();
		}
		catch(PDOException $e)
		{
		  $error='error in inserting notification';
		  include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
		  exit();
		}
  }

	//////////////////////////////////////////////////////////////////////////////

	if(isset($_GET['console']) && $_GET['console']=='changeTheme')
	{
		if(isset($_POST['action']) and $_POST['action']=='changeTheme')
		{
			try
			{
				$sql='UPDATE account SET
					theme=:theme';
				$s= $pdo->prepare($sql);
				$s->bindValue(':theme',$_POST['code']);
				$s->execute();
			}
			catch(PDOException $e)
			{
				$error='error in updating account'.$e->getmessage();
				include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
				exit();
			}

			exit();
		}

		if(isset($_POST['action']) and $_POST['action']=='changeSidebar')
		{
			try
			{
				$sql='UPDATE account SET
					sidebar=:theme';
				$s= $pdo->prepare($sql);
				$s->bindValue(':theme',$_POST['code']);
				$s->execute();
			}
			catch(PDOException $e)
			{
				$error='error in updating account'.$e->getmessage();
				include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
				exit();
			}

			exit();
		}

		if(isset($_POST['action']) and $_POST['action']=='changeSession')
		{
			try
			{
				$sql='UPDATE account SET
					session=:theme';
				$s= $pdo->prepare($sql);
				$s->bindValue(':theme',$_POST['code']);
				$s->execute();
			}
			catch(PDOException $e)
			{
				$error='error in updating session'.$e->getmessage();
				include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
				exit();
			}
			exit();
		}
	}
