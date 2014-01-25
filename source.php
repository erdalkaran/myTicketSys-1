<?php
include_once 'config.php';

$req = "SELECT ticketbaslik "
	."FROM ticket_id "
	."WHERE ticketbaslik LIKE '%".$_REQUEST['baslik']."%' "; 

$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
	$results[] = array('label' => $row['ticketbaslik']);
}

echo json_encode($results);

?>



