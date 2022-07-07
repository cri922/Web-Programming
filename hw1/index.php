<?php

session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])) {
    header("Location: home.php");
    exit;
}
session_destroy();

?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anime Project</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;900&display=swap" rel="stylesheet">
  <script src="script/index.js" defer></script>
</head>

<body>
  <header>
    <nav>
      <div class="logo">Anime Project</div>
      <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Signup</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="description-wrapper">
      <h1>Anime Project</h1>
      <p>
        Anime Project permette di tener traccia dei propri anime preferiti e cercare informazioni su un qualsiasi anime. Crea un account o effettua il login per scoprine di più.
      </p>
    </section>
    <section class="cover-wrapper">
      <h2>Shingeki no Kyojin</h2>
      <div class="img-wrapper">
        <img src="https://cdn.myanimelist.net/images/anime/10/47347.jpg">
      </div>
      <div>
        <button>Anime</button>
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