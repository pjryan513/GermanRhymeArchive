#QUERIES FOR ILLUSTRATOR ONLY 
#KEY 
#I - ILLUSTRATOR NAME
#G - GENDER 
#I - ILLUSTRATED
#D - DATE RANGE 
#SD - START DATE ONLY 
#ED - END DATE ONLY
SELECT illustratorID FROM illustrator WHERE lname = "Jaques" AND fname = "Faith Heather ";
SELECT volumeID FROM drawFor WHERE illustratorID = 130;
SELECT rID FROM drawn WHERE volumeID = 2 or 126 ;
SELECT flor FROM rhyme WHERE rID = x

#Select all the rhymes done by one illustrator given first and last name only I
SELECT flor, rID, fname, lname
FROM drawn NATURAL JOIN rhyme NATURAL JOIN drawFor NATURAL JOIN illustrator
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Jaques" AND fname = "Faith Heather ")));

#Select all the rhymes done by one illustrator given first and last name, and a condition on gender I + G
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, and a start date I + SD
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, and an end date I + ED
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given a date range I + D
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, based on wether or not rhyme was illustrated I + IL
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, Gender and illustrated I + IL + G 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given an end date and gender I + ED + G 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given start date and gender  I + SD + G
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given a date range and gender I + D + G
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given an end date and illustrated I + ED + IL
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given start date and illustrated I + SD + IL
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given a date range and illustrated I + D + IL
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given an end date and illustrated and gender I + ED + IL + G
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given start date and illustrated and gender I + SD + IL + G
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given a date range and illustrated and gender I + D + IL + G
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));




