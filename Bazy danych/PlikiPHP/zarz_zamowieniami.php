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
    <a href="zam_zakonczone.php">Zamóweinia zrealizowane</a>
    <a href="zam_anulowane.php">Zamóweinia anulowane</a>
    <h3>Wyszukiwanie:</h3>
        <div>
			
            <form action="zarz_zamowieniami.php" method="GET">
                
				
                Stan Zamówienia:<select name="id" >
                    <option value=""></option>
                    <?php
                        $conn = new mysqli("localhost", "root","", "sklepik");
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn->connect_error);
                       }
                        $result=$conn->query("SELECT id,stan FROM stan_zamowienia where id in (2,3,4,5)");
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<option value=\"{$row['id']}\">{$row['stan']} </option>";
                            }
                        }
                    ?>
                </select>
                Data:<input type='date' name ='data' />
                Miesiąc<input type='month' name='mies'/>
                <select name="sortowanie" >
                <option value=""></option>
                <option value="datam">Data malejąco</option>
                <option value="datar">Data rosnąco</option>
                
                </select>

                <input type="submit" value="Szukaj"/>
            </form>
            
            

            <table>
            <thead>
                <tr><th>Numer</th><th>Data</th><th>Stan</th><th>Czy opłacone</th></tr>
            </thead>
            <tbody>
             <?php
                $sql="select zamowienie.id,stan,data_zamowienia, czy_oplacone from zamowienie inner join stan_zamowienia on zamowienie.id_stan=stan_zamowienia.id and id_stan in (2,3,4,5) ";
                if (isset($_GET["id"])&&!empty($_GET["id"])) {
                    $sql .= " AND id_stan = {$_GET["id"]}";
                }
                if (isset($_GET["data"])&&!empty($_GET["data"])) {
                    $sql .= " AND data_zamowienia = '{$_GET["data"]}'";
                }
                if (isset($_GET["mies"])&&!empty($_GET["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_GET["mies"]}%'";
                }

                if (isset($_GET["sortowanie"])&&!empty($_GET["sortowanie"])&&$_GET["sortowanie"]=='datam') {
                    $sql .= " ORDER BY zamowienie.data_zamowienia desc";
                }
                else if (isset($_GET["sortowanie"])&&!empty($_GET["sortowanie"])&&$_GET["sortowanie"]=='datar') {
                    $sql .= " ORDER BY zamowienie.data_zamowienia";
                }
                else{
                    $sql .=" ORDER BY zamowienie.data_zamowienia desc";
                }
				
				
               
				//else {$sql .="ORDER BY p.nazwa";}
                //$sql .=" ORDER BY zamowienie.id desc";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row['czy_oplacone']==0)echo "<tr data-id=\" ".$row['id']." \"><td> {$row['id']}</td><td> {$row['data_zamowienia']}</a></td><td>{$row['stan']}</td><td>nie</td><td><a href='zarz_zam_nr.php?id={$row['id']}'>Zarządzaj</a></td>";
                        else echo "<tr data-id=\" ".$row['id']." \"><td> {$row['id']}</td><td> {$row['data_zamowienia']}</a></td><td>{$row['stan']}</td><td>tak</td><td><a href='zarz_zam_nr.php?id={$row['id']}'>Zarządzaj</a></td>";
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