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
                <tr><th>Kod rabatowy</th><th>Suma udzielonego rabatu</th></tr>
            </thead>
            <tbody>
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }
              /*select sum(pom.rabat) as suma from (select sum(round((zamowione_produkty.ilosc*zamowione_produkty.cena*0.01*znizka_procent),2)) as rabat from  (zamowienie inner join zamowione_produkty on zamowione_produkty.id_zamowienia=zamowienie.id and id_stan !=1 and data_zamowienia like '2022-03%') inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id group by zamowienie.id) as pom;
#z podziałem na kody
select sum(round((zamowione_produkty.ilosc*zamowione_produkty.cena*0.01*znizka_procent),2)) as rabat, kod from  (zamowienie inner join zamowione_produkty on zamowione_produkty.id_zamowienia=zamowienie.id and id_stan !=1 and data_zamowienia like '2022-03%') inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id and kody_rabatowe.id!=1 group by kody_rabatowe.id order by kod;
 */

                $sql="select sum(round((zamowione_produkty.ilosc*zamowione_produkty.cena*0.01*znizka_procent),2)) as rabat, kod from  (zamowienie inner join zamowione_produkty on zamowione_produkty.id_zamowienia=zamowienie.id and id_stan !=1 and id_stan!=7";
                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}')";
                    echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%')";
                    echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%')";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }

                $sql .=" inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id and kody_rabatowe.id!=1 group by kody_rabatowe.id order by kod;";
             
            

				
				//echo $sql;
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "<tr ><td> {$row['kod']}</td><td> {$row['rabat']} zł</td>";
                         echo "</tr>";
                    }
               }
               else echo "Brak wyników!";

               $sql="select sum(pom.rabat) as suma from (select sum(round((zamowione_produkty.ilosc*zamowione_produkty.cena*0.01*znizka_procent),2)) as rabat from  (zamowienie inner join zamowione_produkty on zamowione_produkty.id_zamowienia=zamowienie.id and id_stan !=1 and id_stan!=7";
               if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                   $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}')";
                   echo $_POST['dzien'];
               }
               
               else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                   $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%')";
                   echo $_POST['mies'];
               }
               else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                   $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%')";
               }
               else{
                   $_SESSION['blad1']="<span>Błąd!</span>";
                   header("Location: raporty.php");
                   exit();
               }

               $sql .=" inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id group by zamowienie.id) as pom;";

               $result=$conn->query($sql);
               $row=$result->fetch_assoc();
               echo "<tr><td><b>Razem:</b></td><td>{$row['suma']} zł</td></tr>";
               //echo $sql;

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