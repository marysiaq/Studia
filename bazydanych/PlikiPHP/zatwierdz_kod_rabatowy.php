<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: lista_produktow.php");
        exit();
}
if (empty($_POST['kod_rabatowy'])){
    header("Location: formularz_zam.php");
    exit();
}
    $conn = new mysqli("localhost", "root","", "sklepik");
    if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
    }

    $result=$conn->query("select id from kody_rabatowe where kod='{$_POST['kod_rabatowy']}' and czy_aktywny=1");
    if($result->num_rows>0){
        $conn->query("update zamowienie set id_kod_rabatowy=(select id from kody_rabatowe where kod='{$_POST['kod_rabatowy']}') where id =(select id from zamowienie where id_klienta={$_SESSION['id']} and id_stan=1);");
    }
    else $_SESSION['info']="<span>Nieprawidłowy kod rabatowy!</span>";
    $conn->close();
  
    header("Location: formularz_zam.php");
  

?>