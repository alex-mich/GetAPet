-- INSTRUCTIONS -- 
-- Πριν τρέξετε το script δημιουργήστε με το phpmyadmin μια βάση 
-- με το όνομα getapet (πολύ σημαντικό το όνομα να είναι ακριβώς το ίδιο).
-- Αφού δημιουργηθεί η βάση την επιλέγετε και πατάτε στο tab import, 
-- εκεί επιλέγετε αυτό το αρχείο και πατάτε go.
-- Αυτομάτως δημιουργούνται οι πίνακες με κάποιες demo εγγραφες.



-- Table structure for table users
DROP TABLE IF EXISTS users;

CREATE TABLE users(
user_id int(6) NOT NULL DEFAULT 0,
first_name varchar(40),
last_name varchar(40),
username varchar(40),
password varchar(40),
email varchar(40),
account_type int(1),
address varchar(40),
telephone varchar(40),
user_photo longblob,
PRIMARY KEY (user_id)
);

LOCK TABLES users WRITE;
INSERT INTO users VALUES
(1, 'Nikos', 'Papas', 'npapas','12345', 'npapas@gmail.com', 2, 'Venizelou 3', '1234567899', 1234),
(2, 'Kostas', 'Dedes', 'kdedes','23456', 'kdedes@gmail.com', 1, 'Venizelou 2', '1134467899', 1234),
(3, 'Maria', 'Poulou', 'mpoulou','34567', 'mpoulou@gmail.com', 0, 'Venizelou 1', '1324354657', 1234),
(4, 'Sakis', 'Kouvas', 'skouvas','45678', 'skouvas@gmail.com', 1, 'Venizelou 4', '4657687913', 1234),
(5, 'Fey', 'Kremyda', 'fkremyda','56789', 'fkremyda@gmail.com', 2, 'Venizelou 5', '2413354657', 1234);

UNLOCK TABLES;

-- Table structure for table pets
DROP TABLE IF EXISTS pets;

CREATE TABLE pets(
pet_id int(6) NOT NULL DEFAULT 0,
user_id int(6) NOT NULL DEFAULT 0,
pet_type varchar(40),
pet_breed varchar(40),
pet_age int(3),
advert_type int(1),
advert_details varchar (200),
pet_photo longblob,
PRIMARY KEY (pet_id)
);

LOCK TABLES pets WRITE;
INSERT INTO pets VALUES
(1, 2, 'dog', 'kanis', 3, 1, "Please take me to your home, I cook!", 123),
(2, 1, 'cat', 'siam', 3, 1, "This cat is beautiful", 234);

UNLOCK TABLES;
