-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 14 2023 г., 05:15
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `body` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `body`, `user_id`) VALUES
(5, 'test test ', 1),
(6, 'cxfnxft', 1),
(7, 'Test demo test 1', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `admin_decoration`
--

CREATE TABLE `admin_decoration` (
  `id` int(11) NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_decoration`
--

INSERT INTO `admin_decoration` (`id`, `image`, `link`) VALUES
(1, 'admin1.png', 'category/index'),
(2, 'admin2.png', 'products/index'),
(3, 'admin3.png', 'discount/index'),
(4, 'admin4.png', 'user/index'),
(5, 'admin5.png', 'address/index'),
(6, 'admin6.png', 'datetable/index'),
(7, 'admin7.png', 'orders/index');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stop` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `stop`) VALUES
(1, 'Пицца', 'p1.png', 1),
(2, 'Сеты', 'set3.png', 1),
(5, 'Коктейли', 'k1.png', 1),
(6, 'Кофе', 'cof1.png', 1),
(7, 'Напитки', 'nap1.png', 1),
(8, 'Десерты', 'des1.png', 1),
(9, 'Закуски', 'zac1.png', 1),
(10, 'Соусы', 'ss1.png', 1),
(11, 'Запеченные роллы', 'zap1.png', 1),
(12, 'Жареные роллы', 'z_rol1.png', 1),
(13, 'Роллы', 'rol1.png', 1),
(14, 'Суши', 'su1.png', 1),
(15, 'Комбо', 'comb1.png\r\n', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `datetable`
--

CREATE TABLE `datetable` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_hours` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `datetable`
--

INSERT INTO `datetable` (`id`, `name`, `working_hours`) VALUES
(2, 'Доставка: ', 'Круглосуточно'),
(3, 'Самовывоз:', '10:00 - 22:00');

-- --------------------------------------------------------

--
-- Структура таблицы `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` float NOT NULL,
  `stop` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `discount`
--

INSERT INTO `discount` (`id`, `title`, `body`, `image`, `deadline`, `percent`, `stop`) VALUES
(1, 'Отсутствует', 'default', 'default.png', 'default', 1, 0),
(2, 'Ночная пицца', ' С 22:00 до 00:00 цена на пиццу становится приятнее на 30%! Акция не работает с Комбо и действует на одну пиццу в чеке', 'discount1.png', 'Пн - Вс. С 22:00 до 00:00', 0.3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `address_id`, `comments`, `amount`, `created`, `updated`, `status`) VALUES
(9, 2, '3332', '8-(565)-565-65-65', 5, 'автвьые', 700, '2023-12-04 02:29:08', '2023-12-04 02:29:08', 0),
(10, 2, 'test', '8-(999)-999-99-99', 5, 'dfntnftsr', 1100, '2023-12-04 03:15:58', '2023-12-04 03:15:58', 0),
(11, 2, 'demo', '8-(999)-999-99-99', 5, 'demo', 1100, '2023-12-04 04:26:20', '2023-12-04 04:26:20', 0),
(12, 2, 'test', '8-(909)-090-90-90', 5, 'sevaer', 600, '2023-12-04 04:41:26', '2023-12-04 04:41:26', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `cost` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `quantity`, `cost`) VALUES
(13, 9, 17, 'Санди', 700, 1, 700),
(14, 10, 16, 'Топ Сет', 1100, 1, 1100),
(15, 11, 16, 'Топ Сет', 1100, 1, 1100),
(16, 12, 3, 'Сливочный бекон', 600, 1, 600);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL DEFAULT 1,
  `stop` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `body`, `image`, `price`, `category_id`, `discount_id`, `stop`) VALUES
(1, 'Пепперони фреш', 'Пикантная пепперони, увеличенная порция моцареллы, томаты, фирменный томатный соус', 'p1.png', 600, 1, 1, 1),
(2, 'Сырная', 'Моцарелла, сыры чеддер и пармезан, фирменный соус альфредо', 'p2.png', 550, 1, 1, 1),
(3, 'Сливочный бекон', 'Бекон, красный лук, моцарелла, соусы сливочный и томатный', 'p3.png', 600, 1, 1, 1),
(4, 'Чикен Бургер', 'Цыпленок, ветчина, маринованные огурчики, жареный лук, моцарелла и соус бургер', 'p4.png', 650, 1, 1, 1),
(7, 'Лайт сет', 'Лёгкий сет из четырёх роллов: Ролл Цыпленок Терияки, ролл с крабом и огурцом, запеченный ролл с крабом и авокадо, мини-ролл Сливочный огурец', 'set3.png', 700, 2, 1, 1),
(10, 'Мясная', 'Цыпленок, ветчина, пикантная пепперони, острая чоризо, моцарелла, фирменный томатный соус', 'p5.png', 550, 1, 1, 1),
(11, 'Чоризо фреш', 'Острые колбаски чоризо, сладкий перец, моцарелла, фирменный томатный соус', 'p6.png', 400, 1, 1, 1),
(12, 'Сырный цыпленок', 'Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, фирменный соус альфредо, чеснок', 'p7.png', 550, 1, 1, 1),
(13, 'Четыре сыра', 'Сыр блю чиз, сыры чеддер и пармезан, моцарелла, фирменный соус альфредо', 'p8.png', 500, 1, 1, 1),
(14, 'Гавайская', 'Двойная порция цыпленка, ананасы, моцарелла, фирменный соус альфредо', 'p9.png', 700, 1, 1, 1),
(15, 'Ветчина и сыр', 'Ветчина, моцарелла, фирменный соус альфредо', 'p10.png', 450, 1, 1, 1),
(16, 'Топ Сет', '4 ролла и 5 вкусов в одном сете: Домино с лососем и угрем, ролл с креветкой и крабом, ролл с омлетом и сыром, запеченный ролл с крабом и авокадо', 'set5.png', 1100, 2, 1, 1),
(17, 'Санди', 'Три популярных ролла по привлекательной цене: Калифорния с крабом, ролл с омлетом и сыром, запечённый ролл с цыпленком и жареным луком', 'set6.png', 700, 2, 1, 1),
(18, 'Манга', 'Яркие краски вкуса: Филадельфия, ролл с креветкой и крабом, Цыплёнок Терияки, запеченный ролл с острым крабом', 'set7.png', 1300, 2, 1, 1),
(19, 'Запечённый Маки Сет', 'Запеченные классические роллы с лососем и сливочным сыром, креветками и сливочным сыром, крабом, лососем терияки и сливочным сыром, цыпленком и омлетом', 'set8.png', 1000, 2, 1, 1),
(20, 'Малибу', 'Три ярких солнечных ролла в составе: Зеленый дракон, Сырный Лосось и Калифорния с крабом', 'set9.png', 1000, 2, 1, 1),
(21, 'Великолепная Семерка', 'Сет для большой компании! Филадельфия, Зелёный Дракон, Калифорния с крабом, Кани Кама, Сырный Цыплёнок, Четыре Сыра и Динамит', 'set10.png', 2400, 2, 1, 1),
(22, 'Классический молочный коктейль', 'В мире так много коктейлей, но классика — вечна. Попробуйте наш молочный напиток с мороженым', 'k1.png', 175, 5, 1, 1),
(23, 'Клубничный молочный коктейль', 'Не важно, какое время года на улице, этот коктейль с клубничным сиропом вернет вас в лето с одного глотка', 'k2.png', 215, 5, 1, 1),
(24, 'Банановый молочный коктейль', 'По-настоящему солнечный! Молочный коктейль с добавлением бананового пюре', 'k4.png', 215, 5, 1, 1),
(25, 'Карамельное яблоко молочный коктейль', 'Уютное сочетание яблочного вкуса, теплой карамели, молока и мороженого в вашем стакане', 'k3.png', 215, 5, 1, 1),
(26, 'Молочный коктейль с печеньем Орео', 'Как вкуснее есть печенье? Его лучше пить! Попробуйте молочный коктейль с мороженым и дробленым печеньем «Орео»', 'k5.png', 215, 5, 1, 1),
(27, 'Кофе Американо', 'Пара глотков горячего Американо, и вы будете готовы покорять этот день', 'cof1.png', 100, 6, 1, 1),
(28, 'Кофе Латте', 'Когда хочется нежную молочную пенку, на помощь приходит классический латте', 'cof2.png', 160, 6, 1, 1),
(29, 'Кофе Кокосовый латте', 'Горячий напиток на основе эспрессо с увеличенной порцией молока и кокосовым сиропом', 'cof3.png', 160, 6, 1, 1),
(30, 'Кофе Карамельный капучино', 'Если не шоколад, то карамель! А капучино с карамельным сиропом особенно хорош', 'cof4.png', 160, 6, 1, 1),
(31, 'Кофе Ореховый латте', 'Много молока и фундука. Уютный латте на основе эспрессо и орехового сиропа', 'cof5.png', 160, 6, 1, 1),
(32, 'Кофе Капучино', 'Король среди кофейных напитков — классический капучино. Для любителей сбалансированного кофейно-молочного вкуса', 'cof6.png', 150, 6, 1, 1),
(33, 'Добрый Кола', '0,5 л', 'nap1.png', 110, 7, 1, 1),
(34, 'Rich Tea Черный с лимоном', '0,5 л', 'nap2.png', 120, 7, 1, 1),
(35, 'Rich Tea Зеленый', '0,5 л', 'nap3.png', 120, 7, 1, 1),
(36, 'Добрый Апельсин', '0,5 л', 'nap4.png', 110, 7, 1, 1),
(37, 'Добрый Лайм-Лимон', '0,5 л', 'nap5.png', 110, 7, 1, 1),
(38, 'Добрый Манго-Маракуйя', '0,5 л', 'nap6.png', 110, 7, 1, 1),
(39, 'Rich Tea Зеленый с манго', '0,5 л', 'nap7.png', 120, 7, 1, 1),
(40, 'Морс Клюква', 'Наш фирменный морс для любителей сладкой кислинки.\n0,45 л', 'nap8.png', 140, 7, 1, 1),
(41, 'Вода BonaAqua негазированная', '0,5 л', 'nap9.png', 70, 7, 1, 1),
(42, 'Вишневый нектар Rich', '1 л', 'nap10.png', 220, 7, 1, 1),
(43, 'Маффин Три шоколада', 'Ну и кекс этот маффин! Он из натурального какао, а внутри — нежная начинка из кубиков белого и молочного шоколада', 'des1.png', 100, 8, 1, 1),
(44, 'Додо тарт', 'Сладкое безумие: шоколадная корзинка с морковно-творожной начинкой, медом, грецкими орехами и цитрусами', 'des2.png', 180, 8, 1, 1),
(45, 'Чизкейк Нью-Йорк', 'Мы перепробовали тысячу десертов и наконец нашли любимца гостей — нежнейший творожный чизкейк', 'des3.png', 160, 8, 1, 1),
(46, 'Брауни', 'Умножили какао на шоколад и получили изумительный десерт. Вот такая сладкая арифметика', 'des4.png', 140, 8, 1, 1),
(47, 'Бруслетики', 'Это задорные сладкие рулетики, в которых закрутился микс из натуральной брусники и сгущенного молока', 'des5.png', 240, 8, 1, 1),
(48, 'Чизкейк Банановый с шоколадным печеньем', 'Солнечный снаружи и яркий по вкусу внутри. Летняя новинка — нежный чизкейк с бананом и шоколадным печеньем', 'des6.png', 170, 8, 1, 1),
(49, 'Тирамису', 'Десерт со вкусом dolce vita! Многослойный нежный тирамису в лучших итальянских традициях', 'des7.png', 200, 8, 1, 1),
(50, 'Рулетики с корицей', 'Десерт, одобренный нашими бабушками. Горячие сладкие рулетики с пряной корицей и сахаром', 'des8.png', 210, 8, 1, 1),
(51, 'Картофель из печи', 'Запеченная в печи картошечка — привычный вкус и мало масла. В составе пряные специи', 'zac1.png', 230, 9, 1, 1),
(52, 'Куриные наггетсы', 'Нежное куриное мясо в хрустящей панировке', 'zac2.png', 250, 9, 1, 1),
(53, 'Дэнвич ветчина и сыр', 'Поджаристая чиабатта и знакомое сочетание ветчины, цыпленка, моцареллы со свежими томатами, соусом ранч и чесноком', 'zac3.png', 250, 9, 1, 1),
(54, 'Дэнвич чоризо барбекю', 'Насыщенный вкус острых колбасок чоризо и пикантной пепперони с соусами бургер и барбекю, свежими томатами, маринованными огурчиками, моцареллой и луком в румяной чиабатте', 'zac4.png', 250, 9, 1, 1),
(55, 'Грибной Стартер', 'Горячая закуска с шампиньонами, моцареллой и соусом ранч в тонкой пшеничной лепешке', 'zac5.png', 180, 9, 1, 1),
(56, 'Сырный Стартер', 'Горячая закуска с очень сырной начинкой. Моцарелла, пармезан, чеддер и соус ранч в тонкой пшеничной лепешке', 'zac6.png', 180, 9, 1, 1),
(57, 'Паста Карбонара', 'Паста из печи с беконом, сырами чеддер и пармезан, томатами, моцареллой, фирменным соусом альфредо и чесноком', 'zac7.png', 330, 9, 1, 1),
(58, 'Додстер с ветчиной', 'Горячий завтрак с ветчиной, томатами, моцареллой, соусом ранч в тонкой пшеничной лепешке', 'zac8.png', 190, 9, 1, 1),
(59, 'Супермясной Додстер', 'Горячая закуска с цыпленком, моцареллой, митболами, острыми колбасками чоризо и соусом бургер в тонкой пшеничной лепешке', 'zac9.png', 230, 9, 1, 1),
(60, 'Додстер', 'Легендарная горячая закуска с цыпленком, томатами, моцареллой, соусом ранч в тонкой пшеничной лепешке', 'zac10.png', 190, 9, 1, 1),
(61, 'Сырный соус', 'Фирменный соус со вкусом расплавленного сыра для бортиков пиццы и горячих закусок\r\n25 г', 'ss1.png', 40, 10, 1, 1),
(62, 'Барбекю', 'Фирменный соус с дымным ароматом для бортиков пиццы и горячих закусок\r\n25 г', 'ss2.png', 40, 10, 1, 1),
(63, 'Чесночный соус', 'Фирменный соус с чесночным вкусом для бортиков пиццы и горячих закусок\r\n25 г', 'ss3.png', 40, 10, 1, 1),
(64, 'Запечённый ролл Филадельфия', 'Классический ролл Филадельфия, полностью обернутый лентой свежего филе лосося, запечённый под шапочкой из моцареллы и майонеза. Украшается соусом унаги и семечками обжаренного кунжута', 'zap1.png', 650, 11, 1, 1),
(65, 'Запечённый ролл с острым крабом', 'Крабовый микс, хрустящий огурчик, пикантный соус, икра масаго, моцарелла, майонез, соус унаги и белый кунжут', 'zap2.png', 350, 11, 1, 1),
(66, 'Запечённый ролл с лососем и крабом', 'Лосось терияки, крабовый микс, хрустящий огурчик, икра масаго, моцарелла, майонез, соус унаги и белый кунжут', 'zap3.png', 500, 11, 1, 1),
(67, 'Запечённый ролл Цыплёнок Блю Чиз', 'Копчёный цыплёнок, томаты, сливочный сыр, пармезан, блю чиз, моцарелла, майонез, соус унаги и белый кунжут', 'zap4.png', 350, 11, 1, 1),
(68, 'Запеченный ролл Креветка Блю Чиз', 'Ароматные креветки, спелый авокадо, омлет, сливочный сыр, икра масаго, соус тобико, моцарелла, блю чиз, майонез, соус унаги, белый кунжут и лепестки миндаля', 'zap5.png', 450, 11, 1, 1),
(69, 'Запечённый ролл с крабом и авокадо', 'Крабовый микс, сливочный сыр, спелое авокадо, моцарелла, майонез, соус унаги и белый кунжут', 'zap6.png', 300, 11, 1, 1),
(70, 'Запечённый ролл с цыплёнком и жареным луком', 'Копчёный цыплёнок, хрустящий огурчик, сливочный сыр, жареный лук, моцарелла, майонез, соус унаги и белый кунжут', 'zap7.png', 300, 11, 1, 1),
(71, 'Запечённый мини-ролл с креветкой', 'Ароматные креветки, острый соус, моцарелла, майонез, соус унаги и белый кунжут', 'zap8.png', 280, 11, 1, 1),
(72, 'Запечённый мини-ролл с лососем терияки', 'Лосось терияки, моцарелла, майонез, соус унаги и белый кунжут', 'zap9.png', 330, 11, 1, 1),
(73, 'Жаренный ролл с лососем', 'Свежий лосось, спелое авокадо, сыр чеддер, сливочный сыр, пикантный соус, кляр и соус унаги', 'z_rol1.png', 400, 12, 1, 1),
(74, 'Жаренный ролл с угрем', 'Копченый угорь, спелое авокадо, сливочный сыр, кляр, сухари панко и соус унаги', 'z_rol2.png', 370, 12, 1, 1),
(75, 'Жаренный ролл с креветкой', 'Ароматные креветки, крабовый микс, сливочный сыр, острый соус шрирача, кляр, сухарики панко и соус унаги', 'z_rol3.png', 350, 12, 1, 1),
(76, 'Жаренный ролл с цыпленком', 'Копченый цыпленок, томаты, сливочный сыр, сыр чеддер, кляр, сухари панко и соус ранч', 'z_rol4.png', 330, 12, 1, 1),
(77, 'Филадельфия Классическая', 'Классический ролл Филадельфия полностью обернутый лентой свежего лосося', 'rol1.png', 600, 13, 1, 1),
(78, 'Филадельфия с авокадо', 'Ролл со сливочным сыром и спелым авокадо, обернутый лентой свежего лосося с трех сторон', 'rol2.png', 490, 13, 1, 1),
(79, 'Филадельфия с огурцом', 'Ролл со сливочным сыром и хрустящим огурчиком, обернутый лентой свежего лосося с трех сторон', 'rol4.png', 490, 13, 1, 1),
(80, 'Калифорния с крабом', 'Крабовый микс, хрустящий огурчик, спелое авокадо, икра масаго и соус', 'rol4.png', 350, 13, 1, 1),
(81, 'Лосось терияки', 'Лосось терияки, хрустящий огурчик, спелое авокадо, сливочный сыр, острый соус, икра масаго и белый кунжут', 'rol5.png', 350, 13, 1, 1),
(82, 'Зеленый Дракон', 'Ароматные креветки, спелое авокадо, хрустящий огурчик, сливочный сыр, икра масаго, соус унаги и белый кунжут', 'rol6.png', 400, 13, 1, 1),
(83, 'Кани Кама', 'Крабовый микс, омлет, сливочный сыр, икра масаго и соус унаги', 'rol7.png', 380, 13, 1, 1),
(84, 'Сливочный Угорь', 'Жареный угорь, спелое авокадо, сливочный сыр, икра масаго, соус унаги и белый кунжут', 'rol8.png', 450, 13, 1, 1),
(85, 'Ролл с омлетом и сыром', 'Сливочный сыр, омлет, плавленный чеддер, соус унаги и пармезан', 'rol9.png', 250, 13, 1, 1),
(86, 'Филадельфия', 'Ролл со сливочным сыром, обернутый лентой свежего лосося с трех сторон', 'rol10.png', 490, 13, 1, 1),
(87, 'Пицца и два ролла', 'Пицца 30 см и два ролла. Для небольшой компании из 2–4 человек. ', 'comb1.png', 1000, 15, 1, 1),
(88, 'Мини Комбо', 'Если хочется всего понемногу. Пицца, закуска, напиток и соус.', 'comb2.png', 700, 15, 1, 1),
(89, '2 Стартера', 'Горячая закуска с моцареллой в пшеничной лепешке — это хорошо. А две с разными вкусами — еще лучше.', 'comb3.png', 400, 15, 1, 1),
(90, '3 пиццы', 'Три удовольствия в нашем меню.', 'comb4.png', 1600, 15, 1, 1),
(91, '4 Закуски', 'Сытный квартет для маленькой компании.', 'comb5.png', 650, 15, 1, 1),
(92, 'Суши Унаги', 'Угорь, рис, унаги соус, кунжут', 'su1.png', 80, 14, 1, 1),
(93, 'Суши Сяке', 'Лосось, рис', 'su2.png', 80, 14, 1, 1),
(94, 'Суши Чука', 'Чука, рис, кунжут, ореховый соус', 'su3.png', 60, 14, 1, 1),
(95, 'Суши Кани спайс', 'Снежный краб, рис, спайси соус', 'su4.png', 60, 14, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `date_birth`, `email`, `phone_number`, `password`, `role`) VALUES
(1, 'admin', 'admin', '2023-11-01', 'admin@mail.ru', '8-(780)-989-80-80', '$2y$13$29pl3zNbTTDMaZvgApLta.dajCyqFgAUoygfBCB9uYRlQRypKtbie', 1),
(2, 'demo', 'demo', '2023-11-01', 'demo@mail.ru', '8-(232)-323-23-23', '$2y$13$K5XX7A507s6vwnbjrGJ0e.El0sVAzyoJJXjRL2N1YAADs7EvbFdsm', 0),
(3, 'demo', 'demo', '2000-01-01', 'demo@mail.ru', '8-(900)-567-44-55', '$2y$13$7Gig0jFpLUVBCsaOTIAjRe0OyMFYiQULnsPqnyuD540yinQBoA3XO', 0),
(4, 'test', 'test', '2000-01-01', 'demo@mail.ru', '8-(890)-988-98-98', '$2y$13$scCotdNJrYx65mABqu4eoetJ0EdxgnQJBDE/iIyE91i3pzaZBduXe', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `admin_decoration`
--
ALTER TABLE `admin_decoration`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `datetable`
--
ALTER TABLE `datetable`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `admin_decoration`
--
ALTER TABLE `admin_decoration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `datetable`
--
ALTER TABLE `datetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account_ibfk_4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
