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
              #podsumowanie kosztów zamowien
create table pom as select min(koszt_calkowity) as min, max(koszt_calkowity) as max , round(avg(koszt_calkowity),2) as avg from zamowienie where id_stan!=1 and data_zamowienia like '2022-05%';
select koszt_calkowity,zamowienie.id,(case 
when koszt_calkowity=pom.min then 'minimalny'
when koszt_calkowity=pom.max then 'maksymalny'
when koszt_calkowity>=pom.avg then 'większy od średniej'
when koszt_calkowity<pom.avg then 'mniejszy od średniej'
end) as przypadek from zamowienie, pom where id_stan!=1 and data_zamowienia like '2022-05%' order by zamowienie.data_zamowienia;
select (select count(zamowienie.id) from zamowienie, pom where koszt_calkowity>pom.avg and id_stan!=1 and data_zamowienia like '2022-05%')as wiekszy,
(select count(zamowienie.id) from zamowienie, pom where koszt_calkowity<pom.avg and id_stan!=1 and data_zamowienia like '2022-05%')as mniejszy ;
drop table pom;
                */

                $sql="create table pom as select min(koszt_calkowity) as min, max(koszt_calkowity) as max , round(avg(koszt_calkowity),2) as avg from zamowienie where id_stan!=1";
                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}';";
                    //echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%';";
                    //echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%';";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }
                $conn->query($sql);

                $result=$conn->query("select min,max,avg from pom;");
                $row=$result->fetch_assoc();
                echo "Minimalny koszt całkowity: {$row['min']} zł<br/>";
                echo "Maksymalny koszt całkowity: {$row['max']} zł<br/>";
                echo "Średni koszt całkowity: {$row['avg']} zł<br/>";

                echo "<table>
                <thead>
                    <tr><th>Numer zamowienia</th><th>Przypadek</th><th>Koszt całkowity</th></tr>
                </thead>
                <tbody>";
                $sql="";
                $sql="select koszt_calkowity,zamowienie.id,(case 
                when koszt_calkowity=pom.min then 'minimalny'
                when koszt_calkowity=pom.max then 'maksymalny'
                when koszt_calkowity>=pom.avg then 'większy od średniej'
                when koszt_calkowity<pom.avg then 'mniejszy od średniej'
                end) as przypadek from zamowienie, pom where id_stan!=1";

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
                $sql .= " order by przypadek;";
				
				//echo $sql;
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "<tr ><td> {$row['id']}</td><td> {$row['przypadek']} </td><td> {$row['koszt_calkowity']} zł </td>";
                         echo "</tr>";
                    }
               }
               else echo "Brak wyników!";



               $sql="select (select count(zamowienie.id) from zamowienie, pom where koszt_calkowity>pom.avg and id_stan!=1";
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
            $sql .= "as wiekszy,
            (select count(zamowienie.id) from zamowienie, pom where koszt_calkowity<pom.avg and id_stan!=1";

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
            $sql .= "as mniejszy ;";
            echo "</tbody>
            </table>";

            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo "Przypadki kosztu całkowitego poniżej średniej: {$row['mniejszy']}<br/>";
            echo "Przypadki kosztu całkowitego powyżej średniej: {$row['wiekszy']}<br/>";
              

               $conn->query("drop table pom;");

                $conn->close();

        ?>
        
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>