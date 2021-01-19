<?php 
if(isset($_SESSION['name'])) header("Location: https://" . $_SERVER['SERVER_NAME'] . "/project/login-system/login-dashboard-demo");

include($_SERVER['DOCUMENT_ROOT'] . "/project/login-system/config/connect.php");

$error_msg = "";

if(isset($_POST['login-btn'])){

  if(empty($_POST['password'])) $error_msg = "Password is empty";
  if(empty($_POST['email'])) $error_msg = "Email is empty";

  if(empty($error_msg)){
    $stmt = $conn->prepare("SELECT user_name, user_email, user_password FROM Login_Users WHERE user_email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows === 0){
      $error_msg = "Email or password is incorrect";
    }
    $stmt->bind_result($user_name, $user_email, $user_password);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    $password = $_POST['password'];

    if(password_verify($password, $user_password)) {
      $_SESSION['name'] = $user_name;
      $_SESSION['email'] = $user_email;
    }else{
      $error_msg = "Email or password is incorrect";
    }

    if(empty($error_msg)) header("Location: https://" . $_SERVER['SERVER_NAME'] . "/project/login-system/login-dashboard-demo");
    

  }

}
?>