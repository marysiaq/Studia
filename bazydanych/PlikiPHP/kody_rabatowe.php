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
        <a href="panel_pracownika.php"><-- Powrót</a>
    <?php
       
       

        ?>
    </nav>
    <article>
        <a href="dodaj_kod_f.php">Dodaj kod</a>
    
			

            <table>
            <thead>
                <tr><th>Kod rabatowy</th><th>Czy aktywny</th><th>Zniżka</th></tr>
            </thead>
            <tbody>
             <?php
                $conn = new mysqli("localhost", "root","", "sklepik");
                if ($conn->connect_error) {
                        die("Connection failed: ". $conn->connect_error);
                }

                $result=$conn->query("select id,kod, czy_aktywny, znizka_procent from kody_rabatowe where id!=1 order by kod");
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row['czy_aktywny']==0)echo "<tr ><td> {$row['kod']}</td><td>nie</td><td>{$row['znizka_procent']} %</td><td><a href='edytuj_kod_f.php?id={$row['id']}'>Edytuj</a></td></tr>";
                        else echo "<tr ><td> {$row['kod']}</td><td>tak</td></td><td>{$row['znizka_procent']} %</td><td><a href='edytuj_kod_f.php?id={$row['id']}'>Edytuj</a></td></tr>";
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