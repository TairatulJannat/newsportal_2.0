-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: newsportal
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_vertical_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_horizontal_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'খেলাধুলা','Sports','kheladhula','sports','1',NULL,'2021-10-24 22:25:44'),(3,'সারা দেশ','All','sara-des','all','1','2021-10-24 21:52:22','2021-10-26 23:59:09'),(4,'রাজনীতি','Politics','rajneeti','politics','1','2021-10-24 22:59:35','2021-10-26 22:40:06');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_id` bigint(20) unsigned NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_posts_blog_category_id_foreign` (`blog_category_id`),
  CONSTRAINT `blog_posts_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (13,'691 Awami League \'rebels\' in polls','নির্বাচনে আ.লীগের ৬৯১ ‘বিদ্রোহী’',4,'691-awami-league-rebels-in-polls','nirwacne-aleeger-691-bidrohee','<p>দ্বিতীয় ধাপে সারা দেশে ৮৪৮টি ইউনিয়ন পরিষদ (ইউপি) নির্বাচনে আওয়ামী লীগের ৯৪৬ জন &lsquo;বিদ্রোহী&rsquo; প্রার্থী মনোনয়নপত্র জমা দিয়েছিলেন। গতকাল মঙ্গলবার মনোনয়নপত্র প্রত্যাহারের শেষ দিন মাত্র ২৫৫ জন মনোনয়ন প্রত্যাহার করেছেন। বাকি ৬৯১ জন বিদ্রোহীই নির্বাচনে রয়ে গেলেন। অর্থাৎ বিদ্রোহী প্রার্থীদের ৭৩ শতাংশই নির্বাচনী লড়াইয়ে আছেন।</p>\r\n\r\n<p>আর প্রতিদ্বন্দ্বী কোনো প্রার্থী না থাকায় ও বিদ্রোহী প্রার্থীরা মনোনয়নপত্র প্রত্যাহার করে নেওয়ায় ১৯ জেলায় আওয়ামী লীগ মনোনীত ৭৬ জন চেয়ারম্যান পদপ্রার্থী বিনা প্রতিদ্বন্দ্বিতায় নির্বাচিত হতে যাচ্ছেন।</p>\r\n\r\n<p>বিএনপি দলীয়ভাবে ইউপি নির্বাচনে অংশ না নিলেও দলটির ৩১১ জন নেতা-কর্মী স্বতন্ত্র হিসেবে নির্বাচনের মাঠে আছেন। আর নির্বাচনী লড়াইয়ে জাতীয় পার্টির প্রার্থী আছেন ১০১ জন। ইউপি নির্বাচনে সংশ্লিষ্ট রিটার্নিং কর্মকর্তাদের কাছ থেকে গতকাল <em>প্রথম আলো</em>র প্রতিনিধিরা এই তথ্য পেয়েছেন।</p>\r\n\r\n<p>বিজ্ঞাপন</p>\r\n\r\n<p>দ্বিতীয় ধাপে ৮৪৮টি ইউপির প্রায় সব কটিতে চেয়ারম্যান পদে আওয়ামী লীগ থেকে দলীয় মনোনয়ন দেওয়া হয়েছে। এর বাইরে দলের সিদ্ধান্ত অমান্য করে আওয়ামী লীগের অনেক নেতা-কর্মী চেয়ারম্যান পদে মনোনয়নপত্র জমা দিয়েছেন। তাঁরা স্বতন্ত্র হিসেবে মনোনয়নপত্র দাখিল করলেও মূলত আওয়ামী লীগ মনোনীত প্রার্থীর বিপরীতে বিদ্রোহী প্রার্থীর ভূমিকায় আছেন। এই বিদ্রোহী প্রার্থীদের মধ্যে ক্ষমতাসীন দলের কয়েকজন সাংসদের স্বজন গতকাল পর্যন্ত মনোনয়ন প্রত্যাহার করেননি। আবার জেলা ও উপজেলা পর্যায়ে আওয়ামী লীগের কমিটিতে থাকা নেতাদের অনেকে বিদ্রোহী হিসেবে এখনো নির্বাচন করছেন।</p>\r\n\r\n<p>নির্বাচন কমিশন সূত্রে জানা গেছে, আগামী ১১ নভেম্বর দ্বিতীয় ধাপের ইউপি নির্বাচন হতে যাচ্ছে। ১৭ অক্টোবর ছিল মনোনয়নপত্র দাখিলের শেষ দিন। মনোনয়নপত্র প্রত্যাহারের শেষ দিন ছিল গতকাল ২৬ অক্টোবর, প্রতীক বরাদ্দ হবে আজ ২৭ অক্টোবর। প্রথম ধাপে স্থগিত থাকা ১৬০টি ইউপিতে ভোট হয় গত ২০ সেপ্টেম্বর। প্রথম ধাপের ওই নির্বাচনে ১১৯টিতে জয়ী হয়েছেন আওয়ামী লীগ মনোনীত প্রার্থীরা।</p>','<p>দ্বিতীয় ধাপে সারা দেশে ৮৪৮টি ইউনিয়ন পরিষদ (ইউপি) নির্বাচনে আওয়ামী লীগের ৯৪৬ জন &lsquo;বিদ্রোহী&rsquo; প্রার্থী মনোনয়নপত্র জমা দিয়েছিলেন। গতকাল মঙ্গলবার মনোনয়নপত্র প্রত্যাহারের শেষ দিন মাত্র ২৫৫ জন মনোনয়ন প্রত্যাহার করেছেন। বাকি ৬৯১ জন বিদ্রোহীই নির্বাচনে রয়ে গেলেন। অর্থাৎ বিদ্রোহী প্রার্থীদের ৭৩ শতাংশই নির্বাচনী লড়াইয়ে আছেন।</p>\r\n\r\n<p>আর প্রতিদ্বন্দ্বী কোনো প্রার্থী না থাকায় ও বিদ্রোহী প্রার্থীরা মনোনয়নপত্র প্রত্যাহার করে নেওয়ায় ১৯ জেলায় আওয়ামী লীগ মনোনীত ৭৬ জন চেয়ারম্যান পদপ্রার্থী বিনা প্রতিদ্বন্দ্বিতায় নির্বাচিত হতে যাচ্ছেন।</p>\r\n\r\n<p>বিএনপি দলীয়ভাবে ইউপি নির্বাচনে অংশ না নিলেও দলটির ৩১১ জন নেতা-কর্মী স্বতন্ত্র হিসেবে নির্বাচনের মাঠে আছেন। আর নির্বাচনী লড়াইয়ে জাতীয় পার্টির প্রার্থী আছেন ১০১ জন। ইউপি নির্বাচনে সংশ্লিষ্ট রিটার্নিং কর্মকর্তাদের কাছ থেকে গতকাল <em>প্রথম আলো</em>র প্রতিনিধিরা এই তথ্য পেয়েছেন।</p>\r\n\r\n<p>বিজ্ঞাপন</p>\r\n\r\n<p>দ্বিতীয় ধাপে ৮৪৮টি ইউপির প্রায় সব কটিতে চেয়ারম্যান পদে আওয়ামী লীগ থেকে দলীয় মনোনয়ন দেওয়া হয়েছে। এর বাইরে দলের সিদ্ধান্ত অমান্য করে আওয়ামী লীগের অনেক নেতা-কর্মী চেয়ারম্যান পদে মনোনয়নপত্র জমা দিয়েছেন। তাঁরা স্বতন্ত্র হিসেবে মনোনয়নপত্র দাখিল করলেও মূলত আওয়ামী লীগ মনোনীত প্রার্থীর বিপরীতে বিদ্রোহী প্রার্থীর ভূমিকায় আছেন। এই বিদ্রোহী প্রার্থীদের মধ্যে ক্ষমতাসীন দলের কয়েকজন সাংসদের স্বজন গতকাল পর্যন্ত মনোনয়ন প্রত্যাহার করেননি। আবার জেলা ও উপজেলা পর্যায়ে আওয়ামী লীগের কমিটিতে থাকা নেতাদের অনেকে বিদ্রোহী হিসেবে এখনো নির্বাচন করছেন।</p>\r\n\r\n<p>নির্বাচন কমিশন সূত্রে জানা গেছে, আগামী ১১ নভেম্বর দ্বিতীয় ধাপের ইউপি নির্বাচন হতে যাচ্ছে। ১৭ অক্টোবর ছিল মনোনয়নপত্র দাখিলের শেষ দিন। মনোনয়নপত্র প্রত্যাহারের শেষ দিন ছিল গতকাল ২৬ অক্টোবর, প্রতীক বরাদ্দ হবে আজ ২৭ অক্টোবর। প্রথম ধাপে স্থগিত থাকা ১৬০টি ইউপিতে ভোট হয় গত ২০ সেপ্টেম্বর। প্রথম ধাপের ওই নির্বাচনে ১১৯টিতে জয়ী হয়েছেন আওয়ামী লীগ মনোনীত প্রার্থীরা।</p>','public/uploads/blog/image/1714752539894631.jpg','ইউপি নির্বাচন,রাজনীতি','Politics, UP election','2021-10-27 00:17:36','2021-10-30 23:02:53'),(14,'The main accused in the murder case of college student Ariful has been arrested in Sylhet','সিলেটে কলেজছাত্র আরিফুল হত্যা মামলার প্রধান আসামি গ্রেপ্তার',4,'the-main-accused-in-the-murder-case-of-college-student-ariful-has-been-arrested-in-sylhet','silete-klejchatr-ariful-htza-mamlar-prdhan-asami-greptar','<p>সিলেটের দক্ষিণ সুরমা সরকারি কলেজের শিক্ষার্থী আরিফুল ইসলাম (১৮) হত্যা মামলার প্রধান আসামিকে কুষ্টিয়া থেকে গ্রেপ্তার করেছে পুলিশের অপরাধ তদন্ত বিভাগ (সিআইডি)। গতকাল মঙ্গলবার দুপুরে তাঁকে কুষ্টিয়ার দৌলতপুরের ফিলিপনগর এলাকা থেকে গ্রেপ্তার করা হয়।</p>\r\n\r\n<p>আজ বুধবার সকালে সিলেট মহানগর পুলিশের অতিরিক্ত উপকমিশনার (গণমাধ্যম) বি এম আশরাফ উল্যাহ প্রথম আলোকে বিষয়টি নিশ্চিত করেছেন।</p>\r\n\r\n<p>বিজ্ঞাপন</p>\r\n\r\n<p>গ্রেপ্তার ওই তরুণের নাম শামসুদ্দোহা সাদী (২০)। তিনি দক্ষিণ সুরমা উপজেলার সিলাম টিকরপাড়া এলাকার মোবারক হোসেনের ছেলে।</p>\r\n\r\n<p>আশরাফ উল্যাহ বলেন, &lsquo;কলেজছাত্র আরিফুল হত্যা মামলার মূল আসামি শামসুদ্দোহাকে কুষ্টিয়া থেকে সিআইডি গ্রেপ্তার করেছে এমন তথ্য আমরা পেয়েছি।&rsquo;</p>','<p>সিলেটের দক্ষিণ সুরমা সরকারি কলেজের শিক্ষার্থী আরিফুল ইসলাম (১৮) হত্যা মামলার প্রধান আসামিকে কুষ্টিয়া থেকে গ্রেপ্তার করেছে পুলিশের অপরাধ তদন্ত বিভাগ (সিআইডি)। গতকাল মঙ্গলবার দুপুরে তাঁকে কুষ্টিয়ার দৌলতপুরের ফিলিপনগর এলাকা থেকে গ্রেপ্তার করা হয়।</p>\r\n\r\n<p>আজ বুধবার সকালে সিলেট মহানগর পুলিশের অতিরিক্ত উপকমিশনার (গণমাধ্যম) বি এম আশরাফ উল্যাহ প্রথম আলোকে বিষয়টি নিশ্চিত করেছেন।</p>\r\n\r\n<p>বিজ্ঞাপন</p>\r\n\r\n<p>গ্রেপ্তার ওই তরুণের নাম শামসুদ্দোহা সাদী (২০)। তিনি দক্ষিণ সুরমা উপজেলার সিলাম টিকরপাড়া এলাকার মোবারক হোসেনের ছেলে।</p>\r\n\r\n<p>আশরাফ উল্যাহ বলেন, &lsquo;কলেজছাত্র আরিফুল হত্যা মামলার মূল আসামি শামসুদ্দোহাকে কুষ্টিয়া থেকে সিআইডি গ্রেপ্তার করেছে এমন তথ্য আমরা পেয়েছি।&rsquo;</p>','public/uploads/blog/image/1714753105245021.jpg','সিলেট, হত্যা,মামলা,গ্রেপ্তার','Sylhet,case, murder, Arrest','2021-10-27 00:26:35','2021-10-30 23:03:13'),(15,'Bangladesh\'s eyes are on \'opportunity\' in \'first fight\' against England','ইংল্যান্ডের বিপক্ষে ‘প্রথম লড়াইয়ে’ ‘সুযোগে’ চোখ বাংলাদেশের',1,'bangladeshs-eyes-are-on-opportunity-in-first-fight-against-england','inglzander-bipkshe-prthm-lraye-suzoge-cokh-bangladeser','<p>আইপিএলে মোস্তাফিজুর রহমানের সতীর্থ জস বাটলার আর বেন স্টোকস। কলকাতা নাইট রাইডার্সে সাকিব আল হাসান খেলেন এউইন মরগানের সঙ্গে। অন্যান্য টি-টোয়েন্টি ফ্র্যাঞ্চাইজি লিগে বাংলাদেশ ও ইংল্যান্ডের তারকা ক্রিকেটাররা একই দলে কিংবা একে অন্যের বিপক্ষে অনেকবারই মাঠে নেমেছেন। কিন্তু আন্তর্জাতিক টি-টোয়েন্টিতে আজই প্রথম মুখোমুখি হচ্ছে ইংল্যান্ড ও বাংলাদেশ।</p>\r\n\r\n<p>২০০৬ সালে প্রথমবারের মতো জিম্বাবুয়ের বিপক্ষে ২০ ওভারের ক্রিকেট খেলেছিল বাংলাদেশ। এরপর আরও ১১৪টি ম্যাচ খেলে ফেললেও কেন যেন ইংল্যান্ডের বিপক্ষে কখনোই খেলা পড়েনি বাংলাদেশের। এমনিতেই ইংল্যান্ডের বিপক্ষে খুব বেশি দ্বিপক্ষীয় সিরিজ খেলা হয় না বাংলাদেশের। কিন্তু টি-টোয়েন্টির বৈশ্বিক আসরেও কখনোই ২০ ওভারের ম্যাচে মুখোমুখি হয়নি এ দুই দল।</p>','<p>আইপিএলে মোস্তাফিজুর রহমানের সতীর্থ জস বাটলার আর বেন স্টোকস। কলকাতা নাইট রাইডার্সে সাকিব আল হাসান খেলেন এউইন মরগানের সঙ্গে। অন্যান্য টি-টোয়েন্টি ফ্র্যাঞ্চাইজি লিগে বাংলাদেশ ও ইংল্যান্ডের তারকা ক্রিকেটাররা একই দলে কিংবা একে অন্যের বিপক্ষে অনেকবারই মাঠে নেমেছেন। কিন্তু আন্তর্জাতিক টি-টোয়েন্টিতে আজই প্রথম মুখোমুখি হচ্ছে ইংল্যান্ড ও বাংলাদেশ।</p>\r\n\r\n<p>২০০৬ সালে প্রথমবারের মতো জিম্বাবুয়ের বিপক্ষে ২০ ওভারের ক্রিকেট খেলেছিল বাংলাদেশ। এরপর আরও ১১৪টি ম্যাচ খেলে ফেললেও কেন যেন ইংল্যান্ডের বিপক্ষে কখনোই খেলা পড়েনি বাংলাদেশের। এমনিতেই ইংল্যান্ডের বিপক্ষে খুব বেশি দ্বিপক্ষীয় সিরিজ খেলা হয় না বাংলাদেশের। কিন্তু টি-টোয়েন্টির বৈশ্বিক আসরেও কখনোই ২০ ওভারের ম্যাচে মুখোমুখি হয়নি এ দুই দল।</p>','public/uploads/blog/image/1714753593855861.jpg','খেলা ডেস্ক,খেলাক্রিকেটটি ২০ ,বিশ্বকাপ ,২০২১বাংলাদেশ ক্রিকেট দলইংল্যান্ড ক্রিকেট দল','The game is Cricket 20 ,World Cup 2021,Bangladesh Cricket Team England Cricket Team','2021-10-27 00:34:21','2021-10-30 23:10:50'),(16,'Hope for a new beginning in their own day','নতুন শুরুতে ‘নিজেদের দিনে’র আশা',1,'hope-for-a-new-beginning-in-their-own-day','ntun-surute-nijeder-diner-asa','<p>ওমান, সংযুক্ত আরব আমিরাত মিলিয়ে <a href=\"https://www.prothomalo.com/topic/%E0%A6%9F%E0%A6%BF-%E0%A6%9F%E0%A7%8B%E0%A7%9F%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%9F%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%95%E0%A6%BE%E0%A6%AA\" target=\"_blank\">টি-টোয়েন্টি বিশ্বকাপে</a> এখন পর্যন্ত বাংলাদেশ দল ম্যাচ খেলেছে চারটি। এর তিনটিই মাসকাটে প্রথম পর্বে। শ্রীলঙ্কার বিপক্ষে সুপার টুয়েলভের অন্য ম্যাচটি হয়েছে শারজায়।</p>\r\n\r\n<p>এই চার ম্যাচের পারফরম্যান্সের যোগফলটাকে বাংলাদেশ দলের জন্য মোটেও সন্তোষজনক বলা যাচ্ছে না। স্কটল্যান্ডের কাছে হার দিয়ে বিশ্বকাপ শুরুর পর ওমান ও পাপুয়া নিউগিনির বিপক্ষে প্রত্যাশিত জয়। কিন্তু শারজায় এসে শ্রীলঙ্কার কাছে জয়ের সম্ভাবনা জাগিয়েও হেরে যাওয়ার পর আজ ইংল্যান্ডের বিপক্ষে সুপার টুয়েলভ পর্বটা নতুন করে শুরু করতে যাচ্ছে বাংলাদেশ দল।</p>','<p>ওমান, সংযুক্ত আরব আমিরাত মিলিয়ে <a href=\"https://www.prothomalo.com/topic/%E0%A6%9F%E0%A6%BF-%E0%A6%9F%E0%A7%8B%E0%A7%9F%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%9F%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%95%E0%A6%BE%E0%A6%AA\" target=\"_blank\">টি-টোয়েন্টি বিশ্বকাপে</a> এখন পর্যন্ত বাংলাদেশ দল ম্যাচ খেলেছে চারটি। এর তিনটিই মাসকাটে প্রথম পর্বে। শ্রীলঙ্কার বিপক্ষে সুপার টুয়েলভের অন্য ম্যাচটি হয়েছে শারজায়।</p>\r\n\r\n<p>এই চার ম্যাচের পারফরম্যান্সের যোগফলটাকে বাংলাদেশ দলের জন্য মোটেও সন্তোষজনক বলা যাচ্ছে না। স্কটল্যান্ডের কাছে হার দিয়ে বিশ্বকাপ শুরুর পর ওমান ও পাপুয়া নিউগিনির বিপক্ষে প্রত্যাশিত জয়। কিন্তু শারজায় এসে শ্রীলঙ্কার কাছে জয়ের সম্ভাবনা জাগিয়েও হেরে যাওয়ার পর আজ ইংল্যান্ডের বিপক্ষে সুপার টুয়েলভ পর্বটা নতুন করে শুরু করতে যাচ্ছে বাংলাদেশ দল।</p>','public/uploads/blog/image/1714753849977010.jpg','ইংল্যান্ডের মুখোমুখি বাংলাদেশ','Bangladesh face England','2021-10-27 00:38:25','2021-10-30 23:11:01'),(17,'Saifuddin\'s World Cup is over','সাইফউদ্দিনের বিশ্বকাপ শেষ',1,'saifuddins-world-cup-is-over','saifuddiner-biswkap-sesh','<p><a href=\"https://www.prothomalo.com/topic/%E0%A6%9F%E0%A6%BF-%E0%A6%9F%E0%A7%8B%E0%A7%9F%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%9F%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%95%E0%A6%BE%E0%A6%AA\" target=\"_blank\">টি&ndash;টোয়েন্টি বিশ্বকাপটা</a> একেবারে খারাপ যাচ্ছিল না মোহাম্মদ সাইফউদ্দিনের। ওমানে প্রথম পর্ব থেকে শুরু করে শ্রীলঙ্কার বিপক্ষে <a href=\"https://www.prothomalo.com/event/t20worldcup/fixtures.html\" target=\"_blank\">সুপার টুয়েলভের প্রথম ম্যাচ</a>&mdash; উইকেট পেয়েছেন সব ম্যাচেই।</p>\r\n\r\n<p>কিন্তু দূর্ভাগ্য সাইফউদ্দিনের&mdash;পিঠের চোটে পড়ে মাঝপথেই শেষ হয়ে গেল তাঁর বিশ্বকাপ।</p>\r\n\r\n<p>বিজ্ঞাপন</p>\r\n\r\n<p>মঙ্গলবার রাতে আন্তর্জাতিক ক্রিকেট কাউন্সিল (আইসিসি) এক সংবাদ বিজ্ঞপ্তিতে জানিয়েছে এই খবর। সাইফউদ্দিনের পরিবর্তে বিশ্বকাপের দলে অন্তর্ভুক্ত করা হয়েছে দলের সঙ্গেই রিজার্ভ খেলোয়াড় হিসেবে থাকা অভিজ্ঞ রুবেল হোসেনকে।</p>','<p><a href=\"https://www.prothomalo.com/topic/%E0%A6%9F%E0%A6%BF-%E0%A6%9F%E0%A7%8B%E0%A7%9F%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%9F%E0%A6%BF-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%95%E0%A6%BE%E0%A6%AA\" target=\"_blank\">টি&ndash;টোয়েন্টি বিশ্বকাপটা</a> একেবারে খারাপ যাচ্ছিল না মোহাম্মদ সাইফউদ্দিনের। ওমানে প্রথম পর্ব থেকে শুরু করে শ্রীলঙ্কার বিপক্ষে <a href=\"https://www.prothomalo.com/event/t20worldcup/fixtures.html\" target=\"_blank\">সুপার টুয়েলভের প্রথম ম্যাচ</a>&mdash; উইকেট পেয়েছেন সব ম্যাচেই।</p>\r\n\r\n<p>কিন্তু দূর্ভাগ্য সাইফউদ্দিনের&mdash;পিঠের চোটে পড়ে মাঝপথেই শেষ হয়ে গেল তাঁর বিশ্বকাপ।</p>\r\n\r\n<p>বিজ্ঞাপন</p>\r\n\r\n<p>মঙ্গলবার রাতে আন্তর্জাতিক ক্রিকেট কাউন্সিল (আইসিসি) এক সংবাদ বিজ্ঞপ্তিতে জানিয়েছে এই খবর। সাইফউদ্দিনের পরিবর্তে বিশ্বকাপের দলে অন্তর্ভুক্ত করা হয়েছে দলের সঙ্গেই রিজার্ভ খেলোয়াড় হিসেবে থাকা অভিজ্ঞ রুবেল হোসেনকে।</p>','public/uploads/blog/image/1714754198368662.jpg','ক্রিকেট, বিশ্বকাপ টি২০,বাংলাদেশ','cricket,WorldcupT20,Bangladesh','2021-10-27 00:43:58','2021-10-30 23:11:12');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_on_header` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (4,'বাংলাদেশ','Bangladesh','bangladesh','1','banglades',1,'2021-10-25 16:18:26','2021-10-25 16:18:26'),(5,'দেশজুড়ে','CountryWide','countrywide','1','desjude',1,'2021-10-25 16:20:17','2021-10-25 16:20:17'),(6,'আন্তর্জাতিক','International','international','1','antrjatik',1,'2021-10-25 16:20:55','2021-10-25 16:20:55'),(7,'খেলাধুলা','Sports','sports','1','kheladhula',1,'2021-10-25 16:21:31','2021-10-25 16:21:31'),(8,'বিনোদন','Entertainment','entertainment','1','binodn',1,'2021-10-25 16:22:05','2021-10-25 16:22:05'),(9,'ফিচার','Feature','feature','1','ficar',1,'2021-10-25 16:22:57','2021-10-25 16:22:57');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `covid_tackers`
--

DROP TABLE IF EXISTS `covid_tackers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `covid_tackers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `covid_tackers`
--

LOCK TABLES `covid_tackers` WRITE;
/*!40000 ALTER TABLE `covid_tackers` DISABLE KEYS */;
/*!40000 ALTER TABLE `covid_tackers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `district_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_division_id_foreign` (`division_id`),
  CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (8,'গাজীপুর','Gazipur','gajeepur','gazipur',4,'2021-10-31 19:39:07','2021-10-31 21:31:29'),(9,'টাঙ্গাইল','Tangail','tangoail','tangail',4,'2021-10-31 19:42:54','2021-10-31 21:36:28'),(10,'নরসিংদী','Narsingdi','nrsingdee','narsingdi',4,'2021-10-31 19:43:43','2021-10-31 21:37:19'),(11,'ফেনী','Feni','fenee','feni',5,'2021-10-31 19:47:57','2021-10-31 21:40:06'),(12,'কক্সবাজার','Cox\'sBazar','kks-bajar','coxs-bazar',5,'2021-10-31 19:51:02','2021-10-31 21:41:09'),(13,'নাটোর','Natore','nator','natore',6,'2021-10-31 20:03:55','2021-10-31 20:03:55'),(14,'পাবনা','Pabna','pabna','pabna',6,'2021-10-31 20:05:43','2021-10-31 20:05:43'),(15,'নেত্রকোণা','Netrokona','netrkona','netrokona',7,'2021-10-31 20:12:36','2021-10-31 20:12:36'),(16,'জামালপুর','Jamalpur','jamalpur','jamalpur',7,'2021-10-31 20:13:31','2021-10-31 20:13:31'),(17,'দিনাজপুর','Dinajpur','dinajpur','dinajpur',8,'2021-10-31 21:06:27','2021-10-31 21:06:27'),(18,'কুরিগ্রাম','Kurigram','kurigram','kurigram',8,'2021-10-31 21:07:36','2021-10-31 21:07:36'),(19,'বাঘেরহাট','Bagerhat','bagherhat','bagerhat',9,'2021-10-31 21:09:19','2021-10-31 21:09:19'),(20,'যশোর','Jashore','zsor','jashore',9,'2021-10-31 21:14:00','2021-10-31 21:14:00'),(21,'হাবিবগঞ্জ','Habiganj','habibgnj','habiganj',10,'2021-10-31 21:19:03','2021-10-31 21:19:03'),(22,'মৌলবীবাজার','Moulvibazar','moulbeebajar','moulvibazar',10,'2021-10-31 21:19:51','2021-10-31 21:19:51'),(23,'ভোলা','Bhola','vola','bhola',11,'2021-10-31 21:24:57','2021-10-31 21:24:57'),(24,'পটুয়াখালী','Patuakhali','ptuyakhalee','patuakhali',11,'2021-10-31 21:25:45','2021-10-31 21:25:45');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `division_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (4,'ঢাকা','Dhaka','1','dhaka','dhaka','2021-10-31 04:51:28','2021-10-31 04:51:28'),(5,'চট্টগ্রাম','Chittagong','2','cttgram','chittagong','2021-10-31 04:51:53','2021-10-31 22:27:26'),(6,'রাজশাহী','Rajshahi','3','rajsahee','rajshahi','2021-10-31 04:52:26','2021-10-31 04:52:26'),(7,'ময়মনসিংহ','Mymensingh','4','mzmnsingh','mymensingh','2021-10-31 05:05:47','2021-10-31 22:25:07'),(8,'রংপুর','Rangpur','5','rngpur','rangpur','2021-10-31 05:06:21','2021-10-31 05:06:21'),(9,'খুলনা','Khulna','6','khulna','khulna','2021-10-31 05:09:26','2021-10-31 05:09:26'),(10,'সিলেট','Sylhet','7','silet','sylhet','2021-10-31 05:10:05','2021-10-31 22:24:48'),(11,'বরিশাল','Borishal',NULL,'brisal','borishal','2021-10-31 22:26:57','2021-10-31 22:26:57');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_settings_backends`
--

DROP TABLE IF EXISTS `general_settings_backends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_settings_backends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings_backends`
--

LOCK TABLES `general_settings_backends` WRITE;
/*!40000 ALTER TABLE `general_settings_backends` DISABLE KEYS */;
INSERT INTO `general_settings_backends` VALUES (5,'The Voice','Newsportal','public/uploads/backend/admin/icon/1714205218611115.jpg','public/uploads/backend/admin/logo/1714205218602180.png','2021-10-20 23:18:10','2021-10-20 23:18:10'),(6,'The Voice 24','News','public/uploads/backend/admin/icon/1714216660947335.png','public/uploads/backend/admin/logo/1714218319674166.jpg','2021-10-21 02:13:36','2021-10-26 22:35:07');
/*!40000 ALTER TABLE `general_settings_backends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_settings_frontends`
--

DROP TABLE IF EXISTS `general_settings_frontends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_settings_frontends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fontend_header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings_frontends`
--

LOCK TABLES `general_settings_frontends` WRITE;
/*!40000 ALTER TABLE `general_settings_frontends` DISABLE KEYS */;
INSERT INTO `general_settings_frontends` VALUES (1,'The Voice','Newsportal','public/uploads/backend/header/icon/1714746374624276.png','public/uploads/backend/header/logo/1714227469685470.png','public/uploads/backend/footer/logo/1714226983178075.png','Jaime Barnes','Xena Dillard','Amber Patton','+1 (798) 341-3677','vydydafyty@mailinator.com','Ut explicabo Volupt','<p>ভারতের মাদকদ্রব্য নিয়ন্ত্রণ ব্যুরো (এনসিবি) আগেই ইঙ্গিত দিয়েছিল, মাদকসংক্রান্ত বিষয়ে এক উঠতি নায়িকার সঙ্গে বলিউড তারকা শাহরুখ খানের ছেলে আরিয়ানের কথাবার্তা হয়েছে। আর এর মধ্যেই এনসিবির কর্মকর্তারা আজ অনন্যা পান্ডের বাড়িতে তল্লাশি চালাল।efwf</p>','2021-10-21 05:04:06','2021-10-26 22:39:36');
/*!40000 ALTER TABLE `general_settings_frontends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_galleries`
--

DROP TABLE IF EXISTS `image_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `original_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_galleries`
--

LOCK TABLES `image_galleries` WRITE;
/*!40000 ALTER TABLE `image_galleries` DISABLE KEYS */;
INSERT INTO `image_galleries` VALUES (1,'public/uploads/backend/ads/1714772034947531.jpg',NULL,'wertgweragerg','34tq34wt','ergersg','reszg','2021-10-27 05:27:28','2021-10-27 05:27:28');
/*!40000 ALTER TABLE `image_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2021_10_12_055444_create_categories_table',1),(6,'2021_10_12_062019_create_sub_categories_table',1),(7,'2021_10_12_112529_create_divisions_table',1),(8,'2021_10_13_043121_create_advertisements_table',1),(9,'2021_10_13_084401_create_districts_table',1),(10,'2021_10_14_042818_create_sub_districts_table',1),(11,'2021_10_15_124648_modify_field_to_categories_table',1),(12,'2021_10_15_125156_add_field_to_categories_table',1),(13,'2021_10_15_145502_modify_field_to_divisions_table',1),(14,'2021_10_15_145722_add_field_to_divisions_table',1),(15,'2021_10_16_184812_modify_field_to_sub_categories_table',1),(16,'2021_10_16_185000_add_field_to_sub_categories_table',1),(17,'2021_10_17_050934_create_image_galleries_table',1),(18,'2021_10_17_054851_create_s_e_o_s_table',1),(19,'2021_10_18_093314_create_general_settings_frontends_table',1),(20,'2021_10_18_093335_create_general_settings_backends_table',1),(21,'2021_10_18_091635_create_video_galleries_table',2),(22,'2021_10_19_060238_create_social_links_table',2),(23,'2021_10_19_061200_modify_field_to_districts_table',2),(24,'2021_10_19_061428_add_field_to_districts_table',2),(25,'2021_10_19_100057_create_page_tables_table',2),(26,'2021_10_19_104215_modify_field_to_sub_districts_table',2),(27,'2021_10_19_104357_add_field_to_sub_districts_table',2),(28,'2021_10_20_111344_create_posts_table',2),(29,'2021_10_21_102240_modify_field_to_general_settings_frontends',3),(30,'2021_10_20_113303_create_reporters_table',4),(31,'2021_10_21_110145_create_covid_tackers_table',4),(32,'2021_10_24_095053_create_blog_categories_table',5),(33,'2021_10_24_095141_create_blog_posts_table',5),(34,'2021_10_24_071047_modify_field_to_posts_table',6),(36,'2021_10_27_052408_modify_column_to_blog_posts_table',7),(37,'2021_10_31_043847_insert_column_to_blog_posts_table',8),(38,'2021_10_31_103637_insert_column_to_divisions_table',9),(39,'2021_11_03_045854_create_on_offs_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `on_offs`
--

DROP TABLE IF EXISTS `on_offs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `on_offs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `live_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `on_offs`
--

LOCK TABLES `on_offs` WRITE;
/*!40000 ALTER TABLE `on_offs` DISABLE KEYS */;
/*!40000 ALTER TABLE `on_offs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_tables`
--

DROP TABLE IF EXISTS `page_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_tables`
--

LOCK TABLES `page_tables` WRITE;
/*!40000 ALTER TABLE `page_tables` DISABLE KEYS */;
INSERT INTO `page_tables` VALUES (1,'dfgerger','rgwerg','<p>geragerg</p>','<p>regerg</p>','2021-10-26 22:37:17','2021-10-26 22:37:17');
/*!40000 ALTER TABLE `page_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `sub_category_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `division_id` bigint(20) unsigned DEFAULT NULL,
  `district_id` bigint(20) unsigned DEFAULT NULL,
  `subdistrict_id` bigint(20) unsigned DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breaking_news` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_select` int(11) DEFAULT NULL,
  `first_section` int(11) DEFAULT NULL,
  `category_first_section` int(11) DEFAULT NULL,
  `subcategory_first_section` int(11) DEFAULT NULL,
  `division_first_section` int(11) DEFAULT NULL,
  `district_first_section` int(11) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `headline` int(11) DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `approve` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_category_id_foreign` (`category_id`),
  KEY `subcategories_sub_cat_id_foreign` (`sub_category_id`),
  KEY `users_user_id_foreign` (`user_id`),
  KEY `divisions_division_id_foreign` (`division_id`),
  KEY `districts_district_id_foreign` (`district_id`),
  KEY `sub_districts_district_id_foreign` (`subdistrict_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,'ssfrwsg','rgeg','ssfrwsg','rgeg','public/uploads/backend/ads/1714744921115245.jpg','<p>wefwef</p>','<p>ergerg</p>','Beijing,ferweg','Beijing,rgerg',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-01',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-26 22:16:30','2021-11-01 00:16:52'),(2,6,NULL,NULL,NULL,NULL,NULL,'ye7fw','yefgwiyf','ye7fw','yefgwiyf',NULL,'<p>wewvif</p>','<p>iwuyefg</p>','Beijing,wyefi','Beijing,iyegfi',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-01',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-26 22:21:45','2021-11-01 00:17:18'),(14,4,5,0,4,8,5,'The temperature may drop further','তাপমাত্রা আরও কমতে পারে','the-temperature-may-drop-further','tapmatra-aroo-kmte-pare','public/uploads/backend/ads/1715116803899025.png','<pre>\r\nWinter is coming, the temperature is slowly decreasing. The meteorological department said the temperature could drop further in the next 24 hours.</pre>','<p>শীতের আগমন ঘটছে, ধীরে ধীরে কমছে তাপমাত্রা। আগামী ২৪ ঘণ্টায় তাপমাত্রা আরও কমে যেতে পারে বলে জানিয়েছে আবহাওয়া অধিদপ্তর।</p>','Beijing, temperature','Beijing,তাপমাত্রা',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-31',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-30 18:47:25','2021-10-30 23:41:43'),(15,4,6,NULL,9,20,5,'The Khulna Metropolitan Committee of the women\'s party announced in the','বিকেলে ঘোষণা করে রাতে স্থগিত মহিলা','the-khulna-metropolitan-committee-of-the-womens-party-announced-in-the','bikele-ghoshna-kre-rate-sthgit-mhila','public/uploads/backend/ads/1715117105653815.jpg','<pre>\r\nThe nationalist women&#39;s party announced the new committee in the afternoon and postponed it at night. The incident took place in the case of Khulna Mahanagar Mahila Dal branch committee.\r\n\r\nThe information was given in a press release signed by the central president of the women&#39;s party Afroza Abbas and general secretary Sultan Ahmed around 10 pm on Saturday (October 30).</pre>','<p>বিকেলে নতুন কমিটি ঘোষণা করে রাতে তা স্থগিত করলো জাতীয়তাবাদী মহিলা দল। খুলনা মহানগর মহিলা দল শাখা কমিটির ক্ষেত্রে এ ঘটনা ঘটেছে।</p>\r\n\r\n<p>শনিবার (৩০ অক্টোবর) রাত দশটার দিকে মহিলা দলের কেন্দ্রীয় সভাপতি আফরোজা আব্বাস এবং সাধারণ সম্পাদক সুলতান আহমেদ স্বাক্ষরিত এক প্রেস বিজ্ঞপ্তিতে এ তথ্য জানা গেছে।</p>','dfvgrhbd','tyhsrthh',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-31',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-30 18:52:13','2021-10-30 23:04:25'),(16,7,8,NULL,4,8,NULL,'Warne is watching another India-Pakistan final','আরেকটি ভারত-পাকিস্তান ফাইনাল দেখছেন ওয়ার্ন','warne-is-watching-another-india-pakistan-final','arekti-vart-pakistan-fainal-dekhchen-warn','public/uploads/backend/ads/1715118419041472.jpg','<pre>\r\nIndia and Pakistan, two arch-rivals, met in the final of the first edition of the Twenty20 World Cup in 2006. Where Mahendra Singh Dhoni&#39;s team won the title by 5 runs.</pre>','<p>২০০৭ সালে টি-টোয়েন্টি বিশ্বকাপের প্রথম আসরের ফাইনালে মুখোমুখি হয়েছিল দুই চির প্রতিদ্বন্দ্বী দেশ ভারত ও পাকিস্তান। যেখানে ৫ রানে জিতে শিরোপা নিজেদের করে নিয়েছিল মহেন্দ্র সিং ধোনির দল।</p>\r\n\r\n<p>এবার প্রায় ১৪ বছর পর সপ্তম আসরে এসে ফের ভারত-পাকিস্তান ফাইনালের আভাস পাচ্ছেন অস্ট্রেলিয়ার কিংবদন্তি স্পিনার শেন ওয়ার্ন। সুপার টুয়েলভে এখন পর্যন্ত হওয়া ম্যাচগুলো দেখে এমনটাই মনে হচ্ছে সাবেক লেগস্পিনারের।</p>','Beijing,India-Pakistan','Beijing,ভারত-পাকিস্তান',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-31',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-30 19:13:05','2021-10-30 23:41:56'),(17,7,9,NULL,4,9,NULL,'Ronaldo won United with a goal-assist','গোল-অ্যাসিস্টে ইউনাইটেডকে জেতালেন রোনালদো','ronaldo-won-united-with-a-goal-assist','gol-ozasiste-iunaitedke-jetalen-ronaldo','public/uploads/backend/ads/1715118681823237.jpg','<pre>\r\nCristiano Ronaldo has not scored in the last four matches of the English Premier League. His team Manchester United could not win those four matches. In the last two matches, Leicester City lost 4-2 and Liverpool lost 5-0.\r\n\r\nRonaldo, the biggest star of the team, gave just as much performance as he needed to turn around from a difficult time. United beat Tottenham Hotspur 3-0 on Saturday night thanks to his goal-assist.</pre>','<p>ইংলিশ প্রিমিয়ার লিগে শেষ চার ম্যাচে গোল পাচ্ছিলেন না ক্রিশ্চিয়ানো রোনালদো। সেই চার ম্যাচে জিততে পারেননি তার দল ম্যানচেস্টার ইউনাইটেড। এর মধ্যে শেষ দুই ম্যাচে লিস্টার সিটির কাছে ৪-২ ও লিভারপুলের কাছে বিধ্বস্ত হয়েছে ৫-০ গোলের ব্যবধানে।</p>\r\n\r\n<p>কঠিন সময় থেকে ঘুরে দাঁড়ানোর জন্য যেমন পারফরম্যান্স প্রয়োজন ছিল, ঠিক তেমনটাই উপহার দিলেন দলের সবচেয়ে বড় তারকা রোনালদো। শনিবার রাতে তার গোল-অ্যাসিস্টের সুবাদে টটেনহ্যাম হটস্পারকে ৩-০ গোলে হারিয়ে চার ম্যাচ পর জয়ের দেখা পেয়েছে ইউনাইটেড।</p>','Beijing','Beijing, রোনালদো',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-31',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-30 19:17:16','2021-10-30 23:42:15'),(18,7,9,NULL,7,16,NULL,'Easy win Real, again stumbling Barsa','খেলাধুলা সহজ জয় রিয়ালের, ফের হোঁচট বার্সার','easy-win-real-again-stumbling-barsa','kheladhula-shj-jy-riyaler-fer-honnct-barsar','public/uploads/backend/ads/1715118878312776.jpg','<pre>\r\nSpain&#39;s two arch-rivals Barcelona and Real Madrid are going in the opposite direction this season. On the one hand, Real has retained the top spot with one victory after another. On the other hand, Barcelona is coming down at the bottom of the points table with repeated disappointing results.\r\n</pre>','<p>চলতি মৌসুমে ঠিক উল্টো পথে হাঁটছে স্পেনের দুই চির প্রতিদ্বন্দ্বী ক্লাব বার্সেলোনা ও রিয়াল মাদ্রিদ। একদিকে একের পর এক জয়ে শীর্ষস্থান অটুট রেখেছে রিয়াল। অন্যদিকে বারবার হতাশাজনক ফলাফলে পয়েন্ট টেবিলে নিচের দিকেই নামছে বার্সেলোনা।</p>\r\n\r\n<p>শনিবার রাতেও দেখা গেছে অভিন্ন চিত্র। নিজেদের ম্যাচে এলচের মাঠ থেকে ২-১ গোলের জয় নিয়ে ফিরেছে কার্লো আনচেলত্তির রিয়াল। অন্যদিকে সার্জি বার্জুয়ানের অধীনে খেলতে নামা বার্সেলোনা ঘরের মাঠে ১-১ গোলে ড্র করেছে তুলনামূলক দুর্বল আলাভেসের সঙ্গে।</p>','Beijing, Barsa','Beijing,বার্সার',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-31',NULL,NULL,NULL,NULL,NULL,NULL,'2021-10-30 19:20:23','2021-10-30 23:42:26');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporters`
--

DROP TABLE IF EXISTS `reporters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `reporter_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporter_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporters_category_id_foreign` (`category_id`),
  CONSTRAINT `reporters_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporters`
--

LOCK TABLES `reporters` WRITE;
/*!40000 ALTER TABLE `reporters` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_rating` double(8,2) DEFAULT NULL,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seos`
--

LOCK TABLES `seos` WRITE;
/*!40000 ALTER TABLE `seos` DISABLE KEYS */;
/*!40000 ALTER TABLE `seos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_links`
--

DROP TABLE IF EXISTS `social_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_links`
--

LOCK TABLES `social_links` WRITE;
/*!40000 ALTER TABLE `social_links` DISABLE KEYS */;
INSERT INTO `social_links` VALUES (1,'https://www.facebook.com/Shahriyar.Shazib1602/',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `social_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subcategory_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `subcategory_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_on_header` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_districts`
--

DROP TABLE IF EXISTS `sub_districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_districts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subdistrict_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) unsigned DEFAULT NULL,
  `district_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_districts_division_id_foreign` (`division_id`),
  KEY `sub_districts_district_id_foreign` (`district_id`),
  CONSTRAINT `sub_districts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sub_districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_districts`
--

LOCK TABLES `sub_districts` WRITE;
/*!40000 ALTER TABLE `sub_districts` DISABLE KEYS */;
INSERT INTO `sub_districts` VALUES (7,'কালিগঞ্জ','kaliganj','kalignj','kaliganj',4,8,'2021-10-31 21:52:38','2021-10-31 21:52:38'),(8,'ছাগলনাইয়া','Chhagalnaia','chaglnaiza','chhagalnaia',5,11,'2021-10-31 22:08:13','2021-10-31 22:08:13'),(9,'নগরপুর','nagarpur','ngrpur','nagarpur',4,9,'2021-10-31 22:09:38','2021-10-31 22:09:38'),(10,'চকরিয়া','Chakaria','ckriza','chakaria',5,12,'2021-10-31 22:12:08','2021-10-31 22:12:08'),(11,'বাগাতিপাড়া','Bagatipara','bagatipada','bagatipara',6,13,'2021-10-31 22:13:40','2021-10-31 22:13:40'),(12,'ফরিদপুর','Faridpur','fridpur','faridpur',6,14,'2021-10-31 22:14:35','2021-10-31 22:14:35'),(13,'বারহাট্টা','Barhatta','barhatta','barhatta',7,15,'2021-10-31 22:16:06','2021-10-31 22:16:06'),(14,'মেলান্দহ','Melandaha','melandh','melandaha',7,16,'2021-10-31 22:16:58','2021-10-31 22:16:58'),(15,'নবাবগঞ্জ','Nawabganj','nbabgnj','nawabganj',8,17,'2021-10-31 22:19:28','2021-10-31 22:19:28'),(16,'চিলমারী','Chilmari','cilmaree','chilmari',8,18,'2021-10-31 22:20:09','2021-10-31 22:20:09'),(17,'মোংলা','Mongla','mongla','mongla',9,19,'2021-10-31 22:21:02','2021-10-31 22:21:02'),(18,'ঝিকরগাছা','Jhikargacha','jhikrgacha','jhikargacha',9,20,'2021-10-31 22:23:32','2021-10-31 22:23:32'),(19,'লাখাই','Lakhai','lakhai','lakhai',10,21,'2021-10-31 22:24:19','2021-10-31 22:24:19'),(20,'Sreemangal','Sreemangal','sreemangal','sreemangal',10,22,'2021-10-31 22:25:14','2021-10-31 22:25:14'),(21,'Manpura','Manpura','manpura','manpura',11,23,'2021-10-31 22:26:28','2021-10-31 22:26:28'),(22,'গলাচিপা','Galachipa','glacipa','galachipa',11,24,'2021-10-31 22:31:26','2021-10-31 22:31:26');
/*!40000 ALTER TABLE `sub_districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',NULL,'$2y$10$GrcgfAkvGIBEzTR39NeXZOXZ3twBcb4fABuJvpUn9YgWuiVx8VJRy',NULL,NULL,NULL),(2,'user1','user1@gmail.com',NULL,'$2y$10$GrcgfAkvGIBEzTR39NeXZOXZ3twBcb4fABuJvpUn9YgWuiVx8VJRy',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_galleries`
--

DROP TABLE IF EXISTS `video_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_galleries`
--

LOCK TABLES `video_galleries` WRITE;
/*!40000 ALTER TABLE `video_galleries` DISABLE KEYS */;
INSERT INTO `video_galleries` VALUES (1,'প্রাথমিক জিজ্ঞাসাবাদে যা স্বীকার করেন ইকবাল ! | Cumilla News | Somoy TV',NULL,'https://www.youtube.com/embed/ofEQRLiom2s','2021-10-23 22:12:54','2021-10-23 22:12:54'),(3,'শীর্ষ সংবাদ | সকাল ৮টা | ২৪ অক্টোবর ২০২১ |Somoy tv headline 8am | Latest Bangladeshi','as','https://www.youtube.com/watch?v=gBU-bZQ1H2Y','2021-10-23 22:17:42','2021-10-23 22:17:42'),(4,'ঘুম','sleep','https://www.youtube.com/embed/mli5roiIW-s&list=RDmli5roiIW-s&start_radio=1','2021-10-23 23:02:44','2021-10-23 23:02:44'),(6,'Ek Shohor Bhalobasha by Tanjib Sarowar','এক শহর ভালবাশা','https://www.youtube.com/embed/oPSwN4yi3dc&list=RDMMoPSwN4yi3dc&start_radio=1','2021-10-23 23:16:17','2021-10-23 23:16:17'),(7,'ঘুমের ওষুধ খাইয়ে অচেতন করে...','ebuewf','https://www.youtube.com/embed/dYC3C7po_Wc','2021-10-23 23:34:33','2021-10-23 23:35:45'),(8,'সকাল ১০ টার বাংলাভিশন সংবাদ |','Bangla News | 24_October_2021 | 10:00 AM | Banglavision News','https://www.youtube.com/embed/AOnu50A39ps','2021-10-23 23:39:51','2021-10-23 23:39:51'),(9,'live','live','https://www.youtube.com/embed/iSRkuLCT7So','2021-11-02 03:53:07','2021-11-02 03:53:07');
/*!40000 ALTER TABLE `video_galleries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-03 16:13:09
