<?php


/*  This is part of a mini-application that takes
 *  inputs of email addresses in text files
 *  that are given one address per line, then 
 *  compares the lists to create a final list 
 *  of only valid addresses. One text file 
 *  contains all of the addresses while the 
 *  other two lists contain addresses that are 
 *  invalid, either because their users have 
 *  unsubscribed or because emails to their 
 *  addresses have been undeliverable.
*/



$all = array();
$unsub = array();
$bounced = array();
$valid = array();

$all = file('all.txt');
print_r($all);
echo '<br>';

$unsub = file('unsub.txt');
print_r($unsub);
echo '<br>';

$bounced = file('bounced.txt');
print_r($bounced);
echo '<br>';

// $unsub = ['two@two.com', 'four@four.org'];
// print_r($unsub);

function leo_array_diff($a, $b) {
    $map = array();
    foreach($a as $val) $map[$val] = 1;
    foreach($b as $val) unset($map[$val]);
    return array_keys($map);
}

// function real_array_diff($a, $b) {
// 	for ($i = 0; $i < count($array2); $i++) { 
// 	    for ($j = 0; $j < count($array1); $j++) {
// 	        if(!in_array($array1[$j],$array2)){ 
// 	            $resArr[] = $array1[$j]; 
// 	        } 
// 	    } 
// 	}
// 	foreach ($b as $b_value) {
// 		if(in_array($b_value, $a)) {

// 		}
// 	}
// }



$valid = array_diff($all, $unsub, $bounced);  //  Not working. See also: http://stackoverflow.com/questions/7348280/array-diff-not-working-as-expected-what-could-be-the-reason

foreach ($valid as $value) {
	print($value . '<br>');
}

echo (PHP_VERSION);

// Faster solution for this: http://stackoverflow.com/questions/2479963/how-does-array-diff-work/6700430#6700430

?>