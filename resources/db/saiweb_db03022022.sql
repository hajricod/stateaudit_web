-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 03, 2022 at 02:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saiweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `title`, `title_en`, `url`, `sort`, `status`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 'مسقط', 'Muscat', 'https://goo.gl/maps/pfDcj4vWazvCbKvHA', 1, 1, '23.5682479', '58.6115334', '2022-01-05 05:03:15', '2022-01-05 05:51:46'),
(2, 'صحار', 'Sohar', 'https://goo.gl/maps/x6wWkRNh2Tmgn1ur9', 2, 1, '24.3223241', '56.6842339', '2022-01-05 05:13:25', '2022-01-05 05:13:25'),
(3, 'نزوى', 'Nizwa', 'https://goo.gl/maps/xFsSA1bGE7Dz97xAA', 3, 1, '22.8795015', '57.5377143', '2022-01-05 05:15:55', '2022-01-05 05:50:54'),
(5, 'البريمي', 'Al Buraimi', 'https://goo.gl/maps/u7xUSMT8tD6wTv1q9', 4, 1, '24.2590685,55', '55.7777351', '2022-01-06 00:19:00', '2022-01-06 00:19:00'),
(6, 'الرستاق', 'Rustaq', 'https://goo.gl/maps/pQdVJNZgKhoTA81K7', 5, 1, '23.3882324', '56.491363', '2022-01-06 00:23:40', '2022-01-06 00:23:40'),
(7, 'ابراء', 'Ibra', 'https://goo.gl/maps/DTSXJxMKu73U6bkU8', 6, 1, '22.8926773', '58.0344732', '2022-01-06 00:57:17', '2022-01-06 00:57:17'),
(8, 'صور', 'Sur', 'https://goo.gl/maps/xhFxNXKPEG6jcHRW9', 7, 1, '22.5894987', '59.5011777', '2022-01-06 01:01:36', '2022-01-06 01:01:36'),
(9, 'صلالة', 'Salalah', 'https://goo.gl/maps/Xd1svjzaBMrpxUou9', 8, 1, '17.0207226', '54.0872074', '2022-01-06 01:03:02', '2022-01-27 02:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attch1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attch2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attch3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attch4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_1` tinyint(1) NOT NULL,
  `question_2` tinyint(1) NOT NULL,
  `question_3` tinyint(1) NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `channel_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `id_number`, `phone`, `email`, `details`, `attch1`, `attch2`, `attch3`, `attch4`, `accused_party`, `question_1`, `question_2`, `question_3`, `type_id`, `status_id`, `channel_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'أحمد سالم الحجري', '4448881', '99874444', 'ahmmed@go.com', 'تجربة', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2020-11-17 05:18:39', '2021-12-29 01:39:05'),
(23, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2020-11-22 08:35:23', '2021-12-16 05:48:35'),
(25, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2020-11-22 08:35:23', '2022-01-27 01:54:05'),
(26, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2020-11-22 08:35:23', '2021-12-16 05:48:40'),
(27, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2020-11-22 08:35:23', '2021-12-16 05:48:43'),
(29, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2020-11-22 08:35:23', '2021-12-16 05:48:45'),
(30, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2020-11-22 08:35:23', '2021-12-16 05:48:48'),
(31, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2020-11-22 08:35:23', '2021-12-19 01:45:22'),
(32, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2020-11-22 08:35:23', '2021-12-16 05:48:51'),
(33, 'test', '123456', '8744458874', 'test@g.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2020-11-22 08:35:23', '2022-01-03 04:20:17'),
(57, 'Ahmed Al-hajri', '88447777', '95086017', 'a.hajri@gmail.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2020-12-09 05:56:35', '2022-01-03 04:19:34'),
(58, 'Ahmed Al-hajri', '12345678', '95086017', 'a.hajri89@gmail.com', 'test', 'mMkLvkAX5AONS0Fiwk4r93p7GGpgN9YRGV1RLfUD.png', NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2020-12-13 04:40:37', '2021-12-19 01:45:08'),
(59, 'AHMED AL-HAJRI', '4473169', '92182469', 'hajricod@gmail.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2021-02-17 06:25:20', '2022-01-03 04:19:38'),
(60, 'AHMED AL-HAJRI', '12345678', '92182469', 'hajricod@gmail.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 4, 1, NULL, '2021-02-21 05:18:12', '2021-12-16 05:48:14'),
(61, 'AHMED AL-HAJRI', '4473169', '92182469', 'hajricod@gmail.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2021-03-17 04:34:19', '2022-01-03 04:19:42'),
(62, 'Ahmed Al-hajri', '1234567', '12345678', 'a.hajri89@gmail.com', 'test', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2021-05-23 04:32:39', '2022-01-03 04:19:46'),
(65, 'سالم الحجري', '47711111', '98777777', 'test@gmail.com', 'تجربة إرسال بلاغ', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2021-09-09 02:28:29', '2021-12-29 01:38:31'),
(66, 'Ahmed Al-hajri', '12345678', '12345678', 'a.hajri89@gmail.com', 'htheherhe', NULL, NULL, NULL, NULL, '', 0, 0, 0, 1, 3, 1, NULL, '2021-10-10 06:00:14', '2022-01-03 04:18:46'),
(67, 'AHMED AL-HAJRI', '12345678', '+447492182469', 'hajricod@gmail.com', 'test', NULL, NULL, NULL, NULL, 'test', 1, 0, 0, 1, 3, 1, NULL, '2021-12-30 02:07:18', '2022-01-03 04:18:40'),
(71, 'AHMED AL-HAJRI', '12345678', '+447492182469', 'hajricod@gmail.com', 'test', 'xgtLWF2ohuYFgTKikYG8B0NA8a6ldyI1DNzq9Vcw.jpeg', NULL, '4BxwvJmGRVIEpQWkJSu0g1iphK24oYI3P4vS8vFG.pdf', NULL, 'test', 0, 0, 0, 1, 3, 1, NULL, '2022-01-03 04:21:46', '2022-01-03 04:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_channels`
--

CREATE TABLE `complaint_channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_channels`
--

INSERT INTO `complaint_channels` (`id`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'الموقع', 'Website', '2021-10-17 04:19:06', '2021-10-17 04:19:06'),
(2, 'الهاتف', 'Mobile', '2021-10-17 04:19:06', '2021-10-17 04:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_statuses`
--

CREATE TABLE `complaint_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_statuses`
--

INSERT INTO `complaint_statuses` (`id`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'جديد', 'New', '2021-10-17 05:00:48', '2021-10-17 05:00:48'),
(2, 'حُذف', 'Deleted', '2021-10-17 05:00:48', '2021-10-17 05:00:48'),
(3, 'ملغي', 'Canceled', '2021-12-16 09:47:48', '2021-12-16 09:47:48'),
(4, 'انتهى', 'Finished', '2021-12-16 09:47:48', '2021-12-16 09:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_types`
--

CREATE TABLE `complaint_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_types`
--

INSERT INTO `complaint_types` (`id`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'تجاوزات إدارية', 'Administrative Abuses', '2021-12-07 05:48:18', '2021-12-07 05:48:18'),
(2, 'تجاوزات مالية', 'Financial excesses', '2021-12-07 05:48:18', '2021-12-07 05:48:18'),
(3, 'تجاوزات إدارية ومالية', 'Administrative and financial irregularities', '2021-12-07 05:48:18', '2021-12-07 05:48:18'),
(4, 'عدم سلامة إسناد مناقصة', 'Inadequate bidding', '2021-12-07 05:48:18', '2021-12-07 05:48:18'),
(5, 'تظلمات موظفين', 'Employee grievances', '2021-12-07 05:48:18', '2021-12-07 05:48:18'),
(6, 'تعطيل مصالح المواطنين', 'Disrupting the interests of citizens', '2021-12-07 05:48:18', '2021-12-07 05:48:18'),
(7, 'سوء استغلال السلطة', 'Abuse of power', '2021-12-07 05:48:18', '2021-12-07 05:48:18');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_group_id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_group_id`, `rank`, `question`, `question_en`, `answer`, `answer_en`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'متى بدأت مسيرة الرقابة المالية في السلطنة؟', 'When did the audit journey begin in the Sultanate?', '<p>بدأت الرقابة المالية منذ مطلع النهضة المباركة في العام 1970، ومرت بالعديد من مراحل التطور على مستوى التبعية والتسمية والهيكل التنظيمي والقوانين والاختصاصات.</p>', '<p>The audit march started since the beginning of the blessed Renaissance in 1970. It went through several stages and developed at the dependency, naming, structure, laws and mandate levels.</p>', '2021-06-10 04:44:56', '2021-06-10 06:37:38'),
(2, 1, 2, 'أين يقع المقر الرئيسي للجهاز وأفرعه بالمحافظات؟', 'Where is the SAI headquarter and branches located?', '<p>المقر الرئيسي للجهاز يقع في محافظة مسقط بمنطقة البستان، وللجهاز ثمانية أفرع في كل من: صلالة وصحار ونزوى والرستاق والبريمي وصور وإبراء وعبري.</p>', '<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n<p>SAI headquarter is located in Muscat Governorate in Al Bustan, with other 8 offices in; Salalah, Sohar, Nizwa, Rustaq, Buraimi, Sur, Ibra and Ibri.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2021-06-10 05:12:45', '2021-06-10 06:47:56'),
(3, 2, 1, 'ما الجهات الخاضعة لرقابة الجهاز؟', 'What are the entities subject to SAI audit?', '<div>\r\n<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">1- وحدات الجهاز الإداري للدولة إلا ما استثني منها بنص خاص في مرسوم إنشائها.</span></p>\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">2- الهيئات والمؤسسات العامة وغيرها من الأشخاص الاعتبارية العامة.</span></p>\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">3- صناديق الاستثمار وصناديق التقاعد وأي صناديق حكومية أخرى.</span></p>\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">4- الشركات المملوكة للحكومة بالكامل أو تلك التي تساهم فيها، بنسبة تزيد على (40%) من رأسمالها، الجهات الخاضعة لرقابة الجهاز منفردة أو مجتمعة وتلك التي منحتها الحكومة امتياز استخدام مرفق عام أو مورد من موارد الثروة الطبيعية، والشركات والمؤسسات التي يتم التعاقد معها أو الترخيص لها بإدارة او تشغيل أي من الأموال العامة، وذلك دون الإخلال بأي أحكام خاصة قد تنص عليها القوانين والمراسيم السلطانية الصادرة بشأنها والاتفاقيات التي تبرم مع الحكومة تنفيذا لها. ولا تخل رقابة الجهاز بحق هذه الشركات في أن يكون لها مراقبو حسابات تعينهم الجمعية العامة وفقا لأحكام قانون الشركات التجارية.</span></p>\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">5- الأموال الخاصة التي تديرها أو تشرف عليها أي من الوحدات الخاضعة لرقابة الجهاز.</span></p>\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">6- الجهات غير الخاضعة لرقابة الجهاز، بناء على طلب تلك الجهات، إذا رأى الجهاز أن المصلحة العامة تقتضي ذلك.</span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<div style=\"text-align: right;\"><span style=\"color: #e03e2d;\">المادة رقم (20) من قانون الرقابة المالية والإدارية للدولة</span></div>', '<p style=\"text-align: justify;\">1.&nbsp;&nbsp;Units of the State Administrative Apparatus, unless exempted by a special provision in the decree of the establishment of the unit;</p>\r\n<p style=\"text-align: justify;\">2.&nbsp;&nbsp;Public authorities, establishments and other autonomous legal entities;</p>\r\n<p style=\"text-align: justify;\">3.&nbsp;&nbsp;Investment and pension funds as well as any other governmental funds;</p>\r\n<p style=\"text-align: justify;\">4.&nbsp;&nbsp;Companies fully owned by the government or those where government&rsquo;s shareholding-whether exclusively or collectively-is more than 40% of the share capital, the bodies to whom the government has granted a concession to exploit a public utility&nbsp; or natural resource, companies and establishments contracted or licensed to manage or operate any of the public funds without prejudice to any special provisions stipulated in the laws and Royal Decrees issued in this regard and the agreements entered into with the government and their implementation. The audit of SAI shall be without prejudice to the right of these companies to have their own auditors appointed by the general assembly in accordance with the provisions of the Commercial Companies Law.</p>\r\n<p style=\"text-align: justify;\">5.&nbsp;&nbsp;Private funds managed or supervised by any of the entities subject to audit of SAI.</p>\r\n<p style=\"text-align: justify;\">6.&nbsp;&nbsp;The entities, not subject to SAI audit, upon their request and if SAI finds that public interest so necessitates.</p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #e03e2d;\">Article (20) from the State Audit Law</span></p>', '2021-06-10 05:26:50', '2021-06-10 06:53:59'),
(6, 4, 1, 'هل جهاز الرقابة المالية والإدارية للدولة معني بتلقي الشكاوى والبلاغات؟', 'Does SAI receives complaints and cases?', '<p>نعم، يباشر الجهاز بحث ودراسة الشكاوى والبلاغات المتعلقة بمخالفة الجهات الخاضعة لرقابته للقوانين والأنظمة واللوائح والقرارات المعمول بها أو الإهمال أو التقصير في أداء واجبات الوظيفة العامة أو المساس بالمال العام، بما لا يتعارض مع اختصاص الجهات القضائية وغيرها من الجهات الأخرى ذات العلاقة.</p>', '<p>Yes,&nbsp;&nbsp;SAI examines and investigates complaints and cases relevant to entities subject to audit violating applicable laws, bylaws, regulations and decisions. The complaints may also include negligence, failure in performing the duties of the civil service and interfering with the public funds. The investigation shall be carried out in manner consistent with the mandate of the judicial entities and other relevant authorities.</p>', '2022-01-05 01:18:46', '2022-01-05 01:18:46'),
(7, 4, 2, 'ما القنوات المتاحة لتقديم الشكاوى والبلاغات؟', 'What are the available channels to report a complaint/case?', '<p dir=\"RTL\"><span lang=\"AR-SA\">يتيح الجهاز تقديم الشكاوى والبلاغات بإحدى الطرق الآتية:</span></p>\r\n<p dir=\"RTL\">&nbsp;1-&nbsp;&nbsp;&nbsp;<span lang=\"AR-SA\">نافذة البلاغات عبر الموقع الإلكتروني للجهاز&nbsp;</span><a href=\"http://www.sai.gov.om/\"><span dir=\"LTR\">www.sai.gov.om</span></a></p>\r\n<p dir=\"RTL\">&nbsp;2-&nbsp;&nbsp;<span lang=\"AR-SA\">تطبيق الهواتف الذكية&nbsp;</span><span dir=\"LTR\">SAI APP</span></p>\r\n<p dir=\"RTL\">&nbsp;3-&nbsp;&nbsp;<span lang=\"AR-SA\">الحضور إلى مقر الجهاز بمسقط أو أحد أفرعه في: صلالة وصحار والبريمي ونزوى والرستاق وإبراء وعبري وصور.</span></p>\r\n<p dir=\"RTL\">&nbsp;4-&nbsp;&nbsp;&nbsp;<span lang=\"AR-SA\">البريد الإلكتروني</span></p>\r\n<p dir=\"RTL\"><span lang=\"AR-SA\">&nbsp;(</span><span dir=\"LTR\">complaints@sai.gov.om</span><span lang=\"AR-SA\">)</span></p>\r\n<p dir=\"RTL\">&nbsp;5-&nbsp;&nbsp;&nbsp;<span lang=\"AR-SA\">الفاكس (22070660)</span></p>\r\n<p class=\"MsoListParagraphCxSpLast\" dir=\"RTL\" style=\"margin-right: 13.6pt; text-indent: -13.6pt; text-align: justify;\">&nbsp;6-&nbsp;&nbsp;<span lang=\"AR-SA\">البريد العادي (صندوق البريد 727/ الرمز البريدي 100 مسقط)</span></p>', '<p>SAI provides the following channels to report cases and complaints:</p>\r\n<p>&nbsp;1.&nbsp;&nbsp;Complaints window at SAI website:&nbsp;<a href=\"http://www.sai.gov.om/\">www.sai.gov.om</a></p>\r\n<p>&nbsp;2.&nbsp;&nbsp;SAI application in smart phones</p>\r\n<p>&nbsp;3.&nbsp;&nbsp;Presenting to SAI&nbsp;headquarter in Muscat or SAI offices: Salalah, Suhar, Buraimin, Nizwa, Rustaq, Ibra, Sur and Ibri</p>\r\n<p>&nbsp;4.&nbsp;&nbsp;SAI complaints email:&nbsp;<a href=\"mailto:complaints@sai.gov.om\">complaints@sai.gov.om</a></p>\r\n<p>&nbsp;5.&nbsp;&nbsp;Fax number (22070660)</p>\r\n<p>&nbsp;6.&nbsp;&nbsp;Regular mail (PO Box 727, Postal Code: 100 Muscat)</p>', '2022-01-05 01:24:36', '2022-01-05 01:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `faq_groups`
--

CREATE TABLE `faq_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_groups`
--

INSERT INTO `faq_groups` (`id`, `rank`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'الأسئلة العامة', 'General Questions', '2021-06-09 05:05:52', '2021-06-09 05:05:52'),
(2, 2, 'قانون الرقابة المالية والإدارية للدولة', 'State Audit Institution Law', '2021-06-09 05:10:47', '2021-06-09 05:10:47'),
(3, 3, 'الأعمال الرقابية للجهاز', 'SAI Audit Work', '2021-06-09 05:17:47', '2021-06-09 05:17:47'),
(4, 4, 'الشكاوى والبلاغات', 'Complaints and Cases', '2021-06-09 06:22:50', '2021-06-09 06:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(6, 'Ahmed', '95086017', 'a.hajri89@gmail.com', 'aadsadsa', '2021-03-15 04:51:59', '2021-03-15 04:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `sub_folder_id`, `group_id`, `permission_id`, `title`, `title_en`, `description`, `description_en`, `status`, `created_at`, `updated_at`) VALUES
(95, NULL, NULL, NULL, 'البحوث والدراسات', 'Researches and Studies', NULL, NULL, '1', '2022-01-03 05:17:37', '2022-01-03 05:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `footer_categories`
--

CREATE TABLE `footer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_categories`
--

INSERT INTO `footer_categories` (`id`, `sort`, `title`, `title_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'تطبيقات الهواتف الذكية', 'Mobile Apps', 1, '2021-02-23 05:42:25', '2021-12-20 00:10:28'),
(2, 2, 'قنوات التواصل الإجتماعي', 'Social Media Channels', 1, '2021-02-23 05:42:25', '2021-02-23 05:42:25'),
(3, 3, 'تواصل معنا', 'Contact Us', 1, '2021-02-23 05:42:25', '2021-02-23 05:42:25'),
(4, 4, 'روابط سريعة', 'Quick Links', 1, '2021-02-23 05:42:25', '2021-12-20 00:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_cate_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `show_title` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `footer_cate_id`, `sort`, `title`, `title_en`, `url`, `icon`, `status`, `show_title`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'أندرويد', 'Android', 'https://play.google.com/store/apps/details?id=com.stateaudit.app', '<i class=\"fa fa-android\" aria-hidden=\"true\"></i>', 1, 1, '2021-02-23 05:44:39', '2021-12-20 02:20:52'),
(2, 1, 1, 'أبل', 'iOS', 'https://apps.apple.com/om/app/stateauditapp-om/id1544695993#?platform=iphone', '<i class=\"fa fa-apple\" aria-hidden=\"true\"></i>', 1, 1, '2021-02-23 05:44:39', '2021-12-20 02:20:51'),
(3, 2, 1, 'يوتيوب', 'Youtube', 'https://www.youtube.com/channel/UCPotT09DytyMj0tc7FcsG4A', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-youtube\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z\"/>\r\n</svg>', 1, 1, '2021-02-23 05:47:47', '2021-12-20 02:36:54'),
(4, 2, 1, 'تويتر', 'Twitter', 'https://twitter.com/stateaudit_oman', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-twitter\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z\"/>\r\n</svg>', 1, 1, '2021-02-23 05:47:47', '2021-12-20 02:37:10'),
(5, 2, 1, 'إنستجرام', 'Instagram', 'https://www.instagram.com/stateaudit_oman/', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-instagram\" viewBox=\"0 0 16 16\">   <path d=\"M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z\"/> </svg>', 1, 1, '2021-02-23 05:47:47', '2021-12-20 02:37:11'),
(6, 2, 1, 'فيسبوك', 'Facebook', 'https://www.facebook.com/StateAuditOman/', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-facebook\" viewBox=\"0 0 16 16\">   <path d=\"M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z\"/> </svg>', 1, 1, '2021-02-23 05:47:47', '2021-12-20 02:37:13'),
(7, 3, 1, 'المقترحات', 'Feedback', '/feedback/create', '', 1, 1, '2021-02-23 05:51:34', '2021-02-23 05:51:34'),
(8, 3, 2, 'الهاتف: 8-000-000-8', 'Tel: 8-000-000-8', 'tel: 80000008', NULL, 1, 1, '2021-02-23 05:51:34', '2022-01-05 00:19:27'),
(9, 3, 3, 'شارع البستان، مسقط، عمان', 'Al Bustan St, Muscat, Oman', 'https://goo.gl/maps/9YXZJyaiyZxmpWUFA', NULL, 1, 1, '2021-02-23 05:51:34', '2022-01-05 00:19:28'),
(10, 4, 1, 'بوابة عماننا', 'Omanuna Portal', 'https://oman.om/wps/portal/index/!ut/p/a1/04_Sj9CPykssy0xPLMnMz0vMAfGjzOKNDdwNDPwtPX1NnAJdDIy8jLxNgx2NjQyCTYAKIoEKDHAARwNU_d4hvo4GRsZhbl6WPmbGLi4w_XgUELA_XD8KrASfCwi5ITixSL8gNzTCIMtEEQB23Kaq/dl5/d5/L2dJQSEvUUt3QS80SmlFL1o2XzMwRzAwTzlJTUtUTUEwMjNWRko5TDYzREQ0/', '', 1, 1, '2021-02-23 05:53:33', '2021-02-23 05:53:33'),
(11, 4, 1, 'السياسات', 'Policies', '/pages/policies/1', '', 1, 1, '2021-02-23 05:53:33', '2021-02-23 05:53:33'),
(22, 4, 1, 'الأسئلة الشائعة', 'FAQ', '/faq', NULL, 1, 1, '2021-10-10 23:25:13', '2021-10-10 23:25:13'),
(24, 3, 4, 'الأسئلة الشائعة', 'FAQ', '/faq', NULL, 1, 1, '2022-01-05 00:19:09', '2022-01-05 00:19:09'),
(25, 3, 5, 'اتصل بنا', 'Contact us', '/contact_us', NULL, 1, 1, '2022-01-05 23:36:01', '2022-01-05 23:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Admins', 'admin', '2021-01-25 05:57:35', '2021-01-25 05:57:35'),
(2, 'Complaints', 'complaint', '2021-01-25 05:57:35', '2021-01-25 05:57:35'),
(3, 'Users', 'user', '2021-01-25 05:58:36', '2021-01-25 05:58:36'),
(4, 'Media', 'media', '2021-01-26 07:04:13', '2021-01-26 07:04:13'),
(5, 'Promotion', 'promotion', '2021-04-19 07:46:18', '2021-04-19 07:46:18'),
(6, 'Public', 'public', '2021-09-27 04:19:24', '2021-09-27 04:19:24'),
(7, 'Standards', 'standards', '2022-01-03 08:42:42', '2022-01-03 08:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `header_links`
--

CREATE TABLE `header_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_links`
--

INSERT INTO `header_links` (`id`, `sort`, `title`, `title_en`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'الرئيسية', 'Home', '/', 1, '2021-02-25 04:39:34', '2021-12-19 01:14:01'),
(2, 3, 'عن الجهاز', 'About SAI', '#', 1, '2021-02-25 04:39:34', '2021-12-16 06:21:18'),
(3, 6, 'مركز الإعلام والتوعية', 'Media and Awareness Center', '/media', 1, '2021-02-25 04:39:34', '2021-12-19 00:48:59'),
(4, 9, 'الخدمات الإلكترونية', 'E-services', '#', 1, '2021-02-25 04:39:34', '2021-12-16 06:21:13'),
(5, 4, 'القوانين والتشريعات', 'Laws and Regulations', '/laws_regulations', 1, '2021-02-25 04:39:34', '2022-01-31 23:47:42'),
(7, 2, 'الكلمة الترحيبية', 'Welcoming Word', '/pages/welcome', 0, '2021-12-06 03:35:35', '2021-12-16 06:20:17'),
(8, 5, 'مكافحة ومنع الفساد', 'Combating and Preventing Corruption', '/anti_corruption', 1, '2021-12-06 08:06:28', '2022-01-31 03:43:03'),
(9, 7, 'الإحصائيات', 'Statistics', '/statistics', 0, '2021-12-06 08:08:51', '2021-12-06 04:23:06'),
(10, 8, 'الأدلة ومعايير الرقابة', 'Audit Manuals and Standards', '/standards', 0, '2021-12-06 08:10:39', '2022-01-27 02:07:22'),
(11, 10, 'التحول الإلكتروني', 'E-transformation', '/pages/etransformation', 0, '2021-12-06 08:18:20', '2021-12-06 04:25:47'),
(12, 11, 'المكتبة', 'Library', '/library', 0, '2021-12-06 08:20:37', '2022-01-27 02:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `header_sublinks`
--

CREATE TABLE `header_sublinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_links_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_sublinks`
--

INSERT INTO `header_sublinks` (`id`, `header_links_id`, `sort`, `title`, `title_en`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'الرسالة والرؤية والقيم', 'Mission, vision and values', '/pages/mission_vision_values', 1, '2021-02-25 05:21:15', '2021-12-30 01:12:28'),
(2, 2, 2, 'الهيكل التنظيمي ', 'Organizational Structure', '/pages/organizational_structure', 1, '2021-02-25 05:21:15', '2021-02-25 05:21:15'),
(3, 2, 3, 'التطور التاريخي', 'Historical Development', '/pages/historical_development', 1, '2021-02-25 05:21:15', '2021-02-25 05:21:15'),
(4, 2, 4, 'العلاقات الدولية', 'International Relations', '/pages/international_relations', 1, '2021-02-25 05:21:15', '2021-02-25 05:21:15'),
(5, 3, 1, 'أرشيف الأخبار', 'News Archive', '/news', 0, '2021-02-25 05:29:36', '2021-12-19 01:16:07'),
(6, 3, 2, 'الإنتاج المرئي', 'Video Production', '#', 0, '2021-02-25 05:29:36', '2021-12-19 01:16:29'),
(7, 3, 3, 'الإنتاج المسموع', 'Audio Production', '#', 0, '2021-02-25 05:29:36', '2021-12-19 01:16:30'),
(8, 3, 4, 'الإصدارات المطبوعة', 'Printable Publications', '#', 0, '2021-02-25 05:29:36', '2021-12-19 01:16:30'),
(9, 3, 5, 'الإصدارات الإلكترونية', 'Digital Publications', '#', 0, '2021-02-25 05:29:36', '2021-12-19 01:16:31'),
(10, 3, 6, 'أجندة الفعاليات', 'Events', '#', 0, '2021-02-25 05:29:36', '2021-12-19 01:16:32'),
(11, 4, 1, 'نافذة البلاغات', 'Complaints Window', '/complaint/create', 1, '2021-02-25 05:33:42', '2021-02-25 05:33:42'),
(12, 4, 2, 'إقرار الذمة المالية للمسؤول الحكومي', 'Financial Disclosure for Government Official', '/fdgo', 1, '2021-02-25 05:33:42', '2022-01-31 03:12:46'),
(13, 5, 1, 'هيئة مكافحة ومنع الفساد', 'Anti-Corruption Commission', '/pages/antiCorruption', 1, '2021-02-25 05:38:42', '2021-08-19 05:47:18'),
(14, 5, 2, 'الأدلة والمعايير الرقابية', 'Audit Manuals and Standards', '#', 1, '2021-02-25 05:38:42', '2021-08-19 03:27:01'),
(17, 5, 1, 'النظام الأساسي للدولة', 'Basic Law of the State', '#', 1, '2021-12-06 08:00:24', '2021-12-06 08:00:24'),
(18, 5, 2, 'قوانين ذات صلة', 'Related laws', '#', 1, '2021-12-06 08:00:24', '2021-12-06 08:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abbr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` enum('ltr','rtl') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ltr',
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `abbr`, `locale`, `name`, `native`, `flag`, `direction`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Ara', 'ar', 'Arabic', 'العربية', NULL, 'rtl', 1, '2021-08-17 05:40:53', '2021-08-17 05:40:53'),
(2, 'Eng', 'en', 'الإنجليزية', 'English', NULL, 'ltr', 1, '2021-08-17 05:40:53', '2021-08-17 05:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `media_events`
--

CREATE TABLE `media_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allday` tinyint(1) NOT NULL DEFAULT 1,
  `start_on` datetime NOT NULL,
  `end_on` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_events`
--

INSERT INTO `media_events` (`id`, `title`, `title_en`, `description`, `description_en`, `allday`, `start_on`, `end_on`, `created_at`, `updated_at`) VALUES
(1, 'يوم الرقابة', 'Auditor Day', NULL, NULL, 1, '2022-02-03 12:52:43', '2022-02-03 12:52:43', '2022-02-03 08:53:51', '2022-02-03 08:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_11_16_084551_create_complaints_table', 2),
(5, '2020_11_29_092640_create_news_table', 3),
(6, '2021_01_18_053351_create_folders_table', 4),
(7, '2021_01_20_042029_create_files_table', 5),
(8, '2021_01_25_053940_create_groups_table', 6),
(11, '2021_02_23_051858_create_footer_categories_table', 7),
(12, '2021_02_23_051928_create_footer_links_table', 7),
(15, '2021_02_25_041856_create_header_links_table', 8),
(16, '2021_02_25_042009_create_header_sublinks_table', 8),
(17, '2021_03_15_055943_create_feedback_table', 9),
(23, '2021_03_16_040352_create_notifications_table', 10),
(26, '2021_04_04_075033_create_promotions_table', 11),
(27, '2021_04_20_085442_create_videos_table', 12),
(29, '2021_05_19_050542_create_audios_table', 13),
(30, '2021_05_23_063036_create_media_files_table', 14),
(35, '2021_06_09_065044_create_faq_groups_table', 15),
(38, '2021_06_09_065119_create_faqs_table', 16),
(39, '2021_08_17_053539_create_languages_table', 17),
(40, '2021_09_27_043144_alter_files_table', 18),
(46, '2021_09_27_043745_alter_folders_table', 19),
(47, '2021_10_05_045315_create_promotion_categories_table', 20),
(48, '2021_10_05_050323_alter_promotions_table', 20),
(49, '2021_09_30_032939_promotion_categories_table', 21),
(50, '2021_10_11_042540_create_permissions_table', 21),
(52, '2021_10_11_043534_alter_folders_table_add_permission_f_k', 22),
(53, '2021_10_13_035330_create_roles_table', 23),
(54, '2021_10_13_041226_create_user_role_table', 24),
(55, '2021_10_17_041254_create_complaint_channels_table', 25),
(59, '2021_10_17_041501_complaint_channels_fk', 26),
(60, '2021_10_17_044507_create_complaint_statuses_table', 27),
(62, '2021_10_17_050130_complaint_statuses_fk', 28),
(63, '2021_10_21_052946_create_complaint_types_table', 28),
(64, '2021_12_01_075559_complaints_add_columns', 29),
(65, '2021_12_21_042623_create_standard_folders_table', 30),
(66, '2021_12_21_043050_create_standard_files_table', 30),
(67, '2021_12_27_040824_alter_user_role_add_group_id_fk', 31),
(71, '2022_01_05_053741_create_branches_table', 32),
(73, '2022_02_02_055103_create_media_events_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('news','statement') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'news',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type`, `title`, `title_en`, `image`, `content`, `content_en`, `created_at`, `updated_at`) VALUES
(2, 'news', 'سياسات الموقع', 'Site Policies', 'AEgD5eLakWb7bjwbCVKGIQIg9qfYtc8PDiDYNJYK.jpeg', '<h1 style=\"text-align: center;\">سياسات الموقع</h1>', NULL, '2020-11-29 10:29:00', '2020-12-01 02:36:54'),
(3, 'news', 'جهاز الرقابة المالية والإدارية للدولة يشارك في الاجتماع الثاني والستين للمجلس التنفيذي للمنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة (الأرابوساي)', 'SAI Chairman Takes Part in GCC Anti-Corruption and Integrity Protection Agencies Meeting', 'ugAy7MDgJ2X5D1cvSQJWt0Zf1zPszDieVKydmHVD.jpeg', '<p style=\"text-align: justify;\"><span style=\"font-size: 12pt; font-family: tahoma, arial, helvetica, sans-serif;\"><span style=\"text-align: justify; text-indent: 0.5in; line-height: 21.4px;\">شاركت السلطنة ممثلة بجهاز الرقابة المالية والإدارية للدولة في الاجتماع الثاني والستين للمجلس التنفيذي للمنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة (الأرابوساي)، والذي انطلق صباح يوم الاثنين الموافق 30 نوفمبر 2020 من مقر الأمانة&nbsp;</span><span style=\"text-align: justify; text-indent: 0.5in; line-height: 21.4px;\">&rlm;</span><span style=\"text-align: justify; text-indent: 0.5in; line-height: 21.4px;\">العامة للمنظمة بتونس عبر الاتصال المرئي ويستمر على مدى يوميين متتاليين، ويترأس وفد السلطنة معالي الشيخ ناصر بن هلال بن ناصر المعولي رئيس الجهاز، وبحضور سعادة أحمد بن سالم بن راشد الرجيبي نائب الرئيس للرقابة المالية</span><span style=\"text-align: justify; text-indent: 0.5in; line-height: 21.4px;\">&rlm;</span><span style=\"text-align: justify; text-indent: 0.5in; line-height: 21.4px;\">&nbsp;والإدارية على الجهاز الإداري للدولة، وبمشاركة أصحاب المعالي رؤساء الأجهزة والدواوين الأعضاء، ومعالي الأمين العام للمنظمة، ومعالي رئيس المجلس التنفيذي للمنظمة، وعددٍ من المسؤولين بالجهاز.</span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 21.4px; font-size: 12pt; font-family: tahoma, arial, helvetica, sans-serif;\">وقد استهل الاجتماع أعماله بكلمةٍ من معالي نجيب القطاري الأمين العام للمنظمة شكر من خلالها أصحاب المعالي رؤساء الأجهزة والدواوين الأعضاء بالمجلس التنفيذي للمنظمة على مشاركتهم في الاجتماع، مؤكداً على أن المنظمة تولي عنايتها الكاملة من خلال الجمعية العامة والمجلس التنفيذي والأمانة العامة، إلى جانب اللجان المهنية المنبثقة عنها في تعزيز التعاون وتبادل الخبرات بين الاجهزة الأعضاء، الأمر الذي يسهم في مواكبة التطورات المهنية في المجالات الرقابية، وبما يتوافق مع النظام الأساسي للمنظمة، مضيفاً إلى أهمية دور الأجهزة في تعزيز البرامج التنموية في الدول الأعضاء.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 21.4px; font-size: 12pt; font-family: tahoma, arial, helvetica, sans-serif;\">تلى ذلك كلمة معالي الشيخ بندر بن محمد آل ثاني رئيس المجلس التنفيذي أعرب من خلالها عن وافر التقدير لجهود الأجهزة الاعضاء في المجلس التنفيذي، وإلى الأنشطة التي قامت بها اللجان الرئيسية، مشيراً إلى أن المجلس التنفيذي حرص على تنفيذ الاختصاصات الموكلة إليه بموجب النظام الأساسي للمنظمة، مضيفاً بأن اجتماعات المجلس واللجان الرئيسية خرجت بالعديد من المرئيات التي تسهم في تطوير العمل الرقابي.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 21.4px; font-size: 12pt; font-family: tahoma, arial, helvetica, sans-serif;\">وقد تم خلال الاجتماع استعراض ومناقشة عدد من التقارير الفنية، ومن أبرزها تقرير رئيس المجلس التنفيذي عن نشاط المجلس، إلى جانب تقرير الأمانة العامة، ومن ثم تم استعراض تقارير اللجان الرئيسية عن نتائج اجتماعاتها، وهي لجنة تنمية القدرات المؤسسية، ولجنة المعايير المهنية والرقابية، ولجنة الرقابة على التنمية المستدامة، ولجنة المخطط الاستراتيجي، ولجنة متابعة الخطة الاستراتيجية للمنظمة؛ حيث اشتملت تلك التقارير على أهم الأنشطة والمهام المنفذة منذ آخر اجتماع لكل لجنة.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 21.4px; font-size: 12pt; font-family: tahoma, arial, helvetica, sans-serif;\">كما تم خلال الاجتماع اعتماد الحساب الختامي لسنة 2019، واعتماد الموازنة التقديرية للسنوات 2020-2022، فضلاً عن اعتماد النظام المحاسبي للمنظمة، إلى جانب عرض تقارير الأجهزة عن مشاركاتها في أعمال اللجان ومجموعات العمل المنبثقة عن المنظمة الدولية للأجهزة العليا للرقابة المالية والمحاسبة (الإنتوساي).</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 21.4px; font-size: 12pt; font-family: tahoma, arial, helvetica, sans-serif;\">وتجدر الإشارة إلى أن المجلس التنفيذي ينعقد في دورة عادية مرة واحدة كل سنة، كما ينعقد في دورات غير عادية إن دعت الضرورة أو بناء على طلب الامانة العامة، وقد تم انتخاب جهاز الرقابة المالية والإدارية للدولة في عضوية المجلس التنفيذي للفترة من 2017 إلى 2022 أثناء انعقاد الدورة الثانية عشرة للجمعية العامة للمنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة بالجمهورية التونسية في أكتوبر من العام 2016م.</span></p>', '<p dir=\"LTR\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); margin: 0in 0in 8pt; text-indent: 0.5in; unicode-bidi: embed; direction: ltr;\"><span style=\"line-height: 19.7867px; font-size: 14pt;\">His Excellency Sheikh Nasser bin Hilal bin Nasser Al Mawali, Chairman of the State Audit Institution (SAI), participated in the 6<sup>th</sup>&nbsp;meeting of Their Excellencies Chairmen of Gulf Cooperation Council Anti-Corruption and Integrity Protection Agencies. The meeting, which was held on Tuesday November 3<sup>rd</sup>&nbsp;2020 from the GCC headquarter in Riyadh through video conferencing, was attended by Their Excellencies Chairmen of Agencies, His Excellency Secretary General of the GCC and a number of SAI specialists.</span></p>\r\n<p dir=\"LTR\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); margin: 0in 0in 0pt; line-height: normal; text-indent: 0.5in; unicode-bidi: embed; direction: ltr;\"><span style=\"font-size: 14pt;\">At the beginning of the meeting, Their Excellencies assured the importance and added value resulted from the joint activities carried out throughout the previous period including exchange of visits, preparation of guiding laws and manuals, as well as training courses, specialized workshops and knowledge exchange. Such activities contribute in building professional capabilities of SAIs, promoting SAIs role at the national level, and through that demonstrating the wise vision of the leadership of Their Majesties and Highnesses leaders of the GCC countries. The vision that focuses on instilling transparency and integrity basis as well as</span>&nbsp;<span style=\"font-size: 14pt;\">principles of equality and the rule of law.</span></p>\r\n<p dir=\"LTR\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); margin: 0in 0in 0pt; line-height: normal; text-indent: 0.5in; unicode-bidi: embed; direction: ltr;\"><span style=\"font-size: 14pt;\">&nbsp;</span></p>\r\n<p dir=\"LTR\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); margin: 0in 0in 0pt; line-height: normal; text-indent: 0.5in; unicode-bidi: embed; direction: ltr;\"><span style=\"font-size: 14pt;\">The meeting discussed the subject matters included in the agenda, mainly; the GCC guiding law of the protection of public fund which includes a number of chapters such as auditing public money. In addition, the attendees discussed updating the guiding code of conduct of the agencies, proposal to prepare a GCC joint program to raise awareness and educate the public on integrity promotion and fighting corruption as well as the importance of educating the youth on the guiding principles of integrity protection and anti-corruption. In addition, the meeting discussed updating guiding principles for the exchange of knowledge and expertise between anti-corruption agencies in the GCC.</span></p>\r\n<p dir=\"LTR\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); margin: 0in 0in 0pt; line-height: normal; unicode-bidi: embed; direction: ltr;\"><span dir=\"RTL\" style=\"font-size: 14pt;\">&nbsp;</span></p>\r\n<p dir=\"LTR\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgba(255, 255, 255, 0.8); margin: 0in 0in 8pt; text-indent: 0.5in; unicode-bidi: embed; direction: ltr;\"><span style=\"line-height: 19.7867px; font-size: 14pt;\">At the end of the meeting Their Excellencies expressed their appreciation for the efforts exerted by the Secretariat General, Their Excellencies Deputy Chairmen, assistants or persons acting in their stead, as well as specialists committee in preparing for the meeting. They assured the continuous cooperation and joint work to improve SAIs through adopting professional and scientific methodologies and best international practices in the fields relevant to SAIs mandate, promotion of integrity and combating corruption.</span></p>', '2020-12-01 06:39:00', '2020-12-17 03:01:05'),
(6, 'news', 'جهاز الرقابة المالية والإدارية للدولة يشارك في الاجتماع الثاني والستين للمجلس التنفيذي للمنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة (الأرابوساي)', 'SAI Chairman Takes Part in GCC Anti-Corruption and Integrity Protection Agencies Meeting', 'HCs8KQsZvGuTJbW3B35DkdNzuyUKamSP7OEEOENK.jpeg', '<div id=\"ReaderDiv\" style=\"font-family: Cairo, Tahoma, Arial, sans-serif; font-size: 14px; background-color: rgba(255, 255, 255, 0.8);\">\r\n<div class=\"text\" style=\"text-align: justify;\">\r\n<p dir=\"RTL\">شاركت السلطنة ممثلة بجهاز الرقابة المالية والإدارية للدولة في الاجتماع الثاني والستين للمجلس التنفيذي للمنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة (الأرابوساي)، والذي انطلق صباح يوم الاثنين الموافق 30 نوفمبر 2020 من مقر الأمانة&nbsp;&rlm;العامة للمنظمة بتونس عبر الاتصال المرئي ويستمر على مدى يوميين متتاليين، ويترأس وفد السلطنة معالي الشيخ ناصر بن هلال بن ناصر المعولي رئيس الجهاز، وبحضور سعادة أحمد بن سالم بن راشد الرجيبي نائب الرئيس للرقابة المالية&rlm;&nbsp;والإدارية على الجهاز الإداري للدولة، وبمشاركة أصحاب المعالي رؤساء الأجهزة والدواوين الأعضاء، ومعالي الأمين العام للمنظمة، ومعالي رئيس المجلس التنفيذي للمنظمة، وعددٍ من المسؤولين بالجهاز.</p>\r\n<p dir=\"RTL\">وقد استهل الاجتماع أعماله بكلمةٍ من معالي نجيب القطاري الأمين العام للمنظمة شكر من خلالها أصحاب المعالي رؤساء الأجهزة والدواوين الأعضاء بالمجلس التنفيذي للمنظمة على مشاركتهم في الاجتماع، مؤكداً على أن المنظمة تولي عنايتها الكاملة من خلال الجمعية العامة والمجلس التنفيذي والأمانة العامة، إلى جانب اللجان المهنية المنبثقة عنها في تعزيز التعاون وتبادل الخبرات بين الاجهزة الأعضاء، الأمر الذي يسهم في مواكبة التطورات المهنية في المجالات الرقابية، وبما يتوافق مع النظام الأساسي للمنظمة، مضيفاً إلى أهمية دور الأجهزة في تعزيز البرامج التنموية في الدول الأعضاء.</p>\r\n<p dir=\"RTL\">تلى ذلك كلمة معالي الشيخ بندر بن محمد آل ثاني رئيس المجلس التنفيذي أعرب من خلالها عن وافر التقدير لجهود الأجهزة الاعضاء في المجلس التنفيذي، وإلى الأنشطة التي قامت بها اللجان الرئيسية، مشيراً إلى أن المجلس التنفيذي حرص على تنفيذ الاختصاصات الموكلة إليه بموجب النظام الأساسي للمنظمة، مضيفاً بأن اجتماعات المجلس واللجان الرئيسية خرجت بالعديد من المرئيات التي تسهم في تطوير العمل الرقابي.</p>\r\n<p dir=\"RTL\">وقد تم خلال الاجتماع استعراض ومناقشة عدد من التقارير الفنية، ومن أبرزها تقرير رئيس المجلس التنفيذي عن نشاط المجلس، إلى جانب تقرير الأمانة العامة، ومن ثم تم استعراض تقارير اللجان الرئيسية عن نتائج اجتماعاتها، وهي لجنة تنمية القدرات المؤسسية، ولجنة المعايير المهنية والرقابية، ولجنة الرقابة على التنمية المستدامة، ولجنة المخطط الاستراتيجي، ولجنة متابعة الخطة الاستراتيجية للمنظمة؛ حيث اشتملت تلك التقارير على أهم الأنشطة والمهام المنفذة منذ آخر اجتماع لكل لجنة.&nbsp; &nbsp;&nbsp;</p>\r\n<p dir=\"RTL\">كما تم خلال الاجتماع اعتماد الحساب الختامي لسنة 2019، واعتماد الموازنة التقديرية للسنوات 2020-2022، فضلاً عن اعتماد النظام المحاسبي للمنظمة، إلى جانب عرض تقارير الأجهزة عن مشاركاتها في أعمال اللجان ومجموعات العمل المنبثقة عن المنظمة الدولية للأجهزة العليا للرقابة المالية والمحاسبة (الإنتوساي).</p>\r\n<p dir=\"RTL\">وتجدر الإشارة إلى أن المجلس التنفيذي ينعقد في دورة عادية مرة واحدة كل سنة، كما ينعقد في دورات غير عادية إن دعت الضرورة أو بناء على طلب الامانة العامة، وقد تم انتخاب جهاز الرقابة المالية والإدارية للدولة في عضوية المجلس التنفيذي للفترة من 2017 إلى 2022 أثناء انعقاد الدورة الثانية عشرة للجمعية العامة للمنظمة العربية للأجهزة العليا للرقابة المالية والمحاسبة بالجمهورية التونسية في أكتوبر من العام 2016م.</p>\r\n<span id=\"ctl00_ContentPlaceHolder1_DescriptionLabel\"></span></div>\r\n</div>', '<p dir=\"LTR\">His Excellency Sheikh Nasser bin Hilal bin Nasser Al Mawali, Chairman of the State Audit Institution (SAI), participated in the 6th&nbsp;meeting of Their Excellencies Chairmen of Gulf Cooperation Council Anti-Corruption and Integrity Protection Agencies. The meeting, which was held on Tuesday November 3rd&nbsp;2020 from the GCC headquarter in Riyadh through video conferencing, was attended by Their Excellencies Chairmen of Agencies, His Excellency Secretary General of the GCC and a number of SAI specialists.</p>\r\n<p dir=\"LTR\">At the beginning of the meeting, Their Excellencies assured the importance and added value resulted from the joint activities carried out throughout the previous period including exchange of visits, preparation of guiding laws and manuals, as well as training courses, specialized workshops and knowledge exchange. Such activities contribute in building professional capabilities of SAIs, promoting SAIs role at the national level, and through that demonstrating the wise vision of the leadership of Their Majesties and Highnesses leaders of the GCC countries. The vision that focuses on instilling transparency and integrity basis as well as&nbsp;principles of equality and the rule of law.</p>\r\n<p dir=\"LTR\">The meeting discussed the subject matters included in the agenda, mainly; the GCC guiding law of the protection of public fund which includes a number of chapters such as auditing public money. In addition, the attendees discussed updating the guiding code of conduct of the agencies, proposal to prepare a GCC joint program to raise awareness and educate the public on integrity promotion and fighting corruption as well as the importance of educating the youth on the guiding principles of integrity protection and anti-corruption. In addition, the meeting discussed updating guiding principles for the exchange of knowledge and expertise between anti-corruption agencies in the GCC.</p>\r\n<p dir=\"LTR\">At the end of the meeting Their Excellencies expressed their appreciation for the efforts exerted by the Secretariat General, Their Excellencies Deputy Chairmen, assistants or persons acting in their stead, as well as specialists committee in preparing for the meeting. They assured the continuous cooperation and joint work to improve SAIs through adopting professional and scientific methodologies and best international practices in the fields relevant to SAIs mandate, promotion of integrity and combating corruption.</p>', '2021-01-14 07:25:00', '2021-04-01 00:39:04'),
(12, 'statement', 'خطة عمل لتفعيل التعاون والتنسيق بين إدارات التعاون والعلاقات الدولية..جهاز الرقابة يشارك في اجتماع لجنة المختصين بالأجهزة المسؤولة عن حماية النزاهة ومكافحة الفساد بدول مجلس التعاون الخليجي', 'SAI Participates in Meeting of Specialists Committee of GCC Integrity Protection and Anti-Corruption Agencies', 'WmRgtTD9eVNlfLyAdTAD1nP4HwQ9HfDPLCY9YutM.jpeg', '<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">شارك جهاز الرقابة المالية والإدارية للدولة في الاجتماع العشرين للجنة المختصين بالأجهزة المسؤولة عن حماية النزاهة ومكافحة الفساد بدول مجلس التعاون لدول الخليج العربية، والذي انطلق</span><span lang=\"AR-SA\">&nbsp;</span><span lang=\"AR-SA\">صباح يوم الاثنين 5 أبريل 2021 عبرالاتصال المرئي من مقر الأمانة العامة لمجلس التعاون لدول الخليج العربية بالرياض،وبمشاركة الأجهزة الأعضاء في اللجنة.</span></p>\r\n<p dir=\"RTL\" style=\"text-align: justify;\"><span lang=\"AR-SA\">وقد تناول جدول أعمال الاجتماع استعراض خطة العمل الخاصة بتفعيل التعاون والتنسيق بين إدارات التعاون والعلاقات الدولية للأجهزة المسؤولة عن حماية النزاهة ومكافحة الفساد، واستعراض مرئيات ومقترحات الأجهزة الأعضاء حيال خطة العمل، وذلك في إطار تفعيل آليات تنفيذ المبادئ الاسترشادية لتبادل الخبرات والتجارب بين هيئات وأجهزة مكافحة الفساد بدول المجلس.</span></p>', '<p dir=\"LTR\" style=\"text-align: justify;\"><span lang=\"EN-US\">The State Audit Institution (SAI) participated in the 20th&nbsp;meeting of the specialists committee of the agencies responsible for integrity protection and fighting corruption in the GCC region. The meeting was held on Monday, April 5th2021 through video conferencing from the headquarter of the Secretariat General of the Gulf Cooperation Council in Riyadh, with the participation of members of the committee.</span></p>\r\n<p dir=\"LTR\" style=\"text-align: justify;\"><span lang=\"EN-US\">The meeting agenda included a review to the action plan dedicated to promote collaboration and coordination activities between international relations and cooperation departments at integrity and anti-corruption agencies. The agenda also covered reviewing proposals and views of SAI members relevant to the action plan, in light of operationalizing mechanisms to implement guiding principles of knowledge exchange between the agencies.</span></p>', '2021-04-11 05:17:00', '2021-09-12 02:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `title_en`, `status`, `created_at`, `updated_at`) VALUES
(2, 'بلاغ جديد', 'New Compalint', '0', '2021-09-07 00:38:13', '2021-09-07 00:49:25'),
(3, 'بلاغ جديد', 'New Compalint', '0', '2021-09-08 04:41:54', '2021-09-08 04:43:57'),
(4, 'بلاغ جديد', 'New Compalint', '0', '2021-09-09 02:28:28', '2021-09-09 02:42:08'),
(5, 'بلاغ جديد', 'New Compalint', '0', '2021-10-10 06:00:13', '2021-10-10 23:15:55'),
(7, 'بلاغ جديد', 'New Compalint', '0', '2021-12-30 05:22:32', '2022-01-03 04:44:51'),
(8, 'بلاغ جديد', 'New Compalint', '0', '2021-12-30 05:23:36', '2022-01-03 04:44:48'),
(9, 'بلاغ جديد', 'New Compalint', '0', '2021-12-30 06:02:24', '2022-01-03 04:44:45'),
(10, 'بلاغ جديد', 'New Compalint', '0', '2022-01-03 04:21:46', '2022-01-03 04:22:14');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'عام', 'Public', '2021-10-11 04:31:48', '2021-10-11 04:31:48'),
(2, 'خاص', 'Private', '2021-10-11 04:31:48', '2021-10-11 04:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_cate_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_cate_id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'الأخبار', '/news', '2021-02-03 10:27:42', '2021-02-03 10:27:42'),
(2, 1, 'التصريحات', '/news', '2021-02-03 10:27:42', '2021-02-03 10:27:42'),
(3, 2, 'برنامج \"نزاهة\"', '/media/list', '2021-02-03 10:30:12', '2021-02-03 10:30:12'),
(4, 2, 'برنامج \"بالنزاهة نرتقي\"', '/media/videos', '2021-02-03 10:30:12', '2021-02-03 10:30:12'),
(5, 2, 'التقارير التلفزيونية', '/media/years', '2021-02-03 10:30:12', '2021-02-03 10:30:12'),
(6, 2, 'المقابلات التلفزيونية', '/media/years', '2021-02-03 10:30:12', '2021-02-03 10:30:12'),
(9, 3, 'برنامج الرقابة مسؤولبة الجميع', '/media/years', '2021-02-04 03:50:39', '2021-02-04 03:50:39'),
(10, 3, 'المقابلات الإذاعية', '/media/years', '2021-02-04 03:50:39', '2021-02-04 03:50:39'),
(11, 3, 'مواد صوتية', '/media/audios', '2021-02-04 03:50:39', '2021-02-04 03:50:39'),
(12, 4, 'المنشورات الصحفية', '/media/files', '2021-02-04 03:53:06', '2021-02-04 03:53:06'),
(13, 4, 'المطويات', '/media/files', '2021-02-04 03:53:06', '2021-02-04 03:53:06'),
(14, 5, 'التصاميم المعلوماتية (إنفوجرافيك)', '/media/files', '2021-02-04 03:55:20', '2021-02-04 03:55:20'),
(15, 5, 'الملصقات التوعوية', '/media/files', '2021-02-04 03:55:20', '2021-02-04 03:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `program_categories`
--

CREATE TABLE `program_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT '#',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_categories`
--

INSERT INTO `program_categories` (`id`, `title`, `rank`, `url`, `created_at`, `updated_at`) VALUES
(1, 'أرشيف الأخبار', 1, '#', '2021-02-03 10:14:03', '2021-02-03 10:14:03'),
(2, 'الإنتاج المرئي', 2, '#', '2021-02-03 10:17:27', '2021-02-03 10:17:27'),
(3, 'الإنتاج المسموع', 3, '#', '2021-02-03 10:17:27', '2021-02-03 10:17:27'),
(4, 'الإصدارات المطبوعة', 4, '#', '2021-02-03 10:18:27', '2021-02-03 10:18:27'),
(5, 'الإصدارات الإلكترونية', 5, '#', '2021-02-03 10:18:27', '2021-02-03 10:18:27'),
(6, 'أجندة الفعاليات', 6, 'media/events', '2021-02-03 10:18:45', '2021-02-03 10:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `program_lists`
--

CREATE TABLE `program_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_lists`
--

INSERT INTO `program_lists` (`id`, `program_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 3, 'الموسم الأول', '2021-02-04 03:41:08', '2021-02-04 03:41:08'),
(2, 3, 'الموسم الثاني', '2021-02-04 03:41:08', '2021-02-04 03:41:08'),
(3, 3, 'الموسم الثالث', '2021-02-04 03:41:08', '2021-02-04 03:41:08'),
(4, 3, 'الموسم الرابع', '2021-02-04 03:41:08', '2021-02-04 03:41:08'),
(7, 3, 'الموسم الخامس', '2021-05-06 01:32:30', '2021-05-06 01:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotion_categories_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promotion_categories_id`, `title`, `description`, `attachment`, `start_on`, `end_on`, `created_at`, `updated_at`) VALUES
(1, 5, 'عرض خاص من محلات اصفهان لكيك اعياد الميلاد', 'الخصم الخاص لمنتسبي الجهاز المقدم من  (محلات أصفهان  للحلويات واعياد الميلاد ) بجميع افرعهم بالسلطنة   على ان يبدء العرض من تاريخ 5 ابريل 2021م ولغاية 5/4/2021م والمتمثل في  خصم 35% على كل المنتجات المعروضة لديهم .', '7fOYGNE6k7LLyaOr6zjCwNjY9YuX7LUoB9QXCntg.pdf', '2021-10-05 05:25:30', '2022-04-05 09:20:08', '2021-04-05 05:40:55', '2021-04-05 05:40:55'),
(2, 5, 'عرض محلات الثلج الابيض للغسيل', 'الخصم الخاص لمنتسبي الجهاز المقدم من  (الثلج الأبيض) لتنظيف الملابس والسجاد بجميع افرعهم بالسلطنة  والبالغ عددها (28) فرع في مسقط وصلاله وصحار وصور وغيرها من المحافظات والولايات بالسلطنة على ان يبدء العرض من تاريخ 1 إبريل 2021م ولغاية 1/4/2022م والمتمثل في  خصم 50 % على كل الخدمات لديهم .', 'WNzKw4PA3pUrwryYkXGaUuBgNSVAouHqbstFJgGc.pdf', '2021-10-05 05:25:37', '2022-04-01 10:17:11', '2021-04-05 06:05:29', '2021-04-05 06:05:29'),
(8, 3, 'خصم خاص من العيادات المتطوره للسمع والنطق والتوازن', 'الأفاضل/ أعضاء وموظفي الجهاز                        المحترمين\r\n\r\nالسلام عليكم ورحمة الله وبركاته،،،\r\n\r\nبمزيد من العطاء والجد والاجتهاد نستكمل ثمار التوجيهات المستمرة من قبل رئاسة الجهاز في تقديم ما يمكن من تسهيلات للأعضاء والموظفين تسهم في منحهم ميزه من قبل بعض القطاعات الخاصة بالسلطنة ، عليه نرفق لكم الخصم الخاص لمدة سنه كامله المقدم من  ( العيادات المتطورة للسمع والنطق والتوازن  بحي الصاروج) وتحديدا في مجال الانف والاذن والحنجرة .\r\n\r\n \r\nولمزيد من الاستفسارات الاتصال بالدكتور/ ايهم  على الرقم (91411652) .\r\n \r\n \r\nهذا ونسأل الله التوفيق وان تنال العروض التي يسعى اليها القسم اعجابكم مع تأكيدنا بتقديم افضل العروض في المستقبل القريب لجميع أعضاء الجهاز.', '8F5BS6MwY3RhzgTj1ptDUtA8gA3QxMhEgO1l7ztK.pdf', '2021-10-05 05:25:54', '2022-04-19 07:58:00', '2021-04-19 03:59:32', '2021-04-19 03:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_categories`
--

CREATE TABLE `promotion_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion_categories`
--

INSERT INTO `promotion_categories` (`id`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'البنوك', 'Banks', '2021-10-05 05:18:31', '2021-10-05 05:18:31'),
(2, 'الفنادق', 'Hotels', '2021-10-05 05:19:54', '2021-10-05 05:19:54'),
(3, 'المراكز الطبية', 'Medical Centers', '2021-10-05 05:19:54', '2021-10-05 05:19:54'),
(4, 'شركات التأمين', 'Insurance Companies', '2021-10-05 05:21:11', '2021-10-05 05:21:11'),
(5, 'أخرى', 'Others', '2021-10-05 05:21:11', '2021-10-05 05:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `code`, `title`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'view', 'مشاهدة', 'View', '2021-10-13 04:08:39', '2021-10-13 04:08:39'),
(2, 'update', 'تحديث', 'Update', '2021-10-13 04:08:39', '2021-10-13 04:08:39'),
(3, 'add', 'إضافة', 'Add', '2021-10-13 04:10:58', '2021-10-13 04:10:58'),
(4, 'delete', 'حذف', 'Delete', '2021-10-13 04:10:58', '2021-10-13 04:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `standard_files`
--

CREATE TABLE `standard_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `standard_folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standard_files`
--

INSERT INTO `standard_files` (`id`, `standard_folder_id`, `language_id`, `sort`, `title`, `description`, `file_name`, `type`, `path`, `size`, `created_at`, `updated_at`) VALUES
(2, 33, 1, 1, 'عربي', NULL, 'duIMZ63VXsKvqrZvWaKJfpUvaWd55RH9l9JcvZFW.pdf', 'pdf', 'public/library/duIMZ63VXsKvqrZvWaKJfpUvaWd55RH9l9JcvZFW.pdf', '663053', '2021-12-29 05:04:13', '2021-12-29 05:04:13'),
(3, 33, 2, 2, 'Eng', NULL, 'duIMZ63VXsKvqrZvWaKJfpUvaWd55RH9l9JcvZFW.pdf', 'pdf', 'public/library/duIMZ63VXsKvqrZvWaKJfpUvaWd55RH9l9JcvZFW.pdf', '663053', '2021-12-29 05:04:13', '2021-12-29 05:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `standard_folders`
--

CREATE TABLE `standard_folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_standard_folder_id` bigint(20) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standard_folders`
--

INSERT INTO `standard_folders` (`id`, `sub_standard_folder_id`, `sort`, `title`, `title_en`, `description`, `description_en`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'المستوى الأول: المبادئ التأسيسية', 'Level 1: Founding Principles', NULL, NULL, 1, '2021-02-01 05:51:41', '2022-01-27 01:05:33'),
(3, NULL, 3, 'المستوى الثالث : المبادئ الأساسية للرقابة المالية والمحاسبة', 'Level 3 : Fundamental Auditing Principles', NULL, NULL, 1, '2021-02-01 05:54:16', '2022-01-27 01:36:08'),
(4, NULL, 4, 'المستوى الرابع : التوجيهات الإرشادية للرقابة المالية والمحاسبة', 'Level 4 : Auditing Guidelines', NULL, NULL, 1, '2021-02-01 05:55:20', '2022-01-27 01:36:48'),
(5, NULL, 5, 'توجيهات الأنتوساي للحكم الرشيد', 'INTOSAI guidance for good governance', NULL, NULL, 1, '2021-02-01 05:56:03', '2022-01-27 01:37:30'),
(6, NULL, 6, 'أدلة العمل الرقابي للجهاز', 'SAI Manuals', NULL, NULL, 1, '2021-02-01 05:56:41', '2022-01-27 01:39:59'),
(7, NULL, 7, 'الكتب الإرشادية القطاعية', 'Toolkits', NULL, NULL, 1, '2021-02-01 06:00:36', '2022-01-27 01:41:12'),
(8, NULL, 2, 'المستوى الثاني : الشروط الأساسية لعمل الأجهزة العليا للرقابة', 'Level 2 : Prerequisites for the functioning of Supreme Audit Institution ``SAIs``', NULL, NULL, 1, '2021-02-01 06:04:49', '2022-01-27 01:44:11'),
(9, NULL, 8, 'أدلة التدقيق الداخلي', 'Internal Audit Manuals for Governmental Entities', NULL, NULL, 1, '2021-02-01 06:06:00', '2022-01-27 01:38:06'),
(10, NULL, 9, 'أدلة عمل أجهزة ودواوين الرقابة بمجلس التعاون لدول الخليج العربي', 'Manuals of GCC`s SAIs', NULL, NULL, 1, '2021-02-01 06:40:56', '2022-01-27 01:39:33'),
(31, 1, 1, 'sre', NULL, NULL, NULL, 1, '2021-12-21 05:58:03', '2021-12-21 05:58:03'),
(33, 31, 1, 'test', 'test1', '123', '321', 1, '2021-12-29 05:03:05', '2021-12-29 05:03:05'),
(34, 3, 1, 'AQW', 'AQC', 'sss', 'sss', 1, '2021-12-29 06:27:47', '2021-12-29 06:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT 3,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'أحمد سالم الحجري', 'asalhajri@sai.gov.om', '2021-09-23 03:08:58', '$2y$10$p2tPpNzy42O9eBb4lkQTfewkrRS3QD1flq2PgnAJmnwa1.aH4KZJ.', '46XyKxODr3BodOOptwXx15ug2mksHpuOPYuzrE9SP175YWab1X1qlTQYxdvE', '2020-11-17 05:39:35', '2021-12-28 06:18:42'),
(3, 3, 'وضحة الوضاحي', 'walwadhahi@sai.gov.om', NULL, '$2y$10$E3zqRGjVFKIr7ltXpnpFWe0zOhspUvDU67Fu68.6ROnXdYRz1bmqa', NULL, '2021-01-21 04:04:13', '2021-02-23 02:59:06'),
(9, 2, 'ماجد التوبي', 'maltoubi@sai.gov.om', '2021-09-27 03:08:58', '$2y$10$8bsZXF80A5t8b2K5k1dcr.VBjLwW6e9qGHtFNAfRAJq5F74QXMUUm', NULL, '2021-03-31 00:54:49', '2021-12-28 06:11:53'),
(12, 2, 'عايدة خميس الرواحي', 'aalruwaidhi@sai.gov.om', '2021-09-29 03:08:58', '$2y$10$2X.CRR1qwewTzBKsYD8/He5Wc0uzUnrDz/LIzgYGwy8HtQ0cs7zba', '', '2021-09-29 00:10:11', '2021-09-29 00:10:11'),
(13, 2, 'ناصر سالم الوهيبي', 'n.s.alwahaibi@sai.gov.om', '2021-09-29 03:08:58', '$2y$10$2X.CRR1qwewTzBKsYD8/He5Wc0uzUnrDz/LIzgYGwy8HtQ0cs7zba', '', '2021-09-29 00:10:11', '2021-09-29 00:19:59'),
(14, 1, 'ابراهيم البجالي', 'ijalbajali@sai.gov.om', '2021-10-06 01:05:43', '$2y$10$XTogr0mMjjHs6OXOIqf7Ie5ZrjZ0nL.T/xMigf1iOGinqefO01flq', '', '2021-10-06 01:05:08', '2021-10-06 03:09:11'),
(15, 3, 'Faisal Ali  AL-Rashdi', 'faalrashdi@sai.gov.om', '2021-10-06 01:28:51', '$2y$10$l91pZD0dg/1kOhFefUTPDulF5ttcewilwhEHLOExZ6t/XIC8qglJO', '', '2021-10-06 01:28:03', '2021-10-06 01:28:51'),
(16, 3, 'سليمان الندابي', 'salnadabi@sai.gov.om', '2021-10-06 01:33:12', '$2y$10$p2tPpNzy42O9eBb4lkQTfewkrRS3QD1flq2PgnAJmnwa1.aH4KZJ.', '', '2021-10-06 01:32:31', '2021-10-06 01:33:12'),
(17, 3, 'رشاد بن راشد بن علي التوبي', 'raltobi@sai.gov.om', '2021-10-06 04:41:57', '$2y$10$sJdAc0FtaUJnnjEymAfqueVCfSj46.spC9wgX/v0NtmAniVjkHA3G', 'Gg8DCyHcFzIhHffLaEiXMyqDe1Hx9HxLJcr9Oe9GnmUjsga7ioW0xh7eHcXR', '2021-10-06 04:41:42', '2021-10-10 03:14:41'),
(18, 3, 'ناصر السعدي', 'nsalsaadi@sai.gov.om', '2021-10-10 04:47:52', '$2y$10$12n/J6N3C4DjFSUEoD4giuJo0GR1XKGsDsDZsKKwKSxacaZetVKfu', '', '2021-10-10 04:47:26', '2021-10-10 04:47:52'),
(19, 3, 'Sheikha', 'ssalbadaai@sai.gov.om', '2021-10-10 05:23:34', '$2y$10$hZ.Ep8jeK1Rbw.yBt3lTNux7H/fUHTAPIFzFAxLrfNDFJKBeURzXS', 'agQfGN4khQqt3rgZzAXRL5adGzkrFETlaWP91aUiOa27263IhWRSccGr3OvT', '2021-10-10 05:23:14', '2021-10-10 05:25:10'),
(20, 3, 'Hamood', 'halhamuda@sai.gov.om', '2021-10-10 05:45:04', '$2y$10$ilhE61Q6L8YBDa9fbYrTIeXEtKNbQrz084b9BXl0As8slfxTVGV6u', '', '2021-10-10 05:44:52', '2021-10-10 05:45:04'),
(21, 3, 'Saleh Said Alfarei', 'salfari@sai.gov.om', '2021-10-11 00:37:37', '$2y$10$s3qOHNXpIalEY6PADcUJLuDWeeomMA3q9Bj7.DKebbvhabatJ9MHW', '', '2021-10-11 00:27:40', '2021-10-11 00:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `group_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-12-28 03:07:24', '2021-12-28 03:07:24'),
(1, 1, 2, '2021-12-28 02:33:11', '2021-12-28 02:33:11'),
(1, 1, 3, '2021-12-28 02:33:12', '2021-12-28 02:33:12'),
(1, 1, 4, '2021-12-28 02:33:13', '2021-12-28 02:33:13'),
(1, 2, 1, '2021-12-28 02:48:46', '2021-12-28 02:48:46'),
(1, 2, 2, '2021-12-28 02:48:47', '2021-12-28 02:48:47'),
(1, 2, 3, '2021-12-28 02:48:48', '2021-12-28 02:48:48'),
(1, 2, 4, '2021-12-28 02:48:48', '2021-12-28 02:48:48'),
(1, 3, 1, '2021-12-28 03:24:24', '2021-12-28 03:24:24'),
(1, 3, 2, '2021-12-28 02:48:50', '2021-12-28 02:48:50'),
(1, 3, 3, '2021-12-28 02:48:50', '2021-12-28 02:48:50'),
(1, 3, 4, '2021-12-28 02:48:51', '2021-12-28 02:48:51'),
(1, 4, 1, '2021-12-28 02:48:53', '2021-12-28 02:48:53'),
(1, 4, 2, '2021-12-28 02:48:53', '2021-12-28 02:48:53'),
(1, 4, 3, '2021-12-28 02:48:54', '2021-12-28 02:48:54'),
(1, 4, 4, '2021-12-28 02:48:55', '2021-12-28 02:48:55'),
(1, 5, 1, '2021-12-28 02:48:59', '2021-12-28 02:48:59'),
(1, 5, 2, '2021-12-28 02:49:00', '2021-12-28 02:49:00'),
(1, 5, 3, '2021-12-28 02:49:00', '2021-12-28 02:49:00'),
(1, 5, 4, '2021-12-28 02:49:02', '2021-12-28 02:49:02'),
(1, 6, 1, '2021-12-28 02:49:02', '2021-12-28 02:49:02'),
(1, 6, 2, '2021-12-28 02:49:03', '2021-12-28 02:49:03'),
(1, 6, 3, '2021-12-28 02:49:04', '2021-12-28 02:49:04'),
(1, 6, 4, '2021-12-28 02:49:04', '2021-12-28 02:49:04'),
(1, 7, 1, '2022-01-03 04:43:06', '2022-01-03 04:43:06'),
(1, 7, 2, '2022-01-03 04:43:08', '2022-01-03 04:43:08'),
(1, 7, 3, '2022-01-03 04:43:08', '2022-01-03 04:43:08'),
(1, 7, 4, '2022-01-03 04:43:09', '2022-01-03 04:43:09'),
(9, 1, 1, '2021-12-28 06:12:02', '2021-12-28 06:12:02'),
(9, 1, 2, '2021-12-28 06:12:03', '2021-12-28 06:12:03'),
(9, 1, 3, '2021-12-28 06:12:04', '2021-12-28 06:12:04'),
(9, 1, 4, '2021-12-28 06:12:04', '2021-12-28 06:12:04'),
(9, 2, 1, '2021-10-17 03:51:00', '2021-10-17 03:51:00'),
(9, 2, 2, '2021-10-13 04:23:24', '2021-10-13 04:23:24'),
(9, 6, 1, '2021-12-28 03:48:47', '2021-12-28 03:48:47'),
(13, 2, 1, '2021-12-28 04:01:24', '2021-12-28 04:01:24'),
(13, 2, 2, '2021-12-28 04:01:26', '2021-12-28 04:01:26'),
(13, 2, 3, '2021-12-28 04:01:29', '2021-12-28 04:01:29'),
(13, 2, 4, '2021-12-28 04:01:30', '2021-12-28 04:01:30'),
(13, 6, 1, '2021-12-28 04:01:36', '2021-12-28 04:01:36'),
(16, 6, 1, '2021-12-28 06:22:33', '2021-12-28 06:22:33'),
(19, 1, 1, '2021-12-27 05:02:49', '2021-12-27 05:02:49'),
(19, 1, 2, '2021-12-27 05:02:50', '2021-12-27 05:02:50'),
(19, 1, 3, '2021-12-27 05:02:51', '2021-12-27 05:02:51'),
(19, 1, 4, '2021-12-27 05:02:52', '2021-12-27 05:02:52'),
(20, 6, 1, '2021-12-28 04:00:47', '2021-12-28 04:00:47'),
(21, 6, 1, '2021-12-28 04:00:39', '2021-12-28 04:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_list` bigint(20) UNSIGNED DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `program_id`, `program_list`, `rank`, `title`, `description`, `url`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 'نزاهة', NULL, 'https://www.youtube.com/embed/9YdzD3RmapQ', '2021-04-22 04:32:47', '2021-04-22 04:32:47'),
(2, NULL, 1, 2, 'المحسوبية', NULL, 'https://www.youtube.com/embed/rHTfdAqBXEs', '2021-04-22 04:35:50', '2021-04-22 04:35:50'),
(3, NULL, 1, 3, 'المال العام', NULL, 'https://www.youtube.com/embed/yOtfTZvhoU0', '2021-04-22 04:39:22', '2021-04-22 04:39:22'),
(4, NULL, 1, 4, 'ثقافة العمل', NULL, 'https://www.youtube.com/embed/a-0c0lCqzb0', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(5, NULL, 1, 5, 'ثقافة العمل 2', NULL, 'https://www.youtube.com/embed/ZufCBYG9d2Y', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(6, NULL, 1, 6, 'الإحسان وإتقان العمل', NULL, 'https://www.youtube.com/embed/MY5VJV7dsTY', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(7, NULL, 1, 7, 'الرشوة', NULL, 'https://www.youtube.com/embed/Pg4ijHhZtjI', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(8, NULL, 1, 8, 'المنصب أمانة', NULL, 'https://www.youtube.com/embed/JzqW3775-wg', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(9, NULL, 1, 9, 'النزاهة', NULL, 'https://www.youtube.com/embed/DUYOSMAp1J8', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(10, NULL, 1, 10, 'القدوة الحسنة', NULL, 'https://www.youtube.com/embed/pH6Xp0ta5JQ', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(11, NULL, 1, 11, 'العلاقة بين الموظفيين', NULL, 'https://www.youtube.com/embed/xPHYTDaZ5ws', '2021-04-22 04:42:37', '2021-04-22 04:42:37'),
(12, NULL, 1, 12, 'الإخلاص', NULL, 'https://www.youtube.com/embed/75NImKKYb9M', '2021-04-26 04:12:53', '2021-04-26 04:12:53'),
(13, NULL, 1, 13, 'المنصب أمانة', NULL, 'https://www.youtube.com/embed/gr0AolWQPX4', '2021-04-26 04:15:02', '2021-04-26 04:15:02'),
(14, NULL, 1, 14, 'العمل الجماعي', NULL, 'https://www.youtube.com/embed/bCyeHaprPrI', '2021-04-26 04:16:48', '2021-04-26 04:16:48'),
(15, NULL, 1, 15, 'النزاهة', NULL, 'https://www.youtube.com/embed/rQ3tURSQL7g', '2021-04-26 04:17:57', '2021-04-26 04:17:57'),
(16, NULL, 1, 16, 'الإختلاس', NULL, 'https://www.youtube.com/embed/3jxzBNHvCcw', '2021-04-26 04:19:03', '2021-04-26 04:19:03'),
(17, NULL, 1, 17, 'حب العمل', NULL, 'https://www.youtube.com/embed/YREHfkZ9W1g', '2021-04-26 04:20:14', '2021-04-26 04:20:14'),
(18, NULL, 1, 18, 'المسؤولية أمانة', NULL, 'https://www.youtube.com/embed/z0pIuAlWTrA', '2021-04-26 04:21:50', '2021-04-26 04:21:50'),
(19, NULL, 1, 19, 'الرشوة', NULL, 'https://www.youtube.com/embed/oWDoBvtGfMg', '2021-04-26 04:22:46', '2021-04-26 04:22:46'),
(20, NULL, 1, 20, 'الوطن 1', NULL, 'https://www.youtube.com/embed/JXtGYfx00Ok', '2021-04-26 04:23:40', '2021-04-26 04:23:40'),
(23, 4, NULL, 1, 'هل يعتبر ملتزماً بعمله', NULL, 'https://www.youtube.com/embed/Q1DwehueS4g', '2021-05-06 05:20:01', '2021-05-06 05:20:01'),
(25, 4, NULL, 2, 'النزاهة', NULL, 'https://www.youtube.com/embed/cr0rKOfPnAc', '2021-05-06 05:33:21', '2021-05-06 05:33:21'),
(26, 4, NULL, 3, 'كن جزء من نجاح المؤسسة', NULL, 'https://www.youtube.com/embed/P-Dd_Pp3GiE', '2021-05-06 05:37:27', '2021-05-06 05:37:27'),
(27, 4, NULL, 4, 'تربية النشء على حماية المال العام', NULL, 'https://www.youtube.com/embed/PaiZomrJtCo', '2021-05-06 05:41:00', '2021-05-06 05:41:00'),
(28, NULL, 1, 21, 'الاستحواذ', NULL, 'https://www.youtube.com/embed/9YdzD3RmapQ', '2021-05-06 05:44:48', '2021-05-06 05:44:48'),
(31, NULL, 1, 22, 'الانتماء', NULL, 'https://www.youtube.com/embed/O0Xp1lAaMbA', '2021-05-06 05:52:40', '2021-05-06 05:52:40'),
(32, NULL, 1, 23, 'الأمانة', NULL, 'https://www.youtube.com/embed/qiwD8sMZekw', '2021-05-06 05:55:42', '2021-05-06 05:55:42'),
(33, 4, NULL, 5, 'الموظف الفاعل', NULL, 'https://www.youtube.com/embed/3b_TM57-VEc', '2021-05-09 02:24:25', '2021-05-09 02:24:25'),
(34, 4, NULL, 6, 'محاسبة النفس', NULL, 'https://www.youtube.com/embed/rfPmYj5UgI8', '2021-05-09 04:21:12', '2021-05-09 04:21:12'),
(35, 4, NULL, 7, 'العمل عبادة', NULL, 'https://www.youtube.com/embed/wgUgTeMOs3U', '2021-05-09 04:28:10', '2021-05-09 04:28:10'),
(36, 4, NULL, 8, 'الرقابة مسؤولية جماعية', NULL, 'https://www.youtube.com/embed/mLsWExyI2lQ', '2021-05-09 04:30:04', '2021-05-09 04:30:04'),
(40, NULL, 2, 1, 'المال العام', NULL, 'https://www.youtube.com/embed/gCV5eLu06Tg', '2018-05-17 07:00:00', '2021-05-10 03:41:34'),
(41, NULL, 2, 2, 'الوطن', NULL, 'https://www.youtube.com/embed/L_70-jw15O4', '2021-05-21 07:03:00', '2021-05-10 03:03:28'),
(42, NULL, 2, 3, 'حسن الحديث', NULL, 'https://www.youtube.com/embed/PEVC3De6L4c', '2018-05-21 07:08:00', '2021-05-10 03:10:17'),
(45, 9, NULL, 1, 'برنامج الرقابة مسؤولية الجميع الحلقة رقم 1', NULL, 'https://www.youtube.com/embed/PzClbk1dfWA', '2015-07-21 06:16:00', '2021-05-11 02:19:38'),
(46, 9, NULL, 2, 'برنامج الرقابة مسؤولية الجميع الحلقة رقم 2', NULL, 'https://www.youtube.com/embed/29D9885q__8', '2015-05-21 06:23:00', '2021-05-11 02:24:14'),
(47, 9, NULL, 3, 'برنامج الرقابة مسؤولية الجميع الحلقة رقم 3', NULL, 'https://www.youtube.com/embed/ZBn_d-pU9Qo', '2015-07-21 06:25:00', '2021-05-11 02:26:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_channel_id_foreign` (`channel_id`),
  ADD KEY `complaints_type_id_foreign` (`status_id`);

--
-- Indexes for table `complaint_channels`
--
ALTER TABLE `complaint_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_statuses`
--
ALTER TABLE `complaint_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_types`
--
ALTER TABLE `complaint_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_faq_group_id_foreign` (`faq_group_id`);

--
-- Indexes for table `faq_groups`
--
ALTER TABLE `faq_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `files_group_id_foreign` (`group_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_folder` (`sub_folder_id`),
  ADD KEY `folders_group_id_foreign` (`group_id`),
  ADD KEY `folders_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `footer_categories`
--
ALTER TABLE `footer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_links_footer_cate_id_foreign` (`footer_cate_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_links`
--
ALTER TABLE `header_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_sublinks`
--
ALTER TABLE `header_sublinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `header_sublinks_header_links_id_foreign` (`header_links_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_events`
--
ALTER TABLE `media_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_files_program_id_foreign` (`program_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_cate_id` (`program_cate_id`);

--
-- Indexes for table `program_categories`
--
ALTER TABLE `program_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_lists`
--
ALTER TABLE `program_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotion_categories_id_foreign` (`promotion_categories_id`);

--
-- Indexes for table `promotion_categories`
--
ALTER TABLE `promotion_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_files`
--
ALTER TABLE `standard_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standard_files_standard_folder_id_foreign` (`standard_folder_id`),
  ADD KEY `languages_language_id_foreign` (`language_id`);

--
-- Indexes for table `standard_folders`
--
ALTER TABLE `standard_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`group_id`,`role_id`) USING BTREE,
  ADD KEY `user_role_role_id_foreign` (`role_id`),
  ADD KEY `user_role_group_id_foreign` (`group_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_program_id` (`program_id`),
  ADD KEY `videos_program_list` (`program_list`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `complaint_channels`
--
ALTER TABLE `complaint_channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint_statuses`
--
ALTER TABLE `complaint_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaint_types`
--
ALTER TABLE `complaint_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq_groups`
--
ALTER TABLE `faq_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `footer_categories`
--
ALTER TABLE `footer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `header_links`
--
ALTER TABLE `header_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `header_sublinks`
--
ALTER TABLE `header_sublinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media_events`
--
ALTER TABLE `media_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `program_categories`
--
ALTER TABLE `program_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `program_lists`
--
ALTER TABLE `program_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promotion_categories`
--
ALTER TABLE `promotion_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `standard_files`
--
ALTER TABLE `standard_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `standard_folders`
--
ALTER TABLE `standard_folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `complaint_channels` (`id`),
  ADD CONSTRAINT `complaints_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `complaint_statuses` (`id`),
  ADD CONSTRAINT `complaints_type_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `complaint_types` (`id`);

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_faq_group_id_foreign` FOREIGN KEY (`faq_group_id`) REFERENCES `faq_groups` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `folder_id` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`),
  ADD CONSTRAINT `language_id` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `folders_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `sub_folder` FOREIGN KEY (`sub_folder_id`) REFERENCES `folders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD CONSTRAINT `footer_links_footer_cate_id_foreign` FOREIGN KEY (`footer_cate_id`) REFERENCES `footer_categories` (`id`);

--
-- Constraints for table `header_sublinks`
--
ALTER TABLE `header_sublinks`
  ADD CONSTRAINT `header_sublinks_header_links_id_foreign` FOREIGN KEY (`header_links_id`) REFERENCES `header_links` (`id`);

--
-- Constraints for table `media_files`
--
ALTER TABLE `media_files`
  ADD CONSTRAINT `media_files_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `program_cate_id` FOREIGN KEY (`program_cate_id`) REFERENCES `program_categories` (`id`);

--
-- Constraints for table `program_lists`
--
ALTER TABLE `program_lists`
  ADD CONSTRAINT `program_id` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotion_categories_id_foreign` FOREIGN KEY (`promotion_categories_id`) REFERENCES `promotion_categories` (`id`);

--
-- Constraints for table `standard_files`
--
ALTER TABLE `standard_files`
  ADD CONSTRAINT `languages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `standard_files_standard_folder_id_foreign` FOREIGN KEY (`standard_folder_id`) REFERENCES `standard_folders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_program_id` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `videos_program_list` FOREIGN KEY (`program_list`) REFERENCES `program_lists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
