<?php
session_start();

//oturumAcildi session değişkeni daha önce oluşturulmuş mu? oluşturulmuşsa değeri 1 yapılmış mı?
//bu bize daha önce üye girişinin yapılıp yapılmadığını belirtir.
if( !( isset($_SESSION['oturumAcildi']) && $_SESSION['oturumAcildi'] == 1 ) ){
    header('Location: login.php');
    exit;
}

require_once 'config.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="yeni_ticketlar.php" name="newTicket">
        <input type="submit" value="Yeni Ticketlara Gözat" name="newTicketlist" />
    </form>
    <form action="yanitlanmis_ticketlar.php" name="lookTickets">
        <input type="submit" value="Yanıtlanmış Ticketlara Gözat" name="AnsweredTicketList" />
    </form>
    <form action="tekraryanit.php" name="lookTickets">
        <input type="submit" value="Tekrar Yanıt Bekleyen Ticketlara Gözat" name="ReAnsweredTicketList" />
    </form>
    <form action="kategori_ekle.php" name="lookTickets">
        <input type="submit" value="Kategori Ekle" name="AddNewCategory" />
    </form>
    <form action="TicketGuncelle.php" name="lookTickets">
        <input type="submit" value="Ticket Güncelle" name="UpdateTickets" />
    </form>
    <?php
    // put your code here
    ?>
</body>
</html>
