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

    if(!empty($_POST['haslo']))$conn->query("update klient set haslo='{$_POST['haslo']}' where klient.id={$_SESSION['id']};");
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: zmien_haslo_klient_f.php");
       exit();
   }
   header("Location: profil.php");
    $conn->close();
?>