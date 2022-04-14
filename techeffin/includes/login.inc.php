<?php

if(isset($_POST['action']) and $_POST['action']=='change-login')
{
  try
  {
    $sql='SELECT * FROM account WHERE username=:name AND `code` != :id ';
    $s=$pdo->prepare($sql);
    $s->bindValue(':name',$_POST['username']);
    $s->bindValue(':id',$myProfile['code']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $error='error in checking account';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
  }
  $row=$s->fetch();
  if($row[0]>0)
  {
    echo "<script>alert('Username Already Exist');
    window.location.href = '';</script>" ;
    exit();
  }

  if($_POST['password'] != $_POST['confirm'])
  {
    echo "<script>alert('Password And Re-Entered Password Doesnot Match');
    window.location.href = '';</script>" ;
    exit();
  }

  try
  {
    $sql='UPDATE account SET
      username=:username,
      password=:password,
      parent=:parent,
      password_update=:password_update,
      updated=NOW()
      WHERE `code`=:id';
    $s= $pdo->prepare($sql);
    $s->bindValue(':username',$_POST['username']);
    $s->bindValue(':password',md5($_POST['password']));
    $s->bindValue(':id',$myProfile['code']);
    $s->bindValue(':parent',$myProfile['code']);
    $s->bindValue(':password_update','updated');
    $s->execute();
  }
  catch(PDOException $e)
  {
    $error='error in updating my profile';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }

  echo "<script>alert('You Have To Re-Login For The Changes To Take Place');
  window.location.href = '';</script>" ;
  exit();

  header('location: .');
  exit();
}

///////////////////////////////////////////////////////////////////////////////

if($myProfile['password update'] == '')
{
  include 'update-login.html.php';
  exit();
}
