<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: lista_produktow.php");
        exit();
}
if (empty($_POST['platnosc'])||empty($_POST['dostawa'])){
    $_SESSION['info2']="<span>Nie wybrano sposobu dostawy lub płatności!</span>";
    header("Location: formularz_zam.php");

    exit();
}
    $conn = new mysqli("localhost", "root","", "sklepik");
    if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
    }
    $result=$conn->query("select zamowione_produkty.ilosc,zamowione_produkty.id_produktu, zamowione_produkty.id_zamowienia,produkt.ilosc as magazyn from (zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1)inner join produkt on produkt.id=zamowione_produkty.id_produktu;    ");
    if(  $result->num_rows > 0){
        while($row=$result->fetch_assoc()){
        if($row['ilosc'] > ($row['magazyn'])){
            $_SESSION['info2']="<span>Niewystarczająca ilość jednego z produktów w magazynie!</span>";
            header("Location: formularz_zam.php");
            $conn->close();
            exit();
        }
    }
    }
    $result=$conn->query("select id from zamowienie where id_klienta={$_SESSION['id']} and id_stan=1");
   $row=$result->fetch_assoc();
   

    $conn->query("update (zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1)inner join produkt on produkt.id=zamowione_produkty.id_produktu set produkt.ilosc=produkt.ilosc-zamowione_produkty.ilosc;");
    $conn->query("update  (zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1)  inner join produkt on zamowione_produkty.id_produktu=produkt.id set zamowione_produkty.cena=produkt.cena;");
    $conn->query("update zamowienie set zamowienie.id_dostawa={$_POST['dostawa']} , id_sposob_platnosci={$_POST['platnosc']} , data_zamowienia=current_date() , id_stan=2 ,
    koszt_calkowity=(select round(sum(pom.koszt)+(select cena from sposoby_dostawy where id={$_POST['dostawa']}),2)
    from (select (zamowione_produkty.ilosc*zamowione_produkty.cena)-(zamowione_produkty.ilosc*zamowione_produkty.cena)*0.01*kody_rabatowe.znizka_procent  as koszt
    from (zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1)
    inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id)as pom)
    where zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1; 
   ");

   
    $conn->close();
  
    header("Location: podsumowanie_zam.php?id_zam={$row['id']}");
  

?>