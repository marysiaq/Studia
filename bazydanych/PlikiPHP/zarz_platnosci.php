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
        <a href="dodaj_platnosc_f.php">Dodaj</a>
    
			

            <table>
            <thead>
                <tr><th>Nazwa</th><th>Dostępne</th></tr>
            </thead>
            <tbody>
             <?php
                $conn = new mysqli("localhost", "root","", "sklepik");
                if ($conn->connect_error) {
                        die("Connection failed: ". $conn->connect_error);
                }

                $result=$conn->query("select id,metoda_platnosci, if(dostepne,'tak','nie') as dost  from metody_platnosci  order by metoda_platnosci");
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                     echo "<tr ><td> {$row['metoda_platnosci']}</td></td><td>{$row['dost']} </td><td><a href='edytuj_platnosc_f.php?id={$row['id']}'>Edytuj</a></td></tr>";
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