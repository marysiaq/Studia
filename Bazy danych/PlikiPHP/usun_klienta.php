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
    $result=$conn->query("select count(pracownik.id) as warunek from pracownik inner join klient on pracownik.id_klienta = klient.id and klient.id={$_GET['id']};");
    $row=$result->fetch_assoc();
    if($row['warunek']>0){
        $result2=$conn->query("select if(klient.id_adres = pracownik.id_adres,true,false) as warunek from pracownik inner join klient on pracownik.id_klienta=klient.id and klient.id={$_GET['id']}; ");
        $row2=$result2->fetch_assoc();
        if($row2['warunek']==true){
            $conn->query("update pracownik set id_klienta=null where id_klienta={$_GET['id']};");
            $conn->query("delete from zamowione_produkty where id_zamowienia in (select id from zamowienie where id_klienta={$_GET['id']});");
            $conn->query("delete from zamowienie where id_klienta={$_GET['id']}");
            $conn->query("delete from klient where id={$_GET['id']}");
            header("Location: zarz_klientami.php");
            $conn-> close();
            exit();
        }
        $conn->query("update pracownik set id_klienta=null where id_klienta={$_GET['id']};");
    }
        $conn->query("delete from zamowione_produkty where id_zamowienia in (select id from zamowienie where id_klienta={$_GET['id']});");
        $conn->query("delete from zamowienie where id_klienta={$_GET['id']}");
        $result=$conn->query("select id_adres  from  klient where klient.id={$_GET['id']};");
        $row=$result->fetch_assoc();
        $conn->query("delete from klient where id={$_GET['id']}");
        $conn->query("delete from adresy where id={$row['id_adres']}");

    header("Location: zarz_klientami.php");


    $conn-> close();
?>