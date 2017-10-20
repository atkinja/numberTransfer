<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$from=$_REQUEST['From'];
$myCell=$_GET['myCell'];

echo "<Response>";
echo "<Dial callerId=\"" . $_GET['myTwilioNumber'] . "\">"; 
echo $_REQUEST['Digits'];
echo "</Dial>";
echo "</Response>";
