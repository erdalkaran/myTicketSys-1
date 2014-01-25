<?php
include_once 'config.php';

$options = array();
$term    = $_GET['term'];
$results = $db->get_results("select * from ticket_id where ticketbas1ik like '".$term."%'"); //Kullandığımız metoda göre veritabanında arama yapıyoruz

foreach($results as $k=>$v)
{
   $options[] = $v->name;
}

echo json_encode($options);

?>



