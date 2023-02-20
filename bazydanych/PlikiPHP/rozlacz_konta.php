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
    $result=$conn->query("select if(klient.id_adres = pracownik.id_adres,true,false) as warunek from pracownik inner join klient on pracownik.id_klienta=klient.id and pracownik.id={$_SESSION['id_prac']}; ");
    $row=$result->fetch_assoc();
    if($row['warunek']==1){
        $conn->query("insert into adresy ( miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) select miejscowosc,kod_pocztowy, ulica, numer_budynku, numer_lokalu from adresy inner join pracownik on pracownik.id_adres=adresy.id and pracownik.id={$_SESSION['id_prac']};");
        $conn->query("update pracownik inner join klient on pracownik.id_klienta=klient.id and pracownik.id={$_SESSION['id_prac']} set pracownik.id_klienta=null, klient.id_adres=(select max(id) from adresy);");
    }
    else {
        $conn->query("update pracownik set id_klienta=null where id ={$_SESSION['id_prac']}");
    }
    unset($_SESSION['id']);
    header("Location: profil_prac.php");


    $conn-> close();
?>