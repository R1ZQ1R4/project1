-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 12:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(10) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_date` date NOT NULL,
  `article_content` text NOT NULL,
  `article_view` int(11) NOT NULL,
  `article_picture` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_name`, `article_date`, `article_content`, `article_view`, `article_picture`, `place_id`, `user_id`, `category_id`) VALUES
(8, 'MAUMERE VISITED BY 58 INTERNATIONAL YACHTS IN WONDERFUL SAIL 2 INDONESIA 2017', '2017-08-28', 'Blessed with a beautiful landscape of hills and mountains complemented with clear green and blue ocean, the town of Maumere, capital of Sikka regency on the northern coast of Flores Island in East Nusa Tenggara Province, will be one of the most anticipated ports of call in the annual international sailing event of Multihull Solutions Wonderful Sail 2 Indonesia 2017. The ''Cape of Flowers'' -as the town is aptly dubbed, is expecting the arrival of 58 international yachts from various countries on 24th -26th August 2017.\r\n\r\n"After visiting Wakatobi, the spectacular underwater paradise at the tip of South East Sulawesi, all yacht rally participants will continue sailing and make port in Maumere for 3 days before further exploring other beautiful islands across the archipelago," said Raymond Lesmana, Organizer of Wonderful Sail 2 Indonesia. Raymond further added that in total, there will be about 70 yachts since more yachts will join later after the Wakatobi stop. These yachts will bring along some 150 international tourists from different countries including from Australia, New Zealand, USA, Canada, Germany, UK, Netherland, Belgium, Italy, Spain, and France.', 1, '3f4b6500f7999db32d53f71ec8f0537d15c56866-8b6aa.jpg', 7, 6, 4),
(9, 'INDONESIA TOURIST ARRIVALS SOARS 22.4 % IN SEMESTER I', '2017-08-28', 'Head of Indonesia''s National Statistics Board, Suharyanto, on 1 August confirmed that international arrivals to Indonesia for Semester I (January through June 2017) has surged 22.4% reaching a total of 6.48 million visitors, up from the 5.29 million in 2016 year on year.\r\n\r\nAs for arrivals in June, this has jumped 31.6% reaching 1.13 million visitors, compared to 857,650 visitors in June 2016.\r\n\r\nThis impressive increase in arrivals is in no small measure due to the excellently coordinated and rapid development of new airports in major tourist destinations, expansion of runways, as at Labuan Bajo''s Komodo airport and the Silangit airport by Lake Toba in North Sumatra.\r\n\r\nAdditionally Indonesian and international airlines have steadily opened up new tourist routes besides operating regular flights to Jakarta and Bali. These include Lion Air and Sriwijaya Air now operating direct regular charters from numerous China cities to Manado, and Batam, and Citilink opening up the route from Chongqing to Tanjung Pinang Bintan. Air Navigation authorities have also re-organized slots to accommodate increasing numbers of flights. While international airlines such as Korean Air has started operating charters from Korea direct to Lombok.', 0, '6951bd4f67b79d22e5954ae4ba80fa340c32b88e-dbe05.jpg', 1, 6, 5),
(10, 'INDONESIA CELEBRATES INDEPENDENCE DAY THROUGHOUT THE ARCHIPELAGO!', '2017-08-28', 'Indonesia proclaimed her Independence on August 17th 1945, This year Indonesia celebrates its 72nd year of the Proclamation of Independence, Every year this historic event is celebrated with numerous exciting events throughout the nation that are aimed at enhancing Unity in Diversity.\r\n\r\nThe pinnacle celebration commemorating Independence Day is held on the morning of the 17th August at the Presidential Palace in Jakarta, facing the National Monument. The highlight will be the moment when the Declaration of Independence is read out, that was first proclaimed by Soekarno-Hatta at precisely 10am. This is followed by the flag ceremony carried by the Paskibraka, a special flag bearing and flag raising group, recruited from among the brightest eligible students in high school throughout the country. They spent months in training and quarantine, to be able to perform flawlessly during the official ceremony in front of the President and honored guests. A similar ceremony is held at sunset to lower the Indonesian red-and-white flag.', 4, '6cb1324868e30b286aa3e83aec395b71c645c4db-95c0a.jpg', 6, 6, 5),
(12, 'WONDERFUL INDONESIA AT AUSTRALIA INTERNATIONAL DIVE EXPO (AIDE) SYDNEY', '2017-08-28', 'Check outthe Wonderful Indonesia pavilion at the Australia International Dive Expo (AIDE) in Sydney Australia on 3rd to 7th August 2017, where officials of the Ministry of Tourism and 10 of Indonesia Dive operators will be on hand to answer any of your questions and assist you on dive destinations and which are the best dive spots around the Indonesian archipelago.\r\n\r\nSituated between Asia and Australia, comprising over 17,000 large and small islands, the Indonesian Archipelago consists 70% of seas. Here are found underwater wonders replete with colorful coral reefs and strange and amazing underwater creatures, from huge whale sharks to odd tiny nudibranch that are just perfect for those rare macro photographs. Here divers swim with giant manta rays, odd-looking mola-mola and cute lion fish.\r\n\r\nIndonesia''s location on the Equator provides sunshine and ideal warmth all year round, so that its waters are right for swimming, snorkeling, surfing and diving at any time of the year.\r\n\r\nAs a maritime nation with the second longest coastline in the world, possessing coral reefs that cover a total area of 51,000square kilometers, Indonesia is habitat to 18% of the world''s coral reefs.', 0, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 12, 6, 4),
(13, 'Permendikbud RI 44/2012 Tetang PUNGUTAN DAN SUMBANGAN BIAYA PENDIDIKAN', '2017-08-28', 'PERATURAN MENTERI PENDIDIKAN DAN KEBUDAYAAN\r\nREPUBLIK INDONESIA \r\nNOMOR  17 TAHUN 2016\r\nTENTANG \r\nPETUNJUK TEKNIS PENYALURAN TUNJANGAN PROFESI\r\nDAN TAMBAHAN PENGHASILAN BAGI GURU \r\nPEGAWAI NEGERI SIPIL DAERAH\r\n\r\n \r\n\r\nSelengkapnya, silahkan download disini.', 0, '41f425e397436a0f60f21454f0c2d6e2290f3352-83a7a.jpg', 6, 6, 5),
(14, 'THE THRILLING PACU JALUR FESTIVAL 2017 OF KUANTAN SINGINGI RIAU PROVINCE', '2017-08-28', ' (not to be confused with the Riau Islands province) is part of the mainland of the large island of Sumatra and is up to now better known as a center of Indonesia''s oil production.\r\n\r\nToday, with the booming tourism industry, Riau does not wish to be left behind in attracting tourists to its shores. So now, next to its more famed Bakar Tongkang (or Burning the last Boat) Festival, today it offers the exciting Pacu Jalur Festival 2017 held from 23 â€“ 27 August 2017, still in conjunction with Indonesia''s Independence Day celebrations.\r\n\r\nIt is expected that more than 100 boats will participate in this trilling competition.\r\n\r\nPacu Jalur, literally meaning: the dug-out long boats rowing competition is a popular event at Kuantan Singingi by the Kuantan river, some 4 hours'' drive from the provincial capital city of Pekanbaru.', 0, 'b203882c04878d68e5b624d85954c7118d657df0-7f69b.jpg', 4, 6, 4),
(15, 'BALI INTERNATIONAL TRIATHLON 2017: TRIATHLON FOR THE SOUL', '2017-08-28', 'Following the successful weeklong Sanur Village Festival showcasing Bali''s Spirit of Heritage through a variety of cultural and athletic events, the tenth annual Herbalife Bali International Triathlon will return to the Island of the Gods on 15th October 2017. Continuing the spirit of "Triathlon for the Soul", the thrilling competition that combines swimming, running and cycling now has a new course steeped in Balinese culture, starting and finishing at the picturesque and welcoming traditional village of Sanur.\r\n\r\nAs always, the swim start of the race starts just after sunrise with this year''s race stroking the calms waters off Sanur''s Mertasari Beach, followed by bike sprints down the Ngurah Rai Bypass in Sanur to the IB Mantra Bypass in Gianyar and back to the beach side transition area before finishing with a road race through the streets of Sanur. Aside from improving safety, changes in the new course allow for full road closures and moreover, add that distinct traditional Balinese cultural experience.', 0, '7988ca3724f3fdc10f17e7118f46a55f68d1449d-85129.jpg', 1, 6, 4),
(16, 'TRI-NATIONS FRIENDSHIP GOLF 2017 AT CHALLENGING PALM SPRING GOLF COURSE ON BATAM', '2017-08-28', 'Still very much in the mood of National Independence Day, from 31 August to 3 September, the Palm Spring Golf and Beach Resort in Batam will host the Tri-Nations Friendship Golf 2017 games, pitching the skills of top golfers from the three neighbouring countries Indonesia, Singapore and Malaysia.\r\n\r\n"All three ASEAN countries have their National Day in August", said Esthy Reko Astuti, Deputy Minister for National Tourism Marketing of the Ministry of Tourism. "Indonesia''s celebrates this on 17th. August, Singapore on the 9th. August and Malaysia on 31st. August, so that this Tri- Nations Friendship Golf Game is very apt to celebrate all our national days."', 2, '3cc11263c54912d76ea18f8e5be40ebd772d887c-a631f.jpg', 12, 6, 4),
(17, 'Wayang Golek', '2017-08-29', 'Wayang Golek or Marionette Puppet is an art puppet show made â€‹â€‹of wood, which is particularly popular in the Land of Pasundan. Wayang is a form of folk theater that very popular. People often associate the word "puppet" and "shadow", as seen from a puppet show put on screen, where images appear.\r\n      The origin of the wayang golek is not known for certain because there is no complete information, whether written or oral. Attendance of wayang golek can not be separated from the wayang kulit (shadow puppet) because wayang golek is a progression of wayang kulit.\r\n      Birth of wayang golek was initiated by Dalem Karang Anyar (Wiranata Koesoemah III) at the end of his tenure. At that time, he ordered Ki Darman that live in Cibiru, Ujung Berung, to make puppets out of wood. Forms of puppets made â€‹â€‹originally shaped flat and patterned on the shadow puppets. However, the further development, at the instigation of Dalem, Ki Darman made rounded wayang golek, not much different from the wayang golek now. In Priangan itself known at the beginning of the 19th century. Introduction of Sundanese people with wayang golek is possible since the opening Daendels highway linking the coast with the mountainous Priangan.. Originally wayang golek in Priangan using the Java language. However, after the Sundanese smart performer, the language used is the sundanese language.', 0, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 8, 6, 3),
(18, 'Rendang Padang', '2017-08-29', 'West Sumatra, has many famous things from itâ€™s culture and cuisine. Exquisite handicrafts producing rich gold and silver â€œsongketâ€ cloths on handwoven red, sky blue, royal yellow or deep green cloths; elegant embroidered pieces used at elaborate traditional weddings, fine embroidered â€œperanakanâ€ wedding costumes, accessories and sandals, filigree work, woodcarving, embroidered muslim wear and prayer veils and a whole lot more.\r\n\r\nItâ€™s cuisine has one of the most famous recipe dish which by CNN Go calls as the worldâ€™s most favorite dish, which is the Rendang recipe. The cubed beef has been marinated and cooked in many kinds of ingredients, resulting in the soft unforgettable meat dish which tastes heavenly eaten with steaming hot rice.\r\n\r\nYou can find the famous rendang at Pasar Atas in Padang City, the place with the most mouth watering Padang food. But beware, most of Padang food is known to be extremely chilli hot, as you can see from the red sauce dripping from almost all dishes.\r\n\r\nAnother hot favorite dessert is the Pisang kapik, or the barbequed banana, that comes in sweet, sour or salty tastes added with ground coconut meat and brown sugar. Other tidbits to take home or munch on the road are the many kinds of crackers made of cassava, potatoes or sweet potatoes, covered in cheese or chilli sauce.', 1, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 12, 6, 1),
(19, 'Ngaben Ceremony', '2017-08-29', 'Ngaben, also known as Pitra Yadyna, Pelebon or cremation ceremony, is the Hindu funeral ritual of Bali, Indonesia.[3][4][5] A Ngaben is performed, states Victoria Williams, to release the soul of a dead person so that it can enter the upper realm where it can wait for it to be reborn or become liberated from the cycles of rebirths.[1][6] The Balinese Hindu theology holds that there is a competition between evil residents of the lower realm to capture this soul, and a proper cremation enhances the chance that it may reach the upper realm.', 1, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 1, 6, 3),
(20, 'Ancol Park', '2017-08-29', 'Ancol', 0, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 6, 6, 2),
(21, 'Halo test', '2017-08-29', '', 0, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 6, 6, 2),
(22, 'Blank123', '2017-08-29', '', 0, 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg', 6, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'product'),
(2, 'destination'),
(3, 'culture'),
(4, 'event'),
(5, 'news'),
(6, 'hotel');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `article_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `article_id`, `user_id`, `comment_content`) VALUES
(1, 9, 6, 'first comment'),
(3, 9, 6, 'halo'),
(4, 17, 8, 'Comment dari user kikka. Lorem Ipsum Dolor bla bla bla Comment dari user kikka. Lorem Ipsum Dolor bla bla bla Comment dari user kikka. Lorem Ipsum Dolor bla bla bla'),
(5, 10, 29, 'Love izza tapi udah putus');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_content` text NOT NULL,
  `hotel_address` text NOT NULL,
  `hotel_rate` int(11) NOT NULL,
  `hotel_image` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_content`, `hotel_address`, `hotel_rate`, `hotel_image`, `place_id`) VALUES
(4, 'Merlynn Park Hotel', 'Blessed with a beautiful landscape of hills and mountains complemented with clear green and blue ocean, the town of Maumere, capital of Sikka regency on the northern coast of Flores Island in East Nusa Tenggara Province, will be one of the most anticipated ports of call in the annual international sailing event of Multihull Solutions Wonderful Sail 2 Indonesia 2017. The ''Cape of Flowers'' -as the town is aptly dubbed, is expecting the arrival of 58 international yachts from various countries on 24th -26th August 2017.\r\n\r\n"After visiting Wakatobi, the spectacular underwater paradise at the tip of South East Sulawesi, all yacht rally participants will continue sailing and make port in Maumere for 3 days before further exploring other beautiful islands across the archipelago," said Raymond Lesmana, Organizer of Wonderful Sail 2 Indonesia. Raymond further added that in total, there will be about 70 yachts since more yachts will join later after the Wakatobi stop. These yachts will bring along some 150 international tourists from different countries including from Australia, New Zealand, USA, Canada, Germany, UK, Netherland, Belgium, Italy, Spain, and France.', 'Jl. K.H.Hasyim Ashari 29-31, Central Jakarta, Jakarta Pusat, Indonesia, 10130', 0, '30000001000002847_wh_2.jpg', 6),
(5, 'Hotel Kaisar Jakarta', '', 'Jalan PLN No. 1 Duren Tiga, Jakarta Selatan, Indonesia, 12780', 2, '30000001000018400_wh_2.jpg', 6),
(6, 'Whiz Prime Hotel Balikpapan', '', 'Jl. Jend. Sudirman No. 321, Balikpapan, Indonesia, 76114', 0, '30000002000396271_wh_2.jpg', 10),
(7, 'Cleo Hotel Jemursari Surabaya', '', 'Jalan Raya Jemursari No.157, Surabaya, Indonesia', 0, '30000002000531448_wh_2.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `hotel_room_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_amount` int(11) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `room_facility` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_room_id`, `hotel_id`, `room_name`, `room_capacity`, `room_price`, `room_amount`, `room_image`, `room_facility`) VALUES
(4, 4, 'Reguler', 2, 1200000, 7, '30000001000002847_wh_2.jpg', 'Luas : 8X4m, Ruang Tamu : Tidak, Makan : Tidak'),
(5, 4, 'Exclusive', 4, 2400000, 4, '30000001000002847_wh_2.jpg', 'Luas : 12X12m, Makan : Ya, Kolam Renang : Ya, Kamar Mandi : 2, Beranda : Ya'),
(6, 4, 'meeting', 8, 5000000, 3, '30000001000002847_wh_2.jpg', 'Luas : 12X12m, Makan : Ya, Kolam Renang : Ya, Kamar Mandi : 2, Beranda : Ya, Ruang Tamu : Ya, Mini Bar : Ya, Tempat tidur : 2'),
(7, 5, 'Reguler', 2, 1000000, 8, '', 'Kamar mandi, ruang makan');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `place_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_name`, `place_picture`) VALUES
(1, 'bali', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(2, 'medan', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(3, 'banyuwangi', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(4, 'riau', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(5, 'papua', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(6, 'jakarta', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(7, 'lombok', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(8, 'java', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(9, 'bangil', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(10, 'balik papan', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(11, 'sidoarjo', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(12, 'other', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(13, 'indonesia', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg'),
(14, 'palembang', 'dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `reserved` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_room_id` int(11) NOT NULL,
  `transaction_pay` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_code`, `checkin`, `checkout`, `reserved`, `user_id`, `hotel_room_id`, `transaction_pay`, `status`) VALUES
(3, 'ZBWFGIEBMTI4DHAGABU8', '2017-08-16', '2017-08-17', 1, 31, 6, 0, 3),
(4, 'W1ZED1IDLABPELW5Y59G', '2017-09-01', '2017-09-02', 1, 31, 4, 0, 3),
(5, 'RXULXVWGUGNTLVGEIPRU', '2017-08-15', '2017-08-16', 1, 37, 4, 0, 3),
(6, 'OBOLSN0EF4FUN5UFDSOR', '2017-08-24', '2017-08-25', 1, 6, 5, 0, 1),
(11, 'XSIZQI6S22ZM055AORWY', '0000-00-00', '2017-09-13', 1, 6, 6, 0, 3),
(12, 'W93L7FUBYBNKC2DJ5VBC', '2017-09-15', '2017-09-17', 1, 4, 4, 2400000, 9),
(13, 'C335KZ479AYWKOX0GQOQ', '2017-09-16', '2017-09-18', 1, 38, 7, 2000000, 9),
(14, 'RIH2JB0ZK4LLULSQMMKC', '2017-09-30', '2017-10-01', 1, 26, 5, 2400000, 0),
(15, 'YQY2N86UBYQ3MKJ06GYV', '2017-09-30', '2017-10-02', 3, 37, 4, 7200000, 3),
(16, 'BD19RZ3HDBEXMHF3Q1OI', '2017-09-20', '2017-09-22', 1, 29, 6, 10000000, 0),
(17, 'O18OZI0E36ZNFFSEYBWS', '2017-09-21', '2017-09-22', 1, 22, 5, 2400000, 3),
(18, '90SSE3HVHEMWJTJZ5F6S', '2017-09-14', '2017-09-15', 2, 38, 5, 4800000, 3),
(19, '9D4MQB1BRON0Y25J3G7N', '0000-00-00', '2017-09-15', 0, 4, 4, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `transaction_history_id` int(11) NOT NULL,
  `transaction_history_date` datetime NOT NULL,
  `transaction_history_process` varchar(255) NOT NULL,
  `transaction_history_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`transaction_history_id`, `transaction_history_date`, `transaction_history_process`, `transaction_history_code`) VALUES
(1, '2017-09-12 00:00:00', 'new', 'H713EYJKQ46RT6F4LLJV'),
(2, '2017-09-12 08:29:49', '3', 'H713EYJKQ46RT6F4LLJV'),
(3, '2017-09-12 08:34:27', '9', 'H713EYJKQ46RT6F4LLJV'),
(4, '2017-09-12 09:00:31', 'delete', '1'),
(5, '2017-09-12 09:03:22', 'delete', '4UZCITK8922HPLAF31JL'),
(6, '2017-09-12 09:04:53', 'new', 'XSIZQI6S22ZM055AORWY'),
(7, '2017-09-14 08:31:43', 'new', 'W93L7FUBYBNKC2DJ5VBC'),
(8, '2017-09-15 16:19:37', '2', '4UZCITK8922HPLAF31J1'),
(9, '2017-09-15 16:20:08', 'delete', '4UZCITK8922HPLAF31J1'),
(10, '2017-09-15 16:20:30', 'new', 'C335KZ479AYWKOX0GQOQ'),
(11, '2017-09-15 17:01:58', 'new', 'RIH2JB0ZK4LLULSQMMKC'),
(12, '2017-09-15 17:02:10', '9', 'RIH2JB0ZK4LLULSQMMKC'),
(13, '2017-09-15 17:03:05', '0', 'RIH2JB0ZK4LLULSQMMKC'),
(14, '2017-09-15 17:47:25', 'new', 'YQY2N86UBYQ3MKJ06GYV'),
(15, '2017-09-15 17:47:40', 'new', 'BD19RZ3HDBEXMHF3Q1OI'),
(16, '2017-09-15 17:47:58', 'new', 'O18OZI0E36ZNFFSEYBWS'),
(17, '2017-09-15 17:48:10', 'new', '90SSE3HVHEMWJTJZ5F6S'),
(18, '2017-09-15 17:48:52', '1', 'OBOLSN0EF4FUN5UFDSOR'),
(19, '2017-09-15 17:48:58', '1', 'BD19RZ3HDBEXMHF3Q1OI'),
(20, '2017-09-15 17:49:13', '9', 'W93L7FUBYBNKC2DJ5VBC'),
(21, '2017-09-15 19:13:39', '0', 'BD19RZ3HDBEXMHF3Q1OI'),
(22, '2017-09-15 19:14:42', '9', 'C335KZ479AYWKOX0GQOQ'),
(23, '2017-09-15 19:16:12', 'new', '9D4MQB1BRON0Y25J3G7N'),
(24, '2017-09-15 19:16:21', '9', '9D4MQB1BRON0Y25J3G7N');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `level`, `picture`) VALUES
(4, 'haloEDITED', 'halo@halo.com', 'halo1234', 0, ''),
(6, 'Administrator', 'admin@admin.admin', 'admin123', 1, ''),
(7, 'testing123', 'testing@test.test', 'testing123', 1, ''),
(8, 'Kikka chan', 'kikka@kikka.com', 'kikka123', 0, ''),
(18, 'abogoboga', 'abo@abo.abo', 'abogoboga', 0, ''),
(20, 'die@diedie@die', 'die@die.die', 'die@diedie@die', 0, ''),
(21, 'massages2', 'massages@mail.com', 'massages', 0, ''),
(22, 'googleman', 'google@google.com', 'googleman', 0, ''),
(23, 'halo@halo.halo', 'halo@halo.halo', 'halohalohalo', 0, ''),
(26, 'checkpdo', 'check@pdo.check', 'checkpdo', 0, ''),
(29, 'Farizah123', 'fariz@gmail.com', 'farizah123', 0, ''),
(31, 'bayusujadmiko', 'bayu@sujad.miko', 'bayusujadmiko', 0, ''),
(34, 'blank123', 'blank@blank.blank', '', 0, ''),
(36, 'whereare', 'where@where.com', 'where123', 0, ''),
(37, 'aqiranime', 'aqira@aqira.nime', 'aqiranime', 0, ''),
(38, 'demodemo', 'demo@demo.demo', 'demodemo', 0, ''),
(39, 'Operator', 'operator@opera.tor', 'operator', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `index_user` (`user_id`),
  ADD KEY `index_category` (`category_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `index_article` (`article_id`),
  ADD KEY `index_user` (`user_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `fk_hotel_place` (`place_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`hotel_room_id`),
  ADD KEY `fk_hotel_room` (`hotel_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`),
  ADD KEY `fk_trasaction_user` (`user_id`),
  ADD KEY `room_id` (`hotel_room_id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`transaction_history_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `hotel_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `transaction_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_place` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_artikel` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD CONSTRAINT `fk_hotel_room` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction_room` FOREIGN KEY (`hotel_room_id`) REFERENCES `hotel_room` (`hotel_room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
