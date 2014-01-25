<?php
require_once 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Yönetim giriş sayfası</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div>
   
    <div style="color:red; border: 1px solid #ccc">
        <?php
        if( isset( $_SESSION['hataMesaj'] ) ){
            foreach ($_SESSION['hataMesaj'] as $hata){
                echo $hata;
                echo '<br />';
            }
            unset($_SESSION['hataMesaj']);
        }
        ?>
    </div>
   
    <form action="login_gonder.php" method="POST">
        
    Email: <input type="text" name="email" value="" />
    <br />
    Şifre: <input type="password" name="password" value="" />
    <br />
    
    <input type="submit" value="Giriş" />
        
    </form>
    
</div>
</body>
</html>

