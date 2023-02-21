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
$result=$conn->query("select id_klienta, id_adres from pracownik  where id={$_GET['id']}");
$row=$result->fetch_assoc();
if($row['id_klienta']==null){
    $conn->query("delete from pracownik where id={$_GET['id']}");
    $conn->query("delete from adresy where id={$row['id_adres']}");
}
else{
    $result2=$conn->query("select if(klient.id_adres = pracownik.id_adres,true,false) as warunek from pracownik inner join klient on pracownik.id_klienta=klient.id and pracownik.id={$_GET['id']}; ");
    $warunek=$result2->fetch_assoc();
    if($warunek['warunek']==true){
        $conn->query("insert into adresy ( miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) select miejscowosc,kod_pocztowy, ulica, numer_budynku, numer_lokalu from adresy inner join pracownik on pracownik.id_adres=adresy.id and pracownik.id={$_GET['id']};");
        $conn->query("update pracownik inner join klient on pracownik.id_klienta=klient.id and pracownik.id={$_GET['id']} set pracownik.id_klienta=null, klient.id_adres=(select max(id) from adresy);");    
    }
    $conn->query("delete from pracownik where id={$_GET['id']}");
    $conn->query("delete from adresy where id={$row['id_adres']}");  

}




$conn->close();
header("Location: zarz_pracownikami.php");
?>