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
    $result=$conn->query("select kod from kody_rabatowe where kod='{$_POST['kod']}'");
    if( $result!== false && $result->num_rows>0){
        $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_kod_f.php");
       exit();
    }
    if(!empty($_POST['kod'])&&!empty($_POST['znizka_procent'])&&$_POST['znizka_procent']>=0&&$_POST['znizka_procent']<=100){
        $conn->query("insert into kody_rabatowe (kod, znizka_procent) values ('{$_POST['kod']}',{$_POST['znizka_procent']})");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_kod_f.php");
       exit();
   }
   header("Location: kody_rabatowe.php");
    $conn->close();
?>