<?php
/*
 * Created on 27 Aug 2013
 * 
 */
 require_once('config.inc.php');

$t = timer();
$test_result = $at->getPicklist('Ticket','Priority');
timer($t);
var_dump($test_result);
$t = timer();
// doesn't use the soap object again
$test_result = $at->getPicklist('Ticket','IssueType');
timer($t);
var_dump($test_result);


$t = timer();
$test_result = $at->getPicklist('Ticket','FailMe');
timer($t);
// boolean false;
var_dump($test_result);

$t = timer();
$test_result = $at->getPicklist('Resource','Role');
timer($t);
// boolean false;
var_dump($test_result);
 
$t = timer();
var_dump($at->getAvailablePicklists('Resource')); 
timer($t);

// and now still no soap object
$t = timer();
$test_result = $at->getPicklist('Resource','UserType');
timer($t);
// boolean false;
var_dump($test_result);


?>
