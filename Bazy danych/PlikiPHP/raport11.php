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
                <tr><th>Imie</th><th>Nazwisko</th><th>E-mail</th></tr>
            </thead>
            <tbody>
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }
              /* ; */

                $sql="select count(zamowienie.id) , klient.id, imie, nazwisko,e_mail from klient inner join zamowienie on zamowienie.id_klienta=klient.id and id_stan!=1";
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

                $sql .=" group by klient.id having klient.id not in (select  klient.id from klient inner join zamowienie on zamowienie.id_klienta=klient.id and id_stan!=1";
               if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                $sql .= " AND data_zamowienia <'{$_POST['dzien']}'";
                //echo $_POST['dzien'];
            }
            
            else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                $sql .= " AND data_zamowienia <'{$_POST["mies"]}-01'";
                //echo $_POST['mies'];
            }
            else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                $sql .= " AND data_zamowienia < '{$_POST["rok"]}-01-01'";
            }
            else{
                $_SESSION['blad1']="<span>Błąd!</span>";
                header("Location: raporty.php");
                exit();
            }
            $sql.="group by klient.id) order by nazwisko  ;";

				
				//echo $sql;
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "<tr ><td> {$row['imie']}</td><td> {$row['nazwisko']}</td><td> {$row['e_mail']}</td>";
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