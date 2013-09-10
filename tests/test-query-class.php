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

// nah, start again.
$query->reset();

$query->qFROM('Ticket');
$query->qWHERE('id',$query->GreaterThan,23000);

printquery($query,$at);

$query->reset();
$query->qFROM('Ticket');
/// show errors
$query->qWHERE('idfasdf',$query->GreaterThan,23000);

printquery($query,$at);


function printquery(&$query,&$at) {
	print "\r\n******* xml sent ******\r\n";
	print $query->getQueryXml();
	print "\r\n";
	print "\r\n******* var dump results ******\r\n";
	var_dump($at->getQueryResults($query));
	if(isset($at->last_query_fault)) {
		print "\r\n";
		print "\r\n******* xml which failed ******\r\n";
		print $at->last_query_fault_xml;
		print "\r\n";
		print "\r\n******* soap failure message ******\r\n";
		var_dump($at->last_query_fault);
		print "\r\n";
	}
	
	if(isset($at->last_query_error)) {
		print "\r\n";
		print "\r\n******* error message from api ******\r\n";
		var_dump( $at->last_query_error );
		print "\r\n";
		print "\r\n******* xml which failed api call ******\r\n";
		print $at->last_query_error_xml;
		print "\r\n";
	}

}


?>
