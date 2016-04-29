<?php

$dbhost = "localhost";
$dbname = "philip";
$dbuser = "root";
$dbpassword = "";

$dsn = "mysql:host=$dbhost";

try {
    $dbh = new PDO($dsn, $dbuser, $dbpassword);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->exec("set character set 'utf8'");
} catch (PDOException $e) {
    die("DB host connection error " . $e->getMessage());
}

// http://stackoverflow.com/questions/5928599/equivalent-of-explode-to-work-with-strings-in-mysql

$dbh->exec("USE philip");

$fn_sql = "CREATE PROCEDURE explode( pDelim VARCHAR(32), pStr TEXT)                                
BEGIN                                
  DROP TABLE IF EXISTS temp_explode;                                
  CREATE TEMPORARY TABLE temp_explode (id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, word VARCHAR(40));                                
  SET @sql := CONCAT('INSERT INTO temp_explode (word) VALUES (', REPLACE(QUOTE(pStr), pDelim, '\'), (\''), ')');                                
  PREPARE myStmt FROM @sql;                                
  EXECUTE myStmt;                                
END";

$select_WORKS = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(courseid, ',', sub0.aNum), ',', -1) AS a_course_name
FROM course
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10 AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0
ON (1 + LENGTH(courseid) - LENGTH(REPLACE(courseid, ',', ''))) >= sub0.aNum
GROUP BY a_course_name";

// http://stackoverflow.com/questions/471914/can-you-split-explode-a-field-in-a-mysql-query

$select_course_intersection_with_in = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(student.course, ',', sub0.aNum), ',', -1) AS a_course_id
FROM student
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10 AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0
ON (1 + LENGTH(student.course) - LENGTH(REPLACE(student.course, ',', ''))) >= sub0.aNum
GROUP BY a_course_id 

IN(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(package.courseid, ',', sub0.aNum), ',', -1) AS a_course_id
FROM package
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10 AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0
ON (1 + LENGTH(package.courseid) - LENGTH(REPLACE(package.courseid, ',', ''))) >= sub0.aNum
GROUP BY a_course_id)";


// http://stackoverflow.com/questions/471914/can-you-split-explode-a-field-in-a-mysql-query

// http://stackoverflow.com/questions/2621382/alternative-to-intersect-in-mysql
                                      
$select_course_2 = "
SELECT temp.a_course_id from (

(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(student.course, ',', sub0.aNum), ',', -1) AS a_course_id
FROM student
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10
AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0

ON (1 + LENGTH(student.course) - LENGTH(REPLACE(student.course, ',', ''))) >= sub0.aNum
GROUP BY a_course_id)

UNION ALL

(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(package.courseid, ',', sub0.aNum), ',', -1) AS a_course_id
FROM package
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10
AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0

ON (1 + LENGTH(package.courseid) - LENGTH(REPLACE(package.courseid, ',', ''))) >= sub0.aNum
GROUP BY a_course_id))
  AS temp GROUP BY a_course_id HAVING count(*) >= 2";


$works = "SELECT temp.a_course_id from (

(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(student.course, ',', sub0.aNum), ',', -1) AS a_course_id
FROM student
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10
AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0

ON (1 + LENGTH(student.course) - LENGTH(REPLACE(student.course, ',', ''))) >= sub0.aNum
GROUP BY a_course_id)

UNION ALL

(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(package.courseid, ',', sub0.aNum), ',', -1) AS a_course_id
FROM package
INNER JOIN
(
    SELECT 1 + units.i + tens.i * 10 AS aNum, units.i + tens.i * 10
AS aSubscript
    FROM (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) units
    CROSS JOIN (SELECT 0 AS i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) tens
) sub0

ON (1 + LENGTH(package.courseid) - LENGTH(REPLACE(package.courseid, ',', ''))) >= sub0.aNum
GROUP BY a_course_id))
  AS temp GROUP BY a_course_id HAVING count(*) >= 2";



$stmt = $dbh->query($works);
$splitted = $stmt->fetchAll();

for ($i = 0; $i < count($splitted); $i++) {
  var_dump($splitted[$i]);
  echo "<br>";
}

?>
