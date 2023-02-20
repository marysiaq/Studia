<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: produkt.php?id={$_POST['id_produkt']}");
        exit();
}

if(empty($_POST['ilosc'])|| $_POST['ilosc']<=0){
  
    $_SESSION['Blad']="<span>Nieprawidłowa wartość!</span>";
    header("Location: produkt.php?id={$_POST['id_produkt']}");
    exit();

}

    $conn = new mysqli("localhost", "root","", "sklepik");
    if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
    }

    $result=$conn->query("SELECT  id FROM zamowienie WHERE id_stan=1 and id_klienta={$_SESSION['id']}");
    
    if(  $result->num_rows == 0){

        $conn->query("INSERT INTO zamowienie (id_klienta, id_stan) values ({$_SESSION['id']}, 1)");
     
     }

    $result=$conn->query("select zamowione_produkty.ilosc,zamowione_produkty.id_produktu, zamowione_produkty.id_zamowienia from zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1 and zamowione_produkty.id_produktu={$_POST['id_produkt']};");
    if(  $result->num_rows > 0){
        $result=$conn->query("select produkt.id, produkt.ilosc as ilosc_prod, pom.ilosc as ilosc_zam from (select id_produktu, ilosc from  zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1) as pom inner join produkt on pom.id_produktu=produkt.id and produkt.id={$_POST['id_produkt']};");
        $row=$result->fetch_assoc();
        if($row['ilosc_prod'] < ($_POST['ilosc']+$row['ilosc_zam'])){
            $_SESSION['info']="<span>Nieprawidłowa wartość!</span>";
            header("Location: produkt.php?id={$_POST['id_produkt']}");
            $conn->close();
            exit();
        }
       else $conn->query("update zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowione_produkty.id_produktu={$_POST['id_produkt']}  set zamowione_produkty.ilosc=zamowione_produkty.ilosc+{$_POST['ilosc']};");
     
     }
     else{
        $result=$conn->query("select produkt.ilosc from produkt where id={$_POST['id_produkt']};");
        if($result->num_rows>0){
        $row=$result->fetch_assoc();
         
        if($row['ilosc'] < $_POST['ilosc']){
            //echo $row['ilosc'];
            $_SESSION['info']="<span>Nieprawidłowa wartość!</span>";
            header("Location: produkt.php?id={$_POST['id_produkt']}");
            exit();
        } 
        else{
            $conn->query("INSERT INTO zamowione_produkty (id_produktu, id_zamowienia, ilosc) select {$_POST['id_produkt']}, id ,{$_POST['ilosc']} from zamowienie WHERE id_stan=1 and id_klienta={$_SESSION['id']}");
        }
        }
    }


    
    $_SESSION['info']="<span>Dodano do koszyka!</span>";
    $conn-> close();

   header("Location: produkt.php?id={$_POST['id_produkt']}");

?>