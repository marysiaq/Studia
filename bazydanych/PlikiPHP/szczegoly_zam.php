<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']==false){
        header("Location: zaloguj_prac.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sklepik</title>
</head>
<body>
	
    <header>
	
	
    </header>
    <nav>
        <a href="zam_zakonczone.php">Zamówienia zakończone</a>
        <a href="zam_anulowane.php">Zamówienia anulowane</a>
        <a href="panel_pracownika.php">Panel pracownika</a>
    <?php
       
       

        ?>
    </nav>
    <article>
    <?php
       echo "<h1>Zamówienie nr. {$_GET['id']}</h1>";
       

       ?>

    
            <h3>Zamowione produkty:</h3>
            <table>
            <thead>
                <tr><th>Nazwa</th><th>Ilosc</th></tr>
            </thead>
            <tbody>
             <?php
             $conn = new mysqli("localhost", "root","", "sklepik");
             if ($conn->connect_error) {
                 die("Connection failed: ". $conn->connect_error);
            }


                $sql="select nazwa, zamowione_produkty.ilosc from  zamowione_produkty inner join produkt on zamowione_produkty.id_produktu=produkt.id and id_zamowienia={$_GET['id']} ";
               
                
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr ><td> {$row['nazwa']}</td><td> {$row['ilosc']}</a></td></tr>";
                    }

                }
                else echo "Brak wyników!";
                

        ?>
        </tbody>
        </table>
        <?php
        $result=$conn->query("select zamowienie.id_klienta, koszt_calkowity, sposob_dostawy, metoda_platnosci, czy_oplacone,data_zamowienia, stan from ((zamowienie inner join sposoby_dostawy on zamowienie.id_dostawa=sposoby_dostawy.id and zamowienie.id={$_GET['id']})
        inner join metody_platnosci on zamowienie.id_sposob_platnosci=metody_platnosci.id) inner join stan_zamowienia on zamowienie.id_stan=stan_zamowienia.id;");
        $row=$result->fetch_assoc();
        echo "<p><b>Stan zamówienia: </b> {$row['stan']} </p>
        <p><b>Data zamówienia: </b> {$row['data_zamowienia']} </p>
        <p><b>Koszt całkowity: </b> {$row['koszt_calkowity']} zł</p>
        <p><b>Metoda płatności: </b> {$row['metoda_platnosci']} </p>
        ";
        if($row['czy_oplacone']==0)echo "<p><b>Czy opłacono: </b> nie</p>";
        else echo "<p><b>Czy opłacono: </b> tak</p>";
        
        echo "<p><b>Sposób dostawy: </b> {$row['sposob_dostawy']} </p>
        <h4>Dane zamawiającego: </h4>
        ";

        $result2=$conn->query("select imie,nazwisko,numer_telefonu,e_mail, miejscowosc,kod_pocztowy,ulica,numer_budynku,numer_lokalu from (zamowienie inner join klient on zamowienie.id_klienta=klient.id and zamowienie.id={$_GET['id']})
        inner join adresy on klient.id_adres=adresy.id");
        $row2=$result2->fetch_assoc();
        echo "
        <p1><b>Imie: </b> {$row2['imie']} </p1><br/>
        <p1><b>Nazwisko: </b> {$row2['nazwisko']} </p1><br/>
        <p1><b>E-mail: </b> {$row2['e_mail']} </p1><br/>
        <p1><b>Miejscowosc: </b> {$row2['miejscowosc']} </p1><br/>
         <p1><b>Kod_pocztowy: </b> {$row2['kod_pocztowy']} </p1><br/>
         <p1><b>Ulica: </b> {$row2['ulica']} </p1><br/>
         <p1><b>Numer_budynku: </b> {$row2['numer_budynku']} </p1><br/>

         ";
         if(isset($row2['numer_lokalu'])){
             echo"<p1><b>Numer_lokalu: </b> {$row2['numer_lokalu']} </p1><br/>";
         }

      
        


        $conn->close();
        ?>
        <?php
            if(isset($_SESSION['blad'])){
                echo $_SESSION['blad'];
                unset($_SESSION['blad']);
            }
        ?>
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>