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
       

    if(!empty($_POST['sposob_dostawy'])&&!empty($_POST['dostepne'])){
        $conn->query("update sposoby_dostawy set sposob_dostawy='{$_POST['sposob_dostawy']}',dostepne={$_POST['dostepne']}, cena={$_POST['cena']} where id={$_POST['id']}");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: edytuj_dostawa_f.php?id={$_POST['id']}");
       exit();
   }
   header("Location: zarz_dostawy.php");
    $conn->close();
?>