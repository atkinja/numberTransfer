<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$from=$_REQUEST['From'];
$to=$_REQUEST['To'];
$myCell=$_GET['myCell'];

echo "<Response>";
if (substr($from,strlen($from)-10, 10) == substr($myCell,strlen($myCell)-10, 10)) {
echo "<Gather action=\"https://www.atkinja.com/myTwilioNumber/gather.php?myTwilioNumber=$to\">";
echo "<Say> Enter the number you want to dial, followed by the pound sign. </Say>";
echo "</Gather>";
echo "<Gather action=\"http://www.atkinja.com/myTwilioNumber/gather.php?myTwilioNumber=$to\">";
echo "<Say> Enter the number you want to dial, followed by the pound sign. </Say>";
echo "</Gather>";
echo "<Say> Yikes! Sorry. I'm not catching your digits.  Please hang up and call back again. </Say>";

} else { 

echo "<Sms from=\"" . $_REQUEST['To'] . "\" " . "to=\"" . $_GET['myCell'] . "\">";
echo "Twilio Voice call from " . $_REQUEST['From'] . " " . $_REQUEST['CallerName'];
echo "</Sms>";
echo "<Dial callerId=\"" . $_REQUEST['From']  . "\">";
echo $_GET['myCell']; 
echo "</Dial>";
}
echo "</Response>";

