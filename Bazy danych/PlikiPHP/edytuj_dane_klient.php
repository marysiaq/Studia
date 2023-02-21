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

    if(!empty($_POST['imie'])&&!empty($_POST['nazwisko'])&&!empty($_POST['email'])&&!empty($_POST['nr_tel'])&&strlen($_POST["nr_tel"])==9&&is_numeric($_POST["nr_tel"]))$conn->query("update klient set imie='{$_POST['imie']}', nazwisko='{$_POST['nazwisko']}',e_mail='{$_POST['email']}',numer_telefonu='{$_POST['nr_tel']}'  where klient.id={$_SESSION['id']};");
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: edytuj_dane_klient_f.php");
       exit();
   }
   header("Location: profil.php");
    $conn->close();
?>