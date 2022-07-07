<?php

session_start();

function estraiData($input){
  $date = strtotime($input);
  return date('j F Y',$date);
}

function estraiLikes($id){
  require_once 'dbconfig.php';
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
  $id = mysqli_real_escape_string($conn,$id);
  $query ="SELECT likes FROM anime WHERE animeID=$id";
  $res = mysqli_query($conn, $query);
  if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_assoc($res);
    mysqli_close($conn);
    return $row['likes'];
  }
  mysqli_close($conn);
  return 0;
}

function generateGenres($json){
  $genres = array();
  foreach ($json['data']['genres'] as $gen) {
    $genres[] = $gen['name'];
  }
  foreach ($json['data']['demographics'] as $gen) {
    $genres[] = $gen['name'];
  }
  foreach($genres as $gen){
    echo("<li>".$gen."</li>");
  }
}

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit();
}

if(isset($_GET['anime'])){
  $anime_id = $_GET['anime'];
  $url = "https://api.jikan.moe/v4/anime/".$anime_id;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $result = json_decode($response,true);
  curl_close($curl);
  $likes = estraiLikes($anime_id);
}else{
  header("Location: home.php");
  exit();
}
?>


<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo($result['data']['title']); ?></title>
  <link rel="stylesheet" href="css/anime.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;900&display=swap" rel="stylesheet">
  <script src="script/anime.js" defer></script>
</head>
<body>
  <header>
    <nav>
      <div class="logo"> <a href="home.php">Anime Project</a></div>
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
    <section class="first">
      <div class="cover-wrapper">
        <img src="<?php echo($result['data']['images']['jpg']['image_url']); ?>">
      </div>
      <div class="description-wrapper">
        <h1 data-id="<?php echo($anime_id); ?>"><?php echo($result['data']['title']); ?></h1>
        <div class="row">
          Studio: &nbsp; <span><?php echo($result['data']['studios'][0]['name']); ?></span>
        </div>
        <div class="row">
          Stato: &nbsp; <span><?php echo($result['data']['status']); ?></span>
        </div>
        <div class="row">
          Data di uscita: &nbsp; <span><?php echo(estraiData($result['data']['aired']['from'])); ?></span>
        </div>
        <div class="row">
          Episodi: &nbsp; <span><?php echo($result['data']['episodes']); ?></span>
        </div>
        <div class="row">
          Durata episodi: &nbsp; <span><?php echo($result['data']['duration']); ?></span>
        </div>
        <div class="row bottom">
          <img src="images/star.png"> &nbsp; <span class="number"><?php echo($likes); ?></span>
        </div>
      </div>
    </section>
    <section class="second">
      <div class="links">
        <button class="myanimelist"><a href="<?php echo($result['data']['url']); ?>" target="_blank">MyAnimeList</a></button>
        <button class="youtube"><a href="<?php echo($result['data']['trailer']['url']); ?>" target="_blank">Trailer anime</a></button>
      </div>
      <div class="synopsis">
        <h3>Trama:</h3>
        <p><?php echo($result['data']['synopsis']) ?></p>
      </div>
    </section>
    <section class="third">
      <div class="genres">
        <ul>
          <?php generateGenres($result); ?>
        </ul>
      </div>
      <div class="comments-wrapper">
        <h3>Commenti:</h3>
        <div class="comment-form-wrapper">
          <form id="form-comment">
            <textarea name="comment" id="comment-textarea" cols="60" rows="5" placeholder="Add your comment here..."></textarea>
            <input type="submit" value="Post Comment">
          </form>
        </div>
        <div class="comments-content-wrapper">
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