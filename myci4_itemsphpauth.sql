-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2020 a las 19:43:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myci4_itemsphpauth`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `idcategoria` varchar(32) DEFAULT NULL,
  `id_padre` int(11) DEFAULT 0,
  `nivel` int(11) DEFAULT NULL,
  `tiene_hijos` varchar(2) DEFAULT 'NO',
  `categoria` varchar(60) DEFAULT 'Categoria',
  `descripcion_cat` varchar(120) DEFAULT 'Descripcion',
  `tiene_articulo` tinyint(1) DEFAULT 0,
  `orden_cat` int(4) DEFAULT 1,
  `color_cat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `idcategoria`, `id_padre`, `nivel`, `tiene_hijos`, `categoria`, `descripcion_cat`, `tiene_articulo`, `orden_cat`, `color_cat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fe234FtyT0aZJOH5VPL1EAYk8RmSM6sC', 0, 1, 'NO', 'Sin Clasificar', 'Descripcion de Categoria', 0, 0, '#97267c', '2020-04-12 09:54:37', '2020-04-12 09:54:37', NULL),
(2, 'gay0CSorFHPI8uGB7hEMvLszpNUdOT6K', 0, 1, 'NO', 'Categoria A', 'Descripcion de Categoria', 0, 0, '#1f2e32', '2020-04-12 09:54:37', '2020-04-12 09:54:37', NULL),
(3, 'HJKjwUExiFrYfyCq6BOVkblzd40hm9pu', 0, 1, 'SI', 'Categoria B', 'Descripcion de Categoria', 0, 0, '#30d144', '2020-04-12 09:54:37', '2020-04-12 02:55:08', NULL),
(4, 'G63sHJFj4wgfN5mTrDIiauLdA1kOvVbq', 0, 1, 'NO', 'Categoria C', 'Descripcion de Categoria', 0, 0, '#bd7c2f', '2020-04-12 09:54:37', '2020-04-12 09:54:37', NULL),
(5, 'x1vVHdwmMagRsYArEyZKJlC4OW3fQzup', 0, 1, 'NO', 'Categoria D', 'Descripcion de Categoria', 0, 0, '#c32534', '2020-04-12 09:54:37', '2020-04-12 09:54:37', NULL),
(6, 'KlN2XgRJyt6suMGq5Sxn4EvYeABCfHw9', 3, 2, 'SI', 'Subcategoria BB', 'Sub cat. Categoria B', 0, 1, '#30d144', '2020-04-12 09:55:08', '2020-04-12 02:55:32', NULL),
(7, 'jQJIWnroTpAl9652N4gewRByCH3VXdmv', 6, 3, 'NO', 'Subcategoria BBB', 'Sub cat. Subcategoria BB', 0, 1, '#30d144', '2020-04-12 09:55:32', '2020-04-12 09:55:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `iditem` varchar(32) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `texto_item` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `iditem`, `id_categoria`, `item`, `texto_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bwYTpiLQ3uMXEPg46x0kG9nWK7eOBfSI', 6, 'Item Ratke, Ondricka and Osinski', 'King said to the whiting,\' said the Dodo solemnly, rising to its feet, ran round the rosetree; for, you see, as well go in at the proposal. \'Then the words all coming different, and then said, \'It was much pleasanter at home,\' thought poor Alice, \'to pretend to be seen--everything seemed to have finished,\' said the Caterpillar took the hookah into its nest. Alice crouched down among the trees.', '2020-04-13 09:48:37', '2020-09-25 15:12:46', NULL),
(2, 'kQ6HC8uzoWA39DMJNcysv5RKFZOP0VBb', 2, 'Item Bechtelar and Sons', 'Do you think, at your age, it is almost certain to disagree with you, sooner or later. However, this bottle does. I do so like that curious song about the twentieth time that day. \'A likely story indeed!\' said Alice, looking down with wonder at the proposal. \'Then the words did not quite know what you would have made a rush at Alice the moment he was obliged to write this down on their hands and.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(3, 'nAEBDGd1HRasVeZ5ixFXgJUP7hpOzN0k', 5, 'Item Hamill, Ruecker and Welch', 'Zealand or Australia?\' (and she tried to fancy to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it is, I suppose?\' said Alice. \'That\'s the first verse,\' said the Gryphon, before Alice could hardly hear the words:-- \'I speak severely to my right size for ten minutes together!\' \'Can\'t remember WHAT things?\' said the last few minutes it puffed away without being invited,\' said the.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(4, 'XsI81ZQPtKE4BN5VuJyvUATpoS9OhgaY', 3, 'Item Veum-Rice', 'ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense I\'m talking!\' Just then she walked down the chimney, has he?\' said Alice sharply, for she had found her head through the door, and knocked. \'There\'s no sort of present!\' thought Alice. \'I wonder what Latitude or Longitude either, but thought they were mine before. If I or she should chance to be.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(5, 'EL6dFxlV5fKk1p3zNTh4nsw70r9aqcoQ', 3, 'Item Willms Groupqqqqqqqqqqqqqqq', 'Alice, flinging the baby was howling so much at this, but at any rate it would be very likely to eat or drink under the table: she opened it, and found quite a conversation of it in asking riddles that have no idea what a wonderful dream it had been, it suddenly appeared again. \'By-the-bye, what became of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. \'He.', '2020-04-13 09:48:37', '2020-09-19 08:15:05', NULL),
(6, 'jqtPmIYnFgLSx6BobyZuC5cXzKDhW7OG', 3, 'Item Torphy, Marks and Kris', 'Queen shouted at the Hatter, it woke up again as quickly as she fell past it. \'Well!\' thought Alice to find that her idea of the trees upon her knee, and looking at the Gryphon said, in a tone of great surprise. \'Of course you know what to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it puzzled her too much, so she sat on, with closed eyes, and feebly stretching out one paw, trying to find that she.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(7, '3nCpxuKtz7OEFs1Xeg8HYZJTBhAwSoq4', 3, 'Item Lindgren Inc', 'How queer everything is to-day! And yesterday things went on in a tone of this was the matter with it. There was nothing on it (as she had to kneel down on the twelfth?\' Alice went on saying to herself, \'it would be four thousand miles down, I think--\' (she was obliged to have lessons to learn! Oh, I shouldn\'t like THAT!\' \'Oh, you can\'t help that,\' said Alice. \'Why, SHE,\' said the Pigeon; \'but I.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(8, 'QnAmTfjNhWBr4U1C9zZV65EbgtSkHspx', 2, 'Item Kilback, Barrows and O\'Hara', 'Was kindly permitted to pocket the spoon: While the Duchess by this time, and was just going to happen next. The first question of course was, how to speak good English); \'now I\'m opening out like the name: however, it only grinned a little animal (she couldn\'t guess of what sort it was) scratching and scrambling about in the face. \'I\'ll put a stop to this,\' she said this, she came suddenly upon.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(9, 'QCwiSTMINEzbHPV9qD5npKg46sZXUF0e', 3, 'Item Heaney Inc', 'Shall I try the first minute or two, it was neither more nor less than no time to avoid shrinking away altogether. \'That WAS a curious croquet-ground in her hands, and was going a journey, I should have croqueted the Queen\'s hedgehog just now, only it ran away when it saw mine coming!\' \'How do you like the three gardeners instantly threw themselves flat upon their faces, so that her idea of the.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(10, '8kBoWnNcMUTVqwvhG9dQyOfmJgaeupzj', 5, 'Item Runolfsdottir-Schimmel', 'Tarts? The King laid his hand upon her arm, that it ought to be Involved in this affair, He trusts to you never to lose YOUR temper!\' \'Hold your tongue!\' added the Gryphon, sighing in his confusion he bit a large dish of tarts upon it: they looked so grave that she wasn\'t a really good school,\' said the Gryphon. \'How the creatures order one about, and make THEIR eyes bright and eager with many a.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(11, 'h2CYVJFXHplykMLcWzOguPI8T9bqNo4v', 2, 'Item Hirthe-VonRueden', 'I didn\'t know how to get out again. Suddenly she came upon a little glass table. \'Now, I\'ll manage better this time,\' she said to the other queer noises, would change to dull reality--the grass would be quite as much right,\' said the Caterpillar; and it set to work throwing everything within her reach at the Queen, \'Really, my dear, I think?\' \'I had NOT!\' cried the Gryphon. Alice did not notice.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(12, '98ITZlqAreX1svjbxUW7V6f0HJy4YREC', 3, 'Item Buckridge, Weimann and Hettinger', 'Hatter. He came in with a cart-horse, and expecting every moment to think this a very long silence, broken only by an occasional exclamation of \'Hjckrrh!\' from the Gryphon, and, taking Alice by the English, who wanted leaders, and had been (Before she had finished, her sister sat still and said to herself, and fanned herself with one finger for the pool a little faster?\" said a sleepy voice.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(13, 'rklmMDUt1p8QNq3ZheF2dAcyoBTKCXjb', 2, 'Item Corwin, Trantow and Senger', 'Next came an angry voice--the Rabbit\'s--\'Pat! Pat! Where are you?\' And then a row of lodging houses, and behind it was very deep, or she should push the matter with it. There was a good many little girls eat eggs quite as safe to stay in here any longer!\' She waited for a moment to be no sort of knot, and then hurried on, Alice started to her ear. \'You\'re thinking about something, my dear, and.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(14, 'TwfU4ogaHnqhIe8xDVFbd26Sy3vr1lzm', 7, 'Item Welch and Sons', 'The Cat\'s head with great curiosity. \'Soles and eels, of course,\' said the King. \'Shan\'t,\' said the Queen, pointing to Alice for protection. \'You shan\'t be able! I shall ever see you any more!\' And here Alice began in a rather offended tone, \'so I can\'t take LESS,\' said the Duchess; \'I never heard it before,\' said Alice,) and round goes the clock in a natural way. \'I thought you did,\' said the.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(15, 'rwC42Y18jLBhu9X6NszFSp5IOmefaE0d', 6, 'Item Emmerich Group', 'Queen\'s hedgehog just now, only it ran away when it had entirely disappeared; so the King sharply. \'Do you take me for his housemaid,\' she said to the Knave. The Knave shook his head sadly. \'Do I look like it?\' he said, turning to Alice with one foot. \'Get up!\' said the Rabbit\'s voice; and Alice thought the poor child, \'for I never heard it muttering to itself in a hurried nervous manner.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(16, 'Bu1FQEDgq4p3LsaWZfIdMAUxbo0kXhGJ', 2, 'Item Schaefer-Steuber', 'Dodo, a Lory and an Eaglet, and several other curious creatures. Alice led the way, was the White Rabbit interrupted: \'UNimportant, your Majesty means, of course,\' said the Rabbit say to itself, \'Oh dear! Oh dear! I wish you could draw treacle out of sight, they were all ornamented with hearts. Next came an angry tone, \'Why, Mary Ann, and be turned out of sight, they were gardeners, or soldiers.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(17, 'UQC85OI6rcFBXkl2gDdNty0KEvobwuHi', 3, 'Item Blanda Inc', 'Alice. \'Stand up and said, very gravely, \'I think, you ought to speak, but for a good thing!\' she said to herself, and nibbled a little timidly, for she thought, \'till its ears have come, or at any rate, the Dormouse began in a very little use, as it was certainly not becoming. \'And that\'s the jury, of course--\"I GAVE HER ONE, THEY GAVE HIM TWO--\" why, that must be kind to them,\' thought Alice.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(18, 'MxWR48JE9nsfo2ZliV5recBTCN3azqAm', 2, 'Item Keebler Inc', 'I\'ll go round a deal faster than it does.\' \'Which would NOT be an advantage,\' said Alice, \'a great girl like you,\' (she might well say that \"I see what was the first verse,\' said the Pigeon in a louder tone. \'ARE you to learn?\' \'Well, there was room for YOU, and no room at all this time. \'I want a clean cup,\' interrupted the Hatter: \'as the things I used to it!\' pleaded poor Alice began in a.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(19, 'JkRWdgFyfsDCZYlTEmbMt8aPioqp6X35', 3, 'Item Kovacek Group', 'Alice remained looking thoughtfully at the door that led into a butterfly, I should think!\' (Dinah was the first witness,\' said the Duck: \'it\'s generally a ridge or furrow in the lap of her ever getting out of his pocket, and was just possible it had struck her foot! She was close behind it was looking at everything that Alice said; \'there\'s a large arm-chair at one end to the jury, and the.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(20, '2Hu45J9BXDYMKQtVnyePN6hZGCi7aUm8', 7, 'Item Mann-Ziemann', 'TWO little shrieks, and more faintly came, carried on the OUTSIDE.\' He unfolded the paper as he could think of anything to put his shoes off. \'Give your evidence,\' said the Dodo suddenly called out \'The race is over!\' and they repeated their arguments to her, one on each side, and opened their eyes and mouths so VERY nearly at the sudden change, but she had finished, her sister on the slate.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(21, 'JPdUeD72wK9HNgpcquZfyaz5XEWVmQMh', 1, 'Item Jenkins and Sons', 'March Hare interrupted, yawning. \'I\'m getting tired of sitting by her sister sat still just as well. The twelve jurors were all shaped like the look of the court, by the little golden key and hurried off to the other two were using it as she was now, and she crossed her hands on her toes when they liked, and left off staring at the March Hare. Alice was thoroughly puzzled. \'Does the boots and.', '2020-04-13 09:48:37', '2020-04-13 09:48:37', NULL),
(22, 'Yyli2DULkXm5Wse3ocKuB4hSatpvJEnN', 1, 'Item Pfeffer Group', 'Bill, I fancy--Who\'s to go on with the clock. For instance, suppose it doesn\'t matter much,\' thought Alice, \'as all the jelly-fish out of the legs of the busy farm-yard--while the lowing of the March Hare. \'He denies it,\' said the Gryphon, and all would change to tinkling sheep-bells, and the sounds will take care of the trees behind him. \'--or next day, maybe,\' the Footman remarked, \'till.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(23, 'mBVcFiXCYpQ9y26vnwfqEK0oJZj871Dh', 2, 'Item Tillman, Kiehn and Hill', 'Majesty!\' the Duchess said in a low, hurried tone. He looked anxiously round, to make ONE respectable person!\' Soon her eye fell upon a little pattering of footsteps in the last few minutes, and she heard was a little quicker. \'What a curious feeling!\' said Alice; \'all I know is, it would be grand, certainly,\' said Alice, who was trembling down to them, and just as if she were saying lessons.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(24, 'uH3bPos0qaRCMIS4rlLE1m26kcwi8XVp', 3, 'Item Schinner and Sons', 'Alice gave a little girl,\' said Alice, \'I\'ve often seen them so shiny?\' Alice looked at Alice. \'I\'M not a bit hurt, and she felt very glad to find that she never knew so much surprised, that for the White Rabbit read:-- \'They told me he was speaking, and this Alice would not give all else for two reasons. First, because I\'m on the shingle--will you come to the Dormouse, who seemed too much.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(25, 'TICvU4MoahVQAiKn2Xg3p1BxGkWRYdem', 2, 'Item Marvin-Volkman', 'Oh dear, what nonsense I\'m talking!\' Just then her head made her so savage when they had to ask help of any that do,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if there were no tears. \'If you\'re going to happen next. First, she tried her best to climb up one of the ground, Alice soon began talking to herself, \'whenever I eat one of the earth. At last the.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(26, 'GjSDlnYCBZbyw3x5XVUhc0se1QmaLiK7', 3, 'Item Mante PLC', 'Waiting in a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they can\'t prove I did: there\'s no harm in trying.\' So she began looking at the place of the doors of the other guinea-pig cheered, and was just going to happen next. \'It\'s--it\'s a very hopeful tone though), \'I won\'t interrupt again. I dare say there may be ONE.\' \'One, indeed!\' said the Duchess, \'chop off her.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(27, 'zaVroZCtERnBupHOM7q43ijbKI6JvN5F', 5, 'Item Ritchie-Wisozk', 'MINE.\' The Queen had never been so much into the court, she said to the jury, of course--\"I GAVE HER ONE, THEY GAVE HIM TWO--\" why, that must be the right size, that it would not give all else for two reasons. First, because I\'m on the door of the jury had a bone in his turn; and both creatures hid their faces in their proper places--ALL,\' he repeated with great curiosity, and this was her turn.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(28, 'WLhpYU65TOKvakfqZ1PMRyeGVJI94cjz', 2, 'Item Runolfsdottir-Olson', 'YOU are, first.\' \'Why?\' said the March Hare. \'It was the first to speak. \'What size do you know the meaning of it in a twinkling! Half-past one, time for dinner!\' (\'I only wish they WOULD put their heads downward! The Antipathies, I think--\' (for, you see, as well go back, and see that she had but to get to,\' said the Footman, and began an account of the garden, called out as loud as she could.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(29, 'xSfaQ3JhdlvrWBoFZPbUT51Y0LIwzHpE', 6, 'Item Becker, McDermott and Abshire', 'CHAPTER VI. Pig and Pepper For a minute or two, and the words did not notice this last remark. \'Of course not,\' said the Dormouse, who was gently brushing away some dead leaves that had slipped in like herself. \'Would it be of any one; so, when the tide rises and sharks are around, His voice has a timid and tremulous sound.] \'That\'s different from what I say,\' the Mock Turtle. \'No, no! The.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(30, 'QydFq7PA08hHVcw3ZGXgBlSe1NYOnLEt', 2, 'Item Muller Ltd', 'For he can EVEN finish, if he had a consultation about this, and she had asked it aloud; and in despair she put one arm out of court! Suppress him! Pinch him! Off with his knuckles. It was as much right,\' said the Duchess; \'and most of \'em do.\' \'I don\'t think they play at all comfortable, and it said nothing. \'This here young lady,\' said the Dormouse. \'Fourteenth of March, I think you\'d better.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(31, 'DkowR3uHalAzeJGLtSXyipdK0h4MPU6B', 2, 'Item Lubowitz-Zulauf', 'Alice began to cry again. \'You ought to tell me the list of singers. \'You may go,\' said the White Rabbit. She was walking by the pope, was soon submitted to by all three dates on their faces, and the happy summer days. THE.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(32, 'ZiKBsWGEYH5XahwVz7rCQc2PgqRUx93L', 2, 'Item Schmidt-Hettinger', 'She waited for a dunce? Go on!\' \'I\'m a poor man, your Majesty,\' said the Caterpillar. \'Well, perhaps your feelings may be different,\' said Alice; \'that\'s not at all know whether it would feel very uneasy: to be an old crab, HE was.\' \'I never could abide figures!\' And with that she began very cautiously: \'But I don\'t know,\' he went on, \'you see, a dog growls when it\'s angry, and wags its tail.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(33, 'pljdbR3Xi9GLeV1oCQTDYvs7utxMB6UF', 7, 'Item Runolfsson, Berge and Gusikowski', 'Bill! I wouldn\'t be so stingy about it, even if I know is, it would feel very queer indeed:-- \'\'Tis the voice of thunder, and people began running about in the pool of tears which she concluded that it had made. \'He took me for a baby: altogether Alice did not appear, and after a few minutes to see the Mock Turtle sang this, very slowly and sadly:-- \'\"Will you walk a little more conversation.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(34, 'nJvaSpWcxwdMKO2QVb3DhUsBC9qAH4EF', 6, 'Item Kreiger, Wunsch and Abshire', 'So she called softly after it, and on it in large letters. It was the Hatter. Alice felt dreadfully puzzled. The Hatter\'s remark seemed to Alice as she had peeped into the wood to listen. \'Mary Ann! Mary Ann!\' said the Knave, \'I didn\'t write it, and kept doubling itself up and repeat \"\'TIS THE VOICE OF THE SLUGGARD,\"\' said the Caterpillar. Alice said to the end of the e--e--evening, Beautiful.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(35, 'OQqWDXI82hKpB1g6HVM5zdbelRsSfxYm', 7, 'Item Pacocha-Hintz', 'Alice began, in a minute or two. \'They couldn\'t have wanted it much,\' said Alice, seriously, \'I\'ll have nothing more to be nothing but a pack of cards!\' At this the whole court was in managing her flamingo: she succeeded in bringing herself down to them, and it\'ll sit up and down in an offended tone, and she soon made out what it meant till now.\' \'If that\'s all the other players, and shouting.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(36, 'BSUNTwVWXobpg6cyOdvaD0hG8RinsqYu', 5, 'Item Farrell, Bahringer and Jenkins', 'Duchess! The Duchess! Oh my fur and whiskers! She\'ll get me executed, as sure as ferrets are ferrets! Where CAN I have done just as well. The twelve jurors were all talking together: she made some tarts, All on a little anxiously. \'Yes,\' said Alice to herself, in a long, low hall, which was lit up by two guinea-pigs, who were lying round the neck of the house, and have next to her. The Cat.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(37, 'hKpof6UIETabXv1dxctYCmJS7FNyZkq5', 3, 'Item Batz Ltd', 'But at any rate, the Dormouse shook its head down, and was just going to dive in among the people that walk with their heads down and make one repeat lessons!\' thought Alice; \'I must be on the OUTSIDE.\' He unfolded the paper as he came, \'Oh! the Duchess, \'chop off her unfortunate guests to execution--once more the shriek of the Queen\'s hedgehog just now, only it ran away when it saw mine.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(38, 'sKx4LNZYGX60umvf9WQPM5FBpb3Ora8J', 2, 'Item Bauch, Kuhn and Klocko', 'And he added in a great hurry. An enormous puppy was looking for them, but they began solemnly dancing round and get ready to ask his neighbour to tell its age, there was a general clapping of hands at this: it was growing, and very soon came upon a little timidly, for she could see it again, but it puzzled her too much, so she went round the hall, but they all crowded round her once more, while.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(39, 'KQuNUOZp7jirqh0LfG9XPt3MEcz1s8ID', 1, 'Item DuBuque PLC', 'Alice whispered, \'that it\'s done by everybody minding their own business!\' \'Ah, well! It means much the most confusing thing I ask! It\'s always six o\'clock now.\' A bright idea came into her face. \'Very,\' said Alice: \'--where\'s the Duchess?\' \'Hush! Hush!\' said the King, going up to her very much to-night, I should think very likely it can be,\' said the others. \'Are their heads down and make THEIR.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(40, 'cEMJvZgF35WOQknVS6Up2wsGAH7oIdyX', 2, 'Item Hackett-Thiel', 'HERE.\' \'But then,\' thought she, \'if people had all to lie down on one knee. \'I\'m a poor man,\' the Hatter replied. \'Of course they were\', said the Hatter, and, just as the March Hare will be When they take us up and down looking for them, but they were trying to touch her. \'Poor little thing!\' It did so indeed, and much sooner than she had not a moment to be a comfort, one way--never to be.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(41, '0VJ2vQykWpPxsTaz1dn4I6iZM5CtejgH', 1, 'Item Bogisich, Langosh and Abbott', 'Why, I haven\'t had a little bit, and said \'That\'s very curious!\' she thought. \'But everything\'s curious today. I think you\'d better leave off,\' said the King. \'Then it wasn\'t trouble enough hatching the eggs,\' said the Hatter, \'or you\'ll be telling me next that you never even introduced to a mouse, you know. Which shall sing?\' \'Oh, YOU sing,\' said the Rabbit hastily interrupted. \'There\'s a great.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(42, 'yNYF8icgqKPTwaLoRrJpdkWUfbeS73x5', 6, 'Item Leannon, Schoen and Bernier', 'T!\' said the Dodo, pointing to the baby, it was impossible to say \'I once tasted--\' but checked herself hastily. \'I thought you did,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know I\'m mad?\' said Alice. \'Why, there they are!\' said the Duchess: \'and the moral of that dark hall, and wander about among those beds of bright flowers and the Queen added to one of the other.', '2020-04-13 09:48:38', '2020-04-13 09:48:38', NULL),
(43, '48xUDLGdvcrmHXFfhl02WOsiTARpeoZQ', 3, 'Item Kris-Ryan', 'At this the White Rabbit read:-- \'They told me you had been looking at the flowers and those cool fountains, but she got to the other end of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. Alice felt a little while, however, she again heard a little worried. \'Just about as it went, \'One side will make you dry enough!\' They all returned from him to you.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(44, 'uYRz23bwcpCMyoTO1IB8PHqxeNF67LWm', 2, 'Item Kohler-Kerluke', 'Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, you know.\' \'Who is this?\' She said the Hatter. \'Does YOUR watch tell you how it was growing, and very angrily. \'A knot!\' said Alice, who felt ready to agree to everything that was lying under the sea--\' (\'I haven\'t,\' said Alice)--\'and perhaps you were never even spoke to Time!\' \'Perhaps not,\' Alice cautiously replied: \'but I haven\'t.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(45, 'QlRH4kdqtrOYiaDf5Zg87oVeNS02KWUw', 4, 'Item Vandervort Group', 'Duchess: \'what a clear way you go,\' said the Cat. \'I said pig,\' replied Alice; \'and I do hope it\'ll make me smaller, I can find it.\' And she kept on good terms with him, he\'d do almost anything you liked with the Queen of Hearts, and I had to ask help of any good reason, and as the Rabbit, and had just succeeded in getting its body tucked away, comfortably enough, under her arm, and timidly said.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(46, 'vde9TFENGqgcQ5WmaijOfpkoVwHSbLMU', 5, 'Item Boyle-Kub', 'Alice hastily replied; \'at least--at least I know I do!\' said Alice indignantly. \'Ah! then yours wasn\'t a bit afraid of them!\' \'And who are THESE?\' said the Duchess, as she fell past it. \'Well!\' thought Alice \'without pictures or conversations in it, \'and what is the same as they lay on the shingle--will you come to the Gryphon. \'Turn a somersault in the air. Even the Duchess said after a few.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(47, '6vkByp2bLl49iDO17M0hHGCASJ5nogWq', 1, 'Item Dach-Hoppe', 'And it\'ll fetch things when you have to turn into a pig, and she did not come the same age as herself, to see how the game was going on shrinking rapidly: she soon made out that it was impossible to say \'creatures,\' you see, Alice had learnt several things of this ointment--one shilling the box-- Allow me to him: She gave me a pair of white kid gloves, and was immediately suppressed by the pope.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(48, 'VUC8fWxdO1nFNuJrplXDwjgKHQv30LRa', 3, 'Item Smith, Bartoletti and Hill', 'For anything tougher than suet; Yet you balanced an eel on the bank, with her head struck against the roof of the hall: in fact she was a sound of a water-well,\' said the King. \'Shan\'t,\' said the Queen, \'and take this child away with me,\' thought Alice, \'shall I NEVER get any older than I am to see what this bottle was NOT marked \'poison,\' so Alice soon began talking to him,\' said Alice very.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(49, 'DkbPdtG160KJZoWvVhRTMnOx9qFzg2aH', 7, 'Item Bergstrom-Miller', 'March Hare took the hookah out of sight before the trial\'s over!\' thought Alice. \'I\'ve so often read in the world am I? Ah, THAT\'S the great question is, Who in the sun. (IF you don\'t know the song, she kept on good terms with him, he\'d do almost anything you liked with the Mouse was swimming away from her as she could, and waited till the eyes appeared, and then quietly marched off after the.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(50, 'QB3egP5rmV4Tlsj9oxqSz8nEDpARYZOX', 6, 'Item Gulgowski-Beer', 'Gryphon. \'They can\'t have anything to put it into his cup of tea, and looked at her hands, wondering if anything would EVER happen in a louder tone. \'ARE you to learn?\' \'Well, there was enough of me left to make the arches. The chief difficulty Alice found at first she would get up and said, very gravely, \'I think, you ought to have finished,\' said the Mock Turtle in the house before she came in.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(51, '4gQ7NIKjtOEJSkzr01vopMca2bwh8Cnl', 7, 'Item Rath, White and Nikolaus', 'Eaglet. \'I don\'t believe there\'s an atom of meaning in it.\' The jury all wrote down all three dates on their slates, when the tide rises and sharks are around, His voice has a timid and tremulous sound.] \'That\'s different from what I like\"!\' \'You might just as usual. \'Come, there\'s half my plan done now! How puzzling all these changes are! I\'m never sure what I\'m going to begin with.\' \'A.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(52, '3clTwQDVM7HFznAo1egOEI2WZdapKLfr', 4, 'Item Ledner, Waters and Weimann', 'I think.\' And she kept fanning herself all the rest of the wood to listen. The Fish-Footman began by producing from under his arm a great hurry. An enormous puppy was looking up into a tidy little room with a knife, it usually bleeds; and she grew no larger: still it had some kind of thing that would be like, but it just now.\' \'It\'s the first witness,\' said the Dormouse; \'VERY ill.\' Alice tried.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(53, 'qFE3MDARj1ndoZiQC9Vfu5pPXwJrBczI', 6, 'Item Muller, Schmeler and Wolff', 'Alice said to herself, in a low voice, \'Why the fact is, you know. Which shall sing?\' \'Oh, YOU sing,\' said the Lory, with a table set out under a tree in front of them, and it\'ll sit up and say \"How doth the little dears came jumping merrily along hand in hand, in couples: they were all in bed!\' On various pretexts they all crowded together at one end to the Knave. The Knave of Hearts, who only.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(54, 'fdTRk6N0Pw7i831QjECuGLt45OoVely9', 4, 'Item Crona PLC', 'How puzzling all these changes are! I\'m never sure what I\'m going to happen next. The first thing she heard her voice close to her that she was dozing off, and Alice called out \'The Queen! The Queen!\' and the Gryphon said to herself as she spoke, but no result seemed to Alice with one of the March Hare said to the door. \'Call the next verse.\' \'But about his toes?\' the Mock Turtle went on. \'We.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(55, 'wMOke2y7AIKmXG6x4rDZzPqsULYl8JFS', 3, 'Item Heathcote, Kuphal and Wiza', 'Dinah, tell me your history, you know,\' said the Caterpillar. \'Well, I shan\'t go, at any rate, the Dormouse indignantly. However, he consented to go on with the strange creatures of her voice. Nobody moved. \'Who cares for fish, Game, or any other dish? Who would not open any of them. \'I\'m sure those are not the right distance--but then I wonder if I must, I must,\' the King said to the door.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(56, 'tTrE6apoNf1esSOvI7GhRd3XmWlJMcBC', 5, 'Item Abbott Ltd', 'Then it got down off the top with its wings. \'Serpent!\' screamed the Queen. \'It proves nothing of the bill, \"French, music, AND WASHING--extra.\"\' \'You couldn\'t have wanted it much,\' said the King. \'Then it ought to be found: all she could have been changed for Mabel! I\'ll try if I only knew how to begin.\' He looked anxiously at the Queen, \'and take this young lady tells us a story.\' \'I\'m afraid.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(57, 'zkCE0QVFgGxqRNfbih3D9Kop2IlOYjXW', 7, 'Item Hoppe-Halvorson', 'The Mouse only growled in reply. \'Please come back with the next verse,\' the Gryphon never learnt it.\' \'Hadn\'t time,\' said the Eaglet. \'I don\'t much care where--\' said Alice. \'That\'s very curious!\' she thought. \'I must be Mabel after all, and I could show you our cat Dinah: I think you\'d better leave off,\' said the Cat. \'--so long as you might knock, and I could show you our cat Dinah: I think.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(58, 'azNnRtiBD07yZQCFJu3YOHjs9I2KdgTL', 4, 'Item Kuvalis, Littel and Crist', 'Waiting in a fight with another hedgehog, which seemed to quiver all over with fright. \'Oh, I BEG your pardon!\' said the Mock Turtle yet?\' \'No,\' said Alice. \'Well, I shan\'t grow any more--As it is, I suppose?\' said Alice. \'I\'m glad I\'ve seen that done,\' thought Alice. \'I\'m glad they don\'t give birthday presents like that!\' By this time with the Mouse with an air of great relief. \'Now at OURS.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(59, 'fOx5pnCFUwDkArPz0eBdWvVRaEm68G2Z', 3, 'Item Bahringer-Bruen', 'Because he knows it teases.\' CHORUS. (In which the March Hare said to Alice, they all moved off, and she had got its neck nicely straightened out, and was just in time to hear the words:-- \'I speak severely to my jaw, Has lasted the rest of my life.\' \'You are old,\' said the Duchess; \'I never saw one, or heard of \"Uglification,\"\' Alice ventured to remark. \'Tut, tut, child!\' said the sage, as he.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(60, 'OG5tU3codVMZ2bSRJXmHjLKvPEp4AFkh', 3, 'Item Veum-Brekke', 'He was an uncomfortably sharp chin. However, she did not venture to go after that into a large cat which was full of tears, until there was hardly room to grow up any more questions about it, you know--\' \'What did they live on?\' said the Duck. \'Found IT,\' the Mouse replied rather crossly: \'of course you know why it\'s called a whiting?\' \'I never went to the tarts on the bank--the birds with.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(61, 'F4uMxEZD0AtcPsSClhTYV8Lgn7aGbqiv', 3, 'Item Fritsch-Hickle', 'Alice opened the door opened inwards, and Alice\'s first thought was that it was too slippery; and when she had found her head on her hand, and a Canary called out as loud as she spoke. (The unfortunate little Bill had left off quarrelling with the Gryphon. \'I\'ve forgotten the Duchess replied, in a twinkling! Half-past one, time for dinner!\' (\'I only wish they COULD! I\'m sure I don\'t like them.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(62, 'oB1qErD7MPVdf0pOLlZk92gJanm8AHKh', 6, 'Item Mueller, Bailey and Sawayn', 'Beautiful, beautiful Soup! \'Beautiful Soup! Who cares for you?\' said the Mouse. \'--I proceed. \"Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it made Alice quite hungry to look for her, and said, without even looking round. \'I\'ll fetch the executioner went off like an honest man.\' There was certainly too.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(63, '0gxY2A7fM9vLaUXGPVriDTKwE6oF4BCe', 2, 'Item Heidenreich and Sons', 'I shall have somebody to talk nonsense. The Queen\'s Croquet-Ground A large rose-tree stood near the house down!\' said the King say in a low, timid voice, \'If you can\'t think! And oh, I wish you wouldn\'t have come here.\' Alice didn\'t think that will be the right size to do with this creature when I breathe\"!\' \'It IS the same when I sleep\" is the capital of Paris, and Paris is the same thing as a.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(64, '961sXc7xUhOPB3CImWqnRKzlgfkvFoDi', 3, 'Item Wunsch Group', 'He says it kills all the right distance--but then I wonder what Latitude or Longitude either, but thought they were getting so thin--and the twinkling of the ground, Alice soon came upon a time she had asked it aloud; and in another moment that it signifies much,\' she said to herself; \'his eyes are so VERY much out of a book,\' thought Alice to find that she ran off at once: one old Magpie began.', '2020-04-13 09:48:39', '2020-04-13 09:48:39', NULL),
(65, 'lT9bOFnRyY5jXBvSIozC60Lqd4VtAmJE', 7, 'Item McDermott, Tremblay and Weissnat', 'Writhing, of course, to begin with; and being so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said Alice, a little worried. \'Just about as it happens; and if I know I do!\' said Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, she found herself falling down a good character, But said I could say if I like being that person, I\'ll come up: if not, I\'ll stay down here.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(66, 'CFtjvSoBRMdGNJLay9XiEHc7Tp2zqO4g', 6, 'Item Gottlieb, Hodkiewicz and Gaylord', 'Mock Turtle. \'Very much indeed,\' said Alice. \'Well, I can\'t be Mabel, for I know all the creatures wouldn\'t be so easily offended, you know!\' The Mouse did not dare to laugh; and, as the hall was very fond of beheading people here; the great wonder is, that there\'s any one left alive!\' She was close behind us, and he\'s treading on my tail. See how eagerly the lobsters to the door, and knocked.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(67, 'skHD8tZh3bvO7J4NrClXPmS6e1w9iBuo', 7, 'Item Sporer, Stoltenberg and Dooley', 'Alice, always ready to sink into the court, by the time it vanished quite slowly, beginning with the other: he came trotting along in a VERY turn-up nose, much more like a sky-rocket!\' \'So you did, old fellow!\' said the Dodo. Then they both cried. \'Wake up, Dormouse!\' And they pinched it on both sides at once. The Dormouse had closed its eyes by this time). \'Don\'t grunt,\' said Alice; \'that\'s not.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(68, 'Hm6gw4rio7fXhsSBLYZUvyP8VjeF2At1', 4, 'Item Kozey-Wiegand', 'Duchess: \'and the moral of THAT is--\"Take care of the window, she suddenly spread out her hand on the bank, with her head!\' the Queen said to herself \'This is Bill,\' she gave one sharp kick, and waited to see what would be of any use, now,\' thought poor Alice, \'it would be so proud as all that.\' \'With extras?\' asked the Mock Turtle interrupted, \'if you don\'t explain it is all the things get used.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(69, 'AvXsxtFJTj83VP4naoQCkUMNgLzH9cOD', 7, 'Item Blanda and Sons', 'I mean what I see\"!\' \'You might just as well. The twelve jurors were writing down \'stupid things!\' on their faces, so that it might end, you know,\' said Alice, \'a great girl like you,\' (she might well say that \"I see what the next moment a shower of little Alice and all of you, and must know better\'; and this time she had never done such a curious dream!\' said Alice, \'and if it had lost.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(70, 'MA1fuFkywrCeUXjYqO7mlpsoW5gxcE40', 1, 'Item Pfeffer-Zieme', 'Alice think it was,\' he said. \'Fifteenth,\' said the Gryphon, the squeaking of the game, the Queen shrieked out. \'Behead that Dormouse! Turn that Dormouse out of sight before the trial\'s over!\' thought Alice. \'I don\'t see,\' said the Duchess, \'as pigs have to fly; and the Hatter grumbled: \'you shouldn\'t have put it in her hand, watching the setting sun, and thinking of little cartwheels, and the.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(71, 'VuGlXAgxLHU5yRhYfB6s7dT240MQzIcZ', 1, 'Item Tremblay PLC', 'The Cat\'s head with great emphasis, looking hard at Alice as he spoke. \'UNimportant, of course, to begin with,\' the Mock Turtle to sing \"Twinkle, twinkle, little bat! How I wonder what Latitude or Longitude I\'ve got to go and live in that ridiculous fashion.\' And he added in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an explanation. \'Oh, you\'re sure to kill it in her life before.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(72, 'bK8AXLC19jznyZQSef0iItsNgVWvBal2', 3, 'Item Walter, Skiles and Stanton', 'PROVES his guilt,\' said the Duck. \'Found IT,\' the Mouse in the morning, just time to avoid shrinking away altogether. \'That WAS a narrow escape!\' said Alice, quite forgetting in the newspapers, at the top of its mouth and began whistling. \'Oh, there\'s no use in talking to herself, \'in my going out altogether, like a mouse, That he met in the sea. The master was an immense length of neck, which.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(73, 'yo0Hfv3juazBFEOA7lPQCbpUcN4TSV1X', 1, 'Item Gislason, Langosh and Hagenes', 'She was walking hand in hand with Dinah, and saying to herself \'This is Bill,\' she gave a sudden burst of tears, until there was room for YOU, and no room at all fairly,\' Alice began, in a great thistle, to keep herself from being broken. She hastily put down yet, before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon interrupted in a long, low hall, which was lit up by a row.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(74, 'Xe9Z5uWhvnbyR8Eqjl2LdmPzDxC7Jp4r', 6, 'Item Waters-Weber', 'King said to herself. \'Shy, they seem to be\"--or if you\'d like it very hard indeed to make it stop. \'Well, I\'d hardly finished the first minute or two sobs choked his voice. \'Same as if she could even make out what she was now only ten inches high, and was just going to say,\' said the King, the Queen, but she could do to come before that!\' \'Call the next witness.\' And he added in an undertone.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(75, 'WGdNUfBn2S9Q06og31Hp5CMKP74xjmyY', 2, 'Item Grady LLC', 'Pray how did you begin?\' The Hatter was out of their wits!\' So she stood watching them, and all must have been changed several times since then.\' \'What do you know about it, you know--\' (pointing with his head!\' she said, without opening its eyes, \'Of course, of course; just what I say,\' the Mock Turtle sang this, very slowly and sadly:-- \'\"Will you walk a little three-legged table, all made a.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(76, 'aLtdzwV0eGB7OUFNxMWQE5mXK1vqYof3', 1, 'Item Leffler Ltd', 'Lory, as soon as the March Hare interrupted, yawning. \'I\'m getting tired of being upset, and their curls got entangled together. Alice was very nearly in the sky. Twinkle, twinkle--\"\' Here the Dormouse turned out, and, by the time they were IN the well,\' Alice said nothing; she had somehow fallen into a conversation. Alice replied, rather shyly, \'I--I hardly know, sir, just at present--at least.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(77, 'aY8kjx5HVUmLb0gKTc7lpr6AtZQ9nOf2', 3, 'Item Miller PLC', 'Dormouse crossed the court, arm-in-arm with the edge with each hand. \'And now which is which?\' she said to the seaside once in a great thistle, to keep back the wandering hair that WOULD always get into the book her sister kissed her, and she went nearer to make out exactly what they said. The executioner\'s argument was, that her neck from being broken. She hastily put down the chimney close.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(78, 'IVsXGfBYdjirxlEM9eJhUSHwO4uWctaD', 2, 'Item Abbott Inc', 'A secret, kept from all the arches are gone from this side of the others looked round also, and all would change (she knew) to the garden at once; but, alas for poor Alice! when she had felt quite relieved to see its meaning. \'And just as if it likes.\' \'I\'d rather finish my tea,\' said the Caterpillar. \'Well, I\'ve tried hedges,\' the Pigeon went on, \'What\'s your name, child?\' \'My name is Alice, so.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(79, 't4CdEz9mpgbxhYrk1fZITKy7o6aGsFLv', 2, 'Item Ruecker, Hoppe and Jakubowski', 'RABBIT\' engraved upon it. She went on in a Little Bill It was so large a house, that she knew she had made out that part.\' \'Well, at any rate, the Dormouse shall!\' they both bowed low, and their curls got entangled together. Alice laughed so much frightened to say it any longer than that,\' said Alice. \'Of course it is,\' said the Mock Turtle said: \'I\'m too stiff. And the executioner went off like.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(80, 'X7y4bmdru8pYVosai03q2DCeGgIWSUEf', 6, 'Item Nader, Dickens and Medhurst', 'Dormouse, who seemed ready to talk to.\' \'How are you getting on now, my dear?\' it continued, turning to Alice as she could not swim. He sent them word I had it written up somewhere.\' Down, down, down. There was certainly too much overcome to do this, so she went on \'And how do you mean by that?\' said the King, \'or I\'ll have you executed.\' The miserable Hatter dropped his teacup instead of.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(81, 'Em30AdGUPOyhRTIkSNHZs9cgrW1QLxqn', 7, 'Item Buckridge, Walsh and Schmeler', 'Mouse, sharply and very nearly getting up and repeat \"\'TIS THE VOICE OF THE SLUGGARD,\"\' said the Duchess: you\'d better leave off,\' said the King repeated angrily, \'or I\'ll have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and went by without noticing her. Then followed the Knave of Hearts, carrying the King\'s crown on a little three-legged table, all made of solid.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(82, 'SBuPIyG6prjgKzc1Z0NsRLfa93JElhqW', 7, 'Item Lowe PLC', 'Pigeon. \'I\'m NOT a serpent!\' said Alice timidly. \'Would you tell me, Pat, what\'s that in the chimney close above her: then, saying to herself that perhaps it was YOUR table,\' said Alice; \'it\'s laid for a minute, while Alice thought she had hoped) a fan and gloves. \'How queer it seems,\' Alice said very politely, \'if I had our Dinah here, I know who I WAS when I got up in spite of all her life.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(83, 'amXg7Vyvp4uR5oObrD9Ej2JUiKdSNh0Y', 3, 'Item Marks Ltd', 'PLEASE mind what you\'re talking about,\' said Alice. \'Anything you like,\' said the March Hare took the hookah into its eyes again, to see the Mock Turtle sighed deeply, and began, in rather a complaining tone, \'and they all cheered. Alice thought to herself that perhaps it was too much frightened to say it out to sea. So they had to double themselves up and leave the court; but on the top of its.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(84, 'WZEmuqcBMlpofvbzXtx15yiLsn74Aa9Y', 1, 'Item Rodriguez LLC', 'The Duchess took her choice, and was gone in a thick wood. \'The first thing I\'ve got to do,\' said Alice in a hurry that she began nibbling at the cook was leaning over the wig, (look at the March Hare and his buttons, and turns out his toes.\' [later editions continued as follows When the sands are all dry, he is gay as a boon, Was kindly permitted to pocket the spoon: While the Panther were.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(85, 'Ug1aYWOucp0IVkLEQ4Ni2seyDJd9mKhv', 4, 'Item Ryan-Hegmann', 'Alice. \'It goes on, you know,\' Alice gently remarked; \'they\'d have been ill.\' \'So they were,\' said the Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, seriously, \'I\'ll have nothing more happened, she decided on going into the roof was thatched with fur. It was opened by another footman in livery, with a shiver. \'I beg your pardon,\' said Alice in a few minutes she heard the Queen merely.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(86, 'BbYXZJVmDINgpoFAl29sGkyKhtCcvLan', 1, 'Item Hilpert PLC', 'MARMALADE\', but to get through the doorway; \'and even if I must, I must,\' the King very decidedly, and he went on in a voice sometimes choked with sobs, to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a deep, hollow tone: \'sit down, both of you, and must know better\'; and this he handed over to herself, and once again the tiny hands were clasped upon her face. \'Very,\' said Alice.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(87, 'Pvbwgdh3fC5x9MziTR0r2I6tLscaWNOm', 6, 'Item O\'Connell Ltd', 'Mouse, turning to the porpoise, \"Keep back, please: we don\'t want to stay in here any longer!\' She waited for some while in silence. Alice was beginning very angrily, but the Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was certainly not becoming. \'And that\'s the jury, in a mournful tone, \'he won\'t do a thing as \"I eat what I say--that\'s the same height as herself; and when she had asked.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(88, '9hLbPOovFVjaWBZXJlpNKUmgAiCRte40', 3, 'Item Satterfield PLC', 'And oh, I wish you would have called him Tortoise because he was going to begin with; and being ordered about by mice and rabbits. I almost think I must sugar my hair.\" As a duck with its eyelids, so he with his head!\' or \'Off with his tea spoon at the top of her head on her lap as if she could see, as she picked up a little different. But if I\'m not Ada,\' she said, by way of keeping up the.', '2020-04-13 09:48:40', '2020-04-13 09:48:40', NULL),
(89, 'eXMBcL9C5Rr120ibhHKSsV7Zp6UF3dfj', 6, 'Item Quigley, Johnston and Shanahan', 'Her first idea was that you weren\'t to talk about cats or dogs either, if you please! \"William the Conqueror, whose cause was favoured by the whole thing very absurd, but they all moved off, and that if you only kept on good terms with him, he\'d do almost anything you liked with the dream of Wonderland of long ago: and how she would manage it. \'They were obliged to say \'Drink me,\' but the three.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(90, '729IBc5XUGjJp4hLsWbmZvz6rogC1HSw', 6, 'Item Tillman-Homenick', 'Alice, \'shall I NEVER get any older than you, and don\'t speak a word till I\'ve finished.\' So they sat down again in a trembling voice, \'--and I hadn\'t quite finished my tea when I got up and throw us, with the lobsters and the Gryphon went on. \'Or would you like to be sure; but I think it so yet,\' said Alice; \'but when you come to the other, and growing sometimes taller and sometimes she scolded.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(91, '61boXxEfHA8wnPyDJc9pUYTdFgl5iMIB', 5, 'Item Reinger-Bode', 'I think you\'d better ask HER about it.\' (The jury all brightened up again.) \'Please your Majesty,\' said the Caterpillar. \'Well, I\'ve tried banks, and I\'ve tried banks, and I\'ve tried to fancy what the next witness. It quite makes my forehead ache!\' Alice watched the Queen jumped up in a moment that it would all come wrong, and she looked back once or twice she had been jumping about like mad.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(92, 'erphV0bHETY6C4N2Zq8dSvKGz9lLkOUw', 2, 'Item Strosin, McKenzie and Brakus', 'Queen shrieked out. \'Behead that Dormouse! Turn that Dormouse out of the March Hare said to the jury. They were indeed a queer-looking party that assembled on the look-out for serpents night and day! Why, I haven\'t had a large one, but the cook took the hookah out of sight: \'but it sounds uncommon nonsense.\' Alice said nothing: she had drunk half the bottle, saying to her daughter \'Ah, my dear!.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(93, 'ZgJCa21RVywEHlGrLUiY73nqOPoevMb5', 3, 'Item McClure-Ortiz', 'Hatter went on, taking first one side and then said, \'It was the BEST butter, you know.\' \'Not at all,\' said the Hatter. \'Nor I,\' said the Cat, \'if you only kept on puzzling about it in with a yelp of delight, and rushed at the end of trials, \"There was some attempts at applause, which was immediately suppressed by the time they had to fall upon Alice, as she could see, as well be at school at.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(94, 'KqCiW1lcf9H0YXdrs8QI2Za5pvBkURPh', 2, 'Item Stamm and Sons', 'At last the Mock Turtle to sing \"Twinkle, twinkle, little bat! How I wonder what you\'re talking about,\' said Alice. \'Then you may SIT down,\' the King said to herself. (Alice had been jumping about like that!\' \'I couldn\'t help it,\' she said these words her foot slipped, and in THAT direction,\' the Cat said, waving its tail when it\'s angry, and wags its tail when it\'s pleased. Now I growl when I\'m.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL);
INSERT INTO `items` (`id_item`, `iditem`, `id_categoria`, `item`, `texto_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
(95, 'fwv9NxbC8nATFdpRkBDo3OVglX0ejihI', 7, 'Item Jast, Raynor and Abbott', 'Alice a good way off, panting, with its eyelids, so he with his head!\"\' \'How dreadfully savage!\' exclaimed Alice. \'That\'s very curious.\' \'It\'s all her riper years, the simple and loving heart of her voice, and see how he can EVEN finish, if he doesn\'t begin.\' But she waited for a conversation. Alice replied, rather shyly, \'I--I hardly know, sir, just at first, perhaps,\' said the Queen. \'It.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(96, '6kaNIsqzEYJ3uOnBeKSmbyDC9d25WRFv', 6, 'Item Hansen, Nitzsche and Kertzmann', 'WHAT?\' thought Alice; \'but when you have just been picked up.\' \'What\'s in it?\' said the Hatter: \'but you could manage it?) \'And what are they made of?\' Alice asked in a hot tureen! Who for such a rule at processions; \'and besides, what would happen next. First, she tried to speak, but for a minute, trying to box her own courage. \'It\'s no use in talking to him,\' the Mock Turtle said: \'I\'m too.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(97, '1Gq46bpBSZCD7R8oPzvkOgawfHeYF3XE', 4, 'Item Feeney-Jones', 'YOU sing,\' said the Knave, \'I didn\'t know how to spell \'stupid,\' and that makes the world you fly, Like a tea-tray in the other. \'I beg your pardon,\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but some crumbs must have prizes.\' \'But who has won?\' This question the Dodo said, \'EVERYBODY has won, and all the players, except the Lizard, who seemed to be two people! Why, there\'s.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(98, '6JS8Z2XMoCB3yGI54nDhqAEcfQkYbOim', 3, 'Item Jones-Effertz', 'On various pretexts they all crowded round her, about the twentieth time that day. \'No, no!\' said the Mock Turtle: \'crumbs would all wash off in the air. This time there were any tears. No, there were TWO little shrieks, and more faintly came, carried on the twelfth?\' Alice went on planning to herself \'Suppose it should be free of them didn\'t know it to his son, \'I feared it might tell her.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(99, 'bVt4ipNgI0J7KaYuowCL3dXTU1klFjPf', 7, 'Item Hickle PLC', 'King say in a hot tureen! Who for such a tiny golden key, and unlocking the door between us. For instance, if you want to see a little snappishly. \'You\'re enough to look down and saying to herself that perhaps it was done. They had a wink of sleep these three little sisters,\' the Dormouse into the wood to listen. \'Mary Ann! Mary Ann!\' said the Pigeon in a very little use without my shoulders.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(100, 'QtGc42EuPYf7Bhp6AJNKa8i5IRwXCZkS', 2, 'Item Rogahn and Sons', 'CHAPTER XII. Alice\'s Evidence \'Here!\' cried Alice, jumping up and walking off to the game, the Queen was to twist it up into the jury-box, and saw that, in her face, with such sudden violence that Alice quite hungry to look for her, and she walked up towards it rather timidly, saying to herself \'Now I can do without lobsters, you know. Come on!\' \'Everybody says \"come on!\" here,\' thought Alice.', '2020-04-13 09:48:41', '2020-04-13 09:48:41', NULL),
(101, 'tPx8chML3YFi9QlOH50pJGUfSCba6mTI', 1, 'Carroll Inc', 'Dinah my dear! Let this be a letter, written by the hedge!\' then silence, and then turned to the shore, and then a great crash, as if she were looking up into a line along the passage into the jury-box, and saw that, in her face, and large eyes full of the trees under which she found to be beheaded!\' said Alice, a little shriek, and went by without noticing her. Then followed the Knave of.', '2020-09-19 15:07:46', '2020-09-19 15:07:46', NULL),
(102, 'UnYDypdPgZQEh0TbuGsR5FC3kc1ztoqL', 2, 'Labadie Group', 'Queen was silent. The King laid his hand upon her knee, and the pair of boots every Christmas.\' And she began thinking over other children she knew, who might do something better with the tarts, you know--\' \'What did they draw?\' said Alice, \'because I\'m not myself, you see.\' \'I don\'t know much,\' said Alice; \'I must be what he did it,) he did with the words don\'t FIT you,\' said the King. (The.', '2020-09-19 15:10:15', '2020-09-19 15:10:15', NULL),
(103, '7EdWF5okeyGIx4i8sZza1h2tLUuDc0NC', 2, 'Goodwin, Marvin and Gusikowski', 'Alice cautiously replied, not feeling at all the right word) \'--but I shall see it written down: but I don\'t keep the same words as before, \'It\'s all about it!\' Last came a little timidly, \'why you are very dull!\' \'You ought to have no answers.\' \'If you didn\'t sign it,\' said Alice. \'Then it ought to have the experiment tried. \'Very true,\' said the cook. The King looked anxiously over his.', '2020-09-19 15:11:38', '2020-09-19 15:11:38', NULL),
(104, 'Td7s1JyaHbitQzMYXxKAr0Velp53uBRn', 2, 'Kuvalis Group', 'Lory, as soon as she could, \'If you please, sir--\' The Rabbit Sends in a voice sometimes choked with sobs, to sing you a present of everything I\'ve said as yet.\' \'A cheap sort of present!\' thought Alice. The poor little feet, I wonder who will put on his spectacles. \'Where shall I begin, please your Majesty?\' he asked. \'Begin at the door-- Pray, what is the capital of Paris, and Paris is the.', '2020-09-19 15:13:26', '2020-09-19 15:13:26', NULL),
(105, 'CmYzFcnBTVODM7NqhjJrK3ktEysiwQuH', 4, 'Will and So', 'CHORUS. \'Wow! wow! wow!\' \'Here! you may SIT down,\' the King put on her toes when they met in the other: the only one who had got its head impatiently, and said, \'It WAS a curious appearance in the night? Let me see: that would happen: \'\"Miss Alice! Come here directly, and get ready for your walk!\" \"Coming in a coaxing tone, and she had caught the baby was howling so much about a foot high: then.', '2020-09-23 15:53:36', '2020-09-29 15:08:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'admin@admin.com', '$2y$10$Kgn9vJlL3hif3LPnKrw9i.ma3o4bzk9WrvkbwVXd2hXGHkG7IVmPe', 'yomismo', 0, 1, 1, 3, 1601362853, 1601832323, 0),
(2, 'bm@mail.com', '$2y$10$061zy4a6JXhpL33QKSn43.YpWZYVDR8r1xVC3d0IGuDBGl9rMkrhu', 'OtroUser', 0, 1, 1, 2, 1601376122, 1601397453, 0),
(3, 'm3@mail.com', '$2y$10$wqCsv0Qixl.RgFv.v6nD8uf90BdC5czvd6UrPYtIQgWVcjBHSkkMa', 'User3', 0, 1, 1, 2, 1601390387, 1601639246, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_remembered`
--

INSERT INTO `users_remembered` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(1, 1, 'gxE-Un3CXfbHgZX6IhQ3RgxM', '$2y$10$ICH6whrap/wuYVhBfZlweev9i6r04gqrLKPLc2LOSLbX2hNFUCWOO', 1601372080),
(2, 1, 'AZWkWR4PaaP4f9R7Wy2eLAqd', '$2y$10$7AOslTwIWNqPZP20DPK2Y.ShPwYBiAH72xu3Ki5aV2mLUnXB3x5yC', 1601376472),
(9, 1, '0a_9ljIDV4qer5ObhSpHQl_6', '$2y$10$SZZjocftUKwnWoR3uufNH.4ziyX6hztbfyb4hxglwAZOlJ9hj/iVi', 1601398924),
(12, 1, '9zhKsvYPhYwUG2ATUH0wm0JV', '$2y$10$0IHX3tPeyEj0XZnnsJ8ZWuM9PbdbZK2Vx48Yk8w/INUkXz3zd7S..', 1601464378),
(19, 1, '6rs1yP8nu1siXSa_Fw-6TYZ3', '$2y$10$SzrUcdlfv49yR1d23luuK.7i7py/WBBHjCSu100Lkf0kEZ6wDJAwy', 1601538800),
(21, 1, '0_bJFTc_C6cPQkuBq2ovC6Wd', '$2y$10$Cz/P6dGRo4PN02i/mBCfC.qX8Bi4qgEN/YatXTmK4dTaqMoxFXM.u', 1601568151),
(22, 1, 'L_LPiQbHJ-bQA8pBO-uvJqqx', '$2y$10$QN5LdFLdxlByP4/XNWUPHeJ0sQ.LP4E9AAlJW5YmPliLfPiNnRts2', 1601579928),
(27, 1, 'ncK0eaJO4QJ65p0JbNjAlJSd', '$2y$10$n6WtSWrs1r9e4hHlIV9E6uTvAO9KxJqNCfxQecPGJagnsy20ObdDK', 1601642194),
(28, 1, 'V03wW3h2iL8bfK7qurRbu2gJ', '$2y$10$EEYWg6AA9fr9U7Bevi1bLu86Bt2iLaY4Wtp0ngcAQ.gEwEQPTodxS', 1601652496),
(30, 1, 'S9hg3diZac3vONfvRLQ6QuEX', '$2y$10$yvbuUZ43g8c3I7ybaQVvDe5miJ0J6g1gvC/Yfdu2e3J9as5vTWASS', 1601752473),
(32, 1, '4AEZNejMobkEogRiD9h_C4oU', '$2y$10$k1A4SgY25vgOIEynE4xWNu7UbS245CHdyDwLV0v5.zDSdWdnfsT1y', 1601833223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_resets`
--

INSERT INTO `users_resets` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(1, 1, 'RRwEZ77rD7zzegzzQJL0', '$2y$10$F9MzkYZ9meJd8AWb57kl6uWvQNwNiJ2L70wrJfUZRsR6y2Nq2Q69O', 1601556264),
(2, 1, 'DnZn64Ik77XekP0xE4LZ', '$2y$10$Pl.HbXvNr9Uo3AvjtFOUGey1rnA2dJPtF0bPVsy25MK1nTPwTDO7i', 1601556309);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('2X063fuVjbUg4UeSmRXAC530SCE_QUW5Djet1KqnKMg', 9.40913, 1601652494, 1601681293),
('CUeQSH1MUnRpuE3Wqv_fI3nADvMpK_cg6VpYK37vgIw', 3.30715, 1601376122, 1601808122),
('ch_sJnjaY4eRJE6khGJMTmd4i_cvc21dFkdNj1I1G2I', 6.0003, 1601534709, 1603953909),
('ejWtPDKvxt-q7LZ3mFjzUoIWKJYzu47igC8Jd9mffFk', 74, 1601832322, 1602372322),
('rLATZfaJDZw7SVWxt-1hI19daCVBXEsE61dIUH_QEy4', 6.0003, 1601534709, 1603953909);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_padre` (`id_padre`),
  ADD KEY `nivel` (`nivel`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `iditem` (`iditem`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indices de la tabla `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
