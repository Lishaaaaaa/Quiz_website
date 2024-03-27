-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'GK'),
(2, 'Sports'),
(3, 'Social'),
(6, 'Kids'),
(22, 'Programming'),
(23, 'Movies');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL,
  `QuizID` int(11) DEFAULT NULL,
  `Question` text NOT NULL,
  `Option1` varchar(100) NOT NULL,
  `Option2` varchar(200) NOT NULL,
  `Option3` varchar(200) NOT NULL,
  `Option4` varchar(200) NOT NULL,
  `CorrectOption` varchar(100) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `imgpath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `QuizID`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `CorrectOption`, `CategoryID`, `imgpath`) VALUES
(21, 10, 'What is something you hit with a hammer?', 'Knife ', 'Rod', 'Wire', 'Nail', 'Nail', 6, NULL),
(26, 10, 'How many legs does a spider have?', 'Eleven', 'Eight ', 'Two', 'Three', 'Eight ', 6, NULL),
(27, 10, 'What is the name of a place you go to see lots of animals?', 'Forest', 'Mall', 'Zoo', 'Beach', 'Zoo', 6, NULL),
(28, 10, 'If you freeze water what do you get?', 'Juice ', 'Water', 'Cream', 'Ice', 'Ice', 6, NULL),
(29, 10, 'What is the capital of France?', 'London', 'Paris', 'Berlin', 'Rome', 'Paris', 6, NULL),
(30, 10, 'What is the color of a school bus?', 'Red', 'Yellow', 'Orange', 'Blue', 'Yellow', 6, NULL),
(31, 10, 'What do you use to write on a blackboard?', 'Chalk', 'Pencil', 'Pen', 'Eraser ', 'Chalk', 6, NULL),
(32, 10, 'How many pairs of wings do bees have?', 'One', 'Two', 'Four', 'Three ', 'Two', 6, NULL),
(33, 10, 'What do bees make?', 'Juice', 'Ghee', 'Honey', 'Milk', 'Honey', 6, NULL),
(34, 10, 'How many days are in a year?', '364', '360', '365', '367', '365', 6, NULL),
(35, 11, 'What Popeye the sailor man famously eats to increase his strength?', 'Ladoo ', 'Spinach', 'Chocolate ', 'Carrot ', 'Spinach', 6, NULL),
(36, 11, '.In which year was the Cartoon Network channel launched on television in the USA ?', '1992', '2000', '1940', '1980', '1992', 6, NULL),
(37, 11, 'In the cartoon series Family Guy, what color pants does Peter Griffin generally wear?', 'Green', 'Black', 'Blue', 'Grey', 'Green', 6, NULL),
(38, 11, 'What is the name of the bird featured in the comic Peanuts?', 'Woodstock', 'Tweety', 'Rio', 'Sonic', 'Woodstock', 6, NULL),
(39, 11, 'What are the two main characters of Adventure Time?', 'Timmy & Vicky', 'Finn & Jake', 'Spongebob & Patrick', 'Kenan & Kel', 'Finn & Jake', 6, NULL),
(40, 11, 'What was Toms fullname?', 'Thomas Dog', 'Thomas Horse', 'Thomas Cat', 'Thomas Elephant ', 'Thomas Cat', 6, NULL),
(41, 11, 'What is the name of the bulldog in the Tom and Jerry cartoons?', 'Spike', 'Spin', 'Jerry', 'Tom ', 'Spike', 6, NULL),
(42, 11, 'Which kingdom does Chhota Bheem reside in?', 'Dholakpur', 'Hastinapur', 'Mathura ', 'Ayodhya ', 'Dholakpur', 6, NULL),
(43, 11, 'Who is Chhota Bheems mentor and guru?', ' Guru Ghasita Ram', 'Guru Dronacharya', 'Guru Vishwamitra ', 'Guru Shukracharya ', ' Guru Ghasita Ram', 6, NULL),
(44, 11, 'What is the name of Hattoris pet dog in Ninja Hattori?', 'Shishimaru', 'Kagechiyo', 'Kanzo', 'Kemumaki', 'Shishimaru', 6, NULL),
(45, 22, 'What is the purpose of the const keyword in C++?', 'It declares a variable constant', 'It is used for dynamic memory allocation', 'It defines a function constant', 'It allocates memory for a variable', 'It declares a variable constant', 22, NULL),
(46, 22, 'What is the purpose of the printf() function in C?', 'To input data', 'To output data', 'It To perform arithmetic operations', ' To declare variables', 'To output data', 22, NULL),
(47, 22, 'Which of the following is a correct way to declare an integer variable in C?', 'int x;', 'integer x;', 'x = Integer;', 'x as Integer;', 'int x;', 22, NULL),
(48, 22, 'What is the difference between C and C++?', 'C is a procedural language, while C++ is an object-oriented language', 'C supports classes and objects, while C++ does not', 'C++ does not support pointers', ' C++ is a subset of C', 'C is a procedural language, while C++ is an object-oriented language', 22, NULL),
(49, 22, 'Which keyword is used to define a class in C++?', 'class', 'struct', 'void', 'def', 'class', 22, NULL),
(54, 22, 'What is the output of the following code snippet?<br>#include <iostream><br>using namespace std;<br>int main() {<br>Â Â Â Â int x = 5;<br>Â Â Â Â cout << ++x;<br>Â Â Â Â return 0;<br>}', '5', '4', '6', 'compiler error', '6', 22, NULL),
(55, 22, 'What is the output of the following code snippet?<br>#include <iostream><br>using namespace std;<br>int main() {<br>Â Â Â Â int x = 10;<br>Â Â Â Â cout << x++;<br>Â Â Â Â return 0;<br>}', '10', '11', '9', '12', '10', 22, NULL),
(56, 22, 'What is the correct syntax for declaring a pointer variable in C?', 'int *ptr;', 'ptr int;', 'ptr *int;', 'int ptr;', 'int *ptr;', 22, NULL),
(57, 22, 'What is the purpose of comments in programming?', 'To make the code execute faster', 'To provide explanations and context within the code', 'To hide sections of the code from other developers', 'To prevent errors during compilation', 'To provide explanations and context within the code', 22, NULL),
(58, 22, 'What will be the output of the following code snippet?<br>#include <iostream><br>using namespace std;<br>int main() {<br>Â Â Â Â int a = 5, b = 3, c = 7;<br>Â Â Â Â cout << (a > b ? (a > c ? a : c) : (b > c ? b : c));<br>Â Â Â Â return 0;<br>}', '5', '8', '7', 'Compiler Error', '7', 22, NULL),
(59, 23, 'Which Bollywood horror film features a ghost who is seeking revenge for her murder?', 'Raaz', '1920', 'Rang De Basanti', ' Bhool Bhulaiyaa', 'Raaz', 23, NULL),
(60, 23, 'In the movie Stree, what is the creatures unusual demand during the festival?', ' Sweets', 'Clothes', 'Money', 'Respect', 'Clothes', 23, NULL),
(61, 23, 'Which Bollywood horror film is inspired by a true story of a couple who lived in a haunted house in Himachal Pradesh?', 'Phoonk', 'Ragini MMS', 'Veerana', 'Bhoot', 'Phoonk', 23, NULL),
(62, 23, 'What is the main theme of the movie Pari?', 'Possession', 'Ghostly encounters', 'Witchcraft', 'Supernatural pregnancy', 'Witchcraft', 23, NULL),
(63, 23, 'In the film Bhoot, who plays the role of the possessed woman?', 'Priyanka Chopra', 'Kareena Kapoor Khan', 'Vidya Balan', 'Urmila Matondkar', 'Urmila Matondkar', 23, NULL),
(64, 23, 'Which Bollywood horror movie revolves around a haunted mirror?', ' Kaal', 'Ragini MMS 2', 'Alone', ' Darna Mana Hai', 'Alone', 23, NULL),
(65, 23, 'What supernatural element is the focus of the film 1920?', 'Possession', 'Ghost', 'Werewolf', 'Vampire', 'Ghost', 23, NULL),
(66, 23, 'Who directed the horror-comedy film Stree?', 'Amar Kaushik', 'Rajkumar Hirani', 'Shoojit Sircar', 'Anurag Kashyap', 'Amar Kaushik', 23, NULL),
(67, 23, 'In Bhool Bhulaiyaa, what psychological disorder does Vidya Balan\'s character have?', 'Dissociative Identity Disorder', 'Schizophrenia', 'Obsessive-Compulsive Disorder', 'Bipolar Disorder', 'Obsessive-Compulsive Disorder', 23, NULL),
(68, 23, 'Which Bollywood horror film is based on a short story by Ruskin Bond?', '1920:Evil Returns', 'Haunted - 3D', 'Raat', 'Pari', '1920:Evil Returns', 23, NULL),
(69, 24, 'In the film Hera Pheri, what is the iconic dialogue often associated with Baburao Ganpatrao Apte?', 'Aila!', 'Paisa vasool!', 'Babu bhaiya, paanch rupiya ka...?', 'Kauwa biryani!', 'Babu bhaiya, paanch rupiya ka...?', 23, NULL),
(70, 24, 'Which Bollywood comedy features three friends who embark on a quest to find the meaning of life and end up in hilarious situations?', '3 Idiots', 'Chupke Chupke', 'Dhamaal', 'Andaz Apna Apna', '3 Idiots', 23, NULL),
(71, 24, 'In the movie Chupke Chupke, which character pretends to be a driver and creates chaos in a household??', 'Raghav', 'Professor Parimal Tripathi', 'Sukumar Sinha', 'Shyam', 'Professor Parimal Tripathi', 23, NULL),
(72, 24, 'Which Bollywood comedy film showcases the hilarious journey of a young man trying to find a suitable bride for his elder brother?', 'Dil Chahta Hai', 'Band Baaja Baaraat', 'Tanu Weds Manu', 'Bunty Aur Babli', 'Bunty Aur Babli', 23, NULL),
(73, 24, 'In Andaz Apna Apna, what are Amar and Prem trying to win throughout the film?', 'A lottery', 'A race', 'A trophy', 'A treasure', 'A treasure', 23, NULL),
(74, 24, 'Which Bollywood comedy movie revolves around the hilarious chaos that ensues when a middle-class man pretends to be rich to marry the girl he loves?', 'Munnabhai MBBS', 'Dhol', 'Badhaai Ho', 'Jhootha Hi Sahi', 'Dhol', 23, NULL),
(75, 24, 'What is the profession of the characters played by Anupam Kher and Boman Irani in the film ', 'Lawyers', 'Doctors', 'Police Officers', 'Land Developers', 'Land Developers', 23, NULL),
(76, 24, 'Which Bollywood comedy features Govinda and Salman Khan as two stepbrothers trying to outdo each other in winning their father\'s inheritance?', 'Coolie No. 1', 'Biwi No. 1', 'Partner', 'Judwaa', 'Biwi No. 1', 23, NULL),
(77, 24, 'What is the nickname of the character played by Riteish Deshmukh in the movie Dhamaal?', 'Roy', 'Babu Bhai', 'Manav', 'Adi', 'Babu Bhai', 23, NULL),
(78, 24, 'In Masti, what do the 3 friends Vivek Oberoi, Aftab Shivdasani, and Riteish Deshmukh decide to do to add excitement to their lives?', 'Start a business', 'Go on a road trip', 'Plan a vacation', 'Have extramarital affairs', 'Have extramarital affairs', 23, NULL),
(81, 30, 'On which of the following systems of Hindu Philosophy Shankaracharya wrote commentary in 9th century AD?', 'Yoga', 'Sankya', 'Vaisheshika', 'Uttarmimansa', 'Uttarmimansa', 3, NULL),
(82, 30, 'Which among the following is not correct?', 'The capital of pandyas was Madurai', 'The capital of Cheras was Vanchi', 'Capital of the Videha Kingdom and Mithila', 'Capital of Gahadwal Dynasty and Kannauj', 'The capital of Cheras was Vanchi', 3, NULL),
(83, 30, 'Which king started the organization of Kumbh fair at Allahabad?', 'Harshavardhana', 'Dhruvasena Ii', 'Narshimhvarman', 'Akbar', 'Harshavardhana', 3, NULL),
(84, 30, 'Upnishads are books on', 'Politics', 'Philosophy', 'Medicine', 'Social life', 'Philosophy', 3, NULL),
(85, 30, 'Who was the first Indian ruler who had territory outside India?', 'Ashoka', 'Chandragupta Maurya', 'Kanishka', 'Huvishka', 'Kanishka', 3, NULL),
(86, 30, 'Who among the following was worshipped during Early Vedic Civilization?', 'Varuna', 'Indra', 'Surya', 'All', 'All', 3, NULL),
(87, 30, 'Where were the hymns of Rigveda composed?', 'Punjab', 'Gujarat', 'Rajasthan', 'Uttar Pradesh', 'Uttar Pradesh', 3, NULL),
(88, 30, 'What led to the end of Indus Valley Civilization?', 'Invasion of Aryans', 'Recurrent Floods', 'All', 'Earth quakes', 'All', 3, NULL),
(89, 30, 'Who was the main male God worshipped by Indus people?', 'Lord Vishnu', 'Vishnu', 'Brahma', 'Indra', 'Lord Vishnu', 3, NULL),
(90, 30, 'Which empire lasted the longest among the following?', 'The Palas', 'The Pratiharas', 'The Rashtrakutas', 'The Senas', 'The Rashtrakutas', 3, NULL),
(92, 32, 'Which country celebrates the Diwali festival as its national festival?', 'Sri Lanka', 'India', 'Nepal', 'Mauritius', 'Nepal', 1, NULL),
(93, 32, 'What is the national sport of Japan?', 'Sumo Wrestling', 'Taekwond', 'Karate', 'Judo', 'Sumo Wrestling', 1, NULL),
(94, 32, 'Which country is known for its colorful Carnaval festival?', 'Italy', 'Brazil', 'Spain', 'Mexico', 'Brazil', 1, NULL),
(95, 32, 'Which country is famous for its intricate Henna designs?', 'Egypt', 'Morocco', 'Saudi Arabia', 'India', 'Morocco', 1, NULL),
(96, 32, 'Which language is spoken by the majority of people in Brazil?', 'Spanish', 'Portuguese', 'French', 'Italian', 'Portuguese', 1, NULL),
(97, 32, 'Which country is famous for its classical dance form called ', 'China', 'Thailand', 'India', 'Japan', 'India', 1, NULL),
(98, 32, 'Which is the highest mountain peak in India?', 'Mount Everest', 'Kanchenjunga', 'Nanda Devi', 'Annapurna', 'Nanda Devi', 1, NULL),
(99, 32, 'Where is the Taj Mahal located?', 'Delhi', 'Agra', 'Lucknow', 'Jaipur', 'Agra', 1, NULL),
(100, 32, 'In which year did India gain independence from British rule?', '1947', '1950', '1967', '1958', '1947', 1, NULL),
(101, 32, 'What is the currency of India?', 'Rial', 'Peso', 'Rupee', 'Taka', 'Rupee', 1, NULL),
(104, 36, 'India lies in which hemisphere', 'Northern and eastern', 'Southern and eastern', 'Northern and western', 'Northern and southern', 'Northern and eastern', 3, NULL),
(105, 36, 'Which foreign country is closest to Andaman Islands?', 'Sri Lanka', 'Myanmar', 'Indonesia', 'Pakistan', 'Myanmar', 3, NULL),
(106, 36, 'Which part of the Himalayas has the maximum stretch from east to West?', 'Kumaun Himalayas', 'Assam Himalayas', 'Panjab Himalayas', 'Nepal Himalayas', 'Nepal Himalayas', 3, NULL),
(107, 36, 'Which of the following mountain ranges in India are the oldest?', 'Himalayas', 'Vindhyas', 'Aravalli', 'Sahyadri', 'Aravalli', 3, NULL),
(108, 36, 'Which one of the following is  NOT  a part along the western coast of  India?', 'Nhava Sheva', 'Marmagao', 'Tuticorin', 'Kochi', 'Tuticorin', 3, NULL),
(109, 36, 'The standard time of a country differs from the  GMT in multiples of', 'Four minutes', 'Half hour', 'Two hours', 'One hour', 'Half hour', 3, NULL),
(110, 36, 'The famous Lagoon lake of India is', 'Dal Lake', 'Chilka Lake', 'Mansarover', 'Pullicat Lake', 'Chilka Lake', 3, NULL),
(111, 36, 'Which mountain range is considered the tallest in the world?', 'Andes', 'Alps', 'Himalayas', 'Rockies', 'Himalayas', 3, NULL),
(112, 36, 'Which country is the smallest by land area?', 'Monaco', 'Vatican City', 'Nauru', 'Switzerland', 'Vatican City', 3, NULL),
(113, 36, 'What is the capital of Australia?', 'Sydney', 'Canberra', 'Melbourne', 'Brisbane', 'Canberra', 3, NULL),
(115, 38, 'Which of the following is a markup language used for structuring web content?', 'CSS', 'JavaScript', 'HTML', 'PHP', 'HTML', 22, NULL),
(116, 38, 'What is the purpose of CSS in web development?', 'Server-Side Scripting', 'Styling and Presentation', 'Database Management', 'Client-Side Scripting', 'Styling and Presentation', 22, NULL),
(117, 38, 'Which HTTP status code indicates a successful request?', '500 Internal Server Error', '200 OK', ' 404 Not Found', '302 Found', '200 OK', 22, NULL),
(118, 38, 'What does CSS stand for?', 'Cascading Style Sheets', 'Creative Style Sheets', 'Computer Style Sheets', 'Content Style Sheets', 'Cascading Style Sheets', 22, NULL),
(119, 38, 'In CSS what property is used to control the spacing between elements?', 'margin', 'padding', 'border', 'spacing', 'margin', 22, NULL),
(120, 38, 'Which of the following is not a valid HTTP request method?', 'UPDATE', 'POST', 'DELETE', 'GET', 'UPDATE', 22, NULL),
(121, 38, 'What is the purpose of the CSS property display: none;?', 'It makes an element invisible but still occupies space on the page', 'It completely removes an element from the document flow', 'It changes the color of the text within an element', ' It increases the size of an element', 'It completely removes an element from the document flow', 22, NULL),
(122, 38, 'Which of the following tags is used for creating a hyperlink in HTML?', 'link', 'a', 'hype', 'url', 'link', 22, NULL),
(123, 38, 'Which of the following is a server-side scripting language commonly used for web development?', 'PHP', 'HTML', 'JavaScript', 'CSS', 'PHP', 22, NULL),
(124, 38, 'Which of the following languages is primarily used for adding interactivity to web pages?', 'Python', 'HTML', 'JavaScript', 'CSS', 'JavaScript', 22, NULL),
(125, 33, 'Which of the following is NOT a type of computer operating system?', 'Windows', 'Java', 'Android', 'macOS', 'Java', 1, NULL),
(126, 33, 'Which of the following is used to measure the processing speed of a computers CPU?', 'Gigahertz (GHz)', 'Megabytes (MB)', 'Kilobytes (KB)', 'Terabytes (TB)', 'Gigahertz (GHz)', 1, NULL),
(127, 33, 'What does SSL stand for in the context of internet security?', 'Secure Software Layer', 'Secure Socket Layer', 'Super Security Layer', 'Safe and Secure Link', 'Secure Socket Layer', 1, NULL),
(128, 33, 'Which of the following is a widely used relational database management system?', 'MongoDB', 'SQLite', 'MySQL', 'Redis', 'MySQL', 1, NULL),
(129, 33, 'Which of the following is a cloud storage service provided by Amazon?', 'Google Drive', 'Amazon S3', 'Dropbox', 'iCloud', 'Amazon S3', 1, NULL),
(130, 33, 'What does VPN stand for?', 'Virtual Private Network', 'Very Private Network', 'Visual Personal Network', 'Virtual Public Network', 'Virtual Private Network', 1, NULL),
(131, 33, 'Which of the following is used to measure internet connection speed?', 'GPU', 'Mbps', 'CPU', 'RAM', 'Mbps', 1, NULL),
(132, 33, 'Which of the following is a type of malware that self-replicates and spreads to other computers?', 'Virus', 'Firewall', 'Router', 'Proxy', 'Virus', 1, NULL),
(133, 33, 'Which company developed the Android operating system?', 'Apple', 'Microsoft', 'Google', 'Samsung', 'Google', 1, NULL),
(134, 33, 'What does URL stand for?', 'Uniform Resource Locator', 'Universal Remote Link', 'Unified Resource Link', 'Unified Remote Locator', 'Uniform Resource Locator', 1, NULL),
(135, 39, 'Which country won the ICC Cricket World Cup in 2019?', 'Australia', 'England', 'India', 'New Zealand', 'England', 2, NULL),
(136, 39, 'Which cricket team holds the record for the highest team score in a Test match innings?', 'Australia', 'England', 'India', 'West Indies', 'India', 2, NULL),
(137, 39, 'Which country hosted the inaugural ICC T20 World Cup in 2007?', 'Australia', 'England', 'India', 'South Africa', 'South Africa', 2, NULL),
(138, 39, 'Who was the first cricketer to score a triple century in Test cricket?', 'Don Bradman', 'Brian Lara', 'Sir Garfield Sobers', 'Virender Sehwag', 'Sir Garfield Sobers', 2, NULL),
(139, 39, 'Which country won the ICC Womens Cricket World Cup in 2017?', 'Australia', 'England', 'India', 'New Zealand', 'England', 2, NULL),
(140, 39, 'Which cricket ground is known as the Home of Cricket?', 'Lords Cricket Ground', 'Melbourne Cricket Ground', 'Sydney Cricket Ground', 'Eden Gardens', 'Lords Cricket Ground', 2, NULL),
(141, 39, 'Who is the leading wicket taker in Test cricket?', 'Shane Warne', 'Muttiah Muralitharan', 'James Anderson', 'Anil Kumble', 'James Anderson', 2, NULL),
(142, 39, 'Which country won the ICC Champions Trophy in 2013?', 'Pakistan', 'India', 'England', 'Australia', 'India', 2, NULL),
(143, 39, 'Which country has won the most ICC Cricket World Cups?', 'West Indies', 'India', 'England', 'Australia', 'Australia', 2, NULL),
(144, 39, 'Who holds the record for the fastest century in Test cricket in terms of balls faced?', 'Brendon McCullum', 'Adam Gilchrist', 'Vivian Richards', 'David Warner', 'Brendon McCullum', 2, ''),
(145, 40, 'Identify the below image', 'Orange', 'Papaya', 'Apple', 'Watermelon', 'Watermelon', 6, './shared/images/watermelon.png'),
(153, 40, 'What color is this', 'Orange', 'Blue', 'Green', 'Yellow', 'Blue', 6, './shared/images/blue.png'),
(154, 40, 'Identify this image', 'Hat', 'Cap', 'Headband', 'Bonnet', 'Hat', 6, './shared/images/hat.jpg'),
(155, 40, 'Identify this image', 'Cherry', 'Tomato', 'Bell Pepper', 'Strawberry', 'Tomato', 6, './shared/images/tomato.jpg'),
(156, 40, 'Identify this image', 'Dinosaur', 'Gorilla', 'Giraffe', 'Panda', 'Panda', 6, './shared/images/baby.png'),
(159, 40, 'Identify this image', 'Pen', 'Pencil', 'Marker', 'Highlighter', 'Pen', 6, './shared/images/pen.webp'),
(160, 40, 'What shape is this', 'Circle', 'Rectangle', 'Oval', 'Triangle', 'Oval', 6, './shared/images/oval.jpg'),
(161, 40, 'Identify this image', 'Helicopter', 'Aeroplane', 'Car', 'Train', 'Aeroplane', 6, './shared/images/aeroplane.png'),
(162, 40, 'Identify the below vegetable', 'Cauliflower', 'Broccoli', 'Cabbage', 'Coriander', 'Broccoli', 6, './shared/images/broccoli.png'),
(163, 40, 'Identify this image', 'Football', 'Throwball', 'Volleyball', 'Basketball', 'Football', 6, './shared/images/football.webp'),
(164, 49, 'Identify this logo', 'Alfa Romeo', 'Mazda', 'Minicooper', 'Fiat', 'Minicooper', 1, './shared/images/minicooper.png'),
(165, 49, 'Identify this image', 'Frito Lay', 'Pepsi', 'Lays', 'Quaker Oats', 'Lays', 1, './shared/images/lays.webp'),
(166, 49, 'Identify the below image', 'Nestle', 'Kraft', 'Cadbury', 'Mars', 'Nestle', 1, './shared/images/nestle.webp'),
(168, 49, 'Identify this image', 'Fevikwik', 'Fevicol', 'Superglue', 'Gorilla Glue', 'Fevicol', 1, './shared/images/fevicol.jpeg'),
(169, 49, 'Identify this image', 'Skype', 'Google Cloud', 'Zoom', 'Discord', 'Skype', 1, './shared/images/skype.webp'),
(170, 49, 'Identify this image', 'Hangyo', 'Little Hearts', 'Kwality walls', 'Havmor', 'Kwality walls', 1, './shared/images/kwalitywalls.png'),
(172, 49, 'Identify this image', 'Bharat Petroleum', 'Hindustan Petroleum', 'LIC', 'SBI', 'LIC', 1, './shared/images/lic.jpeg'),
(173, 49, 'Identify this image', 'Porsche', 'Ferrari', 'Eicher', 'TVS', 'TVS', 1, './shared/images/TVS.jpeg'),
(174, 49, 'This logo belongs to', 'Chevrolet', 'Chanel', 'Cartoon Network', 'Christian Dior', 'Chanel', 1, './shared/images/chanel.png'),
(175, 49, 'This logo belongs to', 'Xbox', 'Playstation', 'Nintendo', 'Xerox', 'Xbox', 1, './shared/images/images.png'),
(177, 54, 'Which country won the FIFA World Cup in 2018?\r\n', 'Brazil', 'France', 'Germany', 'Argentina', 'France', 2, NULL),
(178, 54, 'What is the name of the trophy awarded to the winner of the UEFA Champions League?', 'FIFA World Cup Trophy\r\n', 'European Cup\r\n', 'UEFA Cup\r\n', 'Champions League Trophy\r\n', 'Champions League Trophy\r\n', 2, NULL),
(179, 54, 'Who is the all-time leading goal scorer in the English Premier League?\r\n', 'Thierry Henry\r\n', 'Wayne Rooney\r\n', 'Alan Shearer\r\n', 'Cristiano Ronaldo\r\n', 'Alan Shearer\r\n', 2, NULL),
(180, 54, 'Which football club is known as The Red Devils?\r\n', 'Bayern Munich', 'Manchester United', 'Liverpool\r\n', 'Paris Saint Germain', 'Manchester United', 2, NULL),
(181, 54, '\r\nWhich player has won the Ballon d\'Or award the most times?\r\n\r\n', 'Lionel Messi\r\n', 'Cristiano Ronaldo\r\n', 'Michel Platini\r\n', 'Diego Maradona\r\n', 'Lionel Messi\r\n', 2, NULL),
(182, 54, 'What is the maximum number of substitutions allowed in a regulation football match?', '2', '3', '4', '5', '3', 2, NULL),
(183, 54, 'What is the maximum number of players a team can have on the field during a football match?\r\n', '9', '10', '11', '12', '11', 2, NULL),
(184, 54, 'Who is the manager of the Liverpool Football Club as of 2024?\r\n', 'Pep Guardiola', 'Jurgen Klopp', 'Diego Simeone\r\n', 'Carlo Ancelotti', 'Jurgen Klopp', 2, NULL),
(185, 54, 'In which city is the football club AC Milan based?\r\n', 'Rome', 'Milan', 'Turin\r\n', 'Naples', 'Milan', 2, NULL),
(186, 54, 'Which country has won the most FIFA World Cup titles?\r\n', 'Brazil', 'Germany', 'Argentina\r\n', 'Italy', 'Brazil', 2, NULL),
(187, 55, 'Which of the following is a renewable source of energy?', 'Coal', 'Natural gas', 'Solar power', 'Nuclear power', 'Solar power', 1, NULL),
(188, 55, 'Which planet is known as the Red Planet?', 'Venus', 'Mars', 'Jupiter', 'Saturn', 'Mars', 1, NULL),
(189, 55, 'What is the primary gas that makes up the Earths surface?', 'Oxygen', 'Carbon dioxide', 'Nitrogen', 'Hydrogen', 'Nitrogen', 1, NULL),
(190, 55, 'What is the name of the largest ocean on Earth?', 'Atlantic Ocean', 'Indian Ocean', 'Pacific Ocean', 'Arctic Ocean', 'Pacific Ocean', 1, NULL),
(191, 55, 'Which of the following is NOT a type of precipitation?', 'Rain', 'Snow', 'Lightning', 'Hail', 'Lightning', 1, NULL),
(192, 55, 'Which of the following is a mammal?', 'Snake', 'Turtle', 'Dolphin', 'Crocodile', 'Dolphin', 1, NULL),
(193, 55, 'What is the largest organ in the human body?', 'Brain', 'Heart', 'Skin', 'Liver', 'Skin', 1, NULL),
(194, 55, 'What is the process by which plants convert sunlight into energy?', 'Respiration', 'Photosynthesis', 'Transpiration', 'Germination', 'Photosynthesis', 1, NULL),
(195, 55, 'Which of the following is a greenhouse gas?', 'Oxygen', 'Nitrogen', 'Carbon dioxide', 'Argon', 'Carbon dioxide', 1, NULL),
(196, 55, 'Which of the following is a renewable resource?', 'Natural gas', 'Coal', 'Oil', ' Wind energy', ' Wind energy', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `CategoryID`, `Title`) VALUES
(10, 6, 'Simple '),
(11, 6, 'Cartoon '),
(22, 22, 'C/C++'),
(23, 23, 'Horror Movie'),
(24, 23, 'Comedy'),
(30, 3, 'History'),
(32, 1, 'Cultural Diversity'),
(33, 1, 'Technology'),
(36, 3, 'Geography'),
(38, 22, 'Web Programming'),
(39, 2, 'Cricket'),
(40, 6, 'Image identify'),
(49, 1, 'Logo Identify'),
(54, 2, 'Football'),
(55, 1, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `ResponseID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `QuizID` int(11) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`ResponseID`, `UserID`, `QuizID`, `Score`, `CategoryID`) VALUES
(297, 12, 10, 4, 6),
(299, 18, 10, 5, 6),
(300, 14, 10, 6, 6),
(304, 14, 22, 4, 22),
(305, 7, 22, 10, 22),
(307, 13, 22, 8, 22),
(308, 13, 24, 8, 23),
(309, 18, 22, 9, 22),
(311, 13, 10, 6, 6),
(313, 15, 24, 10, 23),
(314, 15, 23, 8, 23),
(315, 16, 22, 5, 22),
(316, 16, 24, 4, 23),
(317, 5, 23, 1, 23),
(318, 5, 24, 4, 23),
(322, 14, 23, 7, 23),
(324, 14, 24, 2, 23),
(330, 5, 22, 8, 22),
(331, 5, 10, 9, 6),
(367, 15, 22, 10, 22),
(368, 14, 30, 10, 3),
(369, 18, 23, 3, 23),
(370, 13, 32, 8, 1),
(372, 5, 32, 3, 1),
(373, 5, 30, 2, 3),
(375, 14, 11, 7, 6),
(376, 5, 36, 7, 3),
(377, 5, 38, 7, 22),
(379, 14, 40, 1, 6),
(395, 17, 39, 9, 2),
(396, 17, 55, 10, 1),
(397, 17, 33, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `user_type`) VALUES
(5, 'Disha', 'disha@gmail.com', '$2y$10$Eh92TN8SdX4mqrPtcd/Gy.6FPmiww86qGzvMQyAeJhqH4MRtILNZ.', ' user'),
(6, 'Divya', 'divya@gmail.com', '$2y$10$6htjGoEuGTZqyI.tTvbGNupjID1RcXhBk0XkqYFJHV.YT9HFt9WNK', ' admin'),
(7, 'Akanksha', 'akanksha@gmail.com', '$2y$10$oxxb.XOmkDjOuODkIisS3u6L9gAjFLzl6m3Qtl6xKhO9jaF4rINOy', ' user'),
(8, 'Riya', 'riya@gmail.com', '$2y$10$Ve2ZP3d1/ShCcAq2CGwVW.PWyIeZO3G./e.KVb1H6ZVyC46OT/C.q', ' user'),
(12, 'Anisha', 'anisha@gmail.com', '$2y$10$UILOeiOhpKHgg/1LMXq.luiSLK80OyzVxmfSc2vXGSw.6kcAacgby', ' user'),
(13, 'Neha', 'neha@gmail.com', '$2y$10$EifenG0wKfkMT44M.yuSvO95Cm7CzGjjXUBnMfJUz3QbneGjmGkEe', ' user'),
(14, 'Lisha', 'lisha@gmail.com', '$2y$10$WryId0HopW3fLJRmWUlmxe5RMF4GvAV2t8vvmfp9y19d27f8WJ2Om', ' user'),
(15, 'Sara', 'sara@gmail.com', '$2y$10$C1u128W/eGnqHtvdiWvmM.kNB2es0b2dbcGweeEPaSZ13s/eVY97G', ' user'),
(16, 'Lenita', 'lenita@gmail.com', '$2y$10$dJ279Az2MgP3uove1DtylOEsEVsdfXdL0oEkeeGtYRR/rxrYUQxAm', ' user'),
(17, 'Sheela', 'sheela@gmail.com', '$2y$10$qSYPsTzkmu5sfR95arEIWO6ueLchgrPmfsYTfndaXFpGYi4CmAdBu', ' user'),
(18, 'Maria', 'maria@gmail.com', '$2y$10$BmuksDD2Sgf7Faoto5qRc.5INcHaQ8GFgy80JPhJZNdw1EsI7UmH.', ' user'),
(22, 'Kriti', 'kriti@gmail.com', '$2y$10$MdA91aA8SXpdRn4aLEtSP.t4DI9sX2ZOuoLW5wy9I56vLGS.NyZD2', ' user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `QuizID` (`QuizID`),
  ADD KEY `fk_category` (`CategoryID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`ResponseID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `QuizID` (`QuizID`),
  ADD KEY `fk_category_id` (`CategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `quizzes` (`QuizID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`QuizID`) REFERENCES `quizzes` (`QuizID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
