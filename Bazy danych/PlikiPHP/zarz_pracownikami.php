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
    <a href="dodaj_pracownika_f.php">Dodaj pracownika</a>
    <h3>Wyszukiwanie:</h3>
        <div>
			
            <form action="zarz_pracownikami.php" method="GET">
                <input name="search" type="text"/>
				
                Uprawnienia:<select name="id" >
                    <option value=""></option>
                    <?php
                        $conn = new mysqli("localhost", "root","", "sklepik");
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn->connect_error);
                       }
                        $result=$conn->query("SELECT id,uprawnienia FROM uprawnienia_pracownikow order by uprawnienia");
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<option value=\"{$row['id']}\">{$row['uprawnienia']} </option>";
                            }
                        }
                    ?>
                </select>
                Czy aktywny:<select name='a'>
                    <option value=""></option>
                    <option value='true'>tak</option>
                    <option value='false'>nie</option>
                </select>
                <input type="submit" value="Szukaj"/>
            </form>

            <table>
            <thead>
                <tr><th>Imie</th><th>Nazwisko</th><th>Uprawnienia</th><th>Czy aktywny</th></tr>
            </thead>
            <tbody>
             <?php
                $sql="select pracownik.id,imie,nazwisko, uprawnienia,if(czy_aktywny,'tak','nie') as aktywny from pracownik inner join uprawnienia_pracownikow on pracownik.id_uprawnienia=uprawnienia_pracownikow.id ";
                if (isset($_GET["id"])&&!empty($_GET["id"])) {
                    $sql .= " AND uprawnienia_pracownikow.id = {$_GET["id"]}";
                }
                if (isset($_GET["a"])&&!empty($_GET["a"])) {
                    $sql .= " AND czy_aktywny={$_GET['a']}";
                    
                }
                //echo $sql;
				
				
                if (isset($_GET["search"])) {
                    $sql .= " AND  nazwisko LIKE '%{$_GET["search"]}%'";
                }
				//else {$sql .="ORDER BY p.nazwa";}
                $sql .=" ORDER BY nazwisko asc";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr ><td> {$row['imie']}</td><td> {$row['nazwisko']}</td><td>{$row['uprawnienia']} </td><td>{$row['aktywny']}</td>";
                        if($row['id']!=$_SESSION['id_prac'])echo "<td><a href='edytuj_pracownika_f.php?id={$row['id']}'>Edytuj</a></td><td><a href='usun_pracownika.php?id={$row['id']}'>Usuń</a></td>";
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