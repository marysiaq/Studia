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
        <a href="raporty.php"><-- Powrót</a>
    <?php
        ?>
    </nav>
    <article>
            <table>
            <thead>
                <tr><th>Kategoria</th><th>Ilość zamówionych różnych produktów z kategorii</th></tr>
            </thead>
            <tbody>
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }

                $sql="select count(produkt.id) as ile,kategoria from ((((klient inner join adresy on klient.id_adres=adresy.id and adresy.miejscowosc rlike '^[MD]')
                inner join zamowienie on zamowienie.id_klienta=klient.id and zamowienie.id_stan!=1";
                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}')";
                    //echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%')";
                    //echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%')";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }

                $sql .=" inner join zamowione_produkty on zamowienie.id=zamowione_produkty.id_zamowienia)
                inner join produkt on zamowione_produkty.id_produktu=produkt.id)
                inner join kategorie_produktow on produkt.id_kategoria=kategorie_produktow.id group by kategoria order by ile desc limit 3;";
				
				
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "<tr ><td> {$row['kategoria']}</td><td> {$row['ile']}</td>";
                         echo "</tr>";
                    }
               }
               else echo "Brak wyników!";
                $conn->close();

        ?>
        </tbody>
        </table>
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>