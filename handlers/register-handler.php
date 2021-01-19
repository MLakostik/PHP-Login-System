<?php
if(isset($_SESSION['name'])) header("Location: https://" . $_SERVER['SERVER_NAME'] . "/project/login-system/login-dashboard-demo");

include($_SERVER['DOCUMENT_ROOT'] . "/project/login-system/config/connect.php");

$error_msg = "";

if(isset($_POST['register-btn'])){

  if($_POST['password'] != $_POST['password2']) $error_msg = "Passwords don't match";
  if(empty($_POST['password'])) $error_msg = "Password is empty";
  if(empty($_POST['email'])) $error_msg = "Email is empty";
  if(empty($_POST['name'])) $error_msg = "Name is empty";

  if(empty($error_msg)){
    $stmt = $conn->prepare("SELECT user_email FROM Login_Users WHERE user_email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0){
      $error_msg = "Email is already in use";
    }
    $stmt->bind_result($user_email);
    $stmt->fetch();
    $stmt->close();
    
    if(empty($error_msg)){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        $_SESSION['name'] = $user_name;
        $_SESSION['email'] = $user_email;

        $stmt = $conn->prepare("INSERT INTO Login_Users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user_name, $user_email, $hashed_password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: https://" . $_SERVER['SERVER_NAME'] . "/project/login-system/login-dashboard-demo");
    }
      
  }

}
?>