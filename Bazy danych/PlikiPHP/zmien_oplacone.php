<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']==false){
        header("Location: zaloguj_prac.php");
        exit();
    }
    
    
    $conn = new mysqli("localhost", "root","", "sklepik");

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
     }

     $conn->query("update zamowienie set czy_oplacone={$_POST['oplata']} where id={$_POST['id']}");
     header("Location: zarz_zam_nr.php?id={$_POST['id']}");
     $conn-> close();
?>