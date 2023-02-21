<?php
    session_start();
    session_unset();
    header("Location: lista_produktow.php");
?>