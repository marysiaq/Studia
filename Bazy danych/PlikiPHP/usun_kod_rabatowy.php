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

    $conn->query("update zamowienie set id_kod_rabatowy=1 where id=(select id from zamowienie where id_klienta={$_SESSION['id']} and id_stan=1);");
    $conn->close();
  
    header("Location: formularz_zam.php");
  

?>