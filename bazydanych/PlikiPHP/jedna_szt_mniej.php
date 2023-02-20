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
    $result=$conn->query("select zamowione_produkty.ilosc from zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1 and zamowione_produkty.id_produktu={$_POST['id_produktu']};");
    $row=$result->fetch_assoc();
    if($row['ilosc']==1){
        $conn->query("delete from sklepik.zamowione_produkty where id_zamowienia=(select id from zamowienie where id_klienta={$_SESSION['id']} and id_stan=1) and id_produktu={$_POST['id_produktu']};");
    }
    else{
        $conn->query("update zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowione_produkty.id_produktu={$_POST['id_produktu']}  set zamowione_produkty.ilosc=zamowione_produkty.ilosc-1;");
    }

    $conn->close();
    header("Location: koszyk.php");
  

?>