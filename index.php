<?php
    // destroi a sessão com segurança
    session_start();
    session_destroy();

    // redireciona para o index.php
    header("Location: home_page.php");
?>