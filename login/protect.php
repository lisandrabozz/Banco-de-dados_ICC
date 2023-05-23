<?php
    if(!isset($_SESSION)){
        session_start();
    }

    else if(!isset($_SESSION['id'])){
        die("voce nao pode acessar essa pagina, porque nao esta logado. <p><a href=\"index.php\">Entrar</a></p>");
    }
?>
