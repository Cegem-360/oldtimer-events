-- Oldtimer Events - MySQL import for phpMyAdmin
-- Generated from SQLite seed data

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- Table: events
-- --------------------------------------------------------

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `date_display` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `price` varchar(255) DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lng` decimal(10,6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `events` (`id`, `slug`, `title`, `date`, `date_display`, `location`, `country`, `category`, `description`, `distance`, `image`, `featured`, `price`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'riviera-grand-tour-2025', 'The Riviera Grand Tour', '2025-05-24', '24 MAY 2025', 'Nice, French Riviera', 'France', 'Rally', 'A magnificent touring rally along the sun-drenched Côte d\'Azur, celebrating the golden age of post-war motoring. Pre-war and post-war classics welcome.', '320 km', 'coastal-classic.webp', 1, '€450', 43.710200, 7.262000, NOW(), NOW()),
(2, 'highland-rally-2025', 'Highland Rally', '2025-06-18', '18 JUN 2025', 'Inverness, Scotland', 'United Kingdom', 'Rally', 'Navigate the dramatic Scottish Highlands in your cherished classic. Castles, lochs and spectacular highland roads await.', '280 km', 'jaguar-etype.webp', 1, '€320', 57.477000, -4.224000, NOW(), NOW()),
(3, 'alpine-concours-2025', 'Alpine Concours d\'Élégance', '2025-07-07', '07 JUL 2025', 'Montreux, Switzerland', 'Switzerland', 'Concours', 'The prestigious Concours d\'Élégance set against the stunning backdrop of Lake Geneva and the Swiss Alps. Best in Show awarded by international jury.', NULL, 'concours-elegance.webp', 1, '€280', 46.431200, 6.910700, NOW(), NOW()),
(4, 'balatonfured-concours-2025', 'Balatonfüred Concours d\'Élégance', '2025-08-15', '15 AUG 2025', 'Balatonfüred, Hungary', 'Hungary', 'Concours', 'Central Europe\'s premier concours event beside the stunning Lake Balaton. Hungarian and international classics compete for the Grand Prix d\'Honneur.', NULL, 'alfa-romeo.webp', 0, '€180', 46.950300, 17.895900, NOW(), NOW()),
(5, 'spa-classic-2025', 'Spa Classic', '2025-09-12', '12 SEP 2025', 'Spa-Francorchamps, Belgium', 'Belgium', 'Rally', 'Legendary historic racing at one of the world\'s greatest circuits. Pre-1966 racing machines tackle the full Spa-Francorchamps layout.', NULL, 'classic-auction.webp', 0, '€520', 50.437200, 5.971400, NOW(), NOW()),
(6, 'vintage-mille-miglia-2025', 'Mille Miglia Storica', '2025-05-15', '15 MAY 2025', 'Brescia, Italy', 'Italy', 'Rally', 'The world\'s most beautiful race. 1000 miles through the heart of Italy in pre-1957 racing and sports cars.', '1600 km', 'vintage-garage.webp', 1, '€2,800', 45.539700, 10.214300, NOW(), NOW());

-- --------------------------------------------------------
-- Table: museums
-- --------------------------------------------------------

DROP TABLE IF EXISTS `museums`;
CREATE TABLE `museums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lng` decimal(10,6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `museums` (`id`, `name`, `city`, `country`, `description`, `image`, `website`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Museo Nazionale dell\'Automobile', 'Turin', 'Italy', 'Italy\'s national automobile museum with over 200 vehicles spanning 130 years of motoring history.', 'museum-exhibition.webp', NULL, 45.030000, 7.670000, NOW(), NOW()),
(2, 'Cité de l\'Automobile', 'Mulhouse', 'France', 'The world\'s largest car museum featuring 450+ vehicles including the legendary Bugatti collection.', 'concours-elegance.webp', NULL, 47.730000, 7.320000, NOW(), NOW()),
(3, 'Porsche Museum', 'Stuttgart', 'Germany', 'Over 80 vehicles on permanent display at the iconic Porsche factory museum in Stuttgart-Zuffenhausen.', 'coastal-classic.webp', NULL, 48.830000, 9.150000, NOW(), NOW()),
(4, 'Magyar Műszaki és Közlekedési Múzeum', 'Budapest', 'Hungary', 'Hungary\'s transport and technology museum with a notable vintage automobile collection.', 'alfa-romeo.webp', NULL, 47.510000, 19.050000, NOW(), NOW()),
(5, 'Autoworld Brussels', 'Brussels', 'Belgium', 'Over 250 veteran, vintage and classic cars displayed in the magnificent Cinquantenaire Palace.', 'classic-auction.webp', NULL, 50.840000, 4.390000, NOW(), NOW()),
(6, 'Museo Ferrari', 'Maranello', 'Italy', 'The official Ferrari museum celebrating the iconic prancing horse in its spiritual home.', 'vintage-garage.webp', NULL, 44.530000, 10.860000, NOW(), NOW());

-- --------------------------------------------------------
-- Table: garage_cars
-- --------------------------------------------------------

DROP TABLE IF EXISTS `garage_cars`;
CREATE TABLE `garage_cars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `era` varchar(255) NOT NULL,
  `story` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `garage_cars` (`id`, `make`, `year`, `owner`, `country`, `era`, `story`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jaguar E-Type', '1963', 'James Thornton', 'United Kingdom', 'Post-War', 'Restored over six years in a barn in the Cotswolds, this Series 1 3.8 litre roadster has won Best in Show at three consecutive concours.', 'jaguar-etype.webp', NOW(), NOW()),
(2, 'Alfa Romeo Giulietta Sprint', '1958', 'Marco Ferrante', 'Italy', 'Post-War', 'A family heirloom passed down three generations, this Bertone-bodied Sprint has participated in the Mille Miglia Storica four times.', 'alfa-romeo.webp', NOW(), NOW()),
(3, 'Mercedes-Benz 300 SL', '1955', 'Hans-Werner Kiefer', 'Germany', 'Post-War', 'The legendary Gullwing, number 427 of 1,400 produced. Matching numbers, original Rubikonrot finish painstakingly preserved.', 'vintage-garage.webp', NOW(), NOW()),
(4, 'Bentley 4½ Litre', '1928', 'William Ashford', 'United Kingdom', 'Vintage', 'One of the famous Bentley Boys\' racers, campaigned at Le Mans in 1929. A rolling piece of motorsport heritage.', 'classic-auction.webp', NOW(), NOW()),
(5, 'Lancia Aurelia B20 GT', '1952', 'Pierre Dubois', 'France', 'Post-War', 'The car that defined the gran turismo genre. Entered in numerous Rallye Monte-Carlo Historic events by its current custodian.', 'concours-elegance.webp', NOW(), NOW()),
(6, 'Porsche 356 Speedster', '1957', 'Klaus Berger', 'Germany', 'Post-War', 'California-spec Speedster that returned to Europe in 1998. Correct Irish Green over tan leather, original Porsche engine.', 'coastal-classic.webp', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;
