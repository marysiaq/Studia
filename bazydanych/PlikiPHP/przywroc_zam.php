<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']=false){
        header("Location: zaloguj_prac.php");
        exit();
    }
    
    
    $conn = new mysqli("localhost", "root","", "sklepik");

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
     }
    $conn->query("update zamowienie set id_stan=(select id from stan_zamowienia where stan='przyjęto do realizacji') where zamowienie.id={$_GET['id']}");
    header("Location: zam_anulowane.php");
     $conn-> close();
?>