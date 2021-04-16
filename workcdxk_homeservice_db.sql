-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2021 at 07:07 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workcdxk_homeservice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(20,17) NOT NULL DEFAULT 0.00000000000000000,
  `longitude` double(20,17) NOT NULL DEFAULT 0.00000000000000000,
  `default` tinyint(1) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `description`, `address`, `latitude`, `longitude`, `default`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', '34718 Nolan Avenue Suite 647\nNaomieville, MO 16914', 50.93247868000000000, 9.37926632000000000, 0, 1, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(2, 'Office', '8379 Kaleigh Groves\nDurganchester, KS 87880', 50.89780261000000000, 9.28501647000000000, 0, 7, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(3, 'Workshop', '827 Marks Isle\nPort Cullen, KY 93753', 51.91187400000000000, 11.37004754000000000, 0, 2, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(4, 'Building', '64554 Flatley Station Apt. 891\nSouth Katlynborough, NC 29850-8418', 51.75589036000000000, 10.91395215000000000, 0, 5, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(5, 'Office', '62242 Myrtice Village Suite 357\nSouth Rethastad, MI 39118-2120', 50.45897839000000000, 11.60466870000000000, 0, 5, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(6, 'Building', '85356 Auer Glen Suite 355\nLake Halie, SD 41834', 51.52041031000000000, 9.67903781000000000, 0, 5, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(7, 'Office', '16577 Langosh Ways Suite 063\nBrittanyhaven, DE 17280-6755', 50.00430038000000000, 11.00526446000000000, 0, 1, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(8, 'Work', '2437 Addison Station\nWhitemouth, ND 36349-1943', 51.19042791000000000, 9.63751093000000000, 0, 5, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(9, 'Hotel', '90955 Stehr Ferry\nNew Kurtchester, TX 13008-0188', 51.05500880000000000, 10.18028164000000000, 0, 7, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(10, 'Work', '593 Jadyn Stravenue Suite 969\nNew Kylie, LA 00214-8901', 50.40691173000000000, 11.98057979000000000, 0, 3, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(11, 'Building', '345 Graham Spurs\nEmelyshire, ID 96604', 51.01407740000000000, 9.51244670000000000, 0, 5, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(12, 'Office', '89649 Weston Rue\nSouth Brandiburgh, MN 87768-9967', 50.07792465000000000, 9.70353927000000000, 0, 4, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(13, 'Work', '441 Robin Radial\nYolandamouth, CT 43156', 50.22016539000000000, 10.45316507000000000, 0, 5, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(14, 'Office', '968 Tyrell Highway\nNew Trevor, TX 93535', 50.69304397000000000, 10.40384603000000000, 0, 6, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(15, 'Home', '4389 Thiel Rue\nElfriedaberg, FL 74812', 50.84127297000000000, 11.13556688000000000, 0, 7, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(16, 'Building', '647 Dannie Throughway Apt. 412\nEast Micaelachester, CA 84440-5067', 51.93597879000000000, 9.63308520000000000, 0, 4, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(17, 'Building', '41373 Jerde Fall Suite 216\nShanahantown, HI 74494-4014', 51.47686594000000000, 9.91379744000000000, 0, 2, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(18, 'Office', '4829 Mikayla Road\nArmandoview, WI 31930-0030', 51.44219814000000000, 9.53222528000000000, 0, 4, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(19, 'Hotel', '31469 Mittie Fall\nHirtheport, UT 20218', 51.94241359000000000, 11.09889167000000000, 0, 4, '2021-03-19 13:02:52', '2021-03-19 13:02:52'),
(20, 'Work', '9932 Lizeth Underpass\nSallybury, OK 22004', 51.65600939000000000, 11.05574869000000000, 0, 7, '2021-03-19 13:02:52', '2021-03-19 13:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `key`, `value`) VALUES
(7, 'date_format', 'l jS F Y (H:i:s)'),
(8, 'language', 'en'),
(17, 'is_human_date_format', '1'),
(18, 'app_name', 'Home Services'),
(19, 'app_short_description', 'Manage Mobile Application'),
(20, 'mail_driver', 'smtp'),
(21, 'mail_host', 'smtp.hostinger.com'),
(22, 'mail_port', '587'),
(23, 'mail_username', 'test@demo.com'),
(24, 'mail_password', '-'),
(25, 'mail_encryption', 'ssl'),
(26, 'mail_from_address', 'test@demo.com'),
(27, 'mail_from_name', 'Smarter Vision'),
(30, 'timezone', 'America/Montserrat'),
(32, 'theme_contrast', 'light'),
(33, 'theme_color', 'primary'),
(34, 'app_logo', '020a2dd4-4277-425a-b450-426663f52633'),
(35, 'nav_color', 'navbar-dark navbar-navy'),
(38, 'logo_bg_color', 'text-light  navbar-navy'),
(66, 'default_role', 'admin'),
(68, 'facebook_app_id', '518416208939727'),
(69, 'facebook_app_secret', '93649810f78fa9ca0d48972fee2a75cd'),
(71, 'twitter_app_id', 'twitter'),
(72, 'twitter_app_secret', 'twitter 1'),
(74, 'google_app_id', '527129559488-roolg8aq110p8r1q952fqa9tm06gbloe.apps.googleusercontent.com'),
(75, 'google_app_secret', 'FpIi8SLgc69ZWodk-xHaOrxn'),
(77, 'enable_google', '1'),
(78, 'enable_facebook', '1'),
(93, 'enable_stripe', '0'),
(94, 'stripe_key', 'pk_test_pltzOnX3zsUZMoTTTVUL4O41'),
(95, 'stripe_secret', 'sk_test_o98VZx3RKDUytaokX4My3a20'),
(101, 'custom_field_models.0', 'App\\Models\\User'),
(104, 'default_tax', '10'),
(107, 'default_currency', '$'),
(108, 'fixed_header', '1'),
(109, 'fixed_footer', '0'),
(110, 'fcm_key', 'AAAAHMZiAQA:APA91bEb71b5sN5jl-w_mmt6vLfgGY5-_CQFxMQsVEfcwO3FAh4-mk1dM6siZwwR3Ls9U0pRDpm96WN1AmrMHQ906GxljILqgU2ZB6Y1TjiLyAiIUETpu7pQFyicER8KLvM9JUiXcfWK'),
(111, 'enable_notifications', '1'),
(112, 'paypal_username', 'sb-z3gdq482047_api1.business.example.com'),
(113, 'paypal_password', '-'),
(114, 'paypal_secret', '-'),
(115, 'enable_paypal', '1'),
(116, 'main_color', '#F4841F'),
(117, 'main_dark_color', '#F4841F'),
(118, 'second_color', '#08143A'),
(119, 'second_dark_color', '#CCCCDD'),
(120, 'accent_color', '#8C9DA8'),
(121, 'accent_dark_color', '#9999AA'),
(122, 'scaffold_dark_color', '#2C2C2C'),
(123, 'scaffold_color', '#FAFAFA'),
(124, 'google_maps_key', '-AIzaSyAX979pPIm_VJjXab0Oe8-E5x6i50614G0'),
(125, 'mobile_language', 'en'),
(126, 'app_version', '1.0.0'),
(127, 'enable_version', '1'),
(128, 'default_currency_id', '1'),
(129, 'default_currency_code', 'USD'),
(130, 'default_currency_decimal_digits', '2'),
(131, 'default_currency_rounding', '0'),
(132, 'currency_right', '1'),
(133, 'distance_unit', 'km'),
(134, 'default_theme', 'light');

-- --------------------------------------------------------

--
-- Table structure for table `availability_hours`
--

CREATE TABLE `availability_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monday',
  `start_at` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_at` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_provider_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `title`, `description`, `e_provider_id`, `created_at`, `updated_at`) VALUES
(1, 'Debitis et expedita pariatur. Officiis amet numquam veritatis distinctio rerum aliquam.', 'Queen in a dreamy sort of present!\' thought Alice. \'I\'m glad I\'ve seen that done,\' thought Alice. The King looked anxiously round, to make it stop. \'Well, I\'d hardly finished the guinea-pigs!\'.', 1, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(2, 'Sapiente officia magni aut. Non est sint ut est qui.', 'I\'ll never go THERE again!\' said Alice in a twinkling! Half-past one, time for dinner!\' (\'I only wish it was,\' said the Mouse, in a VERY good opportunity for croqueting one of the legs of the baby?\'.', 13, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(3, 'Sint iure esse veniam nihil. Recusandae quos qui qui sed nostrum. Ipsam ut nesciunt animi.', 'I could say if I know is, something comes at me like that!\' He got behind him, and said \'No, never\') \'--so you can find it.\' And she began fancying the sort of a feather flock together.\"\' \'Only.', 15, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(5, 'Voluptates adipisci eius sed nihil nihil et ut. Ex nisi nulla sapiente sint enim.', 'I want to go down the middle, wondering how she was up to the end of every line: \'Speak roughly to your places!\' shouted the Queen. \'Their heads are gone, if it wasn\'t trouble enough hatching the.', 3, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(6, 'Placeat id eius consequatur. Vel qui cumque facere hic est. Aut itaque itaque quos natus quia qui.', 'NOT marked \'poison,\' it is almost certain to disagree with you, sooner or later. However, this bottle does. I do so like that curious song about the crumbs,\' said the Dodo in an undertone.', 13, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(8, 'Omnis facilis modi eaque nesciunt sequi ut ratione. Nisi quis atque et.', 'DOES THE BOOTS AND SHOES.\' the Gryphon in an impatient tone: \'explanations take such a curious dream, dear, certainly: but now run in to your places!\' shouted the Queen. \'You make me grow larger, I.', 17, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(9, 'Sed rerum enim autem labore sint et. Explicabo repellat aut fugit qui fuga.', 'King eagerly, and he checked himself suddenly: the others looked round also, and all the other arm curled round her head. Still she went on, \'that they\'d let Dinah stop in the house, quite.', 1, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(10, 'Odit odit sit recusandae et aut nihil dolores architecto. Consequatur placeat sunt ad corrupti.', 'The chief difficulty Alice found at first she thought it would be as well she might, what a Gryphon is, look at all for any of them. \'I\'m sure I\'m not looking for eggs, as it didn\'t sound at all.', 10, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(11, 'Ut assumenda dolor non ut aliquam. Aut voluptas error occaecati.', 'I meant,\' the King said, with a bound into the sky all the rest, Between yourself and me.\' \'That\'s the most curious thing I ever saw in my own tears! That WILL be a comfort, one way--never to be.', 14, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(12, 'Error sed non inventore ad. Et voluptatum possimus et.', 'Mouse was swimming away from him, and said nothing. \'This here young lady,\' said the cook. The King turned pale, and shut his note-book hastily. \'Consider your verdict,\' he said do. Alice looked at.', 2, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(14, 'Doloremque quo sed ullam quo sunt in iusto. Modi repudiandae qui error qui.', 'Do you think, at your age, it is to France-- Then turn not pale, beloved snail, but come and join the dance?\"\' \'Thank you, sir, for your walk!\" \"Coming in a pleased tone. \'Pray don\'t trouble.', 5, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(15, 'Natus ipsa voluptas velit. Omnis eum quasi facere omnis. Dolor a excepturi quisquam dolorum magnam.', 'Queen, pointing to Alice an excellent plan, no doubt, and very soon had to leave the room, when her eye fell on a summer day: The Knave of Hearts, who only bowed and smiled in reply. \'Idiot!\' said.', 3, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(16, 'Sunt autem tenetur quod aut ad rerum. Eligendi eum amet quia enim eveniet. Odio et dolorem velit.', 'And she went on in a very short time the Mouse in the wind, and the White Rabbit interrupted: \'UNimportant, your Majesty means, of course,\' he said do. Alice looked down at them, and all of them.', 15, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(17, 'Saepe error eos et. Doloremque culpa et officia.', 'Because he knows it teases.\' CHORUS. (In which the words have got altered.\' \'It is a very decided tone: \'tell her something worth hearing. For some minutes it seemed quite dull and stupid for life.', 17, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(18, 'Qui voluptatum qui repudiandae voluptas eveniet sunt. Tenetur incidunt officia autem architecto.', 'Gryphon, lying fast asleep in the lap of her favourite word \'moral,\' and the Queen, who were giving it a bit, if you were never even introduced to a snail. \"There\'s a porpoise close behind her.', 11, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(19, 'Omnis cupiditate iure doloribus sed quia cum saepe. Voluptas et ex sunt explicabo blanditiis aut.', 'Alice had got its neck nicely straightened out, and was going on, as she swam lazily about in the book,\' said the Hatter. \'I told you butter wouldn\'t suit the works!\' he added in a low voice, to the.', 1, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(20, 'Velit qui perspiciatis necessitatibus. Magnam quos a omnis excepturi et.', 'The three soldiers wandered about for it, while the rest were quite dry again, the Dodo had paused as if it likes.\' \'I\'d rather not,\' the Cat said, waving its tail when I\'m angry. Therefore I\'m.', 3, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(21, 'Eveniet quidem consectetur quidem quae. Magnam itaque magni quidem iusto aliquam ducimus dicta.', 'I\'m here! Digging for apples, indeed!\' said Alice, rather alarmed at the stick, and made a dreadfully ugly child: but it all seemed quite natural to Alice a good many voices all talking together.', 3, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(22, 'Ut amet quibusdam quis mollitia. Aut adipisci omnis aliquam. Quae quia est quis consectetur.', 'Alice looked at the Hatter, \'when the Queen of Hearts, carrying the King\'s crown on a crimson velvet cushion; and, last of all the while, and fighting for the hot day made her next remark. \'Then the.', 2, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(23, 'Omnis perspiciatis nemo voluptate modi. Expedita nesciunt a et sequi eaque non animi ea.', 'Alice, seriously, \'I\'ll have nothing more to come, so she bore it as you say it.\' \'That\'s nothing to do.\" Said the mouse doesn\'t get out.\" Only I don\'t like it, yer honour, at all, as the jury.', 15, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(24, 'Labore unde nulla voluptate. Dicta velit est quod ut et facere. Sed fugit eius odio ratione.', 'HE was.\' \'I never said I didn\'t!\' interrupted Alice. \'You are,\' said the Duchess, \'chop off her head!\' Those whom she sentenced were taken into custody by the Queen till she too began dreaming after.', 10, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(25, 'Dolorem neque et neque. Quam sed aspernatur iste quae eaque esse. At rerum mollitia qui et.', 'SOMEBODY ought to be otherwise.\"\' \'I think I could, if I like being that person, I\'ll come up: if not, I\'ll stay down here! It\'ll be no use their putting their heads downward! The Antipathies, I.', 8, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(26, 'Atque et totam odit et doloremque in est. Perferendis ex fugit neque temporibus minima repellendus.', 'Then came a little bottle on it, or at least one of them at dinn--\' she checked herself hastily, and said nothing. \'Perhaps it hasn\'t one,\' Alice ventured to ask. \'Suppose we change the subject. \'Go.', 10, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(28, 'Ipsum odit officiis ut eius distinctio ut. Dolor aut aut corrupti quo similique.', 'Dormouse denied nothing, being fast asleep. \'After that,\' continued the Gryphon. \'It all came different!\' Alice replied in a ring, and begged the Mouse replied rather impatiently: \'any shrimp could.', 10, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(29, 'In dolores sit et a. Repellendus nulla labore consequatur sint. Numquam doloribus ut nam occaecati.', 'Gryphon in an undertone, \'important--unimportant--unimportant--important--\' as if he were trying to touch her. \'Poor little thing!\' said the Cat. \'I said pig,\' replied Alice; \'and I do wonder what.', 5, '2021-03-19 13:02:57', '2021-03-19 13:02:57'),
(31, 'Cupiditate sint quisquam velit. Fugit dolorum enim quia facere sit quos occaecati.', 'Mock Turtle angrily: \'really you are very dull!\' \'You ought to eat or drink something or other; but the Gryphon whispered in a soothing tone: \'don\'t be angry about it. And yet you incessantly stand.', 8, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(32, 'Aut aspernatur qui modi ut cum architecto dolores dolorem. Pariatur magnam dolor nisi quia.', 'Queen, but she remembered trying to invent something!\' \'I--I\'m a little irritated at the Duchess was sitting on the back. However, it was only sobbing,\' she thought, and looked at the bottom of a.', 14, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(33, 'Rerum facilis blanditiis quia ipsam. Et enim magnam ut est excepturi dolore possimus.', 'Very soon the Rabbit just under the table: she opened it, and burning with curiosity, she ran out of breath, and said \'That\'s very curious!\' she thought. \'I must go and live in that ridiculous.', 13, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(34, 'Ea earum quae et molestiae ut ullam. Ratione ullam quae aut et ut libero aut voluptatum.', 'Alice said with a trumpet in one hand and a fan! Quick, now!\' And Alice was only a pack of cards, after all. \"--SAID I COULD NOT SWIM--\" you can\'t think! And oh, my poor hands, how is it I can\'t.', 4, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(35, 'Doloribus voluptas recusandae et libero natus. Incidunt quia aut ad veritatis.', 'Classics master, though. He was looking down with her face like the three were all writing very busily on slates. \'What are they doing?\' Alice whispered to the other, saying, in a melancholy air.', 15, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(37, 'Iusto non hic qui. Doloremque nihil quaerat omnis autem iste eos inventore similique.', 'D,\' she added in a hoarse, feeble voice: \'I heard every word you fellows were saying.\' \'Tell us a story!\' said the March Hare. \'He denies it,\' said the Mock Turtle would be of any use, now,\' thought.', 3, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(40, 'Et eligendi consequatur sint nulla vero. Rerum perspiciatis autem saepe.', 'Alice. \'It must have a prize herself, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so she sat still and said to herself, being rather proud of it: \'No room!.', 1, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(41, 'Qui vel blanditiis ea ut. Atque ipsum ullam voluptatum sequi cum doloribus aut.', 'Duchess said after a pause: \'the reason is, that there\'s any one left alive!\' She was looking at the top of his teacup instead of onions.\' Seven flung down his brush, and had no idea how confusing.', 8, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(42, 'Consequuntur sint in facilis nihil. Deleniti error id cum quo. Laborum facilis nostrum ipsum dolor.', 'March Hare. \'He denies it,\' said the Hatter: \'but you could see this, as she was beginning to write with one finger pressed upon its nose. The Dormouse shook its head down, and was suppressed.', 15, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(43, 'Esse commodi et consequatur occaecati ut quia quia. Nesciunt inventore similique occaecati.', 'Which shall sing?\' \'Oh, YOU sing,\' said the Queen. \'I never was so large a house, that she never knew so much contradicted in her hands, and began:-- \'You are old,\' said the King, \'that only makes.', 10, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(44, 'Et minus voluptate perspiciatis illum. Ut velit non ut voluptates distinctio cumque totam.', 'Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it made Alice quite hungry to look about her repeating \'YOU.', 10, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(46, 'Et neque veniam autem vitae. Maiores voluptate rerum aliquam est.', 'Time as well say,\' added the Hatter, \'or you\'ll be asleep again before it\'s done.\' \'Once upon a neat little house, and the pattern on their slates, and then all the same, the next verse.\' \'But about.', 8, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(47, 'Dolorem neque quae quia illo vitae explicabo. Nulla qui aut vero doloremque.', 'However, on the bank--the birds with draggled feathers, the animals with their hands and feet, to make out that one of the court was a child,\' said the Dodo in an encouraging opening for a great.', 7, '2021-03-19 13:02:58', '2021-03-19 13:02:58'),
(49, 'Fugit sit omnis blanditiis ipsum repellat sunt. Recusandae sunt explicabo eos ut.', 'Long Tale They were just beginning to get dry again: they had at the Gryphon repeated impatiently: \'it begins \"I passed by his garden.\"\' Alice did not at all know whether it was written to nobody.', 1, '2021-03-19 13:02:58', '2021-03-19 13:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `e_provider` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`e_provider`)),
  `e_service` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`e_service`)),
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_status_id` int(10) UNSIGNED DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`address`)),
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `coupon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`coupon`)),
  `taxes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`taxes`)),
  `booking_at` datetime DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `hint` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_statuses`
--

CREATE TABLE `booking_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_statuses`
--

INSERT INTO `booking_statuses` (`id`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Received', 1, '2021-01-25 14:25:46', '2021-01-29 12:56:35'),
(2, 'In Progress', 40, '2021-01-25 14:26:02', '2021-02-16 16:56:52'),
(3, 'On the Way', 20, '2021-01-28 02:47:23', '2021-02-16 07:10:13'),
(4, 'Accepted', 10, '2021-02-16 07:09:29', '2021-02-16 07:10:06'),
(5, 'Ready', 30, '2021-02-16 07:11:50', '2021-02-16 16:56:42'),
(6, 'Done', 50, '2021-02-16 16:57:02', '2021-02-16 16:57:02'),
(7, 'Failed', 60, '2021-02-16 16:58:36', '2021-02-16 16:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `featured` tinyint(1) DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`, `description`, `order`, `featured`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Car Services', '#ff9f43', '<p>Categories for all cars services..</p>', 1, 1, NULL, '2021-01-19 12:01:35', '2021-03-24 00:13:23'),
(2, 'Medical Services', '#0abde3', '<p>Categories for all Medical Services<br></p>', 2, 1, NULL, '2021-01-19 13:05:00', '2021-01-31 08:35:11'),
(3, 'Laundry Service', '#ee5253', '<p>Category for all Laundry Service</p>', 3, 1, NULL, '2021-01-31 08:37:04', '2021-02-01 19:33:10'),
(4, 'Beauty & Hair Cuts', '#10ac84', '<p>Category for Hair Cuts and Barber</p>', 4, 1, NULL, '2021-01-31 08:38:37', '2021-03-24 02:34:43'),
(5, 'Washing & Cleaning', '#5f27cd', '<p>Category for Washing & Cleaning </p>', 5, 1, NULL, '2021-01-31 08:42:02', '2021-03-24 02:34:32'),
(6, 'Media & Photography', '#ff9f43', '<p>Category for Media & Photography</p>', 6, 1, NULL, '2021-01-31 08:43:20', '2021-03-24 02:34:19'),
(7, 'Sewer Cleaning', '#5f27cd', '<p>Category for Sewer Cleaning<br></p>', 1, 1, 5, '2021-01-31 09:46:15', '2021-03-24 02:34:02'),
(8, 'Carpet Cleaning', '#5f27cd', '<p>Category for Carpet Cleaning<br></p>', 2, 1, 5, '2021-01-31 09:47:23', '2021-03-24 02:33:51'),
(9, 'Wheel Repairr', '#5f27cd', '<p>Category for Wheel Repair<br></p>', 1, 1, 1, '2021-01-31 09:49:40', '2021-03-24 02:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kenya', NULL, NULL),
(2, 'South Africa', NULL, NULL),
(7, 'Tanzania', '2021-03-22 15:43:26', '2021-03-22 15:43:26'),
(8, 'Nigeria', '2021-03-22 15:43:52', '2021-03-22 15:43:52'),
(9, 'Ghana', '2021-03-22 15:44:08', '2021-03-22 15:44:08'),
(10, 'Bostwana', '2021-03-22 15:44:20', '2021-03-22 15:44:20'),
(11, 'Maurice', '2021-03-22 15:44:34', '2021-03-22 15:44:34'),
(12, 'Senegal', '2021-03-23 13:26:30', '2021-03-23 13:26:30'),
(13, 'Mali', '2021-03-23 13:26:43', '2021-03-23 13:26:43'),
(14, 'Cote d’Ivoire', '2021-03-23 13:27:00', '2021-03-23 13:27:00'),
(15, 'Gabon', '2021-03-23 13:27:14', '2021-03-23 13:27:14'),
(16, 'Niger', '2021-03-23 13:27:28', '2021-03-23 13:27:28'),
(17, 'Burkina faso', '2021-03-23 13:27:52', '2021-03-23 13:27:52'),
(18, 'Benin', '2021-03-23 13:28:03', '2021-03-23 13:28:03'),
(19, 'Togo', '2021-03-23 13:28:13', '2021-03-23 13:28:13'),
(20, 'Cameroun', '2021-03-23 13:28:28', '2021-03-23 13:28:28'),
(21, 'Egypt', '2021-03-23 13:28:42', '2021-03-23 13:28:42'),
(22, 'Tunisia', '2021-03-23 13:28:52', '2021-03-23 13:28:52'),
(23, 'Algeria', '2021-03-23 13:29:12', '2021-03-23 13:29:12'),
(24, 'Morroco', '2021-03-23 13:29:23', '2021-03-23 13:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_digits` tinyint(3) UNSIGNED DEFAULT NULL,
  `rounding` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `code`, `decimal_digits`, `rounding`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', '$', 'USD', 2, 0, '2020-10-22 10:50:48', '2020-10-22 10:50:48'),
(2, 'Euro', '€', 'EUR', 2, 0, '2020-10-22 10:51:39', '2020-10-22 10:51:39'),
(3, 'Indian Rupee', 'টকা', 'INR', 2, 0, '2020-10-22 10:52:50', '2020-10-22 10:52:50'),
(4, 'Indonesian Rupiah', 'Rp', 'IDR', 0, 0, '2020-10-22 10:53:22', '2020-10-22 10:53:22'),
(5, 'Brazilian Real', 'R$', 'BRL', 2, 0, '2020-10-22 10:54:00', '2020-10-22 10:54:00'),
(6, 'Cambodian Riel', '៛', 'KHR', 2, 0, '2020-10-22 10:55:51', '2020-10-22 10:55:51'),
(7, 'Vietnamese Dong', '₫', 'VND', 0, 0, '2020-10-22 10:56:26', '2020-10-22 10:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  `in_table` tinyint(1) DEFAULT NULL,
  `bootstrap_column` tinyint(4) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `custom_field_model` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `type`, `values`, `disabled`, `required`, `in_table`, `bootstrap_column`, `order`, `custom_field_model`, `created_at`, `updated_at`) VALUES
(5, 'bio', 'textarea', NULL, 0, 0, 0, 6, 1, 'App\\Models\\User', '2019-09-06 16:43:58', '2019-09-06 16:43:58'),
(6, 'address', 'text', NULL, 0, 0, 0, 6, 3, 'App\\Models\\User', '2019-09-06 16:49:22', '2019-09-06 16:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_field_id` int(10) UNSIGNED NOT NULL,
  `customizable_type` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customizable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_field_values`
--

INSERT INTO `custom_field_values` (`id`, `value`, `view`, `custom_field_id`, `customizable_type`, `customizable_id`, `created_at`, `updated_at`) VALUES
(30, 'Explicabo. Eum provi.&nbsp;', 'Explicabo. Eum provi.&nbsp;', 5, 'App\\Models\\User', 2, '2019-09-06 16:52:30', '2021-02-02 06:32:57'),
(31, 'Modi est libero qui', 'Modi est libero qui', 6, 'App\\Models\\User', 2, '2019-09-06 16:52:30', '2021-02-02 06:32:57'),
(33, 'Consequatur error ip. ', 'Consequatur error ip. ', 5, 'App\\Models\\User', 1, '2019-09-06 16:53:58', '2021-03-24 14:29:54'),
(34, 'Qui vero ratione vel', 'Qui vero ratione vel', 6, 'App\\Models\\User', 1, '2019-09-06 16:53:58', '2021-02-02 06:32:01'),
(36, 'Dolor optio, error e', 'Dolor optio, error e', 5, 'App\\Models\\User', 3, '2019-10-15 12:21:32', '2021-02-02 06:33:23'),
(37, 'Voluptatibus ad ipsu', 'Voluptatibus ad ipsu', 6, 'App\\Models\\User', 3, '2019-10-15 12:21:32', '2021-02-02 06:33:23'),
(39, 'Faucibus ornare suspendisse sed nisi lacus sed. Pellentesque sit amet porttitor eget dolor morbi non arcu. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta', 'Faucibus ornare suspendisse sed nisi lacus sed. Pellentesque sit amet porttitor eget dolor morbi non arcu. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta', 5, 'App\\Models\\User', 4, '2019-10-16 14:31:46', '2019-10-16 14:31:46'),
(40, 'Sequi molestiae ipsa1', 'Sequi molestiae ipsa1', 6, 'App\\Models\\User', 4, '2019-10-16 14:31:46', '2021-02-21 18:32:10'),
(42, 'Omnis fugiat et cons.', 'Omnis fugiat et cons.', 5, 'App\\Models\\User', 5, '2019-12-15 13:49:44', '2021-02-02 06:29:47'),
(43, 'Consequatur delenit', 'Consequatur delenit', 6, 'App\\Models\\User', 5, '2019-12-15 13:49:44', '2021-02-02 06:29:47'),
(45, '<p>Short bio for this driver</p>', 'Short bio for this driver', 5, 'App\\Models\\User', 6, '2020-03-29 12:28:05', '2020-03-29 12:28:05'),
(46, '4722 Villa Drive', '4722 Villa Drive', 6, 'App\\Models\\User', 6, '2020-03-29 12:28:05', '2020-03-29 12:28:05'),
(48, 'Voluptatem. Omnis op.', 'Voluptatem. Omnis op.', 5, 'App\\Models\\User', 7, '2021-01-17 11:13:24', '2021-02-02 06:31:36'),
(49, 'Perspiciatis aut ei', 'Perspiciatis aut ei', 6, 'App\\Models\\User', 7, '2021-01-17 11:13:24', '2021-02-02 06:31:36'),
(51, 'sdfsdf56', 'sdfsdf56', 5, 'App\\Models\\User', 8, '2021-02-10 06:31:12', '2021-02-19 09:09:37'),
(52, 'Adressttt', 'Adressttt', 6, 'App\\Models\\User', 8, '2021-02-10 06:31:12', '2021-02-19 08:57:27'),
(53, NULL, '', 5, 'App\\Models\\User', 10, '2021-03-29 01:56:06', '2021-03-29 01:56:06'),
(54, NULL, NULL, 6, 'App\\Models\\User', 10, '2021-03-29 01:56:06', '2021-03-29 01:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `title`, `content`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<h1>Privacy Policy of SmarterVision</h1>\n<p>SmarterVision operates the SmarterVision website, which provides the SERVICE.</p>\n<p>This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service, the smartersvision.com website.</p>\n<p>If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.</p>\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at smartersvision.com, unless otherwise defined in this Privacy Policy.</p>\n<h2>Information Collection and Use</h2>\n<p>For a better experience, while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.</p>\n<h2>Log Data</h2>\n<p>We want to inform you that whenever you visit our Service, we collect information that your browser sends to us which is called Log Data. This Log Data may include information such as your computer\'s Internet Protocol (“IP”) address, browser version, pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>\n<h2>Cookies</h2>\n<p>Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer\'s hard drive.</p>\n<p>Our website uses these “cookies” to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our Service.</p>\n<h2>Service Providers</h2>\n<p>We may employ third-party companies and individuals due to the following reasons:</p>\n<ul>\n<li>To facilitate our Service;</li>\n<li>To provide the Service on our behalf;</li>\n<li>To perform Service-related services; or</li>\n<li>To assist us in analyzing how our Service is used.</li>\n</ul>\n<p>We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\n<h2>Security</h2>\n<p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>\n<h2>Links to Other Sites</h2>\n<p>Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\n<h2>Children\'s Privacy</h2>\n<p>Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.</p>\n<h2>Changes to This Privacy Policy</h2>\n<p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>\n<h2>Contact Us</h2>\n<p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>', 1, '2021-02-24 06:53:21', '2021-02-24 08:19:19'),
(2, 'Terms & Conditions', '<h2>Terms &amp; Conditions</h2><p>Dolor consequat. Ex ducimus, dolores fugiat ipsam sunt non a dolor quidem nulla ullamco Nam labore nostrum sit amet, tenetur ut consequatur? Non aut incididunt consequatur, rem veniam, veritatis molestiae neque non veniam, nemo facilis eligendi qui aut enim aperiam rerum fugiat, dolorum qui id, in sint et assumenda mollitia dignissimos illum, ipsum maiores asperiores exercitationem odio labore laboris consequatur? Consequatur, sapiente ipsum, laboriosam, laudantium, dolor sed autem eligendi ea a.</p><p>Dolor consequat. Ex ducimus, dolores fugiat ipsam sunt non a dolor quidem nulla ullamco Nam labore nostrum sit amet, tenetur ut consequatur? Non aut incididunt consequatur, rem veniam, veritatis molestiae neque non veniam, nemo facilis eligendi qui aut enim aperiam rerum fugiat, dolorum qui id, in sint et assumenda mollitia dignissimos illum, ipsum maiores asperiores exercitationem odio labore laboris consequatur? Consequatur, sapiente ipsum, laboriosam, laudantium, dolor sed autem eligendi ea a.<br></p>', 1, '2021-02-24 08:20:06', '2021-02-24 08:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `discountables`
--

CREATE TABLE `discountables` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `discountable_type` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(10) UNSIGNED NOT NULL,
  `e_provider_id` int(10) UNSIGNED DEFAULT NULL,
  `total_bookings` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_earning` double(10,2) NOT NULL DEFAULT 0.00,
  `admin_earning` double(10,2) NOT NULL DEFAULT 0.00,
  `e_provider_earning` double(10,2) NOT NULL DEFAULT 0.00,
  `taxes` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `description`, `e_provider_id`, `created_at`, `updated_at`) VALUES
(1, 'Odio omnis reiciendis ut eum voluptate vero. Nostrum nihil corrupti adipisci modi sint quaerat. Libero earum quia blanditiis.', 'Jack-in-the-box, and up I goes like a snout than a real Turtle.\' These words were followed by a row of lodging houses, and behind it was written to nobody, which isn\'t usual, you know.\' Alice had.', 2, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(2, 'Rerum dicta quidem vel sed. Dolorem aperiam temporibus sint. Sed magnam a error nostrum expedita id sunt.', 'With gently smiling jaws!\' \'I\'m sure those are not attending!\' said the Mock Turtle sighed deeply, and drew the back of one flapper across his eyes. \'I wasn\'t asleep,\' he said to the Duchess: \'and.', 3, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(3, 'Cupiditate tenetur deleniti expedita. Consequuntur numquam voluptates odio nam.', 'NOT be an old conger-eel, that used to it!\' pleaded poor Alice. \'But you\'re so easily offended!\' \'You\'ll get used up.\' \'But what happens when one eats cake, but Alice had begun to repeat it, but her.', 9, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(4, 'Et nihil non aut. Necessitatibus rerum ea est. Quae commodi autem eveniet et rem explicabo.', 'CHORUS. (In which the cook tulip-roots instead of onions.\' Seven flung down his face, as long as there seemed to have him with them,\' the Mock Turtle would be a footman in livery came running out of.', 14, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(6, 'Soluta corporis facere est illum ut perferendis voluptas. Sapiente minus corporis deleniti omnis aut voluptatem est.', 'When the procession came opposite to Alice, and tried to get her head pressing against the roof of the mushroom, and raised herself to some tea and bread-and-butter, and went in. The door led right.', 9, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(7, 'Vel at magnam ullam. Eum veritatis consequuntur alias. Et velit et quod cumque eum temporibus.', 'Mouse to tell them something more. \'You promised to tell them something more. \'You promised to tell them something more. \'You promised to tell them something more. \'You promised to tell its age.', 5, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(8, 'Possimus et omnis aut autem nesciunt consequatur. Sed et provident et tenetur nemo vitae. Ab impedit et nisi autem explicabo.', 'But if I\'m Mabel, I\'ll stay down here! It\'ll be no sort of life! I do hope it\'ll make me smaller, I can find out the proper way of escape, and wondering what to say \'Drink me,\' but the tops of the.', 1, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(10, 'Eos fugiat numquam est culpa. Ut reprehenderit vitae a qui eum natus aliquid. Vero animi odio eos commodi deserunt voluptas.', 'Majesty must cross-examine the next question is, what did the archbishop find?\' The Mouse did not like the tone of this rope--Will the roof off.\' After a minute or two she stood still where she was.', 11, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(11, 'Quia libero voluptas facere incidunt eius. Quod eum quo inventore enim. Ut voluptates voluptatem sit vel.', 'O Mouse!\' (Alice thought this a good deal to ME,\' said the Hatter. Alice felt a very long silence, broken only by an occasional exclamation of \'Hjckrrh!\' from the roof. There were doors all round.', 9, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(13, 'Cumque placeat in dignissimos. Laboriosam nisi et est aut. Voluptatem qui quam quo nihil voluptatum.', 'And yet I don\'t take this child away with me,\' thought Alice, \'to speak to this last remark, \'it\'s a vegetable. It doesn\'t look like it?\' he said, turning to Alice, and she had expected: before she.', 10, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(14, 'Placeat in voluptatibus doloremque et. Et iure et sint nulla rerum rem excepturi. Cumque alias illo quis rerum sit atque.', 'Mary Ann, what ARE you doing out here? Run home this moment, and fetch me a pair of white kid gloves, and was just beginning to grow to my jaw, Has lasted the rest of my life.\' \'You are old,\' said.', 1, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(15, 'Voluptatum soluta autem fugit dolorum. Qui nisi dicta vel. Nesciunt voluptatibus enim incidunt vel sit quos vitae.', 'Caterpillar took the hookah out of a procession,\' thought she, \'what would become of it; and while she remembered trying to explain the mistake it had grown to her full size by this time). \'Don\'t.', 14, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(17, 'Pariatur qui illo quisquam nam sed aut. Vitae id optio aut ipsam. Et ratione repellat et quis autem sed.', 'I can do no more, whatever happens. What WILL become of me?\' Luckily for Alice, the little golden key was too dark to see if there are, nobody attends to them--and you\'ve no idea what Latitude or.', 7, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(18, 'Quis illo laudantium laboriosam unde. Fugit aut incidunt ab consequuntur non.', 'And she tried to speak, and no more to do with you. Mind now!\' The poor little thing sobbed again (or grunted, it was only sobbing,\' she thought, and rightly too, that very few little girls eat eggs.', 11, '2021-03-19 13:02:59', '2021-03-19 13:02:59'),
(22, 'Ea veniam consequatur eos debitis placeat. Magni neque officiis quam. Fugiat delectus est voluptate tenetur dolores quo.', 'Queens, and among them Alice recognised the White Rabbit blew three blasts on the Duchess\'s knee, while plates and dishes crashed around it--once more the shriek of the house, quite forgetting in.', 1, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(23, 'Et qui modi ipsa. Quibusdam mollitia sapiente deleniti harum. Fugiat et voluptates voluptatem non est eligendi.', 'And he added looking angrily at the cook and the words did not wish to offend the Dormouse began in a bit.\' \'Perhaps it hasn\'t one,\' Alice ventured to taste it, and fortunately was just going to.', 4, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(24, 'Eveniet et cum qui animi assumenda repellat qui nam. Quod eum quia commodi debitis quo est.', 'Footman. \'That\'s the first minute or two, looking for the moment she appeared; but she heard a little way out of the legs of the month is it?\' Alice panted as she went on, \'you throw the--\' \'The.', 9, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(25, 'Magni velit optio qui voluptatem asperiores et. Iure est vel sequi.', 'The Cat only grinned a little of her ever getting out of court! Suppress him! Pinch him! Off with his knuckles. It was opened by another footman in livery, with a shiver. \'I beg pardon, your.', 7, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(26, 'Nihil optio ipsam voluptatum quis quo natus explicabo reiciendis. Animi enim molestiae itaque aut.', 'Mock Turtle persisted. \'How COULD he turn them out again. Suddenly she came up to Alice, they all moved off, and found quite a crowd of little birds and beasts, as well as she passed; it was all.', 2, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(27, 'Voluptatibus rerum qui laudantium eius dolores est eius repudiandae. Illo minus accusantium molestiae temporibus ut.', 'King, \'or I\'ll have you executed on the whole party at once crowded round her at the thought that it might happen any minute, \'and then,\' thought Alice, \'they\'re sure to make it stop. \'Well, I\'d.', 17, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(28, 'Rerum maxime nihil quibusdam consectetur. Est et omnis rerum quis sint excepturi tempore.', 'Pigeon in a sorrowful tone, \'I\'m afraid I don\'t understand. Where did they live at the stick, running a very respectful tone, but frowning and making quite a chorus of voices asked. \'Why, SHE, of.', 3, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(29, 'Ad voluptatem commodi nemo assumenda quis rerum. Esse pariatur molestiae iste autem. Illo et sed eum explicabo ut odit.', 'Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon added \'Come, let\'s try Geography. London is the capital of Rome, and Rome--no, THAT\'S all wrong, I\'m certain! I must.', 17, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(30, 'Corporis rerum quia laborum. Reiciendis inventore possimus aliquid nihil. Hic et nihil quo eius.', 'Dormouse turned out, and, by the way, and then all the rats and--oh dear!\' cried Alice (she was rather glad there WAS no one listening, this time, and was coming back to the puppy; whereupon the.', 11, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(31, 'Voluptas inventore qui ipsum et id. Aspernatur qui dolorem nihil ducimus sint. Sint rerum nobis qui dolores rerum molestiae.', 'Soo--oop! Soo--oop of the bread-and-butter. Just at this corner--No, tie \'em together first--they don\'t reach half high enough yet--Oh! they\'ll do next! If they had settled down again, the Dodo.', 5, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(32, 'Deleniti quia distinctio voluptatem est ut. Veritatis et perspiciatis est occaecati.', 'Duchess, \'and that\'s why. Pig!\' She said it to her usual height. It was so small as this is May it won\'t be raving mad after all! I almost wish I\'d gone to see what I eat\" is the driest thing I.', 17, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(33, 'Maxime sed nostrum perspiciatis magni. Odio ut voluptate soluta molestiae itaque. Non sed qui molestiae quisquam minima.', 'Has lasted the rest of my own. I\'m a hatter.\' Here the Queen said--\' \'Get to your little boy, And beat him when he sneezes: He only does it matter to me whether you\'re nervous or not.\' \'I\'m a poor.', 8, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(35, 'Rem libero modi quas. Quis ab eum nisi consequatur odit. Sunt sit nemo perferendis quae assumenda.', 'Alice, and she swam about, trying to fix on one, the cook till his eyes very wide on hearing this; but all he SAID was, \'Why is a very decided tone: \'tell her something about the same thing with.', 4, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(37, 'Vitae ad itaque et dolor fugit. Eos minus ea molestiae eos. Eveniet doloribus eum odit voluptatum. Sint et delectus ab.', 'I--\' \'Oh, don\'t talk about wasting IT. It\'s HIM.\' \'I don\'t see any wine,\' she remarked. \'There isn\'t any,\' said the Duchess, digging her sharp little chin. \'I\'ve a right to think,\' said Alice to.', 15, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(38, 'Id est maiores ab. Ex vitae accusamus et non. Qui vel ipsa quia animi. Ullam deleniti tempora velit dolor.', 'Hatter. \'You MUST remember,\' remarked the King, and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the jurymen are back in their mouths. So they couldn\'t see it?\' So she.', 17, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(39, 'Magni consequatur rerum voluptatum veritatis et quo distinctio. Non occaecati dolore assumenda.', 'Queen, who was peeping anxiously into her eyes--and still as she said to herself, and nibbled a little startled when she heard the Queen said--\' \'Get to your places!\' shouted the Queen, tossing her.', 4, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(40, 'Ipsum autem ullam eum aut. Corrupti qui illum eos consequuntur sapiente. Architecto alias minus non sunt velit iste.', 'Hatter. \'You MUST remember,\' remarked the King, and the second thing is to find my way into that beautiful garden--how IS that to be beheaded!\' \'What for?\' said the King, \'that saves a world of.', 11, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(41, 'Eos ut animi soluta. Laborum quia laboriosam et distinctio ad libero. Velit officiis ut nemo ducimus.', 'I only knew how to spell \'stupid,\' and that you had been to her, still it was certainly not becoming. \'And that\'s the queerest thing about it.\' (The jury all brightened up at this corner--No, tie.', 13, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(42, 'Officia quas maxime et ex nisi. Ut non quo quae sunt.', 'She had just upset the week before. \'Oh, I BEG your pardon!\' cried Alice hastily, afraid that it seemed quite dull and stupid for life to go after that into a large crowd collected round it: there.', 11, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(43, 'Temporibus est possimus neque exercitationem quaerat dolor eveniet. Itaque odio et dolorem iste.', 'Alice looked up, but it just missed her. Alice caught the flamingo and brought it back, the fight was over, and she tried another question. \'What sort of people live about here?\' \'In THAT.', 3, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(44, 'Optio mollitia aliquam velit aliquid. Ut omnis ad qui non. Assumenda eveniet accusantium eligendi voluptate tempora et et.', 'I know!\' exclaimed Alice, who always took a minute or two, and the beak-- Pray how did you manage on the floor, and a Dodo, a Lory and an Eaglet, and several other curious creatures. Alice led the.', 11, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(45, 'Alias unde non animi est autem. Perferendis quia harum animi in dicta odit magni. Cumque delectus illum eius sunt.', 'No, I\'ve made up my mind about it; if I\'m not Ada,\' she said, as politely as she could. \'No,\' said Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' And then a voice sometimes choked with sobs, to sing.', 1, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(47, 'Quis et quibusdam molestiae. Aut inventore aut dolorum a et quia atque. Quia et eveniet eum molestias.', 'As soon as it went, as if he doesn\'t begin.\' But she waited for a minute, while Alice thought over all the creatures argue. It\'s enough to drive one crazy!\' The Footman seemed to follow, except a.', 15, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(48, 'Consequuntur tempora in vel. In et dolor sit et aperiam aut. Rerum aut quibusdam magni laborum sunt quia.', 'Lizard\'s slate-pencil, and the Queen had ordered. They very soon finished it off. \'If everybody minded their own business!\' \'Ah, well! It means much the same as the game began. Alice thought she.', 4, '2021-03-19 13:03:00', '2021-03-19 13:03:00'),
(50, 'Ducimus quis cupiditate aut aut asperiores. Alias quo vel earum in. Sit at ad voluptatem reprehenderit blanditiis.', 'He got behind him, and very soon found out a history of the leaves: \'I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said Alice, who had been all the jurors were.', 9, '2021-03-19 13:03:01', '2021-03-19 13:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `e_providers`
--

CREATE TABLE `e_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_provider_type_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability_range` double(9,2) DEFAULT 0.00,
  `available` tinyint(1) DEFAULT 1,
  `featured` tinyint(1) DEFAULT 0,
  `accepted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_providers`
--

INSERT INTO `e_providers` (`id`, `name`, `e_provider_type_id`, `country_id`, `description`, `phone_number`, `mobile_number`, `availability_range`, `available`, `featured`, `accepted`, `created_at`, `updated_at`) VALUES
(1, 'House Johns Group', 2, 2, 'Sed ut neque velit excepturi officia. Excepturi nihil aut fuga ex inventore vel eum. Consequuntur fuga iure saepe nulla atque. Molestiae iste dolores est dolor dicta quod.', '630-307-2229', '1-690-620-9290', 43.18, 0, 1, 1, '2021-03-19 13:02:43', '2021-03-24 10:50:20'),
(2, 'Car Services Botsford Group', 3, 1, 'Aut dolores quia distinctio voluptatem. Asperiores dolorem ratione possimus culpa.', '758.556.5810', '659.809.1292', 27.21, 0, 1, 1, '2021-03-19 13:02:43', '2021-03-24 12:41:50'),
(3, 'Painting Metz and Sons', 2, 1, 'Porro delectus et molestiae nemo modi nisi et. Voluptatem aut voluptatem iusto odio hic et impedit cumque......', '+1-919-203-1284', '+1.815.892.7988', 9.51, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-22 15:16:27'),
(4, 'House Pouros-Luettgen', 3, 2, 'Praesentium nihil veritatis similique laborum et quisquam. Minus aut mollitia impedit ea dolores velit et accusamus.', '567-724-1356', '541-352-4276', 9.03, 0, 1, 1, '2021-03-19 13:02:43', '2021-03-24 11:54:41'),
(5, 'Care Services Marquardt, Lesch and Zieme', 3, 1, 'Tempora est non est ea laborum aliquam. Autem adipisci quam voluptatem et illum. Vitae harum cum dolor aspernatur culpa molestiae.', '(481) 531-5935', '1-802-941-5983', 16.52, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 11:59:21'),
(7, 'House Kutch Group', 3, 2, 'Qui corrupti cumque eveniet id et accusantium. At dolores et dolorum culpa occaecati delectus excepturi. Fugiat sunt sit fugit velit nisi. Voluptas nihil et veniam ab eos repellendus aut et.', '962-883-5101', '+1-260-220-4719', 36.40, 0, 1, 1, '2021-03-19 13:02:43', '2021-03-19 13:02:43'),
(8, 'House Jacobi, Stanton and Skiles', 3, 1, 'Blanditiis quo non deleniti. Beatae dolorem perferendis necessitatibus voluptatem. Deleniti delectus in nihil repellat qui aliquid sint.', '730-274-7513', '858.755.3428', 20.73, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 12:00:05'),
(9, 'Care Services Stamm, Barton and Orn', 2, 2, 'Error facere sit illo laboriosam ex voluptate vel. Ullam alias eius sed blanditiis commodi aut error. Qui voluptatem dolorem ut officiis.', '+1.813.708.5920', '964.362.8650', 47.31, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 11:55:45'),
(10, 'Care Services Bergnaum PLC', 2, 1, 'Et illo facilis sit velit libero. Vitae sapiente beatae maxime. Nobis autem fugit qui reprehenderit reiciendis accusamus provident.', '+1-710-232-1199', '731-947-7588', 24.72, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 12:00:30'),
(11, 'House Bednar, Predovic and Kautzer', 3, 1, 'Qui iusto ut quos dolor nihil possimus nihil. Sit enim aliquid incidunt.', '+1-226-672-3879', '1-787-868-3635', 12.33, 0, 1, 1, '2021-03-19 13:02:43', '2021-03-24 12:01:07'),
(13, 'Epoxy Coating Hickle-Yost', 2, 2, 'Molestiae commodi et amet at dolor. Ea autem id ea fugit saepe. Sed numquam assumenda qui quo. Laudantium minus quod sint odio facilis. Excepturi distinctio mollitia cupiditate accusamus.', '641.989.5988', '+1-776-350-3532', 25.88, 0, 1, 1, '2021-03-19 13:02:43', '2021-03-24 11:56:21'),
(14, 'House Hahn, Cummings and Connelly', 2, 2, 'Consequuntur odio alias hic repellat cumque. Aut ut odio enim. Vel recusandae vitae tempore et non.', '+1-356-294-2534', '1-846-209-9319', 23.09, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 11:56:44'),
(15, 'Painting Yost-Mertz', 2, 2, 'Iure consequatur eum porro magni consequatur laudantium in. Qui quo repellat dolores magni eaque. Ea ut rerum vel cumque similique.', '+1-992-484-6890', '+1.458.322.0468', 8.84, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 11:57:17'),
(17, 'Care Service Medical', 2, 1, 'Porro impedit voluptatem voluptas laborum illum. Illum labore asperiores nemo velit placeat in consequatur. Ullam quos voluptatibus pariatur commodi. Sapiente magni eum sed rem dolores qui dolores.', '+1-878-400-9544', '+1-684-917-2557', 41.28, 0, 0, 1, '2021-03-19 13:02:43', '2021-03-24 13:43:50'),
(19, 'Chaim Jefferson', 2, 1, NULL, '+1 (779) 991-3602', '547', 37.00, 0, 0, 1, '2021-03-22 15:17:23', '2021-03-24 12:03:22'),
(20, 'Yoko Henry', 2, 9, NULL, '+1 (984) 394-1764', '18', 16.00, 0, 1, 1, '2021-03-22 15:46:48', '2021-03-22 15:47:14'),
(21, 'Photo Grapher', 3, 2, '<p>I am a photographer, I am taking a phot and video for media.</p>', '+1 20 93 601 452', '+1 20 93 601 452', 2.00, 1, 0, 1, '2021-03-24 13:36:43', '2021-03-24 13:36:43'),
(22, 'Lauren', 3, 1, '<p>I am a barber.</p>', '+1 20 93601452', '+1 20 93 601 452', 12.00, 0, 0, 1, '2021-03-24 13:47:34', '2021-03-24 13:47:34'),
(23, 'Joana', 3, 1, '<p>I am a barber.</p>', '+1 20 93 601 301', '+1 20 93 601 301', 12.00, 0, 0, 1, '2021-03-24 13:53:55', '2021-03-24 13:53:55'),
(24, 'Randy Miles', 2, 1, '<p>Hi</p>', NULL, NULL, 12.00, 0, 0, 1, '2021-03-26 00:30:38', '2021-03-26 00:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `e_provider_addresses`
--

CREATE TABLE `e_provider_addresses` (
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_provider_addresses`
--

INSERT INTO `e_provider_addresses` (`e_provider_id`, `address_id`) VALUES
(19, 3),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `e_provider_payouts`
--

CREATE TABLE `e_provider_payouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `method` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `paid_date` datetime NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_provider_taxes`
--

CREATE TABLE `e_provider_taxes` (
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_provider_taxes`
--

INSERT INTO `e_provider_taxes` (`e_provider_id`, `tax_id`) VALUES
(19, 2),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_provider_types`
--

CREATE TABLE `e_provider_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` double(5,2) NOT NULL DEFAULT 0.00,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_provider_types`
--

INSERT INTO `e_provider_types` (`id`, `name`, `commission`, `disabled`, `created_at`, `updated_at`) VALUES
(2, 'Company', 75.00, 0, '2021-01-13 13:05:35', '2021-02-01 16:22:19'),
(3, 'Individual', 50.00, 0, '2021-01-17 14:27:18', '2021-03-24 03:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `e_provider_users`
--

CREATE TABLE `e_provider_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `e_provider_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_provider_users`
--

INSERT INTO `e_provider_users` (`user_id`, `e_provider_id`) VALUES
(2, 4),
(2, 7),
(2, 9),
(2, 11),
(2, 21),
(3, 19),
(4, 1),
(4, 4),
(4, 8),
(4, 9),
(4, 20),
(6, 1),
(6, 2),
(6, 4),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `e_services`
--

CREATE TABLE `e_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `discount_price` double(10,2) DEFAULT 0.00,
  `price_unit` enum('hourly','fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) DEFAULT 0,
  `available` tinyint(1) DEFAULT 1,
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_services`
--

INSERT INTO `e_services` (`id`, `name`, `price`, `discount_price`, `price_unit`, `duration`, `description`, `featured`, `available`, `e_provider_id`, `created_at`, `updated_at`) VALUES
(1, 'Thai Massage Services', 38.05, 29.49, 'fixed', '04:00', 'Voluptatem iure asperiores in molestiae dolores. Aut voluptas quos pariatur quod omnis. Consequatur dolores odio quam in voluptate sunt nemo.', 1, 1, 9, '2021-03-19 13:02:44', '2021-03-24 14:01:23'),
(4, 'Tank Cleaning', 28.59, 0.00, 'hourly', '01:00', 'Eum commodi et cumque et est aperiam ut. Temporibus qui rem neque quia et. Quia natus repudiandae necessitatibus dolorem mollitia. Praesentium nemo voluptatibus ut dolorem nesciunt voluptas.', 0, 1, 4, '2021-03-19 13:02:45', '2021-03-24 02:20:28'),
(7, 'Doctor at home Service', 17.41, 8.83, 'hourly', '03:00', 'Voluptatem explicabo odit quia error consequatur nisi laboriosam. Nulla hic quaerat voluptatibus molestias. Asperiores error reiciendis in vel repellat voluptatem sit.', 1, 1, 10, '2021-03-19 13:02:45', '2021-03-24 13:39:02'),
(9, 'Suv Car Washing', 38.67, 0.00, 'hourly', '04:00', 'Magni impedit aut fuga ut rerum blanditiis eum. In molestiae qui enim qui modi voluptas expedita consequatur. Minus consequatur aut consequatur quos.', 0, 1, 2, '2021-03-19 13:02:45', '2021-03-24 01:29:19'),
(10, 'Doctor at home Service', 16.43, 0.00, 'hourly', '01:00', 'Inventore quo et ut dolor iste. Dolore exercitationem ad recusandae autem. Natus ipsa nobis exercitationem voluptatem voluptatibus dolores ut.', 0, 1, 17, '2021-03-19 13:02:45', '2021-03-24 01:31:12'),
(11, 'Full Home Deep Cleaning', 46.63, 38.58, 'fixed', '01:00', 'Accusamus sit temporibus consequatur omnis. Sint et autem est libero quasi ut praesentium. Et blanditiis aut non molestiae molestiae fuga.', 0, 1, 11, '2021-03-19 13:02:45', '2021-03-24 14:02:30'),
(12, 'Hair Style Service', 34.69, 0.00, 'fixed', '05:00', 'Odio aut sapiente ea dolore laudantium nam. Atque sit et sapiente distinctio voluptate ea est.', 1, 1, 22, '2021-03-19 13:02:45', '2021-03-24 13:56:46'),
(13, 'Portrait Photos Services', 46.33, 36.96, 'fixed', '01:00', 'Rem veritatis ea nihil quaerat nesciunt sequi voluptates. Iusto unde tenetur qui enim minus laudantium voluptas. Non ducimus error architecto accusamus.', 1, 1, 21, '2021-03-19 13:02:45', '2021-03-24 13:37:26'),
(14, 'Wedding Photos', 42.91, 0.00, 'hourly', '03:00', 'Doloribus dolor nemo sint sit suscipit qui. Sed illo dolores id ut perferendis sed labore. Incidunt quod neque et quaerat. Reprehenderit voluptas saepe voluptatem nemo enim.', 1, 1, 7, '2021-03-19 13:02:45', '2021-03-24 01:54:15'),
(17, 'Full Home Deep Cleaning', 19.18, 0.00, 'fixed', '01:00', 'Autem aut aut quia molestiae occaecati. Cum qui veniam praesentium ut provident. Accusantium recusandae repudiandae sit officiis accusamus libero iusto quas.', 0, 1, 1, '2021-03-19 13:02:45', '2021-03-24 02:05:20'),
(20, 'Thai Massage Services', 36.29, 0.00, 'hourly', '05:00', 'Saepe rerum perferendis eum excepturi tempore in. Eius id et maxime voluptates exercitationem delectus. Dolorem voluptatem et dolores blanditiis.', 0, 1, 8, '2021-03-19 13:02:45', '2021-03-24 02:18:11'),
(21, 'Screens - New and Repair', 27.66, 18.26, 'hourly', '04:00', 'Et qui ut possimus quia. Ut excepturi nihil reprehenderit cum voluptates earum sit. Et assumenda aut a dolores nulla sunt culpa excepturi.', 1, 1, 1, '2021-03-19 13:02:45', '2021-03-24 02:00:30'),
(24, 'Thai Massage Services', 39.16, 36.36, 'fixed', '01:00', 'Iste quod sit voluptates excepturi animi. Dolores corrupti in exercitationem perspiciatis. Ut neque est nihil nulla blanditiis rerum.', 1, 1, 7, '2021-03-19 13:02:45', '2021-03-24 02:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `e_service_categories`
--

CREATE TABLE `e_service_categories` (
  `e_service_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_service_categories`
--

INSERT INTO `e_service_categories` (`e_service_id`, `category_id`) VALUES
(1, 2),
(1, 4),
(4, 3),
(7, 2),
(9, 1),
(9, 5),
(10, 2),
(11, 3),
(11, 5),
(12, 3),
(12, 4),
(13, 6),
(14, 6),
(17, 3),
(17, 5),
(20, 2),
(20, 4),
(21, 3),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `e_service_reviews`
--

CREATE TABLE `e_service_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(3,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `e_service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_service_reviews`
--

INSERT INTO `e_service_reviews` (`id`, `review`, `rate`, `user_id`, `e_service_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Thanks! You are good, and I recommend you for others.</p><p>Meet again, Regards</p>', 5.00, 3, 12, '2021-03-19 13:02:48', '2021-03-24 14:52:43'),
(2, 'I am feeling good now, please come here on tomorrow, I want to get support from you again, Thanks!', 4.00, 8, 10, '2021-03-19 13:02:48', '2021-03-24 14:48:39'),
(5, 'I am feeling good now, I will find you again in the future, Thanks!', 5.00, 8, 1, '2021-03-19 13:02:48', '2021-03-24 14:42:19'),
(7, '<p>Great work!</p><p>I will find you again. Regards.</p>', 4.00, 7, 17, '2021-03-19 13:02:48', '2021-03-24 14:54:01'),
(10, 'Good! I like this photo, I recommend you, Thank you very much!', 5.00, 8, 13, '2021-03-19 13:02:48', '2021-03-24 14:50:39'),
(13, 'Very good! I will find you again in the future. Thanks!', 3.00, 7, 13, '2021-03-19 13:02:48', '2021-03-24 14:41:49'),
(27, 'Thanks! I am good for your work. Regards.', 4.00, 8, 11, '2021-03-19 13:02:49', '2021-03-24 14:42:45'),
(33, 'Thanks! I am feeling good now, please come here again on tomorrow, I want to get support from you continuously. Regards.', 5.00, 8, 20, '2021-03-19 13:02:49', '2021-03-24 14:45:23'),
(38, '<p>Thanks! I like this hair style, i recommend you for others.</p><p>Regards.</p>', 5.00, 7, 12, '2021-03-19 13:02:49', '2021-03-24 14:51:50'),
(41, 'Thanks!, I am satisfy with your support, if I will call you, please come here. Regards.', 5.00, 8, 10, '2021-03-19 13:02:49', '2021-03-24 14:37:10'),
(56, 'Thanks for your support, I will keep this support for long term. Thanks again!', 5.00, 3, 24, '2021-03-19 13:02:49', '2021-03-24 14:36:11'),
(58, 'Thanks for your work, I am satisfy for your work, I will find you in the future, Thaks!', 5.00, 3, 21, '2021-03-19 13:02:49', '2021-03-24 14:53:32'),
(62, 'This was great support, I want to hire this service again in the future. Thanks!', 5.00, 5, 21, '2021-03-19 13:02:50', '2021-03-24 14:34:31'),
(65, 'Thanks! I am feeling good now, please come again on tomorrow. Regards,', 5.00, 3, 24, '2021-03-19 13:02:50', '2021-03-24 14:43:35'),
(66, '<p>Thank you!</p><p>I am feeling good now, Please come here on tomorrow, Regards.</p>', 5.00, 8, 1, '2021-03-19 13:02:50', '2021-03-24 14:51:15'),
(70, 'Thanks! I am good now, please come here on tomorrow, i want to get treatment from you again, can you come here for a week? Best Regards,', 4.00, 8, 10, '2021-03-19 13:02:50', '2021-03-24 14:49:55'),
(74, 'The Mouse did not like the Mock Turtle yawned and shut his note-book hastily. \'Consider your.', 4.00, 5, 24, '2021-03-19 13:02:50', '2021-03-19 13:02:50'),
(75, 'Thanks for your work! This was good work, can you come here on tomorrow? I have a party on tomorrow, so I want to get help from you again, Thanks!', 5.00, 5, 17, '2021-03-19 13:02:50', '2021-03-24 14:47:11'),
(77, 'I am feeling good now,&nbsp; can I have get this service continuously? If yes, it is good, I will get help from you in the future, Thanks!', 5.00, 7, 1, '2021-03-19 13:02:50', '2021-03-24 14:41:14'),
(79, 'Thanks!', 4.00, 7, 1, '2021-03-19 13:02:50', '2021-03-24 14:55:07'),
(80, '<p>Good! I recommend you. I will find you in the future.</p><p>Thanks!</p>', 4.00, 7, 10, '2021-03-19 13:02:50', '2021-03-24 14:54:54'),
(94, '<p>Thanks for your work! I am feeling good, my room cleaned very good.</p><p><span style=\"font-size: 1rem;\">I want to get support from you continue. Regards,</span></p>', 5.00, 7, 11, '2021-03-19 13:02:50', '2021-03-24 14:39:51'),
(99, 'This answer so confused poor Alice, \'to pretend to be full of soup. \'There\'s certainly too much.', 5.00, 3, 13, '2021-03-19 13:02:51', '2021-03-19 13:02:51'),
(100, 'Thanks! I am feeling good now, if I will call you, please come here, I want to take treatment from you in the future. Regards.', 5.00, 5, 7, '2021-03-19 13:02:51', '2021-03-24 14:38:27'),
(101, '<p>This was great work, I want to work with her. Thanks!</p>', 5.00, 1, 9, '2021-03-24 14:28:39', '2021-03-24 14:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `faq_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Dolores eveniet dignissimos eum sint placeat. Totam impedit laboriosam corrupti accusantium.', 'MUST have meant some mischief, or else you\'d have signed your name like an honest man.\' There was not going to shrink any further: she felt a little timidly, \'why you are very dull!\' \'You ought to.', 4, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(2, 'Qui est et minus tempora quia. Praesentium in quia rem rerum autem tempore at.', 'CHAPTER II. The Pool of Tears \'Curiouser and curiouser!\' cried Alice again, for she was ready to sink into the way YOU manage?\' Alice asked. The Hatter looked at it, busily painting them red. Alice.', 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(3, 'Libero numquam sed soluta dolorem velit qui. Dicta repellat veniam quia omnis explicabo nam.', 'The rabbit-hole went straight on like a wild beast, screamed \'Off with her head!\' Those whom she sentenced were taken into custody by the time he was obliged to write out a box of comfits, (luckily.', 3, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(4, 'Non reprehenderit odio sed id maxime in. Corporis architecto delectus est qui ut excepturi.', 'So she began again: \'Ou est ma chatte?\' which was immediately suppressed by the little door: but, alas! the little golden key in the trial one way up as the question was evidently meant for her. \'I.', 3, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(5, 'Ipsam velit consequatur rerum nobis. Occaecati id ea eius ducimus.', 'Duchess sneezed occasionally; and as it went. So she began again. \'I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said Alice, very loudly and decidedly, and he.', 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(6, 'Culpa enim ex voluptate. Vitae enim sequi eaque consectetur eos corporis. A iure aut minima.', 'I do,\' said Alice loudly. \'The idea of having the sentence first!\' \'Hold your tongue!\' said the Caterpillar. \'Well, I shan\'t go, at any rate it would be offended again. \'Mine is a long breath, and.', 2, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(7, 'Assumenda nulla error quo aut dignissimos. Laboriosam facere error tempora ea.', 'Alice angrily. \'It wasn\'t very civil of you to learn?\' \'Well, there was not a moment that it is!\' \'Why should it?\' muttered the Hatter. This piece of evidence we\'ve heard yet,\' said the March Hare.', 3, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(8, 'Soluta dolorem quisquam magnam rerum. Voluptatem natus voluptatum autem mollitia quam quia.', 'Alice tried to speak, but for a minute, nurse! But I\'ve got to the table, half hoping that the way down one side and up the other, trying every door, she walked down the bottle, she found herself at.', 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(9, 'Voluptate consequatur animi doloremque illo. Reiciendis cum deleniti omnis mollitia rerum.', 'Do you think you\'re changed, do you?\' \'I\'m afraid I can\'t tell you my history, and you\'ll understand why it is I hate cats and dogs.\' It was as much right,\' said the Mouse, turning to Alice again.', 4, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(10, 'Iusto quae est provident sed. Omnis modi magnam ea vel quo dolorem. Saepe ut modi eaque aperiam.', 'Alice, as she was holding, and she was now more than Alice could bear: she got back to the end: then stop.\' These were the verses to himself: \'\"WE KNOW IT TO BE TRUE--\" that\'s the jury, in a loud.', 2, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(11, 'Porro laudantium omnis delectus eius. Qui molestiae sunt illo blanditiis commodi aperiam.', 'Hatter, \'when the Queen was close behind it when she found a little girl or a watch to take MORE than nothing.\' \'Nobody asked YOUR opinion,\' said Alice. \'I mean what I get\" is the capital of Rome.', 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(12, 'Sint in aut autem soluta. Aut soluta qui explicabo et ut sequi.', 'Alice. \'But you\'re so easily offended!\' \'You\'ll get used to call him Tortoise--\' \'Why did you manage on the end of the bread-and-butter. Just at this corner--No, tie \'em together first--they don\'t.', 3, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(13, 'Repellendus consequatur ut sed. Eum omnis explicabo architecto corporis et ea.', 'But there seemed to her that she began very cautiously: \'But I don\'t put my arm round your waist,\' the Duchess said to herself, in a shrill, loud voice, and see after some executions I have.', 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(14, 'Non ut in dolorem est dolore. Sed eum possimus enim porro cumque ut exercitationem.', 'Mock Turtle: \'why, if a dish or kettle had been to a mouse: she had made her feel very uneasy: to be ashamed of yourself for asking such a new idea to Alice, and she went on, very much confused, \'I.', 3, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(15, 'Similique voluptatum nemo doloribus sed. Ea quam necessitatibus provident voluptatem et quidem.', 'THAT direction,\' the Cat went on, looking anxiously about her. \'Oh, do let me help to undo it!\' \'I shall do nothing of tumbling down stairs! How brave they\'ll all think me at all.\' \'In that case,\'.', 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(16, 'Aliquam a est aut sit est labore a. Non doloremque ex similique rerum qui. Eos reiciendis saepe ad.', 'The Duchess took no notice of her childhood: and how she would keep, through all her knowledge of history, Alice had been for some time after the rest waited in silence. At last the Caterpillar took.', 4, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(17, 'Nemo ut est sed quaerat. Hic cumque dolores quas maiores.', 'And here poor Alice in a sort of a tree. \'Did you say pig, or fig?\' said the King. \'When did you call it purring, not growling,\' said Alice. \'Oh, don\'t bother ME,\' said the Caterpillar. \'Not QUITE.', 4, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(18, 'Dolorem sit placeat sunt voluptate velit. Omnis porro laudantium velit. Eum expedita vitae et quo.', 'In the very tones of the table, but it makes rather a complaining tone, \'and they drew all manner of things--everything that begins with a sigh: \'it\'s always tea-time, and we\'ve no time to go, for.', 2, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(19, 'Enim nam voluptas illo officia molestiae. Est qui ipsam tempora pariatur est ut.', 'I!\' he replied. \'We quarrelled last March--just before HE went mad, you know--\' \'But, it goes on \"THEY ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Did you say \"What a pity!\"?\' the Rabbit asked.', 2, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(20, 'Et eum nihil quam error. Esse consequatur odit minus.', 'Turtle.\' These words were followed by a very fine day!\' said a whiting to a mouse: she had read about them in books, and she jumped up on to her full size by this time). \'Don\'t grunt,\' said Alice.', 2, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(21, 'Quo enim tenetur voluptatem eos aliquam. Non soluta commodi enim.', 'Half-past one, time for dinner!\' (\'I only wish they WOULD go with Edgar Atheling to meet William and offer him the crown. William\'s conduct at first was moderate. But the insolence of his teacup.', 2, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(22, 'Dolore quas qui et earum est eveniet. Iure suscipit maiores quo. Quia sit cumque nobis.', 'Mouse was speaking, so that by the time they were mine before. If I or she fell past it. \'Well!\' thought Alice to herself. \'Of the mushroom,\' said the young lady to see that the pebbles were all.', 4, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(23, 'Ea earum rem aut laborum. Vitae veniam aut deserunt autem non. Et eligendi nulla magnam aut sed.', 'Tell us all about as it left no mark on the English coast you find a pleasure in all directions, tumbling up against each other; however, they got their tails in their mouths. So they couldn\'t get.', 1, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(24, 'Ea maxime ipsa ut. Ducimus perferendis minus nobis placeat fugiat soluta est.', 'It doesn\'t look like it?\' he said, \'on and off, for days and days.\' \'But what am I to get out again. The rabbit-hole went straight on like a telescope.\' And so she tried the little door, had.', 3, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(25, 'Non et dicta aut. Amet amet magni optio rerum a beatae. Quas minus ut pariatur sit.', 'March Hare. \'Then it ought to have changed since her swim in the sky. Twinkle, twinkle--\"\' Here the Dormouse went on, half to herself, (not in a low, hurried tone. He looked at the end.\' \'If you.', 3, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(26, 'Error tempore ducimus et id et vel laudantium. Sunt quam dicta quo aliquid dolor repudiandae.', 'Alice caught the baby was howling so much about a whiting to a mouse: she had not as yet had any sense, they\'d take the place of the officers of the reeds--the rattling teacups would change to.', 3, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(27, 'Dolor nobis deserunt qui unde nisi aliquam saepe nostrum. Dolore perferendis fugiat sunt quod.', 'Caterpillar took the hookah out of the Queen was to twist it up into the air off all its feet at once, in a deep, hollow tone: \'sit down, both of you, and listen to me! I\'LL soon make you a present.', 1, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(28, 'Rem asperiores eius magni deserunt et dolor. Unde fugit autem fugit qui sed.', 'Alice very politely; but she could not think of nothing else to do, and perhaps after all it might be some sense in your knocking,\' the Footman remarked, \'till tomorrow--\' At this moment Five, who.', 3, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(29, 'Ut ad nemo et dolores quaerat. Optio hic qui et tempora quod ut.', 'Alice herself, and fanned herself with one of the jurors had a head unless there was a dispute going on between the executioner, the King, who had been all the jurors were writing down \'stupid.', 2, '2021-03-19 13:02:56', '2021-03-19 13:02:56'),
(30, 'Voluptates vel quia error et at. Aperiam sit occaecati accusamus excepturi et.', 'Caterpillar angrily, rearing itself upright as it lasted.) \'Then the eleventh day must have prizes.\' \'But who has won?\' This question the Dodo said, \'EVERYBODY has won, and all that,\' said the King.', 3, '2021-03-19 13:02:56', '2021-03-19 13:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Service', '2021-03-19 13:02:41', '2021-03-19 13:02:41'),
(2, 'Service', '2021-03-19 13:02:41', '2021-03-19 13:02:41'),
(3, 'Service', '2021-03-19 13:02:41', '2021-03-19 13:02:41'),
(4, 'Service', '2021-03-19 13:02:41', '2021-03-19 13:02:41'),
(5, 'Service', '2021-03-19 13:02:41', '2021-03-19 13:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `e_service_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_options`
--

CREATE TABLE `favorite_options` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `favorite_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `description`, `e_provider_id`, `created_at`, `updated_at`) VALUES
(5, 'Veniam dicta quis error.', 17, '2021-03-19 13:02:46', '2021-03-19 13:02:46'),
(13, 'Non incidunt consequatur velit nostrum ab et iusto.', 15, '2021-03-19 13:02:46', '2021-03-19 13:02:46'),
(17, 'Velit nulla nesciunt nihil dolor saepe accusantium occaecati.', 4, '2021-03-19 13:02:46', '2021-03-19 13:02:46'),
(18, 'Ut et voluptatem architecto alias.', 13, '2021-03-19 13:02:47', '2021-03-19 13:02:47'),
(19, 'Ut eligendi amet ad maxime.', 9, '2021-03-19 13:02:47', '2021-03-19 13:02:47'),
(20, 'Perferendis sed eum ipsa aut et qui.', 8, '2021-03-19 13:02:47', '2021-03-19 13:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\Upload', 4, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 223571, '[]', '{\"uuid\":\"6400928c-845b-4a83-9574-1b9c364d1bbc\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 6, '2021-03-23 18:00:32', '2021-03-23 18:00:32'),
(8, 'App\\Models\\Upload', 5, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 298067, '[]', '{\"uuid\":\"72e9321e-cfa6-47dd-ab98-d36dca14d644\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 7, '2021-03-23 22:56:54', '2021-03-23 22:56:55'),
(18, 'App\\Models\\Upload', 10, 'image', 'beauty', 'beauty.png', 'image/png', 'public', 162255, '[]', '{\"uuid\":\"1336d67a-83ab-43d3-8cf8-36a734ed69d1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 15, '2021-03-23 23:30:20', '2021-03-23 23:30:20'),
(19, 'App\\Models\\Category', 4, 'image', 'beauty', 'beauty.png', 'image/png', 'public', 162255, '[]', '{\"uuid\":\"1336d67a-83ab-43d3-8cf8-36a734ed69d1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 16, '2021-03-23 23:30:23', '2021-03-23 23:30:23'),
(20, 'App\\Models\\Upload', 11, 'image', 'laundry', 'laundry.png', 'image/png', 'public', 144328, '[]', '{\"uuid\":\"fc6c0c85-5805-491e-8b87-85a7aadb2ef2\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 17, '2021-03-23 23:36:26', '2021-03-23 23:36:27'),
(21, 'App\\Models\\Category', 3, 'image', 'laundry', 'laundry.png', 'image/png', 'public', 144328, '[]', '{\"uuid\":\"fc6c0c85-5805-491e-8b87-85a7aadb2ef2\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 18, '2021-03-23 23:36:35', '2021-03-23 23:36:35'),
(22, 'App\\Models\\Upload', 12, 'image', 'medical', 'medical.png', 'image/png', 'public', 124011, '[]', '{\"uuid\":\"aa57e631-0a25-402a-a212-f173c9969f92\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 19, '2021-03-23 23:47:38', '2021-03-23 23:47:38'),
(24, 'App\\Models\\Upload', 13, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 120114, '[]', '{\"uuid\":\"75bcfeaa-e195-4d61-a510-29c654d08da3\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 21, '2021-03-23 23:49:19', '2021-03-23 23:49:19'),
(26, 'App\\Models\\Upload', 14, 'image', 'washing', 'washing.png', 'image/png', 'public', 135627, '[]', '{\"uuid\":\"6ba30ce9-dc53-48f2-bbbb-847c531229bf\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 23, '2021-03-23 23:52:44', '2021-03-23 23:52:44'),
(27, 'App\\Models\\Category', 5, 'image', 'washing', 'washing.png', 'image/png', 'public', 135627, '[]', '{\"uuid\":\"6ba30ce9-dc53-48f2-bbbb-847c531229bf\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 24, '2021-03-23 23:53:17', '2021-03-23 23:53:17'),
(28, 'App\\Models\\Upload', 15, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 161858, '[]', '{\"uuid\":\"78f67312-6821-4c4a-916a-d26457d193c8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 25, '2021-03-23 23:55:15', '2021-03-23 23:55:15'),
(30, 'App\\Models\\Upload', 16, 'image', 'media', 'media.png', 'image/png', 'public', 128922, '[]', '{\"uuid\":\"80c38766-ac50-4149-b700-61d2050c69e1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 27, '2021-03-24 00:04:01', '2021-03-24 00:04:01'),
(31, 'App\\Models\\Category', 6, 'image', 'media', 'media.png', 'image/png', 'public', 128922, '[]', '{\"uuid\":\"80c38766-ac50-4149-b700-61d2050c69e1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 28, '2021-03-24 00:04:15', '2021-03-24 00:04:15'),
(32, 'App\\Models\\Upload', 17, 'image', 'sewer', 'sewer.png', 'image/png', 'public', 122225, '[]', '{\"uuid\":\"7e803dc5-9863-48aa-8816-417183edb6fd\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 29, '2021-03-24 00:09:50', '2021-03-24 00:09:50'),
(33, 'App\\Models\\Category', 7, 'image', 'sewer', 'sewer.png', 'image/png', 'public', 122225, '[]', '{\"uuid\":\"7e803dc5-9863-48aa-8816-417183edb6fd\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 30, '2021-03-24 00:09:53', '2021-03-24 00:09:53'),
(34, 'App\\Models\\Upload', 18, 'image', 'carpet_clean', 'carpet_clean.png', 'image/png', 'public', 189889, '[]', '{\"uuid\":\"0e60418b-cacf-4beb-a907-1409f17accc4\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 31, '2021-03-24 00:12:26', '2021-03-24 00:12:27'),
(35, 'App\\Models\\Category', 8, 'image', 'carpet_clean', 'carpet_clean.png', 'image/png', 'public', 189889, '[]', '{\"uuid\":\"0e60418b-cacf-4beb-a907-1409f17accc4\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 32, '2021-03-24 00:12:29', '2021-03-24 00:12:29'),
(36, 'App\\Models\\Upload', 19, 'image', 'wheel_repair', 'wheel_repair.png', 'image/png', 'public', 199084, '[]', '{\"uuid\":\"b60cb470-0a0a-4e64-9bc1-56a5f2c97069\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 33, '2021-03-24 00:15:20', '2021-03-24 00:15:20'),
(37, 'App\\Models\\Category', 9, 'image', 'wheel_repair', 'wheel_repair.png', 'image/png', 'public', 199084, '[]', '{\"uuid\":\"b60cb470-0a0a-4e64-9bc1-56a5f2c97069\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 34, '2021-03-24 00:15:23', '2021-03-24 00:15:23'),
(38, 'App\\Models\\Upload', 20, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 152207, '[]', '{\"uuid\":\"8449688a-5b07-439e-a0e4-0d755ce000eb\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 35, '2021-03-24 00:25:51', '2021-03-24 00:25:51'),
(39, 'App\\Models\\Category', 1, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 152207, '[]', '{\"uuid\":\"8449688a-5b07-439e-a0e4-0d755ce000eb\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 36, '2021-03-24 00:25:57', '2021-03-24 00:25:57'),
(40, 'App\\Models\\Upload', 21, 'image', 'massage', 'massage.png', 'image/png', 'public', 160524, '[]', '{\"uuid\":\"f15219b1-9ed8-43ae-a178-9c12a990f301\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 37, '2021-03-24 00:35:25', '2021-03-24 00:35:25'),
(42, 'App\\Models\\Upload', 22, 'image', 'real_estate', 'real_estate.png', 'image/png', 'public', 130744, '[]', '{\"uuid\":\"441d7339-ca38-41e6-80b3-9d9e15f2d8c7\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 39, '2021-03-24 00:38:44', '2021-03-24 00:38:44'),
(43, 'App\\Models\\EService', 2, 'image', 'real_estate', 'real_estate.png', 'image/png', 'public', 130744, '[]', '{\"uuid\":\"441d7339-ca38-41e6-80b3-9d9e15f2d8c7\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 40, '2021-03-24 00:38:48', '2021-03-24 00:38:48'),
(44, 'App\\Models\\Upload', 23, 'image', 'office_clean', 'office_clean.png', 'image/png', 'public', 122380, '[]', '{\"uuid\":\"46efcd22-f417-4eab-a7fc-df0a520f33d5\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 41, '2021-03-24 00:48:59', '2021-03-24 00:49:00'),
(45, 'App\\Models\\EService', 3, 'image', 'office_clean', 'office_clean.png', 'image/png', 'public', 122380, '[]', '{\"uuid\":\"46efcd22-f417-4eab-a7fc-df0a520f33d5\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 42, '2021-03-24 00:49:02', '2021-03-24 00:49:02'),
(46, 'App\\Models\\Upload', 24, 'image', 'tank_clean', 'tank_clean.png', 'image/png', 'public', 131033, '[]', '{\"uuid\":\"3d82aadd-2e11-45bd-85d1-4a3659069b35\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 43, '2021-03-24 00:54:49', '2021-03-24 00:54:50'),
(47, 'App\\Models\\EService', 4, 'image', 'tank_clean', 'tank_clean.png', 'image/png', 'public', 131033, '[]', '{\"uuid\":\"3d82aadd-2e11-45bd-85d1-4a3659069b35\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 44, '2021-03-24 00:54:52', '2021-03-24 00:54:52'),
(48, 'App\\Models\\Upload', 25, 'image', 'massage-1', 'massage-1.png', 'image/png', 'public', 189444, '[]', '{\"uuid\":\"7fb01e25-6f65-4bff-84ab-bbcb72d7d877\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 45, '2021-03-24 00:58:01', '2021-03-24 00:58:01'),
(50, 'App\\Models\\Upload', 26, 'image', 'doctor_home', 'doctor_home.png', 'image/png', 'public', 149340, '[]', '{\"uuid\":\"eee8d8f6-f89b-41d2-86db-aca13614233d\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 47, '2021-03-24 01:04:31', '2021-03-24 01:04:31'),
(51, 'App\\Models\\EService', 7, 'image', 'doctor_home', 'doctor_home.png', 'image/png', 'public', 149340, '[]', '{\"uuid\":\"eee8d8f6-f89b-41d2-86db-aca13614233d\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 48, '2021-03-24 01:04:34', '2021-03-24 01:04:34'),
(52, 'App\\Models\\Upload', 27, 'image', 'nurse_service', 'nurse_service.png', 'image/png', 'public', 129234, '[]', '{\"uuid\":\"171f6401-9ba5-4555-93f8-afaf505575a0\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 49, '2021-03-24 01:12:39', '2021-03-24 01:12:39'),
(53, 'App\\Models\\EService', 6, 'image', 'nurse_service', 'nurse_service.png', 'image/png', 'public', 129234, '[]', '{\"uuid\":\"171f6401-9ba5-4555-93f8-afaf505575a0\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 50, '2021-03-24 01:12:43', '2021-03-24 01:12:43'),
(54, 'App\\Models\\Upload', 28, 'image', 'doctor_home_1', 'doctor_home_1.png', 'image/png', 'public', 164215, '[]', '{\"uuid\":\"4bfee762-8f9e-4c77-85a1-146b8fbc24e6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 51, '2021-03-24 01:17:35', '2021-03-24 01:17:35'),
(55, 'App\\Models\\EService', 8, 'image', 'doctor_home_1', 'doctor_home_1.png', 'image/png', 'public', 164215, '[]', '{\"uuid\":\"4bfee762-8f9e-4c77-85a1-146b8fbc24e6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 52, '2021-03-24 01:17:37', '2021-03-24 01:17:37'),
(56, 'App\\Models\\Upload', 29, 'image', 'suv_car_service', 'suv_car_service.png', 'image/png', 'public', 174970, '[]', '{\"uuid\":\"50b398bb-c2fb-4d55-9f42-af3f4109ffdc\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 53, '2021-03-24 01:29:12', '2021-03-24 01:29:13'),
(57, 'App\\Models\\EService', 9, 'image', 'suv_car_service', 'suv_car_service.png', 'image/png', 'public', 174970, '[]', '{\"uuid\":\"50b398bb-c2fb-4d55-9f42-af3f4109ffdc\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 54, '2021-03-24 01:29:19', '2021-03-24 01:29:19'),
(58, 'App\\Models\\Upload', 30, 'image', 'doctor_home_3', 'doctor_home_3.png', 'image/png', 'public', 119588, '[]', '{\"uuid\":\"5f19d151-5ee5-4ba7-b718-463b08cde4cd\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 55, '2021-03-24 01:31:03', '2021-03-24 01:31:03'),
(59, 'App\\Models\\EService', 10, 'image', 'doctor_home_3', 'doctor_home_3.png', 'image/png', 'public', 119588, '[]', '{\"uuid\":\"5f19d151-5ee5-4ba7-b718-463b08cde4cd\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 56, '2021-03-24 01:31:12', '2021-03-24 01:31:12'),
(60, 'App\\Models\\Upload', 31, 'image', 'home_cleaning', 'home_cleaning.png', 'image/png', 'public', 133327, '[]', '{\"uuid\":\"ecfb681d-dceb-4044-99c7-38b4465bebd1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 57, '2021-03-24 01:34:36', '2021-03-24 01:34:37'),
(61, 'App\\Models\\EService', 11, 'image', 'home_cleaning', 'home_cleaning.png', 'image/png', 'public', 133327, '[]', '{\"uuid\":\"ecfb681d-dceb-4044-99c7-38b4465bebd1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 58, '2021-03-24 01:34:45', '2021-03-24 01:34:45'),
(62, 'App\\Models\\Upload', 32, 'image', 'hair_cut_1', 'hair_cut_1.png', 'image/png', 'public', 156465, '[]', '{\"uuid\":\"f3c2464b-53a8-4ac6-9395-58218d581f09\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 59, '2021-03-24 01:37:48', '2021-03-24 01:37:48'),
(63, 'App\\Models\\EService', 12, 'image', 'hair_cut_1', 'hair_cut_1.png', 'image/png', 'public', 156465, '[]', '{\"uuid\":\"f3c2464b-53a8-4ac6-9395-58218d581f09\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 60, '2021-03-24 01:37:51', '2021-03-24 01:37:51'),
(64, 'App\\Models\\Upload', 33, 'image', 'photo_graphy_1', 'photo_graphy_1.png', 'image/png', 'public', 169730, '[]', '{\"uuid\":\"043d082c-b394-4b49-8b17-efd6b98ff475\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 61, '2021-03-24 01:48:11', '2021-03-24 01:48:11'),
(65, 'App\\Models\\EService', 13, 'image', 'photo_graphy_1', 'photo_graphy_1.png', 'image/png', 'public', 169730, '[]', '{\"uuid\":\"043d082c-b394-4b49-8b17-efd6b98ff475\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 62, '2021-03-24 01:48:41', '2021-03-24 01:48:41'),
(66, 'App\\Models\\Upload', 34, 'image', 'photo_graphy_2', 'photo_graphy_2.png', 'image/png', 'public', 171812, '[]', '{\"uuid\":\"bd1e44ac-6314-4ce4-9cb1-a871c5bbc125\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 63, '2021-03-24 01:54:11', '2021-03-24 01:54:11'),
(68, 'App\\Models\\Upload', 35, 'image', 'photo_graphy_3', 'photo_graphy_3.png', 'image/png', 'public', 166134, '[]', '{\"uuid\":\"e3dec0d6-a8a0-4295-afb3-2b0d90746b11\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 65, '2021-03-24 01:58:14', '2021-03-24 01:58:14'),
(69, 'App\\Models\\EService', 22, 'image', 'photo_graphy_3', 'photo_graphy_3.png', 'image/png', 'public', 166134, '[]', '{\"uuid\":\"e3dec0d6-a8a0-4295-afb3-2b0d90746b11\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 66, '2021-03-24 01:58:18', '2021-03-24 01:58:18'),
(70, 'App\\Models\\Upload', 36, 'image', 'house_repair', 'house_repair.png', 'image/png', 'public', 232998, '[]', '{\"uuid\":\"13d65ffc-0927-4e72-9d46-6b22be318076\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 67, '2021-03-24 02:00:27', '2021-03-24 02:00:27'),
(71, 'App\\Models\\EService', 21, 'image', 'house_repair', 'house_repair.png', 'image/png', 'public', 232998, '[]', '{\"uuid\":\"13d65ffc-0927-4e72-9d46-6b22be318076\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 68, '2021-03-24 02:00:30', '2021-03-24 02:00:30'),
(72, 'App\\Models\\Upload', 37, 'image', 'massage_3', 'massage_3.png', 'image/png', 'public', 137691, '[]', '{\"uuid\":\"7663c43e-7fda-4fcb-acd0-fbd242faab8f\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 69, '2021-03-24 02:02:36', '2021-03-24 02:02:36'),
(73, 'App\\Models\\EService', 20, 'image', 'massage_3', 'massage_3.png', 'image/png', 'public', 137691, '[]', '{\"uuid\":\"7663c43e-7fda-4fcb-acd0-fbd242faab8f\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 70, '2021-03-24 02:02:40', '2021-03-24 02:02:40'),
(74, 'App\\Models\\Upload', 38, 'image', 'home_cleaning_1', 'home_cleaning_1.png', 'image/png', 'public', 173414, '[]', '{\"uuid\":\"003209c2-05b7-4774-89d1-0405c92957b8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 71, '2021-03-24 02:05:17', '2021-03-24 02:05:17'),
(75, 'App\\Models\\EService', 17, 'image', 'home_cleaning_1', 'home_cleaning_1.png', 'image/png', 'public', 173414, '[]', '{\"uuid\":\"003209c2-05b7-4774-89d1-0405c92957b8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 72, '2021-03-24 02:05:20', '2021-03-24 02:05:20'),
(76, 'App\\Models\\Upload', 39, 'image', 'massage_4', 'massage_4.png', 'image/png', 'public', 121629, '[]', '{\"uuid\":\"6f6b6157-7d9f-470e-9a7c-fbd7d0d71e45\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 73, '2021-03-24 02:07:37', '2021-03-24 02:07:38'),
(77, 'App\\Models\\EService', 24, 'image', 'massage_4', 'massage_4.png', 'image/png', 'public', 121629, '[]', '{\"uuid\":\"6f6b6157-7d9f-470e-9a7c-fbd7d0d71e45\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 74, '2021-03-24 02:07:40', '2021-03-24 02:07:40'),
(78, 'App\\Models\\Upload', 40, 'image', 'office_clean_1', 'office_clean_1.png', 'image/png', 'public', 144544, '[]', '{\"uuid\":\"859eed74-fc30-4cf3-8f15-01c799a2644c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 75, '2021-03-24 02:12:04', '2021-03-24 02:12:04'),
(79, 'App\\Models\\EService', 28, 'image', 'office_clean_1', 'office_clean_1.png', 'image/png', 'public', 144544, '[]', '{\"uuid\":\"859eed74-fc30-4cf3-8f15-01c799a2644c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 76, '2021-03-24 02:12:07', '2021-03-24 02:12:07'),
(80, 'App\\Models\\Upload', 41, 'image', 'hair_cut2', 'hair_cut2.png', 'image/png', 'public', 180099, '[]', '{\"uuid\":\"1d7df65e-e2d4-42c5-b239-db9cc6616079\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 77, '2021-03-24 02:29:12', '2021-03-24 02:29:12'),
(81, 'App\\Models\\EService', 39, 'image', 'hair_cut2', 'hair_cut2.png', 'image/png', 'public', 180099, '[]', '{\"uuid\":\"1d7df65e-e2d4-42c5-b239-db9cc6616079\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 78, '2021-03-24 02:29:15', '2021-03-24 02:29:15'),
(82, 'App\\Models\\Upload', 42, 'image', 'massage_5', 'massage_5.png', 'image/png', 'public', 95846, '[]', '{\"uuid\":\"5bf88f22-312a-4bfe-854f-97af25db1e64\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 79, '2021-03-24 02:39:34', '2021-03-24 02:39:35'),
(84, 'App\\Models\\Upload', 43, 'image', 'doctor', 'doctor.png', 'image/png', 'public', 166725, '[]', '{\"uuid\":\"22db0f9c-cd48-49ef-86c2-2da2bbc077eb\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 81, '2021-03-24 02:42:41', '2021-03-24 02:42:41'),
(85, 'App\\Models\\Category', 2, 'image', 'doctor', 'doctor.png', 'image/png', 'public', 166725, '[]', '{\"uuid\":\"22db0f9c-cd48-49ef-86c2-2da2bbc077eb\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 82, '2021-03-24 02:42:44', '2021-03-24 02:42:44'),
(86, 'App\\Models\\Option', 73, 'image', 'beauty', 'beauty.png', 'image/png', 'public', 162255, '[]', '{\"uuid\":\"1336d67a-83ab-43d3-8cf8-36a734ed69d1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 83, '2021-03-24 02:47:45', '2021-03-24 02:47:45'),
(87, 'App\\Models\\Option', 79, 'image', 'home_cleaning', 'home_cleaning.png', 'image/png', 'public', 133327, '[]', '{\"uuid\":\"ecfb681d-dceb-4044-99c7-38b4465bebd1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 84, '2021-03-24 02:48:10', '2021-03-24 02:48:10'),
(88, 'App\\Models\\Option', 91, 'image', 'massage', 'massage.png', 'image/png', 'public', 160524, '[]', '{\"uuid\":\"f15219b1-9ed8-43ae-a178-9c12a990f301\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 85, '2021-03-24 02:48:31', '2021-03-24 02:48:31'),
(89, 'App\\Models\\Option', 98, 'image', 'doctor', 'doctor.png', 'image/png', 'public', 166725, '[]', '{\"uuid\":\"22db0f9c-cd48-49ef-86c2-2da2bbc077eb\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 86, '2021-03-24 02:48:53', '2021-03-24 02:48:53'),
(90, 'App\\Models\\Option', 87, 'image', 'photo_graphy_1', 'photo_graphy_1.png', 'image/png', 'public', 169730, '[]', '{\"uuid\":\"043d082c-b394-4b49-8b17-efd6b98ff475\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 87, '2021-03-24 02:49:19', '2021-03-24 02:49:19'),
(91, 'App\\Models\\Upload', 44, 'image', 'real_estate_1', 'real_estate_1.png', 'image/png', 'public', 185979, '[]', '{\"uuid\":\"ab811a8f-d986-4732-8566-83416e6e1ff9\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 88, '2021-03-24 02:57:12', '2021-03-24 02:57:13'),
(92, 'App\\Models\\Option', 88, 'image', 'real_estate_1', 'real_estate_1.png', 'image/png', 'public', 185979, '[]', '{\"uuid\":\"ab811a8f-d986-4732-8566-83416e6e1ff9\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 89, '2021-03-24 02:57:18', '2021-03-24 02:57:18'),
(93, 'App\\Models\\Upload', 45, 'image', 'car_cleaning_1', 'car_cleaning_1.png', 'image/png', 'public', 212989, '[]', '{\"uuid\":\"80db3c9c-cbed-46d4-8df8-dae5594f2b01\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 90, '2021-03-24 02:59:44', '2021-03-24 02:59:44'),
(94, 'App\\Models\\Option', 14, 'image', 'car_cleaning_1', 'car_cleaning_1.png', 'image/png', 'public', 212989, '[]', '{\"uuid\":\"80db3c9c-cbed-46d4-8df8-dae5594f2b01\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 91, '2021-03-24 02:59:47', '2021-03-24 02:59:47'),
(95, 'App\\Models\\Upload', 46, 'image', 'photo_graphy_1', 'photo_graphy_1.png', 'image/png', 'public', 169730, '[]', '{\"uuid\":\"b282b43c-4335-4b14-9cb7-cf68d120a40c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 92, '2021-03-24 03:00:08', '2021-03-24 03:00:08'),
(97, 'App\\Models\\Upload', 47, 'image', 'photo_graphy_2', 'photo_graphy_2.png', 'image/png', 'public', 171812, '[]', '{\"uuid\":\"18f7228d-c9f6-46c7-bcb0-b87dcd1ccd87\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 94, '2021-03-24 03:00:30', '2021-03-24 03:00:30'),
(99, 'App\\Models\\Option', 70, 'image', 'massage_4', 'massage_4.png', 'image/png', 'public', 121629, '[]', '{\"uuid\":\"6f6b6157-7d9f-470e-9a7c-fbd7d0d71e45\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 96, '2021-03-24 03:01:33', '2021-03-24 03:01:33'),
(100, 'App\\Models\\Option', 41, 'image', 'doctor_home_3', 'doctor_home_3.png', 'image/png', 'public', 119588, '[]', '{\"uuid\":\"5f19d151-5ee5-4ba7-b718-463b08cde4cd\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 97, '2021-03-24 03:01:54', '2021-03-24 03:01:54'),
(102, 'App\\Models\\Option', 69, 'image', 'office_clean_1', 'office_clean_1.png', 'image/png', 'public', 144544, '[]', '{\"uuid\":\"859eed74-fc30-4cf3-8f15-01c799a2644c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 99, '2021-03-24 03:02:48', '2021-03-24 03:02:48'),
(103, 'App\\Models\\Option', 99, 'image', 'car_service', 'car_service.png', 'image/png', 'public', 427938, '[]', '{\"uuid\":\"831150cf-5027-49bc-a92b-db51ebba6ae5\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 100, '2021-03-24 03:03:28', '2021-03-24 03:03:28'),
(106, 'App\\Models\\Option', 21, 'image', 'nurse_service', 'nurse_service.png', 'image/png', 'public', 129234, '[]', '{\"uuid\":\"171f6401-9ba5-4555-93f8-afaf505575a0\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 103, '2021-03-24 03:04:54', '2021-03-24 03:04:54'),
(107, 'App\\Models\\Option', 47, 'image', 'house_repair', 'house_repair.png', 'image/png', 'public', 232998, '[]', '{\"uuid\":\"13d65ffc-0927-4e72-9d46-6b22be318076\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 104, '2021-03-24 03:05:11', '2021-03-24 03:05:11'),
(108, 'App\\Models\\Option', 50, 'image', 'photo_graphy_1', 'photo_graphy_1.png', 'image/png', 'public', 169730, '[]', '{\"uuid\":\"b282b43c-4335-4b14-9cb7-cf68d120a40c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 105, '2021-03-24 03:05:34', '2021-03-24 03:05:34'),
(109, 'App\\Models\\Option', 58, 'image', 'tank_clean', 'tank_clean.png', 'image/png', 'public', 131033, '[]', '{\"uuid\":\"3d82aadd-2e11-45bd-85d1-4a3659069b35\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 106, '2021-03-24 03:05:52', '2021-03-24 03:05:52'),
(110, 'App\\Models\\Option', 65, 'image', 'photo_graphy_2', 'photo_graphy_2.png', 'image/png', 'public', 171812, '[]', '{\"uuid\":\"bd1e44ac-6314-4ce4-9cb1-a871c5bbc125\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 107, '2021-03-24 03:06:22', '2021-03-24 03:06:22'),
(111, 'App\\Models\\Option', 68, 'image', 'photo_graphy_3', 'photo_graphy_3.png', 'image/png', 'public', 166134, '[]', '{\"uuid\":\"e3dec0d6-a8a0-4295-afb3-2b0d90746b11\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 108, '2021-03-24 03:06:38', '2021-03-24 03:06:38'),
(112, 'App\\Models\\Option', 10, 'image', 'doctor_home', 'doctor_home.png', 'image/png', 'public', 149340, '[]', '{\"uuid\":\"eee8d8f6-f89b-41d2-86db-aca13614233d\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 109, '2021-03-24 03:07:12', '2021-03-24 03:07:12'),
(113, 'App\\Models\\Option', 56, 'image', 'home_cleaning_1', 'home_cleaning_1.png', 'image/png', 'public', 173414, '[]', '{\"uuid\":\"003209c2-05b7-4774-89d1-0405c92957b8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 110, '2021-03-24 03:08:06', '2021-03-24 03:08:06'),
(114, 'App\\Models\\Option', 71, 'image', 'washing', 'washing.png', 'image/png', 'public', 135627, '[]', '{\"uuid\":\"6ba30ce9-dc53-48f2-bbbb-847c531229bf\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 111, '2021-03-24 03:08:35', '2021-03-24 03:08:35'),
(115, 'App\\Models\\Option', 13, 'image', 'hair_cut2', 'hair_cut2.png', 'image/png', 'public', 180099, '[]', '{\"uuid\":\"1d7df65e-e2d4-42c5-b239-db9cc6616079\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 112, '2021-03-24 03:15:27', '2021-03-24 03:15:27'),
(116, 'App\\Models\\Gallery', 5, 'image', 'home_cleaning_1', 'home_cleaning_1.png', 'image/png', 'public', 173414, '[]', '{\"uuid\":\"003209c2-05b7-4774-89d1-0405c92957b8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 113, '2021-03-24 03:21:15', '2021-03-24 03:21:15'),
(117, 'App\\Models\\Gallery', 17, 'image', 'washing', 'washing.png', 'image/png', 'public', 135627, '[]', '{\"uuid\":\"6ba30ce9-dc53-48f2-bbbb-847c531229bf\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 114, '2021-03-24 03:21:33', '2021-03-24 03:21:33'),
(118, 'App\\Models\\Gallery', 18, 'image', 'house_repair', 'house_repair.png', 'image/png', 'public', 232998, '[]', '{\"uuid\":\"13d65ffc-0927-4e72-9d46-6b22be318076\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 115, '2021-03-24 03:21:53', '2021-03-24 03:21:53'),
(119, 'App\\Models\\Gallery', 19, 'image', 'doctor', 'doctor.png', 'image/png', 'public', 166725, '[]', '{\"uuid\":\"22db0f9c-cd48-49ef-86c2-2da2bbc077eb\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 116, '2021-03-24 03:22:35', '2021-03-24 03:22:35'),
(120, 'App\\Models\\Gallery', 20, 'image', 'real_estate_1', 'real_estate_1.png', 'image/png', 'public', 185979, '[]', '{\"uuid\":\"ab811a8f-d986-4732-8566-83416e6e1ff9\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 117, '2021-03-24 03:23:35', '2021-03-24 03:23:35'),
(121, 'App\\Models\\Upload', 48, 'image', 'security', 'security.png', 'image/png', 'public', 76573, '[]', '{\"uuid\":\"36a857b0-8dc1-42d4-931d-99bf4f489b3e\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 118, '2021-03-24 03:26:28', '2021-03-24 03:26:28'),
(122, 'App\\Models\\Gallery', 10, 'image', 'security', 'security.png', 'image/png', 'public', 76573, '[]', '{\"uuid\":\"36a857b0-8dc1-42d4-931d-99bf4f489b3e\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 119, '2021-03-24 03:26:30', '2021-03-24 03:26:30'),
(123, 'App\\Models\\Upload', 49, 'image', 'painting', 'painting.png', 'image/png', 'public', 98085, '[]', '{\"uuid\":\"19c81fe8-7ee6-4b3c-9bd1-c89bc6b43524\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 120, '2021-03-24 03:29:28', '2021-03-24 03:29:28'),
(124, 'App\\Models\\Gallery', 13, 'image', 'painting', 'painting.png', 'image/png', 'public', 98085, '[]', '{\"uuid\":\"19c81fe8-7ee6-4b3c-9bd1-c89bc6b43524\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 121, '2021-03-24 03:29:29', '2021-03-24 03:29:29'),
(125, 'App\\Models\\Upload', 50, 'image', 'feature-3', 'feature-3.png', 'image/png', 'public', 4538, '[]', '{\"uuid\":\"387328df-66c0-4a21-a0c9-e83b48c48436\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 122, '2021-03-24 11:05:56', '2021-03-24 11:05:56'),
(127, 'App\\Models\\Upload', 51, 'image', 'clean_man_1', 'clean_man_1.png', 'image/png', 'public', 159068, '[]', '{\"uuid\":\"ed052b9e-0063-4673-9461-3cd68dcdbb72\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 123, '2021-03-24 11:54:12', '2021-03-24 11:54:13'),
(129, 'App\\Models\\Upload', 52, 'image', 'laundry_man5', 'laundry_man5.png', 'image/png', 'public', 121488, '[]', '{\"uuid\":\"59e979e3-8e34-4643-89c7-6ef86c8ac7ae\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 125, '2021-03-24 11:54:39', '2021-03-24 11:54:39'),
(130, 'App\\Models\\EProvider', 4, 'image', 'laundry_man5', 'laundry_man5.png', 'image/png', 'public', 121488, '[]', '{\"uuid\":\"59e979e3-8e34-4643-89c7-6ef86c8ac7ae\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 126, '2021-03-24 11:54:41', '2021-03-24 11:54:41'),
(131, 'App\\Models\\Upload', 53, 'image', 'car_cleaner_1', 'car_cleaner_1.png', 'image/png', 'public', 107308, '[]', '{\"uuid\":\"3d07b632-6ab5-4afc-9b5b-497ba7b138c8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 127, '2021-03-24 11:55:00', '2021-03-24 11:55:00'),
(133, 'App\\Models\\Upload', 54, 'image', 'doctor1', 'doctor1.png', 'image/png', 'public', 101419, '[]', '{\"uuid\":\"f16bbf25-b3af-48c5-8109-f68ef677092c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 129, '2021-03-24 11:55:43', '2021-03-24 11:55:43'),
(134, 'App\\Models\\EProvider', 9, 'image', 'doctor1', 'doctor1.png', 'image/png', 'public', 101419, '[]', '{\"uuid\":\"f16bbf25-b3af-48c5-8109-f68ef677092c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 130, '2021-03-24 11:55:45', '2021-03-24 11:55:45'),
(135, 'App\\Models\\Upload', 55, 'image', 'laundry_man_4', 'laundry_man_4.png', 'image/png', 'public', 169334, '[]', '{\"uuid\":\"346464eb-676a-4e20-bd7c-d37011e6bcfe\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 131, '2021-03-24 11:56:20', '2021-03-24 11:56:20'),
(136, 'App\\Models\\EProvider', 13, 'image', 'laundry_man_4', 'laundry_man_4.png', 'image/png', 'public', 169334, '[]', '{\"uuid\":\"346464eb-676a-4e20-bd7c-d37011e6bcfe\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 132, '2021-03-24 11:56:21', '2021-03-24 11:56:21'),
(137, 'App\\Models\\Upload', 56, 'image', 'car_cleaner_2', 'car_cleaner_2.png', 'image/png', 'public', 75615, '[]', '{\"uuid\":\"6902762c-51e7-4667-84c2-a6059b660781\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 133, '2021-03-24 11:56:42', '2021-03-24 11:56:42'),
(138, 'App\\Models\\EProvider', 14, 'image', 'car_cleaner_2', 'car_cleaner_2.png', 'image/png', 'public', 75615, '[]', '{\"uuid\":\"6902762c-51e7-4667-84c2-a6059b660781\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 134, '2021-03-24 11:56:44', '2021-03-24 11:56:44'),
(139, 'App\\Models\\Upload', 57, 'image', 'painting', 'painting.png', 'image/png', 'public', 98085, '[]', '{\"uuid\":\"72213cc0-f33c-4b8d-98d1-0ab3fe751537\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 135, '2021-03-24 11:57:15', '2021-03-24 11:57:16'),
(141, 'App\\Models\\Upload', 58, 'image', 'doctor2', 'doctor2.png', 'image/png', 'public', 64974, '[]', '{\"uuid\":\"7b87390a-2119-46ee-9723-4e6c44d48ba4\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 137, '2021-03-24 11:58:28', '2021-03-24 11:58:28'),
(143, 'App\\Models\\Upload', 59, 'image', 'clean_man_1', 'clean_man_1.png', 'image/png', 'public', 159068, '[]', '{\"uuid\":\"b8349852-57d5-4ca0-b63d-cdd4721ce61e\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 139, '2021-03-24 11:58:56', '2021-03-24 11:58:56'),
(144, 'App\\Models\\EProvider', 3, 'image', 'clean_man_1', 'clean_man_1.png', 'image/png', 'public', 159068, '[]', '{\"uuid\":\"b8349852-57d5-4ca0-b63d-cdd4721ce61e\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 140, '2021-03-24 11:58:58', '2021-03-24 11:58:58'),
(145, 'App\\Models\\Upload', 60, 'image', 'doctor3', 'doctor3.png', 'image/png', 'public', 74662, '[]', '{\"uuid\":\"d57309aa-e79e-4a4f-a30a-e16eb0103bd6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 141, '2021-03-24 11:59:18', '2021-03-24 11:59:18'),
(147, 'App\\Models\\Upload', 61, 'image', 'laundry_service_man_1', 'laundry_service_man_1.png', 'image/png', 'public', 138644, '[]', '{\"uuid\":\"66b8c63c-2a4a-4f7c-a204-ce0079c03761\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 143, '2021-03-24 12:00:03', '2021-03-24 12:00:03'),
(149, 'App\\Models\\Upload', 62, 'image', 'doctor2', 'doctor2.png', 'image/png', 'public', 64974, '[]', '{\"uuid\":\"d3cebf85-e0c6-4f30-b509-192e0c7cf0c6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 145, '2021-03-24 12:00:30', '2021-03-24 12:00:30'),
(150, 'App\\Models\\EProvider', 10, 'image', 'doctor2', 'doctor2.png', 'image/png', 'public', 64974, '[]', '{\"uuid\":\"d3cebf85-e0c6-4f30-b509-192e0c7cf0c6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 146, '2021-03-24 12:00:31', '2021-03-24 12:00:31'),
(151, 'App\\Models\\Upload', 63, 'image', 'home_cleaning_1', 'home_cleaning_1.png', 'image/png', 'public', 173414, '[]', '{\"uuid\":\"00c25a0b-d3f3-452c-bb22-0812226ce156\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 147, '2021-03-24 12:01:05', '2021-03-24 12:01:05'),
(152, 'App\\Models\\EProvider', 11, 'image', 'home_cleaning_1', 'home_cleaning_1.png', 'image/png', 'public', 173414, '[]', '{\"uuid\":\"00c25a0b-d3f3-452c-bb22-0812226ce156\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 148, '2021-03-24 12:01:07', '2021-03-24 12:01:07'),
(153, 'App\\Models\\Upload', 64, 'image', 'sewer', 'sewer.png', 'image/png', 'public', 122225, '[]', '{\"uuid\":\"c4281fa4-7a82-48f1-bf67-f000e96f4588\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 149, '2021-03-24 12:02:37', '2021-03-24 12:02:37'),
(155, 'App\\Models\\Upload', 65, 'image', 'laundry_service_man_2', 'laundry_service_man_2.png', 'image/png', 'public', 188583, '[]', '{\"uuid\":\"9b698b59-e29d-474a-8e6b-2a0dcb0a0ad3\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 151, '2021-03-24 12:03:21', '2021-03-24 12:03:21'),
(156, 'App\\Models\\EProvider', 19, 'image', 'laundry_service_man_2', 'laundry_service_man_2.png', 'image/png', 'public', 188583, '[]', '{\"uuid\":\"9b698b59-e29d-474a-8e6b-2a0dcb0a0ad3\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 152, '2021-03-24 12:03:22', '2021-03-24 12:03:22'),
(157, 'App\\Models\\Upload', 66, 'image', 'photo_grapher_1', 'photo_grapher_1.png', 'image/png', 'public', 116279, '[]', '{\"uuid\":\"5e1ba555-a1e3-4bb4-b7cd-ec01e006d64b\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 153, '2021-03-24 12:03:58', '2021-03-24 12:03:58'),
(158, 'App\\Models\\EProvider', 20, 'image', 'photo_grapher_1', 'photo_grapher_1.png', 'image/png', 'public', 116279, '[]', '{\"uuid\":\"5e1ba555-a1e3-4bb4-b7cd-ec01e006d64b\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 154, '2021-03-24 12:04:01', '2021-03-24 12:04:01'),
(159, 'App\\Models\\Upload', 67, 'image', 'doctor1', 'doctor1.png', 'image/png', 'public', 101419, '[]', '{\"uuid\":\"e1cc3502-068d-4c3d-ad63-69b24ee9829c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 155, '2021-03-24 12:36:36', '2021-03-24 12:36:36'),
(161, 'App\\Models\\Upload', 68, 'image', 'photo_grapher_5', 'photo_grapher_5.png', 'image/png', 'public', 118813, '[]', '{\"uuid\":\"5247c792-87c9-4359-b98e-82487ffc986a\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 157, '2021-03-24 12:38:01', '2021-03-24 12:38:01'),
(162, 'App\\Models\\EProvider', 7, 'image', 'photo_grapher_5', 'photo_grapher_5.png', 'image/png', 'public', 118813, '[]', '{\"uuid\":\"5247c792-87c9-4359-b98e-82487ffc986a\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 158, '2021-03-24 12:38:04', '2021-03-24 12:38:04'),
(163, 'App\\Models\\Upload', 69, 'image', 'photo_grapher_3', 'photo_grapher_3.png', 'image/png', 'public', 113056, '[]', '{\"uuid\":\"aea6931b-60a0-481b-bcdc-243a1f2a5274\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 159, '2021-03-24 12:40:41', '2021-03-24 12:40:41'),
(165, 'App\\Models\\Upload', 70, 'image', 'car_cleaner_2', 'car_cleaner_2.png', 'image/png', 'public', 75615, '[]', '{\"uuid\":\"19f67697-b695-4936-92b5-c29d79bec139\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 161, '2021-03-24 12:41:46', '2021-03-24 12:41:46'),
(167, 'App\\Models\\Upload', 71, 'image', 'house_repair (2)', 'house_repair-(2).png', 'image/png', 'public', 75438, '[]', '{\"uuid\":\"b1bf39f5-d2f3-4871-9266-ed6b9ec41413\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 163, '2021-03-24 12:45:38', '2021-03-24 12:45:38'),
(168, 'App\\Models\\EProvider', 1, 'image', 'house_repair (2)', 'house_repair-(2).png', 'image/png', 'public', 75438, '[]', '{\"uuid\":\"b1bf39f5-d2f3-4871-9266-ed6b9ec41413\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 164, '2021-03-24 12:45:40', '2021-03-24 12:45:40'),
(169, 'App\\Models\\Upload', 72, 'image', 'car_cleaner_1', 'car_cleaner_1.png', 'image/png', 'public', 107308, '[]', '{\"uuid\":\"058cb44d-b0b6-454e-b035-c66cadb504a3\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 165, '2021-03-24 12:46:30', '2021-03-24 12:46:30'),
(170, 'App\\Models\\Upload', 73, 'image', 'painting_man', 'painting_man.png', 'image/png', 'public', 131639, '[]', '{\"uuid\":\"b0e2d8df-f35c-48d8-8d02-0e018a2c9b21\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 166, '2021-03-24 12:48:13', '2021-03-24 12:48:13'),
(172, 'App\\Models\\Upload', 74, 'image', 'clean_man_1', 'clean_man_1.png', 'image/png', 'public', 159068, '[]', '{\"uuid\":\"bea77073-5134-42a6-80ba-ad6858b01dc1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 167, '2021-03-24 12:49:54', '2021-03-24 12:49:54'),
(173, 'App\\Models\\EProvider', 15, 'image', 'clean_man_1', 'clean_man_1.png', 'image/png', 'public', 159068, '[]', '{\"uuid\":\"bea77073-5134-42a6-80ba-ad6858b01dc1\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 168, '2021-03-24 12:49:56', '2021-03-24 12:49:56'),
(174, 'App\\Models\\Upload', 75, 'image', 'doctor1', 'doctor1.png', 'image/png', 'public', 101419, '[]', '{\"uuid\":\"fe2dcfce-4c47-4f8a-8fac-f4731ccee98d\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 169, '2021-03-24 12:58:32', '2021-03-24 12:58:32'),
(175, 'App\\Models\\EProvider', 5, 'image', 'doctor1', 'doctor1.png', 'image/png', 'public', 101419, '[]', '{\"uuid\":\"fe2dcfce-4c47-4f8a-8fac-f4731ccee98d\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 170, '2021-03-24 12:58:34', '2021-03-24 12:58:34'),
(176, 'App\\Models\\Upload', 76, 'image', 'doctor2', 'doctor2.png', 'image/png', 'public', 64974, '[]', '{\"uuid\":\"71b42db5-1571-4abf-a016-6f22431af2ea\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 171, '2021-03-24 12:59:07', '2021-03-24 12:59:07'),
(177, 'App\\Models\\EProvider', 8, 'image', 'doctor2', 'doctor2.png', 'image/png', 'public', 64974, '[]', '{\"uuid\":\"71b42db5-1571-4abf-a016-6f22431af2ea\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 172, '2021-03-24 12:59:09', '2021-03-24 12:59:09'),
(178, 'App\\Models\\Upload', 77, 'image', 'doctor3', 'doctor3.png', 'image/png', 'public', 74662, '[]', '{\"uuid\":\"f1c3f5d0-3373-415a-943e-fc63cccba45a\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 173, '2021-03-24 12:59:24', '2021-03-24 12:59:24'),
(179, 'App\\Models\\EProvider', 17, 'image', 'doctor3', 'doctor3.png', 'image/png', 'public', 74662, '[]', '{\"uuid\":\"f1c3f5d0-3373-415a-943e-fc63cccba45a\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 174, '2021-03-24 12:59:29', '2021-03-24 12:59:29'),
(180, 'App\\Models\\Upload', 78, 'avatar', 'user-1', 'user-1.png', 'image/png', 'public', 143655, '[]', '{\"uuid\":\"4962f362-8742-4c5a-ab49-9910cc731c63\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 175, '2021-03-24 13:07:04', '2021-03-24 13:07:04'),
(182, 'App\\Models\\Upload', 79, 'avatar', 'user-1', 'user-1.png', 'image/png', 'public', 143655, '[]', '{\"uuid\":\"955e3314-9d2f-4cb2-abf9-5b6b61e7ca6b\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 176, '2021-03-24 13:07:26', '2021-03-24 13:07:26'),
(183, 'App\\Models\\User', 8, 'avatar', 'user-1', 'user-1.png', 'image/png', 'public', 143655, '[]', '{\"uuid\":\"955e3314-9d2f-4cb2-abf9-5b6b61e7ca6b\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 177, '2021-03-24 13:07:29', '2021-03-24 13:07:29'),
(184, 'App\\Models\\Upload', 80, 'avatar', 'user_2', 'user_2.png', 'image/png', 'public', 164282, '[]', '{\"uuid\":\"9a9ab3eb-250d-4efa-9ed8-64e3c070f78a\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 178, '2021-03-24 13:17:47', '2021-03-24 13:17:47'),
(185, 'App\\Models\\User', 3, 'avatar', 'user_2', 'user_2.png', 'image/png', 'public', 164282, '[]', '{\"uuid\":\"9a9ab3eb-250d-4efa-9ed8-64e3c070f78a\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 179, '2021-03-24 13:17:49', '2021-03-24 13:17:49'),
(186, 'App\\Models\\Upload', 81, 'avatar', 'user_3', 'user_3.png', 'image/png', 'public', 160676, '[]', '{\"uuid\":\"130e615c-7a2a-41a0-bc01-b3b0bf43957e\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 180, '2021-03-24 13:18:13', '2021-03-24 13:18:13'),
(187, 'App\\Models\\User', 5, 'avatar', 'user_3', 'user_3.png', 'image/png', 'public', 160676, '[]', '{\"uuid\":\"130e615c-7a2a-41a0-bc01-b3b0bf43957e\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 181, '2021-03-24 13:18:14', '2021-03-24 13:18:14'),
(188, 'App\\Models\\Upload', 82, 'avatar', 'user_4', 'user_4.png', 'image/png', 'public', 117324, '[]', '{\"uuid\":\"36546bca-9ddc-47b9-a0d6-5a07624abf39\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 182, '2021-03-24 13:18:25', '2021-03-24 13:18:25'),
(189, 'App\\Models\\User', 5, 'avatar', 'user_4', 'user_4.png', 'image/png', 'public', 117324, '[]', '{\"uuid\":\"36546bca-9ddc-47b9-a0d6-5a07624abf39\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 183, '2021-03-24 13:18:27', '2021-03-24 13:18:27'),
(190, 'App\\Models\\Upload', 83, 'avatar', 'user_5', 'user_5.png', 'image/png', 'public', 138073, '[]', '{\"uuid\":\"a49fe19d-8d3e-48e9-8653-1e72fd2ce34c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 184, '2021-03-24 13:18:41', '2021-03-24 13:18:41'),
(191, 'App\\Models\\User', 7, 'avatar', 'user_5', 'user_5.png', 'image/png', 'public', 138073, '[]', '{\"uuid\":\"a49fe19d-8d3e-48e9-8653-1e72fd2ce34c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 185, '2021-03-24 13:18:42', '2021-03-24 13:18:42'),
(192, 'App\\Models\\Upload', 84, 'image', 'photo_grapher_3', 'photo_grapher_3.png', 'image/png', 'public', 113056, '[]', '{\"uuid\":\"28f3bf36-e0ef-4f12-b3b6-615428790126\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 186, '2021-03-24 13:36:17', '2021-03-24 13:36:17'),
(193, 'App\\Models\\Upload', 85, 'image', 'photo_grapher_3', 'photo_grapher_3.png', 'image/png', 'public', 113056, '[]', '{\"uuid\":\"3fb1d281-8851-4243-ba25-8f833abbdecc\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 187, '2021-03-24 13:36:35', '2021-03-24 13:36:35'),
(194, 'App\\Models\\EProvider', 21, 'image', 'photo_grapher_3', 'photo_grapher_3.png', 'image/png', 'public', 113056, '[]', '{\"uuid\":\"3fb1d281-8851-4243-ba25-8f833abbdecc\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 188, '2021-03-24 13:36:43', '2021-03-24 13:36:43'),
(195, 'App\\Models\\Upload', 86, 'image', 'photo_graphy_3', 'photo_graphy_3.png', 'image/png', 'public', 166134, '[]', '{\"uuid\":\"d46a87d1-29d7-44d7-b846-a5d206f0ca8c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 189, '2021-03-24 13:40:23', '2021-03-24 13:40:23'),
(196, 'App\\Models\\EService', 14, 'image', 'photo_graphy_3', 'photo_graphy_3.png', 'image/png', 'public', 166134, '[]', '{\"uuid\":\"d46a87d1-29d7-44d7-b846-a5d206f0ca8c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 190, '2021-03-24 13:40:25', '2021-03-24 13:40:25'),
(197, 'App\\Models\\Upload', 87, 'image', 'hair_cut2', 'hair_cut2.png', 'image/png', 'public', 180099, '[]', '{\"uuid\":\"4950dd0c-535d-4dcd-a2fc-bded36bb51c0\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 191, '2021-03-24 13:45:21', '2021-03-24 13:45:21'),
(198, 'App\\Models\\Option', 101, 'image', 'hair_cut2', 'hair_cut2.png', 'image/png', 'public', 180099, '[]', '{\"uuid\":\"4950dd0c-535d-4dcd-a2fc-bded36bb51c0\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 192, '2021-03-24 13:45:31', '2021-03-24 13:45:31'),
(199, 'App\\Models\\Upload', 88, 'image', 'hair_cut_4', 'hair_cut_4.png', 'image/png', 'public', 126484, '[]', '{\"uuid\":\"3148906d-283a-495a-8db4-45c1f7d5b86c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 193, '2021-03-24 13:47:05', '2021-03-24 13:47:05'),
(200, 'App\\Models\\EProvider', 22, 'image', 'hair_cut_4', 'hair_cut_4.png', 'image/png', 'public', 126484, '[]', '{\"uuid\":\"3148906d-283a-495a-8db4-45c1f7d5b86c\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 194, '2021-03-24 13:47:34', '2021-03-24 13:47:34'),
(201, 'App\\Models\\Upload', 89, 'image', 'hair_cut_1', 'hair_cut_1.png', 'image/png', 'public', 156465, '[]', '{\"uuid\":\"563c2362-f924-43a3-a36b-818bc02800d8\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 195, '2021-03-24 13:48:37', '2021-03-24 13:48:37'),
(203, 'App\\Models\\Upload', 90, 'image', 'hair_cut_man_2', 'hair_cut_man_2.png', 'image/png', 'public', 110679, '[]', '{\"uuid\":\"27ed4b2a-0669-453b-98a4-fa5b5920e3f6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 197, '2021-03-24 13:53:21', '2021-03-24 13:53:21'),
(204, 'App\\Models\\EProvider', 23, 'image', 'hair_cut_man_2', 'hair_cut_man_2.png', 'image/png', 'public', 110679, '[]', '{\"uuid\":\"27ed4b2a-0669-453b-98a4-fa5b5920e3f6\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 198, '2021-03-24 13:53:55', '2021-03-24 13:53:55'),
(205, 'App\\Models\\Upload', 91, 'image', 'laundry_man5', 'laundry_man5.png', 'image/png', 'public', 121488, '[]', '{\"uuid\":\"4a430fc7-8827-4984-8d14-59d1360d70c2\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 199, '2021-03-24 14:03:11', '2021-03-24 14:03:11'),
(206, 'App\\Models\\EProvider', 2, 'image', 'laundry_man5', 'laundry_man5.png', 'image/png', 'public', 121488, '[]', '{\"uuid\":\"4a430fc7-8827-4984-8d14-59d1360d70c2\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 200, '2021-03-24 14:03:14', '2021-03-24 14:03:14'),
(207, 'App\\Models\\Upload', 92, 'image', 'massage_7', 'massage_7.png', 'image/png', 'public', 141001, '[]', '{\"uuid\":\"49ec0d56-e25a-4fc7-9991-12721f206187\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 201, '2021-03-24 14:15:52', '2021-03-24 14:15:52'),
(208, 'App\\Models\\EService', 1, 'image', 'massage_7', 'massage_7.png', 'image/png', 'public', 141001, '[]', '{\"uuid\":\"49ec0d56-e25a-4fc7-9991-12721f206187\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 202, '2021-03-24 14:15:55', '2021-03-24 14:15:55'),
(209, 'App\\Models\\Upload', 93, 'avatar', 'laundry_service_man_2', 'laundry_service_man_2.png', 'image/png', 'public', 188583, '[]', '{\"uuid\":\"17d56b2b-3504-4a92-94b9-44d77073ddfa\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 203, '2021-03-24 14:29:52', '2021-03-24 14:29:52'),
(210, 'App\\Models\\User', 1, 'avatar', 'laundry_service_man_2', 'laundry_service_man_2.png', 'image/png', 'public', 188583, '[]', '{\"uuid\":\"17d56b2b-3504-4a92-94b9-44d77073ddfa\",\"user_id\":1,\"generated_conversions\":{\"thumb\":true,\"icon\":true}}', '[]', 204, '2021-03-24 14:29:54', '2021-03-24 14:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_26_175145_create_permission_tables', 1),
(4, '2018_06_12_140344_create_media_table', 1),
(5, '2018_06_13_035117_create_uploads_table', 1),
(6, '2018_07_17_180731_create_settings_table', 1),
(7, '2018_07_24_211308_create_custom_fields_table', 1),
(8, '2018_07_24_211327_create_custom_field_values_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_08_29_213829_create_faq_categories_table', 1),
(11, '2019_08_29_213926_create_faqs_table', 1),
(12, '2019_10_22_144652_create_currencies_table', 1),
(13, '2021_01_07_162658_create_payment_methods_table', 1),
(14, '2021_01_07_164755_create_payment_statuses_table', 1),
(15, '2021_01_07_165422_create_payments_table', 1),
(16, '2021_01_13_105605_create_e_provider_types_table', 1),
(17, '2021_01_13_111155_create_e_providers_table', 1),
(18, '2021_01_13_111622_create_experiences_table', 1),
(19, '2021_01_13_111730_create_awards_table', 1),
(20, '2021_01_13_114302_create_taxes_table', 1),
(21, '2021_01_13_200249_create_addresses_table', 1),
(22, '2021_01_15_115239_create_e_provider_addresses_table', 1),
(23, '2021_01_15_115747_create_e_provider_users_table', 1),
(24, '2021_01_15_115850_create_e_provider_taxes_table', 1),
(25, '2021_01_16_160838_create_availability_hours_table', 1),
(26, '2021_01_19_135951_create_e_services_table', 1),
(27, '2021_01_19_140427_create_categories_table', 1),
(28, '2021_01_19_171553_create_e_service_categories_table', 1),
(29, '2021_01_22_194514_create_option_groups_table', 1),
(30, '2021_01_22_200807_create_options_table', 1),
(31, '2021_01_22_205819_create_favorites_table', 1),
(32, '2021_01_22_205944_create_favorite_options_table', 1),
(33, '2021_01_23_125641_create_e_service_reviews_table', 1),
(34, '2021_01_23_201533_create_galleries_table', 1),
(35, '2021_01_25_105421_create_slides_table', 1),
(36, '2021_01_25_162055_create_notifications_table', 1),
(37, '2021_01_25_170522_create_coupons_table', 1),
(38, '2021_01_25_170529_create_discountables_table', 1),
(39, '2021_01_25_191833_create_booking_statuses_table', 1),
(40, '2021_01_25_212252_create_bookings_table', 1),
(41, '2021_01_30_111717_create_e_provider_payouts_table', 1),
(42, '2021_01_30_135356_create_earnings_table', 1),
(43, '2021_02_24_102838_create_custom_pages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `e_service_id` int(10) UNSIGNED NOT NULL,
  `option_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `description`, `price`, `e_service_id`, `option_group_id`, `created_at`, `updated_at`) VALUES
(14, '10m²', 'Provident sint quaerat dolorum.', 24.21, 9, 2, '2021-03-19 13:02:53', '2021-03-19 13:02:53'),
(41, '10m²', 'Et quo accusantium voluptatum placeat est.', 45.10, 7, 2, '2021-03-19 13:02:53', '2021-03-19 13:02:53'),
(47, '20m', 'Ut ducimus quae ut.', 28.77, 21, 1, '2021-03-19 13:02:54', '2021-03-19 13:02:54'),
(58, '20m', 'Quisquam perspiciatis praesentium velit quibusdam.', 37.13, 4, 1, '2021-03-19 13:02:54', '2021-03-19 13:02:54'),
(65, '20m', 'Repellendus debitis minus quam qui architecto.', 38.10, 14, 2, '2021-03-19 13:02:54', '2021-03-19 13:02:54'),
(70, '10m²', 'Et maxime consequuntur aut.', 10.47, 1, 3, '2021-03-19 13:02:54', '2021-03-19 13:02:54'),
(71, '30m²', 'Assumenda similique minus quaerat.', 29.83, 11, 3, '2021-03-19 13:02:54', '2021-03-19 13:02:54'),
(79, '10m²', 'Esse velit doloremque sunt molestias.', 14.24, 11, 3, '2021-03-19 13:02:54', '2021-03-19 13:02:54'),
(91, '10m²', 'Ea sit alias qui consequatur tempora.', 24.79, 20, 2, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(98, '10m²', 'Sit eos quos.', 33.79, 10, 2, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(99, '30m²', 'In assumenda aut vel iure.', 30.18, 9, 1, '2021-03-19 13:02:55', '2021-03-19 13:02:55'),
(101, 'Hair Cut Service Finding', '<p>I am looking for Hair cut service</p>', 12.00, 12, 2, '2021-03-24 13:45:31', '2021-03-24 13:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `option_groups`
--

CREATE TABLE `option_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow_multiple` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_groups`
--

INSERT INTO `option_groups` (`id`, `name`, `allow_multiple`, `created_at`, `updated_at`) VALUES
(1, 'Size', 1, '2021-01-22 14:49:15', '2021-02-07 15:30:19'),
(2, 'Area', 1, '2021-01-22 15:46:28', '2021-01-22 15:46:28'),
(3, 'Surface', 0, '2021-01-22 15:46:47', '2021-01-22 15:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `payment_status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `route`, `order`, `default`, `enabled`, `created_at`, `updated_at`) VALUES
(2, 'RazorPay', 'Click to pay with RazorPay gateway', '/RazorPay', 2, 0, 1, '2021-01-17 09:33:49', '2021-02-17 17:37:30'),
(5, 'PayPal', 'Click to pay with your PayPal account', '/PayPal', 1, 0, 1, '2021-01-17 10:46:06', '2021-02-17 17:38:47'),
(6, 'Cash', 'Click to pay cash when finish', '/Cash', 3, 1, 1, '2021-02-17 17:38:42', '2021-02-17 17:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 1, '2021-01-17 10:28:28', '2021-02-17 16:55:15'),
(2, 'Paid', 10, '2021-01-11 18:19:49', '2021-02-17 16:55:53'),
(3, 'Failed', 20, '2021-01-17 09:05:04', '2021-02-17 16:56:32'),
(4, 'Refunded', 40, '2021-02-17 16:58:14', '2021-02-17 16:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2021-01-07 08:17:34', '2021-01-07 08:17:34'),
(2, 'medias.create', 'web', '2021-01-07 08:17:35', '2021-01-07 08:17:35'),
(3, 'users.profile', 'web', '2021-01-07 08:17:35', '2021-01-07 08:17:35'),
(4, 'users.index', 'web', '2021-01-07 08:17:35', '2021-01-07 08:17:35'),
(5, 'users.create', 'web', '2021-01-07 08:17:35', '2021-01-07 08:17:35'),
(6, 'users.store', 'web', '2021-01-07 08:17:35', '2021-01-07 08:17:35'),
(7, 'users.show', 'web', '2021-01-07 08:17:35', '2021-01-07 08:17:35'),
(8, 'users.edit', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(9, 'users.update', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(10, 'users.destroy', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(11, 'medias.delete', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(12, 'medias', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(13, 'permissions.index', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(14, 'permissions.create', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(15, 'permissions.store', 'web', '2021-01-07 08:17:36', '2021-01-07 08:17:36'),
(16, 'permissions.show', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(17, 'permissions.edit', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(18, 'permissions.update', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(19, 'permissions.destroy', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(20, 'roles.index', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(21, 'roles.create', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(22, 'roles.store', 'web', '2021-01-07 08:17:37', '2021-01-07 08:17:37'),
(23, 'roles.show', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(24, 'roles.edit', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(25, 'roles.update', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(26, 'roles.destroy', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(27, 'customFields.index', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(28, 'customFields.create', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(29, 'customFields.store', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(30, 'customFields.show', 'web', '2021-01-07 08:17:38', '2021-01-07 08:17:38'),
(31, 'customFields.edit', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(32, 'customFields.update', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(33, 'customFields.destroy', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(34, 'currencies.index', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(35, 'currencies.create', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(36, 'currencies.store', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(37, 'currencies.edit', 'web', '2021-01-07 08:17:39', '2021-01-07 08:17:39'),
(38, 'currencies.update', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(39, 'currencies.destroy', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(40, 'users.login-as-user', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(41, 'app-settings', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(42, 'faqCategories.index', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(43, 'faqCategories.create', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(44, 'faqCategories.store', 'web', '2021-01-07 08:17:40', '2021-01-07 08:17:40'),
(45, 'faqCategories.edit', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(46, 'faqCategories.update', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(47, 'faqCategories.destroy', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(48, 'faqs.index', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(49, 'faqs.create', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(50, 'faqs.store', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(51, 'faqs.edit', 'web', '2021-01-07 08:17:41', '2021-01-07 08:17:41'),
(52, 'faqs.update', 'web', '2021-01-07 08:17:42', '2021-01-07 08:17:42'),
(53, 'faqs.destroy', 'web', '2021-01-07 08:17:42', '2021-01-07 08:17:42'),
(54, 'payments.index', 'web', '2021-01-10 19:04:33', '2021-01-10 19:04:33'),
(55, 'payments.show', 'web', '2021-01-10 19:04:33', '2021-01-10 19:04:33'),
(56, 'payments.update', 'web', '2021-01-10 19:04:33', '2021-01-10 19:04:33'),
(57, 'paymentMethods.index', 'web', '2021-01-10 19:04:33', '2021-01-10 19:04:33'),
(58, 'paymentMethods.create', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(59, 'paymentMethods.store', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(60, 'paymentMethods.edit', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(61, 'paymentMethods.update', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(62, 'paymentMethods.destroy', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(63, 'paymentStatuses.index', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(64, 'paymentStatuses.create', 'web', '2021-01-10 19:04:34', '2021-01-10 19:04:34'),
(65, 'paymentStatuses.store', 'web', '2021-01-10 19:04:35', '2021-01-10 19:04:35'),
(66, 'paymentStatuses.edit', 'web', '2021-01-10 19:04:35', '2021-01-10 19:04:35'),
(67, 'paymentStatuses.update', 'web', '2021-01-10 19:04:35', '2021-01-10 19:04:35'),
(68, 'paymentStatuses.destroy', 'web', '2021-01-10 19:04:35', '2021-01-10 19:04:35'),
(69, 'verification.notice', 'web', '2021-01-12 05:19:50', '2021-01-12 05:19:50'),
(70, 'verification.verify', 'web', '2021-01-12 05:19:50', '2021-01-12 05:19:50'),
(71, 'verification.resend', 'web', '2021-01-12 05:19:51', '2021-01-12 05:19:51'),
(72, 'awards.index', 'web', '2021-01-12 05:19:51', '2021-01-12 05:19:51'),
(73, 'awards.create', 'web', '2021-01-12 05:19:52', '2021-01-12 05:19:52'),
(74, 'awards.store', 'web', '2021-01-12 05:19:52', '2021-01-12 05:19:52'),
(75, 'awards.show', 'web', '2021-01-12 05:19:52', '2021-01-12 05:19:52'),
(76, 'awards.edit', 'web', '2021-01-12 05:19:52', '2021-01-12 05:19:52'),
(77, 'awards.update', 'web', '2021-01-12 05:19:52', '2021-01-12 05:19:52'),
(78, 'awards.destroy', 'web', '2021-01-12 05:19:52', '2021-01-12 05:19:52'),
(79, 'experiences.index', 'web', '2021-01-12 06:20:29', '2021-01-12 06:20:29'),
(80, 'experiences.create', 'web', '2021-01-12 06:20:29', '2021-01-12 06:20:29'),
(81, 'experiences.store', 'web', '2021-01-12 06:20:30', '2021-01-12 06:20:30'),
(82, 'experiences.show', 'web', '2021-01-12 06:20:30', '2021-01-12 06:20:30'),
(83, 'experiences.edit', 'web', '2021-01-12 06:20:30', '2021-01-12 06:20:30'),
(84, 'experiences.update', 'web', '2021-01-12 06:20:30', '2021-01-12 06:20:30'),
(85, 'experiences.destroy', 'web', '2021-01-12 06:20:30', '2021-01-12 06:20:30'),
(92, 'eProviderTypes.index', 'web', '2021-01-13 06:31:08', '2021-01-13 06:31:08'),
(93, 'eProviderTypes.create', 'web', '2021-01-13 06:31:09', '2021-01-13 06:31:09'),
(94, 'eProviderTypes.store', 'web', '2021-01-13 06:31:09', '2021-01-13 06:31:09'),
(95, 'eProviderTypes.edit', 'web', '2021-01-13 06:31:09', '2021-01-13 06:31:09'),
(96, 'eProviderTypes.update', 'web', '2021-01-13 06:31:09', '2021-01-13 06:31:09'),
(97, 'eProviderTypes.destroy', 'web', '2021-01-13 06:31:09', '2021-01-13 06:31:09'),
(98, 'eProviders.index', 'web', '2021-01-13 06:48:55', '2021-01-13 06:48:55'),
(99, 'eProviders.create', 'web', '2021-01-13 06:48:56', '2021-01-13 06:48:56'),
(100, 'eProviders.store', 'web', '2021-01-13 06:48:56', '2021-01-13 06:48:56'),
(101, 'eProviders.edit', 'web', '2021-01-13 06:48:56', '2021-01-13 06:48:56'),
(102, 'eProviders.update', 'web', '2021-01-13 06:48:56', '2021-01-13 06:48:56'),
(103, 'eProviders.destroy', 'web', '2021-01-13 06:48:56', '2021-01-13 06:48:56'),
(104, 'addresses.index', 'web', '2021-01-13 06:48:56', '2021-01-13 06:48:56'),
(105, 'addresses.create', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(106, 'addresses.store', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(107, 'addresses.edit', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(108, 'addresses.update', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(109, 'addresses.destroy', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(110, 'taxes.index', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(111, 'taxes.create', 'web', '2021-01-13 06:48:57', '2021-01-13 06:48:57'),
(112, 'taxes.store', 'web', '2021-01-13 06:48:58', '2021-01-13 06:48:58'),
(113, 'taxes.edit', 'web', '2021-01-13 06:48:58', '2021-01-13 06:48:58'),
(114, 'taxes.update', 'web', '2021-01-13 06:48:58', '2021-01-13 06:48:58'),
(115, 'taxes.destroy', 'web', '2021-01-13 06:48:58', '2021-01-13 06:48:58'),
(116, 'availabilityHours.index', 'web', '2021-01-16 11:14:21', '2021-01-16 11:14:21'),
(117, 'availabilityHours.create', 'web', '2021-01-16 11:14:21', '2021-01-16 11:14:21'),
(118, 'availabilityHours.store', 'web', '2021-01-16 11:14:21', '2021-01-16 11:14:21'),
(119, 'availabilityHours.edit', 'web', '2021-01-16 11:14:21', '2021-01-16 11:14:21'),
(120, 'availabilityHours.update', 'web', '2021-01-16 11:14:22', '2021-01-16 11:14:22'),
(121, 'availabilityHours.destroy', 'web', '2021-01-16 11:14:22', '2021-01-16 11:14:22'),
(122, 'eServices.index', 'web', '2021-01-19 09:03:00', '2021-01-19 09:03:00'),
(123, 'eServices.create', 'web', '2021-01-19 09:03:00', '2021-01-19 09:03:00'),
(124, 'eServices.store', 'web', '2021-01-19 09:03:00', '2021-01-19 09:03:00'),
(126, 'eServices.edit', 'web', '2021-01-19 09:03:01', '2021-01-19 09:03:01'),
(127, 'eServices.update', 'web', '2021-01-19 09:03:01', '2021-01-19 09:03:01'),
(128, 'eServices.destroy', 'web', '2021-01-19 09:03:01', '2021-01-19 09:03:01'),
(129, 'categories.index', 'web', '2021-01-19 09:08:55', '2021-01-19 09:08:55'),
(130, 'categories.create', 'web', '2021-01-19 09:08:55', '2021-01-19 09:08:55'),
(131, 'categories.store', 'web', '2021-01-19 09:08:55', '2021-01-19 09:08:55'),
(132, 'categories.edit', 'web', '2021-01-19 09:08:55', '2021-01-19 09:08:55'),
(133, 'categories.update', 'web', '2021-01-19 09:08:56', '2021-01-19 09:08:56'),
(134, 'categories.destroy', 'web', '2021-01-19 09:08:56', '2021-01-19 09:08:56'),
(135, 'optionGroups.index', 'web', '2021-01-22 14:48:32', '2021-01-22 14:48:32'),
(136, 'optionGroups.create', 'web', '2021-01-22 14:48:32', '2021-01-22 14:48:32'),
(137, 'optionGroups.store', 'web', '2021-01-22 14:48:32', '2021-01-22 14:48:32'),
(138, 'optionGroups.edit', 'web', '2021-01-22 14:48:32', '2021-01-22 14:48:32'),
(139, 'optionGroups.update', 'web', '2021-01-22 14:48:32', '2021-01-22 14:48:32'),
(140, 'optionGroups.destroy', 'web', '2021-01-22 14:48:32', '2021-01-22 14:48:32'),
(141, 'options.index', 'web', '2021-01-22 15:10:51', '2021-01-22 15:10:51'),
(142, 'options.create', 'web', '2021-01-22 15:10:51', '2021-01-22 15:10:51'),
(143, 'options.store', 'web', '2021-01-22 15:10:52', '2021-01-22 15:10:52'),
(144, 'options.edit', 'web', '2021-01-22 15:10:52', '2021-01-22 15:10:52'),
(145, 'options.update', 'web', '2021-01-22 15:10:52', '2021-01-22 15:10:52'),
(146, 'options.destroy', 'web', '2021-01-22 15:10:52', '2021-01-22 15:10:52'),
(147, 'favorites.index', 'web', '2021-01-22 16:01:13', '2021-01-22 16:01:13'),
(148, 'favorites.create', 'web', '2021-01-22 16:01:13', '2021-01-22 16:01:13'),
(149, 'favorites.store', 'web', '2021-01-22 16:01:13', '2021-01-22 16:01:13'),
(150, 'favorites.edit', 'web', '2021-01-22 16:01:13', '2021-01-22 16:01:13'),
(151, 'favorites.update', 'web', '2021-01-22 16:01:13', '2021-01-22 16:01:13'),
(152, 'favorites.destroy', 'web', '2021-01-22 16:01:13', '2021-01-22 16:01:13'),
(153, 'eServiceReviews.index', 'web', '2021-01-23 14:42:57', '2021-01-23 14:42:57'),
(154, 'eServiceReviews.create', 'web', '2021-01-23 14:42:58', '2021-01-23 14:42:58'),
(155, 'eServiceReviews.store', 'web', '2021-01-23 14:42:58', '2021-01-23 14:42:58'),
(156, 'eServiceReviews.edit', 'web', '2021-01-23 14:42:58', '2021-01-23 14:42:58'),
(157, 'eServiceReviews.update', 'web', '2021-01-23 14:42:58', '2021-01-23 14:42:58'),
(158, 'eServiceReviews.destroy', 'web', '2021-01-23 14:42:58', '2021-01-23 14:42:58'),
(160, 'galleries.index', 'web', '2021-01-23 15:17:46', '2021-01-23 15:17:46'),
(161, 'galleries.create', 'web', '2021-01-23 15:17:47', '2021-01-23 15:17:47'),
(162, 'galleries.store', 'web', '2021-01-23 15:17:47', '2021-01-23 15:17:47'),
(163, 'galleries.edit', 'web', '2021-01-23 15:17:47', '2021-01-23 15:17:47'),
(164, 'galleries.update', 'web', '2021-01-23 15:17:47', '2021-01-23 15:17:47'),
(165, 'galleries.destroy', 'web', '2021-01-23 15:17:47', '2021-01-23 15:17:47'),
(166, 'requestedEProviders.index', 'web', '2021-01-25 04:53:17', '2021-01-25 04:53:17'),
(167, 'slides.index', 'web', '2021-01-25 06:01:20', '2021-01-25 06:01:20'),
(168, 'slides.create', 'web', '2021-01-25 06:01:20', '2021-01-25 06:01:20'),
(169, 'slides.store', 'web', '2021-01-25 06:01:20', '2021-01-25 06:01:20'),
(170, 'slides.edit', 'web', '2021-01-25 06:01:20', '2021-01-25 06:01:20'),
(171, 'slides.update', 'web', '2021-01-25 06:01:20', '2021-01-25 06:01:20'),
(172, 'slides.destroy', 'web', '2021-01-25 06:01:20', '2021-01-25 06:01:20'),
(173, 'notifications.index', 'web', '2021-01-25 10:42:33', '2021-01-25 10:42:33'),
(174, 'notifications.show', 'web', '2021-01-25 10:42:34', '2021-01-25 10:42:34'),
(175, 'notifications.destroy', 'web', '2021-01-25 10:42:34', '2021-01-25 10:42:34'),
(176, 'coupons.index', 'web', '2021-01-25 11:11:55', '2021-01-25 11:11:55'),
(177, 'coupons.create', 'web', '2021-01-25 11:11:55', '2021-01-25 11:11:55'),
(178, 'coupons.store', 'web', '2021-01-25 11:11:55', '2021-01-25 11:11:55'),
(179, 'coupons.edit', 'web', '2021-01-25 11:11:55', '2021-01-25 11:11:55'),
(180, 'coupons.update', 'web', '2021-01-25 11:11:55', '2021-01-25 11:11:55'),
(181, 'coupons.destroy', 'web', '2021-01-25 11:11:55', '2021-01-25 11:11:55'),
(182, 'bookingStatuses.index', 'web', '2021-01-25 14:21:01', '2021-01-25 14:21:01'),
(183, 'bookingStatuses.create', 'web', '2021-01-25 14:21:01', '2021-01-25 14:21:01'),
(184, 'bookingStatuses.store', 'web', '2021-01-25 14:21:01', '2021-01-25 14:21:01'),
(185, 'bookingStatuses.edit', 'web', '2021-01-25 14:21:01', '2021-01-25 14:21:01'),
(186, 'bookingStatuses.update', 'web', '2021-01-25 14:21:01', '2021-01-25 14:21:01'),
(187, 'bookingStatuses.destroy', 'web', '2021-01-25 14:21:01', '2021-01-25 14:21:01'),
(188, 'bookings.index', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(189, 'bookings.create', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(190, 'bookings.store', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(191, 'bookings.show', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(192, 'bookings.edit', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(193, 'bookings.update', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(194, 'bookings.destroy', 'web', '2021-01-25 16:27:09', '2021-01-25 16:27:09'),
(195, 'eProviderPayouts.index', 'web', '2021-01-30 06:23:08', '2021-01-30 06:23:08'),
(196, 'eProviderPayouts.create', 'web', '2021-01-30 06:23:08', '2021-01-30 06:23:08'),
(197, 'eProviderPayouts.store', 'web', '2021-01-30 06:23:08', '2021-01-30 06:23:08'),
(198, 'eProviderPayouts.destroy', 'web', '2021-01-30 06:23:09', '2021-01-30 06:23:09'),
(199, 'earnings.index', 'web', '2021-01-30 08:57:57', '2021-01-30 08:57:57'),
(200, 'earnings.create', 'web', '2021-01-30 08:57:57', '2021-01-30 08:57:57'),
(201, 'earnings.store', 'web', '2021-01-30 08:57:57', '2021-01-30 08:57:57'),
(202, 'earnings.destroy', 'web', '2021-01-30 08:57:57', '2021-01-30 08:57:57'),
(203, 'customPages.index', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(204, 'customPages.create', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(205, 'customPages.store', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(206, 'customPages.show', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(207, 'customPages.edit', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(208, 'customPages.update', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(209, 'customPages.destroy', 'web', '2021-02-24 06:37:44', '2021-02-24 06:37:44'),
(213, 'countries.index', 'web', '2021-03-20 14:01:43', '2021-03-20 14:01:43'),
(214, 'countries.create', 'web', '2021-03-22 03:52:45', '2021-03-22 03:52:45'),
(215, 'countries.store', 'web', '2021-03-22 04:15:30', '2021-03-22 04:15:30'),
(216, 'countries.update', 'web', '2021-03-22 07:38:13', '2021-03-22 07:38:13'),
(217, 'countries.edit', 'web', '2021-03-22 07:38:34', '2021-03-22 07:38:34'),
(218, 'countries.destroy', 'web', '2021-03-22 07:39:11', '2021-03-22 07:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `default` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `default`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'web', 0, NULL, NULL),
(3, 'provider', 'web', 0, NULL, NULL),
(4, 'customer', 'web', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(3, 3),
(3, 4),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(9, 3),
(10, 2),
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(42, 4),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(48, 3),
(48, 4),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(54, 3),
(55, 2),
(56, 2),
(57, 2),
(57, 3),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(73, 3),
(74, 2),
(75, 2),
(75, 3),
(76, 2),
(76, 3),
(77, 2),
(78, 2),
(78, 3),
(79, 2),
(79, 3),
(80, 2),
(80, 3),
(81, 2),
(82, 2),
(82, 3),
(83, 2),
(83, 3),
(84, 2),
(85, 2),
(85, 3),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(98, 3),
(99, 2),
(99, 3),
(100, 2),
(100, 3),
(101, 2),
(101, 3),
(102, 2),
(102, 3),
(103, 2),
(104, 2),
(104, 3),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(116, 3),
(117, 2),
(118, 2),
(118, 3),
(119, 2),
(120, 2),
(120, 3),
(121, 2),
(121, 3),
(122, 2),
(122, 3),
(123, 2),
(123, 3),
(124, 2),
(124, 3),
(126, 2),
(126, 3),
(127, 2),
(127, 3),
(128, 2),
(128, 3),
(129, 2),
(130, 2),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(135, 2),
(135, 3),
(136, 2),
(137, 2),
(137, 3),
(138, 2),
(138, 3),
(139, 2),
(139, 3),
(140, 2),
(140, 3),
(141, 2),
(141, 3),
(142, 2),
(142, 3),
(143, 2),
(143, 3),
(144, 2),
(144, 3),
(145, 2),
(145, 3),
(146, 2),
(146, 3),
(147, 2),
(148, 2),
(149, 2),
(149, 3),
(150, 2),
(150, 3),
(151, 2),
(151, 3),
(152, 2),
(153, 2),
(153, 3),
(154, 2),
(155, 2),
(156, 2),
(157, 2),
(158, 2),
(160, 2),
(161, 2),
(161, 3),
(162, 2),
(162, 3),
(163, 2),
(163, 3),
(164, 2),
(165, 2),
(165, 3),
(166, 2),
(166, 3),
(167, 2),
(168, 2),
(169, 2),
(170, 2),
(171, 2),
(172, 2),
(173, 2),
(173, 3),
(174, 2),
(175, 2),
(175, 3),
(176, 2),
(176, 3),
(177, 2),
(178, 2),
(179, 2),
(180, 2),
(180, 3),
(181, 2),
(182, 2),
(182, 3),
(183, 2),
(184, 2),
(185, 2),
(186, 2),
(187, 2),
(188, 2),
(188, 3),
(188, 4),
(189, 2),
(190, 2),
(191, 2),
(192, 2),
(192, 3),
(193, 2),
(193, 3),
(194, 2),
(195, 2),
(195, 3),
(196, 2),
(196, 3),
(197, 2),
(198, 2),
(199, 2),
(199, 3),
(200, 2),
(203, 2),
(203, 3),
(204, 2),
(205, 2),
(206, 2),
(207, 2),
(208, 2),
(209, 2),
(213, 2),
(214, 2),
(215, 2),
(216, 2),
(217, 2),
(218, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED DEFAULT 0,
  `text` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'start',
  `text_color` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicator_color` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_fit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'cover',
  `e_service_id` int(10) UNSIGNED DEFAULT NULL,
  `e_provider_id` int(10) UNSIGNED DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `order`, `text`, `button`, `text_position`, `text_color`, `button_color`, `background_color`, `indicator_color`, `image_fit`, `e_service_id`, `e_provider_id`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 1, 'Assign a Handyman at Work to Fix the Household', 'Discover It', 'bottom_start', '#333333', '#009E6A', '#FFFFFF', '#333333', 'cover', NULL, NULL, 1, '2021-01-25 06:51:45', '2021-01-31 06:08:13'),
(2, 2, 'Fix the Broken Stuff by Asking for the Technicians', 'Repair', 'bottom_start', '#333333', '#F4841F', '#FFFFFF', '#333333', 'cover', NULL, NULL, 1, '2021-01-25 09:23:49', '2021-01-31 06:03:05'),
(3, 3, 'Add Hands to Your Cleaning Chores', 'Book Now', 'bottom_start', '#333333', '#1FA3F4', '#FFFFFF', '#333333', 'cover', NULL, NULL, 1, '2021-01-31 06:04:36', '2021-01-31 06:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(10,2) NOT NULL DEFAULT 0.00,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Tax 20', 20.00, 'percent', '2021-01-15 06:12:13', '2021-02-01 16:23:01'),
(2, 'Tax 10', 10.00, 'percent', '2021-01-15 06:19:30', '2021-01-15 06:19:30'),
(3, 'Maintenance', 2.00, 'fixed', '2021-01-18 15:48:29', '2021-02-01 16:25:13'),
(4, 'Tools Fee', 5.00, 'fixed', '2021-02-01 16:24:12', '2021-02-01 16:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `uuid`, `created_at`, `updated_at`) VALUES
(4, '6400928c-845b-4a83-9574-1b9c364d1bbc', '2021-03-23 18:00:32', '2021-03-23 18:00:32'),
(5, '72e9321e-cfa6-47dd-ab98-d36dca14d644', '2021-03-23 22:56:54', '2021-03-23 22:56:54'),
(10, '1336d67a-83ab-43d3-8cf8-36a734ed69d1', '2021-03-23 23:30:20', '2021-03-23 23:30:20'),
(11, 'fc6c0c85-5805-491e-8b87-85a7aadb2ef2', '2021-03-23 23:36:26', '2021-03-23 23:36:26'),
(12, 'aa57e631-0a25-402a-a212-f173c9969f92', '2021-03-23 23:47:38', '2021-03-23 23:47:38'),
(13, '75bcfeaa-e195-4d61-a510-29c654d08da3', '2021-03-23 23:49:19', '2021-03-23 23:49:19'),
(14, '6ba30ce9-dc53-48f2-bbbb-847c531229bf', '2021-03-23 23:52:44', '2021-03-23 23:52:44'),
(15, '78f67312-6821-4c4a-916a-d26457d193c8', '2021-03-23 23:55:15', '2021-03-23 23:55:15'),
(16, '80c38766-ac50-4149-b700-61d2050c69e1', '2021-03-24 00:04:01', '2021-03-24 00:04:01'),
(17, '7e803dc5-9863-48aa-8816-417183edb6fd', '2021-03-24 00:09:50', '2021-03-24 00:09:50'),
(18, '0e60418b-cacf-4beb-a907-1409f17accc4', '2021-03-24 00:12:26', '2021-03-24 00:12:26'),
(19, 'b60cb470-0a0a-4e64-9bc1-56a5f2c97069', '2021-03-24 00:15:20', '2021-03-24 00:15:20'),
(20, '8449688a-5b07-439e-a0e4-0d755ce000eb', '2021-03-24 00:25:51', '2021-03-24 00:25:51'),
(21, 'f15219b1-9ed8-43ae-a178-9c12a990f301', '2021-03-24 00:35:25', '2021-03-24 00:35:25'),
(22, '441d7339-ca38-41e6-80b3-9d9e15f2d8c7', '2021-03-24 00:38:44', '2021-03-24 00:38:44'),
(23, '46efcd22-f417-4eab-a7fc-df0a520f33d5', '2021-03-24 00:48:59', '2021-03-24 00:48:59'),
(24, '3d82aadd-2e11-45bd-85d1-4a3659069b35', '2021-03-24 00:54:49', '2021-03-24 00:54:49'),
(25, '7fb01e25-6f65-4bff-84ab-bbcb72d7d877', '2021-03-24 00:58:01', '2021-03-24 00:58:01'),
(26, 'eee8d8f6-f89b-41d2-86db-aca13614233d', '2021-03-24 01:04:31', '2021-03-24 01:04:31'),
(27, '171f6401-9ba5-4555-93f8-afaf505575a0', '2021-03-24 01:12:39', '2021-03-24 01:12:39'),
(28, '4bfee762-8f9e-4c77-85a1-146b8fbc24e6', '2021-03-24 01:17:35', '2021-03-24 01:17:35'),
(29, '50b398bb-c2fb-4d55-9f42-af3f4109ffdc', '2021-03-24 01:29:12', '2021-03-24 01:29:12'),
(30, '5f19d151-5ee5-4ba7-b718-463b08cde4cd', '2021-03-24 01:31:03', '2021-03-24 01:31:03'),
(31, 'ecfb681d-dceb-4044-99c7-38b4465bebd1', '2021-03-24 01:34:36', '2021-03-24 01:34:36'),
(32, 'f3c2464b-53a8-4ac6-9395-58218d581f09', '2021-03-24 01:37:48', '2021-03-24 01:37:48'),
(33, '043d082c-b394-4b49-8b17-efd6b98ff475', '2021-03-24 01:48:11', '2021-03-24 01:48:11'),
(34, 'bd1e44ac-6314-4ce4-9cb1-a871c5bbc125', '2021-03-24 01:54:11', '2021-03-24 01:54:11'),
(35, 'e3dec0d6-a8a0-4295-afb3-2b0d90746b11', '2021-03-24 01:58:14', '2021-03-24 01:58:14'),
(36, '13d65ffc-0927-4e72-9d46-6b22be318076', '2021-03-24 02:00:27', '2021-03-24 02:00:27'),
(37, '7663c43e-7fda-4fcb-acd0-fbd242faab8f', '2021-03-24 02:02:36', '2021-03-24 02:02:36'),
(38, '003209c2-05b7-4774-89d1-0405c92957b8', '2021-03-24 02:05:17', '2021-03-24 02:05:17'),
(39, '6f6b6157-7d9f-470e-9a7c-fbd7d0d71e45', '2021-03-24 02:07:37', '2021-03-24 02:07:37'),
(40, '859eed74-fc30-4cf3-8f15-01c799a2644c', '2021-03-24 02:12:04', '2021-03-24 02:12:04'),
(41, '1d7df65e-e2d4-42c5-b239-db9cc6616079', '2021-03-24 02:29:12', '2021-03-24 02:29:12'),
(42, '5bf88f22-312a-4bfe-854f-97af25db1e64', '2021-03-24 02:39:34', '2021-03-24 02:39:34'),
(43, '22db0f9c-cd48-49ef-86c2-2da2bbc077eb', '2021-03-24 02:42:41', '2021-03-24 02:42:41'),
(44, 'ab811a8f-d986-4732-8566-83416e6e1ff9', '2021-03-24 02:57:12', '2021-03-24 02:57:12'),
(45, '80db3c9c-cbed-46d4-8df8-dae5594f2b01', '2021-03-24 02:59:44', '2021-03-24 02:59:44'),
(46, 'b282b43c-4335-4b14-9cb7-cf68d120a40c', '2021-03-24 03:00:08', '2021-03-24 03:00:08'),
(47, '18f7228d-c9f6-46c7-bcb0-b87dcd1ccd87', '2021-03-24 03:00:30', '2021-03-24 03:00:30'),
(48, '36a857b0-8dc1-42d4-931d-99bf4f489b3e', '2021-03-24 03:26:28', '2021-03-24 03:26:28'),
(49, '19c81fe8-7ee6-4b3c-9bd1-c89bc6b43524', '2021-03-24 03:29:28', '2021-03-24 03:29:28'),
(50, '387328df-66c0-4a21-a0c9-e83b48c48436', '2021-03-24 11:05:56', '2021-03-24 11:05:56'),
(51, 'ed052b9e-0063-4673-9461-3cd68dcdbb72', '2021-03-24 11:54:12', '2021-03-24 11:54:12'),
(52, '59e979e3-8e34-4643-89c7-6ef86c8ac7ae', '2021-03-24 11:54:39', '2021-03-24 11:54:39'),
(53, '3d07b632-6ab5-4afc-9b5b-497ba7b138c8', '2021-03-24 11:55:00', '2021-03-24 11:55:00'),
(54, 'f16bbf25-b3af-48c5-8109-f68ef677092c', '2021-03-24 11:55:43', '2021-03-24 11:55:43'),
(55, '346464eb-676a-4e20-bd7c-d37011e6bcfe', '2021-03-24 11:56:20', '2021-03-24 11:56:20'),
(56, '6902762c-51e7-4667-84c2-a6059b660781', '2021-03-24 11:56:42', '2021-03-24 11:56:42'),
(57, '72213cc0-f33c-4b8d-98d1-0ab3fe751537', '2021-03-24 11:57:15', '2021-03-24 11:57:15'),
(58, '7b87390a-2119-46ee-9723-4e6c44d48ba4', '2021-03-24 11:58:28', '2021-03-24 11:58:28'),
(59, 'b8349852-57d5-4ca0-b63d-cdd4721ce61e', '2021-03-24 11:58:56', '2021-03-24 11:58:56'),
(60, 'd57309aa-e79e-4a4f-a30a-e16eb0103bd6', '2021-03-24 11:59:18', '2021-03-24 11:59:18'),
(61, '66b8c63c-2a4a-4f7c-a204-ce0079c03761', '2021-03-24 12:00:03', '2021-03-24 12:00:03'),
(62, 'd3cebf85-e0c6-4f30-b509-192e0c7cf0c6', '2021-03-24 12:00:30', '2021-03-24 12:00:30'),
(63, '00c25a0b-d3f3-452c-bb22-0812226ce156', '2021-03-24 12:01:05', '2021-03-24 12:01:05'),
(64, 'c4281fa4-7a82-48f1-bf67-f000e96f4588', '2021-03-24 12:02:37', '2021-03-24 12:02:37'),
(65, '9b698b59-e29d-474a-8e6b-2a0dcb0a0ad3', '2021-03-24 12:03:21', '2021-03-24 12:03:21'),
(66, '5e1ba555-a1e3-4bb4-b7cd-ec01e006d64b', '2021-03-24 12:03:58', '2021-03-24 12:03:58'),
(67, 'e1cc3502-068d-4c3d-ad63-69b24ee9829c', '2021-03-24 12:36:36', '2021-03-24 12:36:36'),
(68, '5247c792-87c9-4359-b98e-82487ffc986a', '2021-03-24 12:38:01', '2021-03-24 12:38:01'),
(69, 'aea6931b-60a0-481b-bcdc-243a1f2a5274', '2021-03-24 12:40:41', '2021-03-24 12:40:41'),
(70, '19f67697-b695-4936-92b5-c29d79bec139', '2021-03-24 12:41:46', '2021-03-24 12:41:46'),
(71, 'b1bf39f5-d2f3-4871-9266-ed6b9ec41413', '2021-03-24 12:45:38', '2021-03-24 12:45:38'),
(72, '058cb44d-b0b6-454e-b035-c66cadb504a3', '2021-03-24 12:46:30', '2021-03-24 12:46:30'),
(73, 'b0e2d8df-f35c-48d8-8d02-0e018a2c9b21', '2021-03-24 12:48:13', '2021-03-24 12:48:13'),
(74, 'bea77073-5134-42a6-80ba-ad6858b01dc1', '2021-03-24 12:49:54', '2021-03-24 12:49:54'),
(75, 'fe2dcfce-4c47-4f8a-8fac-f4731ccee98d', '2021-03-24 12:58:32', '2021-03-24 12:58:32'),
(76, '71b42db5-1571-4abf-a016-6f22431af2ea', '2021-03-24 12:59:07', '2021-03-24 12:59:07'),
(77, 'f1c3f5d0-3373-415a-943e-fc63cccba45a', '2021-03-24 12:59:24', '2021-03-24 12:59:24'),
(78, '4962f362-8742-4c5a-ab49-9910cc731c63', '2021-03-24 13:07:04', '2021-03-24 13:07:04'),
(79, '955e3314-9d2f-4cb2-abf9-5b6b61e7ca6b', '2021-03-24 13:07:26', '2021-03-24 13:07:26'),
(80, '9a9ab3eb-250d-4efa-9ed8-64e3c070f78a', '2021-03-24 13:17:47', '2021-03-24 13:17:47'),
(81, '130e615c-7a2a-41a0-bc01-b3b0bf43957e', '2021-03-24 13:18:13', '2021-03-24 13:18:13'),
(82, '36546bca-9ddc-47b9-a0d6-5a07624abf39', '2021-03-24 13:18:25', '2021-03-24 13:18:25'),
(83, 'a49fe19d-8d3e-48e9-8653-1e72fd2ce34c', '2021-03-24 13:18:41', '2021-03-24 13:18:41'),
(84, '28f3bf36-e0ef-4f12-b3b6-615428790126', '2021-03-24 13:36:17', '2021-03-24 13:36:17'),
(85, '3fb1d281-8851-4243-ba25-8f833abbdecc', '2021-03-24 13:36:35', '2021-03-24 13:36:35'),
(86, 'd46a87d1-29d7-44d7-b846-a5d206f0ca8c', '2021-03-24 13:40:23', '2021-03-24 13:40:23'),
(87, '4950dd0c-535d-4dcd-a2fc-bded36bb51c0', '2021-03-24 13:45:21', '2021-03-24 13:45:21'),
(88, '3148906d-283a-495a-8db4-45c1f7d5b86c', '2021-03-24 13:47:05', '2021-03-24 13:47:05'),
(89, '563c2362-f924-43a3-a36b-818bc02800d8', '2021-03-24 13:48:37', '2021-03-24 13:48:37'),
(90, '27ed4b2a-0669-453b-98a4-fa5b5920e3f6', '2021-03-24 13:53:21', '2021-03-24 13:53:21'),
(91, '4a430fc7-8827-4984-8d14-59d1360d70c2', '2021-03-24 14:03:11', '2021-03-24 14:03:11'),
(92, '49ec0d56-e25a-4fc7-9991-12721f206187', '2021-03-24 14:15:52', '2021-03-24 14:15:52'),
(93, '17d56b2b-3504-4a92-94b9-44d77073ddfa', '2021-03-24 14:29:52', '2021-03-24 14:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `phone_verified_at`, `email_verified_at`, `password`, `api_token`, `device_token`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `paypal_email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hyatt Zimmerman', 'admin@demo.com', '+1 234 8996 321', '2021-01-10 12:22:10', '2021-01-10 12:22:10', '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu', 'PivvPlsQWxPl1bB5KrbKNBuraJit0PrUZekQUgtLyTRuyBq921atFtoR1HuA', '', NULL, NULL, NULL, NULL, NULL, 'QIjN6w3afj13uBJjzOrU6yL888Amcyqlhjimkm31LKur21mc3BiqqYTcddhX', NULL, '2021-02-09 11:50:32'),
(2, 'Jennifer Paul', 'provider@demo.com', '+1 234 8996 322', '2021-01-10 12:22:10', '2021-01-10 12:22:10', '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu', 'tVSfIKRSX2Yn8iAMoUS3HPls84ycS8NAxO2dj2HvePbbr4WHorp4gIFRmFwB', '', NULL, NULL, NULL, NULL, NULL, 'laZPBqpRIpfKUeQMRkX3shX1gu7vLVSGIY7dJNnqVjIuy2zqW4Rf50ctajDU', NULL, '2021-02-28 12:06:55'),
(3, 'Germaine Guzman', 'customer@demo.com', '+1 234 8996 323', '2021-01-10 12:22:10', '2021-01-10 12:22:10', '$2y$10$EBubVy3wDbqNbHvMQwkj3OTYVitL8QnHvh/zV0ICVOaSbALy5dD0K', 'fXLu7VeYgXDu82SkMxlLPG1mCAXc4EBIx6O5isgYVIKFQiHah0xiOHmzNsBv', '', NULL, NULL, NULL, NULL, NULL, 'SPz6luq3aoxCbgIS1gqmFDgM1qzGlIDtF0HgmDbtWcx2reaeFcogcFQzdP2F', NULL, '2021-02-24 16:52:57'),
(4, 'Aimee Mcgee', 'provider1@demo.com', '+1 234 8996 324', '2021-01-10 12:22:10', '2021-01-10 12:22:10', '$2y$10$pmdnepS1FhZUMqOaFIFnNO0spltJpziz3j13UqyEwShmLhokmuoei', 'Czrsk9rwD0c75NUPkzNXM2WvbxYHKj8p0nG29pjKT0PZaTgMVzuVyv4hOlte', '', NULL, NULL, NULL, NULL, NULL, 'yCzPqDP1oczySU57q6G71SxTIJSiZUBE4vYdXbXCqzpzC2iN09igcs3jzSQK', NULL, '2021-02-21 09:50:29'),
(5, 'Josephine Harding', 'customer3@demo.com', NULL, NULL, NULL, '$2y$10$n/06hZG121ZGp3tSwDQS3uhsQKxEYspjKrn7kGlLxRinUZKiulrEm', 'gkEWScQHIol9EIRhP3m5m7JqnK5UvcGdEsKQJo7YeBcQawYFq3JAJ6SX9UKy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-11 05:55:52', '2021-02-02 06:29:47'),
(6, 'Nicolette Christiansen', 'provider2@demo.com', NULL, NULL, '2021-01-10 19:00:00', '$2y$04$WRpHC9iMxZ3f.gctQ4igsuZjsYfGjX7igVM8GsC2AMME3.4au3dYu', 'TKArYDDFHNiEI33sfExaBEhxHCs5kFaWP7EO6aNlUZfnqHrvsMCwsYeAk9s2', NULL, NULL, NULL, NULL, NULL, NULL, 'JbiYaHlRWGKkfITxH9qI87GzTMPf0zJ2Iw6NIdlS5dDvWuT5PC2sP5ELGwKx', '2021-01-11 06:33:59', '2021-02-02 06:30:56'),
(7, 'Rose Bauer', 'customer2@demo.com', NULL, NULL, NULL, '$2y$10$3GhoIShzRdSXevYAh1NF/.67J3OshX9D2.sqY50o8kxh7EXPw7tuC', 'w6QJYqZyllY24AIR3nSsKqgj5eMSZevmgpSywwxJxUS9nwULcuriRLBxEXZC', '', NULL, NULL, NULL, NULL, NULL, 'WxYP9zjTBy9SYF5OWjcFbMt2Ob9r0bahBKzPDOtw9OrAJ89JqaMxkN5aqu8J', '2021-01-17 11:13:24', '2021-02-28 13:03:25'),
(8, 'smarter8', 'smartersvision@gmail.com', '+12645595482', NULL, NULL, '$2y$10$MqPMTfg6RUNxxEH6aLdqnOYZUBsT7xtxkglD74pDgThV52.HJrLba', 'WivbG2oAEbEGl51EBeBuHaZeCqyfBnCVGo18nSaj2FwwiDjux2ZOAZWUoddK', '', NULL, NULL, NULL, NULL, NULL, 'SdstZCaeYW0pjqZn832HMzBD7WPGJ5m9hwWG28nhbIrzSS0etj33rbTRJ6kD', '2021-02-10 06:31:12', '2021-02-23 15:41:50'),
(9, 'Ezekiel Kwenda', 'kwenda0@gmail.com', NULL, NULL, NULL, '$2y$10$M0qjyc2oCe.RJGCcO/oWauYngiYTZK30G5xETq6l4eN/LJxleTgYq', 'gY9yGHSJ8oG9rIFhBOVVgIZeBxuXP5x8dFfsngAQNJCwMGHVBCEDl4FNl46T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-26 00:29:22', '2021-03-26 00:29:22'),
(10, 'Randy', 'imadehimvirall@gmail.com', '+8562093601301', '1991-12-11 18:41:41', NULL, '$2y$10$WHdpbr2LTzEHUDcX48kH7ezewP3XII6CDLj/bBgqWf48d3z4rzzK6', '3jczlkThsRHjJngNs6TCn2snFCVUZwaq9cZMN76rfL3K0NMH51IKQN2wAA1k', '', NULL, NULL, NULL, NULL, NULL, 'kK9B5nuUjTnBPkomBpmzsAoRWuHUBIrynKJe5UppN4AVbcasnBs1djNiDxmV', '2021-03-29 01:56:06', '2021-03-29 01:56:06'),
(12, 'Randy', 'iimadehimviral@gmail.com', '+8562093108452', NULL, NULL, '$2y$10$vTJYgL9YQk7qgRpdON6yGONUqXYnLCIAthnOba6l5ay3GTGeN2R2O', 'rxr4Ta0y3jLz5R65g3ql8jtmSQplL0iod5Tk36Thcmfl33YBdKkwdlTBRYM5', 'dhL3YIODTimxg1TLl7Y6Vd:APA91bGQZw1NVgHpQdHtyGTJjVcmFfPw-76gDgnx9xHMDT5PcPytlJpDVppesHsq6gklKgcryFrdlTYz_yzwTY8bXjr5EhP0nd2Us_jGiTUaPyk-31IcUo-wVqVim71ZTaUP9YA9FKRd', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 20:41:18', '2021-04-03 20:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_settings_key_index` (`key`);

--
-- Indexes for table `availability_hours`
--
ALTER TABLE `availability_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `availability_hours_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_booking_status_id_foreign` (`booking_status_id`),
  ADD KEY `bookings_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `booking_statuses`
--
ALTER TABLE `booking_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_values_custom_field_id_foreign` (`custom_field_id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discountables`
--
ALTER TABLE `discountables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discountables_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `earnings_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `e_providers`
--
ALTER TABLE `e_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_providers_e_provider_type_id_foreign` (`e_provider_type_id`);

--
-- Indexes for table `e_provider_addresses`
--
ALTER TABLE `e_provider_addresses`
  ADD PRIMARY KEY (`e_provider_id`,`address_id`),
  ADD KEY `e_provider_addresses_address_id_foreign` (`address_id`);

--
-- Indexes for table `e_provider_payouts`
--
ALTER TABLE `e_provider_payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_provider_payouts_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `e_provider_taxes`
--
ALTER TABLE `e_provider_taxes`
  ADD PRIMARY KEY (`e_provider_id`,`tax_id`),
  ADD KEY `e_provider_taxes_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `e_provider_types`
--
ALTER TABLE `e_provider_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_provider_users`
--
ALTER TABLE `e_provider_users`
  ADD PRIMARY KEY (`user_id`,`e_provider_id`),
  ADD KEY `e_provider_users_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `e_services`
--
ALTER TABLE `e_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_services_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `e_service_categories`
--
ALTER TABLE `e_service_categories`
  ADD PRIMARY KEY (`e_service_id`,`category_id`),
  ADD KEY `e_service_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `e_service_reviews`
--
ALTER TABLE `e_service_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_service_reviews_user_id_foreign` (`user_id`),
  ADD KEY `e_service_reviews_e_service_id_foreign` (`e_service_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_faq_category_id_foreign` (`faq_category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_e_service_id_foreign` (`e_service_id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `favorite_options`
--
ALTER TABLE `favorite_options`
  ADD PRIMARY KEY (`option_id`,`favorite_id`),
  ADD KEY `favorite_options_favorite_id_foreign` (`favorite_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_e_service_id_foreign` (`e_service_id`),
  ADD KEY `options_option_group_id_foreign` (`option_group_id`);

--
-- Indexes for table `option_groups`
--
ALTER TABLE `option_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `payments_payment_status_id_foreign` (`payment_status_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_e_service_id_foreign` (`e_service_id`),
  ADD KEY `slides_e_provider_id_foreign` (`e_provider_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `availability_hours`
--
ALTER TABLE `availability_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_statuses`
--
ALTER TABLE `booking_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discountables`
--
ALTER TABLE `discountables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `e_providers`
--
ALTER TABLE `e_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `e_provider_payouts`
--
ALTER TABLE `e_provider_payouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_provider_types`
--
ALTER TABLE `e_provider_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `e_services`
--
ALTER TABLE `e_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `e_service_reviews`
--
ALTER TABLE `e_service_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `option_groups`
--
ALTER TABLE `option_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `availability_hours`
--
ALTER TABLE `availability_hours`
  ADD CONSTRAINT `availability_hours_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_booking_status_id_foreign` FOREIGN KEY (`booking_status_id`) REFERENCES `booking_statuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD CONSTRAINT `custom_field_values_custom_field_id_foreign` FOREIGN KEY (`custom_field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discountables`
--
ALTER TABLE `discountables`
  ADD CONSTRAINT `discountables_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `earnings`
--
ALTER TABLE `earnings`
  ADD CONSTRAINT `earnings_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_providers`
--
ALTER TABLE `e_providers`
  ADD CONSTRAINT `e_providers_e_provider_type_id_foreign` FOREIGN KEY (`e_provider_type_id`) REFERENCES `e_provider_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_provider_addresses`
--
ALTER TABLE `e_provider_addresses`
  ADD CONSTRAINT `e_provider_addresses_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_provider_addresses_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_provider_payouts`
--
ALTER TABLE `e_provider_payouts`
  ADD CONSTRAINT `e_provider_payouts_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_provider_taxes`
--
ALTER TABLE `e_provider_taxes`
  ADD CONSTRAINT `e_provider_taxes_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_provider_taxes_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_provider_users`
--
ALTER TABLE `e_provider_users`
  ADD CONSTRAINT `e_provider_users_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_provider_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_services`
--
ALTER TABLE `e_services`
  ADD CONSTRAINT `e_services_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_service_categories`
--
ALTER TABLE `e_service_categories`
  ADD CONSTRAINT `e_service_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_service_categories_e_service_id_foreign` FOREIGN KEY (`e_service_id`) REFERENCES `e_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `e_service_reviews`
--
ALTER TABLE `e_service_reviews`
  ADD CONSTRAINT `e_service_reviews_e_service_id_foreign` FOREIGN KEY (`e_service_id`) REFERENCES `e_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_service_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_faq_category_id_foreign` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_e_service_id_foreign` FOREIGN KEY (`e_service_id`) REFERENCES `e_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_options`
--
ALTER TABLE `favorite_options`
  ADD CONSTRAINT `favorite_options_favorite_id_foreign` FOREIGN KEY (`favorite_id`) REFERENCES `favorites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_e_service_id_foreign` FOREIGN KEY (`e_service_id`) REFERENCES `e_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `options_option_group_id_foreign` FOREIGN KEY (`option_group_id`) REFERENCES `option_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_payment_status_id_foreign` FOREIGN KEY (`payment_status_id`) REFERENCES `payment_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_e_provider_id_foreign` FOREIGN KEY (`e_provider_id`) REFERENCES `e_providers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `slides_e_service_id_foreign` FOREIGN KEY (`e_service_id`) REFERENCES `e_services` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
