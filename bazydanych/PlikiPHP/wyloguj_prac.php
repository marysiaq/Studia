<?php
    session_start();
    session_unset();
    header("Location: zaloguj_prac.php");
?>