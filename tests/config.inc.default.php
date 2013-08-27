<?php
/*
 * Created on 27 Aug 2013
 *
 */
 
$username = '';//eg: username@boardname.com
$password = '';//eg: 123459696
$wsdl_url = '';//eg:'https://webservices.autotask.net/atservices/1.5/atws.wsdl'

require_once('../atws/php-atws.php');

$at = new atws();
$at->connect($wsdl_url,$username,$password);

?>