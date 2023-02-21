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
            
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }
              /*
              #średnia długość realizacji zam ok
#klienci których zamówienia zaostały zrealizowanie w mniej dni niż wynosi średnia w danym okresie
create table srednia  as select round(avg(pom.dni)) as srednia  from ( select id, data_zamowienia, data_zakonczenia ,DATEDIFF( data_zakonczenia,data_zamowienia) as dni from zamowienie where id_stan=6 and data_zamowienia like '2022-03%') as pom;
select imie, nazwisko,DATEDIFF( data_zakonczenia,data_zamowienia) as dni ,srednia from (klient inner join zamowienie on zamowienie.id_klienta=klient.id and id_stan=6 and data_zamowienia like '2022-03%')inner join srednia  on DATEDIFF( data_zakonczenia,data_zamowienia)<= srednia.srednia order by nazwisko;
drop table srednia;

                */

                $sql="create table srednia  as select round(avg(pom.dni)) as srednia  from ( select DATEDIFF( data_zakonczenia,data_zamowienia) as dni from zamowienie where id_stan=6";
                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}'";
                    //echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%'";
                    //echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%'";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }
                $sql.=") as pom;";
                $conn->query($sql);

                $result=$conn->query("select srednia from srednia;");
                $row=$result->fetch_assoc();
                echo "Średni czas realizacji zamowienia: {$row['srednia']} dni<br/>";
                echo "Zamówienia które zostały zrealizowane w czasie krótszym niż wynosi średnia oraz klienci których dotyczą:<br/>";
                echo "<table>
                <thead>
                    <tr><th>Imie</th><th>Nazwisko</th><th>Czas realizacji zamóweinia(w dniach)</th><th>Numer zamówienia</th></tr>
                </thead>
                <tbody>";
                $sql="";
                $sql="select zamowienie.id, imie, nazwisko,DATEDIFF( data_zakonczenia,data_zamowienia) as dni ,srednia from (klient inner join zamowienie on zamowienie.id_klienta=klient.id and id_stan=6";

                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}'";
                    //echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%'";
                    //echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%'";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }
                $sql .= " )inner join srednia  on DATEDIFF( data_zakonczenia,data_zamowienia)<= srednia.srednia order by nazwisko;";
				
				//echo $sql;
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "<tr ><td> {$row['imie']}</td><td> {$row['nazwisko']} </td><td> {$row['dni']}  </td><td>{$row['id']}</td>";
                         echo "</tr>";
                    }
               }
               else echo "Brak wyników!";

               $conn->query("drop table srednia;");

                $conn->close();

        ?>
        
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>