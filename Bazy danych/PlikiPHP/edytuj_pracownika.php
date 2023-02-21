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
$conn->query("update pracownik set id_uprawnienia={$_POST['id_uprawnienia']}, czy_aktywny={$_POST['czy_aktywny']} where id={$_POST['id']}");

$conn->close();
header("Location: zarz_pracownikami.php");
?>