<?php
session_start();
if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']!=true){
    header("Location: zaloguj_prac.php");
    exit();
}
$conn = new mysqli("localhost", "root","", "sklepik");
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    $conn->query("update klient set usunieto=false where id={$_GET['id']}");
    header("Location: zarz_klientami.php");


    $conn-> close();
?>