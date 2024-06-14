SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `task` (`content`, `checked`) VALUES
('Donner les piles à Gérôme', 1),
('Acheter du lait', 0),
('Donner à manger au chat de la voisine', 0),
('Récupérer la tondeuse chez Papi', 1),
('Rencontrer la reine Elisabeth demain matin à 09h00', 0),
('Réviser pour la soutenance', 0),
('Upload le code sur Github', 0),
('Récupérer les clés de l\'armoire à l\'accueil', 0),
('Ramener la feuille de présence au secrétariat', 0),
('Dormir', 1);


DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` (`username`, `password`) VALUES
('demo', 'demo');
COMMIT;