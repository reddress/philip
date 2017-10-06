<?php

// place real credentials in db_config.php
$SAMPLE_db_credentials = [
    "host" => "localhost",
    "db_name" => "learningpy",
    "user" => "root",
    "password" => ""
];

require("db_config.php");
require("connect.php");
$dbh = connect($db_credentials);

?>
<a name="top">CC Diary</a>

<hr>
Add entry:

<form action="add_entry.php" method="POST">
    <table>
        <tr><td>Amount</td><td>Ord</td><td>Type</td><td>Who</td><td>Date</td></tr>
        <tr>            
            <td><input type="text" name="amount" size="5" autofocus></td>
            <td><input type="text" name="ord" size="2"</td>
            <td>
                <select name="type">
                    <option value="pic">pic</option>
                    <option value="vid">vid</option>
                    <option value="live">live</option>
                </select>
            </td>
            <td><input type="text" name="who"></td>
            <td>
                <select name="year" id="date_year">
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>

                <select name="month" id="date_month">
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>

                <select name="day" id="date_day">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit">
</form>

<a href="#first">See 1st only</a>
<br><br>

All entries
<?php
$show_all_sql = "
SELECT amount, ord, type, who, day FROM my_ccdiary ORDER BY day DESC, ord DESC
";

$stmt = $dbh->query($show_all_sql);
$all_rows = $stmt->fetchAll();

?>

<table>
    
    <?php

    function visualize($amt) {
        $result = "";
        for ($i = 0; $i < $amt; $i++) {
            $result .= "*";
            if ($i == 4) {
                $result .= " ";
            }
        }
        return $result;
    }

    function getWeekday($date) {
        $labels = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        return $labels[date('w', strtotime($date))];
    }
    
    foreach ($all_rows as $row) {
        echo("<tr>");
        echo("<td>{$row['type']}</td>");
        echo("<td>{$row['who']}</td>");
        echo("<td>" . getWeekday($row['day']) . "</td>");
        echo("<td>({$row['ord']})</td>");
        echo("<td>{$row['day']}</td>");
        echo("<td>{$row['type']}</td>");
        echo("<td>" . visualize($row['amount']) . "</td>");
        echo("</tr>");
    }

    ?>

</table>

<hr>
<a href="#top">Back to top</a>

<br><br>

<a name="first">1st only</a>
<table>
    
    <?php

    $first_only_sql = "
SELECT amount, type, who, day FROM my_ccdiary WHERE ord = 1 ORDER BY day DESC
";

$stmt = $dbh->query($first_only_sql);
$all_rows = $stmt->fetchAll();

    foreach ($all_rows as $row) {
        echo("<tr>");
        echo("<td>{$row['type']}</td>");
        echo("<td>{$row['who']}</td>");
        echo("<td>" . getWeekday($row['day']) . "</td>");
        echo("<td>{$row['day']}</td>");
        echo("<td>{$row['type']}</td>");
        echo("<td>" . visualize($row['amount']) . "</td>");
        echo("</tr>");
    }

    ?>

</table>

<a href="#top">Back to top</a>

<script>
 var now = new Date();
 var year = now.getFullYear();
 var month = now.getMonth() + 1;
 var day = now.getDate();

 if (month < 10) {
     month = "0" + month;
 }

 if (day < 10) {
     day = "0" + day;
 }
 
 document.getElementById('date_year').value = year;
 document.getElementById('date_month').value = month;
 document.getElementById('date_day').value = day;
</script>
