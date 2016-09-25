
CREATE TABLE IF NOT EXISTS `#__parkway_buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(5) DEFAULT NULL,
  `zip` mediumint(10) DEFAULT NULL,
  `floor_size` varchar(50) DEFAULT NULL,
  `year_built` varchar(255) DEFAULT NULL,
  `typical_floor_size` varchar(255) DEFAULT NULL,
  `parking_ratio` varchar(255) DEFAULT NULL,
  `amenities` longtext,
  `image` varchar(255) DEFAULT NULL,
  `coordinates` longtext,
  `tags` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `rentable_space` int(11) DEFAULT NULL,
  `number_of_floors` varchar(50) DEFAULT NULL,
  `leed_cert` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_floorplans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `coordinates` longtext,
  `floor_level` varchar(255) DEFAULT NULL,
  `tooltip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `template` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floorplan_id` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `suite` varchar(255) NOT NULL,
  `available_space` int(11) NOT NULL DEFAULT '0',
  `divisible` tinyint(1) NOT NULL DEFAULT '0',
  `market_rent` int(11) NOT NULL,
  `date_available` date NOT NULL,
  `available_now` tinyint(1) NOT NULL DEFAULT '0',
  `pdf` varchar(255) NOT NULL,
  `keywords` longtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `tag` longtext,
  `tooltip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

