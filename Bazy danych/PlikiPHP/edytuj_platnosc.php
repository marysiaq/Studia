<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: lista_produktow.php");
        exit();
    }
    $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
       

    if(!empty($_POST['metoda_platnosci'])&&!empty($_POST['dostepne'])){
        $conn->query("update metody_platnosci set metoda_platnosci='{$_POST['metoda_platnosci']}',dostepne={$_POST['dostepne']} where id={$_POST['id']}");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: edytuj_platnosc_f.php?id={$_POST['id']}");
       exit();
   }
   header("Location: zarz_platnosci.php");
    $conn->close();
?>