CREATE TABLE `mt_daily_special` (
  `item_id` int(14) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `merchant_id` int(14) NOT NULL DEFAULT 0,
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `item_description` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  `category` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `addon_item` text DEFAULT NULL,
  `cooking_ref` text DEFAULT NULL,
  `discount` varchar(14) NOT NULL DEFAULT '',
  `multi_option` text DEFAULT NULL,
  `multi_option_value` text DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '',
  `sequence` int(14) NOT NULL DEFAULT 0,
  `is_featured` varchar(1) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `ingredients` text DEFAULT NULL,
  `spicydish` int(2) NOT NULL DEFAULT 1,
  `two_flavors` int(2) NOT NULL,
  `two_flavors_position` text DEFAULT NULL,
  `require_addon` text DEFAULT NULL,
  `dish` text DEFAULT NULL,
  `item_name_trans` text DEFAULT NULL,
  `item_description_trans` text DEFAULT NULL,
  `non_taxable` int(1) NOT NULL DEFAULT 1,
  `not_available` int(1) NOT NULL DEFAULT 1,
  `gallery_photo` text DEFAULT NULL,
  `points_earned` int(14) NOT NULL DEFAULT 0,
  `points_disabled` int(1) NOT NULL DEFAULT 1,
  `packaging_fee` float(14,4) NOT NULL DEFAULT 0.0000,
  `packaging_incremental` int(1) NOT NULL DEFAULT 0,
  `daily_special_time` varchar(50) NOT NULL DEFAULT '',
  `item_serve` varchar(150) DEFAULT NULL,
  `item_quantity` varchar(150) DEFAULT NULL,
  `item_mt` varchar(150) DEFAULT NULL,
  `item_order_time` varchar(150) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



ALTER TABLE mt_item
ADD COLUMN item_serve VARCHAR(100),
ADD COLUMN item_mt VARCHAR(100),
ADD COLUMN item_quantity VARCHAR(100),
ADD COLUMN item_order_time VARCHAR(100);

CREATE TABLE `mt_meal_plan` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `mo` varchar(255) NOT NULL,
  `tu` varchar(255) NOT NULL,
  `we` varchar(255) NOT NULL,
  `th` varchar(255) NOT NULL,
  `fr` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `avail` varchar(255) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `mo_date` date NOT NULL,
  `tu_date` date NOT NULL,
  `we_date` date NOT NULL,
  `th_date` date NOT NULL,
  `fr_date` date NOT NULL,
  `is_expired` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mt_item_order_time` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`order_id` VARCHAR(100),
	`merchant_id`` VARCHAR(100),
	`dish_ready` VARCHAR(30)
);

ALTER TABLE `mt_merchant` 
ADD COLUMN la_carte_service BINARY DEFAULT 1,
ADD COLUMN daily_special_service BINARY,
ADD COLUMN meal_plan_service BINARY,
ADD COLUMN party_service BINARY,
ADD COLUMN merchant_describe TEXT,
ADD COLUMN merchant_inspire TEXT,
ADD COLUMN merchant_speciality VARCHAR(255);