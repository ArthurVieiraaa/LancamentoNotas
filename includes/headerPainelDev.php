<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    </head>
    <body>
        <div class="navbar">
            <div>
                <a href="painelDesenvolvedor.php"><img src="assets/img/Senac.png" alt=""></a>
            </div>
            <div class="sair">
                <button ><i class="fa-solid fa-right-from-bracket"> Sair</i></button>
            </div>
        </div>
        <div class="navbar-btn">
            <?php
                include "menuPainelDev.php";
            ?>
        </div>
    </div>