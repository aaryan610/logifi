<?php

  try
  {
    $sql='SELECT * FROM role';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching role';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/shikshabell/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $roles[]=array(
      'serial'=>$i,
      'id'=>$row['id'],
      'code'=>$row['code'],
      'name'=>$row['name'],
      'type'=>$row['type']);
      $i++;
  }

  ////////////////PROJECT SPECIFIC//////////////////////////////////////////////

  try
  {
    $sql='SELECT * FROM exam ORDER BY name ASC';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching exam';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $exams[]=array(
      'serial'=>$i,
      'id'=>$row['id'],
      'photo'=>$row['photo'],
      'code'=>$row['code'],
      'status'=>$row['status'],
      'name'=>$row['name']);
      $i++;
  }

  try
  {
    $sql='SELECT * FROM subject ORDER BY name ASC';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching subject';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/school/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $subjects[]=array(
      'serial'=>$i,
      'id'=>$row['id'],
      'code'=>$row['code'],
      'name'=>$row['name'],
      'photo'=>$row['photo'],
      'status'=>$row['status']);
      $i++;
  }

  try
  {
    $sql='SELECT * FROM topic ORDER BY name ASC';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching class';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/school/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $topics[]=array(
      'serial'=>$i,
      'id'=>$row['id'],
      'code'=>$row['code'],
      'name'=>$row['name'],
      'photo'=>$row['photo'],
      'status'=>$row['status']);
      $i++;
  }

  try
  {
    $sql='SELECT subtopic.*,subject.name AS subject, topic.name AS topic FROM subtopic INNER JOIN subject ON subtopic.subject = subject.code INNER JOIN topic ON subtopic.topic = topic.code ORDER BY name ASC';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching class';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $subTopics[]=array(
      'id'=>$row['id'],
      'code'=>$row['code'],
      'serial'=>$row['serial'],
      'subject'=>$row['subject'],
      'topic'=>$row['topic'],
      'name'=>$row['name'],
      'photo'=>$row['photo'],
      'status'=>$row['status']);
      $i++;
  }

  try
  {
    $sql='SELECT heading.*, subject.name AS class, topic.name AS subject, subtopic.name AS chapter FROM heading INNER JOIN subject ON heading.subject = subject.code INNER JOIN topic ON heading.topic = topic.code INNER JOIN subtopic ON heading.subtopic = subtopic.code ORDER BY heading.created DESC';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching heading'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $headings[]=array(
      'serialNo'=>$i,
      'id'=>$row['id'],
      'code'=>$row['code'],
      'serial'=>$row['serial'],
      'subject'=>$row['class'],
      'topic'=>$row['subject'],
      'subtopic'=>$row['chapter'],
      'status'=>$row['status'],
      'name'=>$row['name']);
      $i++;
  }

  try
  {
    $sql='SELECT chapter.*, subject.name AS class, topic.name AS subject, subtopic.name AS chapter, heading.name AS topic FROM chapter INNER JOIN subject ON chapter.subject = subject.code INNER JOIN topic ON chapter.topic = topic.code INNER JOIN subtopic ON chapter.subtopic = subtopic.code INNER JOIN heading ON chapter.heading = heading.code ORDER BY chapter.created DESC';
    $result=$pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $error='error in fetching chapter'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/error.html.php';
    exit();
  }
  $i=1;
  foreach($result as $row)
  {
    $chapters[]=array(
      'serialNo'=>$i,
      'id'=>$row['id'],
      'code'=>$row['code'],
      'serial'=>$row['serial'],
      'subject'=>$row['class'],
      'topic'=>$row['subject'],
      'subtopic'=>$row['chapter'],
      'heading'=>$row['topic'],
      'status'=>$row['status'],
      'name'=>$row['name']);
      $i++;
  }
