<?php
/*
 * Created on 27 Aug 2013
 * 
 */
 require_once('config.inc.php');

$t = timer();
$query = $at->getNewQuery();
timer($t);



$query->qFROM('Ticket');
$query->qWHERE('IssueType',$query->Equals,10);
$query->openBracket();
$query->qAND('Status',$query->Equals,5);
$query->qOR('Priority',$query->Equals,4);
$query->closeBracket();

print $query->getQueryXml();

?>
