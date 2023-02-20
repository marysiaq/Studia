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
        <a href="lista_produktow.php"> Lista produktów </a>
        <a href="profil.php">Profil</a>
    <?php
        ?>
    </nav>
    <article>
<?php
$conn = new mysqli("localhost", "root","", "sklepik");
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
echo "<h1>Szczegóły zamówienia nr. {$_GET['id_zam']}</h1>";
$result=$conn->query("select sposob_dostawy, metoda_platnosci, czy_oplacone,data_zamowienia, stan from ((zamowienie inner join sposoby_dostawy on zamowienie.id_dostawa=sposoby_dostawy.id and zamowienie.id={$_GET['id_zam']})
inner join metody_platnosci on zamowienie.id_sposob_platnosci=metody_platnosci.id) inner join stan_zamowienia on zamowienie.id_stan=stan_zamowienia.id;");

$row=$result->fetch_assoc();

echo "<p><b>Stan zamówienia: </b>{$row['stan']}</p>
<p><b>Data wpłynięcia: </b>{$row['data_zamowienia']}</p>
";
if($row['czy_oplacone']==1) echo"<p><b>Opłacone: </b>tak</p>";
else echo"<p><b>Opłacone: </b>nie</p>";

echo "<p><b>Metoda płatności: </b>{$row['metoda_platnosci']}</p>
<p><b>Sposob daostawy: </b>{$row['sposob_dostawy']}</p>
";

$result=$conn->query("select produkt.id, nazwa, zamowione_produkty.ilosc, (zamowione_produkty.ilosc*zamowione_produkty.cena) as koszt_bez_kodu, round(zamowione_produkty.ilosc*zamowione_produkty.cena*0.01*znizka_procent,2) as rabat from
((zamowione_produkty inner join zamowienie on zamowienie.id=zamowione_produkty.id_zamowienia and zamowienie.id={$_GET['id_zam']})inner join produkt on zamowione_produkty.id_produktu=produkt.id)inner join kody_rabatowe
on zamowienie.id_kod_rabatowy=kody_rabatowe.id;");
echo "<h3>Zamówione produkty:</h3>";
if($result->num_rows>0){
    echo "<table>
    <thead>
    <tr><th><b>Nazwa </b></th><th><b>Ilosc</b></th><th><b>Koszt</b></th><th><b>Rabat(kod)</b></th></tr>
    </thead>
    <tbody>";
    while($row=$result->fetch_assoc()){
        echo"<tr><td ><a href=\"produkt.php?id={$row['id']}\">{$row['nazwa']}</a></td><td>{$row['ilosc']}</td><td>{$row['koszt_bez_kodu']} zł</td><td>- {$row['rabat']} zł</td></tr>";
    }
   
}
$result=$conn->query("select sum(koszt_bez_kodu) as koszt, sum(rabat) as rab, cena,koszt_calkowity  from(select(zamowione_produkty.ilosc*zamowione_produkty.cena) as koszt_bez_kodu, round(zamowione_produkty.ilosc*zamowione_produkty.cena*0.01*znizka_procent,2) as rabat, sposoby_dostawy.cena, zamowienie.koszt_calkowity from
((zamowione_produkty inner join zamowienie on zamowienie.id=zamowione_produkty.id_zamowienia and zamowienie.id={$_GET['id_zam']})inner join sposoby_dostawy on zamowienie.id_dostawa=sposoby_dostawy.id)inner join kody_rabatowe
on zamowienie.id_kod_rabatowy=kody_rabatowe.id) as pom;");
$row=$result->fetch_assoc();
echo"<tr><td ></td><td><b>Suma: </b></td><td>{$row['koszt']} zł</td><td>- {$row['rab']} zł</td><td>+ {$row['cena']} zł (koszty dostawy)</td></tr>";
echo"<tr><td ></td><td><b>Razem: </b></td><td>{$row['koszt_calkowity']} zł</tr>";
echo"</tbody>
</table>";


$conn->close();
?>
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>