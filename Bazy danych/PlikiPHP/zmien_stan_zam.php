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
     if($_POST['stan']==5){
        $result=$conn->query("select czy_oplacone from zamowienie where id={$_POST['id']}");
        $row=$result->fetch_assoc();
        if($row['czy_oplacone']==0){
            $_SESSION['blad']="<span>Aby uzanć zamówienie za zakończone musi ono być opłacone!</span>";
            header("Location: zarz_zam_nr.php?id={$_POST['id']}");
            exit();
        }
        else $conn->query("update zamowienie set id_stan={$_POST['stan']}, data_zakonczenia=current_date() where id={$_POST['id']}");
        header("Location: szczegoly_zam.php?id={$_POST['id']}");
        exit();
        
     }
     if($_POST['stan']==7){
        
        $conn->query("update zamowienie set id_stan={$_POST['stan']}, data_anulowania=current_date() where id={$_POST['id']}");
        header("Location: szczegoly_zam.php?id={$_POST['id']}");
        exit();
        
     }
     else $conn->query("update zamowienie set id_stan={$_POST['stan']} where id={$_POST['id']}");
     header("Location: zarz_zam_nr.php?id={$_POST['id']}");
     $conn-> close();
?>