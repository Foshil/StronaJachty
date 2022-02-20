-- db_name = "StatkiDB" --
--DROP TABLE IF EXISTS `ships`;--
CREATE TABLE IF NOT EXISTS `ships` (
  `id` int(10) NOT NULL AUTO_INCREMENT primary key ,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `ships` (`id`, `name`, `category`, `description`, `price`) VALUES
(1, 'Haco', 'Jacht śródlądowy', 'Rodzinny jacht, 6 miejsc, maksymalna predkosc 70km/h.', 670),
(2, 'Rodster', 'Jacht śródlądowy', 'Rodzinny jacht, 4 miejsc, maksymalna predkosc 80km/h.', 440),
(3, 'Faster', 'Jacht śródlądowy', 'Rodzinny jacht, 10 miejsc, maksymalna predkosc 50km/h.', 1030),
(4, 'CleanUp', 'Jacht śródlądowy', 'Rodzinny jacht, 8 miejsc, maksymalna predkosc 70km/h.', 800),
(5, 'Ocean', 'Jacht morski', 'Wygodny jacht, 10 miejsc, maksymalna predkosc 30km/h.', 700),
(6, 'Water', 'Jacht morski', 'Wygodny jacht, 10 miejsc, maksymalna predkosc 20km/h.', 8000),
(7, 'Rain', 'Jacht morski', 'Wygodny jacht, 10 miejsc, maksymalna predkosc 50km/h.', 900),
(8, 'Flower', 'Jacht morski', 'Wygodny jach, 10 miejsc, maksymalna predkosc 90km/h.', 1000);

--DROP TABLE IF EXISTS `orders`;--
CREATE TABLE IF NOT EXISTS `orders` (
    `id` int(110) not null AUTO_INCREMENT primary key,
    `ship_id` int(10) not null,
    `first_name` varchar(15) not null,
    `last_name` varchar(15) not null,
    `start` DATE not null,
    `end` DATE not null
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;