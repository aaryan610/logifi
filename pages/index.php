<?php
	include $_SERVER['DOCUMENT_ROOT'].'/includes/header.inc.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require $_SERVER['DOCUMENT_ROOT'].'/techeffin/includes/PHPMailer/src/Exception.php';
	require $_SERVER['DOCUMENT_ROOT'].'/techeffin/includes/PHPMailer/src/PHPMailer.php';
	require $_SERVER['DOCUMENT_ROOT'].'/techeffin/includes/PHPMailer/src/SMTP.php';

////////////////////////////////////////////////////////////////////////////////

	if(isset($_POST['name']) and $_POST['action']=='sendEmail')
	{
		echo "<script>alert('Email Sent Successfully !!!');</script>" ;

		$EmailFrom = 'support@anandmani.com';
		$name = $_POST["name"];
		$subject = $_POST["name"]." From ". $_POST["email"];
		$EmailTo = 'support@anandmani.com';
		$body = $_POST["message"];

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

		try {
				//Server settings
				$mail->SMTPDebug = 2;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'support@anandmani.com';                 // SMTP username
				$mail->Password = '@Dmin!ogin246';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to

				//Recipients
				$mail->setFrom($EmailFrom, $name);
				$mail->addAddress($EmailTo);               // Name is optional

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = $subject;
				$mail->Body    = $body;
				$mail->AltBody = $body;

				$mail->send();

		} catch (Exception $e) {
			$error='error in sending email';
			include $_SERVER['DOCUMENT_ROOT'].'/techeffin/includes/error.html.php';
			exit();
		}

		$transaction = rand(111, 999) . rand(111,999) . rand(11, 99) . rand(11, 99);;

		try
		{
			$sql='INSERT INTO email SET
				transaction=:transaction,
				name=:name,
				email=:email,
				message=:message,
				created=NOW()';

			$s= $pdo->prepare($sql);
			$s->bindValue(':transaction',$transaction);
			$s->bindValue(':name',$_POST['name']);
			$s->bindValue(':email',$_POST['email']);
			$s->bindValue(':message',$_POST['message']);
			$s->execute();
		}
		catch(PDOException $e)
		{
			$error='error in inserting email'.$e->getmessage();;
			include $_SERVER['DOCUMENT_ROOT'].'/includes/techeffin/error.html.php';
			exit();
		}

		echo "<script>
		window.location.href = '';</script>" ;
		exit();
	}

	if(isset($_GET['page']) and $_GET['page']=='contact-us')
	{
		include 'contact-us.html.php';
		exit();
	}

	if(isset($_GET['page']) and $_GET['page']=='about-us')
	{
		include 'about-us.html.php';
		exit();
	}

	if(isset($_GET['page']) and $_GET['page']=='login')
	{
		include 'login.html.php';
		exit();
	}

	if(isset($_GET['page']) and $_GET['page']=='register')
	{
		include 'register.html.php';
		exit();
	}

	if(isset($_GET['page']) and $_GET['page']=='register-driver')
	{
		include 'register-driver.html.php';
		exit();
	}

	if(isset($_GET['page']) and $_GET['page']=='profile')
	{
		include 'profile.html.php';
		exit();
	}

////////////////////////////////////////////////////////////////////////////////

	include 'dashboard.html.php';
