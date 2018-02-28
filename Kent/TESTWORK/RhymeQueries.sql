#QUERIES FOR RHYME ONLY 
#KEY 
#R - RHYME
#G - GENDER
#I - ILLUSTRATED
#D - DATE RANGE 
#SD - START DATE ONLY 
#ED - END DATE ONLY
SELECT rID FROM rhyme WHERE flor = "Mary had a little lamb";
SELECT * FROM drawn NATURAL JOIN rhyme WHERE rID = 671;
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM drawn NATURAL JOIN illustrator NATURAL JOIN volume;

SELECT rID FROM rhyme WHERE flor = "The Queen of Hearts";

SELECT DISTINCT *
FROM contains NATURAL JOIN drawn NATURAL JOIN rhyme
WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "The Queen of Hearts") AND illu = 'yes' ORDER BY volumeID;

#Select all instances of a given rhyme R
SELECT flor, title, datePublished, rID
FROM (SELECT *
FROM contains WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN rhyme
ORDER BY volumeID;

#Select all instances of a given rhyme, given a gender R + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE gender = "M"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a gender R + I
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE illu = 'yes'
ORDER BY volumeID;

#Select all instances of a given rhyme, given a start date R + SD
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date"
ORDER BY volumeID;

#Select all instances of a given rhyme, given an end date R + ED
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished < "date"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a date range R + D
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date1" AND datePublished < "date2"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a gender and if the rhyme was illustrated R + G + I 
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE illu = 'yes' AND gender = "X"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a start date and a gender R + SD + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date" AND gender = "X"
ORDER BY volumeID;

#Select all instances of a given rhyme, given an end date and a gender R + ED + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished < "date" AND gender = "X"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a date range and a gender R + D + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date1" AND datePublished < "date2" AND gender = "X"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a start date and if the rhyme was illustrated R + SD + I
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date" AND illu = 'yes'
ORDER BY volumeID;

#Select all instances of a given rhyme, given an end date and if the rhyme was illustrated R + ED + I 
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished < "date" AND illu = 'yes'
ORDER BY volumeID;

#Select all instances of a given rhyme, given a date range and if the rhyme was illustrated R + D + I
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date1" AND datePublished < "date2" AND illu = 'yes'
ORDER BY volumeID;

#Select all instances of a given rhyme, given a start date and if the rhyme was illustrated and given a gender R + SD + I + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date" AND illu = 'yes' AND gender = "X"
ORDER BY volumeID;

#Select all instances of a given rhyme, given an end date and if the rhyme was illustrated and given a gender R + ED + I + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished < "date" AND illu = 'yes' AND gender = "X"
ORDER BY volumeID;

#Select all instances of a given rhyme, given a date range and if the rhyme was illustrated and given a gender R + D + I + G
SELECT flor, title, lname, fname, datePublished, prf, illu, illt, pif, paginated
FROM (SELECT *
FROM drawn WHERE rID IN (SELECT rID
FROM rhyme WHERE flor = "Mary had a little lamb")) NATURAL JOIN illustrator NATURAL JOIN volume NATURAL JOIN RHYME
WHERE datePublished > "date1" AND datePublished < "date2" AND illu = 'yes' AND gender = "X"
ORDER BY volumeID;



