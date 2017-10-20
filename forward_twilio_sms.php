<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$mycell=$_GET['myCell'];
$myTwilioNumber=$_REQUEST['To'];

if ($_REQUEST['From'] == $mycell ) {
	$pos = strpos($_REQUEST['Body'], ",");
	if ($pos !== false) {
		$pieces = explode(",", $_REQUEST['Body'],2);
		$recipient=$pieces[0]; // phone number
		$msg_body=$pieces[1]; // body
	} else {
		$recipient=$_REQUEST['From'];	
		$msg_body="Incorrect format. It needs to be:  Recipient Number, Message";
	}


} else {
	$recipient = $mycell;
	if ($_REQUEST['MediaUrl0']) {
		$msg_body = "<Body>" . $_REQUEST['From'] . ": " . $_REQUEST['Body'] . "</Body>";
		$mediaFile = "<Media>" . $_REQUEST['MediaUrl0'] . "</Media>";
	} else  {
		$msg_body = $_REQUEST['From'] . ": " . $_REQUEST['Body'];
	}
}


$sender = $myTwilioNumber;


?>
<Response>
  <Message from="<?=$sender ?>" to="<?=$recipient ?>">
	<?=$msg_body ?>
	<?=$mediaFile ?>
  </Message>
</Response>

