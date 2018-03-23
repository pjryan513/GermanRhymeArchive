#QUERIES FOR ILLUSTRATOR ONLY 
SELECT illustratorID FROM illustrator WHERE lname = "Jaques" AND fname = "Faith Heather ";
SELECT volumeID FROM drawFor WHERE illustratorID = 130;
SELECT rID FROM drawn WHERE volumeID = 2 or 126 ;
SELECT flor FROM rhyme WHERE rID = x

#Select all the rhymes done by one illustrator given first and last name only 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, and a condition on gender
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, and a start date
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, and an end date
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given a date range
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, based on wether or not rhyme was illustrated
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, Gender and illustrated
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, Gender and illustrated
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor 
WHERE illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given an end date and gender 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given start date and gender 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given a date range and gender 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma" AND gender = "X")));

#Select all the rhymes done by one illustrator given first and last name, given an end date and illustrated 
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given start date and illustrated
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));

#Select all the rhymes done by one illustrator given first and last name, given a date range and illustrated
SELECT flor
FROM rhyme
WHERE rID IN (SELECT rID
FROM drawn
WHERE illu = "yes" AND volumeID IN (SELECT volumeID
FROM drawFor NATURAL JOIN volume
WHERE datePublished < "X" AND datePublished > "Y" AND illustratorID IN (SELECT illustratorID
FROM illustrator
WHERE lname = "Kane" AND fname = "Wilma")));




