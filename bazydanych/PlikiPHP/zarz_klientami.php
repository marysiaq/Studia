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
    <h3>Wyszukiwanie:</h3>
        <div>
			
            <form action="zarz_klientami.php" method="GET">
                Nazwisko:<input name="search" type="text"/>
                E-mail:<input name="search2" type="text"/>
                Czy usunięto konto:<select name='a'>
                    <option value=""></option>
                    <option value='true'>tak</option>
                    <option value='false'>nie</option>
                </select>
                <input type="submit" value="Szukaj"/>
            </form>

            <table>
            <thead>
                <tr><th>Imie</th><th>Nazwisko</th><th>E-mail</th><th>Czy usunięto konto</th></tr>
            </thead>
            <tbody>
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
             }
                $sql="select e_mail,id,imie,nazwisko, if(usunieto,'tak','nie') as aktywny from klient where id>0 ";
                
                if (isset($_GET["a"])&&!empty($_GET["a"])) {
                    $sql .= " AND usunieto={$_GET['a']}";
                    
                }
                //echo $sql;
				
				
                if (isset($_GET["search"])) {
                    $sql .= " AND  nazwisko LIKE '%{$_GET['search']}%'";
                }
                if (isset($_GET["search2"])) {
                    $sql .= " AND  e_mail LIKE '%{$_GET['search2']}%'";
                }
				//else {$sql .="ORDER BY p.nazwa";}
                $sql .=" ORDER BY nazwisko asc";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr ><td> {$row['imie']}</td><td> {$row['nazwisko']}</td><td>{$row['e_mail']} </td><td>{$row['aktywny']}</td>";
                        echo "<td><a href='usun_klienta.php?id={$row['id']}'>Usuń</a></td>";
                        if($row['aktywny']=='tak')echo "<td><a href='przywroc_klienta.php?id={$row['id']}'>Przywróć</a></td>";
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