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

    if(!empty($_POST['nazwa'])&&!empty($_POST['opis'])&&!empty($_POST['cena'])&&!empty($_POST['id_kategoria'])&&!empty($_POST['sklad'])&&$_POST['ilosc']>=0&&!empty($_POST['cena'])&&$_POST['cena']>0){
        $conn->query("update produkt  set nazwa='{$_POST['nazwa']}', opis='{$_POST['opis']}' , cena={$_POST['cena']} , id_kategoria={$_POST['id_kategoria']} , sklad='{$_POST['sklad']}' , ilosc={$_POST['ilosc']} where id={$_POST['id']}");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: produkt_edytuj_f.php?id={$_POST['id']}");
       exit();
   }
   header("Location: produkt_szczegoly.php?id={$_POST['id']}");
    $conn->close();
?>