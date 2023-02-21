<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']==false){
        header("Location: zaloguj_prac.php");
        exit();
    }
    $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }

    if(!empty($_POST['haslo']))$conn->query("update pracownik set haslo='{$_POST['haslo']}' where pracownik.id={$_SESSION['id_prac']};");
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: zmien_haslo_prac_f.php");
       exit();
   }
   header("Location: profil_prac.php");
    $conn->close();
?>