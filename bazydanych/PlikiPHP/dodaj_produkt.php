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

    if(!empty($_POST['nazwa'])&&!empty($_POST['opis'])&&!empty($_POST['cena'])&&!empty($_POST['id_kategoria'])&&!empty($_POST['sklad'])&&!empty($_POST['ilosc'])&&$_POST['ilosc']>=0&&!empty($_POST['cena'])>0){
        $conn->query("insert into produkt (id_kategoria,nazwa, cena, opis, sklad, ilosc) values ({$_POST['id_kategoria']},'{$_POST['nazwa']}',{$_POST['cena']},'{$_POST['opis']}','{$_POST['sklad']}',{$_POST['ilosc']}) ");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_produkt_f.php");
       exit();
   }
   header("Location: zarz_produktami.php");
    $conn->close();
?>