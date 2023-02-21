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
        $result=$conn->query("select kod from kody_rabatowe where kod='{$_POST['kod']} && id!={$_POST['id']}'");
        if( $result!== false && $result->num_rows>0){
            $_SESSION['blad']="<span>Błąd!</span>";
            header("Location: edytuj_kod_f.php?id={$_POST['id']}");
           exit();
        }

    if(!empty($_POST['kod'])&&!empty($_POST['czy_aktywny'])){
        $conn->query("update kody_rabatowe set kod='{$_POST['kod']}',czy_aktywny={$_POST['czy_aktywny']} where id={$_POST['id']}");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: edytuj_kod_f.php?id={$_POST['id']}");
       exit();
   }
   header("Location: kody_rabatowe.php");
    $conn->close();
?>