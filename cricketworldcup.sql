#Creating Database and Tables
CREATE DATABASE CricketWorldCup;
use CricketWorldCup;
CREATE TABLE Teams(
Team_ID INT PRIMARY KEY auto_increment,
Team_Name VARCHAR(15),
Matches_Played INT,
Matches_Won INT,
Matches_Lost INT,
Captained_Since DATE,
Captained_by INT
);
CREATE TABLE player_match
(
 P_ID INT,
 Match_ID INT,
 PRIMARY KEY(P_ID,Match_ID),
 FOREIGN KEY(P_ID) REFERENCES Players(P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Match_ID) REFERENCES Matches(Match_ID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Players(
P_ID INT PRIMARY KEY auto_increment,
P_Role VARCHAR(10),
P_DOB DATE,
P_noOfMatchesPlayed INT,
Runs_Scored INT,
Balls_faced INT,
No_of_DismissalsAffected INT,
Balls_bowled INT,
Runs_Conceded INT,
Wickets_Taken INT,
PTeam_ID INT,
FOREIGN KEY(PTeam_ID) REFERENCES Teams(Team_ID) ON UPDATE SET NULL ON DELETE SET NULL
);
ALTER TABLE Players ADD P_Name VARCHAR(20);
ALTER TABLE Teams ADD FOREIGN KEY(Captained_by) REFERENCES Players(P_ID) ON UPDATE SET NULL ON DELETE SET NULL;
CREATE TABLE Matches(
Match_ID INT PRIMARY KEY auto_increment,
M_datetime DATETIME,
Stage VARCHAR(15) CHECK(UCASE(Stage) IN ('GROUP STAGE','QUARTER FINALS','SEMI FINALS','FINAL'))
);
CREATE TABLE Player_Match_Stats(
P_ID INT,
Match_ID INT,
Runs_Scored INT,
Out_or_NotOut BOOLEAN,
Balls_bowled INT,
Dismissals_Affected INT,
Runs_Conceded INT,
Wickets_Taken INT CHECK(Wickets_Taken<=10),
PRIMARY KEY(P_ID,Match_ID),
FOREIGN KEY(P_ID) REFERENCES Players(P_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Match_ID) REFERENCES Matches(Match_ID) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE Coach(
coach_ID INT PRIMARY KEY auto_increment,
Coach_name VARCHAR(20),
Coach_Role VARCHAR(10),
Coach_age INT,
Team_ID INT,
FOREIGN KEY(Team_ID) REFERENCES Teams(Team_ID)
); 


CREATE TABLE Team_Match_Stats(
Team_ID INT,
Match_ID INT,
Team_Score INT,
Wickets_Lost INT,
Win_or_loss BOOLEAN,
Margin VARCHAR(15),
PRIMARY KEY(Team_ID,Match_ID),
FOREIGN KEY(Team_ID) REFERENCES Teams(Team_ID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY(Match_ID) REFERENCES Matches(Match_ID) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE Umpires(
Umpire_ID INT PRIMARY KEY AUTO_INCREMENT,
U_Name VARCHAR(20),
No_of_Matches INT,
Nationality VARCHAR(15)
);
CREATE TABLE Match_Ump(
Ump_ID INT,
Match_ID INT,
PRIMARY KEY(Ump_ID, Match_ID),
FOREIGN KEY(Ump_ID) REFERENCES Umpires(Umpire_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Match_ID) REFERENCES Matches(Match_ID) ON DELETE CASCADE ON UPDATE CASCADE
);
SHOW TABLES;
DESC Teams;
#Inserting values
INSERT INTO Players(P_Role, P_DOB, PTeam_ID,P_Name) VALUES('BATSMAN','1988-11-05', NULL, 'Virat Kohli'); 
INSERT INTO Teams(Team_Name, Captained_Since, Captained_by) VALUES('INDIA','2017-01-01', 1);
UPDATE Players SET PTeam_ID=1 WHERE P_ID=1;
INSERT INTO Players(P_Role, P_DOB, PTeam_ID, P_Name) VALUES ('BATSMAN','1987-04-30 ',1,'Rohit Sharma'),('BOWLER','1990-07-23',1,'Yuzvendra Chahal'),('W-K','1981-07-07',1,'MS Dhoni'),('BATSMAN','1985-03-26',1,'Kedhar Jadhav'),('BOWLER','1994-12-14',1,'Kuldeep Yadav'),('BOWLER','1990-09-03',1,'Mohammad Shami'),('BATSMAN','1997-10-04',1,'Rishabh Pant'),('BOWLER','1993-12-06',1,'Jasprit Bumrah'),('BOWLER','1990-02-05',1,'Bhuvneshwar Kumar'),('A-R','1993-10-11',1,'Hardik Pandya');

INSERT INTO Players(P_Role, P_DOB, PTeam_ID,P_Name) VALUES('BATSMAN','1986-11-17', NULL, 'Aaron Finch'); 
INSERT INTO Teams(Team_Name, Captained_Since, Captained_by) VALUES('AUSTRALIA','2017-01-01', 32);
UPDATE Players SET PTeam_ID=4 WHERE P_ID=32;
INSERT INTO Players(P_Role, P_DOB, PTeam_ID, P_Name) VALUES ('BOWLER','1990-04-20 ',4,'Jason Behrendorff'),('BOWLER','1987-10-11',4,'Nathan Coulter-Nile'),('W-K','1991-08-27',4,'Alex Carry'),('BATSMAN','1986-12-18',4,'Usman Khwaja'),('BOWLER','1990-01-30',4,'Mitchell Starc'),('BATSMAN','1986-10-27',4,'David Warner'),('BATSMAN','1989-06-02',4,'Steve Smith'),('A-R','1989-08-16',4,'Marcus Stoinis'),('BOWLER','1987-11-20',4,'Nathan Lyon'),('A-R','1988-10-14',4,'Glenn Maxwell');

INSERT INTO Players(P_Role, P_DOB, PTeam_ID,P_Name) VALUES('BATSMAN','1986-09-10', NULL, 'Eoin Morgan'); 
INSERT INTO Teams(Team_Name, Captained_Since, Captained_by) VALUES('ENGLAND','2015-01-01', 43);
UPDATE Players SET PTeam_ID=5 WHERE P_ID=43;
INSERT INTO Players(P_Role, P_DOB, PTeam_ID, P_Name) VALUES ('BOWLER','1995-04-01 ',5,'Joffra Archer'),('BOWLER','1990-01-11',5,'Mark Wood'),('W-K','1989-09-26',5,'Jonny Bairstow'),('W-K','1990-09-08',5,'Jos Buttler'),('BOWLER','1985-04-06',5,'Liam Plunkett'),('BATSMAN','1990-07-21',5,'Jason Roy'),('BOWLER','1988-02-17',5,'Adil Rashid'),('A-R','1991-06-04',5,'Ben Stokes'),('BOWLER','1990-01-11',5,'Mark Wood'),('BATSMAN','1991-12-30',5,'Joe Root');

INSERT INTO Players(P_Role, P_DOB, PTeam_ID,P_Name) VALUES('BATSMAN','1990-08-08', NULL, 'Kane Williamson'); 
INSERT INTO Teams(Team_Name, Captained_Since, Captained_by) VALUES('NEW ZEALAND','2016-01-01', 54);
UPDATE Players SET PTeam_ID=6 WHERE P_ID=54;
INSERT INTO Players(P_Role, P_DOB, PTeam_ID, P_Name) VALUES ('BOWLER','1989-07-22 ',6,'Trent Boult'),('BOWLER','1991-12-14',6,'Matt Henry'),('W-K','1992-04-02',6,'Tom Latham'),('BATSMAN','1986-09-30',6,'Martin Guptill'),('BOWLER','1991-06-13',6,'Lockie Ferguson'),('BATSMAN','1984-03-08',6,'Ross Taylor'),('A-R','1986-07-22',6,'Colin de Grandhomme'),('A-R','1990-09-17',6,'Jimmy Neesham'),('A-R','1992-02-05',6,'Mitchell Santner'),('BATSMAN','1991-11-15',6,'Henry Nicholls');


SELECT COUNT(P_ID) FROM Players WHERE PTeam_ID=6;
SELECT P_ID FROM Players WHERE P_Name='Kane Williamson';
SELECT * FROM Teams;

INSERT INTO Players(P_Role, P_DOB, PTeam_ID,P_Name) VALUES('A-R','1989-03-02', 5, 'Chris Woakes'); 
DESC Matches;
INSERT INTO MATCHES(Match_ID,M_datetime,Stage) VALUES (1, '2019-07-10 10:30:00','SEMI FINALS'),(2, '2019-07-11 10:30:00','SEMI FINALS'),(3, '2019-07-14 10:30:00','FINAL');
DESC Coach;
INSERT INTO Coach(Coach_Name,Coach_Role,Coach_age,Team_ID) VALUES ('Ravi Shastri','Head Coach',57,1),('Justin Langer','Head Coach',49,4),('Trevor Bayliss','Head Coach',56,5),('Gary Stead','Head Coach',48,6);
DESC Umpires;
INSERT INTO Umpires(U_Name,Nationality) VALUES ('Richard Illingworth','English'),('R Kettleborough','English'),('Rodney Tucker','Australian'),('H Dharmasena','Sri Lankan'),('Marais Erasmus','South African'),('Christopher Gaffaney','New Zealander'),('Aleem Dar','Pakistani');
INSERT INTO Umpires(U_Name, Nationality) VALUES('Nigel LLong','English');
SELECT * FROM Umpires;
SELECT P_ID,P_Name FROM Players;
INSERT INTO Match_Ump(Ump_ID,Match_ID) VALUES (15,1),(16,1),(17,1),(22,1),(18,2),(19,2),(20,2),(21,2),(19,3),(18,3),(17,3),(21,3);
INSERT INTO player_match(P_ID,Match_ID) VALUES (1,1),(22,1),(23,1),(24,1),(28,1),(29,1),(30,1),(31,1),(32,2),(33,2),(35,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(43,3),(44,2),(44,3),(46,2),(46,3),(47,2),(47,3),(50,2),(50,3),(51,2),(51,3),(53,2),(53,3),(54,1),(54,3),(55,1),(55,3),(56,1),(56,3),(57,1),(57,3),(58,1),(58,3),(60,1),(60,3),(61,1),(61,3),(64,1),(64,3),(65,1),(66,1),(67,1),(68,2),(69,2),(70,2),(70,3),(71,2),(71,3);
UPDATE Players SET P_noOfMatchesPlayed= 10,Runs_Scored=10,Balls_faced=15 ,No_of_DismissalsAffected=0,Balls_bowled=260,Runs_Conceded=196,Wickets_Taken=11 WHERE P_ID=56;
 SHOW TABLES;
 DESC team_match_stats;
 INSERT INTO team_match_stats VALUES (1,1,221,10,0,'18 RUNS'), (4,2,223,10,0,'8 WICKETS'),(5,2,226,2,1,'18 RUNS'),(5,3,241,10,1,'Super Over'),(6,1,239,8,1,'18 RUNS'),(6,3,241,8,0,'Super Over');
DESC team_match_stats;
DESC Teams;
SELECT * FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID ORDER BY Match_ID DESC, Win_or_loss DESC; 
UPDATE Teams SET Matches_Played=(SELECT COUNT(Match_ID) FROM team_match_stats WHERE Team_ID=6),Matches_Won=(SELECT COUNT(Match_ID) FROM team_match_stats WHERE Team_ID=6 AND Win_or_loss=1),Matches_Lost=(SELECT COUNT(Match_ID) FROM team_match_stats WHERE Team_ID=6 AND Win_or_loss=0) WHERE Team_ID=6;
SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID WHERE Match_ID=3 AND Win_or_loss=1; 
SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID WHERE (Match_ID=2 OR Match_ID=1) AND Win_or_loss=0;
SELECT Match_ID FROM Matches;
SELECT Team_Name,Margin FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=1 AND Win_or_loss=1;
DESC matches;
SELECT M_datetime,Stage FROM Matches WHERE Match_ID=1;
DESC Players;
SELECT P_Name,P_Role,Runs_Scored FROM Players WHERE Runs_Scored>100 order by Runs_Scored DESC;
SELECT P_Name,P_Role,Wickets_Taken FROM Players WHERE Wickets_Taken>5 order by Wickets_Taken DESC;
SELECT P_Name,P_Role,No_of_DismissalsAffected FROM Players WHERE No_of_DismissalsAffected>3 order by No_of_DismissalsAffected DESC;
SELECT P_Name,P_Role,Runs_Conceded/Balls_bowled*6 Economy FROM Players WHERE Balls_bowled>18 ORDER BY Economy;
SELECT * FROM team_match_stats;
SELECT P_Name,P_Role,Runs_Scored/Balls_faced*100 AS SR FROM Players WHERE Balls_faced>18 ORDER BY SR DESC;
