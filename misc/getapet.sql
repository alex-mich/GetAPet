-- INSTRUCTIONS -- 
-- Πριν τρέξετε το script δημιουργήστε με το phpmyadmin μια βάση 
-- με το όνομα getapet (πολύ σημαντικό το όνομα να είναι ακριβώς το ίδιο).
-- Αφού δημιουργηθεί η βάση την επιλέγετε και πατάτε στο tab import, 
-- εκεί επιλέγετε αυτό το αρχείο και πατάτε go.
-- Αυτομάτως δημιουργούνται οι πίνακες με κάποιες demo εγγραφες.


DROP DATABASE IF EXISTS getapet;

CREATE DATABASE getapet;

USE getapet;

-- Table structure for table users
DROP TABLE IF EXISTS PETS;
DROP TABLE IF EXISTS MESSAGES;
DROP TABLE IF EXISTS USERS;

CREATE TABLE users (
  user_id      INT(6) NOT NULL AUTO_INCREMENT,
  first_name   VARCHAR(40),
  last_name    VARCHAR(40),
  username     VARCHAR(40),
  password     VARCHAR(40),
  email        VARCHAR(40),
  account_type INT(1),
  address      VARCHAR(40),
  telephone    VARCHAR(40),
  user_photo   LONGBLOB,
  active       TINYINT,
  email_code   VARCHAR(80),
  PRIMARY KEY (user_id)
);

LOCK TABLES users WRITE;
INSERT INTO users VALUES
  (1, 'Nikos', 'Papas', 'npapas', '12345', 'npapas@gmail.com', 2, 'Venizelou 3', '1234567899', 1234, 1, ''),
  (2, 'Kostas', 'Dedes', 'kdedes', '23456', 'kdedes@gmail.com', 1, 'Venizelou 2', '1134467899', 1234, 1, ''),
  (3, 'Maria', 'Poulou', 'mpoulou', '34567', 'mpoulou@gmail.com', 0, 'Venizelou 1', '1324354657', 1234, 0, ''),
  (4, 'Sakis', 'Kouvas', 'skouvas', '45678', 'skouvas@gmail.com', 1, 'Venizelou 4', '4657687913', 1234, 0, ''),
  (5, 'Fey', 'Kremyda', 'fkremyda', '56789', 'fkremyda@gmail.com', 2, 'Venizelou 5', '2413354657', 1234, 1, '');

UNLOCK TABLES;

-- Table structure for table pets

CREATE TABLE pets (
  pet_id         INT(6) NOT NULL AUTO_INCREMENT,
  user_id        INT(6) NOT NULL DEFAULT 0,
  pet_type       VARCHAR(40),
  pet_breed      VARCHAR(40),
  pet_age        VARCHAR(20),
  advert_type    INT(1),
  advert_details VARCHAR(200),
  pet_photo      LONGBLOB,
  time           VARCHAR(20),
  due_time       VARCHAR(20),
  PRIMARY KEY (pet_id),
  FOREIGN KEY (user_id) REFERENCES USERS (user_id)
);

LOCK TABLES pets WRITE;
INSERT INTO pets VALUES
  (1, 2, 'dog', 'kanis', '3', 0, "Please take me to your home, I cook!", 123, "2016-12-09 12:42:13",
   "2016-12-19 12:42:13"),
  (2, 1, 'cat', 'siam', '3', 0, "This cat is beautiful", 234, "2016-12-09 14:10:10", "2016-12-17 12:42:13"),
  (3, 3, 'snake', 'diamantis', '3', 1, "ssssssssss!", 123, "2016-12-07 08:31:13", "2016-12-17 12:42:13"),
  (4, 5, 'cow', 'siam', '3', 1, "mmmmmmmm", 234, "2016-12-08 17:31:18", "2016-12-18 12:42:13");

UNLOCK TABLES;

CREATE TABLE messages (
  sender_id       INT(6) NOT NULL,
  receiver_id     INT(6) NOT NULL,
  message_subject VARCHAR(50),
  message_body    VARCHAR(200),
  date_sent       VARCHAR(20),
  FOREIGN KEY (sender_id) REFERENCES USERS (user_id),
  FOREIGN KEY (receiver_id) REFERENCES USERS (user_id)
);

LOCK TABLES messages WRITE;
INSERT INTO messages VALUES
  (5, 1, 'I want the dog you sell', 'Please sell me the dog', '2016-12-09 12:42:13'),
  (4, 1, 'I want the dog you sell', 'Please sell me the dog', '2016-12-09 12:42:13'),
  (2, 1, 'I want the dog you sell', 'Please sell me the dog', '2016-12-09 12:42:13'),
  (3, 1, 'I want the dog you sell', 'Please sell me the dog', '2016-12-09 12:42:13');

UNLOCK TABLES;
