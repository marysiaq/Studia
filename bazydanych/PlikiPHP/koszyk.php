<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: lista_produktow.php");
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
        <a href="lista_produktow.php"> <--Powrót </a>
    </nav>
    <article>
    <table>
            <thead>
                <tr><th>Nazwa</th><th>Ilość</th><th>Koszt</th></tr>
            </thead>
            <tbody>

    <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
       }    
       $sql="select produkt.id, produkt.nazwa, zamowione_produkty.ilosc, (produkt.cena*zamowione_produkty.ilosc) as koszt from (zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1)  inner join produkt on zamowione_produkty.id_produktu=produkt.id";
       $result=$conn->query($sql);
       if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr data-id=\" ".$row['id']." \"><td><a href=\"produkt.php?id={$row['id']}\"> {$row['nazwa']}</a></td>
            <td> {$row['ilosc']}</td><td>{$row['koszt']} zł</td>
            <td><form method='post' action='usun_z_koszyka.php'>
            <input type='hidden' value='{$row['id']}' name='id_produktu'>
            <input type='submit'  value='Usuń' />
            </form></td>
            <td><form method='post' action='jedna_szt_mniej.php'>
            <input type='hidden' value='{$row['id']}' name='id_produktu'>
            <input type='submit'  value='-' />
            </form></td>
            <td><form method='post' action='jedna_szt_wiecej.php'>
            <input type='hidden' value='{$row['id']}' name='id_produktu'>
            <input type='submit'  value='+' />
            </form></td>
            </tr>";
        }

        $result=$conn->query(" select sum(koszty.koszt) as koszt_calkowity from (select (produkt.cena*zamowione_produkty.ilosc) as koszt from (zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1)  inner join produkt on zamowione_produkty.id_produktu=produkt.id) as koszty;");
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            echo "<tr><td></td><td><b>Koszt całkowity:</b></td><td>{$row['koszt_calkowity']} zł</td></tr>";
        }
        
    }
     else echo "Pusto!";
        
       ?>

        </tbody>
        </table>
        <?php
        if(isset($_SESSION['info'])){
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }


            $result=$conn->query("select zamowione_produkty.id_produktu from zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1;");
            if($result->num_rows>0){
                echo "<br/><a href='wyczysc_koszyk.php'>Wyczyść koszyk </a><br/>";
                echo "<a href='formularz_zam.php'>Zamów </a>";
            }
         

            $conn->close();
        ?>
	
       </article>
       <footer>
           <br/>
           
           <br/>
       </footer>
   </body>
   </html>