<?php

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $file = $_POST['file'];
  $age = $_POST['age'];
  $referrer = $_POST['referrer'];
  $bio = $_POST['bio'];

//Database connection
$conn = new mysqli('localhost','root','','signup');
if($conn->connect_error) {
  die('Connection Failed : '.$conn->connect_error);
} else {
  $stmt  = $conn->prepare("insert into login(firstName, lastName, email, password, gender, file, age, referrer, bio)values(?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssiss",$firstName, $lastName, $email, $password, $gender, $file, $age, $referrer, $bio);
  $stmt->execute();
  echo "Registration Successfully...";
  $stmt->close();
  $conn->close();
}
?>