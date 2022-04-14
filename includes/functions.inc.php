<?php
	session_start();

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
			'sms'=>$row['sms'],
			'pushID'=>$row['push id'],
			'pushKey'=>$row['push key'],
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

	function sms($contact,$var1,$var2,$parent){

		include $_SERVER['DOCUMENT_ROOT'].'/techeffin/includes/db.inc.php';
		// create a new cURL resource

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\n  \"flow_id\": \"60dd90edd6fc057d4209fa7e\",\n  \"sender\": \"COGMED\",\n  \"mobiles\": \"91".$contact."\",\n  \"var1\": \"".$var1."\",\n  \"var2\": \"".$var2."\"\n}",
		  CURLOPT_HTTPHEADER => array(
		    "authkey: 362498AjXWUSKuGt60c83a06P1",
		    "content-type: application/JSON"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$transaction = rand(111, 999) . rand(111,999) . rand(11, 99) . rand(11, 99);;

		try
		{
			$sql='INSERT INTO sms SET
				transaction=:transaction,
				parent=:parent,
				message=:message,
				contact=:contact,
				created=NOW()';

			$s= $pdo->prepare($sql);
			$s->bindValue(':transaction',$transaction);
			$s->bindValue(':parent',$parent);
			$s->bindValue(':message',urldecode($message));
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
