<?php
require_once("db.php");


// http://stackoverflow.com/questions/471914/can-you-split-explode-a-field-in-a-mysql-query

// http://stackoverflow.com/questions/2621382/alternative-to-intersect-in-mysql
                                      
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
