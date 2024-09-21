<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION)) {
        die("Você não pode acessar esta página porque não está logado.<p><a href='login.php'>Faça login</a> para acessar o sistema.</p>");
    }
?>