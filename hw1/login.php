<?php
require_once 'dbconfig.php';

session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) {
    header("Location: home.php");
    exit;
}

$emailErr = $passErr = "";
$email = $pass = $hashPass = ""; 
$count = 0;

if($_SERVER['REQUEST_METHOD']=="POST"){

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    if(empty($_POST["f-email"])){
        $emailErr = "Email is required!";
        $count++;
    }else{
        if(!filter_var($_POST['f-email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format!";
            $count++;
        }else{
            $email = mysqli_real_escape_string($conn, $_POST["f-email"]);
        }
    }

    if(empty($_POST["f-pass"])){
        $passErr = "Password is required!";
        $count++;
    }else{
        $pass = mysqli_real_escape_string($conn, $_POST["f-pass"]); 
    }

    if($count==0){
        $query = sprintf("SELECT * FROM users WHERE email ='%s'", $email);
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);
            if(password_verify($pass,$row['password'])){
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['userID'];
                header("Location: home.php");
                mysqli_close($conn);
                exit();
            }else{
              $passErr = "Password wrong!";
            }
        }else{
          $emailErr = "There is no user registered with that email!";
        }
    }
}

?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnimeProject - Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;900&display=swap" rel="stylesheet">
  <script src="script/login.js" defer></script>
</head>

<body>
  <main class="container">
    <div class="form-wrapper">
      <div class="title">Login</div>
      <form id="login-form" method="post" autocomplete="off">
        <div class="row">
          <input type="email" id="email-form" name="f-email" placeholder="Email..." value="<?php if(isset($email)) echo($email); ?>">
          <span><?php if(!empty($emailErr)){echo($emailErr);} ?></span>
        </div>
        <div class="row">
          <input type="password" id="password-form" name="f-pass" placeholder="Password">
          <span><?php if(!empty($passErr)){echo($passErr);} ?></span>
        </div>
        <div class="row button">
          <input type="submit" id="submit-form" value="Login now">
        </div>
      </form>
      <div class="signup-redirect">
        <span>Not a member? <a href="signup.php">Signup now!</a></span>
      </div>
    </div>
  </main>
</body>

</html>