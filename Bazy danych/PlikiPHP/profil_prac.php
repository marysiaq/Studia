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
        <a href="panel_pracownika.php"> <--Powrót </a>
    <?php
        ?>
    </nav>
    <article>
        <?php
         $conn = new mysqli("localhost", "root","", "sklepik");
         if ($conn->connect_error) {
             die("Connection failed: ". $conn->connect_error);
         }
         $result=$conn->query("select  imie,nazwisko, e_mail,haslo,numer_telefonu, miejscowosc,kod_pocztowy,ulica,numer_budynku,numer_lokalu from pracownik inner join adresy on pracownik.id_adres=adresy.id and pracownik.id={$_SESSION['id_prac']};");
         $row=$result-> fetch_assoc();
         echo "<h1>Dane</h1>
         <p1><b>Imie: </b> {$row['imie']} </p1><br/>
         <p1><b>Nazwisko: </b> {$row['nazwisko']} </p1><br/>
         <p1><b>E-mail: </b> {$row['e_mail']} </p1><br/>
         <p1><b>Numer telefonu: </b> {$row['numer_telefonu']} </p1><br/>
         <a href='edytuj_dane_prac_f.php'>Edytuj</a></br>
         <a href='zmien_haslo_prac_f.php'>Zmień hasło</a></br>
         <h3>Adres</h3>
         <p1><b>Miejscowosc: </b> {$row['miejscowosc']} </p1><br/>
         <p1><b>Kod_pocztowy: </b> {$row['kod_pocztowy']} </p1><br/>
         <p1><b>Ulica: </b> {$row['ulica']} </p1><br/>
         <p1><b>Numer_budynku: </b> {$row['numer_budynku']} </p1><br/>

         ";
         if(isset($row['numer_lokalu'])){
             echo"<p1><b>Numer_lokalu: </b> {$row['numer_lokalu']} </p1><br/>";
         }
         
         echo "<a href='edytuj_adres_prac_f.php'>Edytuj</a><br/><br/>";

         $result=$conn->query("select  id_klienta from pracownik where id={$_SESSION['id_prac']};");
         $row=$result->fetch_assoc();
         if($row['id_klienta']!=null){
           echo "<p>Profil jest połączony z kontem klienta!</p>
           <a href='rozlacz_konta.php' >Rozłącz</a><br/>
           ";
        }
        else echo "<a href='utworz_konto_klienta.php' >Utwórz konto klienta</a><br/>
        <a href='polacz_konto_klienta.php' >Połącz z kontem klienta</a><br/>
        ";
        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
            unset($_SESSION['blad']);
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