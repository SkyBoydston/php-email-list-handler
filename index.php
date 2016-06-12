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



$all = array();  //  Initialize the arrays we'll need
$unsub = array();
$bounced = array();
$valid = array();

$all = file('all.txt');  //  Populate them and display their contents to make sure we're getting what we want.
print_r($all);
echo '<br>';

$unsub = file('unsub.txt');
print_r($unsub);
echo '<br>';

$bounced = file('bounced.txt');
print_r($bounced);
echo '<br>';




/*  This should remove any values in $unsub and $bounced from 
 *  $all, producing a list of valid email addresses. It's not 
 *  working. As you can see from it's output, it only removes 
 *  values from $all if the values' indices are also equal in 
 *  spite of the fact that the function array_diff() is not 
 *  supposed to care about keys or indices. See also: http://
 *  stackoverflow.com/questions/7348280/array-diff-not-
 *  working-as-expected-what-could-be-the-reason
*/

$valid = array_diff($all, $unsub, $bounced);  

foreach ($valid as $value) {
	print($value . '<br>');
}

echo (PHP_VERSION);  //  This behavior has also been tested and is the same in version 5.6.19

?>