<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION["username"];
$firstName = $lastName = $email = "";

require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$id = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
$query = "SELECT firstName,lastName,email FROM users WHERE userID=$id";

$res = mysqli_query($conn, $query);
if(mysqli_num_rows($res)==1){
  $row = mysqli_fetch_assoc($res);
  $firstName = $row['firstName'];
  $lastName = $row['lastName'];
  $email = $row['email'];
}
mysqli_close($conn);

?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnimeProject - Profile</title>
  <link rel="stylesheet" href="css/profile.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;900&display=swap" rel="stylesheet">
  <script src="script/profile.js" defer></script>
</head>
<body>
<header>
    <nav>
      <div class="logo"> <a href="home.php">Anime Project</a></div>
      <div class="profile-container">
        <img src="images/profile-placeholder.png" id="profile-img">
        <div class="triangle hidden"></div>
        <div class="menu hidden">
          <div class="username"><?php echo($_SESSION['username']); ?></div>
          <ul>
            <li>
              <a href="profile.php"><img src="images/person.png"> <span>My Profile</span></a>
            </li>
            <li>
              <a href="logout.php"><img src="images/logout.png"> <span>Logout</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="content-wrapper">
      <div class="image-wrapper">
        <img src="images/profile-placeholder.png">
      </div>
      <div class="info-wrapper">
        <div class="row">
          <span>First name:</span>
          <span class="pleft"><?php echo($firstName); ?></span>
        </div>
        <div class="row">
          <span>Last name:</span>
          <span class="pleft"><?php echo($lastName); ?></span>
        </div>
        <div class="row">
          <span>Username:</span>
          <span class="pleft"><?php echo($username); ?></span>
        </div>
        <div class="row">
          <span>Email:</span>
          <span class="pleft"><?php echo($email); ?></span>
        </div>
      </div>
      <div class="delete-wrapper">
        <span>Do you want to delete your account?</span>
        <img src="images/trash.png">
      </div>
    </div>
    <section id="modal-view" class="hidden">
      <div class="confirmdel-wrapper">
        <span>Are you sure to delete your account?</span>
        <div class="buttons-wrapper">
          <button><a href="delete_account.php">Yes</a></button>
          <button data-ans="no">No</button>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="github-wrapper">
      <a href="https://github.com/cri922" target="_blank"><img src="images/github.png"></a>
    </div>
    <div class="powered">Powered by Cristofero Lo Vullo</div>
  </footer>
</body>
</html>