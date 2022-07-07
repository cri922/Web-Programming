<?php
require_once 'dbconfig.php';

session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) {
    header("Location: home.php");
    exit;
}

$firstNameErr = $lastNameErr = $usernameErr = $emailErr = $passErr = $repassErr = "";
$firstName = $lastName = $username = $email = $pass = $hashPass = $repass = ""; 
$count = 0;

if($_SERVER['REQUEST_METHOD']=="POST"){

  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

  if(empty($_POST["f-fname"])){
    $firstNameErr = "First name is required!";
    $count++;
  }else{
    $firstName = mysqli_real_escape_string($conn, $_POST["f-fname"]);
  }

  if(empty($_POST["f-lname"])){
    $lastNameErr = "Last name is required!";
    $count++;
  }else{
    $lastName = mysqli_real_escape_string($conn, $_POST["f-lname"]);
  }

  if(empty($_POST["f-nick"])){
    $usernameErr = "Username is required!";
    $count++;
  }else{
    if(!preg_match("/^[A-Za-z][A-Za-z0-9_]{7,15}$/",$_POST["f-nick"])){
      $usernameErr = "Length(8-16).Letters,numbers and underscore!";
      $count++;
    }else{
      $username = mysqli_real_escape_string($conn, $_POST["f-nick"]);
      $query = "SELECT username FROM users where username='" . $username . "'";
      $res = mysqli_query($conn, $query);
      if (mysqli_num_rows($res) > 0) {
        $usernameErr = "Username not available!";
        $count++;
      }
    }
  }

  if(empty($_POST["f-email"])){
    $emailErr = "Email is required!";
    $count++;
  }else{
    if(!filter_var($_POST['f-email'], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format!";
      $count++;
    }else{
      $email = mysqli_real_escape_string($conn, $_POST["f-email"]);
      $query = "SELECT email FROM users where email='" . $email . "'";
      $res = mysqli_query($conn, $query);
      if (mysqli_num_rows($res) > 0) {
        $emailErr = "Email already used!";
        $count++;
      }
    }
  }

  if(empty($_POST["f-pass"])){
    $passErr = "Password is required!";
    $count++;
  }else{
    if(strlen($_POST["f-pass"])<8){
      $passErr = "Password must be a minimum of 8 characters!";
      $count++;
    }else{
      $pass = mysqli_real_escape_string($conn, $_POST["f-pass"]);
      $hashPass = password_hash($pass, PASSWORD_DEFAULT);
    }
  }

  if(empty($_POST["f-repass"]) || $_POST["f-pass"] != $_POST["f-repass"]){
    $repassErr = "Password don't match!";
    $count++;
  }

  if($count==0){
    $query = sprintf("INSERT INTO users(firstName,lastName,username,email,password,created_at) VALUES('%s','%s','%s','%s','%s',now())",$firstName,$lastName,$username,$email,$hashPass);
    if (mysqli_query($conn, $query)) {
      $_SESSION["username"] = $_POST["f-nick"];
      $_SESSION["user_id"] = mysqli_insert_id($conn);
      header("Location: home.php");
      mysqli_close($conn);
      exit();
    }
  }
}
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnimeProject - Signup</title>
  <link rel="stylesheet" href="css/signup.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;900&display=swap" rel="stylesheet">
  <script src="script/signup.js" defer></script>
</head>
<body>
  <main class="container">
    <div class="form-wrapper">
      <div class="title">Signup <br> <span class="subtitle">It's free and easy!</span></div>
      <form name="signup" id="signup-form" method="post" autocomplete="off">
        <div class="row">
          <input type="text" id="name-form" name="f-fname" placeholder="First Name" value="<?php if(isset($firstName)) echo($firstName); ?>">
          <span><?php if(!empty($firstNameErr)){echo($firstNameErr);} ?></span>
        </div>
        <div class="row">
          <input type="text" id="surname-form" name="f-lname" placeholder="Last Name" value="<?php if(isset($lastName)) echo($lastName); ?>">
          <span><?php if(!empty($lastNameErr)){echo($lastNameErr);} ?></span>
        </div>
        <div class="row">
          <input type="text" id="username-form" name="f-nick" placeholder="Username" value="<?php if(isset($username)) echo($username); ?>">
          <span><?php if(!empty($usernameErr)){echo($usernameErr);} ?></span>
        </div>
        <div class="row">
          <input type="email" id="email-form" name="f-email" placeholder="Email" value="<?php if(isset($email)) echo($email); ?>">
          <span><?php if(!empty($emailErr)){echo($emailErr);} ?></span>
        </div>
        <div class="row">
          <input type="password" id="password-form" name="f-pass" placeholder="Password">
          <span><?php if(!empty($passErr)){echo($passErr);} ?></span>
        </div>
        <div class="row">
          <input type="password" id="repassword-form" name="f-repass" placeholder="Confirm password">
          <span><?php if(!empty($repassErr)){echo($repassErr);} ?></span>
        </div>
        <div class="row button">
          <input type="submit" id="submit-form" value="Signup now!">
        </div>
      </form>
      <div class="login-redirect">
        <span>Already have an account? <a href="login.php">Login now!</a></span>
      </div>
    </div>
  </main>
</body>
</html>