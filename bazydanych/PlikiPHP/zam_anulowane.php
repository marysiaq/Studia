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
        <a href="zarz_zamowieniami.php"><-- Powrót</a>
    <?php
       
       

        ?>
    </nav>
    <article>
    
    

            <table>
            <thead>
                <tr><th>Numer</th><th>Data wpłynięcia</th><th>Data anulowania</th></tr>
            </thead>
            <tbody>
             <?php
             $conn = new mysqli("localhost", "root","", "sklepik");
             if ($conn->connect_error) {
                 die("Connection failed: ". $conn->connect_error);
             }
                $sql="select zamowienie.id,stan,data_zamowienia,data_anulowania, czy_oplacone from zamowienie inner join stan_zamowienia on zamowienie.id_stan=stan_zamowienia.id and id_stan in (7) ";
                if (isset($_GET["id"])&&!empty($_GET["id"])) {
                    $sql .= " AND id_stan = {$_GET["id"]}";
                }
                
				
				
               
				//else {$sql .="ORDER BY p.nazwa";}
                $sql .=" ORDER BY data_anulowania desc";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                         echo "<tr data-id=\" ".$row['id']." \"><td><a href='szczegoly_zam.php?id={$row['id']}'> {$row['id']}</a></td><td> {$row['data_zamowienia']}</a></td><td> {$row['data_anulowania']}</a></td><td><a href='szczegoly_zam.php?id={$row['id']}'> Szczegóły </a></td><td><a href='przywroc_zam.php?id={$row['id']}'> Przywróć</a></td>";
                         if($_SESSION['id_uprawnienia']==2){echo"<td><a href='usun_zam.php?id={$row['id']}'>Usuń</a></td></th>
                        ";}
                        else echo "</tr>";
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