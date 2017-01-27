CREATE TABLE IF NOT EXISTS `#__parkway_buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widgetkit_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
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
  `image` varchar(255) NOT NULL,
  `imagethumb` varchar(255) NOT NULL,
  `coordinates` longtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `number_of_floors` varchar(30) NOT NULL,
  `rentable_space` int(11) NOT NULL,
  `leed_cert` tinyint(1) DEFAULT '0',
  `building_size` varchar(255) DEFAULT NULL,
  `fact_sheet` varchar(255) NOT NULL,
  `show_fact_sheet` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_floorplans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `building_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `coordinates` longtext NOT NULL,
  `floor_level` varchar(255) NOT NULL,
  `tooltip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `item_id` int(11) DEFAULT NULL,
  `template` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_suiteplans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floorplan_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__parkway_vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floorplan_id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `suite` varchar(255) NOT NULL,
  `available_space` int(11) NOT NULL DEFAULT '0',
  `divisible` tinyint(1) NOT NULL DEFAULT '0',
  `market_rent` varchar(255) NOT NULL,
  `date_available` date NOT NULL,
  `available_now` tinyint(4) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `keywords` longtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `tag` longtext NOT NULL,
  `tooltip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;