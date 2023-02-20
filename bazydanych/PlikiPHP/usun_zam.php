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
$conn->query("delete from zamowione_produkty where id_zamowienia={$_GET['id']}");
$conn->query("delete from zamowienie where id={$_GET['id']}");
   
header("Location: zarz_zamowieniami.php");
$conn->close();
?>