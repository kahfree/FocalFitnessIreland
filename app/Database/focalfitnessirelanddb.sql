-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: focalfitnessirelanddb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(90) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `ClientPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`ClientID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'ciancaff@gmail.com','Cian','Caffrey','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96'),(2,'barDawg@gmail.com','Evan','Barry','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96'),(5,'johnsmith1012@gmail.com','John','Smith','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise`
--

DROP TABLE IF EXISTS `exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise` (
  `ExerciseID` int(11) NOT NULL AUTO_INCREMENT,
  `ExName` varchar(45) NOT NULL,
  `ExDescription` text NOT NULL,
  `ExGifPath` varchar(80) DEFAULT NULL,
  `ExNeedsEquipment` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ExerciseID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise`
--

LOCK TABLES `exercise` WRITE;
/*!40000 ALTER TABLE `exercise` DISABLE KEYS */;
INSERT INTO `exercise` VALUES (1,'Pull-Ups','Grasp the bar with an overhand grip with your hands just wider than shoulder-width apart. Let your body hang straight down with your arms fully extended. Pull up and squeeze your lats until your chin is over the bar, before lowering slowly to the start position without swinging.','/assets/gifs/Pull-ups.gif',1),(2,'Push-Ups','Get down on all fours, placing your hands slightly wider than your shoulders. Straighten your arms and legs. Lower your body until your chest nearly touches the floor. Pause, then push yourself back up.','/assets/gifs/Push-ups.gif',0),(3,'Squats','A squat is a strength exercise in which the trainee lowers their hips from a standing position and t','/assets/gifs/Squats.gif',0),(4,'Diamond Push-ups','The Diamond Push-up is a more difficult variation of the classic push-up, with your hands coming tog','/assets/gifs/Diamond Push-Ups.gif',0),(5,'Calf Raises','Calf raises are a method of exercising the gastrocnemius, tibialis posterior, peroneals and soleus m','/assets/gifs/Calf Raises.gif',0),(6,'Lunges','A lunge can refer to any position of the human body where one leg is positioned forward with knee be','/assets/gifs/Lunges.gif',0),(7,'Leg Raises','The leg raise is a strength training exercise which targets the iliopsoas. Because the abdominal mus','/assets/gifs/Leg Raises.gif',0),(8,'Crunches','The crunch is one of the most popular abdominal exercises. When performed properly, it engages all t','/assets/gifs/Crunches.gif',0),(9,'Bench Press','Lie flat on your back on a bench. Grip the bar with hands just wider than shoulder-width apart, so when you’re at the bottom of your move your hands are directly above your elbows. This allows for maximum force generation. Bring the bar slowly down to your chest as you breathe in. Push up as you breathe out, gripping the bar hard and watching a spot on the ceiling rather than the bar, so you can ensure it travels the same path every time.','/assets/gifs/Bench Press.gif',1),(10,'Incline Bench','Lie at a 30 degree angle on a bench. Grip the bar with hands just wider than shoulder-width apart, so when you’re at the bottom of your move your hands are directly above your elbows. This allows for maximum force generation. Bring the bar slowly down to your chest as you breathe in. Push up as you breathe out, gripping the bar hard and watching a spot on the ceiling rather than the bar, so you can ensure it travels the same path every time.','/assets/gifs/Incline Bench.gif',1),(11,'Dips','Grab the parallel bars and jump up, straighten your arms. Lower your body by bending your arms while leaning forward. Dip down until your shoulders are below your elbows. Lift your body up by straightening your arms. Lock your elbows at the top.','/assets/gifs/Dips.gif',1),(12,'Shoulder Press','Sit on an upright bench holding a dumbbell in each hand at shoulder height with your palms facing away from you. Keep your chest up and your core braced, and look straight forward throughout the move. Press the weights directly upwards until your arms are straight and the weights touch above your head.','/assets/gifs/Shoulder Press.gif',1),(13,'Lateral Raises','Hinge at the hips and bend over until your torso is parallel to the floor, or close to that point, keeping your back straight. Let the dumbbells hang down beneath your chest. Raise the weights out to the sides until your arms are parallel with the ground, then slowly take them back down.','/assets/gifs/Lateral Raises.gif',1),(14,'Skull Crushers','Keep your upper arms perpendicular to the floor, not necessarily perpendicular to your body. Only extend your elbows. Lower the weight under control, which means using a weight you can safely handle. As you power the weight back up, stop just short of full extension. ','/assets/gifs/Skull Crushers.gif',1),(15,'Incline Rows','Set an incline bench at 45 degrees. Grab a pair of dumbbells, and approach the bench with your chest toward the angled pad, then lean onto it. Plant your feet firmly on the floor, and let your arms hang straight down, palms facing each other. This is the starting position. Squeeze your shoulder blades together and drive your elbows toward the ceiling, bringing the dumbbells to your ribcage. Slowly reverse the move, and repeat for reps.','/assets/gifs/Incline Row.gif',1),(16,'Reverse Grip Bent Over Row','Once you have your barbell loaded, stand with your feet shoulder-width apart. Bend your knees and lean forward from the waist. Your knees should be bent, but your back stays straight, with your neck in line with your spine. Grab the bar with your hands (palms-up), just wider than shoulder-width apart and let it hang with your arms straight.','/assets/gifs/Reverse Grip Bent Over Row.gif',1),(17,'Barbell Bicep Curl','This is the barbell bicep curl description','/assets/gifs/Barbell Bicep Curl.gif',1),(18,'Reverse Grip Bicep Curl','This is the reverse grip bicep curl description','/assets/gifs/Reverse Grip Bicep Curl.gif',1),(19,'Hammer Curls','Stand up straight with a dumbbell in each hand, holding them alongside you. Your palms should face your body. Keep your biceps stationary and start bending at your elbows, lifting both dumbbells. Lift until the dumbbells reach shoulder-level, but don\'t actually touch your shoulders.','/assets/gifs/Hammer Curls.gif',1),(20,'Goblet Squat','As you squat, keep your elbows inside the line of your knees, and the heels of your feet flat on the ground. Go as low as you can in this position, then come back up, pushing through your heels. Keep your movements measured and your abs tensed as you move','/assets/gifs/Goblet Squat.gif',1),(21,'Romanian Deadlifts','Use an overhand grip to hold the bar at hip level. Draw your shoulders back and keep your spine straight. Push your hips back as you slowly lower the bar toward your feet. Press your hips forward to come into a standing position with the barbell in front of your thighs. ','/assets/gifs/Romanian Deadlifts.gif',1),(22,'Glute Bridges','Lie face up on the floor, with your knees bent and feet flat on the ground. Keep your arms at your side with your palms down. Lift your hips off the ground until your knees, hips and shoulders form a straight line. Hold your bridged position for a couple of seconds before easing back down.','/assets/gifs/Glute Bridges.gif',1),(24,'Chest Flies','Lie flat on your back on a flat incline bench. Ask a spotter to hand you the 2 dumbbells, or gently pick them up from the floor and hold 1 in each hand. Lift arms up above the head so they\'re extended but not locked out. Inhale and slowly lower dumbbells in an arc motion until they\'re in line with the chest.','/assets/gifs/Chest Flies.gif',1),(25,'Plate Press','Lie flat on a bench. Squeeze plate inbetween hands. Keeping your shoulder blades retracted, push like you would for a chest press (but focus on the squeeze).','/assets/gifs/Plate Press.gif',1),(26,'Arnold Press','Once dumbbells are in shoulder press position, turn them so your palms are facing you. Then press, as you do rotate your palms back into shoulder press position, and reverse on the way back down.','/assets/gifs/Arnold Press.gif',1),(27,'Rear Delt Flies','Stand with your legs about hip-width apart and hold a dumbbell in each hand by your side. Bend your torso forward at your hips and bend your legs slightly so that your arms extend below your body with your hands facing each other as you hold the dumbbells. Keep your back flat. This is the starting position. Exhale and raise your arms out to your sides with your hands facing down, squeezing your shoulder blades together during the movement. Do not round your spine or move your head forward.','/assets/gifs/Rear Delt Flies.gif',1),(28,'Tricep Kickbacks','Hold a dumbbell in each hand with your palms facing in toward each other, keeping your knees bent slightly. Engage your core and maintain a straight spine as you hinge forward at the waist, bringing your torso almost parallel to the floor. Keep your upper arms in close to your body and your head in line with your spine, tucking your chin in slightly. On an exhale, engage your triceps by straightening your elbows. Hold your upper arms still, only moving your forearms during this movement. ','/assets/gifs/Tricep Kickbacks.gif',1),(29,'Dead Hang','Grip the bar with an overhand grip (palms facing away from you). Move your feet off the step or bench so you\'re hanging on to the bar. Keep your arms straight.','/assets/gifs/Dead Hang.gif',1);
/*!40000 ALTER TABLE `exercise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercises_in_workout`
--

DROP TABLE IF EXISTS `exercises_in_workout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercises_in_workout` (
  `WorkoutID` int(11) NOT NULL,
  `ExerciseID` int(11) NOT NULL,
  `ExerciseDuration` int(4) NOT NULL,
  PRIMARY KEY (`WorkoutID`,`ExerciseID`),
  KEY `fk_Workout_has_Exercise_Exercise1_idx` (`ExerciseID`),
  KEY `fk_Workout_has_Exercise_Workout1_idx` (`WorkoutID`),
  CONSTRAINT `fk_Workout_has_Exercise_Exercise1` FOREIGN KEY (`ExerciseID`) REFERENCES `exercise` (`ExerciseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Workout_has_Exercise_Workout1` FOREIGN KEY (`WorkoutID`) REFERENCES `workout` (`WorkoutID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercises_in_workout`
--

LOCK TABLES `exercises_in_workout` WRITE;
/*!40000 ALTER TABLE `exercises_in_workout` DISABLE KEYS */;
INSERT INTO `exercises_in_workout` VALUES (1,2,15),(1,3,45),(1,4,45),(1,5,60),(1,6,30),(1,8,75),(2,9,30),(2,10,45),(2,11,75),(2,12,90),(2,13,30),(2,14,45),(3,1,90),(3,15,45),(3,16,30),(3,17,15),(3,18,90),(3,19,15),(4,5,60),(4,20,45),(4,21,90),(4,22,60);
/*!40000 ALTER TABLE `exercises_in_workout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderator`
--

DROP TABLE IF EXISTS `moderator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderator` (
  `ModeratorID` int(11) NOT NULL,
  `Email` varchar(90) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `ModeratorPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`ModeratorID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderator`
--

LOCK TABLES `moderator` WRITE;
/*!40000 ALTER TABLE `moderator` DISABLE KEYS */;
INSERT INTO `moderator` VALUES (1,'ethancaff@gmail.com','Ethan','Caffrey','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96');
/*!40000 ALTER TABLE `moderator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muscle`
--

DROP TABLE IF EXISTS `muscle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `muscle` (
  `MuscleID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  PRIMARY KEY (`MuscleID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muscle`
--

LOCK TABLES `muscle` WRITE;
/*!40000 ALTER TABLE `muscle` DISABLE KEYS */;
INSERT INTO `muscle` VALUES (1,'Chest'),(2,'Back'),(3,'Triceps'),(4,'Biceps'),(5,'Forearms'),(6,'Calfs'),(7,'Quad'),(8,'Hamstring'),(9,'Glutes'),(10,'Abs'),(11,'Shoulders');
/*!40000 ALTER TABLE `muscle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muscles_exercised`
--

DROP TABLE IF EXISTS `muscles_exercised`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `muscles_exercised` (
  `MuscleID` int(11) NOT NULL,
  `ExerciseID` int(11) NOT NULL,
  PRIMARY KEY (`MuscleID`,`ExerciseID`),
  KEY `fk_Muscle_has_Exercise_Exercise1_idx` (`ExerciseID`),
  CONSTRAINT `fk_Muscle_has_Exercise_Exercise1` FOREIGN KEY (`ExerciseID`) REFERENCES `exercise` (`ExerciseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Muscle_has_Exercise_Muscle1` FOREIGN KEY (`MuscleID`) REFERENCES `muscle` (`MuscleID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muscles_exercised`
--

LOCK TABLES `muscles_exercised` WRITE;
/*!40000 ALTER TABLE `muscles_exercised` DISABLE KEYS */;
INSERT INTO `muscles_exercised` VALUES (1,2),(1,4),(1,9),(1,10),(1,11),(1,24),(1,25),(2,1),(2,15),(2,16),(3,2),(3,4),(3,9),(3,10),(3,11),(3,14),(3,28),(4,1),(4,15),(4,16),(4,17),(4,18),(4,19),(5,1),(5,18),(5,29),(6,3),(6,5),(6,20),(6,21),(7,3),(7,6),(7,7),(7,20),(8,3),(8,6),(8,21),(8,22),(9,3),(9,6),(9,20),(9,21),(9,22),(10,7),(10,8),(11,12),(11,13),(11,26),(11,27);
/*!40000 ALTER TABLE `muscles_exercised` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `PostID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Title` varchar(45) NOT NULL,
  `PostText` text NOT NULL,
  `WorkoutID` int(11) NOT NULL,
  PRIMARY KEY (`PostID`,`WorkoutID`,`ClientID`),
  KEY `FK_WORKOUT_POST_idx` (`WorkoutID`),
  KEY `FK_CLIENT_POST_idx` (`ClientID`),
  CONSTRAINT `FK_CLIENT_POST` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_WORKOUT_POST` FOREIGN KEY (`WorkoutID`) REFERENCES `workout` (`WorkoutID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (3,1,'2021-03-03 17:07:42','Workout 1','llllllllllllllllllll',1),(11,1,'2021-03-18 18:03:40','Push Day','Electric Boogaloo!',2),(12,1,'2021-03-18 18:04:05','Push Day','Type something here...',2),(13,5,'2021-03-20 12:47:06','Push Day','My first ever push workout was great!',2);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `savedworkout`
--

DROP TABLE IF EXISTS `savedworkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `savedworkout` (
  `ClientID` int(11) NOT NULL,
  `WorkoutID` int(11) NOT NULL,
  PRIMARY KEY (`WorkoutID`,`ClientID`),
  KEY `FK_WORKOUT_SAVEDWORKOUT_idx` (`WorkoutID`),
  KEY `FK_CLIENT_SAVEDWORKOUT_idx` (`ClientID`),
  CONSTRAINT `FK_CLIENT_SAVEDWORKOUT` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_WORKOUT_SAVEDWORKOUT` FOREIGN KEY (`WorkoutID`) REFERENCES `workout` (`WorkoutID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `savedworkout`
--

LOCK TABLES `savedworkout` WRITE;
/*!40000 ALTER TABLE `savedworkout` DISABLE KEYS */;
INSERT INTO `savedworkout` VALUES (1,2),(1,3),(5,3),(1,4);
/*!40000 ALTER TABLE `savedworkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout`
--

DROP TABLE IF EXISTS `workout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout` (
  `WorkoutID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `TotalDuration` int(4) NOT NULL,
  `UserMade` tinyint(1) NOT NULL,
  `Featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`WorkoutID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout`
--

LOCK TABLES `workout` WRITE;
/*!40000 ALTER TABLE `workout` DISABLE KEYS */;
INSERT INTO `workout` VALUES (1,'Workout 1',900,0,0),(2,'Push Day',900,0,0),(3,'Pull Day',900,0,0),(4,'Leg Day',900,0,0);
/*!40000 ALTER TABLE `workout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'focalfitnessirelanddb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-23 11:05:29
