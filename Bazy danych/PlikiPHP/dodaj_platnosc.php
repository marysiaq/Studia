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
    $result=$conn->query("select metoda_platnosci from metody_plantosci where metoda_platnosci='{$_POST['metoda_platnosci']}'");
    if( $result!== false && $result->num_rows>0){
        $_SESSION['blad']="<span>Podaj inną nazwę!</span>";
       header("Location: dodaj_platnosc_f.php");
       exit();
    }
    if(!empty($_POST['metoda_platnosci'])){
        $conn->query("insert into metody_platnosci (metoda_platnosci) values ('{$_POST['metoda_platnosci']}')");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_platnosc_f.php");
       exit();
   }
   header("Location: zarz_platnosci.php");
    $conn->close();
?>