<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: lista_produktow.php");
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
        <a href="lista_produktow.php"> <--Powrót </a>
    <?php
     

        ?>
    </nav>
    <article>
        <?php
         $conn = new mysqli("localhost", "root","", "sklepik");
         if ($conn->connect_error) {
             die("Connection failed: ". $conn->connect_error);
         }
         $result=$conn->query("select imie,nazwisko, e_mail,haslo,numer_telefonu, miejscowosc,kod_pocztowy,ulica,numer_budynku,numer_lokalu from klient inner join adresy on klient.id_adres=adresy.id and klient.id={$_SESSION['id']};");
         $row=$result-> fetch_assoc();
         echo "<h1>Dane</h1>
         <p1><b>Imie: </b> {$row['imie']} </p1><br/>
         <p1><b>Nazwisko: </b> {$row['nazwisko']} </p1><br/>
         <p1><b>E-mail: </b> {$row['e_mail']} </p1><br/>
         <p1><b>Numer telefonu: </b> {$row['numer_telefonu']} </p1><br/>
         <a href='edytuj_dane_klient_f.php'>Edytuj</a></br>
         <a href='zmien_haslo_klient_f.php'>Zmień hasło</a></br>
         <a href='usun_konto_klient_f.php'>Usuń konto</a></br>
         <h3>Adres</h3>
         <p1><b>Miejscowosc: </b> {$row['miejscowosc']} </p1><br/>
         <p1><b>Kod_pocztowy: </b> {$row['kod_pocztowy']} </p1><br/>
         <p1><b>Ulica: </b> {$row['ulica']} </p1><br/>
         <p1><b>Numer_budynku: </b> {$row['numer_budynku']} </p1><br/>

         ";
         if(isset($row['numer_lokalu'])){
             echo"<p1><b>Numer_lokalu: </b> {$row['numer_lokalu']} </p1><br/>";
         }
         echo "<a href='edytuj_adres_klient_f.php'>Edytuj</a>";

         echo "<h1>Historia zamówień</h1>";
         $result=$conn->query("select zamowienie.id,data_zamowienia,koszt_calkowity, stan from zamowienie inner join stan_zamowienia on zamowienie.id_stan=stan_zamowienia.id and id_klienta={$_SESSION['id']} and id_stan != 1  order by zamowienie.id desc;");
         if($result->num_rows>0){
            echo "<table>
            <thead>
            <tr><th><b>Numer zamowienia </b></th><th><b>Data wpłynięcia</b></th><th><b>Koszt całkowity</b></th><th><b>Stan</b></th></tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc()){
                echo"<tr><td ><a href=\"podsumowanie_zam.php?id_zam={$row['id']}\">Zamówienie nr. {$row['id']}</a></td><td>{$row['data_zamowienia']}</td><td>{$row['koszt_calkowity']} zł</td><td>{$row['stan']}</td></tr>";
            }
            echo"</tbody>
            </table>";
        }
        else{
            echo "Brak zamówień!";
        }


        
         $conn->close();

         
        
        ?>
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>   