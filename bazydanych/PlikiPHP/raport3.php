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
                <tr><th>Nazwa produktu</th><th>Ilość zamówionych</th></tr>
            </thead>
            <tbody>
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }
              /*select sum(zamowione_produkty.ilosc) as ilosc,produkt.nazwa from 
(zamowienie inner join zamowione_produkty on zamowienie.id=zamowione_produkty.id_zamowienia and id_stan!=1 and data_zamowienia like '2022-05%')
inner join produkt on zamowione_produkty.id_produktu=produkt.id
 group by zamowione_produkty.id_produktu having ilosc>(select avg(pom.ilosc)  from  (select sum(zamowione_produkty.ilosc) as ilosc from 
(zamowienie inner join zamowione_produkty on zamowienie.id=zamowione_produkty.id_zamowienia and id_stan!=1 and data_zamowienia like '2022-05%')
inner join produkt on zamowione_produkty.id_produktu=produkt.id
 group by zamowione_produkty.id_produktu ) as pom) order by ilosc desc ; */

                $sql="select sum(zamowione_produkty.ilosc) as ilosc,produkt.nazwa from 
                (zamowienie inner join zamowione_produkty on zamowienie.id=zamowione_produkty.id_zamowienia and id_stan!=1";
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

                $sql .=" inner join produkt on zamowione_produkty.id_produktu=produkt.id
                group by zamowione_produkty.id_produktu having ilosc>(select avg(pom.ilosc)  from  (select sum(zamowione_produkty.ilosc) as ilosc from 
               (zamowienie inner join zamowione_produkty on zamowienie.id=zamowione_produkty.id_zamowienia and id_stan!=1";
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
            $sql.="inner join produkt on zamowione_produkty.id_produktu=produkt.id
            group by zamowione_produkty.id_produktu ) as pom) order by ilosc desc ;";

				
				//echo $sql;
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "<tr ><td> {$row['nazwa']}</td><td> {$row['ilosc']}</td>";
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