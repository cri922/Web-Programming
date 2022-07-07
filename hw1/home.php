<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnimeProject - Home</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;900&display=swap" rel="stylesheet">
  <script src="script/home.js" defer></script>
</head>

<body>
  <header>
    <nav>
      <div class="logo">Anime Project</div>
      <div class="profile-container">
        <img src="images/profile-placeholder.png" id="profile-img">
        <div class="triangle hidden"></div>
        <div class="menu hidden">
          <div class="username"><?php echo($_SESSION['username']) ?></div>
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
  <main class="container">
    <div class="form-search-wrapper">
      <form id="form-anime-search" autocomplete="off">
        <input type="text" id="anime-input" placeholder="Search for an anime...">
        <input type="submit" value="GO">
      </form>
    </div>
    <div class="anime-container">
    </div>
    <div class="favourites-wrapper">
      <h1>My Favourites anime:</h1>
      <div class="favourites"></div>
    </div>
  </main>
  <footer>
    <div class="github-wrapper">
      <a href="https://github.com/cri922" target="_blank"><img src="images/github.png"></a>
    </div>
    <div class="powered">Powered by Cristofero Lo Vullo</div>
  </footer>
</body>

</html>