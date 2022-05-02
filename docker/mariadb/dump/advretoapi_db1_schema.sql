-- MySQL dump 10.13  Distrib 8.0.28, for macos12.2 (x86_64)
--
-- Host: 23.106.61.67    Database: advretoapi_db1
-- ------------------------------------------------------
-- Server version	5.5.5-10.6.4-MariaDB-1:10.6.4+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_advert_bold`
--

DROP TABLE IF EXISTS `admin_advert_bold`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_advert_bold` (
  `hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`hash`),
  CONSTRAINT `admin_advert_bold_ibfk_1` FOREIGN KEY (`hash`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_accounts`
--

DROP TABLE IF EXISTS `adv_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_accounts` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `currency` smallint(3) NOT NULL,
  `bonus` int(5) NOT NULL,
  `money` double(30,2) NOT NULL,
  PRIMARY KEY (`user_hash`),
  KEY `currency` (`currency`),
  CONSTRAINT `adv_accounts_ibfk_2` FOREIGN KEY (`currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_accounts_detail`
--

DROP TABLE IF EXISTS `adv_accounts_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_accounts_detail` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sum` double NOT NULL,
  `dt` int(11) NOT NULL,
  `reason_code` int(11) DEFAULT NULL COMMENT 'Код основания платежа',
  `reason_text` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Текст основания платежа',
  `hash_ad` varchar(7) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_hash` (`user_hash`),
  KEY `reason_code` (`reason_code`),
  KEY `hash_ad` (`hash_ad`),
  CONSTRAINT `adv_accounts_detail_ibfk_2` FOREIGN KEY (`reason_code`) REFERENCES `adv_costs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_accounts_money_log`
--

DROP TABLE IF EXISTS `adv_accounts_money_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_accounts_money_log` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sum` double NOT NULL,
  `dt` int(11) NOT NULL,
  `reason_code` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - приход, 1 - расход',
  `reason_text` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Текст основания платежа',
  PRIMARY KEY (`id`),
  KEY `user_hash` (`user_hash`),
  KEY `reason_code` (`reason_code`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_advert_field_value_relations`
--

DROP TABLE IF EXISTS `adv_advert_field_value_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_advert_field_value_relations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `seq_id` int(11) DEFAULT NULL COMMENT 'id последовательности зависимостей',
  `id_field` int(11) NOT NULL,
  `id_multiselect` int(11) DEFAULT NULL COMMENT 'Если multiselect, то сюда пишется его ID, если нет, то NULL',
  `is_other` tinyint(4) NOT NULL COMMENT 'выбрано ли для данного филда значение "Другое"',
  `value_metric` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Если НЕ multiselect, а иные значения, то сюда пишется значение, а id_multiselect ставится 0',
  `value_imperial` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Если НЕ multiselect, а иные значения, то сюда пишется значение, а id_multiselect ставится 0',
  PRIMARY KEY (`id`),
  KEY `hash_advert` (`hash_advert`),
  KEY `id_field` (`id_field`),
  KEY `adv_advert_field_value_relations_FK` (`id_multiselect`),
  KEY `adv_dependence_seq_id_fk` (`seq_id`),
  CONSTRAINT `adv_advert_field_value_relations_FK` FOREIGN KEY (`id_multiselect`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_advert_field_value_relations_ibfk_3` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_advert_field_value_relations_ibfk_4` FOREIGN KEY (`id_field`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_dependence_seq_id_fk` FOREIGN KEY (`seq_id`) REFERENCES `adv_fields_dependence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=309031 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Таблица связки объявлений, полей и их значений';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_advertisers`
--

DROP TABLE IF EXISTS `adv_advertisers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_advertisers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `country` smallint(4) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`),
  CONSTRAINT `adv_advertisers_ibfk_1` FOREIGN KEY (`country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Таблица рекламодателей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_advertisers_banners`
--

DROP TABLE IF EXISTS `adv_advertisers_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_advertisers_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_advertiser` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `alt` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `count_views` int(11) NOT NULL DEFAULT 0,
  `count_redirect` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_advertiser` (`id_advertiser`,`id_lang`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_advertisers_banners_ibfk_1` FOREIGN KEY (`id_advertiser`) REFERENCES `adv_advertisers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_advertisers_banners_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts`
--

DROP TABLE IF EXISTS `adv_adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `short_url` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url_branch` varchar(120) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `external_url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_country` smallint(4) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT 0,
  `count_photos` smallint(2) NOT NULL DEFAULT 0,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(51,2) unsigned NOT NULL,
  `id_currency` smallint(3) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `gps` geometry DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb3_unicode_ci DEFAULT '' COMMENT 'Адрес объявления',
  `facebook_repost` tinyint(1) NOT NULL DEFAULT 0,
  `twitter_repost` tinyint(1) NOT NULL DEFAULT 0,
  `ok_repost` tinyint(1) NOT NULL DEFAULT 0,
  `vk_repost` tinyint(1) NOT NULL DEFAULT 0,
  `instagram_repost` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  `date_published` int(11) NOT NULL,
  `date_sold` int(11) NOT NULL,
  `date_blocked` int(11) NOT NULL,
  `date_deleted` int(11) NOT NULL,
  `date_archivation` int(11) NOT NULL,
  `date_allocated` int(11) NOT NULL DEFAULT 0 COMMENT 'Когда нужно снять выделение',
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `is_sold` tinyint(1) NOT NULL DEFAULT 0,
  `sold_mode` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 - ничего, 1 - на Адверто, 2 - где-то еще, 3 - передумал продавать',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `archive_mode` smallint(1) DEFAULT 0 COMMENT 'Как объявление было заархивировано: 1 - роботом, 2 - юзером',
  `is_expiring` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'истекает',
  `is_allocated` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'выделено ли объявление',
  `is_vip` tinyint(1) NOT NULL DEFAULT 0,
  `is_exclusive` tinyint(1) NOT NULL DEFAULT 0,
  `block_mode` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 - не забл., 1 - забл. с возможностью отредакт. и восст., 2 - забл. совсем, 3 - восстановлено после блокирования',
  `block_type` smallint(1) NOT NULL DEFAULT 0 COMMENT 'ID причина блокировки',
  `block_type_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '0 - не заблокировано, 1 - заблокировано роботом, 2 - заблокировано модератором',
  `views` int(5) NOT NULL DEFAULT 0,
  `favorite_counter` int(5) NOT NULL DEFAULT 0,
  `is_new` enum('1','2','','3') COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '3 для доноров, в которых нужно "новый-неновый", но заполнить за юзера нельзя',
  `bargain_possible` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'возможен ли торг',
  `swap_possible` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'возможен ли обмен',
  `secure_deal` tinyint(1) NOT NULL DEFAULT 0,
  `has_video` tinyint(1) NOT NULL DEFAULT 0,
  `has_360_view` tinyint(1) NOT NULL DEFAULT 0,
  `type_of_degradation` enum('absent','low','high') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'absent' COMMENT 'уровень размытия геопозиции объявления',
  `is_fast_sale` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `id_user` (`id_user`),
  KEY `id_lang` (`id_lang`),
  KEY `id_country` (`id_country`),
  KEY `id_currency` (`id_currency`),
  KEY `id_cat` (`id_cat`),
  KEY `price` (`price`),
  KEY `gps` (`gps`(2)),
  KEY `is_published` (`is_published`),
  KEY `is_sold` (`is_sold`),
  KEY `date_created` (`date_created`),
  KEY `date_updated` (`date_updated`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_blocked` (`is_blocked`),
  KEY `is_archived` (`is_archived`),
  CONSTRAINT `adv_adverts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_ibfk_3` FOREIGN KEY (`id_country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_ibfk_4` FOREIGN KEY (`id_currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_ibfk_5` FOREIGN KEY (`id_cat`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1458334 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_comm_type_relations`
--

DROP TABLE IF EXISTS `adv_adverts_comm_type_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_comm_type_relations` (
  `advert_hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_comm_type_id` int(11) NOT NULL,
  PRIMARY KEY (`advert_hash`),
  KEY `adv_adverts_comm_type_relations_FK_1` (`user_comm_type_id`),
  CONSTRAINT `adv_adverts_comm_type_relations_FK` FOREIGN KEY (`advert_hash`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_comm_type_relations_FK_1` FOREIGN KEY (`user_comm_type_id`) REFERENCES `adv_user_communication_type_relations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_complain_reasons`
--

DROP TABLE IF EXISTS `adv_adverts_complain_reasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_complain_reasons` (
  `id` int(3) NOT NULL,
  `title_code` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort` int(2) NOT NULL,
  `id_parent` int(3) DEFAULT NULL,
  `have_child` tinyint(1) NOT NULL DEFAULT 0,
  `category_id_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `block_forever` tinyint(4) DEFAULT 0,
  `only_for_private_user` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `adv_adverts_complain_reasons_adv_adverts_complain_reasons_id_fk` (`id_parent`),
  CONSTRAINT `adv_adverts_complain_reasons_adv_adverts_complain_reasons_id_fk` FOREIGN KEY (`id_parent`) REFERENCES `adv_adverts_complain_reasons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_complains`
--

DROP TABLE IF EXISTS `adv_adverts_complains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_complains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason_id` int(3) NOT NULL,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash_advert` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reason_id` (`reason_id`),
  CONSTRAINT `adv_adverts_complains_ibfk_1` FOREIGN KEY (`reason_id`) REFERENCES `adv_adverts_complain_reasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_events`
--

DROP TABLE IF EXISTS `adv_adverts_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_events` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `advert_hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `moderator_id` int(10) unsigned DEFAULT NULL COMMENT 'ID модератора если событие сделано модератором, иначе null',
  `is_robot` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Если событие сделано роботом - true',
  `event_type` enum('create','edit','m_edit','block','archive','delete') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'create',
  `block_reason_id` int(3) DEFAULT NULL,
  `block_forever` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - блокировка с возможностью восстановления, 1 - без возможности восстановления',
  `moderator_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Модератор может оставить комментарий в момент модерации объявления',
  `created_at` int(11) NOT NULL,
  `kpi_seconds` int(11) DEFAULT NULL COMMENT 'Если необходимо и применимо, пишется количество секунд с момента постановки в очередь до момента записи факта этого события',
  PRIMARY KEY (`id`),
  KEY `adv_adverts_events_ibfk_3` (`block_reason_id`),
  KEY `advert_hash` (`advert_hash`),
  KEY `moderator_id` (`moderator_id`),
  KEY `user_hash` (`user_hash`),
  CONSTRAINT `adv_adverts_events_adv_users_hash_fk` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`),
  CONSTRAINT `adv_adverts_events_ibfk_2` FOREIGN KEY (`moderator_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_events_ibfk_3` FOREIGN KEY (`block_reason_id`) REFERENCES `adv_adverts_complain_reasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7028 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_old_price`
--

DROP TABLE IF EXISTS `adv_adverts_old_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_old_price` (
  `hash_advert` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `old_price` double(52,2) NOT NULL,
  `ts` int(11) NOT NULL,
  UNIQUE KEY `hash_advert` (`hash_advert`) USING BTREE,
  CONSTRAINT `adv_adverts_old_price_ibfk_1` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_paymentoper_history`
--

DROP TABLE IF EXISTS `adv_adverts_paymentoper_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_paymentoper_history` (
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `oper_type` int(5) NOT NULL,
  `dt` int(11) NOT NULL,
  `dt_end` int(11) NOT NULL,
  UNIQUE KEY `hash_advert` (`hash_advert`,`oper_type`),
  CONSTRAINT `adv_adverts_paymentoper_history_ibfk_1` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='таблица операций над объявлениями';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_schedule`
--

DROP TABLE IF EXISTS `adv_adverts_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_schedule` (
  `hash_ad` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type_oper` tinyint(1) NOT NULL COMMENT '1-поднятие, 2-выделение',
  `date_begin` int(11) NOT NULL,
  `date_last` int(11) NOT NULL,
  `last_date_act` int(11) NOT NULL COMMENT 'дата последнего действия (поднятия или выделения)',
  `next_date_act` int(11) NOT NULL COMMENT 'Дата следующего действия',
  `cost_bonus` int(4) NOT NULL COMMENT 'Цена одной операции в бонусах',
  `cost_money` double NOT NULL COMMENT 'стоимость в деньгах',
  `money_currency` smallint(3) NOT NULL,
  `pay_account_priority` tinyint(1) NOT NULL COMMENT 'Приоритет счета, с которого оплачивать: 1-бонусный, 2-денежный',
  PRIMARY KEY (`hash_ad`,`user_hash`,`type_oper`),
  KEY `date_last` (`date_last`),
  KEY `next_date_act` (`next_date_act`),
  KEY `user_hash` (`user_hash`),
  KEY `money_currency` (`money_currency`),
  CONSTRAINT `adv_adverts_schedule_ibfk_2` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_schedule_ibfk_3` FOREIGN KEY (`money_currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_schedule_ibfk_4` FOREIGN KEY (`hash_ad`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_top`
--

DROP TABLE IF EXISTS `adv_adverts_top`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_top` (
  `hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `main_top` tinyint(1) NOT NULL DEFAULT 0,
  `category_top` tinyint(1) NOT NULL DEFAULT 0,
  `main_ts` int(11) NOT NULL DEFAULT 0,
  `category_ts` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_adverts_translate`
--

DROP TABLE IF EXISTS `adv_adverts_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_adverts_translate` (
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_real` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash_advert`,`id_lang`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_adverts_translate_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_adverts_translate_ibfk_3` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Таблица названий fields (не значений multiselect)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_archive_notifications`
--

DROP TABLE IF EXISTS `adv_archive_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_archive_notifications` (
  `hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date_sent` int(11) NOT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_archive_soon_notifications`
--

DROP TABLE IF EXISTS `adv_archive_soon_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_archive_soon_notifications` (
  `hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date_sent` int(11) NOT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_asterisk_trunk`
--

DROP TABLE IF EXISTS `adv_asterisk_trunk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_asterisk_trunk` (
  `phone_number` varchar(20) NOT NULL,
  `trunk` varchar(50) NOT NULL,
  `prefix` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_auth_numbers`
--

DROP TABLE IF EXISTS `adv_auth_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_auth_numbers` (
  `num_phone` varchar(21) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`num_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_balance`
--

DROP TABLE IF EXISTS `adv_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_balance` (
  `user_id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `pending` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category`
--

DROP TABLE IF EXISTS `adv_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(5) NOT NULL,
  `sort` int(2) NOT NULL DEFAULT 0,
  `id_lang` smallint(2) NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Тут глобальное отключение категории',
  `is_product` tinyint(1) NOT NULL DEFAULT 1,
  `have_child` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Есть ли дети у этой категории',
  `id_root` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `allow_video` tinyint(1) NOT NULL DEFAULT 0,
  `title_auto_generated` tinyint(1) NOT NULL DEFAULT 0,
  `screen_type` enum('simple','array','multiPage') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'simple' COMMENT 'тип отображения экрана категории',
  `allow_free` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Товар или услуга по этой категории могут быть бесплатны',
  `description_length_max` smallint(5) unsigned NOT NULL DEFAULT 2000,
  `enabled_360_view` tinyint(1) NOT NULL DEFAULT 0,
  `min_photos` smallint(5) unsigned NOT NULL DEFAULT 0,
  `max_photos` smallint(5) unsigned NOT NULL DEFAULT 20,
  `allow_secure_deal` tinyint(1) NOT NULL DEFAULT 0,
  `max_video_duration` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT 'в секундах. 0 - неограничено',
  `map_display_type` enum('collapsed','half_open') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'collapsed',
  `allow_used` tinyint(1) NOT NULL DEFAULT 1,
  `age_restricted` tinyint(1) NOT NULL DEFAULT 0,
  `moderation_limit` smallint(5) unsigned NOT NULL COMMENT 'ограничение времени на модерацию в секундах',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `slug_id` (`slug_id`) USING BTREE,
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_category_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12744 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category_articles`
--

DROP TABLE IF EXISTS `adv_category_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `country_id` smallint(4) unsigned DEFAULT NULL,
  `lang_id` smallint(2) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category_field_relations`
--

DROP TABLE IF EXISTS `adv_category_field_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category_field_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `sort` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cat_id` (`cat_id`,`field_id`),
  KEY `field_id` (`field_id`),
  CONSTRAINT `adv_category_field_relations_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_category_field_relations_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5139 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category_min_price`
--

DROP TABLE IF EXISTS `adv_category_min_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category_min_price` (
  `category_id` int(11) NOT NULL,
  `country_iso` smallint(4) NOT NULL,
  `min_price` smallint(5) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`category_id`,`country_iso`),
  KEY `adv_category_min_price_FK_1` (`country_iso`),
  CONSTRAINT `adv_category_min_price_FK` FOREIGN KEY (`category_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_category_min_price_FK_1` FOREIGN KEY (`country_iso`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category_photo_tiles`
--

DROP TABLE IF EXISTS `adv_category_photo_tiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category_photo_tiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category_to_photo_tiles_relations`
--

DROP TABLE IF EXISTS `adv_category_to_photo_tiles_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category_to_photo_tiles_relations` (
  `category_id` int(11) NOT NULL,
  `photo_tile_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`photo_tile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_category_translate`
--

DROP TABLE IF EXISTS `adv_category_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_category_translate` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Тут локальное (в рамках языка) отключение категории',
  `meta_title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`),
  FULLTEXT KEY `ft_name` (`name`),
  CONSTRAINT `adv_category_translate_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_category_translate_ibfk_3` FOREIGN KEY (`id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chat_auth_log`
--

DROP TABLE IF EXISTS `adv_chat_auth_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chat_auth_log` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) NOT NULL,
  `datetime` int(11) NOT NULL,
  `platform` varchar(20) NOT NULL DEFAULT '',
  `device_model` varchar(50) NOT NULL DEFAULT '',
  `device_type` enum('android','ios','website') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adv_chat_auth_log_datetime_index` (`datetime`)
) ENGINE=InnoDB AUTO_INCREMENT=39110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chat_files`
--

DROP TABLE IF EXISTS `adv_chat_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chat_files` (
  `hash` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `message_id` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `content_type` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`hash`),
  KEY `adv_chat_files_message_id_fk1` (`message_id`),
  CONSTRAINT `adv_chat_files_message_id_fk1` FOREIGN KEY (`message_id`) REFERENCES `adv_chat_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chat_images`
--

DROP TABLE IF EXISTS `adv_chat_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chat_images` (
  `message_id` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `width` smallint(5) NOT NULL DEFAULT 0,
  `height` smallint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash`),
  KEY `message_id` (`message_id`) USING BTREE,
  CONSTRAINT `adv_chat_images_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `adv_chat_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chat_messages`
--

DROP TABLE IF EXISTS `adv_chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chat_messages` (
  `id` varchar(24) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` int(2) NOT NULL COMMENT '0 - сообщение, 1 - локация, 2 - изображение, 3 - звонок, 4 - подтверждение покупки',
  `date_created` bigint(13) NOT NULL,
  `sender_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `recipient_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `chat_id` varchar(24) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lang_id` smallint(2) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `spam_status` int(1) NOT NULL,
  `is_spam` tinyint(1) NOT NULL,
  `has_text` tinyint(1) NOT NULL,
  `is_deleted_sender` tinyint(1) NOT NULL,
  `is_deleted_recipient` tinyint(1) NOT NULL,
  `is_deleted_full` tinyint(1) NOT NULL,
  `is_delivered` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `recipient_id` (`recipient_id`),
  KEY `chat_id` (`chat_id`),
  KEY `lang_id` (`lang_id`),
  CONSTRAINT `adv_chat_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_chat_messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_chat_messages_ibfk_3` FOREIGN KEY (`chat_id`) REFERENCES `adv_chats` (`chat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_chat_messages_ibfk_4` FOREIGN KEY (`lang_id`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chat_messages_translate`
--

DROP TABLE IF EXISTS `adv_chat_messages_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chat_messages_translate` (
  `message_id` varchar(24) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lang_id` smallint(2) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`message_id`,`lang_id`),
  KEY `lang_id` (`lang_id`),
  CONSTRAINT `adv_chat_messages_translate_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `adv_chat_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_chat_messages_translate_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chat_videos`
--

DROP TABLE IF EXISTS `adv_chat_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chat_videos` (
  `hash` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `message_id` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`hash`),
  KEY `adv_chat_videos_message_id_fk1` (`message_id`),
  CONSTRAINT `adv_chat_videos_message_id_fk1` FOREIGN KEY (`message_id`) REFERENCES `adv_chat_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_chats`
--

DROP TABLE IF EXISTS `adv_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_chats` (
  `chat_id` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `owner_id` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `recipient_id` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `product_id` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_last_active` bigint(13) NOT NULL,
  `date_created` bigint(13) NOT NULL,
  `is_deleted_owner` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted_recipient` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`chat_id`),
  UNIQUE KEY `owner_id_2` (`owner_id`,`recipient_id`,`product_id`),
  KEY `owner_id` (`owner_id`,`recipient_id`),
  KEY `recipient_id` (`recipient_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `adv_chats_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_chats_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_chats_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_costs`
--

DROP TABLE IF EXISTS `adv_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_costs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_service` int(5) NOT NULL,
  `cost_money` double NOT NULL DEFAULT 0,
  `cost_bonus` int(11) NOT NULL,
  `id_country` smallint(4) NOT NULL,
  `period` tinyint(2) NOT NULL DEFAULT 0,
  `comment` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Коммент',
  PRIMARY KEY (`id`),
  KEY `id_service` (`id_service`),
  KEY `id_country` (`id_country`),
  CONSTRAINT `adv_costs_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `adv_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_costs_ibfk_2` FOREIGN KEY (`id_country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3581 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_countries`
--

DROP TABLE IF EXISTS `adv_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_countries` (
  `iso` smallint(4) NOT NULL,
  `name_ru_short` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name_ru_full` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `alpha2` char(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `alpha3` char(3) COLLATE utf8mb3_unicode_ci NOT NULL,
  `part_of_planet` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL,
  `area` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL,
  `prefix` smallint(4) NOT NULL,
  `id_lang` smallint(3) NOT NULL DEFAULT 2,
  `id_currency` smallint(3) NOT NULL DEFAULT 2,
  `additional_currency` smallint(3) DEFAULT NULL COMMENT 'Дополнительная валюта, используемая в данной стране',
  `id_location` int(11) DEFAULT NULL COMMENT 'Ссылка на adv_locations',
  `phone_length` int(2) DEFAULT NULL COMMENT 'количество цифр в телефонном номере, не считая длину префикса',
  `phone_mask` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `restriction_age` smallint(5) unsigned NOT NULL DEFAULT 18 COMMENT 'Возраст взрослости',
  `system_of_unit` enum('metric','imperial') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iso`),
  UNIQUE KEY `alpha2` (`alpha2`),
  KEY `prefix_3` (`prefix`),
  KEY `id_lang` (`id_lang`),
  KEY `id_currency` (`id_currency`),
  KEY `additional_currency` (`additional_currency`),
  KEY `id_location` (`id_location`),
  CONSTRAINT `adv_countries_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_countries_ibfk_2` FOREIGN KEY (`id_currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_countries_ibfk_3` FOREIGN KEY (`additional_currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_countries_ibfk_4` FOREIGN KEY (`id_location`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_countries_locations`
--

DROP TABLE IF EXISTS `adv_countries_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_countries_locations` (
  `id_country` smallint(4) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `word` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id_country`,`id_lang`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_countries_locations_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_countries_locations_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_country_to_field_relation`
--

DROP TABLE IF EXISTS `adv_country_to_field_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_country_to_field_relation` (
  `cat_id` int(11) DEFAULT NULL,
  `country_iso` smallint(4) NOT NULL,
  `field_id` int(11) NOT NULL,
  UNIQUE KEY `adv_country_to_field_relation_UN` (`cat_id`,`country_iso`,`field_id`),
  KEY `adv_country_to_field_relation_FK_1` (`country_iso`),
  KEY `adv_country_to_field_relation_FK_2` (`field_id`),
  CONSTRAINT `adv_country_to_field_relation_FK` FOREIGN KEY (`cat_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_country_to_field_relation_FK_1` FOREIGN KEY (`country_iso`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_country_to_field_relation_FK_2` FOREIGN KEY (`field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Указываются филды, которые не должны отображаться в данной категории для данной страны';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_cover_links`
--

DROP TABLE IF EXISTS `adv_cover_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_cover_links` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `hash_link` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `firebase_link` varchar(600) COLLATE utf8mb3_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `count_view` int(3) NOT NULL,
  `time_view` int(11) DEFAULT NULL,
  `date_off` int(11) DEFAULT NULL COMMENT 'Когда блокировать ссылку',
  `type_of_link` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`hash_link`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_cover_links_log`
--

DROP TABLE IF EXISTS `adv_cover_links_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_cover_links_log` (
  `hash_link` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `dt` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `refer_url` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `client_info` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  KEY `hash_link` (`hash_link`),
  KEY `ip` (`ip`),
  KEY `dt` (`dt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_currencies`
--

DROP TABLE IF EXISTS `adv_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_currencies` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `code` char(3) COLLATE utf8mb3_unicode_ci NOT NULL,
  `symbol` char(3) COLLATE utf8mb3_unicode_ci NOT NULL,
  `symbol_html` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `symbol_place` int(1) DEFAULT 2 COMMENT 'Место, где должен стоять знак валюты (1 - до цены, 2 - после цены)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_3` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_currency_quotes`
--

DROP TABLE IF EXISTS `adv_currency_quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_currency_quotes` (
  `id_currency` smallint(3) NOT NULL,
  `quote` double NOT NULL,
  PRIMARY KEY (`id_currency`) USING BTREE,
  CONSTRAINT `adv_currency_quotes_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_deleted_accounts`
--

DROP TABLE IF EXISTS `adv_deleted_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_deleted_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(6) COLLATE utf8mb3_unicode_ci NOT NULL,
  `promo` varchar(6) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `lang` smallint(2) NOT NULL,
  `country` smallint(4) NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email_pass` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_facebook` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_gplus` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_twitter` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('1','2','3') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `reg_date` int(11) NOT NULL,
  `rating_mark` float NOT NULL DEFAULT 0,
  `rating_mark_cnt` smallint(5) NOT NULL DEFAULT 0,
  `online_lasttime` int(11) NOT NULL DEFAULT 0,
  `app_id` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deny_call` tinyint(1) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `can_make_adverts` tinyint(1) NOT NULL DEFAULT 1,
  `can_write_messages` tinyint(1) NOT NULL DEFAULT 1,
  `is_shop` tinyint(1) NOT NULL DEFAULT 0,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `blacklist_status` smallint(1) NOT NULL DEFAULT 0,
  `timestamp` int(11) NOT NULL DEFAULT 0,
  `ts_delete` int(11) NOT NULL DEFAULT 0,
  `reason` text COLLATE utf8mb3_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `promo` (`promo`),
  UNIQUE KEY `hash` (`hash`),
  UNIQUE KEY `url` (`url`),
  KEY `country` (`country`),
  KEY `lang` (`lang`),
  KEY `online_lasttime` (`online_lasttime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_dimension`
--

DROP TABLE IF EXISTS `adv_dimension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_dimension` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'служебное поле',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_dimension_unit`
--

DROP TABLE IF EXISTS `adv_dimension_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_dimension_unit` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `dimension_id` smallint(5) unsigned NOT NULL,
  `description` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `system_of_unit` enum('metric','imperial') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `code_extra` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adv_dimension_unit_fk_1` (`dimension_id`),
  CONSTRAINT `adv_dimension_unit_fk_1` FOREIGN KEY (`dimension_id`) REFERENCES `adv_dimension` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_dimension_units_mapping_multipliers`
--

DROP TABLE IF EXISTS `adv_dimension_units_mapping_multipliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_dimension_units_mapping_multipliers` (
  `source_unit_id` smallint(5) unsigned NOT NULL,
  `dest_unit_id` smallint(5) unsigned NOT NULL,
  `multiplier` float(20,7) NOT NULL,
  UNIQUE KEY `adv_dimension_units_mapping_multipliers_UN` (`source_unit_id`,`dest_unit_id`),
  KEY `adv_dimension_units_mapping_multipliers_FK_1` (`dest_unit_id`),
  CONSTRAINT `adv_dimension_units_mapping_multipliers_FK` FOREIGN KEY (`source_unit_id`) REFERENCES `adv_dimension_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_dimension_units_mapping_multipliers_FK_1` FOREIGN KEY (`dest_unit_id`) REFERENCES `adv_dimension_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_donors_phones_stop`
--

DROP TABLE IF EXISTS `adv_donors_phones_stop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_donors_phones_stop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'номер телефона в международном формате',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Таблица для номеров телефонов, которым не рассылать';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_drafts`
--

DROP TABLE IF EXISTS `adv_drafts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_drafts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_created` int(11) NOT NULL,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `temp_user_id` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `raw_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`hash`),
  UNIQUE KEY `adv_drafts_id_UN` (`id`),
  UNIQUE KEY `adv_drafts_temp_user_id_UN` (`temp_user_id`),
  KEY `adv_drafts_temp_user_id_IDX` (`temp_user_id`) USING BTREE,
  KEY `adv_drafts_user_hash_IDX` (`user_hash`) USING BTREE,
  CONSTRAINT `adv_drafts_FK` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='таблица для черновиков объявлений';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_favorite`
--

DROP TABLE IF EXISTS `adv_favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_favorite` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ts` int(11) NOT NULL DEFAULT 0,
  KEY `hash_user` (`hash_user`),
  KEY `hash_advert` (`hash_advert`),
  CONSTRAINT `adv_favorite_ibfk_1` FOREIGN KEY (`hash_user`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_favorite_ibfk_2` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_favorite_archive_soon_notifications`
--

DROP TABLE IF EXISTS `adv_favorite_archive_soon_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_favorite_archive_soon_notifications` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date_sent` int(11) NOT NULL,
  KEY `hash_user` (`hash_user`),
  KEY `hash_advert` (`hash_advert`),
  CONSTRAINT `adv_favorite_archive_soon_notifications_ibfk_1` FOREIGN KEY (`hash_user`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_favorite_archive_soon_notifications_ibfk_2` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields`
--

DROP TABLE IF EXISTS `adv_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_type` enum('select','multiselect','iconselect','string','int','checkbox','array') COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug_id` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `is_filterable` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Нужно ли выводить строку, чтобы облегчить поиск по категории',
  `required_filling` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Фильтр обязателен для заполнения при добавлении объявления',
  `maxlength` int(3) DEFAULT NULL COMMENT 'Максимальный размер текстового поля',
  `min_value` int(11) DEFAULT NULL COMMENT 'Минимальное значение num_string',
  `max_value` int(11) DEFAULT NULL COMMENT 'Максимальное значение num_string',
  `icon` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `item_type` enum('simple','title') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'simple',
  `metric_unit_id` smallint(5) unsigned DEFAULT NULL,
  `imperial_unit_id` smallint(5) unsigned DEFAULT NULL,
  `field_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_id` (`slug_id`),
  KEY `adv_dimension_unit_metric_FK` (`metric_unit_id`),
  KEY `adv_dimension_unit_imperial_FK` (`imperial_unit_id`),
  CONSTRAINT `adv_dimension_unit_imperial_FK` FOREIGN KEY (`imperial_unit_id`) REFERENCES `adv_dimension_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_dimension_unit_metric_FK` FOREIGN KEY (`metric_unit_id`) REFERENCES `adv_dimension_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_properties` CHECK (json_valid(`field_properties`))
) ENGINE=InnoDB AUTO_INCREMENT=2075 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_array_type_items`
--

DROP TABLE IF EXISTS `adv_fields_array_type_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_array_type_items` (
  `array_type_field_id` int(11) NOT NULL,
  `array_item_field` int(11) NOT NULL,
  `sort` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`array_type_field_id`,`array_item_field`),
  KEY `adv_fields_array_type_items_FK_1` (`array_item_field`),
  CONSTRAINT `adv_fields_array_type_items_FK` FOREIGN KEY (`array_type_field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_array_type_items_FK_1` FOREIGN KEY (`array_item_field`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Только для fileds с типом array_type';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_dependence`
--

DROP TABLE IF EXISTS `adv_fields_dependence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_dependence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `dep_field_id_1` int(11) NOT NULL,
  `dep_field_id_2` int(11) DEFAULT NULL,
  `dep_field_id_3` int(11) DEFAULT NULL,
  `dep_field_id_4` int(11) DEFAULT NULL,
  `dep_field_id_5` int(11) DEFAULT NULL,
  `dep_field_id_6` int(11) DEFAULT NULL,
  `dep_field_id_7` int(11) DEFAULT NULL,
  `dep_field_id_8` int(11) DEFAULT NULL,
  `dep_field_id_9` int(11) DEFAULT NULL,
  `dep_field_id_10` int(11) DEFAULT NULL,
  `dep_field_id_11` int(11) DEFAULT NULL,
  `dep_field_id_12` int(11) DEFAULT NULL,
  `dep_field_id_13` int(11) DEFAULT NULL,
  `dep_field_id_14` int(11) DEFAULT NULL,
  `dep_field_id_15` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adv_fields_dependence_FK` (`cat_id`),
  KEY `adv_fields_dependence_FK_main` (`field_id`),
  KEY `adv_fields_dependence_FK_1` (`dep_field_id_1`),
  KEY `adv_fields_dependence_FK_2` (`dep_field_id_2`),
  KEY `adv_fields_dependence_FK_3` (`dep_field_id_3`),
  KEY `adv_fields_dependence_FK_4` (`dep_field_id_4`),
  KEY `adv_fields_dependence_FK_5` (`dep_field_id_5`),
  KEY `adv_fields_dependence_FK_6` (`dep_field_id_6`),
  KEY `adv_fields_dependence_FK_7` (`dep_field_id_7`),
  KEY `adv_fields_dependence_FK_8` (`dep_field_id_8`),
  KEY `adv_fields_dependence_FK_9` (`dep_field_id_9`),
  KEY `adv_fields_dependence_FK_10` (`dep_field_id_10`),
  KEY `adv_fields_dependence_FK_11` (`dep_field_id_11`),
  KEY `adv_fields_dependence_FK_12` (`dep_field_id_12`),
  KEY `adv_fields_dependence_FK_13` (`dep_field_id_13`),
  KEY `adv_fields_dependence_FK_14` (`dep_field_id_14`),
  KEY `adv_fields_dependence_FK_15` (`dep_field_id_15`),
  CONSTRAINT `adv_fields_dependence_FK` FOREIGN KEY (`cat_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_1` FOREIGN KEY (`dep_field_id_1`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_10` FOREIGN KEY (`dep_field_id_10`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_11` FOREIGN KEY (`dep_field_id_11`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_12` FOREIGN KEY (`dep_field_id_12`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_13` FOREIGN KEY (`dep_field_id_13`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_14` FOREIGN KEY (`dep_field_id_14`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_15` FOREIGN KEY (`dep_field_id_15`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_2` FOREIGN KEY (`dep_field_id_2`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_3` FOREIGN KEY (`dep_field_id_3`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_4` FOREIGN KEY (`dep_field_id_4`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_5` FOREIGN KEY (`dep_field_id_5`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_6` FOREIGN KEY (`dep_field_id_6`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_7` FOREIGN KEY (`dep_field_id_7`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_8` FOREIGN KEY (`dep_field_id_8`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_9` FOREIGN KEY (`dep_field_id_9`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_dependence_FK_main` FOREIGN KEY (`field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Цепочки созависимых филдов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_extra`
--

DROP TABLE IF EXISTS `adv_fields_extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_extra` (
  `category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `sort` int(3) NOT NULL DEFAULT 0,
  `display_type` enum('icon','text') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'text',
  UNIQUE KEY `category_id` (`category_id`,`field_id`),
  KEY `adv_category_products_fields_adv_fields_id_fk` (`field_id`),
  CONSTRAINT `adv_category_products_fields_adv_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `adv_category_products_fields_adv_fields_id_fk` FOREIGN KEY (`field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='fields displayed in ads for the products (search) query if they belong to the specified categories';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_field_view_page`
--

DROP TABLE IF EXISTS `adv_fields_field_view_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_field_view_page` (
  `field_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `page` smallint(6) NOT NULL DEFAULT 0,
  `sort` int(3) NOT NULL DEFAULT 0,
  UNIQUE KEY `adv_fields_field_view_page_UN` (`field_id`,`cat_id`,`page`),
  KEY `adv_fields_field_view_page_FK_1` (`cat_id`),
  CONSTRAINT `adv_fields_field_view_page_FK` FOREIGN KEY (`field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_field_view_page_FK_1` FOREIGN KEY (`cat_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='номер страницы, на которой отобразить поле, для вида экрана multi_page';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_multiselect_depended_fields`
--

DROP TABLE IF EXISTS `adv_fields_multiselect_depended_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_multiselect_depended_fields` (
  `multiselect_id` int(11) NOT NULL COMMENT 'элемент, от которого зависят',
  `dep_multiselect_id` int(11) NOT NULL COMMENT 'зависимый элемент',
  `sort` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`multiselect_id`,`dep_multiselect_id`),
  KEY `adv_fields_multiselect_depended_fields_FK_1` (`dep_multiselect_id`),
  CONSTRAINT `adv_fields_multiselect_depended_fields_FK` FOREIGN KEY (`multiselect_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselect_depended_fields_FK_1` FOREIGN KEY (`dep_multiselect_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Созависимые поля. При выборе элемента мультиселекта, ограничиваются только определенными значениями мультиселектов, в соответствующих им филдах.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_multiselect_list`
--

DROP TABLE IF EXISTS `adv_fields_multiselect_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_multiselect_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_field` int(11) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `icon` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_other` tinyint(1) NOT NULL DEFAULT 0,
  `item_type` enum('simple','title','tab') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'simple',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adv_fields_multiselect_list_UN` (`id`,`id_field`),
  KEY `id_field` (`id_field`),
  CONSTRAINT `adv_fields_multiselect_list_ibfk_1` FOREIGN KEY (`id_field`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124218 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_multiselect_name`
--

DROP TABLE IF EXISTS `adv_fields_multiselect_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_multiselect_name` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_multiselect` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `value` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort` int(3) NOT NULL,
  `extra_value` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_real` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_adv_fields_multiselect_name` (`id_multiselect`,`id_lang`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_fields_multiselect_name_ibfk_1` FOREIGN KEY (`id_multiselect`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselect_name_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8609181 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Таблица названий fields (не значений multiselect)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_multiselect_popular`
--

DROP TABLE IF EXISTS `adv_fields_multiselect_popular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_multiselect_popular` (
  `id_multiselect` int(11) NOT NULL,
  `id_country` smallint(4) NOT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  UNIQUE KEY `id_multiselect` (`id_multiselect`,`id_country`),
  KEY `id_country` (`id_country`),
  CONSTRAINT `adv_fields_multiselect_popular_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselect_popular_ibfk_2` FOREIGN KEY (`id_multiselect`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_multiselects_dependence`
--

DROP TABLE IF EXISTS `adv_fields_multiselects_dependence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_multiselects_dependence` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fields_dependence_id` int(11) NOT NULL,
  `multiselect_id` int(11) NOT NULL COMMENT 'элемент, от которого начинается цепочка зависимостей',
  `dep_multiselect_id_1` int(11) NOT NULL COMMENT 'зависимый элемент 1',
  `dep_multiselect_id_2` int(11) DEFAULT NULL COMMENT 'зависимый элемент 2',
  `dep_multiselect_id_3` int(11) DEFAULT NULL COMMENT 'зависимый элемент 3',
  `dep_multiselect_id_4` int(11) DEFAULT NULL COMMENT 'зависимый элемент 4',
  `dep_multiselect_id_5` int(11) DEFAULT NULL COMMENT 'зависимый элемент 5',
  `dep_multiselect_id_6` int(11) DEFAULT NULL COMMENT 'зависимый элемент 6',
  `dep_multiselect_id_7` int(11) DEFAULT NULL COMMENT 'зависимый элемент 7',
  `dep_multiselect_id_8` int(11) DEFAULT NULL COMMENT 'зависимый элемент 8',
  `dep_multiselect_id_9` int(11) DEFAULT NULL COMMENT 'зависимый элемент 9',
  `dep_multiselect_id_10` int(11) DEFAULT NULL COMMENT 'зависимый элемент 10',
  `dep_multiselect_id_11` int(11) DEFAULT NULL COMMENT 'зависимый элемент 11',
  `dep_multiselect_id_12` int(11) DEFAULT NULL COMMENT 'зависимый элемент 12',
  `dep_multiselect_id_13` int(11) DEFAULT NULL COMMENT 'зависимый элемент 13',
  `dep_multiselect_id_14` int(11) DEFAULT NULL COMMENT 'зависимый элемент 14',
  `dep_multiselect_id_15` int(11) DEFAULT NULL COMMENT 'зависимый элемент 15',
  `union_columns` varchar(255) GENERATED ALWAYS AS (concat_ws('.',`fields_dependence_id`,`multiselect_id`,`dep_multiselect_id_1`,ifnull(`dep_multiselect_id_2`,''),ifnull(`dep_multiselect_id_3`,''),ifnull(`dep_multiselect_id_4`,''),ifnull(`dep_multiselect_id_5`,''),ifnull(`dep_multiselect_id_6`,''),ifnull(`dep_multiselect_id_7`,''),ifnull(`dep_multiselect_id_8`,''),ifnull(`dep_multiselect_id_9`,''),ifnull(`dep_multiselect_id_10`,''),ifnull(`dep_multiselect_id_11`,''),ifnull(`dep_multiselect_id_12`,''),ifnull(`dep_multiselect_id_13`,''),ifnull(`dep_multiselect_id_14`,''),ifnull(`dep_multiselect_id_15`,''))) VIRTUAL COMMENT 'Column for checking duplicates in table',
  PRIMARY KEY (`id`),
  UNIQUE KEY `union_columns` (`union_columns`),
  KEY `adv_fields_multiselects_dependence_FK_m` (`multiselect_id`),
  KEY `adv_fields_multiselects_dependence_FK_1` (`dep_multiselect_id_1`),
  KEY `adv_fields_multiselects_dependence_FK_2` (`dep_multiselect_id_2`),
  KEY `adv_fields_multiselects_dependence_FK_3` (`dep_multiselect_id_3`),
  KEY `adv_fields_multiselects_dependence_FK_4` (`dep_multiselect_id_4`),
  KEY `adv_fields_multiselects_dependence_FK_5` (`dep_multiselect_id_5`),
  KEY `adv_fields_multiselects_dependence_FK_6` (`dep_multiselect_id_6`),
  KEY `adv_fields_multiselects_dependence_FK_7` (`dep_multiselect_id_7`),
  KEY `adv_fields_multiselects_dependence_FK_8` (`dep_multiselect_id_8`),
  KEY `adv_fields_multiselects_dependence_FK_9` (`dep_multiselect_id_9`),
  KEY `adv_fields_multiselects_dependence_FK_10` (`dep_multiselect_id_10`),
  KEY `adv_fields_multiselects_dependence_FK_11` (`dep_multiselect_id_11`),
  KEY `adv_fields_multiselects_dependence_FK_12` (`dep_multiselect_id_12`),
  KEY `adv_fields_multiselects_dependence_FK_13` (`dep_multiselect_id_13`),
  KEY `adv_fields_multiselects_dependence_FK_14` (`dep_multiselect_id_14`),
  KEY `adv_fields_multiselects_dependence_FK_15` (`dep_multiselect_id_15`),
  KEY `adv_fields_multiselects_dependence_FK` (`fields_dependence_id`),
  CONSTRAINT `adv_fields_multiselects_dependence_FK` FOREIGN KEY (`fields_dependence_id`) REFERENCES `adv_fields_dependence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_1` FOREIGN KEY (`dep_multiselect_id_1`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_10` FOREIGN KEY (`dep_multiselect_id_10`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_11` FOREIGN KEY (`dep_multiselect_id_11`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_12` FOREIGN KEY (`dep_multiselect_id_12`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_13` FOREIGN KEY (`dep_multiselect_id_13`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_14` FOREIGN KEY (`dep_multiselect_id_14`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_15` FOREIGN KEY (`dep_multiselect_id_15`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_2` FOREIGN KEY (`dep_multiselect_id_2`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_3` FOREIGN KEY (`dep_multiselect_id_3`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_4` FOREIGN KEY (`dep_multiselect_id_4`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_5` FOREIGN KEY (`dep_multiselect_id_5`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_6` FOREIGN KEY (`dep_multiselect_id_6`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_7` FOREIGN KEY (`dep_multiselect_id_7`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_8` FOREIGN KEY (`dep_multiselect_id_8`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_9` FOREIGN KEY (`dep_multiselect_id_9`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_multiselects_dependence_FK_m` FOREIGN KEY (`multiselect_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=164881 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Значения мультиселектов созависимых филдов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_name`
--

DROP TABLE IF EXISTS `adv_fields_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_name` (
  `id_field` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `descr` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title_descr` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'заголовок всплывающего описания поля. если descr != "", то отображается на фронте как ссылка, иначе просто текст',
  `error_descr` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'описание ошибки для поля',
  `is_real` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_field`,`id_lang`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_fields_name_ibfk_1` FOREIGN KEY (`id_field`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_name_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Таблица названий fields (не значений multiselect)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_range`
--

DROP TABLE IF EXISTS `adv_fields_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_range` (
  `id_field` int(11) NOT NULL,
  `num_from` int(11) NOT NULL COMMENT 'Left limit',
  `num_to` int(11) NOT NULL COMMENT 'Right limit',
  `num_from_default` int(11) NOT NULL,
  `num_to_default` int(11) NOT NULL,
  `step` float NOT NULL COMMENT 'Step of pointer',
  `round` int(1) DEFAULT NULL COMMENT 'How many numbers allowed after comma',
  `format` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'How to format numbers',
  `heterogeneity` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '[percentage of point on slider]/[value in that point]',
  `dimension` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'Show this after number',
  `limits` tinyint(1) NOT NULL COMMENT 'Show or not limits',
  `scale` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Labels under slider, ''|'' — show just line',
  `skin` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'If you define new skin, just write here it name, in sources defined blue skin for example',
  `calculate` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Function to calculate final numbers, for example time.',
  `onstatechange` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Function fires while slider change state.',
  `callback` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Function fires on "mouseup" event.',
  UNIQUE KEY `id_field` (`id_field`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='egorkhmelev.github.io/jslider/';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_title_to_field_relation`
--

DROP TABLE IF EXISTS `adv_fields_title_to_field_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_title_to_field_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `title_field_id` int(11) NOT NULL COMMENT 'title item',
  `related_field_id` int(11) NOT NULL COMMENT 'item under title',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adv_fields_title_to_field_relation_UN` (`title_field_id`,`related_field_id`,`cat_id`),
  KEY `adv_fields_title_items_relation_category_FK` (`cat_id`),
  KEY `adv_fields_title_to_field_relation_FK_1` (`related_field_id`),
  CONSTRAINT `adv_fields_title_items_relation_category_FK` FOREIGN KEY (`cat_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_title_to_field_relation_FK` FOREIGN KEY (`title_field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_title_to_field_relation_FK_1` FOREIGN KEY (`related_field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_title_to_multiselect_item_relation`
--

DROP TABLE IF EXISTS `adv_fields_title_to_multiselect_item_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_title_to_multiselect_item_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `title_multiselect_item_id` int(11) NOT NULL COMMENT 'title item',
  `related_multiselect_item_id` int(11) NOT NULL COMMENT 'item under title',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adv_fields_title_to_multiselect_item_relation_UN` (`title_multiselect_item_id`,`related_multiselect_item_id`,`cat_id`),
  KEY `adv_fields_title_items_relation_FK` (`cat_id`),
  KEY `adv_fields_title_to_multiselect_item_relation_FK_1` (`related_multiselect_item_id`),
  CONSTRAINT `adv_fields_title_items_relation_FK` FOREIGN KEY (`cat_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_title_to_multiselect_item_relation_FK` FOREIGN KEY (`title_multiselect_item_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_fields_title_to_multiselect_item_relation_FK_1` FOREIGN KEY (`related_multiselect_item_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=926 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_fields_users_offers`
--

DROP TABLE IF EXISTS `adv_fields_users_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_fields_users_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_field` int(11) NOT NULL,
  `user_hash` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `lang` int(2) NOT NULL,
  `field_text` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt` int(11) NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2021 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_filter_notifications`
--

DROP TABLE IF EXISTS `adv_filter_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_filter_notifications` (
  `filter_id` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date_sent` int(11) NOT NULL,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_filter_subscriptions`
--

DROP TABLE IF EXISTS `adv_filter_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_filter_subscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_subscription` tinyint(1) NOT NULL DEFAULT 0,
  `notification_time` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `from` double(51,2) NOT NULL,
  `to` double(51,2) NOT NULL,
  `distance_min` smallint(2) NOT NULL,
  `distance_max` smallint(2) NOT NULL,
  `gps` geometry NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `with_photo` tinyint(1) NOT NULL,
  `show_only_favorite` tinyint(1) NOT NULL,
  `sort_field` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_direction` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  `notification_part_of_day` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3' COMMENT '1 - утром, 2 - днём, 3 - вечером',
  `push_notification_enabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Уведомлять через пуши',
  `email_notification_enabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Уведомлять через по электронной почте',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1577 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_filter_subscriptions_favorites`
--

DROP TABLE IF EXISTS `adv_filter_subscriptions_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_filter_subscriptions_favorites` (
  `sub_id` int(11) unsigned NOT NULL,
  `hash` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_filter_subscriptions_fields`
--

DROP TABLE IF EXISTS `adv_filter_subscriptions_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_filter_subscriptions_fields` (
  `sub_id` int(11) unsigned NOT NULL,
  `id_field` int(4) NOT NULL,
  `id_multiselect` int(11) NOT NULL,
  `value` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_firebase_links`
--

DROP TABLE IF EXISTS `adv_firebase_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_firebase_links` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash_link` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `firebase_link` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `count_view` int(3) NOT NULL,
  `time_view` int(11) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `date_off` int(11) DEFAULT NULL COMMENT 'Когда блокировать ссылку',
  PRIMARY KEY (`hash_user`),
  UNIQUE KEY `hash_link` (`hash_link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_images_adverts`
--

DROP TABLE IF EXISTS `adv_images_adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_images_adverts` (
  `id_adv` int(11) NOT NULL,
  `hash` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort` smallint(3) NOT NULL DEFAULT 0,
  `width` smallint(5) NOT NULL DEFAULT 0,
  `height` smallint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash`),
  KEY `id_adv` (`id_adv`),
  CONSTRAINT `adv_images_adverts_ibfk_1` FOREIGN KEY (`id_adv`) REFERENCES `adv_adverts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_images_companies`
--

DROP TABLE IF EXISTS `adv_images_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_images_companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `hash` varchar(24) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT 0,
  `width` smallint(6) NOT NULL DEFAULT 0,
  `height` smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `adv_images_companies_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `adv_user_company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_images_users`
--

DROP TABLE IF EXISTS `adv_images_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_images_users` (
  `id_user` int(11) NOT NULL,
  `hash` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort` smallint(3) NOT NULL DEFAULT 0,
  `width` smallint(5) NOT NULL DEFAULT 0,
  `height` smallint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `adv_images_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_infopush`
--

DROP TABLE IF EXISTS `adv_infopush`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_infopush` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(400) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'описание что за пуш',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_infopush_sent_users`
--

DROP TABLE IF EXISTS `adv_infopush_sent_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_infopush_sent_users` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `push_id` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  UNIQUE KEY `index1` (`hash_user`,`ts`),
  KEY `push_id` (`push_id`),
  KEY `ts1` (`ts`),
  CONSTRAINT `adv_infopush_sent_users_ibfk_1` FOREIGN KEY (`push_id`) REFERENCES `adv_infopush` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_infopush_settings`
--

DROP TABLE IF EXISTS `adv_infopush_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_infopush_settings` (
  `push_id` int(11) NOT NULL,
  `countries_restrict` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Список ID стран через ; куда нужно отправлять этот пуш. NULL - везде можно',
  `sex_restrict` enum('1','2','3','9') COLLATE utf8mb3_unicode_ci NOT NULL COMMENT '9 - не задан',
  `cron_restrict` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'В какие даты отправлять (минута, час, число, месяц, день недели), синтаксис как в cron',
  `cron_prohibited` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'В какие даты ЗАПРЕЩЕНО отправлять (минута, час, число, месяц, день недели), синтаксис как в cron',
  `for_empty_mail` tinyint(1) NOT NULL COMMENT 'Для пользователей, у кого не заполнена или не подтверждена почта',
  `for_empty_avatar` tinyint(1) NOT NULL COMMENT 'У кого пустой аватар',
  `offline_x_hours` int(5) NOT NULL COMMENT '0 - не важно когда входил, >0 - количество часов, сколько юзер не входил в систему',
  `any_moment_push` tinyint(1) NOT NULL COMMENT 'уведомление может быть отправлено в любой момент',
  `min_days_after_reg` int(3) NOT NULL COMMENT 'Количество ДНЕЙ после регистрации, раньше которых нельзя отправлять этот пуш',
  `min_ads_for_push` int(6) NOT NULL DEFAULT 0 COMMENT 'Юзер имеет не менее Х объявлений',
  `max_ads_for_push` int(6) NOT NULL DEFAULT 999999 COMMENT 'Юзер имеет не более Х объявлений',
  `dont_get_bonuses` int(1) NOT NULL COMMENT 'Которые Х дней не получали бонусы',
  `account_type` int(1) NOT NULL COMMENT '0 - всем, 1 - физ лицо, 2 - магазин',
  `account_status` int(2) NOT NULL COMMENT 'Статус аккаунта (согласно партнёрской сети)',
  `min_bonus_on_account` int(5) NOT NULL DEFAULT 0 COMMENT 'минимальное количество бонусов на аккаунте, чтобы получить пуш',
  `max_bonus_on_account` int(6) NOT NULL DEFAULT 999999 COMMENT 'максимальное количество бонусов на аккаунте, чтобы НЕ получать пуш',
  `several_times_push` tinyint(1) NOT NULL COMMENT 'Этот пуш можно отправлять много раз (не чаще, чем раз в сутки)',
  UNIQUE KEY `push_id` (`push_id`) USING BTREE,
  CONSTRAINT `adv_infopush_settings_ibfk_1` FOREIGN KEY (`push_id`) REFERENCES `adv_infopush` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_infopush_translate`
--

DROP TABLE IF EXISTS `adv_infopush_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_infopush_translate` (
  `push_id` int(11) NOT NULL,
  `lang` smallint(2) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `push_id` (`push_id`,`lang`),
  KEY `lang` (`lang`),
  CONSTRAINT `adv_infopush_translate_ibfk_1` FOREIGN KEY (`push_id`) REFERENCES `adv_infopush` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_infopush_translate_ibfk_2` FOREIGN KEY (`lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_langs`
--

DROP TABLE IF EXISTS `adv_langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_langs` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `code` char(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `translate_ready` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_3` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_langs_translate`
--

DROP TABLE IF EXISTS `adv_langs_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_langs_translate` (
  `id_lang` smallint(2) NOT NULL COMMENT 'Какой именно язык переводится',
  `id_lang_translate` smallint(2) NOT NULL COMMENT 'На какой язык переводится',
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Перевод',
  `sort` smallint(3) NOT NULL DEFAULT 0,
  UNIQUE KEY `id_lang` (`id_lang`,`id_lang_translate`),
  KEY `id_lang_translate` (`id_lang_translate`),
  CONSTRAINT `adv_langs_translate_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_langs_translate_ibfk_2` FOREIGN KEY (`id_lang_translate`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_legal_information_relations`
--

DROP TABLE IF EXISTS `adv_legal_information_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_legal_information_relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `legal_property_id` int(10) unsigned NOT NULL,
  `legal_content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `legal_property_id` (`legal_property_id`),
  CONSTRAINT `adv_legal_information_relations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `adv_user_company` (`id`) ON DELETE CASCADE,
  CONSTRAINT `adv_legal_information_relations_ibfk_2` FOREIGN KEY (`legal_property_id`) REFERENCES `adv_legal_information_templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_legal_information_templates`
--

DROP TABLE IF EXISTS `adv_legal_information_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_legal_information_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_property` varchar(255) NOT NULL,
  `country_id` smallint(6) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_legal_organisation_types`
--

DROP TABLE IF EXISTS `adv_legal_organisation_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_legal_organisation_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(24) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `country_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_location_translations`
--

DROP TABLE IF EXISTS `adv_location_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_location_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `field` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entry` (`locale`,`object_id`,`field`),
  KEY `IDX_B7108AE9232D562B` (`object_id`),
  CONSTRAINT `FK_B7108AE9232D562B` FOREIGN KEY (`object_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74334 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_locations`
--

DROP TABLE IF EXISTS `adv_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `word` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `zoom` int(11) DEFAULT NULL,
  `phone_code` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`,`parent_id`),
  UNIQUE KEY `slug` (`slug`,`root_id`),
  KEY `IDX_17E64ABA79066886` (`root_id`),
  KEY `parent_id_idx` (`parent_id`),
  KEY `index_slug` (`slug`) USING BTREE,
  CONSTRAINT `FK_17E64ABA727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_17E64ABA79066886` FOREIGN KEY (`root_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86204 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_locations_has_adverts`
--

DROP TABLE IF EXISTS `adv_locations_has_adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_locations_has_adverts` (
  `location_id` int(11) unsigned NOT NULL,
  `has_adverts` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_locations_polygons`
--

DROP TABLE IF EXISTS `adv_locations_polygons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_locations_polygons` (
  `location_id` int(11) unsigned NOT NULL,
  `polygons` multipolygon NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_locations_postcodes`
--

DROP TABLE IF EXISTS `adv_locations_postcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_locations_postcodes` (
  `id_city` int(11) NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  UNIQUE KEY `id_city` (`id_city`,`postcode`),
  CONSTRAINT `adv_locations_postcodes_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_mailing`
--

DROP TABLE IF EXISTS `adv_mailing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_mailing` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ts` int(11) NOT NULL,
  `message_type` enum('email','push','chat') COLLATE utf8mb3_unicode_ci NOT NULL,
  `message_descr` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `hash_user_2` (`hash_user`,`ts`,`message_type`) USING BTREE,
  KEY `hash_user` (`hash_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_metro`
--

DROP TABLE IF EXISTS `adv_metro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_metro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` smallint(4) NOT NULL,
  `id_city` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_city` (`id_city`),
  KEY `id_country` (`id_country`),
  CONSTRAINT `adv_metro_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_metro_ibfk_2` FOREIGN KEY (`id_country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_metro_lines`
--

DROP TABLE IF EXISTS `adv_metro_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_metro_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_metro` int(11) NOT NULL,
  `name_local` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_translit` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hex_color` varchar(6) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_metro` (`id_metro`),
  CONSTRAINT `adv_metro_lines_ibfk_1` FOREIGN KEY (`id_metro`) REFERENCES `adv_metro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_metro_station_advert_relations`
--

DROP TABLE IF EXISTS `adv_metro_station_advert_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_metro_station_advert_relations` (
  `hash_advert` varchar(7) NOT NULL,
  `id_metro_station` int(11) NOT NULL,
  `distance` decimal(10,0) NOT NULL,
  UNIQUE KEY `hash_advert` (`hash_advert`,`id_metro_station`),
  KEY `id_metro_station` (`id_metro_station`),
  CONSTRAINT `adv_metro_station_advert_relations_ibfk_1` FOREIGN KEY (`id_metro_station`) REFERENCES `adv_metro_stations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_metro_stations`
--

DROP TABLE IF EXISTS `adv_metro_stations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_metro_stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_line` int(11) NOT NULL,
  `line_order` int(3) NOT NULL,
  `name_local` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_translit` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gps` point NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_line` (`id_line`),
  CONSTRAINT `adv_metro_stations_ibfk_1` FOREIGN KEY (`id_line`) REFERENCES `adv_metro_lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=495 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_migrations`
--

DROP TABLE IF EXISTS `adv_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_migrations` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_numbers_blacklist`
--

DROP TABLE IF EXISTS `adv_numbers_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_numbers_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num` (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_paid_service_active`
--

DROP TABLE IF EXISTS `adv_paid_service_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_paid_service_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_id` int(11) NOT NULL,
  `paid_service` varchar(50) NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `since` int(11) NOT NULL,
  `until` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_partners_ads_id`
--

DROP TABLE IF EXISTS `adv_partners_ads_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_partners_ads_id` (
  `id_partner` int(11) NOT NULL,
  `id_advert` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adverto_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notes` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id_partner` (`id_partner`,`id_advert`),
  CONSTRAINT `adv_partners_ads_id_ibfk_1` FOREIGN KEY (`id_partner`) REFERENCES `adv_partners_comp_shedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_partners_comp_shedule`
--

DROP TABLE IF EXISTS `adv_partners_comp_shedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_partners_comp_shedule` (
  `id` int(11) NOT NULL,
  `namespace` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Имя класса для вызова',
  `url` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Полный URL к API',
  `parce_hours` enum('0','1','2','3','6','9','12','24') COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Количество раз запуска парсера в сутки',
  `site` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_lang` smallint(2) DEFAULT NULL,
  `id_lang_additional` smallint(2) DEFAULT NULL,
  `currency` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_hash` (`user_hash`),
  KEY `id_lang` (`id_lang`),
  KEY `id_lang_additional` (`id_lang_additional`),
  KEY `currency` (`currency`),
  CONSTRAINT `adv_partners_comp_shedule_ibfk_1` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_partners_comp_shedule_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_partners_comp_shedule_ibfk_3` FOREIGN KEY (`id_lang_additional`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_partners_comp_shedule_ibfk_4` FOREIGN KEY (`currency`) REFERENCES `adv_currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_partners_fields_relations`
--

DROP TABLE IF EXISTS `adv_partners_fields_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_partners_fields_relations` (
  `id_partner` int(11) NOT NULL,
  `partner_id_category` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  `partner_field_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `partner_field_value` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `partner_field_text` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `adverto_field_id` int(11) DEFAULT NULL,
  `adverto_multiselect_id` int(11) DEFAULT NULL,
  `adverto_category_id` int(11) DEFAULT NULL,
  UNIQUE KEY `partner_id_category` (`partner_id_category`,`adverto_category_id`,`id_partner`) USING BTREE,
  UNIQUE KEY `id_partner` (`id_partner`,`partner_field_name`,`partner_field_value`,`partner_id_category`) USING BTREE,
  KEY `adverto_field_id` (`adverto_field_id`),
  KEY `adverto_multiselect_id` (`adverto_multiselect_id`),
  KEY `adverto_category_id` (`adverto_category_id`),
  CONSTRAINT `adv_partners_fields_relations_ibfk_1` FOREIGN KEY (`id_partner`) REFERENCES `adv_partners_comp_shedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_partners_fields_relations_ibfk_2` FOREIGN KEY (`adverto_field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_partners_fields_relations_ibfk_3` FOREIGN KEY (`adverto_multiselect_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_partners_fields_relations_ibfk_4` FOREIGN KEY (`adverto_category_id`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_payment_type_translations`
--

DROP TABLE IF EXISTS `adv_payment_type_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_payment_type_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `field` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_172783E5HKD562B` (`object_id`),
  CONSTRAINT `FK_172783E5HKD562B` FOREIGN KEY (`object_id`) REFERENCES `adv_payment_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_payment_types`
--

DROP TABLE IF EXISTS `adv_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_place_translations`
--

DROP TABLE IF EXISTS `adv_place_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_place_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `field` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1702483E232D562B` (`object_id`),
  CONSTRAINT `FK_1702483E232D562B` FOREIGN KEY (`object_id`) REFERENCES `adv_places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_places`
--

DROP TABLE IF EXISTS `adv_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `icon` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word_idx` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=464 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_price_subscriptions`
--

DROP TABLE IF EXISTS `adv_price_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_price_subscriptions` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` double(51,2) NOT NULL,
  UNIQUE KEY `hash_user` (`hash_user`,`hash_advert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_product_card`
--

DROP TABLE IF EXISTS `adv_product_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_product_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` smallint(5) unsigned NOT NULL,
  `external_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `brand` varchar(191) DEFAULT NULL,
  `barcode` varchar(191) DEFAULT NULL,
  `ean_code` varchar(191) DEFAULT NULL,
  `display_name` varchar(150) NOT NULL,
  `colours` varchar(255) DEFAULT NULL,
  `sizes` varchar(255) DEFAULT NULL,
  `long_description` text NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `primary_photo` varchar(255) DEFAULT NULL,
  `secondary_photo1` varchar(255) DEFAULT NULL,
  `secondary_photo2` varchar(255) DEFAULT NULL,
  `secondary_photo3` varchar(255) DEFAULT NULL,
  `secondary_photo4` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  CONSTRAINT `external_data` CHECK (json_valid(`external_data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_product_item`
--

DROP TABLE IF EXISTS `adv_product_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_product_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `products_upload_id` int(11) NOT NULL,
  `status` smallint(5) unsigned NOT NULL,
  `error_text` text DEFAULT NULL,
  `excel_row` int(10) unsigned NOT NULL,
  `data_source` smallint(5) unsigned NOT NULL,
  `external_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `item_code` varchar(191) NOT NULL,
  `brand` varchar(191) DEFAULT NULL,
  `barcode` varchar(191) DEFAULT NULL,
  `display_name` varchar(150) NOT NULL,
  `colours` varchar(255) DEFAULT NULL,
  `sizes` varchar(255) DEFAULT NULL,
  `long_description` text NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `price` double(10,2) unsigned NOT NULL,
  `price_before_discount` double(10,2) unsigned NOT NULL,
  `currency_id` smallint(5) unsigned NOT NULL,
  `vat` double(4,2) unsigned NOT NULL,
  `primary_photo` varchar(255) DEFAULT NULL,
  `secondary_photo1` varchar(255) DEFAULT NULL,
  `secondary_photo2` varchar(255) DEFAULT NULL,
  `secondary_photo3` varchar(255) DEFAULT NULL,
  `secondary_photo4` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `product_link` varchar(255) DEFAULT NULL,
  `delivery` double(10,2) unsigned NOT NULL,
  `term` int(10) unsigned NOT NULL,
  `warranty` smallint(5) unsigned NOT NULL,
  `quantity_in_stock` smallint(5) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_products_upload_id` (`products_upload_id`),
  KEY `idx_status` (`status`),
  CONSTRAINT `adv_products_upload_FK` FOREIGN KEY (`products_upload_id`) REFERENCES `adv_products_upload` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `external_data` CHECK (json_valid(`external_data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_products_upload`
--

DROP TABLE IF EXISTS `adv_products_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_products_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `load_type` smallint(5) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL COMMENT 'Adverts owner',
  `cms_user_id` int(10) unsigned NOT NULL COMMENT 'Upload moderator',
  `moderator_id` int(10) unsigned DEFAULT NULL COMMENT 'Approve moderator',
  `filename` varchar(191) NOT NULL COMMENT 'User file name',
  `status` smallint(5) unsigned NOT NULL,
  `decline_reason` varchar(191) DEFAULT NULL,
  `file_hash_original` varchar(191) NOT NULL,
  `json_products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `count_prods_total` int(10) unsigned NOT NULL,
  `count_prods_success` int(10) unsigned NOT NULL,
  `count_prods_error` int(10) unsigned NOT NULL,
  `count_prods_warning` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `moderated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_cms_user_id` (`cms_user_id`),
  KEY `idx_moderator_id` (`moderator_id`),
  KEY `idx_status` (`status`),
  KEY `idx_user_id` (`user_id`),
  CONSTRAINT `json_products` CHECK (json_valid(`json_products`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_program_rating`
--

DROP TABLE IF EXISTS `adv_program_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_program_rating` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `rating` smallint(1) NOT NULL,
  `ts` int(11) NOT NULL,
  `app_id` enum('ios','android','adverto.sale') COLLATE utf8mb3_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `user_hash` (`user_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_ratings`
--

DROP TABLE IF EXISTS `adv_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_ratings` (
  `hash_author` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Кто пишет отзыв и стаавит оценку',
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'О ком пишут отзыв и кому ставят оценку',
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `id_lang` smallint(2) NOT NULL,
  `mark` smallint(1) NOT NULL,
  `comment` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` int(11) NOT NULL,
  PRIMARY KEY (`hash_author`,`hash_user`,`hash_advert`),
  KEY `hash_user` (`hash_user`),
  KEY `hash_author` (`hash_author`) USING BTREE,
  KEY `date_added` (`date_added`),
  KEY `id_lang` (`id_lang`),
  KEY `hash_advert` (`hash_advert`),
  CONSTRAINT `adv_ratings_ibfk_1` FOREIGN KEY (`hash_author`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_ratings_ibfk_2` FOREIGN KEY (`hash_user`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_ratings_ibfk_3` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_ratings_ibfk_4` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_ratings_translate`
--

DROP TABLE IF EXISTS `adv_ratings_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_ratings_translate` (
  `hash_author` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`hash_author`,`hash_user`,`hash_advert`,`id_lang`),
  KEY `hash_user` (`hash_user`),
  KEY `hash_advert` (`hash_advert`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_ratings_translate_ibfk_1` FOREIGN KEY (`hash_author`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_ratings_translate_ibfk_2` FOREIGN KEY (`hash_user`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_ratings_translate_ibfk_3` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_ratings_translate_ibfk_4` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_refresh_token`
--

DROP TABLE IF EXISTS `adv_refresh_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_refresh_token` (
  `user_id` int(11) NOT NULL,
  `refresh_token` varchar(100) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `adv_refresh_token_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_search_cache`
--

DROP TABLE IF EXISTS `adv_search_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_search_cache` (
  `id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `data` longtext COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_search_phrases_all`
--

DROP TABLE IF EXISTS `adv_search_phrases_all`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_search_phrases_all` (
  `id_lang` smallint(2) NOT NULL,
  `phrase` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dt` int(11) NOT NULL,
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  KEY `id_lang` (`id_lang`),
  KEY `hash_user` (`hash_user`),
  CONSTRAINT `adv_search_phrases_all_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_search_phrases_clear`
--

DROP TABLE IF EXISTS `adv_search_phrases_clear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_search_phrases_clear` (
  `id_lang` smallint(2) NOT NULL,
  `phrase` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  UNIQUE KEY `id_lang` (`id_lang`,`phrase`),
  KEY `phrase` (`phrase`),
  CONSTRAINT `adv_search_phrases_clear_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_search_phrases_stoplist`
--

DROP TABLE IF EXISTS `adv_search_phrases_stoplist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_search_phrases_stoplist` (
  `id_lang` smallint(2) NOT NULL,
  `phrase` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  UNIQUE KEY `id_lang` (`id_lang`,`phrase`),
  KEY `phrase` (`phrase`),
  CONSTRAINT `adv_search_phrases_stoplist_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_server_status`
--

DROP TABLE IF EXISTS `adv_server_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_server_status` (
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`enabled`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_service_country_extra`
--

DROP TABLE IF EXISTS `adv_service_country_extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_service_country_extra` (
  `country_iso` int(11) NOT NULL,
  `country_visibility_extra` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`country_iso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services`
--

DROP TABLE IF EXISTS `adv_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort` int(2) NOT NULL,
  `comment` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Коммент',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_delivery`
--

DROP TABLE IF EXISTS `adv_services_delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_delivery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_delivery_locations`
--

DROP TABLE IF EXISTS `adv_services_delivery_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_delivery_locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) unsigned NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `code_name` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `uniq_name` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `delivery_letters` tinyint(1) NOT NULL,
  `delivery_parcels` tinyint(1) NOT NULL,
  `delivery_zone` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `max_weight` decimal(10,2) DEFAULT NULL,
  `max_volume` decimal(10,2) DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_name` (`delivery_id`,`code_name`),
  KEY `index_delivery_id` (`delivery_id`),
  KEY `index_country_id` (`country_id`),
  KEY `index_city_id` (`city_id`),
  KEY `index_delivery_zone` (`delivery_zone`),
  CONSTRAINT `adv_services_delivery_locations_ibfk_city` FOREIGN KEY (`city_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_delivery_locations_ibfk_country` FOREIGN KEY (`country_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_delivery_locations_ibfk_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `adv_services_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_delivery_locations_reference`
--

DROP TABLE IF EXISTS `adv_services_delivery_locations_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_delivery_locations_reference` (
  `delivery_id` int(11) unsigned NOT NULL,
  `delivery_location` varchar(128) COLLATE utf8mb3_unicode_ci NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `index_delivery_id` (`delivery_id`),
  KEY `adv_services_delivery_locations_reference_ibfk_country` (`location_id`),
  CONSTRAINT `adv_services_delivery_locations_reference_ibfk_country` FOREIGN KEY (`location_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_delivery_locations_reference_ibfk_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `adv_services_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_delivery_points`
--

DROP TABLE IF EXISTS `adv_services_delivery_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_delivery_points` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) unsigned NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `code_name` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `uniq_name` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address_short` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address_full` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phones` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `schedule` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gps` point DEFAULT NULL,
  `how_to_get` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nearest_station` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `has_terminal` tinyint(1) NOT NULL,
  `delivery_letters` tinyint(1) NOT NULL,
  `delivery_parcels` tinyint(1) NOT NULL,
  `send_letters` tinyint(1) NOT NULL,
  `send_parcels` tinyint(1) NOT NULL,
  `delivery_zone` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `max_weight` decimal(10,2) DEFAULT NULL,
  `max_volume` decimal(10,2) DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_name` (`delivery_id`,`code_name`),
  KEY `index_delivery_id` (`delivery_id`),
  KEY `index_country_id` (`country_id`),
  KEY `index_city_id` (`city_id`),
  KEY `index_delivery_zone` (`delivery_zone`),
  CONSTRAINT `adv_services_delivery_points_ibfk_city` FOREIGN KEY (`city_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_delivery_points_ibfk_country` FOREIGN KEY (`country_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_delivery_points_ibfk_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `adv_services_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_pickup`
--

DROP TABLE IF EXISTS `adv_services_pickup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_pickup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_pickup_locations_reference`
--

DROP TABLE IF EXISTS `adv_services_pickup_locations_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_pickup_locations_reference` (
  `pickup_id` int(11) unsigned NOT NULL,
  `pickup_location` varchar(128) COLLATE utf8mb3_unicode_ci NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `index_pickup_id` (`pickup_id`),
  KEY `adv_services_pickup_locations_reference_ibfk_country` (`location_id`),
  CONSTRAINT `adv_services_pickup_locations_reference_ibfk_country` FOREIGN KEY (`location_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_pickup_locations_reference_ibfk_pickup` FOREIGN KEY (`pickup_id`) REFERENCES `adv_services_pickup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_pickup_points`
--

DROP TABLE IF EXISTS `adv_services_pickup_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_pickup_points` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pickup_id` int(11) unsigned NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `code_name` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `uniq_name` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address_short` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address_full` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phones` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `schedule` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gps` point DEFAULT NULL,
  `how_to_get` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nearest_station` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `has_terminal` tinyint(1) NOT NULL,
  `delivery_letters` tinyint(1) NOT NULL,
  `delivery_parcels` tinyint(1) NOT NULL,
  `send_letters` tinyint(1) NOT NULL,
  `send_parcels` tinyint(1) NOT NULL,
  `delivery_zone` varchar(512) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `max_weight` decimal(10,2) DEFAULT NULL,
  `max_volume` decimal(10,2) DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_name` (`pickup_id`,`code_name`),
  KEY `index_pickup_id` (`pickup_id`),
  KEY `index_country_id` (`country_id`),
  KEY `index_city_id` (`city_id`),
  KEY `index_delivery_zone` (`delivery_zone`),
  CONSTRAINT `adv_services_pickup_points_ibfk_city` FOREIGN KEY (`city_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_pickup_points_ibfk_country` FOREIGN KEY (`country_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_services_pickup_points_ibfk_pickup` FOREIGN KEY (`pickup_id`) REFERENCES `adv_services_pickup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5204 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_services_price`
--

DROP TABLE IF EXISTS `adv_services_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_services_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_service` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_without_discount` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shop_address`
--

DROP TABLE IF EXISTS `adv_shop_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shop_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `has_geo_location` tinyint(1) NOT NULL DEFAULT 1,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `building` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `building_name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `floor_no` int(11) DEFAULT NULL,
  `office_no` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phones` longtext COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `emails` longtext COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `time_zone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `INX_HL7A568IKDKAKF` (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shop_address_schedule_relations`
--

DROP TABLE IF EXISTS `adv_shop_address_schedule_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shop_address_schedule_relations` (
  `address_id` int(11) unsigned NOT NULL,
  `schedule_id` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  KEY `FK_L6HKA766KNY` (`address_id`),
  KEY `FK_LVN656GL6KNY` (`schedule_id`),
  CONSTRAINT `FK_L6HKA766KNY` FOREIGN KEY (`address_id`) REFERENCES `adv_shop_address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_LVN656GL6KNY` FOREIGN KEY (`schedule_id`) REFERENCES `adv_shop_schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shop_currency_relations`
--

DROP TABLE IF EXISTS `adv_shop_currency_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shop_currency_relations` (
  `shop_id` int(11) unsigned NOT NULL,
  `currency_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shop_payment_relations`
--

DROP TABLE IF EXISTS `adv_shop_payment_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shop_payment_relations` (
  `shop_id` int(11) unsigned NOT NULL,
  `payment_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shop_place_relations`
--

DROP TABLE IF EXISTS `adv_shop_place_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shop_place_relations` (
  `shop_id` int(11) unsigned NOT NULL,
  `place_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shop_schedules`
--

DROP TABLE IF EXISTS `adv_shop_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shop_schedules` (
  `id` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `shop_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `from_time_day` int(2) unsigned NOT NULL,
  `from_time_month` int(2) unsigned NOT NULL,
  `to_time_day` int(2) unsigned NOT NULL,
  `to_time_month` int(2) unsigned NOT NULL,
  `schedule_days` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `IDX_288C52054D16C4DD` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_shops`
--

DROP TABLE IF EXISTS `adv_shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_shops` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `not_moderated` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `main_place_id` int(11) DEFAULT NULL,
  `word` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `company_no` varchar(15) DEFAULT NULL,
  `vat` varchar(15) DEFAULT NULL,
  `contact_person` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '',
  `is_director` tinyint(1) NOT NULL DEFAULT 0,
  `is_owner` tinyint(1) NOT NULL DEFAULT 0,
  `director_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `postbox` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phones` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `emails` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `websites` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `fax` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `skype` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '',
  `instagram` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '',
  `linkedin` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gplus` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `play_market` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `app_store` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=657 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_site_content`
--

DROP TABLE IF EXISTS `adv_site_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_site_content` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `page_type` int(1) NOT NULL DEFAULT 1 COMMENT 'Тип страницы: 1-страница в шаблоне сайта, 2-страница "голая"',
  `pid` int(5) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `javascript` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Яваскрипт, который должен включиться в эту страницу',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_lang` (`id_lang`,`url`) USING BTREE,
  KEY `pid` (`pid`),
  KEY `url` (`url`),
  CONSTRAINT `adv_site_content_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_site_content_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `adv_site_content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_site_content_new`
--

DROP TABLE IF EXISTS `adv_site_content_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_site_content_new` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `page_type` int(1) NOT NULL DEFAULT 1 COMMENT 'Тип страницы: 1-страница в шаблоне сайта, 2-страница "голая"',
  `pid` int(5) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `javascript` text COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Яваскрипт, который должен включиться в эту страницу',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_lang` (`id_lang`,`url`) USING BTREE,
  KEY `pid` (`pid`),
  KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_sotial_county_relations`
--

DROP TABLE IF EXISTS `adv_sotial_county_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_sotial_county_relations` (
  `id_sotial` int(11) NOT NULL,
  `id_country` smallint(4) NOT NULL,
  UNIQUE KEY `id_sotial_2` (`id_sotial`,`id_country`),
  KEY `id_country` (`id_country`),
  KEY `id_sotial` (`id_sotial`),
  CONSTRAINT `adv_sotial_county_relations_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_sotial_county_relations_ibfk_2` FOREIGN KEY (`id_sotial`) REFERENCES `adv_sotial_networks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_sotial_networks`
--

DROP TABLE IF EXISTS `adv_sotial_networks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_sotial_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `main_page_url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `is_general` tinyint(1) NOT NULL COMMENT 'TRUE - значит доступна для входа из любой страны',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_subscribs`
--

DROP TABLE IF EXISTS `adv_subscribs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_subscribs` (
  `hash_subscriber` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `hash_subscribed` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date_added` int(11) NOT NULL,
  UNIQUE KEY `UQ_LKFY78FGUj876` (`hash_subscriber`,`hash_subscribed`),
  KEY `hash_subscriber` (`hash_subscriber`),
  KEY `hash_subscribed` (`hash_subscribed`),
  CONSTRAINT `adv_subscribs_ibfk_1` FOREIGN KEY (`hash_subscriber`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_subscribs_ibfk_2` FOREIGN KEY (`hash_subscribed`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_telegram_adverts_to_groups`
--

DROP TABLE IF EXISTS `adv_telegram_adverts_to_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_telegram_adverts_to_groups` (
  `advert_hash` varchar(7) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  UNIQUE KEY `advert_hash` (`advert_hash`,`group_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `adv_telegram_adverts_to_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `adv_telegram_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_telegram_client_sessions`
--

DROP TABLE IF EXISTS `adv_telegram_client_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_telegram_client_sessions` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `session` text NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_hash` (`user_hash`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_telegram_groups`
--

DROP TABLE IF EXISTS `adv_telegram_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_telegram_groups` (
  `id` bigint(20) NOT NULL,
  `access_hash` bigint(20) NOT NULL,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `group_name` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_temp_files`
--

DROP TABLE IF EXISTS `adv_temp_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_temp_files` (
  `hash` varchar(50) NOT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `file_type` enum('image','video','file') DEFAULT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_transactions`
--

DROP TABLE IF EXISTS `adv_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_transactions` (
  `id` varchar(50) NOT NULL,
  `state` varchar(10) DEFAULT 'NEW',
  `direction` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `related` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `currency_quote` float DEFAULT NULL,
  `error` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `state_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_transactions_advert_purchase`
--

DROP TABLE IF EXISTS `adv_transactions_advert_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_transactions_advert_purchase` (
  `transaction_id` varchar(50) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `advert_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `advert_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `advert_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_transactions_deposit`
--

DROP TABLE IF EXISTS `adv_transactions_deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_transactions_deposit` (
  `transaction_id` varchar(50) NOT NULL,
  `gateway` varchar(50) NOT NULL,
  `remote_id` varchar(50) DEFAULT NULL,
  `error` longtext DEFAULT NULL,
  `error_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_transactions_paid_service`
--

DROP TABLE IF EXISTS `adv_transactions_paid_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_transactions_paid_service` (
  `transaction_id` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `count_days` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `paid_service` varchar(50) NOT NULL,
  `advert_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_auth_by_phone_attempts`
--

DROP TABLE IF EXISTS `adv_user_auth_by_phone_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_auth_by_phone_attempts` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `attempts` int(1) NOT NULL COMMENT 'The number of attempts to enter a phone number',
  PRIMARY KEY (`user_hash`),
  CONSTRAINT `adv_user_auth_by_phone_attempts_ibfk_1` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_blacklist`
--

DROP TABLE IF EXISTS `adv_user_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_blacklist` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Чей это блаклист',
  `hash_bastard` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Негодяй, которого добавили в черный список',
  `date_added` int(11) NOT NULL,
  KEY `hash_user` (`hash_user`),
  KEY `hash_bastard` (`hash_bastard`),
  CONSTRAINT `adv_user_blacklist_ibfk_1` FOREIGN KEY (`hash_user`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_blacklist_ibfk_2` FOREIGN KEY (`hash_bastard`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_call_phone`
--

DROP TABLE IF EXISTS `adv_user_call_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_call_phone` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num_for_auth` varchar(21) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Phone number from which you need to make a call for authorization',
  `created_at` int(11) NOT NULL,
  `start_period_at` int(11) NOT NULL COMMENT 'Call time to track the number of attempts over a period of time',
  `last_call_at` int(11) NOT NULL COMMENT 'Time of the last call request',
  `attempts` int(1) NOT NULL COMMENT 'The number of attempts to get call',
  PRIMARY KEY (`user_hash`),
  CONSTRAINT `adv_user_call_phone_ibfk_1` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_call_phone_ip`
--

DROP TABLE IF EXISTS `adv_user_call_phone_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_call_phone_ip` (
  `ip` varchar(39) COLLATE utf8mb3_unicode_ci NOT NULL,
  `called_at` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_change_email`
--

DROP TABLE IF EXISTS `adv_user_change_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_change_email` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_pass` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  KEY `adv_user_change_email_ibfk_1` (`user_hash`),
  CONSTRAINT `adv_user_change_email_ibfk_1` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_change_num`
--

DROP TABLE IF EXISTS `adv_user_change_num`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_change_num` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  KEY `adv_user_change_num_ibfk_1` (`user_hash`),
  CONSTRAINT `adv_user_change_num_ibfk_1` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_communication_type`
--

DROP TABLE IF EXISTS `adv_user_communication_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_communication_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adv_user_communication_type_UN` (`id`,`name`,`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_communication_type_relations`
--

DROP TABLE IF EXISTS `adv_user_communication_type_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_communication_type_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comm_type` int(11) NOT NULL,
  `value` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adv_user_communication_type_relations_FK` (`comm_type`),
  KEY `adv_user_communication_type_relations_FK_1` (`user_id`),
  CONSTRAINT `adv_user_communication_type_relations_FK` FOREIGN KEY (`comm_type`) REFERENCES `adv_user_communication_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_communication_type_relations_FK_1` FOREIGN KEY (`user_id`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_company`
--

DROP TABLE IF EXISTS `adv_user_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `country_id` smallint(6) NOT NULL,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `site` varchar(255) DEFAULT NULL,
  `phones` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`phones`)),
  `slogan` text DEFAULT NULL,
  `logo_hash` varchar(24) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `video_hash` varchar(24) DEFAULT NULL,
  `manager_name` varchar(255) DEFAULT NULL,
  `manager_surname` varchar(255) DEFAULT NULL,
  `manager_phone` varchar(20) DEFAULT NULL,
  `manager_email` varchar(255) DEFAULT NULL,
  `legal_organisation_type_id` int(10) unsigned DEFAULT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_twitter` varchar(255) DEFAULT NULL,
  `link_linkedin` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `adv_user_company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_delete_queue`
--

DROP TABLE IF EXISTS `adv_user_delete_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_delete_queue` (
  `hash` varchar(8) NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_delivery`
--

DROP TABLE IF EXISTS `adv_user_delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_delivery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `location_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_hash_delivery_indx1` (`user_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_delivery_category_exclude`
--

DROP TABLE IF EXISTS `adv_user_delivery_category_exclude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_delivery_category_exclude` (
  `delivery_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  KEY `user_delivery_category_exclude_indx1` (`delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_delivery_exclude`
--

DROP TABLE IF EXISTS `adv_user_delivery_exclude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_delivery_exclude` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `location_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_hash_delivery_exclude_indx1` (`user_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_phone_request`
--

DROP TABLE IF EXISTS `adv_user_phone_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_phone_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `advert_hash` varchar(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `adv_user_phone_request_users` (`user_hash`),
  KEY `adv_user_phone_request_adverts` (`advert_hash`),
  CONSTRAINT `adv_user_phone_request_fk_advert` FOREIGN KEY (`advert_hash`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_phone_request_fk_user` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_send_code`
--

DROP TABLE IF EXISTS `adv_user_send_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_send_code` (
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `code` varchar(4) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dt` int(11) NOT NULL,
  `attempts` int(1) NOT NULL COMMENT 'Количество попыток ввода кода',
  UNIQUE KEY `user_type` (`user_hash`,`type`),
  CONSTRAINT `adv_user_send_code_ibfk_1` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_send_code_ip`
--

DROP TABLE IF EXISTS `adv_user_send_code_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_send_code_ip` (
  `ip` varchar(39) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'с какого IP',
  `timestamp` int(11) NOT NULL COMMENT 'Время последнего обращения',
  `attempts` int(11) NOT NULL COMMENT 'Количество попыток',
  PRIMARY KEY (`ip`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_send_sms_block_attempts`
--

DROP TABLE IF EXISTS `adv_user_send_sms_block_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_send_sms_block_attempts` (
  `num` varchar(21) COLLATE utf8mb3_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL COMMENT 'Время последнего обращения',
  `attempts` int(11) NOT NULL COMMENT 'Количество попыток',
  PRIMARY KEY (`num`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_send_sms_num`
--

DROP TABLE IF EXISTS `adv_user_send_sms_num`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_send_sms_num` (
  `num` varchar(21) COLLATE utf8mb3_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL COMMENT 'Время последнего обращения',
  `attempts` int(11) NOT NULL COMMENT 'Количество попыток',
  PRIMARY KEY (`num`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_services_delivery`
--

DROP TABLE IF EXISTS `adv_user_services_delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_services_delivery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `delivery_id` int(11) unsigned NOT NULL,
  `add_weight` int(11) unsigned NOT NULL DEFAULT 0,
  `add_days` int(11) unsigned NOT NULL DEFAULT 0,
  `add_fix_value` int(11) unsigned NOT NULL DEFAULT 0,
  `add_tariff_value_percent` tinyint(3) NOT NULL DEFAULT 0,
  `add_payment_value_percent` tinyint(3) NOT NULL DEFAULT 0,
  `add_declared_value_percent` tinyint(3) NOT NULL DEFAULT 0,
  `round` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - Wo rounding, 1 - To the whole-number, 2 - To the tenths, 3 - To the hundredths',
  `round_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - ceiling, 1 - round half up',
  `min_value` int(11) NOT NULL DEFAULT 0,
  `max_value` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `index_delivery_id` (`delivery_id`),
  KEY `index_user_hash` (`user_hash`),
  CONSTRAINT `adv_user_services_delivery_ibfk_delivery_id` FOREIGN KEY (`delivery_id`) REFERENCES `adv_services_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_services_delivery_ibfk_user` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_services_delivery_points_for_parcels`
--

DROP TABLE IF EXISTS `adv_user_services_delivery_points_for_parcels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_services_delivery_points_for_parcels` (
  `delivery_id` int(11) unsigned NOT NULL,
  `point_id` int(11) unsigned NOT NULL,
  KEY `adv_user_services_delivery_points_for_parcels_ibfk_delivery_id` (`delivery_id`),
  KEY `adv_user_services_delivery_points_for_parcels_ibfk_point_id` (`point_id`),
  CONSTRAINT `adv_user_services_delivery_points_for_parcels_ibfk_delivery_id` FOREIGN KEY (`delivery_id`) REFERENCES `adv_user_services_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_services_delivery_points_for_parcels_ibfk_point_id` FOREIGN KEY (`point_id`) REFERENCES `adv_services_delivery_points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_services_delivery_price_ranges`
--

DROP TABLE IF EXISTS `adv_user_services_delivery_price_ranges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_services_delivery_price_ranges` (
  `delivery_id` int(11) unsigned NOT NULL,
  `from` int(11) unsigned NOT NULL,
  `to` int(11) unsigned NOT NULL,
  `value` int(11) unsigned NOT NULL,
  KEY `index_delivery_id` (`delivery_id`),
  CONSTRAINT `adv_user_services_delivery_price_ranges_ibfk_delivery_id` FOREIGN KEY (`delivery_id`) REFERENCES `adv_user_services_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_services_pickup`
--

DROP TABLE IF EXISTS `adv_user_services_pickup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_services_pickup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pickup_id` int(11) unsigned NOT NULL,
  `add_weight` int(11) unsigned NOT NULL DEFAULT 0,
  `add_days` int(11) unsigned NOT NULL DEFAULT 0,
  `add_fix_value` int(11) unsigned NOT NULL DEFAULT 0,
  `add_tariff_value_percent` tinyint(3) NOT NULL DEFAULT 0,
  `add_payment_value_percent` tinyint(3) NOT NULL DEFAULT 0,
  `add_declared_value_percent` tinyint(3) NOT NULL DEFAULT 0,
  `round` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - Wo rounding, 1 - To the whole-number, 2 - To the tenths, 3 - To the hundredths',
  `round_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - ceiling, 1 - round half up',
  `min_value` int(11) NOT NULL DEFAULT 0,
  `max_value` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `index_pickup_id` (`pickup_id`),
  KEY `index_user_hash` (`user_hash`),
  CONSTRAINT `adv_user_services_pickup_ibfk_pickup_id` FOREIGN KEY (`pickup_id`) REFERENCES `adv_services_pickup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_services_pickup_ibfk_user` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_services_pickup_points_for_parcels`
--

DROP TABLE IF EXISTS `adv_user_services_pickup_points_for_parcels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_services_pickup_points_for_parcels` (
  `pickup_id` int(11) unsigned NOT NULL,
  `point_id` int(11) unsigned NOT NULL,
  KEY `adv_user_services_pickup_points_for_parcels_ibfk_pickup_id` (`pickup_id`),
  KEY `adv_user_services_pickup_points_for_parcels_ibfk_point_id` (`point_id`),
  CONSTRAINT `adv_user_services_pickup_points_for_parcels_ibfk_pickup_id` FOREIGN KEY (`pickup_id`) REFERENCES `adv_user_services_pickup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_user_services_pickup_points_for_parcels_ibfk_point_id` FOREIGN KEY (`point_id`) REFERENCES `adv_services_pickup_points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_services_pickup_price_ranges`
--

DROP TABLE IF EXISTS `adv_user_services_pickup_price_ranges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_services_pickup_price_ranges` (
  `pickup_id` int(11) unsigned NOT NULL,
  `from` int(11) unsigned NOT NULL,
  `to` int(11) unsigned NOT NULL,
  `value` int(11) unsigned NOT NULL,
  KEY `index_pickup_id` (`pickup_id`),
  CONSTRAINT `adv_user_services_pickup_price_ranges_ibfk_pickup_id` FOREIGN KEY (`pickup_id`) REFERENCES `adv_user_services_pickup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_user_types`
--

DROP TABLE IF EXISTS `adv_user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_slug` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description_slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='типы аккаунтов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users`
--

DROP TABLE IF EXISTS `adv_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(6) COLLATE utf8mb3_unicode_ci NOT NULL,
  `promo` varchar(6) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lang` smallint(2) NOT NULL,
  `country` smallint(4) NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email_pass` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_facebook` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_gplus` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `id_twitter` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('1','2','3') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `reg_date` int(11) NOT NULL,
  `rating_mark` float NOT NULL DEFAULT 0,
  `rating_mark_cnt` smallint(5) NOT NULL DEFAULT 0,
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `online_lasttime` int(11) NOT NULL DEFAULT 0,
  `app_id` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deny_call` tinyint(1) NOT NULL COMMENT 'Разрешены ли звонки',
  `type_of_degradation` enum('1','2','3') COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'уровень размытия объявления',
  `is_blocked` tinyint(1) NOT NULL,
  `can_make_adverts` tinyint(1) NOT NULL DEFAULT 1,
  `can_write_messages` tinyint(1) NOT NULL DEFAULT 1,
  `image_id` varchar(24) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `blacklist_status` smallint(1) NOT NULL DEFAULT 0,
  `timestamp` int(11) NOT NULL DEFAULT 0,
  `block_reason_text` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `exclusive_available` tinyint(1) NOT NULL DEFAULT 1,
  `is_shop` tinyint(1) NOT NULL DEFAULT 0,
  `company_logo_hash` varchar(24) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `promo` (`promo`),
  UNIQUE KEY `hash` (`hash`),
  UNIQUE KEY `url` (`url`),
  UNIQUE KEY `num` (`num`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  UNIQUE KEY `id_facebook` (`id_facebook`),
  UNIQUE KEY `id_gplus` (`id_gplus`),
  UNIQUE KEY `id_twitter` (`id_twitter`),
  KEY `country` (`country`),
  KEY `lang` (`lang`),
  KEY `online_lasttime` (`online_lasttime`),
  KEY `adv_users_ibfk_3` (`image_id`),
  KEY `reg_date` (`reg_date`),
  KEY `adv_users_FK` (`company_logo_hash`),
  CONSTRAINT `adv_users_FK` FOREIGN KEY (`company_logo_hash`) REFERENCES `adv_users_company_logos` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_ibfk_2` FOREIGN KEY (`country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `adv_images_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=147010 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_addresses`
--

DROP TABLE IF EXISTS `adv_users_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'not used',
  `user_hash` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address_text` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `country` smallint(4) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `gps` point DEFAULT NULL,
  `is_main` tinyint(1) NOT NULL,
  `sort` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city` (`city`),
  KEY `country` (`country`),
  KEY `user_hash` (`user_hash`),
  CONSTRAINT `adv_users_addresses_ibfk_1` FOREIGN KEY (`city`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_addresses_ibfk_2` FOREIGN KEY (`country`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_addresses_ibfk_3` FOREIGN KEY (`user_hash`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4584 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_auth_sotial`
--

DROP TABLE IF EXISTS `adv_users_auth_sotial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_auth_sotial` (
  `hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sotial_id` int(11) NOT NULL,
  `uid` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  UNIQUE KEY `hash` (`hash`,`sotial_id`),
  UNIQUE KEY `sotial_id` (`sotial_id`,`uid`),
  UNIQUE KEY `uid` (`uid`),
  CONSTRAINT `adv_users_auth_sotial_ibfk_1` FOREIGN KEY (`sotial_id`) REFERENCES `adv_sotial_networks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_bonuses_actions`
--

DROP TABLE IF EXISTS `adv_users_bonuses_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_bonuses_actions` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `action` int(1) NOT NULL COMMENT '0-вход, 1-регистрация, 2-нап проф ава, 3-нап проф майл, 4-нап проф пол, 5-рейтинг, 6-share my profile, 7-share ad, 8-share NOT my profile',
  `hash_advert` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dt` int(11) NOT NULL,
  `count` int(2) NOT NULL COMMENT 'количество бонусов, полученных по этому экшену',
  UNIQUE KEY `hash_user` (`hash_user`,`action`,`hash_advert`) USING BTREE,
  KEY `hash_advert` (`hash_advert`),
  CONSTRAINT `adv_users_bonuses_actions_ibfk_1` FOREIGN KEY (`hash_advert`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_bonuses_actions_ibfk_2` FOREIGN KEY (`hash_user`) REFERENCES `adv_users` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_bonuses_everyday_notifications`
--

DROP TABLE IF EXISTS `adv_users_bonuses_everyday_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_bonuses_everyday_notifications` (
  `hash` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date_sent` int(11) NOT NULL,
  PRIMARY KEY (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_company_logos`
--

DROP TABLE IF EXISTS `adv_users_company_logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_company_logos` (
  `id_user` int(11) NOT NULL,
  `hash` varchar(24) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort` smallint(3) NOT NULL DEFAULT 0,
  `width` smallint(5) NOT NULL DEFAULT 0,
  `height` smallint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`hash`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `adv_users_company_logos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='лого аккаунта агентства магазина или др.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_devices`
--

DROP TABLE IF EXISTS `adv_users_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_devices` (
  `dev_id` varchar(40) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `device_type` enum('1','2','3') COLLATE utf8mb3_unicode_ci NOT NULL COMMENT '1-android, 2-iOS, 3-website',
  `os_version` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `device_model` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `install_id` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `AUD_UK_1` (`dev_id`,`hash_user`,`device_type`),
  KEY `hash_user` (`hash_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_devices_not_registered`
--

DROP TABLE IF EXISTS `adv_users_devices_not_registered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_devices_not_registered` (
  `dev_id` varchar(40) COLLATE utf8mb3_unicode_ci DEFAULT '',
  `device_type` enum('1','2','3') COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '1-android, 2-iOS, 3-website',
  `os_version` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `device_model` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `install_id` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `install_id` (`install_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_numbers_prefix_blacklist`
--

DROP TABLE IF EXISTS `adv_users_numbers_prefix_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_numbers_prefix_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prefix` (`prefix`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referral_accounts`
--

DROP TABLE IF EXISTS `adv_users_referral_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referral_accounts` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `indicative_balance` int(11) NOT NULL,
  `actual_balance` int(11) NOT NULL,
  `id_currency` smallint(3) NOT NULL,
  UNIQUE KEY `hash_user` (`hash_user`),
  KEY `id_currency` (`id_currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals`
--

DROP TABLE IF EXISTS `adv_users_referrals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'юзер, который ссылается',
  `hash_referral` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'юзер, на которого ссылаются (кто пришел по ссылке и зарегался)',
  `refer_link` varchar(7) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dt` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 0 COMMENT '0 - не активный, 1 - активный',
  `status` int(1) DEFAULT 0 COMMENT '0 - не определен, 1 - оплачен, 2 - без оплаты, 3 - проверяется',
  UNIQUE KEY `hash_user` (`hash_user`,`hash_referral`),
  UNIQUE KEY `hash_referral` (`hash_referral`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals_accounts_history`
--

DROP TABLE IF EXISTS `adv_users_referrals_accounts_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals_accounts_history` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `ts` int(11) NOT NULL,
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` int(6) NOT NULL,
  `withdrawal_order_id` int(11) DEFAULT NULL,
  `pay_for_user` varchar(8) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adv_users_referrals_accounts_history_ibfk_1` (`withdrawal_order_id`),
  CONSTRAINT `adv_users_referrals_accounts_history_ibfk_1` FOREIGN KEY (`withdrawal_order_id`) REFERENCES `adv_users_referrals_withdrawal_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals_check_active`
--

DROP TABLE IF EXISTS `adv_users_referrals_check_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals_check_active` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'юзер, которого привлекли',
  `period_number` int(1) NOT NULL DEFAULT 0 COMMENT 'Номер 8и дневнего периода, который подряд заходит данный юзер (от 0 до 4)',
  `ts_check_start` int(11) NOT NULL DEFAULT 0 COMMENT 'Время начала отслеживания входов',
  `ts_check_end` int(11) NOT NULL DEFAULT 0 COMMENT 'Время завершения отслеживания входов (+30 дней к началу)',
  `cron_last_check` int(11) NOT NULL COMMENT 'Время, когда крон в последний раз проверял этого пользователя',
  UNIQUE KEY `hash_user` (`hash_user`),
  KEY `cron_last_check` (`cron_last_check`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals_settings`
--

DROP TABLE IF EXISTS `adv_users_referrals_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals_settings` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `code` int(6) NOT NULL COMMENT 'Код для проверки номера',
  `secret_phrase` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `passport_number` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `hash_user` (`hash_user`),
  UNIQUE KEY `num` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals_withdrawal_orders`
--

DROP TABLE IF EXISTS `adv_users_referrals_withdrawal_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals_withdrawal_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `withdrawal_type_id` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0-не обработан, 1-проведен, 2-отказано',
  `ts_of_execution` int(11) DEFAULT NULL COMMENT 'Время, когда бухгалтер обработал заявку',
  `user_comment` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `accountant_comment` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `accountant` int(11) NOT NULL COMMENT 'Бухгалтер, который осуществляет исполнение заказа',
  PRIMARY KEY (`id`),
  KEY `withdrawal_type_id` (`withdrawal_type_id`),
  CONSTRAINT `adv_users_referrals_withdrawal_orders_ibfk_1` FOREIGN KEY (`withdrawal_type_id`) REFERENCES `adv_users_referrals_withdrawal_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals_withdrawal_settings`
--

DROP TABLE IF EXISTS `adv_users_referrals_withdrawal_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals_withdrawal_settings` (
  `hash_user` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL,
  `withdrawal_type_id` int(11) NOT NULL,
  `param1` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `param2` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `param3` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `param4` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `param5` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  UNIQUE KEY `hash_user` (`hash_user`,`withdrawal_type_id`),
  KEY `adv_users_referrals_withdrawal_settings_ibfk_1` (`withdrawal_type_id`),
  CONSTRAINT `adv_users_referrals_withdrawal_settings_ibfk_1` FOREIGN KEY (`withdrawal_type_id`) REFERENCES `adv_users_referrals_withdrawal_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_referrals_withdrawal_types`
--

DROP TABLE IF EXISTS `adv_users_referrals_withdrawal_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_referrals_withdrawal_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `website` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo_url_50x50` varchar(300) COLLATE utf8mb3_unicode_ci NOT NULL,
  `logo_url_150x150` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo_url_500x500` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo_url_1000x1000` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_users_settings`
--

DROP TABLE IF EXISTS `adv_users_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_users_settings` (
  `id_user` int(11) NOT NULL,
  `address_text` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_country_id` smallint(4) DEFAULT NULL,
  `user_city_id` int(11) DEFAULT NULL,
  `gps` geometry DEFAULT NULL,
  `email_confirmed` tinyint(1) DEFAULT 0 COMMENT 'Подтверждён ли email',
  `num_confirmed` tinyint(1) DEFAULT 0 COMMENT 'Подтвержден ли телефон',
  `telegram` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `viber` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `skype` varchar(32) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `subscribeads_notification` tinyint(1) NOT NULL COMMENT 'уведомлять меня при публикации новых объявлений в моих подписках',
  `message_notification` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'уведомлять меня о получении новых сообщений',
  `favorite_notification` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'уведомлять меня о при изменении информации в избранных объявлениях',
  `myadv_notification` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'уведомлять меня об при изменении статуса публикации моих объявлений',
  `changeprice_ads_notification` tinyint(1) DEFAULT 1 COMMENT 'уведомлять меня при изменении цены на объявления, на которые я подписан (inform me when price change)',
  `requests_notification` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'уведомлять меня при появлении объявлений, подходящих под созданный мною реквест',
  `newads_by_filter_notification` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'уведомлять меня о новых объявлениях по моим фильтрам (настраивается в фильтрах)',
  `info_push_notification` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'включить уведомление через информационные пуши',
  `count_subscribs` int(7) NOT NULL DEFAULT 0,
  `count_subscribers` int(7) NOT NULL DEFAULT 0,
  `prods_active_cnt` smallint(5) NOT NULL DEFAULT 0,
  `prods_sold_cnt` smallint(5) NOT NULL DEFAULT 0,
  `prods_arhive_cnt` smallint(5) NOT NULL DEFAULT 0 COMMENT 'Количество объявлений в архиве',
  `call_schedule_days` text COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Расписание когда можно звонить. JSON массив',
  `additional_langs` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Дополнительные языки, на которых говорит юзер, через точку запятую',
  `langs_not_translate` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'На каких языках не требуется переводить объявления',
  `link_gplus` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type_account` enum('1','2') COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Юридическое или физическое лицо: 1-физическое, 2-юридическое',
  `enable_referal` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Разрешена ли работа с реферальной сетью',
  `agreement_referal` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Согласился ли пользователь с соглашением в участии в партнёрской программе?',
  `account_status` int(1) DEFAULT 0 COMMENT '0-обычный, 1-PRO, 2-PRO-1, 3-PRO-2, 4-PRO-3',
  `user_type_id` int(11) NOT NULL DEFAULT 1,
  `prods_on_moderation_cnt` smallint(5) unsigned DEFAULT 0,
  `prods_drafts_cnt` smallint(5) unsigned DEFAULT 0,
  `comp_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `main_phone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_facebook` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_twitter` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_linkedin` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_instagram` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_youtube` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`),
  KEY `user_country_id` (`user_country_id`),
  KEY `adv_users_settings_ibfk_3` (`user_city_id`),
  KEY `adv_users_settings_FK` (`user_type_id`),
  CONSTRAINT `adv_users_settings_FK` FOREIGN KEY (`user_type_id`) REFERENCES `adv_user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_settings_ibfk_1` FOREIGN KEY (`user_country_id`) REFERENCES `adv_countries` (`iso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_settings_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `adv_users_settings_ibfk_3` FOREIGN KEY (`user_city_id`) REFERENCES `adv_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_version`
--

DROP TABLE IF EXISTS `adv_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_version` (
  `id` int(3) NOT NULL,
  `app_version_android` int(11) NOT NULL COMMENT 'Версия приложения андроид',
  `app_version_ios` int(11) NOT NULL COMMENT 'Версия приложения iOS',
  `words_version` int(11) NOT NULL COMMENT 'Версия слов на сервере на любом языке',
  `categories_version` int(11) NOT NULL,
  `oblige_update_android` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 - требовать обновление, 0 - только информировать',
  `oblige_update_ios` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 - требовать обновление, 0 - только информировать',
  `app_version` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `app_version_min` int(10) unsigned NOT NULL,
  `app_version_recommend` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_videos_adverts`
--

DROP TABLE IF EXISTS `adv_videos_adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_videos_adverts` (
  `hash` varchar(24) NOT NULL,
  `id_adv` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `sort` smallint(3) DEFAULT 0,
  PRIMARY KEY (`hash`),
  KEY `adv_videos_adverts_id_adv_fk1` (`id_adv`),
  CONSTRAINT `adv_videos_adverts_id_adv_fk1` FOREIGN KEY (`id_adv`) REFERENCES `adv_adverts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_videos_companies`
--

DROP TABLE IF EXISTS `adv_videos_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_videos_companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `hash` varchar(24) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `adv_videos_companies_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `adv_user_company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_videos_thumbnails`
--

DROP TABLE IF EXISTS `adv_videos_thumbnails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_videos_thumbnails` (
  `thumbnail_hash` varchar(24) NOT NULL,
  `thumbnail_url` varchar(100) NOT NULL,
  `video_hash` varchar(24) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`thumbnail_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_words`
--

DROP TABLE IF EXISTS `adv_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_words` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `text` text COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`code`,`id_lang`),
  UNIQUE KEY `id` (`id`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_words_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `adv_words_site`
--

DROP TABLE IF EXISTS `adv_words_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adv_words_site` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `text` text COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`code`,`id_lang`),
  UNIQUE KEY `id` (`id`),
  KEY `id_lang` (`id_lang`),
  CONSTRAINT `adv_words_site_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1799 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donor_send_sms`
--

DROP TABLE IF EXISTS `donor_send_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donor_send_sms` (
  `user_hash` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb3_unicode_ci NOT NULL,
  `class` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  UNIQUE KEY `class` (`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors_adverts_category`
--

DROP TABLE IF EXISTS `donors_adverts_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors_adverts_category` (
  `id_donor` int(11) NOT NULL,
  `hash_advert` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_donor_category` int(11) NOT NULL,
  `id_donor_advert` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT '',
  PRIMARY KEY (`hash_advert`),
  KEY `id_donor_advert_idx` (`id_donor_advert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors_category_names`
--

DROP TABLE IF EXISTS `donors_category_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors_category_names` (
  `id_donor` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  UNIQUE KEY `id_donor` (`id_donor`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors_category_relations`
--

DROP TABLE IF EXISTS `donors_category_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors_category_relations` (
  `id_donor` int(11) NOT NULL,
  `id_donor_category` int(11) NOT NULL,
  `id_adverto_category` int(11) DEFAULT NULL,
  UNIQUE KEY `id_donor` (`id_donor`,`id_donor_category`,`id_adverto_category`),
  KEY `donors_category_relations_ibfk_1` (`id_adverto_category`),
  CONSTRAINT `donors_category_relations_ibfk_1` FOREIGN KEY (`id_adverto_category`) REFERENCES `adv_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors_category_words_phrases`
--

DROP TABLE IF EXISTS `donors_category_words_phrases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors_category_words_phrases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donor` int(11) NOT NULL,
  `id_donor_category` int(11) NOT NULL,
  `id_adverto_category` int(11) NOT NULL,
  `word` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_donor` (`id_donor`,`id_donor_category`,`word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors_fields`
--

DROP TABLE IF EXISTS `donors_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donor` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_field_donor` int(11) NOT NULL,
  `field_type` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=388 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `donors_fields_tags_list`
--

DROP TABLE IF EXISTS `donors_fields_tags_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donors_fields_tags_list` (
  `id_field` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `id_field` (`id_field`) USING BTREE,
  CONSTRAINT `donors_fields_tags_list_ibfk_1` FOREIGN KEY (`id_field`) REFERENCES `donors_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fos_user_group`
--

DROP TABLE IF EXISTS `fos_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fos_user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(180) NOT NULL,
  `roles` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_583d1f3e5e237e06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fos_user_locales`
--

DROP TABLE IF EXISTS `fos_user_locales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fos_user_locales` (
  `user_id` int(10) unsigned NOT NULL,
  `lang_id` smallint(2) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`lang_id`),
  KEY `fos_user_locales_c2` (`lang_id`),
  CONSTRAINT `fos_user_locales_c1` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fos_user_locales_c2` FOREIGN KEY (`lang_id`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fos_user_user`
--

DROP TABLE IF EXISTS `fos_user_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fos_user_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `username_canonical` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `email_canonical` varchar(180) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `website` varchar(64) DEFAULT NULL,
  `biography` varchar(1000) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `locale` varchar(8) DEFAULT NULL,
  `timezone` varchar(64) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `facebook_uid` varchar(255) DEFAULT NULL,
  `facebook_name` varchar(255) DEFAULT NULL,
  `facebook_data` text DEFAULT NULL,
  `twitter_uid` varchar(255) DEFAULT NULL,
  `twitter_name` varchar(255) DEFAULT NULL,
  `twitter_data` text DEFAULT NULL,
  `gplus_uid` varchar(255) DEFAULT NULL,
  `gplus_name` varchar(255) DEFAULT NULL,
  `gplus_data` text DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `two_step_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_c560d76192fc23a8` (`username_canonical`),
  UNIQUE KEY `uniq_c560d761a0d96fbf` (`email_canonical`),
  UNIQUE KEY `uniq_c560d761c05fb297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fos_user_user_group`
--

DROP TABLE IF EXISTS `fos_user_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `idx_b3c77447a76ed395` (`user_id`),
  KEY `idx_b3c77447fe54d947` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `goose_db_version`
--

DROP TABLE IF EXISTS `goose_db_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goose_db_version` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version_id` bigint(20) NOT NULL,
  `is_applied` tinyint(1) NOT NULL,
  `tstamp` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `integration_adverts_foreign`
--

DROP TABLE IF EXISTS `integration_adverts_foreign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integration_adverts_foreign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `integration_id` smallint(5) unsigned NOT NULL COMMENT 'У каждого партнера свой ID интеграции, прописанный в коде',
  `agent_adv_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID объявления на стороне партнера (бывают текстовые)',
  `adverto_adv_hash` varchar(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tech_comment` varchar(510) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]',
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_integration_adverts_foreign_agent` (`integration_id`,`agent_adv_id`),
  UNIQUE KEY `UNQ_integration_adverts_foreign_advert` (`adverto_adv_hash`),
  CONSTRAINT `adverto_adv_id_fk_hash` FOREIGN KEY (`adverto_adv_hash`) REFERENCES `adv_adverts` (`hash`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `photos` CHECK (json_valid(`photos`))
) ENGINE=InnoDB AUTO_INCREMENT=2116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица для хранения информации об импортированных объявлениях';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `integration_adverts_setting`
--

DROP TABLE IF EXISTS `integration_adverts_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integration_adverts_setting` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `integration_id` smallint(5) unsigned NOT NULL COMMENT 'У каждого партнера свой ID интеграции, прописанный в коде',
  `user_id` int(11) NOT NULL,
  `lang_id` smallint(6) NOT NULL,
  `data_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_integration_adverts_setting_integration` (`integration_id`),
  KEY `integrations_as_fk_user` (`user_id`),
  KEY `integrations_as_fk_lang` (`lang_id`),
  CONSTRAINT `integrations_as_fk_lang` FOREIGN KEY (`lang_id`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `integrations_as_fk_user` FOREIGN KEY (`user_id`) REFERENCES `adv_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Настройки интеграций';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `integration_field_relation`
--

DROP TABLE IF EXISTS `integration_field_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integration_field_relation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `integration_id` smallint(5) unsigned NOT NULL,
  `field_id` int(11) NOT NULL,
  `multiselect_id` int(11) DEFAULT NULL,
  `related_field` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название поля в файле интеграции',
  `related_value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Значение поля в файле интеграции, для multiselect_id',
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `integrations_fir_fk_field` (`field_id`),
  KEY `integrations_fir_fk_multiselect` (`multiselect_id`),
  CONSTRAINT `integrations_fir_fk_field` FOREIGN KEY (`field_id`) REFERENCES `adv_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `integrations_fir_fk_multiselect` FOREIGN KEY (`multiselect_id`) REFERENCES `adv_fields_multiselect_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Fields items to integration parameter';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `integration_region_info_1`
--

DROP TABLE IF EXISTS `integration_region_info_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integration_region_info_1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` smallint(5) unsigned NOT NULL,
  `latitude_big` decimal(11,8) DEFAULT NULL,
  `longitude_big` decimal(11,8) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `latitude_small` decimal(11,8) DEFAULT NULL,
  `longitude_small` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_city_id` (`city_id`),
  KEY `idx_district_id` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1269 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_adv_words_shit_translate`
--

DROP TABLE IF EXISTS `mt_adv_words_shit_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_adv_words_shit_translate` (
  `code` varchar(100) NOT NULL,
  `id_lang` int(2) NOT NULL,
  `text` text NOT NULL,
  `id_tab` int(2) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `code_2` (`code`,`id_lang`,`id_tab`),
  KEY `id_lang` (`id_lang`),
  KEY `id_tab` (`id_tab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_adv_words_shit_translate_copy`
--

DROP TABLE IF EXISTS `mt_adv_words_shit_translate_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_adv_words_shit_translate_copy` (
  `code` varchar(100) NOT NULL,
  `id_lang` int(2) NOT NULL,
  `text` text NOT NULL,
  `id_tab` int(2) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `code_2` (`code`,`id_lang`,`id_tab`),
  KEY `id_lang` (`id_lang`),
  KEY `id_tab` (`id_tab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_category_shit_translate`
--

DROP TABLE IF EXISTS `mt_category_shit_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_category_shit_translate` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_category_shit_translate_copy`
--

DROP TABLE IF EXISTS `mt_category_shit_translate_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_category_shit_translate_copy` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_fields_shit_translate`
--

DROP TABLE IF EXISTS `mt_fields_shit_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_fields_shit_translate` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_fields_shit_translate_copy`
--

DROP TABLE IF EXISTS `mt_fields_shit_translate_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_fields_shit_translate_copy` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_opt_fields_shit_translate`
--

DROP TABLE IF EXISTS `mt_opt_fields_shit_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_opt_fields_shit_translate` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_opt_fields_shit_translate_copy`
--

DROP TABLE IF EXISTS `mt_opt_fields_shit_translate_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_opt_fields_shit_translate_copy` (
  `id` int(11) NOT NULL,
  `id_lang` smallint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_shit` int(1) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_disabled` int(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  UNIQUE KEY `id` (`id`,`id_lang`),
  KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mt_tr_stop_words`
--

DROP TABLE IF EXISTS `mt_tr_stop_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_tr_stop_words` (
  `id_lang` smallint(2) NOT NULL,
  `word` varchar(100) NOT NULL,
  UNIQUE KEY `id_lang` (`id_lang`,`word`),
  KEY `word` (`word`),
  CONSTRAINT `mt_tr_stop_words_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `adv_langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-04 23:05:05
