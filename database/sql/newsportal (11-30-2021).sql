-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 12:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `page_name`, `position`, `ads_link`, `image`, `ads_status`, `created_at`, `updated_at`) VALUES
(2, 'home', 'left_main_creasol', NULL, 'public/uploads/advertisement/image/1717745710430603.gif', '1', NULL, '2021-11-29 01:12:46'),
(3, 'home', 'bottom_main_news', NULL, 'public/uploads/advertisement/image/1717747120021563.gif', '1', NULL, '2021-11-29 01:35:10'),
(4, 'home', 'bottom_category', NULL, 'public/uploads/advertisement/image/1717740722952995.gif', '1', NULL, '2021-11-28 23:53:29'),
(5, 'home', 'bottom_feature_vedio', NULL, 'public/uploads/advertisement/image/1717747722360232.gif', '1', NULL, '2021-11-29 01:44:44'),
(6, 'home', 'bottom_image_gellary', NULL, 'public/uploads/advertisement/image/1717748082197576.gif', '1', NULL, '2021-11-29 01:50:28'),
(7, 'home', 'above_footer', NULL, 'public/uploads/advertisement/image/1717749173926310.gif', '1', NULL, '2021-11-29 02:07:49'),
(8, 'detail_page', 'above_single_post', NULL, 'public/uploads/advertisement/image/1717753749352618.gif', '1', NULL, '2021-11-29 03:20:32'),
(9, 'detail_page', 'above_related_post', NULL, 'public/uploads/advertisement/image/1717753992363288.gif', '1', NULL, '2021-11-29 03:24:24'),
(10, 'detail_page', 'above_comment', NULL, 'public/uploads/advertisement/image/1717754036205131.gif', '1', NULL, '2021-11-29 03:25:06'),
(11, 'list_post', 'after_main_content', NULL, NULL, NULL, NULL, NULL),
(12, 'list_page', 'bellow_list_news', NULL, 'public/uploads/advertisement/image/1717756888969662.gif', '1', NULL, '2021-11-29 04:10:26'),
(13, 'video_gallery', 'bottom_single_vedio', NULL, NULL, NULL, NULL, NULL),
(14, 'video_gallery', 'bottom_more_vedio', NULL, NULL, NULL, NULL, NULL),
(15, 'Right_column', 'bellow_recent_news', NULL, 'public/uploads/advertisement/image/1717832409085206.gif', '1', NULL, '2021-11-30 00:10:48'),
(16, 'Right_column', 'bellow_calender', NULL, 'public/uploads/advertisement/image/1717836370634443.jpg', '1', NULL, '2021-11-30 01:13:46'),
(17, 'Right_column', 'bellow_tab_content', NULL, 'public/uploads/advertisement/image/1717836807973033.gif', '1', NULL, '2021-11-30 01:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category_name_bn`, `blog_category_name_en`, `blog_category_slug_bn`, `blog_category_slug_en`, `status`, `created_at`, `updated_at`) VALUES
(3, 'technical', 'technical', 'technical', 'technical', '1', '2021-11-27 22:47:15', '2021-11-27 22:47:15'),
(4, 'food', 'food', 'food', 'food', '1', '2021-11-27 23:01:14', '2021-11-27 23:01:14'),
(5, 'lifestyle', 'lifestyle', 'lifestyle', 'lifestyle', '1', '2021-11-27 23:06:38', '2021-11-27 23:06:38'),
(6, 'metro', 'metro', 'metro', 'metro', '1', '2021-11-27 23:11:26', '2021-11-27 23:11:26'),
(7, 'environment', 'environment', 'environment', 'environment', '1', '2021-11-28 00:20:38', '2021-11-28 00:20:38'),
(8, 'travel', 'travel', 'travel', 'travel', '1', '2021-11-28 01:05:06', '2021-11-28 01:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blog_title_en`, `blog_title_bn`, `blog_category_id`, `slug_bn`, `slug_en`, `description_en`, `description_bn`, `image`, `tag_bn`, `tag_en`, `view`, `created_at`, `updated_at`) VALUES
(3, 'Us Woman Sued Apple over her malfunctioning  iPhone', NULL, 3, '', 'us-woman-sued-apple-over-her-malfunctioning-iphone', '<p>&ldquo;Madame Magistrate, this case concerns a basic commercial transaction in which I didn&rsquo;t get what I paid for.&rdquo;</p>\r\n\r\n<p>Thus begins the end of a saga that began Sept 28, 2020, when Janet Carlson paid US$549.69 (RM2,332) for a new Apple iPhone, one of several the Essex resident had purchased over the years.</p>\r\n\r\n<p>Two weeks later, the problems began. At first, Carlson thought it was her fault, a matter of getting used to Apple&rsquo;s new mid-October software upgrade &ldquo;Version 14&rdquo; and so she did what anyone would do &ndash; particularly anyone who, like Carlson, had paid extra for an Apple Care protection plan: she called Apple&rsquo;s customer support.</p>\r\n\r\n<p>Now, as anyone who&#39;s ever owned an Apple device knows, Apple calls its technicians &ldquo;Apple specialists&rdquo;. From November 2020 to May 2021, Carlson spent an estimated 75 hours talking to 26 Apple specialists concerning 23 persistent defects in her iPhone&rsquo;s operation. And then there were the trips to talk to the technicians at the Apple store in Lynnfield. &quot;I did everything they told me to,&quot; she says. And still, the problems persisted.</p>\r\n\r\n<p>The cursor would disappear, illegible banners would appear, sentences would duplicate themselves, there were problems with the audio, delete malfunctions, constant dictation malfunctions, the inbox did not register new mail. On and on the problems went and when they wouldn&rsquo;t go away, Apple seemed to wish she would go away.</p>\r\n\r\n<p>Well, Apple didn&#39;t know who it was ghosting.</p>\r\n\r\n<p>By then, Janet Carlson had become, she says, &quot;like that guy in the movie&nbsp;<em>Network</em>&nbsp;&ndash; I was mad as hell and I wasn&#39;t gonna take it anymore. Apple would like people to be intimidated by their technology. They picked the wrong consumer.&quot;</p>\r\n\r\n<p>Apple&#39;s policy was that it would only accept returned iPhones up to 14 days from day of purchase. &quot;My problems began after 14 days, in mid-October, when the Version 14 software upgrade began.&quot; Carlson believed there was &quot;a bad marriage&quot; between the software upgrade and her iPhone. But Apple stuck to its returns policy and Carlson remained stuck with her Apple lemon.</p>\r\n\r\n<p>&quot;I just wanted what I&#39;d paid for, which is a phone that works,&quot; she says. And that is when she began to discover &ndash; after a successful career as a writer and editor in New York City &ndash; &quot;that, as my father said, I should have been a lawyer.&quot;</p>\r\n\r\n<p>A lawyer himself, 97-year-old Robert Carlson actually specialised in big-name corporate law. Carlson&#39;s 96-year-old mother, Helen Garland &ndash; widow of the late Gloucester historian Joe Garland &ndash; is legendary for her righteous tenacity.</p>\r\n\r\n<p>&quot;I guess it&#39;s in the genes,&quot; says Carlson, who reached out to the office of Massachusetts Attorney General Maura Healey, which turned her over to the North Essex Dispute Resolution folks who suggested taking Apple to Small Claims Court. And that is when she started, with no detail left unturned, to build up a &quot;David and Goliath&quot; case which this Oct 21, she presented to Gloucester Small Claims Court Magistrate Margaret Daly Crateau.</p>\r\n\r\n<p>&quot;I felt it was simply wrong to leave me with a defective phone. We all have to pick our battles, we come to a moment when we have to stand up for ourselves. This was the moment for me,&quot; she says.</p>\r\n\r\n<p>Altogether, by the time Carlson had her day in court, she had amassed 54 screenshots clearly illustrating the phone&rsquo;s defects, accompanied by pages copiously chronicling in lawyerly detail her months of struggles.</p>\r\n\r\n<p>&quot;There is no dispute between the parties as to the fact that the phone sold to me by Apple is defective,&quot; she told Crateau. &quot;Apple claims they are not responsible. Basic contract law says they are.&quot; Crateau, who herself owns an iPhone, agreed, and on Nov 12, Carlson received a US$2,800 (RM11,879) check from Apple Inc.</p>\r\n\r\n<p>Carlson, who is in the throes of writing a novel, got lots of legal advice along the way from her father as well as her friend, Gloucester lawyer M.J. Boylan. She was cheered along by friends and family from here to Montana, she says. &ldquo;A lot of people were excited, they were like, you go girl,&quot; and that, she says, fueled her.</p>\r\n\r\n<p>But that is not the end of the story. Carlson, who wants her win to inspire others to stand up for themselves, has bought the website domain name isuedappleandwon.com. It&rsquo;s still in a conceptual stage, but, she says, it&#39;s for all those Davids out there who want to take on a Goliath. Stay tuned. &ndash; The Gloucester Daily Times (Gloucester, Mass.)/Tribune News Service</p>', '<p>&ldquo;Madame Magistrate, this case concerns a basic commercial transaction in which I didn&rsquo;t get what I paid for.&rdquo;</p>\r\n\r\n<p>Thus begins the end of a saga that began Sept 28, 2020, when Janet Carlson paid US$549.69 (RM2,332) for a new Apple iPhone, one of several the Essex resident had purchased over the years.</p>\r\n\r\n<p>Two weeks later, the problems began. At first, Carlson thought it was her fault, a matter of getting used to Apple&rsquo;s new mid-October software upgrade &ldquo;Version 14&rdquo; and so she did what anyone would do &ndash; particularly anyone who, like Carlson, had paid extra for an Apple Care protection plan: she called Apple&rsquo;s customer support.</p>\r\n\r\n<p>Now, as anyone who&#39;s ever owned an Apple device knows, Apple calls its technicians &ldquo;Apple specialists&rdquo;. From November 2020 to May 2021, Carlson spent an estimated 75 hours talking to 26 Apple specialists concerning 23 persistent defects in her iPhone&rsquo;s operation. And then there were the trips to talk to the technicians at the Apple store in Lynnfield. &quot;I did everything they told me to,&quot; she says. And still, the problems persisted.</p>\r\n\r\n<p>The cursor would disappear, illegible banners would appear, sentences would duplicate themselves, there were problems with the audio, delete malfunctions, constant dictation malfunctions, the inbox did not register new mail. On and on the problems went and when they wouldn&rsquo;t go away, Apple seemed to wish she would go away.</p>\r\n\r\n<p>Well, Apple didn&#39;t know who it was ghosting.</p>\r\n\r\n<p>By then, Janet Carlson had become, she says, &quot;like that guy in the movie&nbsp;<em>Network</em>&nbsp;&ndash; I was mad as hell and I wasn&#39;t gonna take it anymore. Apple would like people to be intimidated by their technology. They picked the wrong consumer.&quot;</p>\r\n\r\n<p>Apple&#39;s policy was that it would only accept returned iPhones up to 14 days from day of purchase. &quot;My problems began after 14 days, in mid-October, when the Version 14 software upgrade began.&quot; Carlson believed there was &quot;a bad marriage&quot; between the software upgrade and her iPhone. But Apple stuck to its returns policy and Carlson remained stuck with her Apple lemon.</p>\r\n\r\n<p>&quot;I just wanted what I&#39;d paid for, which is a phone that works,&quot; she says. And that is when she began to discover &ndash; after a successful career as a writer and editor in New York City &ndash; &quot;that, as my father said, I should have been a lawyer.&quot;</p>\r\n\r\n<p>A lawyer himself, 97-year-old Robert Carlson actually specialised in big-name corporate law. Carlson&#39;s 96-year-old mother, Helen Garland &ndash; widow of the late Gloucester historian Joe Garland &ndash; is legendary for her righteous tenacity.</p>\r\n\r\n<p>&quot;I guess it&#39;s in the genes,&quot; says Carlson, who reached out to the office of Massachusetts Attorney General Maura Healey, which turned her over to the North Essex Dispute Resolution folks who suggested taking Apple to Small Claims Court. And that is when she started, with no detail left unturned, to build up a &quot;David and Goliath&quot; case which this Oct 21, she presented to Gloucester Small Claims Court Magistrate Margaret Daly Crateau.</p>\r\n\r\n<p>&quot;I felt it was simply wrong to leave me with a defective phone. We all have to pick our battles, we come to a moment when we have to stand up for ourselves. This was the moment for me,&quot; she says.</p>\r\n\r\n<p>Altogether, by the time Carlson had her day in court, she had amassed 54 screenshots clearly illustrating the phone&rsquo;s defects, accompanied by pages copiously chronicling in lawyerly detail her months of struggles.</p>\r\n\r\n<p>&quot;There is no dispute between the parties as to the fact that the phone sold to me by Apple is defective,&quot; she told Crateau. &quot;Apple claims they are not responsible. Basic contract law says they are.&quot; Crateau, who herself owns an iPhone, agreed, and on Nov 12, Carlson received a US$2,800 (RM11,879) check from Apple Inc.</p>\r\n\r\n<p>Carlson, who is in the throes of writing a novel, got lots of legal advice along the way from her father as well as her friend, Gloucester lawyer M.J. Boylan. She was cheered along by friends and family from here to Montana, she says. &ldquo;A lot of people were excited, they were like, you go girl,&quot; and that, she says, fueled her.</p>\r\n\r\n<p>But that is not the end of the story. Carlson, who wants her win to inspire others to stand up for themselves, has bought the website domain name isuedappleandwon.com. It&rsquo;s still in a conceptual stage, but, she says, it&#39;s for all those Davids out there who want to take on a Goliath. Stay tuned. &ndash; The Gloucester Daily Times (Gloucester, Mass.)/Tribune News Service</p>', 'public/uploads/blog/image/1717646175531052.jpg', NULL, 'Us Woman Sued Apple over her malfunctioning  iPhone', 2, '2021-11-27 22:50:42', '2021-11-27 22:54:17'),
(4, 'Delightful meals to start the day', NULL, 4, '', 'delightful-meals-to-start-the-day', '<p>AMAZING food, deli, spirits and wine bar &mdash; The Wine Shop Signature (TWSS) in Tanjung Bungah, Penang, &mdash; has you covered.</p>\r\n\r\n<p>It is the new to go-to place on the island for a good breakfast and brunch (and not forgetting lunch and dinner) and excellent coffee.</p>\r\n\r\n<p>Kickstart your day with the hearty combos over a beautiful garden view at the window seats.</p>\r\n\r\n<p>Be prepared to be impressed the moment you walk through the doors with both sides of the walls lined with liquor and wine bottles of all sizes and colours.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>TWSS, which recently opened, has been designed to be totally different from its sister establishments The Wine Shop that has three outlets located in Pulau Tikus, Bayan Lepas and Tanjung Bungah.</p>\r\n\r\n<p>The concept here is an all-white, more spacious and free flowing interior to offer a relaxing and cosy escape from everyday life.</p>\r\n\r\n<p>The environment perfectly complements the cuisine tastefully prepared by chef Boon Chom Aroonratana.</p>\r\n\r\n<p>The menu boasts of contemporary Western fusion dishes with a twist.</p>\r\n\r\n<p>The breakfast selection includes a variety of appetising sandwiches, smoked salmon on scrambled egg, and omelette with buttered veggie and tomato relish.</p>\r\n\r\n<p>The a la carte features mouth-watering creations such as deli and cheese, snacks (baked chicken boxing, cherry bacon), soup (prawn bisque, cream of asparagus and leek) and appetisers (lechon pork belly roll, garlic scallop).</p>\r\n\r\n<p>Marinated with the chef&rsquo;s secret recipe, the Filipino lechon pork belly roll is simply irresistible with its crispy skin, tender juicy meat and tasty belly fat.</p>\r\n\r\n<p>Wholesome salad comprises smoked salmon sandwich, pineapple glaze ham, as well as pancetta crisps and momotaro.</p>\r\n\r\n<p>The home-smoked salmon is served with generous greens drizzled with wine dressing and parmigiano cheese.</p>\r\n\r\n<p>Made from scratch, the beef pastrami sandwich, pulled pork knuckle sandwich, Iberico pork burger and wagyu beef burger are not to be missed.</p>\r\n\r\n<p>There are also pasta and noodles like fried-chicken mala spaghetti, seafood yaki udon and bacon carbonara.</p>\r\n\r\n<p>The tongue numbing mala spaghetti is not only delicious but addictive.</p>\r\n\r\n<p>Mains consist of indulgent BBQ Iberico pork spare ribs, duck confit, &lsquo;on-fire&rsquo; chicken chop, citrus seared salmon, pan-seared oriental barramundi, and ham-hock braised with whiskey and honey.</p>\r\n\r\n<p>Nothing beats digging into sticky barbecued ribs that are seasoned overnight with herbs and spices including orange zest for that vibrant citrus flavour.</p>\r\n\r\n<p>The Iberico pork ribs dish certainly packs a punch with its tender and smooth texture, awesome flavour and juiciness.</p>\r\n\r\n<p>One cannot go wrong with the chicken chop that is well marinated and grilled to golden perfection. A classic comfort food to tantalise taste buds.</p>\r\n\r\n<p>Dessert is made up of a choice of home- baked cakes, cheese brownie and pecan pie.</p>\r\n\r\n<p>Set lunch is also available daily.</p>\r\n\r\n<p>Emphasis here might be on wines but the range of hard liquor is equally extensive.</p>\r\n\r\n<p>TWSS uses the Coravin system of wine house pouring by the glass to ensure you get to enjoy wine as fresh as opening a bottle.</p>\r\n\r\n<p>The delicatessen is stocked with imported gourmet meats and artisan cheeses including home-smoked and cured hams and sausages for takeaway and dine-in.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>AMAZING food, deli, spirits and wine bar &mdash; The Wine Shop Signature (TWSS) in Tanjung Bungah, Penang, &mdash; has you covered.</p>\r\n\r\n<p>It is the new to go-to place on the island for a good breakfast and brunch (and not forgetting lunch and dinner) and excellent coffee.</p>\r\n\r\n<p>Kickstart your day with the hearty combos over a beautiful garden view at the window seats.</p>\r\n\r\n<p>Be prepared to be impressed the moment you walk through the doors with both sides of the walls lined with liquor and wine bottles of all sizes and colours.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>TWSS, which recently opened, has been designed to be totally different from its sister establishments The Wine Shop that has three outlets located in Pulau Tikus, Bayan Lepas and Tanjung Bungah.</p>\r\n\r\n<p>The concept here is an all-white, more spacious and free flowing interior to offer a relaxing and cosy escape from everyday life.</p>\r\n\r\n<p>The environment perfectly complements the cuisine tastefully prepared by chef Boon Chom Aroonratana.</p>\r\n\r\n<p>The menu boasts of contemporary Western fusion dishes with a twist.</p>\r\n\r\n<p>The breakfast selection includes a variety of appetising sandwiches, smoked salmon on scrambled egg, and omelette with buttered veggie and tomato relish.</p>\r\n\r\n<p>The a la carte features mouth-watering creations such as deli and cheese, snacks (baked chicken boxing, cherry bacon), soup (prawn bisque, cream of asparagus and leek) and appetisers (lechon pork belly roll, garlic scallop).</p>\r\n\r\n<p>Marinated with the chef&rsquo;s secret recipe, the Filipino lechon pork belly roll is simply irresistible with its crispy skin, tender juicy meat and tasty belly fat.</p>\r\n\r\n<p>Wholesome salad comprises smoked salmon sandwich, pineapple glaze ham, as well as pancetta crisps and momotaro.</p>\r\n\r\n<p>The home-smoked salmon is served with generous greens drizzled with wine dressing and parmigiano cheese.</p>\r\n\r\n<p>Made from scratch, the beef pastrami sandwich, pulled pork knuckle sandwich, Iberico pork burger and wagyu beef burger are not to be missed.</p>\r\n\r\n<p>There are also pasta and noodles like fried-chicken mala spaghetti, seafood yaki udon and bacon carbonara.</p>\r\n\r\n<p>The tongue numbing mala spaghetti is not only delicious but addictive.</p>\r\n\r\n<p>Mains consist of indulgent BBQ Iberico pork spare ribs, duck confit, &lsquo;on-fire&rsquo; chicken chop, citrus seared salmon, pan-seared oriental barramundi, and ham-hock braised with whiskey and honey.</p>\r\n\r\n<p>Nothing beats digging into sticky barbecued ribs that are seasoned overnight with herbs and spices including orange zest for that vibrant citrus flavour.</p>\r\n\r\n<p>The Iberico pork ribs dish certainly packs a punch with its tender and smooth texture, awesome flavour and juiciness.</p>\r\n\r\n<p>One cannot go wrong with the chicken chop that is well marinated and grilled to golden perfection. A classic comfort food to tantalise taste buds.</p>\r\n\r\n<p>Dessert is made up of a choice of home- baked cakes, cheese brownie and pecan pie.</p>\r\n\r\n<p>Set lunch is also available daily.</p>\r\n\r\n<p>Emphasis here might be on wines but the range of hard liquor is equally extensive.</p>\r\n\r\n<p>TWSS uses the Coravin system of wine house pouring by the glass to ensure you get to enjoy wine as fresh as opening a bottle.</p>\r\n\r\n<p>The delicatessen is stocked with imported gourmet meats and artisan cheeses including home-smoked and cured hams and sausages for takeaway and dine-in.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'public/uploads/blog/image/1717646925167715.jpg', NULL, 'food', 2, '2021-11-27 23:02:37', '2021-11-27 23:09:39'),
(5, ' Food and greenhouse gas emissions', NULL, 4, '', 'food-and-greenhouse-gas-emissions', '<p>The news of the month must be the COP26 summit in Glasgow, Scotland. COP means &ldquo;Conference of the Parties&rdquo; and this is its 26th party. And in my opinion, it has not gone as well as fervently hoped by many.</p>\r\n\r\n<p>For a start, the omens did not bode well when the host, British Prime Minister Boris Johnson, started with a lecture about the clock being at one minute to midnight for humanity and then proceeded to be 30 minutes late for subsequent meetings himself.</p>\r\n\r\n<p>This is compounded by same evening flights from Glasgow to London and back via a private jet to attend a dinner party hosted by a climate change denier at an exclusive London club. This incredibly selfish act added a few more tonnes of CO2 into the atmosphere.</p>\r\n\r\n<p>Regardless of the antics of the host and some major disappointing outcomes such as India&rsquo;s inability to meet a net zero target before 2070 and Indonesia&rsquo;s disagreement to ending deforestation by 2030, COP26 may have achieved what a realist might have expected.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And the reality is that not a lot will be done which can limit global temperatures rising by over 1.5C, but at least, global warming is on the agenda for many governments now. That is a good start, though it remains to be seen if all the world leaders take the issue seriously enough. After all, China, Brazil, and Russia did not even officially attend COP26.</p>\r\n\r\n<p>The current likely trajectory is for global temperature rises to hit and probably exceed 1.5C by the 2030s (regardless of whatever measures are agreed during COP26), with a pre-COP26 target of a rise of 2.7C by the end of the century. However, if all the COP26 pledges and planned actions are adopted in full, then an end target rise limited to 1.8C may be feasible.</p>\r\n\r\n<p>A rise of 1.8C is significantly better than a rise of 2.7C and may mean better survival probabilities for millions of people and some natural wildlife and habitats. Climate models have suggested immense impacts of even 0.1C increments in global temperatures.</p>\r\n\r\n<p>At this point, a misconception about temperature targets needs to be cleared up. Many people think the oft-mentioned target of 1.5C is an additional 1.5C on top of current temperatures. This is not true. The upper target limit of 1.5C recommended by scientists INCLUDES all the heating since before the industrialisation of the world. And industrialisation has already added 1.1C to global temperatures so the world is now only 0.4C away from the 1.5C limit specified by scientists.</p>\r\n\r\n<p>To put this into context, if you puff on hardened ice cream to soften it before eating, your breath would have heated the ice cream by very much more than 0.4C.<br />\r\n<br />\r\n<strong>Global food costs</strong></p>\r\n\r\n<p>If one thing is clear, it is that we cannot rely solely on most of our leaders to care about us or our future, and certainly not about the future of our children. So, if we all want to do something to help the situation, we can start by looking at what and how we eat.</p>\r\n\r\n<p>To this end, the EU had launched a sophisticated project called EDGAR-FOOD, deemed as the world&rsquo;s first food emission inventory. It covers the years between 1990 to 2015. EDGAR-FOOD monitors and calculates the impacts of all stages of food production and processing, and its data indicates that around 34% of all man-made greenhouse gases (GHG) are generated by food systems.</p>\r\n\r\n<p>On average, every living person on the planet accounts for the equivalent of just over 2 tonnes of carbon dioxide (CO2) every year, and in 2015 alone, food systems emissions (FSE) added 18 billion tonnes of GHG into the atmosphere that year.</p>', '<p>The news of the month must be the COP26 summit in Glasgow, Scotland. COP means &ldquo;Conference of the Parties&rdquo; and this is its 26th party. And in my opinion, it has not gone as well as fervently hoped by many.</p>\r\n\r\n<p>For a start, the omens did not bode well when the host, British Prime Minister Boris Johnson, started with a lecture about the clock being at one minute to midnight for humanity and then proceeded to be 30 minutes late for subsequent meetings himself.</p>\r\n\r\n<p>This is compounded by same evening flights from Glasgow to London and back via a private jet to attend a dinner party hosted by a climate change denier at an exclusive London club. This incredibly selfish act added a few more tonnes of CO2 into the atmosphere.</p>\r\n\r\n<p>Regardless of the antics of the host and some major disappointing outcomes such as India&rsquo;s inability to meet a net zero target before 2070 and Indonesia&rsquo;s disagreement to ending deforestation by 2030, COP26 may have achieved what a realist might have expected.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And the reality is that not a lot will be done which can limit global temperatures rising by over 1.5C, but at least, global warming is on the agenda for many governments now. That is a good start, though it remains to be seen if all the world leaders take the issue seriously enough. After all, China, Brazil, and Russia did not even officially attend COP26.</p>\r\n\r\n<p>The current likely trajectory is for global temperature rises to hit and probably exceed 1.5C by the 2030s (regardless of whatever measures are agreed during COP26), with a pre-COP26 target of a rise of 2.7C by the end of the century. However, if all the COP26 pledges and planned actions are adopted in full, then an end target rise limited to 1.8C may be feasible.</p>\r\n\r\n<p>A rise of 1.8C is significantly better than a rise of 2.7C and may mean better survival probabilities for millions of people and some natural wildlife and habitats. Climate models have suggested immense impacts of even 0.1C increments in global temperatures.</p>\r\n\r\n<p>At this point, a misconception about temperature targets needs to be cleared up. Many people think the oft-mentioned target of 1.5C is an additional 1.5C on top of current temperatures. This is not true. The upper target limit of 1.5C recommended by scientists INCLUDES all the heating since before the industrialisation of the world. And industrialisation has already added 1.1C to global temperatures so the world is now only 0.4C away from the 1.5C limit specified by scientists.</p>\r\n\r\n<p>To put this into context, if you puff on hardened ice cream to soften it before eating, your breath would have heated the ice cream by very much more than 0.4C.<br />\r\n<br />\r\n<strong>Global food costs</strong></p>\r\n\r\n<p>If one thing is clear, it is that we cannot rely solely on most of our leaders to care about us or our future, and certainly not about the future of our children. So, if we all want to do something to help the situation, we can start by looking at what and how we eat.</p>\r\n\r\n<p>To this end, the EU had launched a sophisticated project called EDGAR-FOOD, deemed as the world&rsquo;s first food emission inventory. It covers the years between 1990 to 2015. EDGAR-FOOD monitors and calculates the impacts of all stages of food production and processing, and its data indicates that around 34% of all man-made greenhouse gases (GHG) are generated by food systems.</p>\r\n\r\n<p>On average, every living person on the planet accounts for the equivalent of just over 2 tonnes of carbon dioxide (CO2) every year, and in 2015 alone, food systems emissions (FSE) added 18 billion tonnes of GHG into the atmosphere that year.</p>', 'public/uploads/blog/image/1717647056357729.jpg', NULL, 'food', 1, '2021-11-27 23:04:42', '2021-11-27 23:04:56'),
(6, 'Dog Talk: Woof, are you there?', NULL, 5, '', 'dog-talk-woof-are-you-there', '<p>The pandemic has brought many animals and people closer together. Now we&#39;re coming out of seemingly perpetual lockdown, animal lovers are agonising over going back to the office, either part-time or full-time because pets have become used to our company.</p>\r\n\r\n<p>While web streaming video allows owners to check in on their pets during the day, it&#39;s a one-way system whereby the human has to check in.</p>\r\n\r\n<p>Now an exciting journal paper suggests the launch of the DogPhone, an interactive ball that will allow your pet to video-call you.</p>\r\n\r\n<p>Authors Ilyena Hirskyj-Douglas from the University of Glasgow, Scotland, and Roosa Piitulainen and Andr&eacute;s Lucero from Aalto University, Espoo, Finland, have imbedded a sensor within a ball. When the ball is shaken, it triggers a video call from a computer.</p>\r\n\r\n<p>The DogPhone has been created and tested, and will hopefully soon be available. It&#39;s super exciting but it prompts all kinds of questions, the most important of these is, if your pet calls you, will you know what your dog is saying? In fact, how good are we at understanding basic doggy communication?</p>\r\n\r\n<p>Krishilla Devi Thivyakumar, a teacher living in Selangor, is close to her two rescues, Ringo, nine, and Rusty, 11. Like many pet families, they spent the pandemic at home together and so they talk all day long.</p>\r\n\r\n<p>Krish has heard of the DogPhone and here she shares her take on dog-human communication and what calls may look like</p>\r\n\r\n<p>&quot;We all live together, myself, my parents and the dogs,&quot; Krish explains. &quot;The dogs spend most of their day indoors with us and, like most people, we lock the grill.&quot;</p>\r\n\r\n<p>Acting as door butler is a classic pet owner activity. So how does that work?</p>\r\n\r\n<p>&quot;When Ringo wants out, he just sits and gives us The Look. He is all about eye contact. He looks at me and then his eyes dart to the door. It&#39;s very clear what he wants.</p>\r\n\r\n<p>&quot;Rusty just whines at the door. &quot;They&#39;re in and out during the day, but at around 11pm, they go out for the night. We all know the routine, so that&#39;s easy to figure out. The dogs get up, move towards the door and that&#39;s it. Mind you, if it&#39;s wet or there are fireworks, they decide to stay in. Again, that&#39;s easy to work out.&quot;</p>\r\n\r\n<p>Then there are walks, a major dog social activity because it is special bonding time when dogs and their humans spend quality time together, from the dog&#39;s point of view.</p>\r\n\r\n<p>Dogs need exercise to stay healthy, but more than that, going on a regular walk several times a day also allows them to explore via sight, sound and smell what other dogs, cats, and people are around. Dogs love to explore, it makes them happy, and when we are with them, they see it as a super fun activity: like rolling a trip to the mall, restaurant and cinema all in one.</p>\r\n\r\n<p>Unsurprisingly, Rusty and Ringo are keen on their fun.</p>\r\n\r\n<p>&quot;I work and I&#39;m doing my Masters too so dad usually takes the dogs out,&quot; Krish says. &quot;Rusty sits and acts miserable. We took a while to figure that message out. Ringo is much easier to understand. He does the darting to the door, with the looks, in a way that&#39;s just clear.&quot;</p>\r\n\r\n<p>Food is another happy subject. Dogs are just like us in their joy of food, and as Rusty and Ringo are pampered, they have a lot to say on this subject.</p>\r\n\r\n<p>&quot;They know where their treats and kibbles are,&quot; Krish laughs. &quot;If they want a treat, they go to the treat cupboard. Rusty will sit there and whine, and Ringo will dart and show. When they want their dinner, they sit by the pantry in the kitchen. There&#39;s no question about what they&#39;re after!&quot;</p>\r\n\r\n<p>Dog barking is a super-hot controversial topic because pet lovers believe they are adept at understanding a huge variety of barks, but studies haven&#39;t really gone into this topic very much.</p>\r\n\r\n<p>Many dog lovers suggest that dog barking has developed over time purely because dogs are living with us. This explains why other canine species like wolves, for example, typically don&#39;t make a lot of noise, and appear to be limited to two to four types of barks.</p>\r\n\r\n<p>Pet dogs, though, have barks that signal joy, danger, playfulness, anxiety, pain, anger and more. Some dog owners can even tell the difference between their pets warning against regular &quot;intruders&quot; like the postman and the dustbin collectors versus an unknown &quot;intruder&quot; such as a courier.</p>\r\n\r\n<p>Krish recognises a variety of barks from Rusty and Ringo, but notes they express themselves uniquely.</p>\r\n\r\n<p>&quot;Rusty&#39;s happy bark is short bursts but Ringo mixes barks and playful growls. When they&#39;re giving us warning, Rusty uses long and drawn-out barks with a low growl that carries. Ringo uses incessant sharp barks.&quot;</p>\r\n\r\n<p>It suggests that if dogs do get to call in, each dog will be expressing their needs differently, so we&#39;re going to have to be on the ball, so to speak.</p>\r\n\r\n<p>&quot;Rusty wouldn&#39;t bother, he&#39;s a chill kind of dog,&quot; Krish muses. &quot;He&#39;d be ringing for emergencies only. But Ringo has attachment issues so he&#39;d be on it all day long, just to say he&#39;s there.&quot;</p>\r\n\r\n<p>Sounds just like toddlers!</p>', '<p>The pandemic has brought many animals and people closer together. Now we&#39;re coming out of seemingly perpetual lockdown, animal lovers are agonising over going back to the office, either part-time or full-time because pets have become used to our company.</p>\r\n\r\n<p>While web streaming video allows owners to check in on their pets during the day, it&#39;s a one-way system whereby the human has to check in.</p>\r\n\r\n<p>Now an exciting journal paper suggests the launch of the DogPhone, an interactive ball that will allow your pet to video-call you.</p>\r\n\r\n<p>Authors Ilyena Hirskyj-Douglas from the University of Glasgow, Scotland, and Roosa Piitulainen and Andr&eacute;s Lucero from Aalto University, Espoo, Finland, have imbedded a sensor within a ball. When the ball is shaken, it triggers a video call from a computer.</p>\r\n\r\n<p>The DogPhone has been created and tested, and will hopefully soon be available. It&#39;s super exciting but it prompts all kinds of questions, the most important of these is, if your pet calls you, will you know what your dog is saying? In fact, how good are we at understanding basic doggy communication?</p>\r\n\r\n<p>Krishilla Devi Thivyakumar, a teacher living in Selangor, is close to her two rescues, Ringo, nine, and Rusty, 11. Like many pet families, they spent the pandemic at home together and so they talk all day long.</p>\r\n\r\n<p>Krish has heard of the DogPhone and here she shares her take on dog-human communication and what calls may look like</p>\r\n\r\n<p>&quot;We all live together, myself, my parents and the dogs,&quot; Krish explains. &quot;The dogs spend most of their day indoors with us and, like most people, we lock the grill.&quot;</p>\r\n\r\n<p>Acting as door butler is a classic pet owner activity. So how does that work?</p>\r\n\r\n<p>&quot;When Ringo wants out, he just sits and gives us The Look. He is all about eye contact. He looks at me and then his eyes dart to the door. It&#39;s very clear what he wants.</p>\r\n\r\n<p>&quot;Rusty just whines at the door. &quot;They&#39;re in and out during the day, but at around 11pm, they go out for the night. We all know the routine, so that&#39;s easy to figure out. The dogs get up, move towards the door and that&#39;s it. Mind you, if it&#39;s wet or there are fireworks, they decide to stay in. Again, that&#39;s easy to work out.&quot;</p>\r\n\r\n<p>Then there are walks, a major dog social activity because it is special bonding time when dogs and their humans spend quality time together, from the dog&#39;s point of view.</p>\r\n\r\n<p>Dogs need exercise to stay healthy, but more than that, going on a regular walk several times a day also allows them to explore via sight, sound and smell what other dogs, cats, and people are around. Dogs love to explore, it makes them happy, and when we are with them, they see it as a super fun activity: like rolling a trip to the mall, restaurant and cinema all in one.</p>\r\n\r\n<p>Unsurprisingly, Rusty and Ringo are keen on their fun.</p>\r\n\r\n<p>&quot;I work and I&#39;m doing my Masters too so dad usually takes the dogs out,&quot; Krish says. &quot;Rusty sits and acts miserable. We took a while to figure that message out. Ringo is much easier to understand. He does the darting to the door, with the looks, in a way that&#39;s just clear.&quot;</p>\r\n\r\n<p>Food is another happy subject. Dogs are just like us in their joy of food, and as Rusty and Ringo are pampered, they have a lot to say on this subject.</p>\r\n\r\n<p>&quot;They know where their treats and kibbles are,&quot; Krish laughs. &quot;If they want a treat, they go to the treat cupboard. Rusty will sit there and whine, and Ringo will dart and show. When they want their dinner, they sit by the pantry in the kitchen. There&#39;s no question about what they&#39;re after!&quot;</p>\r\n\r\n<p>Dog barking is a super-hot controversial topic because pet lovers believe they are adept at understanding a huge variety of barks, but studies haven&#39;t really gone into this topic very much.</p>\r\n\r\n<p>Many dog lovers suggest that dog barking has developed over time purely because dogs are living with us. This explains why other canine species like wolves, for example, typically don&#39;t make a lot of noise, and appear to be limited to two to four types of barks.</p>\r\n\r\n<p>Pet dogs, though, have barks that signal joy, danger, playfulness, anxiety, pain, anger and more. Some dog owners can even tell the difference between their pets warning against regular &quot;intruders&quot; like the postman and the dustbin collectors versus an unknown &quot;intruder&quot; such as a courier.</p>\r\n\r\n<p>Krish recognises a variety of barks from Rusty and Ringo, but notes they express themselves uniquely.</p>\r\n\r\n<p>&quot;Rusty&#39;s happy bark is short bursts but Ringo mixes barks and playful growls. When they&#39;re giving us warning, Rusty uses long and drawn-out barks with a low growl that carries. Ringo uses incessant sharp barks.&quot;</p>\r\n\r\n<p>It suggests that if dogs do get to call in, each dog will be expressing their needs differently, so we&#39;re going to have to be on the ball, so to speak.</p>\r\n\r\n<p>&quot;Rusty wouldn&#39;t bother, he&#39;s a chill kind of dog,&quot; Krish muses. &quot;He&#39;d be ringing for emergencies only. But Ringo has attachment issues so he&#39;d be on it all day long, just to say he&#39;s there.&quot;</p>\r\n\r\n<p>Sounds just like toddlers!</p>', 'public/uploads/blog/image/1717647363334582.jpg', NULL, 'Dog Communication', NULL, '2021-11-27 23:09:35', '2021-11-27 23:09:35'),
(7, 'Malton hands over keys to homeowners of The Park 2 Pavilion Bukit Jalil', NULL, 6, '', 'malton-hands-over-keys-to-homeowners-of-the-park-2-pavilion-bukit-jalil', '<p>Malton Berhad has started handing over keys to privileged owners of The Park 2 Pavilion Bukit Jalil where living meets world class retail - Pavilion Bukit Jalil - at their doorstep.</p>\r\n\r\n<p>The Park 2 homeowners will embark on a new home that offers urban cosmopolitan living with direct access to best-in class shopping and dining, entertainment and lush green parkland via exclusive link bridges within the iconic 20ha Bukit Jalil City.</p>\r\n\r\n<p>Despite several movement control orders, Malton has successfully completed the two residential towers comprising 709 units of luxury serviced apartments on schedule.</p>\r\n\r\n<p>The Park 2 achieved 81% CIBD Malaysia QLASSIC score in workmanship quality, a testament of Malton&rsquo;s steadfast commitment to continuously deliver quality homes to its homebuyers.</p>\r\n\r\n<p>Today, The Park 2 is highly accessible with ready amenities and infrastructure in place anchored by newly improved road systems with elevated flyovers by Malton, along withmajor highways such as Kesas, Maju Expressway, Bukit Jalil Highway and other major roads. Nearby public transportation is LRT Awan Besar attracting a ridership of 6.5 million. Population catchment is strong and businesses are flourishing within this integrated city with a vibrant retail mix.</p>\r\n\r\n<p>Commanding a panoramic view to the ever-popular 32-ha Bukit Jalil Recreational Park, The Park 2 with a pair of tall, sleek towers comprising 52 and 50 storeys are the newest addition to redefine the Bukit Jalil City skyline.</p>\r\n\r\n<p>&ldquo;Congratulations, we warmly welcome The Park 2 homeowners to a world where convenience meets luxury lifestyle. A world-class retail experience at Pavilion Bukit Jalil regional mall and 32-ha Bukit Jalil Recreational Park await you at your doorstep via exclusive direct link bridges.&rdquo;</p>\r\n\r\n<p>&ldquo;True to our promise of developing a self-sustaining city, Bukit Jalil City is a well-connected community where everything is within walking distance from residential, shopping and entertainment hub, offices, commercial shops to lush green spaces.</p>\r\n\r\n<p>&ldquo;Residents can live, work, shop and play within close proximity to one another, a truly unique lifestyle beyond home with a level of privileges, connectivity and serenity,&rdquo; said Malton Berhad property development chief executive officer Kelvin Choo.</p>\r\n\r\n<p>&ldquo;With the soon-to-be launched &lsquo;MyMalton&rsquo; one-stop mobile app, residents at Bukit Jalil City will enjoy hassle-free solutions with real-time data such as billing statements, facility bookings, visitors and other property related matters. Integrated with exclusive Pavilion privileges, residents will also enjoy premium services and rewards, as well as dining to shopping benefits at Pavilion Bukit Jalil.&rdquo;</p>\r\n\r\n<p>&ldquo;In addition, members will also be among the first to be invited to future Malton property launches with exclusive benefits and extra savings,&rdquo; added Choo.</p>\r\n\r\n<p>Esther Chong said she was a repeat buyer of The Park 2 after her first unit at The Park Sky Residence in Bukit Jalil City.</p>\r\n\r\n<p>&ldquo;I like the property because of the Pavilion branding and The Park 2 comes with an exclusive access to the Pavilion Bukit Jalil mall via a covered link-bridge. The good location attracted me to buy again,&rdquo; said Chong.</p>\r\n\r\n<p>Another The Park 2 buyer who recently collected her keys Carmen Yuen said the unit was beautiful and she was mesmerised by the serenity of nature with a breathtaking view of the Bukit Jalil Recreational Park from her living room.</p>\r\n\r\n<p>&ldquo;I can just take a leisurely walk or jog in the nearby park, and shop and dine conveniently anytime from my doorstep. It&rsquo;s also close to my office,&rdquo; she said.</p>\r\n\r\n<p>Set to open its door to shoppers on Dec 3, the highly anticipated Pavilion Bukit Jalil - The Icon of Connectivity - is nestled within the 20-ha integrated Bukit Jalil City development with a staggering 1.8 million sq ft in retail space.</p>\r\n\r\n<p>Being the largest shopping mall in the Kuala Lumpur southern corridor, Pavilion Bukit Jalil will offer a vibrant retail mix, gastronomical wonders and</p>\r\n\r\n<p>innovative recreation opportunities, reinforcing its position as the lifestyle shopping destination connected to the best-in-class retail, dining and leisure.</p>\r\n\r\n<p>To offer the best-in class shopping experience, Pavilion Bukit Jalil will be introducing a holistic loyalty programme for shoppers, offering specially curated membership privileges. This card-less loyalty programme will be accessible via a mobile app platform where shoppers can also discover the best deals, collect rewards as they spend and smartly assist in in-mall discovery and navigation to Pavilion Bukit Jalil&rsquo;s uniquely curated tenant list.</p>\r\n\r\n<p>The Icon of Connectivity is positioned to be the new social haven and epicentre for exciting events and immersive lifestyle with its mega event spaces of 28,000 sq ft Piazza, the first-of-its-kind outdoor venue covered with an impressive 35m high canopy for outdoor entertainment, concerts, and events.</p>\r\n\r\n<p>The 4,500 sq ft Centre Court will host grand festivities and year-long activities while consumer fairs and exhibitions will thrive at the 47,000 sq ft exhibition centre.</p>\r\n\r\n<p>Emerging as an iconic landmark in Malaysia with strong population catchment and excellent infrastructure, Bukit Jalil City comprising retail, residential, commercial and hospitality components, has grown fast to become the most-sought after address in Bukit Jalil. Launched in 2015 with gross development value of approximately RM4bil, the flagship development consists of the soon-to-be unveiled Pavilion Bukit Jalil supported by growing population from high-rise residential; The Park Sky Residence and The Park 2, The Park Signature Shop Offices and a boutique hotel.</p>', '<p>Malton Berhad has started handing over keys to privileged owners of The Park 2 Pavilion Bukit Jalil where living meets world class retail - Pavilion Bukit Jalil - at their doorstep.</p>\r\n\r\n<p>The Park 2 homeowners will embark on a new home that offers urban cosmopolitan living with direct access to best-in class shopping and dining, entertainment and lush green parkland via exclusive link bridges within the iconic 20ha Bukit Jalil City.</p>\r\n\r\n<p>Despite several movement control orders, Malton has successfully completed the two residential towers comprising 709 units of luxury serviced apartments on schedule.</p>\r\n\r\n<p>The Park 2 achieved 81% CIBD Malaysia QLASSIC score in workmanship quality, a testament of Malton&rsquo;s steadfast commitment to continuously deliver quality homes to its homebuyers.</p>\r\n\r\n<p>Today, The Park 2 is highly accessible with ready amenities and infrastructure in place anchored by newly improved road systems with elevated flyovers by Malton, along withmajor highways such as Kesas, Maju Expressway, Bukit Jalil Highway and other major roads. Nearby public transportation is LRT Awan Besar attracting a ridership of 6.5 million. Population catchment is strong and businesses are flourishing within this integrated city with a vibrant retail mix.</p>\r\n\r\n<p>Commanding a panoramic view to the ever-popular 32-ha Bukit Jalil Recreational Park, The Park 2 with a pair of tall, sleek towers comprising 52 and 50 storeys are the newest addition to redefine the Bukit Jalil City skyline.</p>\r\n\r\n<p>&ldquo;Congratulations, we warmly welcome The Park 2 homeowners to a world where convenience meets luxury lifestyle. A world-class retail experience at Pavilion Bukit Jalil regional mall and 32-ha Bukit Jalil Recreational Park await you at your doorstep via exclusive direct link bridges.&rdquo;</p>\r\n\r\n<p>&ldquo;True to our promise of developing a self-sustaining city, Bukit Jalil City is a well-connected community where everything is within walking distance from residential, shopping and entertainment hub, offices, commercial shops to lush green spaces.</p>\r\n\r\n<p>&ldquo;Residents can live, work, shop and play within close proximity to one another, a truly unique lifestyle beyond home with a level of privileges, connectivity and serenity,&rdquo; said Malton Berhad property development chief executive officer Kelvin Choo.</p>\r\n\r\n<p>&ldquo;With the soon-to-be launched &lsquo;MyMalton&rsquo; one-stop mobile app, residents at Bukit Jalil City will enjoy hassle-free solutions with real-time data such as billing statements, facility bookings, visitors and other property related matters. Integrated with exclusive Pavilion privileges, residents will also enjoy premium services and rewards, as well as dining to shopping benefits at Pavilion Bukit Jalil.&rdquo;</p>\r\n\r\n<p>&ldquo;In addition, members will also be among the first to be invited to future Malton property launches with exclusive benefits and extra savings,&rdquo; added Choo.</p>\r\n\r\n<p>Esther Chong said she was a repeat buyer of The Park 2 after her first unit at The Park Sky Residence in Bukit Jalil City.</p>\r\n\r\n<p>&ldquo;I like the property because of the Pavilion branding and The Park 2 comes with an exclusive access to the Pavilion Bukit Jalil mall via a covered link-bridge. The good location attracted me to buy again,&rdquo; said Chong.</p>\r\n\r\n<p>Another The Park 2 buyer who recently collected her keys Carmen Yuen said the unit was beautiful and she was mesmerised by the serenity of nature with a breathtaking view of the Bukit Jalil Recreational Park from her living room.</p>\r\n\r\n<p>&ldquo;I can just take a leisurely walk or jog in the nearby park, and shop and dine conveniently anytime from my doorstep. It&rsquo;s also close to my office,&rdquo; she said.</p>\r\n\r\n<p>Set to open its door to shoppers on Dec 3, the highly anticipated Pavilion Bukit Jalil - The Icon of Connectivity - is nestled within the 20-ha integrated Bukit Jalil City development with a staggering 1.8 million sq ft in retail space.</p>\r\n\r\n<p>Being the largest shopping mall in the Kuala Lumpur southern corridor, Pavilion Bukit Jalil will offer a vibrant retail mix, gastronomical wonders and</p>\r\n\r\n<p>innovative recreation opportunities, reinforcing its position as the lifestyle shopping destination connected to the best-in-class retail, dining and leisure.</p>\r\n\r\n<p>To offer the best-in class shopping experience, Pavilion Bukit Jalil will be introducing a holistic loyalty programme for shoppers, offering specially curated membership privileges. This card-less loyalty programme will be accessible via a mobile app platform where shoppers can also discover the best deals, collect rewards as they spend and smartly assist in in-mall discovery and navigation to Pavilion Bukit Jalil&rsquo;s uniquely curated tenant list.</p>\r\n\r\n<p>The Icon of Connectivity is positioned to be the new social haven and epicentre for exciting events and immersive lifestyle with its mega event spaces of 28,000 sq ft Piazza, the first-of-its-kind outdoor venue covered with an impressive 35m high canopy for outdoor entertainment, concerts, and events.</p>\r\n\r\n<p>The 4,500 sq ft Centre Court will host grand festivities and year-long activities while consumer fairs and exhibitions will thrive at the 47,000 sq ft exhibition centre.</p>\r\n\r\n<p>Emerging as an iconic landmark in Malaysia with strong population catchment and excellent infrastructure, Bukit Jalil City comprising retail, residential, commercial and hospitality components, has grown fast to become the most-sought after address in Bukit Jalil. Launched in 2015 with gross development value of approximately RM4bil, the flagship development consists of the soon-to-be unveiled Pavilion Bukit Jalil supported by growing population from high-rise residential; The Park Sky Residence and The Park 2, The Park Signature Shop Offices and a boutique hotel.</p>', 'public/uploads/blog/image/1717647598615268.jpg', NULL, 'Property,Urban', 3, '2021-11-27 23:13:19', '2021-11-28 03:28:06');
INSERT INTO `blog_posts` (`id`, `blog_title_en`, `blog_title_bn`, `blog_category_id`, `slug_bn`, `slug_en`, `description_en`, `description_bn`, `image`, `tag_bn`, `tag_en`, `view`, `created_at`, `updated_at`) VALUES
(8, ' Dutch come up with cunning way to create forests for free', NULL, 7, '', 'dutch-come-up-with-cunning-way-to-create-forests-for-free', '<p>In a clearing in the Amsterdamse Bos, a forest on the outskirts of the Dutch capital, is a &ldquo;tree hub&rdquo; where hundreds of saplings, among them hazelnut, sweet cherry, field maple, beech, chestnut and ash, are organised by type.</p>\r\n\r\n<p>The idea behind it is simple: every day unwanted tree saplings were being cleared and thrown away when those young trees could be carefully collected and transplanted to where they are wanted.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Volunteers have already collected thousands of saplings cleared from woodland paths and those unlikely to survive in the forest shade. On Saturday, people will be encouraged to take unwanted saplings or cuttings from their own gardens and give them to 200 tree hub locations across the Netherlands.</p>\r\n\r\n<p>This winter,(More Trees Now) aims to give away 1m young trees to farmers, councils and landowners. The small Dutch foundation hopes this circular practice will become commonplace across northern Europe.</p>\r\n\r\n<p>The Netherlands&nbsp;to91,400 acres], which is about 100m trees,&rdquo; says Hanneke van Ormondt, the campaign manager of Meer Bomen Nu and a member of the&nbsp;climate activism organisation. &ldquo;I don&rsquo;t&nbsp;<a href=\"https://www.theguardian.com/environment/2021/oct/31/how-can-we-grow-new-forests-if-we-dont-have-enough-trees-to-plant\">&nbsp;</a>, but we don&rsquo;t need them; we just need more circular forest management. Everywhere along the path, left and right, is always cleared of shrubs and trees. Replant it! My dream is that every council will open a tree hub where foresters can bring their stuff, and people who want a free tree can come.&rdquo;</p>\r\n\r\n<p>Advertisement</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A pledge to plant significantly more trees by 2030 is a key part of the Netherlands&rsquo; climate change agreements, which&nbsp;&nbsp;have ordered the government to uphold. Across Europe, the EU has promised to plant 3bn trees by 2030, to&nbsp;by at least 44%, and there are strategies to project and extend damaged forests, despite the challenges of</p>\r\n\r\n<p>But while state forests typically use certified plants, there are also plenty of small landholders, farmers and the odd council looking to plant trees but on a tight budget. This is where Meer Bomen Nu believes volunteer organisations can spring up.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;We need more trees for climate change and biodiversity laws,&rdquo; says Van Ormondt. &ldquo;Every tree [takes up] CO2, cools us down, gets the soil healthier, gives out oxygen, provides a home for fauna, birds and insects, cools the cities down &hellip; and makes us happier.&rdquo;</p>\r\n\r\n<p>The Dutch foundation began partly by coincidence, after Urgenda won court cases against the Dutch government to force it to honour its climate pledges.</p>\r\n\r\n<p>&ldquo;One of the ministries said to me that Urgenda has plans to plant trees but the tree nurseries can&rsquo;t deliver them,&rdquo; recalls Van Ormondt. &ldquo;I like a challenge, so in March last year, I went to visit Franke van der Laan from&nbsp;. In the summer, he grows vegetables; in the winter he turns the vegetable patch into a tree hub filled with saplings from the 160 hectares where he does forest management. He started with 10 trees, which he gave away at the end of the season, then 100, then 500.&rdquo;</p>\r\n\r\n<p>By the time Van Ormondt visited the tree hub, Van der Laan had 50,000 saplings, and through the progressive farming foundation&nbsp;, they found 20 volunteers and had planted all of the young trees within three weeks.</p>', '<p>In a clearing in the Amsterdamse Bos, a forest on the outskirts of the Dutch capital, is a &ldquo;tree hub&rdquo; where hundreds of saplings, among them hazelnut, sweet cherry, field maple, beech, chestnut and ash, are organised by type.</p>\r\n\r\n<p>The idea behind it is simple: every day unwanted tree saplings were being cleared and thrown away when those young trees could be carefully collected and transplanted to where they are wanted.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Volunteers have already collected thousands of saplings cleared from woodland paths and those unlikely to survive in the forest shade. On Saturday, people will be encouraged to take unwanted saplings or cuttings from their own gardens and give them to 200 tree hub locations across the Netherlands.</p>\r\n\r\n<p>This winter,(More Trees Now) aims to give away 1m young trees to farmers, councils and landowners. The small Dutch foundation hopes this circular practice will become commonplace across northern Europe.</p>\r\n\r\n<p>The Netherlands&nbsp;to91,400 acres], which is about 100m trees,&rdquo; says Hanneke van Ormondt, the campaign manager of Meer Bomen Nu and a member of the&nbsp;climate activism organisation. &ldquo;I don&rsquo;t&nbsp;<a href=\"https://www.theguardian.com/environment/2021/oct/31/how-can-we-grow-new-forests-if-we-dont-have-enough-trees-to-plant\">&nbsp;</a>, but we don&rsquo;t need them; we just need more circular forest management. Everywhere along the path, left and right, is always cleared of shrubs and trees. Replant it! My dream is that every council will open a tree hub where foresters can bring their stuff, and people who want a free tree can come.&rdquo;</p>\r\n\r\n<p>Advertisement</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A pledge to plant significantly more trees by 2030 is a key part of the Netherlands&rsquo; climate change agreements, which&nbsp;&nbsp;have ordered the government to uphold. Across Europe, the EU has promised to plant 3bn trees by 2030, to&nbsp;by at least 44%, and there are strategies to project and extend damaged forests, despite the challenges of</p>\r\n\r\n<p>But while state forests typically use certified plants, there are also plenty of small landholders, farmers and the odd council looking to plant trees but on a tight budget. This is where Meer Bomen Nu believes volunteer organisations can spring up.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;We need more trees for climate change and biodiversity laws,&rdquo; says Van Ormondt. &ldquo;Every tree [takes up] CO2, cools us down, gets the soil healthier, gives out oxygen, provides a home for fauna, birds and insects, cools the cities down &hellip; and makes us happier.&rdquo;</p>\r\n\r\n<p>The Dutch foundation began partly by coincidence, after Urgenda won court cases against the Dutch government to force it to honour its climate pledges.</p>\r\n\r\n<p>&ldquo;One of the ministries said to me that Urgenda has plans to plant trees but the tree nurseries can&rsquo;t deliver them,&rdquo; recalls Van Ormondt. &ldquo;I like a challenge, so in March last year, I went to visit Franke van der Laan from&nbsp;. In the summer, he grows vegetables; in the winter he turns the vegetable patch into a tree hub filled with saplings from the 160 hectares where he does forest management. He started with 10 trees, which he gave away at the end of the season, then 100, then 500.&rdquo;</p>\r\n\r\n<p>By the time Van Ormondt visited the tree hub, Van der Laan had 50,000 saplings, and through the progressive farming foundation&nbsp;, they found 20 volunteers and had planted all of the young trees within three weeks.</p>', 'public/uploads/blog/image/1717654457339993.jpg', NULL, 'nature', NULL, '2021-11-28 01:02:20', '2021-11-28 01:02:20'),
(9, 'Backpacking Matt', NULL, 8, '', 'backpacking-matt', '<p>I think there&rsquo;s something about the name &ldquo;Matt&rdquo; that raises a person&rsquo;s affinity for traveling.&nbsp;</p>\r\n\r\n<p>&nbsp;owned and run by Matt Kyhnn, is a travel blog that has similar vibes with Nomadic Matt. It has a simplistic design, a memorable content tone, and striking travel photos that bring the blog&rsquo;s stories to life.&nbsp;</p>\r\n\r\n<p>Matt Kyhnn also leverages videos &mdash; providing his audience a more immersive way to enjoy his content.&nbsp;</p>\r\n\r\n<p>Fresh out of college, Matt simply decided that he won&rsquo;t settle for a 9-5 job. Instead, he spent months working and traveling across Ireland, Scotland, and other regions in mainland Europe.&nbsp;</p>\r\n\r\n<p>He then booked a one-way ticket to New Zealand where he now resides. In addition to his blog, Matt also runs his own travel planning and booking website &mdash; Planit NZ.&nbsp;</p>\r\n\r\n<p>Blog Topics</p>\r\n\r\n<ul>\r\n	<li>Travel planning</li>\r\n	<li>Destinations</li>\r\n	<li>Travel gear</li>\r\n</ul>\r\n\r\n<p>Monetization Strategies</p>\r\n\r\n<ul>\r\n	<li>Affiliate marketing</li>\r\n	<li>Planit NZ travel planning and booking services</li>\r\n	<li>Brand collaborations</li>\r\n</ul>', '<p>I think there&rsquo;s something about the name &ldquo;Matt&rdquo; that raises a person&rsquo;s affinity for traveling.&nbsp;</p>\r\n\r\n<p>&nbsp;owned and run by Matt Kyhnn, is a travel blog that has similar vibes with Nomadic Matt. It has a simplistic design, a memorable content tone, and striking travel photos that bring the blog&rsquo;s stories to life.&nbsp;</p>\r\n\r\n<p>Matt Kyhnn also leverages videos &mdash; providing his audience a more immersive way to enjoy his content.&nbsp;</p>\r\n\r\n<p>Fresh out of college, Matt simply decided that he won&rsquo;t settle for a 9-5 job. Instead, he spent months working and traveling across Ireland, Scotland, and other regions in mainland Europe.&nbsp;</p>\r\n\r\n<p>He then booked a one-way ticket to New Zealand where he now resides. In addition to his blog, Matt also runs his own travel planning and booking website &mdash; Planit NZ.&nbsp;</p>\r\n\r\n<p>Blog Topics</p>\r\n\r\n<ul>\r\n	<li>Travel planning</li>\r\n	<li>Destinations</li>\r\n	<li>Travel gear</li>\r\n</ul>\r\n\r\n<p>Monetization Strategies</p>\r\n\r\n<ul>\r\n	<li>Affiliate marketing</li>\r\n	<li>Planit NZ travel planning and booking services</li>\r\n	<li>Brand collaborations</li>\r\n</ul>', 'public/uploads/blog/image/1717654795177674.png', NULL, 'Travel planning', NULL, '2021-11-28 01:07:43', '2021-11-28 01:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_on_header` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_bn`, `category_name_en`, `category_slug_en`, `status`, `category_slug_bn`, `show_on_header`, `created_at`, `updated_at`) VALUES
(4, 'বাংলাদেশ', 'Bangladesh', 'bangladesh', '1', 'banglades', 1, '2021-10-25 16:18:26', '2021-11-10 17:36:39'),
(5, 'দেশজুড়ে', 'CountryWide', 'countrywide', '1', 'desjude', 1, '2021-10-25 16:20:17', '2021-10-25 16:20:17'),
(6, 'আন্তর্জাতিক', 'International', 'international', '1', 'antrjatik', 1, '2021-10-25 16:20:55', '2021-10-25 16:20:55'),
(7, 'খেলাধুলা', 'Sports', 'sports', '1', 'kheladhula', 1, '2021-10-25 16:21:31', '2021-10-25 16:21:31'),
(8, 'বিনোদন', 'Entertainment', 'entertainment', '1', 'binodn', 1, '2021-10-25 16:22:05', '2021-10-25 16:22:05'),
(9, 'ফিচার', 'Feature', 'feature', '1', 'ficar', 1, '2021-10-25 16:22:57', '2021-10-25 16:22:57'),
(10, 'বাণিজ্য', 'Business', 'business', '1', 'banijz', 1, '2021-10-31 23:37:48', '2021-10-31 23:37:48'),
(11, 'লাইফস্টাইল', 'Lifestyle', 'lifestyle', '1', 'laifstail', 1, '2021-10-31 23:39:25', '2021-10-31 23:39:25'),
(12, 'স্বাস্থ্য', 'Health', 'health', '1', 'swasthz', 1, '2021-10-31 23:42:11', '2021-10-31 23:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `name`, `email`, `message`, `approved`, `created_at`, `updated_at`) VALUES
(1, 23, 13, NULL, 'tamima21@gmail.com', NULL, NULL, '2021-11-28 05:19:50', '2021-11-28 05:19:50'),
(2, 24, 13, NULL, 'tamima21@gmail.com', 'hi', NULL, '2021-11-28 06:03:01', '2021-11-28 06:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `covid_tackers`
--

CREATE TABLE `covid_tackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name_bn`, `district_name_en`, `district_slug_bn`, `district_slug_en`, `division_id`, `created_at`, `updated_at`) VALUES
(8, 'গাজীপুর', 'Gazipur', 'gajeepur', 'gazipur', 4, '2021-10-31 19:39:07', '2021-10-31 21:31:29'),
(9, 'টাঙ্গাইল', 'Tangail', 'tangoail', 'tangail', 4, '2021-10-31 19:42:54', '2021-10-31 21:36:28'),
(10, 'নরসিংদী', 'Narsingdi', 'nrsingdee', 'narsingdi', 4, '2021-10-31 19:43:43', '2021-10-31 21:37:19'),
(11, 'ফেনী', 'Feni', 'fenee', 'feni', 5, '2021-10-31 19:47:57', '2021-10-31 21:40:06'),
(12, 'কক্স বাজার', 'Cox\'s Bazar', 'kks-bajar', 'coxs-bazar', 5, '2021-10-31 19:51:02', '2021-10-31 21:41:09'),
(13, 'নাটোর', 'Natore', 'nator', 'natore', 6, '2021-10-31 20:03:55', '2021-10-31 20:03:55'),
(14, 'পাবনা', 'Pabna', 'pabna', 'pabna', 6, '2021-10-31 20:05:43', '2021-10-31 20:05:43'),
(15, 'নেত্রকোণা', 'Netrokona', 'netrkona', 'netrokona', 7, '2021-10-31 20:12:36', '2021-10-31 20:12:36'),
(16, 'জামালপুর', 'Jamalpur', 'jamalpur', 'jamalpur', 7, '2021-10-31 20:13:31', '2021-10-31 20:13:31'),
(17, 'দিনাজপুর', 'Dinajpur', 'dinajpur', 'dinajpur', 8, '2021-10-31 21:06:27', '2021-10-31 21:06:27'),
(18, 'কুরিগ্রাম', 'Kurigram', 'kurigram', 'kurigram', 8, '2021-10-31 21:07:36', '2021-10-31 21:07:36'),
(19, 'বাঘেরহাট', 'Bagerhat', 'bagherhat', 'bagerhat', 9, '2021-10-31 21:09:19', '2021-10-31 21:09:19'),
(20, 'যশোর', 'Jashore', 'zsor', 'jashore', 9, '2021-10-31 21:14:00', '2021-10-31 21:14:00'),
(21, 'হাবিবগঞ্জ', 'Habiganj', 'habibgnj', 'habiganj', 10, '2021-10-31 21:19:03', '2021-10-31 21:19:03'),
(22, 'মৌলবীবাজার', 'Moulvibazar', 'moulbeebajar', 'moulvibazar', 10, '2021-10-31 21:19:51', '2021-10-31 21:19:51'),
(23, 'ভোলা', 'Bhola', 'vola', 'bhola', 11, '2021-10-31 21:24:57', '2021-10-31 21:24:57'),
(24, 'পটুয়াখালী', 'Patuakhali', 'ptuyakhalee', 'patuakhali', 11, '2021-10-31 21:25:45', '2021-10-31 21:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name_bn`, `division_name_en`, `position`, `division_slug_bn`, `division_slug_en`, `created_at`, `updated_at`) VALUES
(4, 'ঢাকা', 'Dhaka', '1', 'dhaka', 'dhaka', '2021-10-30 16:51:28', '2021-10-30 16:51:28'),
(5, 'চট্টগ্রাম', 'Chittagong', '2', 'cttgram', 'chittagong', '2021-10-30 16:51:53', '2021-10-31 10:27:26'),
(6, 'রাজশাহী', 'Rajshahi', '3', 'rajsahee', 'rajshahi', '2021-10-30 16:52:26', '2021-10-30 16:52:26'),
(7, 'ময়মনসিংহ', 'Mymensingh', '4', 'mzmnsingh', 'mymensingh', '2021-10-30 17:05:47', '2021-10-31 10:25:07'),
(8, 'রংপুর', 'Rangpur', '5', 'rngpur', 'rangpur', '2021-10-30 17:06:21', '2021-10-30 17:06:21'),
(9, 'খুলনা', 'Khulna', '6', 'khulna', 'khulna', '2021-10-30 17:09:26', '2021-10-30 17:09:26'),
(10, 'সিলেট', 'Sylhet', '7', 'silet', 'sylhet', '2021-10-30 17:10:05', '2021-10-31 10:24:48'),
(11, 'বরিশাল', 'Borishal', NULL, 'brisal', 'borishal', '2021-10-31 10:26:57', '2021-10-31 10:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings_backends`
--

CREATE TABLE `general_settings_backends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings_frontends`
--

CREATE TABLE `general_settings_frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings_frontends`
--

INSERT INTO `general_settings_frontends` (`id`, `site_title`, `site_name`, `icon`, `fontend_header_logo`, `footer_logo`, `director_name`, `editor_name`, `publisher_name`, `phone`, `email`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Newspress', 'Newspress', 'public/uploads/backend/header/icon/1717296416569258.jpeg', 'public/uploads/backend/header/logo/1717762895435464.jpeg', 'public/uploads/backend/footer/logo/1717665186531039.jpg', NULL, 'Shojib', 'Reja bhai', '017435345346', 'test@gmail.com', 'Dhaka', '<p>With the idea of imparting programming knowledge, Mr. Sandeep Jain, an IIT Roorkee alumnus started a dream, GeeksforGeeks. Whether programming excites you or you feel stifled, wondering how to prepare for interview questions or how to ace data structure</p>', '2021-11-24 02:11:26', '2021-11-29 05:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `original_filename`, `filename_path`, `image_title_bn`, `image_title_en`, `image_description_bn`, `image_description_en`, `created_at`, `updated_at`) VALUES
(15, 'public/uploads/backend/ads/1717663279015464.png', NULL, 'National Geographic Weekly Wrapper', 'National Geographic Weekly Wrapper', '“This is one of several waterfalls in Pagsanjan Laguna, Philippines. This place can be reached by shooting the rapids with the local boatmen and their dugout canoes. The rainy season makes the river swell and will make the current even more powerful and navigating the river even more treacherous.”', '“This is one of several waterfalls in Pagsanjan Laguna, Philippines. This place can be reached by shooting the rapids with the local boatmen and their dugout canoes. The rainy season makes the river swell and will make the current even more powerful and navigating the river even more treacherous.”', '2021-11-28 03:22:33', '2021-11-28 03:22:33'),
(16, 'public/uploads/backend/ads/1717663618984158.jpg', NULL, 'Butterfly is always beautiful', 'butterfly is always beautiful', '“a flower knows, when its butterfly will return, and if the moon walks out, the sky will understand; but now it hurts, to watch you leave so soon, when I don\'t know, if you will ever come back.”', '“a flower knows, when its butterfly will return, and if the moon walks out, the sky will understand; but now it hurts, to watch you leave so soon, when I don\'t know, if you will ever come back.”', '2021-11-28 03:27:58', '2021-11-28 03:27:58'),
(18, 'public/uploads/backend/ads/1717667056141451.jpg', NULL, 'The kashful story', 'The kashful story', 'There is an artist in him. He paints or, shall we say, he tries to paint subjects that stir, touch or move his mind. His eyes open to nature, he enjoys the beauty of it but his mind habitually streams into exploring greater meanings of the apparent.', 'There is an artist in him. He paints or, shall we say, he tries to paint subjects that stir, touch or move his mind. His eyes open to nature, he enjoys the beauty of it but his mind habitually streams into exploring greater meanings of the apparent.', '2021-11-28 04:22:35', '2021-11-28 04:22:35'),
(19, 'public/uploads/backend/ads/1717667401189423.jpg', NULL, 'an area of land that is higher than the surrounding land', 'an area of land that is higher than the surrounding land', 'At Hill Associates, we excel at creating custom telecommunications and information technology training programs.', 'At Hill Associates, we excel at creating custom telecommunications and information technology training programs.', '2021-11-28 04:28:04', '2021-11-28 04:28:04'),
(20, 'public/uploads/backend/ads/1717667519291870.jpg', NULL, 'Tower bridge', 'Tower bridge', 'Tower Bridge is a Grade I listed combined bascule and suspension bridge in London, built between 1886 and 1894, designed by Horace Jones and engineered by John Wolfe Barry. The bridge crosses the River Thames close to the Tower of London and is one of five London bridges owned and maintained by the Bridge House Estates, a charitable trust founded in 1282. The bridge was constructed to give b…', 'Tower Bridge is a Grade I listed combined bascule and suspension bridge in London, built between 1886 and 1894, designed by Horace Jones and engineered by John Wolfe Barry. The bridge crosses the River Thames close to the Tower of London and is one of five London bridges owned and maintained by the Bridge House Estates, a charitable trust founded in 1282. The bridge was constructed to give b…', '2021-11-28 04:29:57', '2021-11-28 04:29:57'),
(21, 'public/uploads/backend/ads/1717668759308776.jpg', NULL, 'kashful', 'kashful', 'kashful', 'kashful', '2021-11-28 04:49:40', '2021-11-28 04:49:40'),
(22, 'public/uploads/backend/ads/1717670238703298.jpg', NULL, NULL, 'Shruti Gupta Kasana’s beautiful portrayal of ‘Mukher Abhibyakti’', NULL, '<p>Indian artist Shruti Gupta Kasana&#39;s solo exhibition, titled &quot;Mukher Abhibyakti&quot; highlighted the form of non-verbal communication through its vividly presented portraits.</p>\r\n\r\n<p>The exhibition run in Dhaka Gallery from November 12-15 and the opening ceremony had HE Naoki ITO, Japanese Ambassador to Bangladesh, as chief guest.</p>\r\n\r\n<p>Dr Neepa Chowdhury, Director of Indira Gandhi Cultural Centre, High Commission of India, Dhaka and eminent artist &amp; Dean, Faculty of Fine Art, University of Dhaka, Prof Nisar Hossain were also present as the Guest of Honour in the programme.</p>\r\n\r\n<p>Kasana is a fulltime artist and a freelancer fashion designer. The Indian artist is now working as the Consultant to the Indian Apparel Expo Council and the owner of Creative Studio.</p>\r\n\r\n<p>&quot;From an early age my life has been guided by my creative pursuit. I like to experiment with the figurative art forms and elements. My work reveals the sensitive emotions that are often concealed within,&quot; mentions the artist.</p>\r\n\r\n<p>The noted artist graduated from Haryana in Fine Arts in 2000 and later performed her postgraduate in Knitwear Design &amp; Technology from National Institute of Fashion Technology from Mumbai in 2002.</p>', '2021-11-28 05:13:10', '2021-11-28 05:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_12_055444_create_categories_table', 1),
(6, '2021_10_12_062019_create_sub_categories_table', 1),
(7, '2021_10_12_112529_create_divisions_table', 1),
(8, '2021_10_13_084401_create_districts_table', 1),
(9, '2021_10_14_042818_create_sub_districts_table', 1),
(10, '2021_10_15_124648_modify_field_to_categories_table', 1),
(11, '2021_10_15_125156_add_field_to_categories_table', 1),
(12, '2021_10_15_145502_modify_field_to_divisions_table', 1),
(13, '2021_10_15_145722_add_field_to_divisions_table', 1),
(14, '2021_10_16_184812_modify_field_to_sub_categories_table', 1),
(15, '2021_10_16_185000_add_field_to_sub_categories_table', 1),
(16, '2021_10_17_050934_create_image_galleries_table', 1),
(17, '2021_10_17_054851_create_s_e_o_s_table', 1),
(18, '2021_10_18_091635_create_video_galleries_table', 1),
(19, '2021_10_18_093314_create_general_settings_frontends_table', 1),
(20, '2021_10_18_093335_create_general_settings_backends_table', 1),
(21, '2021_10_19_060238_create_social_links_table', 1),
(22, '2021_10_19_061200_modify_field_to_districts_table', 1),
(23, '2021_10_19_061428_add_field_to_districts_table', 1),
(24, '2021_10_19_100057_create_page_tables_table', 1),
(25, '2021_10_19_104215_modify_field_to_sub_districts_table', 1),
(26, '2021_10_19_104357_add_field_to_sub_districts_table', 1),
(27, '2021_10_20_111344_create_posts_table', 1),
(28, '2021_10_20_113303_create_reporters_table', 1),
(29, '2021_10_21_102240_modify_field_to_general_settings_frontends', 1),
(30, '2021_10_21_110145_create_covid_tackers_table', 1),
(31, '2021_10_24_071047_modify_field_to_posts_table', 1),
(32, '2021_10_24_095053_create_blog_categories_table', 1),
(33, '2021_10_24_095141_create_blog_posts_table', 1),
(34, '2021_10_27_052408_modify_column_to_blog_posts_table', 1),
(35, '2021_10_31_043847_insert_column_to_blog_posts_table', 1),
(36, '2021_10_31_103637_insert_column_to_divisions_table', 1),
(37, '2021_11_03_045854_create_on_offs_table', 1),
(38, '2021_11_04_051903_insert_column_to_page_tables_table', 1),
(39, '2021_11_04_071209_modify_column_to_page_tables_table', 1),
(40, '2021_11_08_054549_create_advertisements_table', 1),
(41, '2021_11_10_061619_create_comments_table', 1),
(42, '2021_11_10_151810_create_blog_comments_table', 1),
(43, '2021_11_14_050503_insert_and_modify_column_to_users_table', 1),
(44, '2021_11_16_074851_insert_column_to_comments_table', 1),
(45, '2021_11_18_183437_insert_column_to_blog_comments_table', 1),
(46, '2021_11_21_082120_insert_column_to_posts_table', 1),
(47, '2021_11_24_093711_create_notifications_table', 2),
(48, '2021_11_25_075604_add_column_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sent_by` bigint(20) UNSIGNED DEFAULT NULL,
  `sent_for` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sent_by`, `sent_for`, `post_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 12, 13, 'Your post will moved to Correction list due to some problem please check', 'read', '2021-11-27 22:28:50', '2021-11-27 22:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `on_offs`
--

CREATE TABLE `on_offs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `live_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_tables`
--

CREATE TABLE `page_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_title_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_title_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subdistrict_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breaking_news` int(11) NOT NULL DEFAULT 0,
  `add_image_gallery` int(11) NOT NULL DEFAULT 0,
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
  `stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `currection_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `sub_category_id`, `user_id`, `division_id`, `district_id`, `subdistrict_id`, `title_en`, `title_bn`, `slug_en`, `slug_bn`, `image`, `details_en`, `details_bn`, `tags_en`, `tags_bn`, `headline_en`, `breaking_news`, `add_image_gallery`, `thumbnail_select`, `first_section`, `category_first_section`, `subcategory_first_section`, `division_first_section`, `district_first_section`, `published_date`, `headline`, `year`, `month`, `view`, `stage`, `currection_image`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 15, NULL, 6, 13, NULL, 'INTERACTIVE: Why embroidery, cross-stitch, and knitting are trending in Malaysia', NULL, 'interactive-why-embroidery-cross-stitch-and-knitting-are-trending-in-malaysia', '', 'public/uploads/backend/ads/1717219424779027.jpg', '<p>PETALING JAYA: Since the start of the pandemic and numerous movement control orders, many Malaysians have turned to productive activities to keep boredom at bay. Some have turned to hobbies such as gardening, cooking, stamp collecting and learning a new DIY skill.<br />\r\n<br />\r\nThe stay-at-home period has seen a resurgence in craft activities too.<br />\r\n<br />\r\nSome crafters are revisiting old hobbies like patchwork, crochet and knitting, while others are learning new skills like embroidery and sewing.<br />\r\n<br />\r\nSince the first MCO, more people in Malaysian have gone online to search for topics related to needle crafting.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>According to data from Google Trends, the key words &quot;crochet&quot; and &quot;embroidery&quot;, for example, saw a noticeable increase in popularity in Malaysia when compared to the period before the pandemic.</p>', NULL, 'NATION', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17', NULL, NULL, NULL, 11, 'pending', NULL, NULL, NULL, '2021-11-23 05:47:41', '2021-11-29 03:25:13'),
(3, 11, NULL, NULL, 11, 24, NULL, 'Revamp your winter closet with Twelve Clothing', NULL, 'revamp-your-winter-closet-with-twelve-clothing', '', 'public/uploads/backend/ads/1717285856891994.jpg', '<p>The slow onset of chill in the air and dusky skies are not only an indication that winter is knocking at the door, but also a welcome nod to the festive season. Despite the cool atmosphere that beckons us to get comfortably wrapped inside blankets, this season for Bangladeshis is also defined by wedding festivities and adventure trips.</p>\r\n\r\n<p>To add more fun and colour to the festive season and winter outings, Twelve Clothing, a concern of TEAM Group brings to you their amazing line for winter items. Twelve Clothing is a lifestyle brand that caters to the ever-altering needs of the younger generation by constantly introducing attire that is trendy and up-to-the-minute chic.</p>', NULL, 'Fashion & Beauty', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-16', NULL, NULL, NULL, 9, 'pending', NULL, NULL, NULL, '2021-11-23 23:23:35', '2021-11-30 01:28:02'),
(5, 11, NULL, 12, 8, 17, 15, 'Uber users in Canada\'s Ontario can place cannabis orders on its food delivery app', NULL, 'uber-users-in-canadas-ontario-can-place-cannabis-orders-on-its-food-delivery-app', '', 'public/uploads/backend/ads/1717294108211489.jpg', '<p>Uber Technologies Inc will allow users in Ontario, Canada, to place orders for cannabis on its Uber Eats app, marking the ride-hailing giant&#39;s foray into the booming business, a company spokesperson said on Monday.</p>\r\n\r\n<p>Uber Eats will list cannabis retailer Tokyo Smoke on its marketplace on Monday, following which customers can place orders from the Uber Eats app and then pick it up at their nearest Tokyo Smoke store, the spokesperson said.</p>', NULL, 'Life & Living', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-08', NULL, NULL, NULL, 7, 'pending', NULL, NULL, NULL, '2021-11-24 01:34:44', '2021-11-28 06:18:43'),
(6, 9, 15, 12, 6, 14, 12, 'In search of safe, affordable and clean electricity', NULL, 'in-search-of-safe-affordable-and-clean-electricity', '', 'public/uploads/backend/ads/1717299728171172.jpg', '<p>Following the 2011 nuclear disaster in Japan&#39;s Fukushima, nuclear power&#39;s share in global electricity-generation saw a staggering decline from 13 percent to 10 percent. Should the trend continue, will nuclear power be of any consequence in the global energy mix of the future? If not, how will the world&#39;s electricity demand be met with nuclear power out of the picture? Can Germany, Italy, Japan and South Korea become partners in building the proverbial green &quot;utopia&quot; based on renewable energy?</p>\r\n\r\n<p>As of today, a total of 443 reactors&mdash;including a Generation-1, 405 Generation-2, 36 Generation-3/3+ and one Generation-4&mdash;are operational in 32 countries. Another 46 Generation-3/3+ reactors are under construction in 17 countries. Plus, a total of 406 Generation-1 and Generation-2 reactors will reach redundancy between 2030 and 2040. On the other hand, Germany currently has eight reactors in operation, all of which will be shut down by 2022. Twenty-six reactors are already in their decommissioning stage. By phasing out its reactors, Germany will revert to the stage Italy is currently in. Japan and South Korea seem to be following suit. The United States saw the largest commissioning of reactors in the 1970s and has built a total of 104 reactors since. At present, the country has 94 reactors in operation. Only two reactors are currently under construction in the United States. If this situation continues, they, too, are likely to be dropped out of the list of nuclear power-producing countries by 2040 or 2050.</p>', NULL, 'Opinion', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-08', NULL, NULL, NULL, 4, 'pending', NULL, NULL, NULL, '2021-11-24 03:04:04', '2021-11-29 05:58:23'),
(7, 9, 15, 12, 5, 12, 10, 'A plea for life and progress in harmony with nature', NULL, 'a-plea-for-life-and-progress-in-harmony-with-nature', '', 'public/uploads/backend/ads/1717300192410847.jpg', '<p>Two high-profile environmental conferences&mdash;the UN Biodiversity Conference under the Convention of Biological Diversity (CBD) and the UN Climate Change Conference under the United Nations Framework Convention on Climate Change (UNFCCC)&mdash;were held recently in Kunming, China and Glasgow, Scotland, respectively. The biodiversity conference recognised that change in land and sea use, overexploitation, climate change, pollution, and invasive alien species are the main drivers behind biodiversity loss worldwide. Following that recognition, world leaders pledged to reverse the current trends of biodiversity loss by 2030 and envisioned living in harmony with nature by 2050. In this context, it is vital to note that saving nature and biodiversity is the key to solving climate-induced socioecological problems. Rightly so, the UN climate conference has emphasised reducing deforestation by 2030. Climate scientists and activists have also called for saving nature and utilising nature-based goods and services to tackle climate-induced problems&mdash;popularly known as &quot;Nature-based Solutions&quot; (NbS) to climate change. These conferences, ideas, and pledges suggest that conservation of nature and biodiversity is necessary to tackle climate change, thereby vital for our survival and existence.</p>\r\n\r\n<p>Now that we realise the importance of conserving nature and biodiversity, we also face the challenge of conserving them while meeting our developmental needs. This is because development often involves clearing forests or natural areas, while conservation actions demand that forests and natural areas remain intact. So, how do we deal with these conflicting interests? One of the ways to do that is to find a balance between development works and conservation. Rightly so, Prime Minister Sheikh Hasina has emphasised building a developed and prosperous Bangladesh, but at the same time, building it green and climate-resilient. That is, the government&#39;s policy is friendly to both development and nature conservation.</p>', NULL, 'Opinion', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-11', NULL, NULL, NULL, 2, 'pending', NULL, NULL, NULL, '2021-11-24 03:11:27', '2021-11-25 04:40:59'),
(8, 11, NULL, 12, 4, 8, 7, 'New Zealand opens for foreign tourists from April 30', NULL, 'new-zealand-opens-for-foreign-tourists-from-april-30', '', 'public/uploads/backend/ads/1717301632906984.jpg', '<p>New Zealand said on Wednesday that fully vaccinated foreign travellers will be able to enter the country from April 30, easing its border curbs that have been in place since the pandemic hit in March of last year.</p>\r\n\r\n<p>Fully vaccinated New Zealanders in Australia can travel to New Zealand without requiring quarantine from Jan. 16, the Covid-19 Response Minister Chris Hipkins also said at a news conference.</p>', NULL, 'Travel', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-08', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-24 03:34:20', '2021-11-24 03:34:20'),
(10, 6, 11, 12, 9, 19, 17, 'Candidate list and key facts on the Melaka state election', NULL, 'candidate-list-and-key-facts-on-the-melaka-state-election', '', 'public/uploads/backend/ads/1717304227439403.jpg', '<p>This is the second time that the state government has collapsed since the 14th general election (GE14) which was held in May 2018.<br />\r\n<br />\r\nPakatan Harapan won Melaka in GE14 when the coalition won 15 of the 28 seats, giving it a narrow two-seat majority.<br />\r\n<br />\r\nThe state government however lasted less than two years.<br />\r\n<br />\r\nIt fell in March last year after two Pakatan Harapan assemblymen - DAP&#39;s Datuk Norhizam Hassan Baktee and PKR&rsquo;s Datuk Muhammad Jailani Khamis announced that they now supported Perikatan Nasional.<br />\r\n<br />\r\nThe Barisan Nasional/Perikatan Nasional-led state government that replaced it also did not last.<br />\r\n<br />\r\nLast month, Umno&#39;s Datuk Seri Idris Haron and Nor Azman Hassan, together with Datuk Noor Effandi Ahmad from Bersatu and Norhizam withdrew their support, leading to the dissolution of the Melaka state assembly.<br />\r\n&nbsp;</p>', NULL, 'international', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09', NULL, NULL, NULL, 15, 'pending', NULL, NULL, NULL, '2021-11-24 04:15:35', '2021-11-30 04:14:39'),
(11, 12, NULL, 12, NULL, NULL, 17, 'Ordering in: A popular food personality\'s stress-free halal steamboat and grill', NULL, 'ordering-in-a-popular-food-personalitys-stress-free-halal-steamboat-and-grill', '', 'public/uploads/backend/ads/1717305258720554.jpg', '<p>Growing up, food personality and television host Ili Sulaiman had a familiar Sunday ritual that grew to be a source of comfort as well as family bonding.</p>\r\n\r\n<p>&ldquo;Every Sunday whenever we get together with my mum&rsquo;s side of the family, we would always have steamboat, because it&rsquo;s so easy to put together,&rdquo; says Ili, who has hosted shows like Family Feast With Ili.</p>\r\n\r\n<p>But the pandemic put a halt to this familiar Sunday routine and Ili found herself at a loss, as she had also just gotten married at that point and realised it was &ldquo;no fun having steamboat with just two people&rdquo;.</p>\r\n\r\n<p>She got to talking with one of her husband&rsquo;s friends, who was interested in setting up a food business and had a host of contacts in China. The two realised that a halal steamboat delivery service was something pandemic-wary Malaysians were likely looking for, which meant they could fill an existing gap in the market.</p>\r\n\r\n<p>&ldquo;When we were doing our market research, we found that there were a lot of halal steamboat restaurants but very few halal steamboat delivery options.</p>\r\n\r\n<p>&ldquo;And I thought if I miss my family and having steamboat, many other families must miss it too because these steamboat restaurants are typically always packed. So I thought, &lsquo;Let&rsquo;s just try lah&rsquo;. I am not scared of taking chances, that&rsquo;s the entrepreneur part of me that I can&rsquo;t shake off,&rdquo; she says, laughing.</p>\r\n\r\n<p>Ili used the first movement control order period last year to test out her recipes for soup bases, marinades and sauces. But launching the business later in the year proved to be an uphill battle rife with challenges.</p>\r\n\r\n<p>&ldquo;Oh, there were so many challenges! Because of the MCO, everything was done through WhatsApp, when normally we would go and physically check what suppliers can offer. And in terms of hiring and training staff, everything had to be done remotely. And this was pre-vaccine, so we were spending so much money testing everyone for Covid-19.</p>\r\n\r\n<p>&ldquo;And then all our imported products were stuck and we had to wait for the borders to reopen. We had every problem you could think of when opening a business! But it was a great opportunity to enter the market, so we didn&rsquo;t let the challenges burden us too much. We just took each day as it came,&rdquo; says Ili.</p>\r\n\r\n<p>Ili launched her fledgling halal steamboat delivery service called Ili Pot in October last year and says response has been tremendous, growing organically from her own fan base to a wider demographic of Malaysians who have utilised Ili Pot for all sorts of family celebrations at home, whether that&rsquo;s a family reunion, birthday gathering, anniversary party or even out-of-home picnics or camping trips.</p>\r\n\r\n<p>This is likely because Ili Pot offers a comprehensive range of curated steamboat and grill options to satiate even the most finicky eaters. From seafood to carnivorous meals, poultry staples and everything in between, there&rsquo;s a set designed for you and your family, with affordable price points to match.</p>\r\n\r\n<p>As a starting point, you could opt for the Set Madu Tiga Steamboat (RM99.90) which is meant to feed three people (or two very hungry individuals). The set is replete with chicken slices, corn, broccoli, enoki mushroom, Thai fish cakes, bursting prawn balls, fried beancurd sheets, shabu-shabu mee and Ili&rsquo;s signature &ldquo;gila hot&rdquo; sauce.</p>\r\n\r\n<p>This is likely because Ili Pot offers a comprehensive range of curated steamboat and grill options to satiate even the most finicky eaters. From seafood to carnivorous meals, poultry staples and everything in between, there&rsquo;s a set designed for you and your family, with affordable price points to match.</p>\r\n\r\n<p>As a starting point, you could opt for the Set Madu Tiga Steamboat (RM99.90) which is meant to feed three people (or two very hungry individuals). The set is replete with chicken slices, corn, broccoli, enoki mushroom, Thai fish cakes, bursting prawn balls, fried beancurd sheets, shabu-shabu mee and Ili&rsquo;s signature &ldquo;gila hot&rdquo; sauce.</p>\r\n\r\n<p>Ili&rsquo;s intention with all her sets is to provide everything that is required to put together a steamboat or grill party with minimal fuss.</p>\r\n\r\n<p>&ldquo;I wanted it to be like everything is thought out, so you can just sit down and enjoy a meal with your family, the way I do with my own. So we tried to think of everything,&rdquo; she says.</p>', NULL, 'FOOD NEWS', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-25', NULL, NULL, NULL, 7, 'pending', NULL, NULL, NULL, '2021-11-24 04:31:58', '2021-11-29 05:00:41'),
(12, 4, 5, 12, 4, 9, 9, 'HC issues contempt of court against man fleeing country with child', NULL, 'hc-issues-contempt-of-court-against-man-fleeing-country-with-child', '', 'public/uploads/backend/ads/1717306351395187.jpg', '<p>The High Court yesterday issued a contempt of court rule against one Saniur TIM Nabi for leaving the country with his three-year old boy ignoring its earlier directive</p>\r\n\r\n<p>The court also summoned Saniur&#39;s father TM <strong>.</strong>Nabi to appear before it on December 7 for posting a derogatory Facebook post about it.</p>\r\n\r\n<p>The bench of Justice M Enayetur Rahim and Justice Md Mostafizur Rahman passed the order while hearing a petition filed by Indian national Sadika Sheikh, mother of child, seeking necessary directives.</p>\r\n\r\n<p>The HC ordered the authorities concerned of the government to suspend the &quot;effectiveness&quot; of the Bangladeshi passport of Saniur TIM Nabi.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'national', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-10', NULL, NULL, NULL, 2, 'pending', NULL, NULL, NULL, '2021-11-24 04:49:20', '2021-11-28 04:47:07'),
(13, 5, 10, 12, 11, NULL, 8, 'Poor diets imperilling the planet', NULL, 'poor-diets-imperilling-the-planet', '', 'public/uploads/backend/ads/1717308984679199.jpg', '<p>Nearly half the world&#39;s population suffer from poor nutrition linked to too much or not enough food, a global assessment said yesterday with wide-ranging impacts on health and the planet.</p>\r\n\r\n<p>The Global Nutrition Report (GNR), a yearly survey and analysis of the latest data on nutrition and related health issues, found that 48 percent of people currently eat either too little or too much -- resulting in them being overweight, obese or underweight.</p>\r\n\r\n<p>At current rates, the report finds, the world will fail to meet eight out of nine nutrition targets set by the World Health Organization for 2025.</p>\r\n\r\n<p>These include reducing child wasting (when children are too thin for their height) and child stunting (when they are too short for their age).</p>', NULL, 'national', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-28', NULL, NULL, NULL, 1, 'correction_return', 'public/uploads/backend/admin/post_currection_image1717644799670827.jpg', NULL, NULL, '2021-11-24 05:31:12', '2021-11-27 22:32:07'),
(14, 7, 9, 12, 8, 17, 15, 'Chelsea thrash Juve 4-0 to reach Champions League knockout stage', NULL, 'chelsea-thrash-juve-4-0-to-reach-champions-league-knockout-stage', '', 'public/uploads/backend/ads/1717310386240539.jpg', '<p>Chelsea claimed a thumping 4-0 victory over Juventus thanks to goals from home-grown trio Trevoh Chalobah, Reece James and Callum Hudson-Odoi and a fourth by Timo Werner to top Champions League Group H and cruise into the knockout stage.</p>\r\n\r\n<p>Defender Chalobah, 22, smacked the ball into the net past the flailing arms of Wojciech Szczesny in the 25th minute after centre back Toni Rudiger set him up from a Hakim Ziyech corner.</p>\r\n\r\n<p>A VAR check dismissed calls for handball against Rudiger.</p>\r\n\r\n<p>James, 21, showed superb technique to angle a shot into the left hand corner of the goal in the 55th and barely three minutes later 21-year-old Hudson-Odoi scored from a layoff by another Academy graduate Ruben Loftus-Cheek.</p>', NULL, 'football', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-16', NULL, NULL, NULL, 1, 'pending', NULL, NULL, NULL, '2021-11-24 05:53:28', '2021-11-28 06:19:52'),
(15, 12, NULL, 12, 5, 12, 10, 'Fabulous feasts to fulfil cravings', NULL, 'fabulous-feasts-to-fulfil-cravings', '', 'public/uploads/backend/ads/1717376361197331.jpg', '<p>MISS those eat-all-you-can buffet spreads? Eastern and Oriental (E&amp;O) Hotel in Penang has the perfect alternative with its Unlimited A La Carte promotions.</p>\r\n\r\n<p>You still get to feast to your heart&rsquo;s content with as many helpings of whatever you like. The only difference is that items are individually plated and served to your table.</p>\r\n\r\n<p>This is great for those who do not fancy making repeated trips to the buffet line. More importantly, it ensures hygiene in line with current health protocols.</p>\r\n\r\n<p>Highlight among the promotions is the Seafood and International Dinner every Friday and Saturday from 6.30pm to 10pm, priced at RM168 for adults and RM88 for children and seniors.</p>\r\n\r\n<p>Enjoy Chilled Seafood or Sushi and Sashimi Platters, followed by your favourite fish and meats hot off the grill.</p>\r\n\r\n<p>Then, order Salmon en Croute, Oven Roasted Rib Eye or Roasted Lamb Leg from the carvery selection.</p>\r\n\r\n<p>Be sure to sample E&amp;O specialties like Salmon Fish Head Curry, Steamed Red Snapper with Ginger Sauce, Seabass with Light Soya Sauce, Wok Fried Chili Crabs, Yellow Curry Crabs, as well as Wok-fried Tiger Prawns in either Ma Xiang or XO Sauces.</p>', NULL, 'health', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17', NULL, NULL, NULL, 3, 'pending', NULL, NULL, NULL, '2021-11-24 23:22:07', '2021-11-29 02:09:21'),
(16, 12, NULL, 12, 7, 15, 13, 'Prawn Dumplings with Coriander', NULL, 'prawn-dumplings-with-coriander', '', 'public/uploads/backend/ads/1717376546943348.jpg', '<p>There is also the Dim Sum and International Lunch every Saturday and Sunday from noon to 2.30pm, priced at RM108 for adults and RM58 for children and seniors.</p>\r\n\r\n<p>Featured items include Barbecued Chicken Buns, Prawn Dumplings with Coriander, Teochew Steamed Fish, Siew Mai with Tobiko, Rice Rolls with Chicken Mushroom and Wok-fried Radish Cake in XO Sauce.</p>\r\n\r\n<p>Besides the specialties, both spreads also offer mouth-watering selections of salads, soups, pastas and local favourites such as Penang Char Kway Teow, Assam Laksa, Hokkien Prawn Mee, Rendang Tok, Dalca Kambing and Satay &mdash; not to mention an irresistible range of desserts.</p>\r\n\r\n<p>Alternatively, there is the Unlimited A La Carte Lunch every Thursday and Friday from noon to 2.30pm, priced at RM99 for adults and RM50 for children and seniors.</p>\r\n\r\n<p>Whichever spread you go for, there is the option of topping up RM99 for free flow of selected beers, wines and spirits, or RM180 for free flow of Prosecco.</p>', NULL, 'health', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-16', NULL, NULL, NULL, 1, 'pending', NULL, NULL, NULL, '2021-11-24 23:25:04', '2021-11-24 23:25:15'),
(17, 7, 8, 12, 8, 18, 16, '‘Right time to end my Test career’', NULL, 'right-time-to-end-my-test-career', '', 'public/uploads/backend/ads/1717377345702462.jpg', '<p>After more than four months since Mahmudullah Riyad&#39;s shocking decision to retire from Test cricket made during the middle of the Zimbabwe Test back in July this year, the Bangladesh Cricket Board (BCB) finally issued an official press release confirming his retirement from the longest format of the game yesterday, a day before the Tigers face Pakistan in the first of the two-match Test series.</p>\r\n\r\n<p>The 35-year-old played his 50th and last Test against Zimbabwe where Bangladesh recorded a 220-run victory. In his final innings, the right-hander made an unbeaten 150, his fifth hundred in Tests, and was also adjudged as the player of the match. Mahmudullah scored 2914 runs at an average of 33.49 and took 43 wickets while also having captained Bangladesh in six Tests.</p>', NULL, 'cricket', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-24', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-24 23:37:46', '2021-11-24 23:37:46'),
(18, 7, 8, 12, 6, 14, 12, 'Sri Lanka four wickets away from big win over West Indies', NULL, 'sri-lanka-four-wickets-away-from-big-win-over-west-indies', '', 'public/uploads/backend/ads/1717377587238995.jpg', '<p>Sri Lanka need just four wickets to win the first Test against West Indies in Galle after setting the all-but-impossible target of 348 on Wednesday&#39;s penultimate day of play.</p>\r\n\r\n<p>West Indies had made just 52 before bad light forced an early end after the hosts&#39; spin trio made quick work of the top order.</p>\r\n\r\n<p>The sensational collapse saw the tourists lose four wickets in 15 balls for just four runs.</p>\r\n\r\n<p>Ramesh Mendis was the pick of the bowlers finishing with four for 17. The off-spinner had the makings of a hat-trick as he trapped Kyle Mayers leg before.</p>', NULL, 'cricket', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-24 23:41:36', '2021-11-24 23:41:36'),
(19, 10, NULL, 12, 6, 13, 11, 'German business morale darkens on supply bottlenecks, Covid wave', NULL, 'german-business-morale-darkens-on-supply-bottlenecks-covid-wave', '', 'public/uploads/backend/ads/1717394410959785.jpeg', '<p>German business morale deteriorated for the fifth month running in November as supply bottlenecks in manufacturing and a spike in coronavirus infections clouded the growth outlook for Europe&#39;s largest economy, a survey showed on Wednesday.</p>\r\n\r\n<p>The Ifo institute said its business climate index fell to 96.5 from 97.7 in October. A Reuters poll of analysts had pointed to a November reading of 96.6.</p>\r\n\r\n<p>&quot;Supply bottlenecks and the fourth wave of the coronavirus are challenging German companies,&quot; Ifo President Clemens Fuest said.</p>\r\n\r\n<p>Company executives were less satisfied with their current business situation and their expectations for the next six months were more pessimistic, the survey showed.</p>', NULL, 'business', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-09', NULL, NULL, NULL, 10, 'pending', NULL, NULL, NULL, '2021-11-25 04:09:01', '2021-11-29 23:03:38'),
(20, 10, NULL, 12, 10, 21, 19, 'Mojar School day out at Fantasy Kingdom', NULL, 'mojar-school-day-out-at-fantasy-kingdom', '', 'public/uploads/backend/ads/1717395154991645.jpeg', '<p>In our society, not all children are equally fortunate. Some of them have had major problems since birth, and they are tragically referred to as &quot;Street kids&quot; in our culture. These unfortunate youngsters are also entitled to happiness, which they have been seeking their entire lives. Fantasy Kingdom Complex has prepared a day out in the park for these children with 300 free tickets, free rides, transportation, and meals for all of them.</p>\r\n\r\n<p>Odommo Foundation&#39;s Mojar School is a philanthropic endeavour. Mojar School, in collaboration with Concord Group, has made this desire a reality for them, which they could only imagine of in their dreams.</p>\r\n\r\n<p>Fantasy kingdom planned a day-long visit for 150 students from Mojar School on November 13, 2021. The following week, on November 20th, 2021, 150 more youngsters came to the Fantasy Kingdom. This was a joyous occasion for all of the youngsters, as well as Mojar School. Leaving their sorrows behind, the children made the most of the day and had a great time.</p>\r\n\r\n<p>Mr Anup Kumar Sarker, Executive Director of Concord Entertainment, emphasized that people in every tier of society have responsibilities to the community. Concord Entertainment Co. Ltd. is wholeheartedly concerned about this. This amusement park is the main draw for these sweet-natured kids. However, due to insolvency in their daily lives, it is quite difficult for them to enjoy a day out like this and ride all of the rides with enthusiasm. As a result, Fantasy Kingdom is honoured to collaborate with Mojar School in bringing this happy event to life. Tomorrow&#39;s children are today&#39;s children. For these children&#39;s appropriate development, we should all attend to their need for happiness and joy. These destitute street kids, like our own children, have an equal right to all social services.</p>\r\n\r\n<p>During the pandemic, all children were quarantined in their homes. During that period, the government shut down all amusement parks, including Fantasy Kingdom. Following the lifting of the lockdown, this action by Mojar School and Fantasy Kingdom for these street kids is significant, and it will hopefully inspire others to follow suit and make these youngsters joyful.</p>', NULL, 'business', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17', NULL, NULL, NULL, 5, 'pending', NULL, NULL, NULL, '2021-11-25 04:20:50', '2021-11-29 04:25:08'),
(21, 10, NULL, 12, 4, 10, NULL, 'Imports imperil Jordanian makers of handcrafted shoes', NULL, 'imports-imperil-jordanian-makers-of-handcrafted-shoes', '', 'public/uploads/backend/ads/1717395490418720.jpg', '<p>He was once dubbed the &quot;King of Shoes&quot;, but after decades of fashioning footwear for kings, queens and presidents, 90-year-old Jamil Kopti fears cheap imports are killing off his craft.</p>\r\n\r\n<p>&quot;We started losing customers one after another, and we kept losing stores until we closed down three shops,&quot; said Kopti, believed to be Jordan&#39;s oldest maker of handcrafted shoes.</p>\r\n\r\n<p>&quot;In the past five years, our profession began to decline dramatically in face of imported foreign shoes that flooded the market,&quot; he sighed, surveying his once prosperous workshop.</p>\r\n\r\n<p>Now he has just five workers, a far cry from the 42 staff he used to employ.</p>\r\n\r\n<p>And around the workshop in the popular Al-Jofeh district of Amman, hundreds of moulds lie gathering dust.</p>\r\n\r\n<p>After entering the trade in 1949 at just 18, Kopti attended shoe fairs every year in Bologna and Paris.</p>\r\n\r\n<p>In 1961, at a show at the University of Jordan, he met the late King Hussein and gifted him four pairs of handmade shoes. Hussein became an instant fan, particularly of black, formal shoes, and &quot;after that, and for 35 years, I made the king&#39;s shoes&quot;.</p>\r\n\r\n<p>&quot;He loved classic shoes,&quot; said Kopti, proudly showing off two old photos on his phone of him and the late monarch.</p>\r\n\r\n<p>He was awarded Jordan&#39;s Independence Medal and was a frequent palace guest on special occasions.</p>\r\n\r\n<p>And Kopti&#39;s fame spread. In 1964, the monarch visited France where he met then president Charles de Gaulle.</p>\r\n\r\n<p>&quot;All the time during the meeting ... he had his eyes on my shoes and when he asked me where I got them from I told him &#39;They were made in Amman&#39;,&quot; the king told Kopti.</p>\r\n\r\n<p>&quot;King Hussein asked me to make two pairs of shoes for de Gaulle,&quot; said Kopti, adding &quot;his shoe size was very big&quot;. According to the country&#39;s Shoe Manufacturers Association, there used to be over 250 shoe workshops and factories in Jordan, employing about 5,000 people.</p>\r\n\r\n<p>Today &quot;we have around 100 workshops and less than 500 workers&quot;, said Naser Theyabat, head of the association.</p>\r\n\r\n<p>During his long career, Kopti has made shoes for the new King Abdullah II and most of Jordan&#39;s princes and princesses, as well as top politicians and military officers.</p>\r\n\r\n<p>Using imported leather from France, Italy, and Germany, his workshop once made 200 pairs of shoes a day.</p>\r\n\r\n<p>Nowadays it is more like 10 pairs, forcing him to turn to medical shoes and children&#39;s footwear.</p>\r\n\r\n<p>But Kopti believes his loyal customers will help him survive, pointing to one client he has served for 50 years.</p>\r\n\r\n<p>Handmade leather shoemakers had a &quot;golden age&quot; in the 1980s and 1990s, recalls Theyabat.</p>\r\n\r\n<p>However with time, imports have increased.</p>\r\n\r\n<p>Textile, Readymade Clothes and Footwear Syndicate head Sultan Allan said that before the Covid-19 pandemic Jordan imported about 44 million dinars ($62 million) worth of shoes annually.</p>\r\n\r\n<p>These figures are likely to decrease due to the repercussions of the epidemic.</p>\r\n\r\n<p>&quot;This craft is on the verge of extinction,&quot; said Theyabat, lamenting that Jordanian shoemakers received little support.</p>\r\n\r\n<p>&quot;On the contrary, there was a policy to flood the market with Chinese-made shoes.&quot;</p>\r\n\r\n<p>In the Marina workshop in an old building of the Ashrafiyeh district, three shoemakers were sewing on soles, adding heels, and trimming off leather, watched by owner Zouhair Shiah.</p>\r\n\r\n<p>&quot;The terrible decline started in 2015 when the market was flooded with Chinese, Vietnamese, Syrian and Egyptian-made shoes,&quot; the 71-year-old told AFP.</p>\r\n\r\n<p>&quot;I had 20 workers and I am left with three. We used to make 60 to 70 pairs of shoes a day compared to less than 12 today.&quot;</p>\r\n\r\n<p>Holding up a shoe, he pointed out it was &quot;strong and durable&quot; and said the pair cost 20 dinars ($28). &quot;Our profit is very low.&quot;</p>\r\n\r\n<p>Shiah is hoping for government support to &quot;reduce taxes ... because we have debts that we cannot pay&quot;.</p>\r\n\r\n<p>Bent over a machine cutting leather, white-haired Youssef Abu Sarita recalled: &quot;I started doing this 50 years ago. I love this job and know nothing else.</p>\r\n\r\n<p>&quot;What is happening to us is sad. Most of the workshops closed and their workers have left,&quot; he said.</p>\r\n\r\n<p>&quot;I am sure that we will face the same fate, but I do not know when.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'business', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-25', NULL, NULL, NULL, 11, 'pending', NULL, NULL, NULL, '2021-11-25 04:26:10', '2021-11-29 03:35:18'),
(22, 10, NULL, 12, 5, 11, 8, 'Japan working on release of oil reserves after US request', NULL, 'japan-working-on-release-of-oil-reserves-after-us-request', '', 'public/uploads/backend/ads/1717395748690885.jpg', '<p>Japan is considering the unprecedented release of state oil reserves after a request from Washington for coordinated action to combat soaring energy prices, three government sources with knowledge of the possible plan told Reuters.</p>\r\n\r\n<p>One of the sources said the government was looking into releasing from the portion exceeding the minimum amount required as a legal workaround.</p>\r\n\r\n<p>Japanese law permits the release of oil reserves in cases of a shortage or natural disasters but makes no mention of doing so to counter rising prices.</p>\r\n\r\n<p>&quot;We have no choice but to come up with something&quot; after a request from the United States, another one of the sources told Reuters.</p>\r\n\r\n<p>The sources declined to be identified because the plan has not been made public.</p>\r\n\r\n<p>Japan has never released oil from its state reserves, while oil companies have done so during the 1991 Gulf War and following the 2011 earthquake and tsunami disasters.</p>\r\n\r\n<p>Chief Cabinet Secretary Hirokazu Matsuno said on Monday nothing had been decided, while Prime Minister Fumio Kishida said on Saturday the government was in the process of considering what it could do legally.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'business', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-24', NULL, NULL, NULL, 2, 'pending', NULL, NULL, NULL, '2021-11-25 04:30:16', '2021-11-28 06:01:11'),
(23, 8, 7, 12, 10, 22, 20, 'End of Britney’s 13-year conservatorship \'Best Day Ever\'', NULL, 'end-of-britneys-13-year-conservatorship-best-day-ever', '', 'public/uploads/backend/ads/1717396779497731.jpeg', '<p>Pop star Britney Spears on Friday regained control of her personal life and her money when a judge ended a 13-year conservatorship that became a cause of celebration for fans and critics of an arrangement typically meant to protect the elderly.</p>\r\n\r\n<p>&quot;Effective today, the conservatorship of the person and the estate of Britney Jean Spears is hereby terminated,&quot; Los Angeles Superior Court Judge Brenda Penny said after a 30-minute hearing in which no one opposed ending the court-sanctioned arrangement.</p>\r\n\r\n<p>The 39-year-old &quot;Piece of Me&quot; singer had begged the court for months to terminate the conservatorship that has governed her personal life and $60 million estate since 2008.</p>\r\n\r\n<p>Spears did not attend Friday&#39;s hearing but said in an Instagram post, &quot;I love my fans so much it&#39;s crazy!!! I think I&#39;m gonna cry the rest of the day !!!! Best day ever.&quot;</p>\r\n\r\n<p>Outside the courthouse, dozens of fans erupted into cheers and tossed pink confetti into the air when they heard the news. Some danced and sang to her hit &quot;Stronger.&quot;</p>\r\n\r\n<p>&quot;It was a monumental day for Britney Spears,&quot; the pop star&#39;s attorney, Mathew Rosengart, said outside the courthouse. He thanked the #FreeBritney movement which he said had been essential to ending the legal arrangement.</p>\r\n\r\n<p>The conservatorship was set up and overseen by the singer&#39;s father, Jamie Spears, after she had a public breakdown in 2007 and was hospitalized for undisclosed mental health issues.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'entertainment', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-16', NULL, NULL, NULL, 12, 'pending', NULL, NULL, NULL, '2021-11-25 04:46:39', '2021-11-29 03:22:55'),
(24, 8, 13, 12, 7, 15, 13, 'The Elusive World of Ambient Music', NULL, 'the-elusive-world-of-ambient-music', '', 'public/uploads/backend/ads/1717669977264990.jpg', '<p>Modern music is bass-heavy and mixed louder than any other time in human history, fighting to grab the listener&#39;s attention. After all, what is the point of music that doesn&#39;t even demand to be heard?</p>\r\n\r\n<p>It is widely debated as to what constitutes some pieces of music to be labelled as &quot;ambient&quot;. Classical composer Erik Satie is widely credited as the inventor of ambient music when he composed The Gymnopedies &ndash; three pieces that he deemed were meant to be background noise to daily activities.</p>\r\n\r\n<p>The minimal and repetitive nature of ambient music came in all shapes and forms throughout the years from synth-based German electronic artists in the 80s, to field recording and tape loops in the 90s and 2000s. Even though the sounds varied, the notion of bare bone instrumentation and sounds that could be ignored remained consistent. What ambient music also succeeded in doing was enabling the audience to exist wherever they wanted at the time.</p>\r\n\r\n<p>The ignorable quality of ambient music allows the listener&#39;s thoughts to be softened, without being impacted. Ambient music is now more popular than ever, garnering millions of views on YouTube. The genre has evolved to a niche where endless videos come up if you search for it. From music designed to study, concentrate or sleep, to music that evokes a specific mood. There is music that creates the ambience of a fireplace in a wooden house, a walk in the middle of the night, and so forth. The list is endless, helping the listeners create any ambience they want to.</p>\r\n\r\n<p>There are videos catered to specific fandoms that allow the audience to feel as if they were in a Ghibli film or at Hogwarts. In a world where most of us are stuck between the four walls of our home, ambient music offers an alternative reality where we can exist in two places at the same time. It also helps us to somewhat slow things down in this fast-paced world, where we exist in the present while offering a gentle escape at the same time.</p>\r\n\r\n<p>One of the surprising results out of all of this has been how beneficial it is to people suffering from anxiety. Dr Oliver Sacks, in his book Musicophilia, wrote about how music and gardens were the only two types of non-pharmaceutical therapy that helped people suffering from neurological diseases. Some studies have found that predictability and escapism help the patients, while others suggest that predictability offers patients enhanced sensory awareness.</p>', NULL, 'entertainment', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17', NULL, NULL, NULL, 5, 'pending', NULL, NULL, NULL, '2021-11-28 05:09:01', '2021-11-28 06:03:06'),
(25, 8, 13, 12, NULL, NULL, 7, 'Shruti Gupta Kasana’s beautiful portrayal of ‘Mukher Abhibyakti’', NULL, 'shruti-gupta-kasanas-beautiful-portrayal-of-mukher-abhibyakti', '', 'public/uploads/backend/ads/1717670238703298.jpg', '<p>Indian artist Shruti Gupta Kasana&#39;s solo exhibition, titled &quot;Mukher Abhibyakti&quot; highlighted the form of non-verbal communication through its vividly presented portraits.</p>\r\n\r\n<p>The exhibition run in Dhaka Gallery from November 12-15 and the opening ceremony had HE Naoki ITO, Japanese Ambassador to Bangladesh, as chief guest.</p>\r\n\r\n<p>Dr Neepa Chowdhury, Director of Indira Gandhi Cultural Centre, High Commission of India, Dhaka and eminent artist &amp; Dean, Faculty of Fine Art, University of Dhaka, Prof Nisar Hossain were also present as the Guest of Honour in the programme.</p>\r\n\r\n<p>Kasana is a fulltime artist and a freelancer fashion designer. The Indian artist is now working as the Consultant to the Indian Apparel Expo Council and the owner of Creative Studio.</p>\r\n\r\n<p>&quot;From an early age my life has been guided by my creative pursuit. I like to experiment with the figurative art forms and elements. My work reveals the sensitive emotions that are often concealed within,&quot; mentions the artist.</p>\r\n\r\n<p>The noted artist graduated from Haryana in Fine Arts in 2000 and later performed her postgraduate in Knitwear Design &amp; Technology from National Institute of Fashion Technology from Mumbai in 2002.</p>\r\n\r\n<p>Adults and children who dream of speeding through the streets with sirens blaring and everyone getting out of their way can sign up for a fire engine drive with a British company.</p>\r\n\r\n<p>Under expert tuition, thrill-seekers can &ldquo;channel their inner firefighter&rdquo; and pilot a bright red Dennis Sabre XL engine with a top speed of 130kph.</p>\r\n\r\n<p>Passenger rides, which take place at a former Royal Air Force bomber station in the southern English town of Bicester, are also available for those not old enough to drive the big boy&rsquo;s toy, with children as young as six able to perch inside the cabin.</p>\r\n\r\n<p>&ldquo;Many youngsters dream of becoming a firefighter one day, so by putting their foot to the floor in a Dennis Sabre XL, those behind the wheel may very well feel like they are finally fulfilling a childhood dream,&rdquo; said Dan Jones, operations manager at TrackDays.co.uk.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>After a safety briefing an instructor guides drivers in a one-to-one session before they are allowed to get to grips with the 12-tonne vehicle which is powered by an 8.2-litre Cummins engine. A 20-minute trip on private roads costs &pound;59 pounds (RM332). &mdash; dpa</p>', NULL, 'entertainment', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-29', NULL, NULL, NULL, 8, 'pending', NULL, NULL, NULL, '2021-11-28 05:13:10', '2021-11-29 03:59:25'),
(26, 12, NULL, 12, 4, 8, 7, 'The Emotional Side of Dieting', NULL, 'the-emotional-side-of-dieting', '', 'public/uploads/backend/ads/1717758705107381.jpg', '<p>Like many other overweight Bangladeshi teenagers, I too, was relentlessly fat shamed out of &quot;concern for my health&quot; by everyone. From relatives to peers, it seemed like everyone had something to say. So, I decided to throw in the towel and surrender to a series of unfortunate attempts at dieting.</p>\r\n\r\n<p>I say unfortunate because the Bangladeshi &quot;dieting&quot; scene revolves around handing out a pre-made or slightly customised diet plan that lists what you must eat and what you must avoid, and when. My numerous attempts at losing weight told me how many almonds to eat a day but did not tell me why I keep finding myself binge eating whenever I am stressed.</p>\r\n\r\n<p>Our unhealthy eating habits and, in extreme cases, eating disorders, are greatly impacted by emotional and psychological factors. Furthermore, many people struggling to maintain a healthy weight through dieting may be emotional eaters. Emotional eating is a condition where the person suffering from it tends to eat whenever they feel fluctuations in their emotional state.</p>\r\n\r\n<p>In my experience of going through a whole host of dieticians over the years, not one person mentioned my emotional well-being while dieting, or referred to my relationship with food. Never did they mention that my relationship with food might not be improving because I have mental blocks that I need to overcome. Instead, they told me that &quot;I am bad at dieting.&quot;</p>\r\n\r\n<p>When I pointed out to them that I might be an emotional eater and asked for advice, it was dismissed with an offhand comment along the lines of, &quot;Oh, everyone is an emotional eater, it&#39;s all about will power so just stick to the diet.&quot;</p>\r\n\r\n<p>Stick to the diet, they said. However, is it reasonable to expect someone to follow a strict diet when the person in question cannot make a distinction between emotional eating and eating out of genuine hunger?</p>\r\n\r\n<p>Although people seem to be becoming more health conscious day-by-day, the general understanding of following a diet plan in Bangladesh often includes skipping meals to &quot;lose weight.&quot; Therefore, in a typical Bangladeshi dieting scene, with its preconceived notion that people struggling with weight issues are just lazy and lack will power, there is also a lack of emotional support for people who are seeking to make changes in their lifestyles and eating habits.</p>\r\n\r\n<p>Diane Robinson, Ph.D., a neuropsychologist, and program director of Integrative Medicine at Orlando Health said in her interview with PsychCentral that, &quot;Most people focus almost entirely on the physical aspects of weight loss, like diet and exercise. But there is an emotional component to food that the vast majority of people simply overlook, and it can quickly sabotage their efforts.&quot;</p>\r\n\r\n<p>While some dieticians are ignorant of the emotional aspect of dieting, on the other side of the spectrum, there are some dieticians who use &quot;eating disorder&quot; as an excuse for their failing diet plans without a proper psychological assessment.</p>\r\n\r\n<p>Tasnim Nishat Islam, a 23-year-old university student going through a weight loss journey says, &quot;When my weight didn&#39;t change after a few months of dieting, I was told it was because of mental issues although the dietician herself was not a psychologist, nor did she conduct a proper assessment to find out.&quot;</p>\r\n\r\n<p>Sabekun Nahar Mumu, a practicing dietician at Evercare Hospital Dhaka says, &quot;Certified dieticians in Bangladesh are trained on patient counselling but the training is not extensive or practical enough for them to treat patients with eating disorders. They are expected to refer such patients to a psychologist. The problem here is that the number of psychologists in Bangladesh who deal with eating disorders is not sufficient.&quot;</p>\r\n\r\n<p>People who go to dieticians are often people who have experienced body shaming to some extent and are sensitive to judgmental comments. This is why it is especially important that practicing dieticians take the emotional side of dieting more seriously, so that people do not end up being misdiagnosed or have their concerns dismissed without assessment.</p>\r\n\r\n<p>Tunzida Yousuf Chhonda, Managing Director and CEO at Cfitz women&#39;s fitness centre, who also works as a fitness expert, mentions, &quot;Well reputed dieticians have the psychological training necessary to deal with emotional eaters. However, I have my doubts that some may not be as adequately equipped or trained as others.&nbsp; This needs to change, whether it is a curricular issue or a training issue, the field needs to adopt the psychological effects of emotional eating into its territory.&quot;</p>\r\n\r\n<p>Mumu also points out that although graduates from food and nutrition who go into the clinical side are given training through an internship period, it is not widely available or enforced everywhere.</p>\r\n\r\n<p>For this field to take into consideration the emotional and psychological side of dieting, it is imperative for dieticians to receive better training and practice empathy towards the clients they help. Otherwise, they may end up doing more harm than good.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'health', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-29', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-29 04:39:19', '2021-11-29 04:39:19');
INSERT INTO `posts` (`id`, `category_id`, `sub_category_id`, `user_id`, `division_id`, `district_id`, `subdistrict_id`, `title_en`, `title_bn`, `slug_en`, `slug_bn`, `image`, `details_en`, `details_bn`, `tags_en`, `tags_bn`, `headline_en`, `breaking_news`, `add_image_gallery`, `thumbnail_select`, `first_section`, `category_first_section`, `subcategory_first_section`, `division_first_section`, `district_first_section`, `published_date`, `headline`, `year`, `month`, `view`, `stage`, `currection_image`, `message`, `status`, `created_at`, `updated_at`) VALUES
(27, 12, NULL, 12, 7, 15, 13, 'The roots of all your fears', NULL, 'the-roots-of-all-your-fears', '', 'public/uploads/backend/ads/1717759977859437.jpg', '<p>We all have fears and anxieties which creep up on us throughout the day. You may find yourself checking on the stove more times than you need to or worse yet, checking WebMDmore than is healthy. Some fears on the other hand may be less rational, such as the fear of holes or zombies. Here are four common types of fears and a few of their nuanced forms.</p>\r\n\r\n<p>Some fears are evolutionary, having been passed down to us from our ancestors. These are the fears we all share to different extents, evoking startling responses whenever we are faced with them. The more universal evolutionary fears include that of corpses, pus, hunting cats, sudden loud noises, and looming objects, as these would signal the possibility of danger to our forefathers.</p>\r\n\r\n<p>While some evolutionary fears are near universal, others are passed down biologically in a more selective manner.&nbsp;</p>\r\n\r\n<p>&quot;Closely packed holes really have a way of triggering me. I simply cannot look at lotus pods, honey combs, or close up photos of pores. Even the sight of aerated chocolate is enough to make me scream!&quot; exclaimed Samira, a university student when asked about one of her biggest fears.</p>\r\n\r\n<p>Although researchers disagree on the source, some believe the fear of closely packed holes is a biological fear, as some toxic animals and insects share the visual appearance of objects like lotus pods.</p>\r\n\r\n<p>Public speaking, performing in a crowded room, or even the unease of heading out with a massive pimple can be nerve wracking. Our self-consciousness, occasional shyness and other insecurities often get in the way of us being our best selves. While some people&#39;s social fears take on common forms, others have these fears manifest in the most peculiar of ways.</p>\r\n\r\n<p>Tashrif, a businessman in his mid-fifties always feels extremely uncomfortable eating in front of others. &quot;It&#39;s kind of funny. I love hosting parties. I grew up in a boarding school and ate in front of others most of my school-life. Even work requires me to have lunch with others. Strangely, I always have my &#39;actual&#39; dinner after getting home from social gatherings now,&quot; shared Tashrif.</p>\r\n\r\n<p><strong>The All-Natural</strong></p>\r\n\r\n<p>Many people&#39;s biggest fears stem from the natural environment rather than specific situations. Environmental fears may include the fear of oceans, thunderstorms, heights, or even trees and forests.</p>\r\n\r\n<p>When asked about her fear of water and drowning, Tahrima, a teenager remarked, &quot;It started from this Bangla sitcom my parents liked, in which the mother of the protagonist drowned. I was a kid when I watched it, and obsessed over drowning for a bit. Even after I learned to swim, the fear has stopped me from ever enjoying the act.&quot;</p>\r\n\r\n<p><strong>The Pop-Culturally Rooted</strong></p>\r\n\r\n<p>Some fears are often largely the result of pop-culture, especially horror movies. Be it Annabelleor Chucky from theChild&#39;s Play franchise planting the fear of dolls in children, or It establishing a fear of clowns, horror movie protagonists often lurk in our minds long term.</p>\r\n\r\n<p><strong>Some horror movies may seed the fear of extremely specific situations.</strong></p>\r\n\r\n<p>&quot;Movies like The Shining, Scream 2, The Ring, all make it very hard for me to go to the bathroom at night. I am always afraid someone might just be waiting to attack me there,&quot; mentioned Adiba, a research-practitioner in her thirties.</p>\r\n\r\n<p>Fear is a natural instinct. It is only a matter of concern when it starts to impede our actions in daily lives, and at that point, we must seek help for it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'health', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-28', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-29 04:59:32', '2021-11-29 04:59:32'),
(28, 6, 11, 12, 4, 8, 7, 'Japan to bar foreign arrivals amid Omicron concern: PM Kishida', NULL, 'japan-to-bar-foreign-arrivals-amid-omicron-concern-pm-kishida', '', 'public/uploads/backend/ads/1717838873933736.jpeg', '<p>Japan will reinstate tough border measures, barring all new foreign arrivals over the Omicron Covid-19 variant, Prime Minister Fumio Kishida announced on Monday (Nov 29), just weeks after a softening of strict entry rules.</p>\r\n\r\n<p>&quot;We will ban the (new) entry of foreigners from around the world starting from Nov 30,&quot; Kishida told reporters.</p>\r\n\r\n<p>Japan&#39;s borders have been almost entirely shut to new overseas visitors for most of the pandemic, with even foreign residents at one point unable to enter the country.</p>\r\n\r\n<p>Early this month, the government announced it would finally allow some short-term business travellers, foreign students and other visa holders to enter the country, while continuing to bar tourists.</p>\r\n\r\n<p>Japan had already announced it would require travellers permitted to enter Japan from nine southern African countries to quarantine in government-designated facilities for 10 days on arrival.</p>\r\n\r\n<p>That measure affects travellers coming from South Africa and neighbouring Namibia, Lesotho, Eswatini, Zimbabwe, Botswana, Zambia, Malawi and Mozambique.</p>\r\n\r\n<p>Kishida said on Monday that further quarantine restrictions would be imposed on arrivals from an additional 14 countries where the variant has been detected, without giving further details.</p>\r\n\r\n<p>Japan has recorded just over 18,300 coronavirus deaths during the pandemic, while avoiding tough lockdowns.</p>\r\n\r\n<p>After a slow start, the country&#39;s vaccination programme picked up speed, with 76.5 percent of the population now fully inoculated.</p>\r\n\r\n<p>Under a law that took effect in 2019, a category of &quot;specified skilled workers&quot; in 14 sectors such as farming, nursing care and sanitation have been granted visas but stays have been limited to five years and without family members for workers in all but the construction and shipbuilding sectors.</p>\r\n\r\n<p>Companies had cited those restrictions among reasons they were hesitant to hire such help and the government had been looking to ease those restrictions in the other fields.</p>\r\n\r\n<p>If the revision takes effect, such workers - many from Vietnam and China - would be allowed to renew their visas indefinitely and bring their families with them.</p>\r\n\r\n<p>Top government spokesman Hirokazu Matsuno stressed, however, that any such change would not mean automatic permanent residency, which would require a separate application process.</p>\r\n\r\n<p>Immigration has long been taboo in Japan as many prize ethnic homogeneity, but pressure has mounted to open up its borders due to an acute labour shortage given its dwindling and ageing population.</p>\r\n\r\n<p>&quot;As the shrinking population becomes a more serious problem and if Japan wants to be seen as a good option for overseas workers, it needs to communicate that it has the proper structure in place to welcome them,&quot; Toshihiro Menju, managing director of think tank Japan Center for International Exchange, told Reuters.</p>', NULL, 'international', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-29', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 01:53:34', '2021-11-30 01:53:34'),
(29, 6, 11, 12, 4, 10, NULL, 'Climate ‘overwhelming’ driver of Australian bushfires: study', NULL, 'climate-overwhelming-driver-of-australian-bushfires-study', '', 'public/uploads/backend/ads/1717839909954799.jpg', '<p>Climate change is the &quot;overwhelming factor&quot; driving the country&#39;s ever-more intense bushfires, Australian government scientists believe -- directly contradicting claims by the country&#39;s political leaders.</p>\r\n\r\n<p>In a peer-reviewed study, scientists at state agency CSIRO reviewed 90 years&#39; worth of data and concluded climate change was the major influencing factor behind megafires like those that ravaged Australia in 2019-2020.</p>\r\n\r\n<p>The experts studied a range of fire risk factors -- from the amount of dead vegetation on the ground to moisture, weather and ignition conditions -- to see what could be driving catastrophic blazes.</p>\r\n\r\n<p>&quot;While all eight drivers of fire activity played varying roles in influencing forest fires, climate was the overwhelming factor driving fire activity,&quot; said CSIRO chief climate research scientist Pep Canadell.</p>\r\n\r\n<p>The findings were published in the latest issue of scientific journal Nature on November 26.</p>\r\n\r\n<p>Australia&#39;s conservative government has consistently played down the role of climate change in the 2019-2020 fires, which burned across the southeast coast and cloaked major cities like Sydney in acrid smoke.</p>\r\n\r\n<p>Prime Minister Scott Morrison variously insisted that bushfires were normal in Australia or that the issue was forest management -- including the removal of debris.</p>\r\n\r\n<p>But researchers found that &quot;regression analyses with modelled fuel loads show no statistically significant relationships with burned area.&quot;</p>\r\n\r\n<p>Atmospheric patterns like El Nino or La Nina can influence year-to-year changes in the intensity of bushfires, but researchers found nine out of the 11 years when more than 500,000 square kilometres have burned have taken place since 2000 and as global warming has quickened.</p>\r\n\r\n<p>They linked those events to &quot;increasingly more dangerous fire weather&quot; like fire-generated thunderstorms and dry lightning &quot;all associated to varying degrees with anthropogenic climate change.&quot;</p>\r\n\r\n<p>Burned area has increased by 800 percent on average in the last 20 years versus the decades before, the study found.</p>\r\n\r\n<p>In recent years Australia has experienced a litany of climate-worsened droughts, bushfires and floods.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'international', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-18', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 02:10:02', '2021-11-30 02:10:02'),
(30, 6, 12, 12, 6, 13, 11, 'Global Covid cases top 262 million', NULL, 'global-covid-cases-top-262-million', '', 'public/uploads/backend/ads/1717840296599072.jpg', '<p>WHO warns that the Omicron variant poses a high risk of infection surges around the globe</p>\r\n\r\n<p>The overall number of Covid cases has surpassed 262 million amid concern of the emergence of a new variant, Omicron, in some countries.</p>\r\n\r\n<p>According to Johns Hopkins University (JHU), the total case count mounted to 262,093,495 while the death toll from the virus reached 5,206,982 Tuesday morning.</p>\r\n\r\n<p>The US has recorded 48,438,063 cases to date and more than 778,701 people have died so far from the virus in the country, as per the university data.</p>\r\n\r\n<p>Brazil, which has been experiencing a new wave of cases since January, has registered 22,084,749 cases so far, while its Covid death toll rose to 614,428.</p>\r\n\r\n<p>India&#39;s Covid-19 tally rose to 34,583,597 on Sunday, as 8,309 new cases were registered in 24 hours across the country, as per the Federal Health Ministry data.</p>\r\n\r\n<p>Besides, as many as 236 deaths due to the pandemic since Saturday morning took the total death toll to 468,790.</p>\r\n\r\n<p>Russia registered 33,860 new coronavirus cases over the past 24 hours, taking the nationwide tally to 9,604,233, the official monitoring and response center said on Monday.</p>\r\n\r\n<p>The nationwide death toll grew by 272,755, to 273,964 while the number of recoveries increased by 8,268,111 to 8,295,811.</p>\r\n\r\n<p>Meanwhile, the World Health Organization (WHO) on Sunday said it&#39;s not yet clear whether Omicron easily spreads from person to person compared to other variants, even though the number of people testing positive has risen in South Africa where this variant was involved.</p>\r\n\r\n<p>It is also not yet clear whether Omicron causes more severe disease, but preliminary data suggests that there are increasing rates of hospitalization in South Africa, which however may be due to increasing overall numbers of people becoming infected, reports Xinhua.</p>\r\n\r\n<p>WHO classified on Friday the latest variant B.1.1.529 of SARS-CoV-2 virus, now with the name Omicron, as a &lsquo;Variant of Concern&rsquo; (VOC).</p>\r\n\r\n<p>Both the latest deceased were men, aged between 61 and 80, and were reported from the Dhaka division.</p>\r\n\r\n<p>Of the 25 deaths recorded from November 22 to November 28, 12% received Covid vaccines while 88% did not, the directorate said.</p>\r\n\r\n<p>The death rates in Covid-19 patients with comorbidities increased to 0.4% this week compared to the previous one. Comorbidity means the simultaneous presence of two or more diseases or medical conditions in a patient.</p>\r\n\r\n<p>However, the mortality rate remained static at 1.78%.</p>\r\n\r\n<p>The fresh cases were detected after testing 16,891 samples, the directorate added.</p>\r\n\r\n<p>Besides, the recovery rate remained unchanged at 97.75%, with the recovery of 280 more patients during the 24 hour period.</p>\r\n\r\n<p>On November 20, Bangladesh logged this year&rsquo;s first zero Covid-linked death with 178 cases.</p>\r\n\r\n<p>So far, 3,64,34,738 people have fully been vaccinated in the country, while 5,94,08,254 received the first dose as of Sunday, according to the directorate.</p>\r\n\r\n<p>However, public health experts fear a slow pace of vaccination, waning vaccine immunity, disregard for Covid safety protocols, reopening of schools, and increased travel may set the stage for another Covid wave in Bangladesh -- a trend many European countries are witnessing now.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'international', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 02:16:10', '2021-11-30 02:16:10'),
(31, 6, 12, 12, 7, 15, 13, '\'Simpsons\' Tiananmen episode missing from Disney+ in Hong Kong', NULL, 'simpsons-tiananmen-episode-missing-from-disney-in-hong-kong', '', 'public/uploads/backend/ads/1717840543362097.jpg', '<p>The episode includes jokes about China&rsquo;s censorship of the Tiananmen Square deadly crackdown</p>\r\n\r\n<p>An episode of &quot;The Simpsons&quot; in which the cartoon American family visit Tiananmen Square is missing from the Disney&rsquo;s streaming service in Hong Kong, adding to concerns about mainland China-style censorship in the city.</p>\r\n\r\n<p>It comes at a time when authorities are clamping down on dissent, with curbs on speech becoming a norm in the international business hub and ensnaring global media and tech giants.</p>\r\n\r\n<p>Disney+ has made rapid advances since it was launched 18 months ago, reaching more than 116 million worldwide subscribers.</p>\r\n\r\n<p>The Hong Kong version started streaming earlier this month and eagle-eyed customers soon noticed the conspicuous absence of &quot;The Simpsons&quot; episode 12 of season 16.</p>\r\n\r\n<p>First airing in 2005, the episode features the family&#39;s trip to China in which matriarch Marge Simpson&#39;s sister tries to adopt a baby.</p>\r\n\r\n<p>In one scene, the Simpsons are at Beijing&#39;s Tiananmen Square, the site of a deadly 1989 crackdown against democracy protesters. The cartoon shows a sign there that reads &quot;On this site, in 1989, nothing happened&quot;&mdash; a satirical nod to China&#39;s campaign to purge memories of what happened.</p>\r\n\r\n<p>It then shows Marge&#39;s sister standing before a tank, referencing the famous photo from the Tiananmen crackdown of a lone man standing in front of a tank.</p>\r\n\r\n<p>The episode also contains pointed comments about Tibet &mdash; where Beijing has been accused of religious oppression &mdash; and the Cultural Revolution, a devastating period of upheaval in the last decade of Mao Zedong&#39;s rule.</p>\r\n\r\n<p>It is not clear whether Disney+ removed the episode, was ordered to by authorities or if it was offered in Hong Kong to begin with.</p>\r\n\r\n<p>The entertainment giant has not responded to requests for comment, nor has Hong Kong&#39;s government.</p>\r\n\r\n<p>When AFP checked Disney+&#39;s Hong Kong channel on Monday episodes 11 and 13 of season 16 were available but not 12.</p>\r\n\r\n<p>Until recently, semi-autonomous Hong Kong boasted significant artistic and political freedoms compared with mainland China. But authorities are currently transforming the city in the wake of huge and often violent democracy protests two years ago.</p>\r\n\r\n<p>Among the slew of measures are new censorship laws introduced this summer that forbid any broadcasts that might breach a broad national security law that China imposed on the city last year.</p>\r\n\r\n<p>Censors have since ordered directors to make cuts and refused permission for some films to be shown to the public.</p>\r\n\r\n<p>Those rules do not currently cover streaming services but authorities have warned that online platforms fall under other rules, including the new national security law.</p>\r\n\r\n<p>Last week, Hong Kong&#39;s Beijing-appointed leader Carrie Lam vowed to &quot;proactively plug loopholes&quot; in the city&#39;s internet and introduce &quot;fake news&quot; regulations.</p>\r\n\r\n<p>Her comments added to concerns that China&#39;s &quot;Great Firewall&quot; -- a sprawling internet and news censorship regime -- could be extended to Hong Kong.</p>\r\n\r\n<p>Content that satirizes China is still available on other streaming platforms in Hong Kong.</p>\r\n\r\n<p>Netflix&#39;s Hong Kong channel is still showing &quot;Band in China&quot;, an episode of the cartoon series &quot;South Park&quot;.</p>\r\n\r\n<p>In that episode, one of the characters ends up in a Chinese labour camp and much of the show lampoons the willingness of American brands to adhere to Chinese censorship rules to make money.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'international', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-18', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 02:20:06', '2021-11-30 02:20:06'),
(32, 6, 11, 12, 5, 11, 8, 'OP-ED: Five things you need to know about the Glasgow Climate Pact', NULL, 'op-ed-five-things-you-need-to-know-about-the-glasgow-climate-pact', '', 'public/uploads/backend/ads/1717843879452511.jpg', '<p>What we have learned from these two weeks</p>\r\n\r\n<p>The COP26 UN climate talks in Glasgow have finished and the gavel has come down on the Glasgow Climate Pact agreed by all 197 countries.</p>\r\n\r\n<p>If the 2015 Paris Agreement provided the framework for countries to tackle climate change then Glasgow, six years on, was the first major test of this high-water mark of global diplomacy.</p>\r\n\r\n<p>So what have we learnt from two weeks of leaders&rsquo; statements, massive protests and side deals on coal, stopping fossil fuel finance and deforestation, plus the final signed Glasgow Climate Pact?</p>\r\n\r\n<p>From phasing out coal to carbon market loopholes, here is what you need to know:</p>\r\n\r\n<p><strong>Progress on cutting emissions, but nowhere near enough</strong></p>\r\n\r\n<p>The Glasgow Climate Pact is incremental progress and not the breakthrough moment needed to curb the worst impacts of climate change. The UK government as host and therefore president of COP26 wanted to &ldquo;keep 1.5&deg;C alive&rdquo;, the stronger goal of the Paris Agreement. But at best we can say the goal of limiting global warming to 1.5&deg;C is on life support -- it has a pulse but it&rsquo;s nearly dead.</p>\r\n\r\n<p>The Paris Agreement says temperatures should be limited to &ldquo;well below&rdquo; 2&deg;C above pre-industrial levels, and countries should &ldquo;pursue efforts&rdquo; to limit warming to 1.5&deg;C. Before COP26, the world was on track for 2.7&deg;C of warming, based on commitments by countries, and expectation of the changes in technology. Announcements at COP26, including new pledges to cut emissions this decade, by some key countries, have reduced this to a best estimate of 2.4&deg;C.</p>\r\n\r\n<p>More countries also announced long-term net zero goals. One of the most important was India&rsquo;s pledge to reach net zero emissions by 2070. Critically, the country said it would get off to a quick start with a massive expansion of renewable energy in the next 10 years so that it accounts for 50% of its total usage, reducing its emissions in 2030 by 1 billion tons (from a current total of around 2.5 billion).</p>\r\n\r\n<p>Fast-growing Nigeria also pledged net zero emissions by 2060. Countries accounting for 90% of the world&rsquo;s GDP have now pledged to go net zero by the middle of this century.</p>\r\n\r\n<p>A world warming by 2.4&deg;C is still clearly very far from 1.5&deg;C. What remains is a near-term emissions gap, as global emissions look likely to flatline this decade rather than showing the sharp cuts necessary to be on the 1.5&deg;C trajectory the pact calls for. There is a gulf between long-term net zero goals and plans to deliver emissions cuts this decade.</p>\r\n\r\n<p><strong>The door is ajar for further cuts in the near future</strong></p>\r\n\r\n<p>The final text of the Glasgow Pact notes that the current national climate plans, nationally determined contributions (NDCs) in the jargon, are far from what is needed for 1.5&deg;C. It also requests that countries come back next year with new updated plans.</p>\r\n\r\n<p>Under the Paris Agreement, new climate plans are needed every five years, which is why Glasgow, five years after Paris (with a delay due to COVID), was such an important meeting. New climate plans next year, instead of waiting another five years, can keep 1.5&deg;C on life support for another 12 months, and gives campaigners another year to shift government climate policy. It also opens the door to requesting further NDC updates from 2022 onwards to help ratchet up ambition this decade.</p>\r\n\r\n<p>The Glasgow Climate Pact also states that the use of unabated coal should be phased down, as should subsidies for fossil fuels. The wording is weaker than the initial proposals, with the final text calling for only a &ldquo;phase down&rdquo; and not a &ldquo;phase out&rdquo; of coal, due to a last-second intervention by India, and of &ldquo;inefficient&rdquo; subsidies. But this is the first time fossil fuels have been mentioned in a UN climate talks declaration.</p>\r\n\r\n<p>In the past, Saudi Arabia and others have stripped out this language. This is an important shift, finally acknowledging that use of coal and other fossil fuels need to be rapidly reduced to tackle the climate emergency. The taboo of talking about the end of fossil fuels has been finally broken.</p>\r\n\r\n<p><strong>Rich countries continued to ignore their historical responsibility</strong></p>\r\n\r\n<p>Developing countries have been calling for funding to pay for &ldquo;loss and damage&rdquo;, such as the costs of the impacts of cyclones and sea level rise. Small island states and climate-vulnerable countries say the historical emissions of the major polluters have caused these impacts and therefore funding is needed.</p>\r\n\r\n<p>Developed countries, led by the US and EU, have resisted taking any liability for these loss and damages, and vetoed the creation of a new &ldquo;Glasgow Loss and Damage Facility&rdquo;, a way of supporting vulnerable nations, despite it being called for by most countries.</p>\r\n\r\n<p><strong>Loopholes in carbon market rules could undermine progress</strong></p>\r\n\r\n<p>Carbon markets could throw a potential lifeline to the fossil fuel industry, allowing them to claim &ldquo;carbon offsets&rdquo; and carry on business as (nearly) usual. A tortuous series of negotiations over article 6 of the Paris Agreement on market and non-market approaches to trading carbon was finally agreed, six years on. The worst and biggest loopholes were closed, but there is still scope for countries and companies to game the system.</p>\r\n\r\n<p>Outside the COP process, we will need much clearer and stricter rules for company carbon offsets. Otherwise expect a series of expos&eacute; from non-governmental organizations and the media into carbon offsetting under this new regime, when new attempts will emerge to try and close these remaining loopholes.</p>\r\n\r\n<p><strong>Thank climate activists for the progress -- their next moves will be decisive</strong></p>\r\n\r\n<p>It is clear that powerful countries are moving too slowly and they have made a political decision to not support a step change in both greenhouse gas emissions and funding to help income-poor countries to adapt to climate change and leapfrog the fossil fuel age.</p>\r\n\r\n<p>But they are being pushed hard by their populations and particularly climate campaigners. Indeed in Glasgow, we saw huge protests with both the youth Fridays for Future march and the Saturday Global Day of Action massively exceeding expected numbers.</p>\r\n\r\n<p>This means that the next steps of the campaigners and the climate movement matter. In the UK this will be trying to stop the government granting a license to exploit the new Cambo oil field off the north coast of Scotland.</p>\r\n\r\n<p>Expect more action on the financing of fossil fuel projects, as activists try to cut emissions by starving the industry of capital. Without these movements pushing countries and companies, including at COP27 in Egypt, we won&rsquo;t curb climate change and protect our precious planet.</p>\r\n\r\n<p><em>Simon Lewis is a Professor of Global Change Science at University of Leeds, UCL and Mark Maslin is a Professor of Earth System Science, UCL. This article first appeared in The Conversation and has been reprinted under special arrangement.</em></p>', NULL, 'international', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-28', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 03:13:07', '2021-11-30 03:13:07'),
(33, 6, 12, 12, 8, 17, 15, 'Australia to introduce new laws to force media platforms to unmask online trolls', NULL, 'australia-to-introduce-new-laws-to-force-media-platforms-to-unmask-online-trolls', '', 'public/uploads/backend/ads/1717844854286389.jpg', '<p>Social media giants will have to provide details of users who post defamatory comments, says the prime minister</p>\r\n\r\n<p>Australia will introduce legislation to make social media giants provide details of users who post defamatory comments, Prime Minister Scott Morrison said on Sunday.</p>\r\n\r\n<p>The government has been looking at the extent of the responsibility of platforms, such as Twitter and Facebook, for defamatory material published on their sites and comes after the country&#39;s highest court ruled that publishers can be held liable for public comments on online forums.</p>\r\n\r\n<p>The ruling caused some news companies like CNN to deny Australians access to their Facebook pages.</p>\r\n\r\n<p>&quot;The online world should not be a wild west where bots and bigots and trolls and others are anonymously going around and can harm people,&quot; Morrison said at a televised press briefing. &quot;That is not what can happen in the real world, and there is no case for it to be able to be happening in the digital world.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Social media giants will have to provide details of users who post defamatory comments, says the prime minister</p>\r\n\r\n<p>Australia will introduce legislation to make social media giants provide details of users who post defamatory comments, Prime Minister Scott Morrison said on Sunday.</p>\r\n\r\n<p>The government has been looking at the extent of the responsibility of platforms, such as Twitter and Facebook, for defamatory material published on their sites and comes after the country&#39;s highest court ruled that publishers can be held liable for public comments on online forums.</p>\r\n\r\n<p>The ruling caused some news companies like CNN to deny Australians access to their Facebook pages.</p>\r\n\r\n<p>&quot;The online world should not be a wild west where bots and bigots and trolls and others are anonymously going around and can harm people,&quot; Morrison said at a televised press briefing. &quot;That is not what can happen in the real world, and there is no case for it to be able to be happening in the digital world.&quot;The new legislation will introduce a complaints mechanism, so that if somebody thinks they are being defamed, bullied or attacked on social media, they will be able to require the platform to take the material down.</p>\r\n\r\n<p>If the content is not withdrawn, a court process could force a social media platform to provide details of the commenter.</p>\r\n\r\n<p>&quot;Digital platforms - these online companies - must have proper processes to enable the takedown of this content,&quot; Morrison said.</p>\r\n\r\n<p>&quot;They have created the space and they need to make it safe, and if they won&#39;t, we will make them (through) laws such as this.&quot;</p>\r\n\r\n<p><br />\r\n&nbsp;</p>', NULL, 'international', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-24', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 03:28:37', '2021-11-30 03:28:37'),
(34, 5, 10, 12, 9, 20, 18, 'Fog forecast for Wednesday morning', NULL, 'fog-forecast-for-wednesday-morning', '', 'public/uploads/backend/ads/1717845530521740.jpg', '<p>Night temperature may rise slightly and day temperature may remain nearly unchanged over the country</p>\r\n\r\n<p>Light fog may occur at some places during Wednesday morning as the weather is likely to remain dry with temporary partly cloudy skies over the country, a Met release said Tuesday.</p>\r\n\r\n<p>Night temperature may rise slightly and day temperature may remain nearly unchanged over the country, the Met Office said in its 24 hour weather forecast commencing at 8am Tuesday.</p>\r\n\r\n<p>Ridge of sub-continental high extends up to West Bengal and adjoining area. Trough of low lies over North Bay. A low-pressure area is likely to form over South Andaman Sea during the next 24 hours.</p>\r\n\r\n<p>Bangladesh may well see visibility dipping on Thursday night and Friday early morning, with the Met Office predicting light to moderate fog in the next 24 hours.</p>\r\n\r\n<p>&nbsp;According to the Bangladesh Meteorological Department (BMD), weather may remain mainly dry over the country in the next 24 hours. Night temperature may fall slightly but day temperature is likely to remain nearly unchanged over the country.</p>\r\n\r\n<p>On Wednesday, the minimum temperature was recorded at 13.0 degrees in Srimangal of Sylhet division while the maximum was 33.0 degrees in Kutubdia of Chattogram division, according to weathermen.</p>\r\n\r\n<p><a href=\"https://fb.watch/9rgnkrUdVn/\" target=\"_blank\"><img alt=\"Ads\" src=\"https://media-eng.dhakatribune.com/uploads/2021/11/x120pix-1637646713480.gif\" /></a></p>\r\n\r\n<p>Low pressure area likely to form over Bay of Bengal, says the Met Office</p>\r\n\r\n<p>Bangladesh may well see visibility dipping on Thursday night and Friday early morning, with the Met Office predicting light to moderate fog in the next 24 hours.</p>\r\n\r\n<p>&nbsp;According to the Bangladesh Meteorological Department (BMD), weather may remain mainly dry over the country in the next 24 hours. Night temperature may fall slightly but day temperature is likely to remain nearly unchanged over the country.</p>\r\n\r\n<p>On Wednesday, the minimum temperature was recorded at 13.0 degrees in Srimangal of Sylhet division while the maximum was 33.0 degrees in Kutubdia of Chattogram division, according to weathermen.</p>\r\n\r\n<p>Meanwhile, a low pressure area is likely to form over southwest Bay of Bengal and adjoining areas in the next 12 hours as a trough of low extending from South Bay persists over North Bay, according to a Met office bulletin.</p>\r\n\r\n<p>The ridge of sub-continental high extends up to West Bengal in neighbouring India and adjoining areas, it says.</p>\r\n\r\n<p>Ferry services on the Paturia-Daulatdia route resumed after more than two hours&rsquo; suspension to avert any possible mishap due to dense fog on Wednesday.&nbsp;</p>\r\n\r\n<p>The ferry movement resumed after 8:30am after the fog cleared.</p>\r\n\r\n<p>Hundreds of passengers have suffered due to the service interruption. At least two passenger ferries Khan Jahan Ali and Hasna Hena were stranded in the middle of the Padma River because of poor visibility.</p>\r\n\r\n<p>Ferry services on the Paturia-Daulatdia route resumed after more than two hours&rsquo; suspension to avert any possible mishap due to dense fog on Wednesday.&nbsp;</p>\r\n\r\n<p>The ferry movement resumed after 8:30am after the fog cleared.</p>\r\n\r\n<p>Hundreds of passengers have suffered due to the service interruption. At least two passenger ferries Khan Jahan Ali and Hasna Hena were stranded in the middle of the Padma River because of poor visibility.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'Weather,temperature', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 03:39:22', '2021-11-30 03:39:22'),
(35, 5, 10, 12, 8, 17, 15, '‘Ever since I left Bangladesh, I have been longing to come back’', NULL, 'ever-since-i-left-bangladesh-i-have-been-longing-to-come-back', '', 'public/uploads/backend/ads/1717846804699681.jpg', '<p>Returning to Dhaka, Oscar winner Tilda Swinton addresses DLF and recites from &lsquo;Last and First Men&rsquo;</p>\r\n\r\n<p>Tilda Swinton, acclaimed Oscar winner, has delivered her first public reading of a voice over that will premiere December 1 at the Barbican, London. Before she began, she said, &ldquo;Ever since I left Bangladesh, I have been longing to come back.&rdquo;</p>\r\n\r\n<p>DLF Director K Anis Ahmed introduced Tilda Swinton who then gave a special reading of composer J&oacute;hann J&oacute;hannsson&rsquo;s, &ldquo;Last and First Men.&rdquo; &nbsp;</p>\r\n\r\n<p>Her excerpt was read in honour of the Oscar-nominated composer, who passed away in February this year. The Icelandic music-writer has released solo albums and is best-known for his scoring of, &ldquo;Sicario,&rdquo; &ldquo;The Theory of Everything,&rdquo; and, &ldquo;Blade Runner 2047.&rdquo;</p>\r\n\r\n<p>J&oacute;hannsson&rsquo;s writing is based on the science fiction novel, of the same name, by Olaf Stapledon. Stapledon&rsquo;s 1930s novel depicts human history as a series of civilizations developing and regressing, with each civilization seeing minor improvements.&nbsp;</p>\r\n\r\n<p>J&oacute;hannsson&rsquo;s multimedia take on the story weaves music, film, and Tilda Swinton&rsquo;s narration together on a backdrop of a decaying futuristic landscape. His story illustrates a post-Earth human colony on Neptune, facing extinction.&nbsp;</p>\r\n\r\n<p>Returning to Dhaka, Oscar winner Tilda Swinton addresses DLF and recites from &lsquo;Last and First Men&rsquo;</p>\r\n\r\n<p>Tilda Swinton, acclaimed Oscar winner, has delivered her first public reading of a voice over that will premiere December 1 at the Barbican, London. Before she began, she said, &ldquo;Ever since I left Bangladesh, I have been longing to come back.&rdquo;</p>\r\n\r\n<p>DLF Director K Anis Ahmed introduced Tilda Swinton who then gave a special reading of composer J&oacute;hann J&oacute;hannsson&rsquo;s, &ldquo;Last and First Men.&rdquo; &nbsp;</p>\r\n\r\n<p>Her excerpt was read in honour of the Oscar-nominated composer, who passed away in February this year. The Icelandic music-writer has released solo albums and is best-known for his scoring of, &ldquo;Sicario,&rdquo; &ldquo;The Theory of Everything,&rdquo; and, &ldquo;Blade Runner 2047.&rdquo;</p>\r\n\r\n<p>J&oacute;hannsson&rsquo;s writing is based on the science fiction novel, of the same name, by Olaf Stapledon. Stapledon&rsquo;s 1930s novel depicts human history as a series of civilizations developing and regressing, with each civilization seeing minor improvements.&nbsp;</p>\r\n\r\n<p>J&oacute;hannsson&rsquo;s multimedia take on the story weaves music, film, and Tilda Swinton&rsquo;s narration together on a backdrop of a decaying futuristic landscape. His story illustrates a post-Earth human colony on Neptune, facing extinction.&nbsp;</p>\r\n\r\n<p><em>Why does Dhaka Lit Fest join hands with Taliesin Arts Centre and Swansea University Professor Owen Sheers to organise the ten-day event Everything Change?</em></p>\r\n\r\n<p>Professsor Owen Sheers, Professor of Creativity at Swansea University and Taliesin Arts Centre, along with Dhaka Lit Fest, has been awarded a British Council Creative commissions grant to have a writers&rsquo; lab this year to explore climate change and creativity. Six writers from Bangladesh and Wales will generate new works over the coming months, and present original works to be premiered later this year at Dhaka Lit Fest in 2022. The writers&rsquo; lab will run alongside the Everything Change programme. Inspired by the words of Margaret Atwood, &lsquo;I think calling it climate change is rather limiting. I would rather call it the everything change,&rsquo; Everything Change is an innovative series of discussions and events exploring the roles creativity, adaptive thinking and storytelling can play in overcoming the challenges of the climate crisis. Led by the poet, novelist and playwright Professor Owen Sheers, and Simon Oates, Director, Taliesin Arts Centre, I have been involved in co-curating this fascinating and unique series of interdisciplinary discussions and artist provocations, to ask some of the most urgent questions of our times. The series will feature an incredible line-up of international contributors across the arts and creative industries, as well as science, law, policy, and activism. It&#39;s all online, free and accessible with live captioning. As Bangladesh is already facing the effects of climate change, and given the massive scale of the impending crisis, we were interested in exploring why more writers and creative artists are not engaged in this issue from Dhaka Lit Fest. We are extremely excited and invigorated by the Everything Change partnership, which has enabled a truly global and interdisciplinary approach to the issue, putting creativity at its core. &nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'country', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-24', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 03:59:37', '2021-11-30 03:59:37'),
(36, 8, 13, 12, 8, 18, 16, 'Jaya Ahsan Berger’s new face for its Luxury Silk Product', NULL, 'jaya-ahsan-bergers-new-face-for-its-luxury-silk-product', '', 'public/uploads/backend/ads/1717850224384752.jpg', '<p>Eminent model and actress Jaya Ahsan has been made the Ambassador of Berger Paints Bangladesh Limited (BPBL) for its Luxury Silk Product.</p>\r\n\r\n<p>An event held recently Berger announced the name of Joya Ahsan. She will be associated with Berger&rsquo;s Luxury Silk Product face in various campaigns, engagement sessions, and other promotional activities for the next 2 years, say as press release.</p>\r\n\r\n<p>Mohsin Habib Chowdhury, Senior General Manager, Sales &amp; Marketing, Berger Paints Bangladesh, AKM Sadeque Nawaj, General Manager, Marketing, Berger Paints Bangladesh &amp; Muneer Ahmed Khan, Managing Director &amp; Creative Chief, Unitrend Limited were present during the signing ceremony.&nbsp;</p>\r\n\r\n<p>On the occasion Jaya Ahsan said &ldquo;Berger is undoubtedly one of the few brands in Bangladesh which do not require any introduction to customers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I am delighted to have the opportunity to represent one such acknowledged brand and hopeful that this will bring me newer fan engagement experiences to cherish lovingly,&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mohsin Habib Chowdhury, senior general manager, Sales &amp; Marketing of Berger Paints Bangladesh said, &ldquo;It is our pleasure to have such a wonderful personality like Jaya Ahsan promoting the slogans of Berger Luxury Silk Products. Her acceptance and integrity are as alluring as her acting prowess, which Berger believes, must add a new flair to its brand value and market presence.&rdquo;</p>\r\n\r\n<p>Eddie Redmayne has addressed the controversy surrounding his Oscar-nominated role in &quot;The Danish Girl,&quot; calling his decision to play transgender pioneer Lili Elbe in the 2015 drama a &quot;mistake.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The &quot;Fantastic Beasts&quot; star, who is preparing for a new West End production of &quot;Cabaret,&quot; was speaking to UK publication the Sunday Times.<br />\r\n&quot;The Danish Girl,&quot; directed by Tom Hooper, is inspired by the story of Elbe, one of the first people to undergo gender reassignment surgery.</p>\r\n\r\n<p>Although Redmayne was nominated for a string of awards for his performance, his casting as Elbe prompted complaints, with many critics arguing that the role should have gone to a trans actor.</p>\r\n\r\n<p>At the time, trans writer Carol Grant described his casting as &quot;regressive, reductive, and contributes to harmful stereotypes.&quot;</p>\r\n\r\n<p>She said: &quot;What should&#39;ve been a celebration of a very complex, compelling transgender figure is instead transmisogynist, and just plain-old misogynist in general.&quot;</p>\r\n\r\n<p>In his interview with the Sunday Times, Redmayne said the criticism was justified, admitting that while he had the best intentions, taking the role was a &quot;mistake&quot; and he wouldn&#39;t accept it if it were offered today.</p>\r\n\r\n<p>&quot;No, I wouldn&#39;t take it on now,&quot; the 39-year-old star said, adding: &quot;The bigger discussion about the frustrations around casting is because many people don&#39;t have a chair at the table. There must be a levelling, otherwise we are going to carry on having these debates.&quot;</p>\r\n\r\n<p>Redmayne can next be seen playing the Emcee in &quot;Cabaret,&quot; opposite &quot;Chernobyl&quot; actress Jessie Buckley as Sally Bowles.</p>\r\n\r\n<p>Redmayne asked those who might criticize his decision to take on a role often played by LGBT actors to suspend judgment.</p>\r\n\r\n<p>&quot;Of all the characters I&#39;ve ever read, this one defies pigeonholing. I would ask people to come and see it before casting judgment,&quot; he said. &quot;Cabaret&quot; opens at London&#39;s Playhouse Theatre on December 12.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'entertainment', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-23', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '2021-11-30 04:53:58', '2021-11-30 04:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `reporters`
--

CREATE TABLE `reporters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_rating_global` int(11) DEFAULT NULL,
  `alexa_rating_country` int(11) NOT NULL,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `youtube`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/geeksntech/', 'https://twitter.com/i/flow/login', 'https://www.youtube.com/watch?v=Trdmf2pr_dw', 'https://www.linkedin.com/', 'https://www.instagram.com/', '2021-11-24 03:32:03', '2021-11-24 03:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_on_header` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_name_bn`, `subcategory_name_en`, `category_id`, `subcategory_slug_bn`, `subcategory_slug_en`, `status`, `show_on_header`, `created_at`, `updated_at`) VALUES
(5, 'জাতীয়', 'National', 4, 'jateez', 'national', '1', 1, '2021-10-25 16:28:03', '2021-10-25 16:28:03'),
(6, 'রাজনীতি', 'Politics', 4, 'rajneeti', 'politics', '1', 1, '2021-10-25 16:30:37', '2021-10-25 16:30:37'),
(7, 'হলিউড', 'Hollywood', 8, 'hliud', 'hollywood', '1', 1, '2021-10-25 16:32:07', '2021-10-25 16:32:07'),
(8, 'ক্রিকেট', 'Cricket', 7, 'kriket', 'cricket', '1', 1, '2021-10-25 16:35:09', '2021-10-25 16:35:09'),
(9, 'ফুটবল', 'Football', 7, 'futbl', 'football', '1', 1, '2021-10-25 16:35:51', '2021-10-25 16:35:51'),
(10, 'জেলার খবর', 'District News', 5, 'jelar-khbr', 'district-news', '1', 1, '2021-10-31 22:57:12', '2021-10-31 22:57:12'),
(11, 'ঘটনা', 'Event', 6, 'ghtna', 'event', '1', 1, '2021-10-31 23:23:29', '2021-10-31 23:23:29'),
(12, 'ফটোফিচার', 'Photofeature', 6, 'ftoficar', 'photofeature', '1', 1, '2021-10-31 23:24:25', '2021-10-31 23:24:25'),
(13, 'বলিউড', 'Bollywood', 8, 'bliud', 'bollywood', '1', 1, '2021-10-31 23:26:00', '2021-10-31 23:26:00'),
(14, 'চাকরি', 'Job', 9, 'cakri', 'job', '1', 1, '2021-10-31 23:31:05', '2021-10-31 23:31:05'),
(15, 'মতামত', 'Opinion', 9, 'mtamt', 'opinion', '1', 1, '2021-10-31 23:33:53', '2021-10-31 23:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_districts`
--

CREATE TABLE `sub_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdistrict_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_districts`
--

INSERT INTO `sub_districts` (`id`, `subdistrict_name_bn`, `subdistrict_name_en`, `subdistrict_slug_bn`, `subdistrict_slug_en`, `division_id`, `district_id`, `created_at`, `updated_at`) VALUES
(7, 'কালিগঞ্জ', 'kaliganj', 'kalignj', 'kaliganj', 4, 8, '2021-10-31 21:52:38', '2021-10-31 21:52:38'),
(8, 'ছাগলনাইয়া', 'Chhagalnaia', 'chaglnaiza', 'chhagalnaia', 5, 11, '2021-10-31 22:08:13', '2021-10-31 22:08:13'),
(9, 'নগরপুর', 'nagarpur', 'ngrpur', 'nagarpur', 4, 9, '2021-10-31 22:09:38', '2021-10-31 22:09:38'),
(10, 'চকরিয়া', 'Chakaria', 'ckriza', 'chakaria', 5, 12, '2021-10-31 22:12:08', '2021-10-31 22:12:08'),
(11, 'বাগাতিপাড়া', 'Bagatipara', 'bagatipada', 'bagatipara', 6, 13, '2021-10-31 22:13:40', '2021-10-31 22:13:40'),
(12, 'ফরিদপুর', 'Faridpur', 'fridpur', 'faridpur', 6, 14, '2021-10-31 22:14:35', '2021-10-31 22:14:35'),
(13, 'বারহাট্টা', 'Barhatta', 'barhatta', 'barhatta', 7, 15, '2021-10-31 22:16:06', '2021-10-31 22:16:06'),
(14, 'মেলান্দহ', 'Melandaha', 'melandh', 'melandaha', 7, 16, '2021-10-31 22:16:58', '2021-10-31 22:16:58'),
(15, 'নবাবগঞ্জ', 'Nawabgong', 'nbabgnj', 'nawabgong', 8, 17, '2021-10-31 22:19:28', '2021-11-14 21:08:33'),
(16, 'চিলমার', 'Chilmari', 'cilmar', 'chilmari', 8, 18, '2021-10-31 22:20:09', '2021-11-14 21:07:38'),
(17, 'মোংলা', 'Mongla', 'mongla', 'mongla', 9, 19, '2021-10-31 22:21:02', '2021-10-31 22:21:02'),
(18, 'ঝিকরগাছা', 'Jhikargacha', 'jhikrgacha', 'jhikargacha', 9, 20, '2021-10-31 22:23:32', '2021-10-31 22:23:32'),
(19, 'লাখাই', 'Lakhai', 'lakhai', 'lakhai', 10, 21, '2021-10-31 22:24:19', '2021-10-31 22:24:19'),
(20, 'Sreemangal', 'Sreemangal', 'sreemangal', 'sreemangal', 10, 22, '2021-10-31 22:25:14', '2021-10-31 22:25:14'),
(21, 'Manpura', 'Manpura', 'manpura', 'manpura', 11, 23, '2021-10-31 22:26:28', '2021-10-31 22:26:28'),
(22, 'গলাচিপা', 'Galachipa', 'glacipa', 'galachipa', 11, 24, '2021-10-31 22:31:26', '2021-10-31 22:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_comments_role` int(11) NOT NULL DEFAULT 0,
  `comments_role` int(11) NOT NULL DEFAULT 0,
  `blog_role` int(11) NOT NULL DEFAULT 0,
  `settings_role` int(11) NOT NULL DEFAULT 0,
  `seo_role` int(11) NOT NULL DEFAULT 0,
  `gallery_role` int(11) NOT NULL DEFAULT 0,
  `user_role` int(11) NOT NULL DEFAULT 0,
  `reports_role` int(11) NOT NULL DEFAULT 0,
  `page_role` int(11) NOT NULL DEFAULT 0,
  `ads_role` int(11) NOT NULL DEFAULT 0,
  `writer_role` int(11) NOT NULL DEFAULT 0,
  `post_role` int(11) NOT NULL DEFAULT 0,
  `jobpost_role` int(11) NOT NULL DEFAULT 0,
  `country_role` int(11) NOT NULL DEFAULT 0,
  `category_role` int(11) NOT NULL DEFAULT 0,
  `saved_post` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` bigint(20) UNSIGNED DEFAULT NULL,
  `district` bigint(20) UNSIGNED DEFAULT NULL,
  `division` bigint(20) UNSIGNED DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `address_permanent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_present` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_bn`, `name_en`, `email`, `image`, `blog_comments_role`, `comments_role`, `blog_role`, `settings_role`, `seo_role`, `gallery_role`, `user_role`, `reports_role`, `page_role`, `ads_role`, `writer_role`, `post_role`, `jobpost_role`, `country_role`, `category_role`, `saved_post`, `zip_code`, `city`, `district`, `division`, `about`, `type`, `status`, `address_permanent`, `address_present`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', NULL, 'admin@gmail.com', NULL, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'super_admin', 1, NULL, NULL, NULL, NULL, '$2y$10$tymz5FwlHKNNV3BS.IrUpeJ64f0damkekphzMfMzHreM6vVZ.hEcu', NULL, NULL, '2021-11-13 22:53:50'),
(2, 'user1', NULL, 'user1@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$GrcgfAkvGIBEzTR39NeXZOXZ3twBcb4fABuJvpUn9YgWuiVx8VJRy', NULL, NULL, NULL),
(3, 'shah', 'shah', 'shah@gmail.com', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '1751', 7, 8, 4, NULL, 'general_user', 1, 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', '01956424568', NULL, '$2y$10$NZOkUpBYTWdQK.HMMew1mOSo9oDHVELLEM3WtHMTDbviWMFLjM5ny', NULL, '2021-11-14 16:00:06', '2021-11-14 16:00:06'),
(4, 'shazib', 'shazib', 'shazib.shahriyar@yahoo.com', NULL, 0, 0, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, NULL, '1751', 9, 9, 4, NULL, 'sub_editor', 1, 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', '01958424900', NULL, '$2y$10$yN4fZDod6JqWu5loCBaJ7ONXaDpHcYsBgY7GWbC1TXAMkY1tywgKW', NULL, '2021-11-14 16:02:23', '2021-11-15 23:58:18'),
(5, 'bcbc', 'bcbc', 'bcbc@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '1751', 8, 11, 5, NULL, 'editor', 1, 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', '01829747029', NULL, '$2y$10$MYe9I5tPLN9WSA0AJSDSMO.w5nmsGB9.9RiFBKzYWJiu8/M73y5M6', NULL, '2021-11-14 16:02:49', '2021-11-14 16:02:49'),
(6, 'tamima', 'tamima', 'tamima@gmail.com', NULL, 0, 0, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 1, NULL, '1751', 8, 11, 5, NULL, 'editor', 1, 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', '01829747029', NULL, '$2y$10$SbEVgImIPoD9k4iF13twn.jSKY6dC5rquYyGoeAd9HRbHSUbiE2we', NULL, '2021-11-14 16:07:09', '2021-11-23 22:41:02'),
(7, 'reja', 'reja', 'reja@mail', NULL, 0, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, NULL, '1751', 7, 8, 4, NULL, 'sub_editor', 1, 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', '01958424900', NULL, '$2y$10$UxEFhAIkGrNAHXapJIMr4.MRStKGyFzgCHHysslasnNBUP3j46GYW', NULL, '2021-11-14 16:24:07', '2021-11-15 23:58:17'),
(8, 'shahriyar', 'shahriyar', 'shahriyar@outlook.com', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, NULL, '1751', 7, 8, 4, NULL, 'admin', 1, 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', 'bishwaspara, Shafipur, kaliakoir, gazipur, Dhaka', '01956424568', NULL, '$2y$10$K2Q7cVzJBhgBSEJmDfdrK.rAYDhFD3xVX2mHVI3j7NZpKQCcD3Kya', NULL, '2021-11-14 17:43:58', '2021-11-14 17:43:58'),
(9, 'general_user', 'general_user', 'genneraluser@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'rfgrg', NULL, NULL, NULL, NULL, 'general_user', 1, NULL, NULL, NULL, NULL, '$2y$10$t2289tFuMuF97SoxvV21M.SRdjNExcBwUDBRYGMRpGbOBcYkqSzja', NULL, NULL, NULL),
(10, 'test', 'test', 'test@gmail.com', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, '1232', 8, 11, 5, NULL, 'reporter', 1, 'dhaka', 'dhaka', '017435345346', NULL, '$2y$10$XbSFdd5kBRMYmuBboa6wqek68gnsmHhBAeZhSXZozLPyPIW3umyTK', NULL, '2021-11-23 05:43:30', '2021-11-23 05:43:30'),
(11, 'test1', 'test1', 'test1@gmail.com', NULL, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, NULL, '3452', 15, 17, 8, NULL, 'editor', 1, 'chittagong', 'chittagong', '0182345678', NULL, '$2y$10$tVNhJCweRRdpOrtqGijec.QTPWzL9ooTWSRxqopsRzo9RGs3dTNmy', NULL, '2021-11-23 22:44:41', '2021-11-23 22:44:41'),
(12, 'reporter', 'reporter', 'reporter@gmail.com', NULL, 0, 0, 1, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, NULL, '4563', 16, 18, 8, NULL, 'reporter', 1, 'dhaka', 'dhaka', '016793458778', NULL, '$2y$10$ApiXomcYJjIoSudHyIWs..cCkxpSFaYHTREPVvSCrOM8hMy8bYGC6', NULL, '2021-11-23 22:46:40', '2021-11-23 22:46:40'),
(13, 'tamima', NULL, 'tamima21@gmail.com', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'general_user', 1, NULL, NULL, NULL, NULL, '$2y$10$B2WiBcYA8rSjbTojVKuK/u8nqX1KkJYdLKPYJobiYsar6RpFjFw1W', NULL, '2021-11-28 05:18:27', '2021-11-28 05:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `video_title_bn`, `video_title_en`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Bow-Toons Adventures for 30 Minutes', 'Bow-Toons Adventures for 30 Minutes', 'https://www.youtube.com/embed/dvVvm6nGxTI', '2021-11-23 23:30:23', '2021-11-23 23:30:23'),
(2, 'Happy Birthday Mickey Mouse and Minnie Mouse', 'Happy Birthday Mickey Mouse and Minnie Mouse', 'https://www.youtube.com/embed/uLtHc4-Dv1A', '2021-11-23 23:31:24', '2021-11-23 23:31:24'),
(3, 'Donald Duck & Chip and Dale Cartoons - Lion, Pluto, Mickey Mouse Clubhouse, Figaro, Frankie', 'Donald Duck & Chip and Dale Cartoons - Lion, Pluto, Mickey Mouse Clubhouse, Figaro, Frankie', 'https://www.youtube.com/embed/csj4RoNsn-w', '2021-11-23 23:39:01', '2021-11-23 23:39:01'),
(4, 'Lima bebek kecil', 'Lima bebek kecil', 'https://www.youtube.com/embed/oU9AM5zWJNo', '2021-11-23 23:40:55', '2021-11-23 23:40:55'),
(5, 'Mr Bean Learns to Cook', 'Mr Bean Learns to Cook', 'https://www.youtube.com/embed/1lbriMCMEC8', '2021-11-23 23:41:42', '2021-11-23 23:41:42'),
(6, 'Disney\'s Encanto', 'Disney\'s Encanto', 'https://www.youtube.com/embed/1lbriMCMEC8', '2021-11-23 23:43:15', '2021-11-23 23:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_post_id_foreign` (`blog_post_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_posts_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `covid_tackers`
--
ALTER TABLE `covid_tackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings_backends`
--
ALTER TABLE `general_settings_backends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings_frontends`
--
ALTER TABLE `general_settings_frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sent_by_foreign` (`sent_by`),
  ADD KEY `notifications_sent_for_foreign` (`sent_for`),
  ADD KEY `notifications_post_id_foreign` (`post_id`);

--
-- Indexes for table `on_offs`
--
ALTER TABLE `on_offs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_tables`
--
ALTER TABLE `page_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_category_id_foreign` (`category_id`),
  ADD KEY `subcategories_sub_cat_id_foreign` (`sub_category_id`),
  ADD KEY `users_user_id_foreign` (`user_id`),
  ADD KEY `divisions_division_id_foreign` (`division_id`),
  ADD KEY `districts_district_id_foreign` (`district_id`),
  ADD KEY `sub_districts_district_id_foreign` (`subdistrict_id`);

--
-- Indexes for table `reporters`
--
ALTER TABLE `reporters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporters_category_id_foreign` (`category_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_districts_division_id_foreign` (`division_id`),
  ADD KEY `sub_districts_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_division_foreign` (`division`),
  ADD KEY `users_district_foreign` (`district`),
  ADD KEY `users_city_foreign` (`city`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `covid_tackers`
--
ALTER TABLE `covid_tackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings_backends`
--
ALTER TABLE `general_settings_backends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings_frontends`
--
ALTER TABLE `general_settings_frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `on_offs`
--
ALTER TABLE `on_offs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_tables`
--
ALTER TABLE `page_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reporters`
--
ALTER TABLE `reporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_districts`
--
ALTER TABLE `sub_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_sent_by_foreign` FOREIGN KEY (`sent_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_sent_for_foreign` FOREIGN KEY (`sent_for`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reporters`
--
ALTER TABLE `reporters`
  ADD CONSTRAINT `reporters_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD CONSTRAINT `sub_districts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_foreign` FOREIGN KEY (`city`) REFERENCES `sub_districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_district_foreign` FOREIGN KEY (`district`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_division_foreign` FOREIGN KEY (`division`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
