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

$all = file('all.txt', FILE_IGNORE_NEW_LINES);  //  Populate them, ensuring that newlines in the files don't cause values to be different if an address happens to be on the last line of the file.
$unsub = file('unsub.txt', FILE_IGNORE_NEW_LINES);
$bounced = file('bounced.txt', FILE_IGNORE_NEW_LINES);



$valid = array_diff($all, $unsub, $bounced);  // Pare down the array to only the addresses we want. This is slow.

foreach ($valid as $value) {
	print($value . '<br>');
}

// For a faster way of doing this, see: http://stackoverflow.com/questions/2479963/how-does-array-diff-work


?>