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
    $result=$conn->query("select  produkt.ilosc as ilosc_prod, pom.ilosc as ilosc_zam from (select id_produktu, ilosc from  zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1) as pom inner join produkt on pom.id_produktu=produkt.id and produkt.id={$_POST['id_produktu']};");
    $row=$result->fetch_assoc();
    if($row['ilosc_prod'] < (1+$row['ilosc_zam'])){
        $_SESSION['info']="<span>Za mało produktu w magazynie!</span>";
        $conn->close();
        header("Location: koszyk.php");
        exit();
    }
    else{
        $conn->query("update zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowione_produkty.id_produktu={$_POST['id_produktu']}  set zamowione_produkty.ilosc=zamowione_produkty.ilosc+1;");
    }

    $conn->close();
    header("Location: koszyk.php");
  

?>