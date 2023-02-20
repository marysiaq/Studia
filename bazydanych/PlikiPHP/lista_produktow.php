<?php
    session_start();
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
    <?php
        if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true) echo '<a href="LogowanieRejestracja.php">Zaloguj/Zarejestruj</a>';
        if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){ echo '<a href="koszyk.php">Koszyk</a>';
        if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true)echo '<a href="profil.php">Profil</a><a href="wyloguj.php">Wyloguj się</a>';
        }
        if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true&&$_SESSION['pracownik']==true)echo'<a href="panel_pracownika.php">Panel pracownika</a>';

        ?>
    </nav>
    <article>
    <h3>Wyszukiwanie:</h3>
        <div>
			
            <form action="lista_produktow.php" method="GET">
                <input name="search" type="text"/>
				
                Kategoria:<select name="id" >
                    <option value=""></option>
                    <?php
                        $conn = new mysqli("localhost", "root","", "sklepik");
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn->connect_error);
                       }
                        $result=$conn->query("SELECT id,kategoria FROM kategorie_produktow");
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<option value=\"{$row['id']}\">{$row['kategoria']} </option>";
                            }
                        }
                    ?>
                </select>
                <input type="submit" value="Szukaj"/>
            </form>

            <table>
            <thead>
                <tr><th>Nazwa</th><th>Kategoria</th><th>Cena</th></tr>
            </thead>
            <tbody>
             <?php
                $sql="SELECT p.id,p.nazwa,p.id_kategoria, p.cena, k.kategoria FROM produkt as p inner join kategorie_produktow as k on  p.id_kategoria=k.id and p.ilosc>0 ";
                if (isset($_GET["id"])&&!empty($_GET["id"])) {
                    $sql .= " AND p.id_kategoria = {$_GET["id"]}";
                }
                
				
				
                if (isset($_GET["search"])) {
                    $sql .= " AND  p.nazwa LIKE '%{$_GET["search"]}%'";
                }
				//else {$sql .="ORDER BY p.nazwa";}
                $sql .=" ORDER BY p.nazwa asc";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr data-id=\" ".$row['id']." \"><td><a href=\"produkt.php?id={$row['id']}\"> {$row['nazwa']}</a></td><td><a href=\"produkt.php?id={$row['id']}\"> {$row['kategoria']}</a></td><td>{$row['cena']} zł</td></tr>";
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