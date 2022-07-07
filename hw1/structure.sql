--
-- Database: `homework`
--

CREATE DATABASE IF NOT EXISTS `homework`;
USE `homework`;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE users(
  userID BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstName varchar(255) not null,
  lastName varchar(255) not null,
  username varchar(16) not null unique,
  email varchar(255) not null unique,
  password varchar(255) not null,
  created_at TIMESTAMP not null
) engine='InnoDB';

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Cristian', 'Lombardi', 'cristian_lo', 'cristian@gmail.com', '$2y$10$lF9sQF3K9EaWX4uXuMz9ye4nQhhAC2tplD1KGpxIZLHy/T12ADHbG', '2022-05-29 13:15:36'),
(2, 'Paolo', 'Lombardi', 'paolo_lo', 'paolo@gmail.com', '$2y$10$rwZh1iAIxIrFyjKZQs8njOX6s28BNhgIoN5raPO2WnqBq.xfd4Vku', '2022-05-29 13:16:49');

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE likes(
  userID BIGINT UNSIGNED not null,
  animeID integer not null,
  INDEX idx_likes_user(userID),
  FOREIGN KEY(userID) REFERENCES users(userID) on delete cascade,
  PRIMARY KEY(userID,animeID)
) engine='InnoDB';

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`userID`, `animeID`) VALUES
(1, 20),
(1, 21),
(1, 1735),
(2, 20),
(2, 1735),
(2, 28171);

DELIMITER //
CREATE TRIGGER delete_likes_of_deleted_user
BEFORE DELETE ON users
FOR EACH ROW
BEGIN
  IF EXISTS(SELECT userID FROM likes where userID=OLD.userID) 
  THEN DELETE FROM likes WHERE userID=OLD.userID;
  END IF;
END//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE anime(
  animeID integer not null,
  likes integer not null,
  comments integer not null,
  PRIMARY KEY(animeID)
) engine='InnoDB';

--
-- Dump dei dati per la tabella `anime`
--

INSERT INTO `anime` (`animeID`, `likes`, `comments`) VALUES
(20, 2, 2),
(21, 1, 1),
(1735, 2, 0),
(28171, 1, 0);

DELIMITER //
CREATE TRIGGER insert_updatelikes_anime 
AFTER INSERT ON likes 
FOR EACH ROW
BEGIN
  IF EXISTS(SELECT animeID FROM anime where animeID=NEW.animeID) 
    THEN UPDATE anime SET likes = likes + 1 WHERE animeID=NEW.animeID;
  ELSE INSERT INTO anime(animeID,likes,comments) VALUES(NEW.animeID,1,0);
  END IF;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER delete_updatelikes_anime 
AFTER DELETE ON likes 
FOR EACH ROW
BEGIN
  UPDATE anime SET likes = likes - 1 WHERE animeID=OLD.animeID;
END//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE comment(
  commentID BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  userID BIGINT UNSIGNED not null,
  animeID integer not null,
  content TEXT not null,
  created_at TIMESTAMP not null,
  INDEX idx_comment_user(userID),
  FOREIGN KEY(userID) REFERENCES users(userID) on delete cascade
) engine='InnoDB';

--
-- Dump dei dati per la tabella `comment`
--

INSERT INTO `comment` (`commentID`, `userID`, `animeID`, `content`, `created_at`) VALUES
(1, 1, 21, 'I love it!', '2022-05-29 13:16:03'),
(2, 1, 20, 'I love it!', '2022-05-29 13:16:17'),
(3, 2, 20, 'I love it!', '2022-05-29 13:17:05');

DELIMITER //
CREATE TRIGGER delete_comments_of_deleted_user
BEFORE DELETE ON users
FOR EACH ROW
BEGIN
  IF EXISTS(SELECT userID FROM comment where userID=OLD.userID) 
  THEN DELETE FROM comment WHERE userID=OLD.userID;
  END IF;
END//
DELIMITER ; 

DELIMITER //
CREATE TRIGGER insert_updatecomments_anime 
AFTER INSERT ON comment 
FOR EACH ROW
BEGIN
  IF EXISTS(SELECT animeID FROM anime where animeID=NEW.animeID) 
    THEN UPDATE anime SET comments = comments + 1 WHERE animeID=NEW.animeID;
  ELSE INSERT INTO anime(animeID,likes,comments) VALUES(NEW.animeID,0,1);
  END IF;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER delete_updatecomments_anime 
AFTER DELETE ON comment 
FOR EACH ROW
BEGIN
  UPDATE anime SET comments = comments - 1 WHERE animeID=OLD.animeID;
END//
DELIMITER ;
