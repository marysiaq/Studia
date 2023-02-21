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
                <tr><th>Nazwa </th><th>Ilość </th></tr>
            </thead>
            <tbody>
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }
              

                $sql="select null as ilosc, 'Sposoby dostawy:' as nazwa, 'f' as pom union
                select count(zamowienie.id) as ilosc ,sposob_dostawy as nazwa,concat('e',cast(count(zamowienie.id) as char(3) )) as pom from zamowienie inner join sposoby_dostawy on zamowienie.id_dostawa=sposoby_dostawy.id";
                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}'";
                    echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%'";
                    echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%'";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }

                $sql .=" group by sposob_dostawy 
                union select null as ilosc, 'Metody płatności:' as nazwa, 'd' as pom union 
                select count(zamowienie.id) as ilosc,metoda_platnosci as nazwa,concat('c',cast(count(zamowienie.id) as char(3) )) as pom from zamowienie inner join metody_platnosci on zamowienie.id_sposob_platnosci=metody_platnosci.id";
               if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}'";
                echo $_POST['dzien'];
            }
            
            else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%'";
                echo $_POST['mies'];
            }
            else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%'";
            }
            else{
                $_SESSION['blad1']="<span>Błąd!</span>";
                header("Location: raporty.php");
                exit();
            }
            $sql.=" group by metody_platnosci.id 
            union select null as ilosc, 'Kody rabatowe:' as nazwa, 'b' as pom 
            union select count(zamowienie.id) as ilosc ,kod as nazwa ,concat('a',cast(count(zamowienie.id) as char(3) )) as pom  from kody_rabatowe inner join zamowienie on zamowienie.id_kod_rabatowy =kody_rabatowe.id";
            if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}'";
                echo $_POST['dzien'];
            }
            
            else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%'";
                echo $_POST['mies'];
            }
            else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%'";
            }
            else{
                $_SESSION['blad1']="<span>Błąd!</span>";
                header("Location: raporty.php");
                exit();
            }
            $sql.="and kody_rabatowe.id!=1 group by kody_rabatowe.id  order by pom desc;";
				
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