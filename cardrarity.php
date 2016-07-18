<?php

// this is a Stack Overflow question

//create multidimensional array
$distribution = array
(
array(115, 50, 15, 0),
array(115, 49, 16, 0),
array(115, 48, 17, 0),
array(116, 49, 15, 0),
array(116, 48, 16, 0),
array(116, 47, 17, 0),
array(117, 48, 15, 0),
array(117, 47, 16, 0),
array(117, 46, 17, 0),
array(118, 47, 15, 0),
array(118, 46, 16, 0),
array(118, 45, 17, 0),
array(119, 46, 15, 0),
array(119, 45, 16, 0),
array(119, 44, 17, 0),
array(120, 45, 15, 0),
array(120, 44, 16, 0),
array(120, 43, 17, 0),
);

//shuffle the md-array
shuffle($distribution);

//select first array from $distribution
$slice[] = array_slice($distribution ,0, 1);

//create an array for key values
$cardrarity = array('common', 'uncommon', 'rare', 'superrare');

//combine $cardrarity and $slice
$cardraritycount = array_combine($cardrarity, $slice);

//create a variable for each value in 
foreach ($cardraritycount as $key => $value){
    $$key = $value;
}
                  ?>

<pre>

<?php

$first_array = $distribution[0];

list($common, $uncommon, $rare, $superrare) = $first_array;
echo "Common: $common, Uncommon: $uncommon, Rare: $rare, Superrare: $superrare";
?>
