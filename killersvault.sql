-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 04:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `killersvault`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'SAW'),
(2, 'Nightmare On Elm Street'),
(3, 'Halloween'),
(4, 'The Thing'),
(5, 'Friday The 13th'),
(6, 'Texas Chainsaw Massacre'),
(7, 'Scream'),
(8, 'The Evil Dead');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`) VALUES
(1, 'Paola', 1),
(2, 'Rabat', 1),
(3, 'Mellieha', 1),
(4, 'Gzira', 1),
(5, 'Victoria(Rabat)', 2),
(6, 'Xaghra', 2),
(7, 'Marsalforn', 2),
(8, 'Gharb', 2),
(9, 'Madrid', 3),
(10, 'Barcelona', 3),
(11, 'Seville', 3),
(12, 'Valencia', 3),
(13, 'Rome', 4),
(14, 'Milan', 4),
(15, 'Florence', 4),
(16, 'Venice', 4),
(17, 'Palermo', 5),
(18, 'Catania', 5),
(19, 'Messina', 5),
(20, 'Syracuse', 5),
(21, 'Paris', 6),
(22, 'Marseille', 6),
(23, 'Lyon', 6),
(24, 'Nice', 6),
(25, 'Lisbon', 7),
(26, 'Porto', 7),
(27, 'Faro', 7),
(28, 'Coimbra', 7),
(29, 'Newcastle', 8),
(30, 'London', 8),
(31, 'Manchester', 8),
(32, 'Edinburgh', 8),
(33, 'Stockholm', 9),
(34, 'Gothenburg', 9),
(35, 'Malmö', 9),
(36, 'Uppsala', 9),
(37, 'Helsinki', 10),
(38, 'Tampere', 10),
(39, 'Turku', 10),
(40, 'Oulu', 10);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `message`, `submission_date`) VALUES
(3, 'Majsi', 'banananslayer69@gmail.com', 'fnjkfnbsdbnf', '2024-01-05 22:12:28'),
(4, '', '', '', '2024-01-05 22:15:03'),
(5, '', '', '', '2024-01-06 15:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Malta'),
(2, 'Gozo'),
(3, 'Spain'),
(4, 'Italy'),
(5, 'Sicily'),
(6, 'France'),
(7, 'Portugal'),
(8, 'United Kingdom'),
(9, 'Sweden'),
(10, 'Finland');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `billing_address` text NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `order_date` datetime NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_with_shipping` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `billing_address`, `card_number`, `order_date`, `shipping_cost`, `total_with_shipping`, `status`) VALUES
(2, 'Lola', '230 Triq Il-Parilja Santa Venera', '4588701814332000', '2024-01-07 17:35:32', 5.00, 5.00, 'Shipped'),
(3, 'Coolio', '123 Banana Street', '4588701814332000', '2024-01-07 17:37:48', 5.00, 5.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `total_price`) VALUES
(2, 2, 3, 1, 250.00),
(3, 3, 6, 1, 180.00),
(4, 3, 21, 1, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `imagePath` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `categoryid`, `price`, `description`, `imagePath`) VALUES
(1, 'Jigsaw Mask', 1, 75.00, '\r\nThe Jigsaw mask, also known as the Billy the Puppet mask, is an iconic and eerie prop associated with the fictional character \"Jigsaw\" from the Saw film series. Jigsaw is the alias of John Kramer, a mysterious and sadistic mastermind who creates elaborate traps to test the moral and psychological strength of his victims.\r\n\r\nThe mask is a white, featureless face with red spirals painted on both cheeks, resembling the markings of a ventriloquist\'s dummy or puppet. It has a disconcerting and unsettling appearance, with exaggerated, elongated features and a sinister grin. The mask is typically worn by Jigsaw\'s puppet, named Billy, which serves as the messenger and face of Jigsaw\'s twisted games.\r\n\r\nThe Jigsaw mask has become an iconic symbol of the Saw franchise, instantly recognizable and associated with the psychological horror and suspense of the films. It adds to the unsettling atmosphere created by the character and is often used in promotional material for the movies.', 'productimages\\jigsawmask.png'),
(2, 'The Rack', 1, 2300.00, 'The Rack trap, featured in the Saw film series, is a harrowing and sadistic contraption designed to inflict extreme physical torment. Comprising a large metal frame reminiscent of a medieval torture device, it restrains the victim with shackles and restraints for their limbs and neck. Once activated, the Rack slowly twists and stretches the victim\'s limbs in opposite directions, exerting excruciating pressure on their joints. The purpose of this gruesome trap, orchestrated by the Jigsaw killer, is to test the victim\'s will to survive and their moral integrity. Victims, usually connected to their own ethical transgressions, must face the agonizing choice of enduring immense pain or resorting to self-mutilation in order to escape the trap, adding to the psychologically disturbing nature of the Saw series.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'productimages\\therack.png'),
(3, 'Reverse Bear Trap', 1, 250.00, '\r\nThe Reverse Bear Trap is one of the most infamous and visually striking traps in the Saw film series. A replica of the Reverse Bear Trap captures the menacing and horrifying essence of this device. \r\nThe replica Reverse Bear Trap is a meticulously crafted and chilling piece of horror memorabilia, designed to closely emulate the nightmarish device featured in the Saw movies. It consists of a menacing metal apparatus that encases the victim\'s head with intricate, sharp details reminiscent of a bear trap, but with a twisted and reversed design.\r\n\r\nThe main structure comprises a series of interlocking metal pieces, complete with serrated edges and ominous spikes that add to its intimidating appearance. The trap is often made from durable materials to ensure an authentic and foreboding feel. The metal is usually distressed or aged, contributing to a sense of grim history and malevolence.\r\n\r\nThe centerpiece of the replica is the jaw-like contraption that encloses the victim\'s head. This jaw is lined with menacing metal teeth, designed to clamp shut in a reverse fashion when triggered. It is often detailed with rust effects, adding to the overall sense of decay and horror.\r\n\r\nDisplaying intricate craftsmanship, the replica Reverse Bear Trap is both an homage to the Saw franchise and a spine-chilling conversation piece. Whether showcased as a collector\'s item or used as part of a Halloween costume, this replica encapsulates the terror and suspense associated with one of Jigsaw\'s most unforgettable traps.\r\n\r\n\r\n\r\n\r\n\r\n', 'productimages\\ReverseBearTrap.png'),
(4, 'Freddy Kreuger Sweater', 2, 80.00, 'Freddy Krueger\'s sweater is a bold and haunting garment that plays a crucial role in establishing the character\'s memorable image. The sweater features horizontal stripes in two prominent colors: red and green. The alternating stripes create a visually striking and slightly disorienting pattern, contributing to the unsettling nature of Freddy\'s overall appearance.\r\n\r\nThe red and green stripes are not just random color choices; they are intentionally designed to evoke a sense of unease. The deep red stripes symbolize blood and danger, while the vibrant green ones represent decay and the supernatural. This color combination adds a layer of psychological horror to Freddy\'s character.\r\n\r\nThe fabric of the sweater is often depicted as weathered and worn, suggesting a history of violence and malevolence. The sleeves are long, and the neckline is often slightly stretched, adding to the overall unkempt and sinister look.\r\n\r\nThe sweater has become an iconic symbol of horror, instantly associated with the menacing presence of Freddy Krueger. It is a key element of his character design and has become a cultural touchstone for fans of the horror genre. Whether seen on the big screen or worn as part of a Halloween costume, Freddy\'s sweater remains a chilling and enduring symbol of nightmares.', 'productimages\\fksweater.png'),
(5, 'Freddy Kreuger Claw Gloves', 2, 200.00, 'The Freddy Krueger glove replica is a meticulously crafted homage to the infamous weapon wielded by the iconic horror character. The glove is characterized by its menacing and nightmarish design, featuring a metal frame and four razor-sharp, curved blades extending from the fingertips.\r\n\r\nThe glove\'s metal frame is often crafted from durable materials, ensuring an authentic and intimidating appearance. It may include realistic detailing, such as rivets, worn textures, and intricate patterns, mirroring the glove\'s sinister history in the \"A Nightmare on Elm Street\" film series.\r\n\r\nThe blades themselves are a focal point, designed to replicate Freddy\'s signature lethal appendages. They are typically made from sturdy materials, providing a dangerous look while ensuring safety for collectors or fans who may handle the replica. The blades may have a distressed finish to convey the sense of a weapon that has been through numerous nightmarish encounters.\r\n\r\nThe glove is built to be wearable, allowing fans to channel their inner Freddy Krueger for costume purposes or display it as a collector\'s item. Whether hung on a wall, showcased in a display case, or worn for Halloween, the Freddy Krueger glove replica captures the essence of the character\'s menacing and supernatural presence. It serves as a tangible connection to the horror genre and the enduring legacy of Freddy Krueger.', 'productimages\\fkglove.png'),
(6, 'Freddy Kreuger Hat', 2, 180.00, 'The Freddy Krueger hat replica is a sinister and recognizable piece that pays homage to the signature headwear worn by the iconic character. The hat is typically a fedora-style design with a brim that adds an extra layer of menace to Freddy\'s overall appearance.\r\n\r\nCrafted with attention to detail, the hat is often made from durable materials to ensure authenticity and longevity. It features a weathered and worn aesthetic, capturing the essence of Freddy\'s character and the nightmarish world he inhabits. The color is typically a dark, muted tone, enhancing the ominous and foreboding vibe.\r\n\r\nThe brim of the hat may be slightly upturned on one side, reflecting Freddy\'s distinct sense of style. Additionally, it may have intentional distressing or aging effects to convey the wear and tear associated with a character who haunts dreams and nightmares.\r\n\r\nThe Freddy Krueger hat replica is a versatile accessory, perfect for completing a Halloween costume or adding a touch of horror flair to a display or collection. Whether displayed on a hat stand or worn as part of a costume, this replica captures the essence of Freddy Krueger\'s sinister and enduring presence in the horror genre.', 'productimages\\fkhat.jpg'),
(7, 'Antarctic Expedition Gear Set', 4, 3200.00, 'An Antarctic gear set is specially designed to provide protection and functionality in the extreme cold and harsh conditions of Antarctica. Here\'s a description:\r\n\r\n1. Antarctic Parka:\r\nThe parka is the centerpiece of the Antarctic gear set, designed for maximum insulation against freezing temperatures. It features a durable, waterproof outer shell to repel snow and sleet, and an insulated inner layer to trap body heat. The parka often includes a high collar and a detachable, insulated hood for additional protection against biting winds.\r\n\r\n2. Insulated Pants:\r\nThe insulated pants are designed to provide warmth and flexibility in icy conditions. They are often constructed with water-resistant materials and feature thick insulation to keep the legs warm. The pants may have reinforced knees and seat areas for durability and protection against the cold ground.\r\n\r\n3. Thermal Base Layers:\r\nA set of thermal base layers is essential for maintaining body heat in sub-zero temperatures. These layers are designed to wick moisture away from the body while providing an additional barrier against the cold. The base layers are typically made from high-performance, breathable fabrics.\r\n\r\n4. Extreme Cold Weather Boots:\r\nAntarctic boots are engineered to withstand extremely low temperatures and provide excellent traction on icy surfaces. They often feature insulated linings, waterproof materials, and heavy-duty outsoles with deep treads for stability in icy conditions.\r\n\r\n5. Thermal Gloves:\r\nInsulated and waterproof gloves are crucial for protecting the hands from frostbite and maintaining dexterity in freezing conditions. They may include additional features such as touchscreen compatibility for practicality in a modern setting.\r\n\r\n6. Goggles or Sunglasses:\r\nProtecting the eyes from snow glare and icy winds is essential. Goggles or sunglasses with UV protection and anti-glare coatings help to maintain visibility and shield the eyes from harsh conditions.\r\n\r\n7. Balaclava or Face Mask:\r\nTo shield the face from freezing winds, a balaclava or face mask is often included in the Antarctic gear set. These items provide additional insulation for the nose, mouth, and neck.\r\n\r\n8. Expedition Backpack:\r\nAn expedition backpack designed for Antarctic conditions is essential for carrying gear and supplies. It is often equipped with reinforced straps, multiple compartments, and may include features like an integrated hydration system.\r\n\r\nThe Antarctic gear set is meticulously designed to offer both protection and comfort in one of the harshest environments on Earth, ensuring that individuals are well-equipped to handle the extreme cold and challenging conditions of Antarctica.', 'productimages\\thethinggear.png'),
(8, 'The Thing in a Jar', 4, 400.00, 'The Thing in a Jar:\r\nThe Thing in a jar is a chilling and enigmatic entity discovered by the characters in the Antarctic research facility. The jar itself is a clear, cylindrical container with a tight-sealing lid, giving an illusion of containment and safety. Inside the jar is a grotesque and nightmarish creature, a manifestation of the extraterrestrial shape-shifting organism at the center of the film\'s horror.\r\n\r\nThe creature is a mass of writhing, alien tissue with an otherworldly appearance. It seems to defy biological norms, with contorted limbs, strange appendages, and an unsettling combination of organic and inorganic elements. The Thing in the jar represents the horror and mystery surrounding the extraterrestrial organism, as it constantly mutates and mimics other life forms.\r\n\r\nThe jar itself is labeled with cautionary warnings and symbols, emphasizing the dangerous nature of the contained creature. The lighting in the scene is dim, casting eerie shadows on the creature and creating an atmosphere of dread and suspense.', 'productimages\\TheThing.jpg'),
(9, 'Alien Plush Toy', 4, 50.00, 'Alien Plush Toy - The Thing Edition:\r\nThis Alien Plush toy is a chilling yet adorable representation of the extraterrestrial organism featured in the iconic horror film \"The Thing.\" The plush is designed to capture the eerie and shape-shifting nature of the creature, while still maintaining a certain level of cuteness.\r\n\r\nAppearance:\r\nThe plush toy features a compact, huggable design with soft, plush fabric. Its exterior would be a blend of dark and muted colors, perhaps with a slightly ominous undertone to evoke the atmosphere of the movie. The alien\'s features would be rendered in a cartoonish and stylized manner to balance the horror elements with a playful touch.\r\n\r\nDetails:\r\nTo capture the essence of the Thing\'s ability to mimic other life forms, the plush might have interchangeable features. Velcro attachments could allow for different mouths, eyes, or limbs, showcasing the creature\'s shape-shifting abilities. The plush could come with a variety of these interchangeable parts to allow users to create their own monstrous or cute versions.\r\n\r\nLabeling and Packaging:\r\nThe Alien Plush toy would come with packaging inspired by the Antarctic research facility setting of the movie. The box might include cautionary labels and symbols, mirroring the containment warnings seen in the film. The packaging could add an extra layer of authenticity, immersing fans in the world of \"The Thing.\"\r\n\r\nCollector\'s Edition:\r\nFor a more sophisticated market, a collector\'s edition might include additional features such as glow-in-the-dark elements, sound effects mimicking the eerie noises from the movie, or a small booklet with behind-the-scenes information about the making of the film.', 'productimages\\alienplush.jpg'),
(10, 'Jason Voorhees Hockey Mask', 5, 100.00, 'Jason Voorhees Mask Replica:\r\nThe Jason Voorhees mask replica is a meticulously crafted homage to the infamous hockey mask worn by the iconic slasher villain. This mask is a symbol of fear and has become synonymous with the character\'s murderous rampage in the Crystal Lake woods.\r\n\r\nMaterials and Construction:\r\nConstructed from durable materials, the mask typically replicates the appearance of weathered, battle-worn hockey gear. The surface may feature subtle distressed details, scratches, and markings to convey the wear and tear of Jason\'s enduring presence in the film series. The mask maintains a menacing, angular shape, with the eye and mouth cutouts creating an eerie, expressionless visage.\r\n\r\nColoration:\r\nThe mask\'s coloration is instantly recognizable—a stark white base with bold red markings around the eyes and mouth. The red elements often appear as weathered, giving the mask an authentic, lived-in look. The contrast between the white and red contributes to the mask\'s ominous and nightmarish presence.\r\n\r\nStraps and Fit:\r\nTo ensure a secure fit for fans or collectors, the mask replica typically includes adjustable straps or fastenings. This allows for comfortable wear during Halloween costumes or display purposes. The straps may be discreetly integrated to maintain the mask\'s authenticity while providing practical functionality.\r\n\r\nDisplay and Collector\'s Item:\r\nWhether hung on a wall as part of a horror memorabilia collection or worn as part of a Jason Voorhees costume, the replica mask serves as a chilling homage to the slasher genre. Some high-quality replicas may even include additional features like adjustable straps or padding for enhanced comfort.', 'productimages\\jvmask.png'),
(11, 'Camp Crystal Lake Apparel', 5, 35.00, 'Camp Crystal Lake apparel is a collection of clothing and accessories that pays homage to the infamous campground featured in the \"Friday the 13th\" horror film franchise. This apparel captures the essence of the ominous and eerie atmosphere surrounding the fictional camp, known for its dark history and association with the hockey-masked killer, Jason Voorhees.', 'productimages\\cclmerch.png'),
(12, 'Jason Voorhees\'s Matchete', 5, 90.00, 'Jason Voorhees Machete Replica:\r\nThe Jason Voorhees machete replica is a meticulously crafted homage to the menacing weapon brandished by the iconic horror character. This replica captures the essence of the weapon\'s ominous presence in the films.\r\n\r\nMaterials and Construction:\r\nConstructed from durable materials, the machete replica often features a realistic blade crafted from metal or high-quality plastic. The blade may have a weathered, distressed finish to mimic the wear and tear accumulated during Jason\'s terrifying exploits. The handle is designed to replicate the look of aged and worn leather or other materials, adding to the authenticity of the piece.\r\n\r\nSize and Proportions:\r\nThe machete replica typically mirrors the size and proportions of the weapon as seen in the films. It is large enough to evoke a sense of menace and danger while still being safe for display or costume purposes.\r\n\r\nDetails and Engravings:\r\nTo capture the specific details of Jason\'s machete, the replica may include engravings or etchings on the blade. These details could include markings or symbols associated with the character or the \"Friday the 13th\" franchise.\r\n\r\nDisplay and Collector\'s Item:\r\nThe machete replica is designed to serve as a collector\'s item or a display piece for fans of the horror genre. Some replicas come with a display stand or wall-mounting options, allowing enthusiasts to showcase this iconic weapon in their collection.\r\n\r\nPractical Use for Costumes:\r\nFor those looking to complete a Jason Voorhees costume, the machete replica may include a safe, blunted edge, making it suitable for costume events or Halloween parties. Safety considerations are paramount, ensuring that it can be wielded without risk of harm.\r\n\r\nLimited Editions and Authenticity:\r\nCertain machete replicas may be part of limited-edition releases, featuring additional details, exclusive packaging, or a certificate of authenticity. These aspects enhance the collector\'s appeal of the replica.\r\n\r\nThe Jason Voorhees machete replica captures the essence of the horror genre, allowing fans to bring a piece of the iconic slasher series into their homes or display collections. Whether hung on a wall or used as part of a costume, it serves as a chilling tribute to the enduring legacy of Jason Voorhees in the realm of horror cinema.', 'productimages\\jvmachete.png'),
(13, 'Michael Myers Mask', 3, 160.00, 'Michael Myers Mask Replica:\r\nThe Michael Myers mask replica is a meticulously crafted homage to the haunting visage worn by the silent and relentless killer in the \"Halloween\" franchise. This replica captures the essence of the emotionless and malevolent presence of Michael Myers.\r\n\r\nMaterials and Construction:\r\nCrafted from high-quality materials, the mask often replicates the original mask used in the films. It may be made from latex, silicone, or other suitable materials to achieve a realistic and durable finish. The mask is molded to capture the distinctive features of Michael Myers\' face, including the blank expression and signature hair.\r\n\r\nDetail and Accuracy:\r\nThe replica pays careful attention to the details that make Michael Myers\' mask instantly recognizable. This includes the pale, flesh-toned color, the slightly oversized and hollow eye sockets, and the straight, dark hair. The mask\'s expression is intentionally emotionless, evoking an eerie and unsettling quality.\r\n\r\nAging and Distressing:\r\nTo enhance authenticity, the replica may feature aging and distressing effects. This can include subtle discoloration, simulated wear and tear, or distress marks that mirror the decades of Michael Myers\' presence in the horror genre.\r\n\r\nFit and Comfort:\r\nDesigned for practical use, the mask replica typically includes features for comfort and wearability. It may have openings for the eyes, nose, and mouth, ensuring that the wearer can see and breathe comfortably while maintaining the iconic appearance.\r\n\r\nDisplay and Collector\'s Item:\r\nThe Michael Myers mask replica serves as a collector\'s item for fans of the \"Halloween\" series. Whether displayed in a case, on a mannequin head, or hung on the wall, the mask becomes a chilling centerpiece in horror memorabilia collections.\r\n\r\nLimited Editions:\r\nSome replicas may be part of limited-edition releases, offering additional features, exclusive packaging, or a certificate of authenticity. These limited editions enhance the collector\'s appeal and value of the mask.', 'productimages\\mmmask.jpg'),
(14, 'Michael Myers Butcher Knife', 3, 50.00, 'Michael Myers Butcher Knife Replica:\r\nThe Michael Myers butcher knife replica is a meticulously crafted homage to the menacing weapon wielded by the silent and relentless killer in the \"Halloween\" franchise. This replica captures the essence of the ominous and deadly presence of Michael Myers.\r\n\r\nMaterials and Construction:\r\nCrafted from high-quality materials, the knife replica typically features a blade made from durable materials such as stainless steel or other suitable alloys. The handle may be designed to mimic the look and feel of wood or another authentic material, capturing the essence of the original weapon.\r\n\r\nSize and Proportions:\r\nThe replica mirrors the size and proportions of the knife as seen in the films. It is designed to evoke a sense of menace and danger while still being safe for display or costume purposes. The length, shape, and overall design closely resemble the knife used by Michael Myers in the iconic scenes.\r\n\r\nDetail and Accuracy:\r\nThe knife replica pays careful attention to the details that make Michael Myers\' weapon instantly recognizable. This includes the distinctive shape of the blade, the size and curvature of the handle, and any unique features that make this knife an integral part of the character\'s identity.\r\n\r\nWeathering Effects:\r\nTo enhance authenticity, the replica may feature weathering effects to simulate wear and tear. This can include subtle scratches, aging marks, or distressing that gives the impression of a weapon that has been through the harrowing events of the films.\r\n\r\nDisplay and Collector\'s Item:\r\nThe Michael Myers butcher knife replica serves as a collector\'s item for fans of the \"Halloween\" series. Whether displayed in a case, on a weapon rack, or as part of a larger horror memorabilia collection, the knife becomes a chilling centerpiece.\r\n\r\nCostume and Cosplay Use:\r\nFor those looking to complete a Michael Myers costume or cosplay, the knife replica can be a crucial accessory. Safety considerations are paramount, ensuring that the blade is blunted or designed to prevent accidents during use.\r\n\r\nLimited Editions:\r\nSome replicas may be part of limited-edition releases, featuring additional features, exclusive packaging, or a certificate of authenticity. These limited editions enhance the collector\'s appeal and value of the knife replica.', 'productimages\\mmknife.jpg'),
(15, 'Michael Myers Overalls', 3, 150.00, 'The Michael Myers overalls replica is a meticulously crafted homage to the distinctive clothing worn by the silent and relentless killer in the \"Halloween\" film series. This replica captures the essence of the iconic look associated with Michael Myers.\r\n\r\nMaterials and Construction:\r\n\r\nCrafted from durable and comfortable materials, the overalls replica typically features a heavy-duty fabric similar to denim or another sturdy material. The overalls maintain a classic blue color associated with traditional workwear.\r\n\r\nDesign and Fit:\r\n\r\nThe design closely mirrors the overalls worn by Michael Myers in the films. They often feature a loose and baggy fit with adjustable straps and buckles for a versatile and comfortable wear. The overalls typically have a straight leg design, offering a timeless and practical appearance.\r\n\r\nAuthentic Details:\r\n\r\nThe replica pays careful attention to authentic details to recreate the look of Michael Myers\' overalls. This includes features like the front bib with a chest pocket, side pockets, and the distinctive cross-back straps. Stitching patterns and overall construction are crafted to closely resemble the on-screen attire.\r\n\r\nWeathering Effects:\r\n\r\nTo enhance authenticity, some replicas may incorporate weathering effects or distressing. This could include simulated wear and tear, subtle fading, or distress marks that give the overalls a lived-in and aged appearance, as if they\'ve been through the harrowing events of the films.\r\n\r\nVersatile Use:\r\n\r\nThe Michael Myers overalls replica is not just limited to costumes. It can be worn as part of a casual outfit or used as a statement piece for fans who want to incorporate a touch of horror into their everyday style.\r\n\r\nCollector\'s Item:\r\n\r\nFor collectors of horror memorabilia, the overalls replica serves as a notable piece to display alongside other items related to the \"Halloween\" film series. It can be featured on mannequins, costume displays, or within themed collections.\r\n\r\nCostume Accessory:\r\n\r\nWhether you\'re preparing for Halloween or a horror-themed event, the overalls replica is an essential accessory for fans looking to embody the silent and relentless presence of Michael Myers.\r\n\r\nA Michael Myers overalls replica is a tangible connection to the character\'s iconic appearance, allowing fans to step into the shoes of one of the most enduring figures in the horror genre.', 'productimages\\mmoveralls.jpg'),
(16, 'Leatherface Apron', 6, 101.00, 'The Leatherface apron replica is a meticulously crafted homage to the gruesome attire worn by the iconic horror character. This replica captures the essence of Leatherface\'s macabre appearance in the classic horror film.\r\n\r\nMaterials and Construction:\r\n\r\nCrafted from durable and weathered materials, the apron typically features a heavy-duty fabric resembling leather or another sturdy material. The choice of material and craftsmanship is designed to evoke the rough and homemade quality of Leatherface\'s gruesome attire.\r\n\r\nDesign and Distinctive Details:\r\n\r\nThe design closely mirrors the apron worn by Leatherface in the films. It often features a tattered and irregular cut, with uneven edges and distressed sections. The apron may have bloodstains or simulated distressing to enhance its horrifying appearance.\r\n\r\nAttachment Mechanism:\r\n\r\nThe apron replica is designed for practical use and display. It may include adjustable straps, ties, or buckles to ensure a secure and comfortable fit. These elements also contribute to the authenticity of the apron, reflecting the haphazard and makeshift nature of Leatherface\'s wardrobe.\r\n\r\nBloodstains and Weathering:\r\n\r\nTo capture the brutal and gruesome aesthetic of the character, some replicas include simulated bloodstains or weathering effects. These details add an extra layer of horror to the apron, suggesting its use in Leatherface\'s gruesome activities.\r\n\r\nVersatile Use:\r\n\r\nWhile primarily designed for horror enthusiasts and collectors, the Leatherface apron replica can be used as part of a Halloween costume or horror-themed event. It serves as a statement piece for fans who want to channel the terrifying presence of Leatherface.\r\n\r\nCollector\'s Item:\r\n\r\nThe Leatherface apron replica is a notable collector\'s item, suitable for display in horror memorabilia collections. It can be featured on mannequins, costume displays, or within themed collections dedicated to iconic horror characters.\r\n\r\nLimited Editions:\r\n\r\nSome replicas may be part of limited-edition releases, featuring additional features, exclusive packaging, or a certificate of authenticity. These limited editions enhance the collector\'s appeal and value of the Leatherface apron replica.', 'productimages\\lfapron.png'),
(17, 'Leatherface Chainsaw', 6, 220.00, 'The Leatherface chainsaw replica is a meticulously crafted homage to the infamous weapon wielded by the iconic horror character. This replica captures the essence of Leatherface\'s terrifying presence in the classic horror film.\r\n\r\nMaterials and Construction:\r\n\r\nCrafted from durable materials, the chainsaw replica typically features a combination of plastic, metal, and other suitable components. The blade and housing may be made from high-quality materials to achieve a realistic and menacing appearance.\r\n\r\nDesign and Distinctive Details:\r\n\r\nThe design closely mirrors the chainsaw used by Leatherface in the films. It often features the distinctive details, such as the worn and weathered housing, the menacing chain with faux blades, and the handle with realistic grips. The chainsaw\'s housing may showcase rust effects and simulated distressing for added authenticity.\r\n\r\nSize and Weight:\r\n\r\nThe replica is designed to closely mimic the size and weight of a real chainsaw without being overly cumbersome. This allows for practical use in costume events or displays. While replicas are not functional tools, they often capture the intimidating scale of Leatherface\'s weapon.\r\n\r\nSound Effects:\r\n\r\nFor an enhanced immersive experience, some chainsaw replicas come with built-in sound effects. These effects may replicate the roaring engine noise and the distinctive revving sound associated with Leatherface\'s chainsaw in the films.\r\n\r\nSafety Considerations:\r\n\r\nGiven that chainsaw replicas are often used for costume events and displays, safety considerations are paramount. The chainsaw may have a blunted or retractable chain to prevent accidents. Some replicas also include safety features such as a power switch to control sound effects.\r\n\r\nDisplay and Collector\'s Item:\r\n\r\nThe Leatherface chainsaw replica serves as a collector\'s item and a chilling centerpiece for horror memorabilia displays. Whether featured on a weapon rack, mounted on a wall, or displayed alongside other iconic horror items, it becomes a tangible connection to the terror of \"The Texas Chain Saw Massacre.\"\r\n\r\nLimited Editions:\r\n\r\nSome replicas may be part of limited-edition releases, featuring additional features, exclusive packaging, or a certificate of authenticity. These limited editions enhance the collector\'s appeal and value of the Leatherface chainsaw replica.', 'productimages\\lfchainsaw.png'),
(18, 'Leatherface Mask', 6, 300.00, 'The Leatherface mask replica is a meticulously crafted homage to the terrifying visage worn by the iconic horror character. This replica captures the essence of Leatherface\'s grotesque appearance in the classic horror film.\r\n\r\nMaterials and Construction:\r\n\r\nCrafted from high-quality materials, the mask replica often features latex, silicone, or other suitable materials to achieve a realistic and durable finish. The choice of materials ensures that the mask is flexible and comfortable while capturing the gruesome details of Leatherface\'s original mask.\r\n\r\nDesign and Distinctive Details:\r\n\r\nThe design closely mirrors the mask worn by Leatherface in the films. It often includes the distinctive features, such as the weathered and flesh-like texture, stitches, and the unsettlingly realistic appearance of human skin. The mask may showcase asymmetry, reflecting the makeshift and haphazard nature of Leatherface\'s creations.\r\n\r\nBloodstains and Weathering:\r\n\r\nTo enhance authenticity, some replicas incorporate bloodstains, weathering effects, or distressing. These details add an extra layer of horror to the mask, suggesting its use in Leatherface\'s gruesome activities and giving it a worn and aged appearance.\r\n\r\nFit and Comfort:\r\n\r\nDesigned for practical use, the mask replica typically includes features for comfort and wearability. It may have openings for the eyes, nose, and mouth, ensuring that the wearer can see and breathe comfortably while maintaining the horrifying appearance.\r\n\r\nVersatile Use:\r\n\r\nWhile primarily designed for horror enthusiasts and collectors, the Leatherface mask replica can be used as part of a Halloween costume or horror-themed event. It serves as a statement piece for fans who want to embody the terrifying presence of Leatherface.\r\n\r\nCollector\'s Item:\r\n\r\nThe Leatherface mask replica is a notable collector\'s item, suitable for display in horror memorabilia collections. It can be featured on mannequins, costume displays, or within themed collections dedicated to iconic horror characters.\r\n\r\nLimited Editions:\r\n\r\nSome replicas may be part of limited-edition releases, featuring additional features, exclusive packaging, or a certificate of authenticity. These limited editions enhance the collector\'s appeal and value of the Leatherface mask replica.\r\n\r\n', 'productimages\\lfmask.jpg'),
(19, 'Ghostface Mask + Cloak', 7, 90.00, 'The Ghostface mask is a chilling and instantly recognizable piece of horror imagery, known for its simplicity and sinister appearance.\r\n\r\nMaterials and Design:\r\nCrafted from durable materials like rubber or plastic, the Ghostface mask features a white, expressionless face with large, black eye sockets and an elongated, screaming mouth. The stark contrast between the white and black elements creates a haunting and memorable look. The mask is designed to fit snugly on the wearer\'s face, concealing their features and adding an air of mystery.\r\n\r\nDimension and Size:\r\nThe mask typically has a medium size to fit a range of face shapes. It maintains an eerie and elongated shape, contributing to the unsettling aesthetic. The mask often includes openings for the eyes and mouth, allowing the wearer to see and breathe comfortably.\r\n\r\nBlack Hooded Cloak:\r\n\r\nThe Ghostface cloak is an essential part of the costume, adding an element of anonymity and contributing to the character\'s menacing presence.\r\n\r\nMaterials and Design:\r\nThe cloak is traditionally made from a lightweight and flowing black fabric, such as polyester. It is designed to drape loosely over the wearer\'s body, creating a ghostly and hooded silhouette. The hood often conceals the top part of the Ghostface mask, heightening the mystery surrounding the character.\r\n\r\nLength and Fit:\r\nThe cloak typically reaches floor length, allowing it to trail behind the wearer as they move. The loose fit of the cloak adds to the overall ghostly and spectral appearance. Some versions of the cloak may have adjustable fastenings or ties to ensure a secure and comfortable fit.\r\n\r\nVersatility:\r\nThe Ghostface cloak is versatile and suitable for various body sizes. Its flowing design enhances the theatricality of the character, making it an ideal choice for costume events, Halloween, or horror-themed parties.\r\n\r\nCollector\'s Items and Replicas:\r\nDue to the popularity of the \"Scream\" franchise, Ghostface masks and cloaks are often produced as collector\'s items. Some replicas may feature additional detailing or materials for increased durability, making them sought-after pieces for horror enthusiasts.', 'productimages\\gfmask.jpg'),
(20, 'Ghostface Buck 20 Hunting Knife', 7, 100.00, 'The Ghostface hunting knife is a menacing and distinctive weapon associated with the mysterious and relentless killer in the \"Scream\" series. It serves as a signature tool for the Ghostface character and has become an iconic symbol in the realm of horror.\r\n\r\nBlade:\r\nThe knife typically features a sharp and pointed blade made from stainless steel or another durable material. The blade is designed for visual impact, featuring a sleek and sinister profile. While not as large as some traditional hunting knives, the Ghostface knife\'s blade is sufficient for its intended purpose.\r\n\r\nHandle:\r\nThe handle of the Ghostface knife is often designed for a secure grip, featuring materials like rubber, plastic, or other non-slip substances. The handle design may incorporate details such as finger grooves or textured patterns to enhance control during use.\r\n\r\nSize and Proportions:\r\nThe Ghostface hunting knife is relatively compact, typically featuring a blade length suitable for close-quarters actions. The overall size and proportions contribute to the knife\'s agility and its suitability for use in suspenseful scenes in horror films.\r\n\r\nDesign Details:\r\nThe knife is characterized by its distinctive and ominous appearance. The handle may feature a skeletal or skeletal-inspired design, adding to the eerie aesthetics. The blade is often sleek, with a sharp point, creating a visual impact that intensifies the fear associated with the Ghostface character.\r\n\r\nSheath:\r\nA sheath is commonly included with the Ghostface knife, allowing for safe storage and easy access. The sheath is designed to complement the overall aesthetic of the knife and may include attachment options such as a belt loop.\r\n\r\nVersatility:\r\nWhile primarily a prop or symbol associated with the Ghostface character in horror films, the knife is versatile enough to be used as part of a Halloween costume, cosplay, or horror-themed events. It adds an immediate sense of suspense and danger to the wearer\'s ensemble.\r\n\r\nCollector\'s Item:\r\nGiven the popularity of the \"Scream\" franchise, the Ghostface hunting knife is often produced as a collector\'s item. Some replicas may feature additional detailing, materials, or packaging, making them sought-after pieces for horror enthusiasts.', 'productimages\\gfknife.jpg'),
(21, 'The Necronomicon', 8, 120.00, 'Necronomicon Ex-Mortis (Book of the Dead):\r\n\r\nThe Necronomicon Ex-Mortis, featured in the \"Evil Dead\" franchise, is a cursed and ancient grimoire with the power to summon malevolent forces and unleash unspeakable horrors upon the world. Created by the dark sorcerer and explorer, the \"Dark One\" or \"Necronomicon Ex-Mortis\" as referred to in the films, the book serves as a conduit to demonic realms and otherworldly entities.\r\n\r\nPhysical Appearance:\r\nThe book is often depicted as a large, weathered tome bound in human flesh and inked with human blood. Its cover is adorned with ominous symbols, and the pages are filled with arcane writings detailing dark rituals, passages, and incantations.\r\n\r\nAuthorship and Origin:\r\nIn the \"Evil Dead\" series, the origin of the Necronomicon is linked to the dark arts practiced by the Dark One. Its authorship is attributed to this malevolent figure, who sought to harness the powers of the supernatural. The book itself serves as both a source of dark knowledge and a prison for the demonic forces it can unleash.\r\n\r\nCursed Nature:\r\nThe Necronomicon is highly malevolent and possesses a cursed nature. Anyone who reads from its passages or recites its incantations risks becoming possessed by demonic entities known as Deadites. The book is a harbinger of chaos and despair, with its influence extending beyond its pages.\r\n\r\nContent:\r\nThe Necronomicon is filled with dark spells, demonic summoning rituals, and incantations that can open portals to hellish dimensions. It provides the means to resurrect the dead and invoke supernatural entities, including the sinister force known as the Kandarian Demon.\r\n\r\nRole in the Plot:\r\nThroughout the \"Evil Dead\" series, the Necronomicon plays a central role. It serves as the catalyst for the demonic events that unfold, leading characters to confront the forces of evil and fight for their survival against the malevolent entities unleashed by the book\'s power.\r\n\r\nAdaptations:\r\nThe depiction of the Necronomicon in the \"Evil Dead\" series has evolved across different films and media adaptations. Its appearance and influence have been reimagined to suit the narrative of each installment, but its core attributes as a malevolent and cursed grimoire remain consistent.\r\n\r\n', 'productimages\\Necronomicon.jpg'),
(22, 'Ash Chainsaw Arm', 8, 600.00, 'Design:\r\nAsh\'s chainsaw arm is a unique and makeshift prosthetic, replacing his right hand after a series of supernatural events in the \"Evil Dead\" franchise. The design is a combination of rugged practicality and the necessity to defend against the relentless onslaught of Deadites (demonic entities).\r\n\r\nConstruction:\r\nThe chainsaw arm is crafted from various salvaged parts, featuring a mechanical design that allows it to be easily attached and detached. The housing for the chainsaw is typically made of metal and other durable materials, reflecting Ash\'s resourcefulness in creating a weapon for survival.\r\n\r\nFunctionality:\r\nThe chainsaw arm is a fully functional and motorized weapon, capable of delivering powerful and deadly cuts. Ash activates the chainsaw with a deliberate and iconic gesture, often accompanied by a catchphrase. The revving sound of the chainsaw has become synonymous with the character\'s readiness for battle.\r\n\r\nIncorporated Features:\r\nAsh\'s chainsaw arm may include additional features, such as a trigger mechanism to control the chainsaw\'s activation and deactivation. The design also allows for practical use, including the ability to grasp objects or perform basic tasks when not in combat mode.\r\n\r\nSymbolism:\r\nThe chainsaw arm symbolizes Ash\'s transformation from a regular person caught in supernatural chaos to a hardened and unconventional hero. It is a visual representation of his resilience and determination to fight against the forces of evil, even if it means embracing unconventional methods.\r\n\r\nCultural Impact:\r\nAsh\'s chainsaw arm has become an iconic element of the \"Evil Dead\" series, contributing to the character\'s legendary status in the horror genre. The combination of a chainsaw and a prosthetic limb has left a lasting imprint on pop culture, with references and homages appearing in various media.\r\n\r\nEvolution Across Installments:\r\nThe design of Ash\'s chainsaw arm has evolved across different installments of the \"Evil Dead\" series. Each adaptation or sequel may introduce slight modifications to the design, enhancing its functionality or incorporating new features while maintaining its core characteristics.', 'productimages\\ashcchainsawarm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`) VALUES
(2, 1, NULL, 5, 'suck', '2024-01-11 22:29:23'),
(4, 4, NULL, 3, 'madonna so seksi', '2024-01-11 22:35:51'),
(5, 3, NULL, 2, 'hurts alot would not recommend', '2024-01-12 12:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `street_id` int(11) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`street_id`, `street_name`, `city_id`) VALUES
(1, 'Triq Michele Ferrito', 1),
(2, 'Triq il-Kottoner', 1),
(3, 'Triq Depiro', 1),
(4, 'Triq il-Borg', 1),
(5, 'Sqaq il-Kbira', 2),
(6, 'Triq San Pawl', 2),
(7, 'Triq Għeriexem', 2),
(8, 'Saqqajja Square', 2),
(9, 'Triq il-Kbira', 3),
(10, 'Triq Gorg Borg Olivier', 3),
(11, 'Triq il-Mizura', 3),
(12, 'Triq Sant\'Anna', 3),
(13, 'Ix-Xatt', 4),
(14, 'Triq D\'Argens', 4),
(15, 'Triq Gwardamangia', 4),
(16, 'Triq Testaferrata', 4),
(17, 'Triq il-Parroċċa ', 5),
(18, 'Triq San Gorg', 5),
(19, 'Triq ir-Repubblika', 5),
(20, 'Triq l-Għajn Dwieli', 5),
(21, 'Triq il-Kostituzzjoni', 6),
(22, 'Triq il-Knisja', 6),
(23, 'Triq Għajn Xajba', 6),
(24, 'Triq il-Wileġ', 6),
(25, 'Triq il-Port', 7),
(26, 'Triq il-Kavallerizza', 7),
(27, 'Triq Marsalforn', 7),
(28, 'Triq Santa Marija', 7),
(29, 'Triq Għawdex', 8),
(30, 'Triq l-Għira', 8),
(31, 'Triq il-Knisja', 8),
(32, 'Triq Sant\' Dimitri', 8),
(33, 'Gran Vía', 9),
(34, 'Paseo del Prado', 9),
(35, 'Calle de Alcalá', 9),
(36, 'Calle Mayor', 9),
(37, 'La Rambla', 10),
(38, 'Passeig de Gràcia', 10),
(39, 'Carrer de Ferran', 10),
(40, 'Via Laietana', 10),
(41, 'Calle Sierpes', 11),
(42, 'Avenida de la Constitución', 11),
(43, 'Calle Mateos Gago', 11),
(44, 'Calle Feria', 11),
(45, 'Carrer de la Pau', 12),
(46, 'Carrer de Colón', 12),
(47, 'Carrer de la Mar', 12),
(48, 'Carrer de la Barcelonina', 12),
(49, 'Via del Corso', 13),
(50, 'Via Veneto', 13),
(51, 'Via dei Fori Imperiali', 13),
(52, 'Via Condotti', 13),
(53, 'Via della Moscova', 14),
(54, 'Corso Buenos Aires', 14),
(55, 'Corso Vittorio Emanuele II', 14),
(56, 'Via Montenapoleone', 14),
(57, 'Via dei Calzaiuoli', 15),
(58, 'Via Tornabuoni', 15),
(59, 'Via del Corso', 15),
(60, 'Borgo San Jacopo', 15),
(61, 'Strada Nova', 16),
(62, 'Riva degli Schiavoni', 16),
(63, 'Calle Larga XXII Marzo', 16),
(64, 'Calle Varisco', 16),
(65, 'Via Maqueda', 17),
(66, 'Corso Vittorio Emanuele', 17),
(67, 'Via Roma', 17),
(68, 'Via della Libertà', 17),
(69, 'Via Etnea', 18),
(70, 'Corso Italia', 18),
(71, 'Via Crocifieri', 18),
(72, 'Via Antonio di Sangiuliano', 18),
(73, 'Via Garibaldi', 19),
(74, 'Via Cardines', 19),
(75, 'Via Cesare Battisti', 19),
(76, 'Via Consolato del Mare', 19),
(77, 'Corso Matteotti', 20),
(78, 'Via Roma', 20),
(79, 'Via Maestranza', 20),
(80, 'Via della Giudecca', 20),
(81, 'Champs-Élysées', 21),
(82, 'Rue de Rivoli', 21),
(83, 'Boulevard Saint-Germain', 21),
(84, 'Avenue Montaigne', 21),
(85, 'La Canebière', 22),
(86, 'Rue Saint-Ferréol', 22),
(87, 'Quai des Belges', 22),
(88, 'Rue de la République', 22),
(89, 'Rue de la République', 23),
(90, 'Rue Saint-Jean', 23),
(91, 'Quai Saint-Antoine', 23),
(92, 'Rue Mercière', 23),
(93, 'Promenade des Anglais', 24),
(94, 'Avenue Jean Médecin', 24),
(95, 'Rue de France', 24),
(96, 'Vieux Nice', 24),
(97, 'Rua Augusta', 25),
(98, 'Avenida da Liberdade', 25),
(99, 'Rua do Carmo', 25),
(100, 'Rua do Carmo', 25),
(101, 'Rua Santa Catarina', 26),
(102, 'Avenida dos Aliados', 26),
(103, 'Rua das Flores', 26),
(104, 'Rua do Almada', 26),
(105, 'Rua de Santo António', 27),
(106, 'Rua Conselheiro Bívar', 27),
(107, 'Rua do Alportel', 27),
(108, 'Avenida da República', 27),
(109, 'Rua Ferreira Borges', 28),
(110, 'Rua da Sofia', 28),
(111, 'Avenida Sá da Bandeira', 28),
(112, 'Rua Visconde da Luz', 28),
(113, 'Grey Street', 29),
(114, 'Northumberland Street', 29),
(115, 'Quayside', 29),
(116, 'Quayside', 29),
(117, 'Oxford Street', 30),
(118, 'Regent Street', 30),
(119, 'The Mall', 30),
(120, 'Portobello Road', 30),
(121, 'Deansgate', 31),
(122, 'Market Street', 31),
(123, 'Canal Street', 31),
(124, 'Oxford Road', 31),
(125, 'The Royal Mile', 32),
(126, 'Princess Street', 32),
(127, 'George Street', 32),
(128, 'Victoria Street', 32),
(129, 'Drottninggatan', 33),
(130, 'Gamla Stan', 33),
(131, 'Strandvägen', 33),
(132, 'Södermalmstorg', 33),
(133, 'Avenyn', 34),
(134, 'Linnégatan', 34),
(135, 'Haga Nygata', 34),
(136, 'Vasagatan', 34),
(137, 'Södergatan', 35),
(138, 'Lilla Torg', 35),
(139, 'Västra Hamnen', 35),
(140, 'Davidshallstorg', 35),
(141, 'Svartbäcksgatan', 36),
(142, 'Svartbäcksmåla', 36),
(143, 'Dragarbrunnsgatan', 36),
(144, 'Kungsgatan', 36),
(145, 'Mannerheimintie', 37),
(146, 'Esplanadi', 37),
(147, 'Aleksanterinkatu', 37),
(148, 'Korkeavuorenkatu', 37),
(149, 'Hämeenkatu', 38),
(150, 'Frenckellinaukio', 38),
(151, 'Rautatienkatu', 38),
(152, 'Aleksanterinkatu', 38),
(153, 'Aurakatu', 39),
(154, 'Yliopistonkatu', 39),
(155, 'Humalistonkatu', 39),
(156, 'Linnankatu', 39),
(157, 'Rotuaari ', 40),
(158, 'Kauppurienkatu', 40),
(159, 'Pakkahuoneenkatu', 40),
(160, 'Kirkkokatu', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(3, 'Lou123', '123@gmail.com', '123', 1),
(8, 'dgdgherytdt', 'rtetetrer@gmail.com', 'resrrwerew', 0),
(10, '456', '456@gmail.com', '456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userid`, `productid`) VALUES
(5, 8, 1),
(6, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `cities_ibfk_1` (`country_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`street_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `street_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `streets`
--
ALTER TABLE `streets`
  ADD CONSTRAINT `streets_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
