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

    if(!empty($_POST['miejsc'])&&!empty($_POST['ulica'])&&!empty($_POST['kod'])&&!empty($_POST['nr_bud'])&&($_POST['nr_bud'])>0){
      if(!empty($_POST['nr_lok'])&&$_POST['nr_lok']>0)  $conn->query("update adresy inner join klient on adresy.id=klient.id_adres and klient.id={$_SESSION['id']} set miejscowosc='{$_POST['miejsc']}', kod_pocztowy='{$_POST['kod']}', ulica='{$_POST['ulica']}', numer_budynku='{$_POST['nr_bud']}', numer_lokalu='{$_POST['nr_lok']}';");
      else if(empty($_POST['nr_lok']))$conn->query("update adresy inner join klient on adresy.id=klient.id_adres and klient.id={$_SESSION['id']} set miejscowosc='{$_POST['miejsc']}', kod_pocztowy='{$_POST['kod']}', ulica='{$_POST['ulica']}', numer_budynku='{$_POST['nr_bud']}', numer_lokalu=null;");
      else{
        $_SESSION['blad']="<span>Błąd!</span>";
        header("Location: edytuj_adres_klient_f.php");
        exit();
      }
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: edytuj_adres_klient_f.php");
       exit();
   }
   header("Location: profil.php");
    $conn->close();
?>