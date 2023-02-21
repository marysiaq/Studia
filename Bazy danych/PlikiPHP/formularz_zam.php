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
    <a href="koszyk.php"> <--Powrót </a>
    <?php


        ?>
    </nav>
    <article> 

    <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        ?>
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
       $sql="select produkt.id,produkt.nazwa,zamowione_produkty.ilosc, round(((produkt.cena*zamowione_produkty.ilosc)-((produkt.cena*zamowione_produkty.ilosc)*0.01*kody_rabatowe.znizka_procent )),2)as koszt_z_kodem
       from ((zamowienie inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id)
       inner join zamowione_produkty on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1 )
       inner join produkt on zamowione_produkty.id_produktu=produkt.id; ";
       $result=$conn->query($sql);
       if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr data-id=\" ".$row['id']." \"><td><a href=\"produkt.php?id={$row['id']}\"> {$row['nazwa']}</a></td>
            <td> {$row['ilosc']}</td><td>{$row['koszt_z_kodem']} zł</td></tr>";
        }

        $result=$conn->query(" select sum(pom.koszt_z_kodem) as suma_z_kodem from (select round(((produkt.cena*zamowione_produkty.ilosc)-((produkt.cena*zamowione_produkty.ilosc)*0.01*kody_rabatowe.znizka_procent )),2)as koszt_z_kodem
        from ((zamowienie inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id)
        inner join zamowione_produkty on zamowione_produkty.id_zamowienia=zamowienie.id and zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan=1 )
        inner join produkt on zamowione_produkty.id_produktu=produkt.id) as pom;
        ");
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            echo "<tr><td></td><td><b>Koszt całkowity:</b></td><td>{$row['suma_z_kodem']} zł  </td><td>+ (koszty dostawy)</td></tr>";
        }
    }
    ?>
     
    <?php
                    $result=$conn->query("select zamowienie.id_kod_rabatowy from zamowienie where id_klienta={$_SESSION['id']} and id_stan=1;");
                    $row=$result->fetch_assoc();
                    
                    if($row['id_kod_rabatowy'] != 1){
                        $result=$conn->query("select kod,znizka_procent from kody_rabatowe where id={$row['id_kod_rabatowy']};");
                        $row=$result->fetch_assoc();
                        echo "<tr><td></td><td><b>Zniżka(kod):</b></td><td>{$row['znizka_procent']} %</td></tr>";


                        echo "</tbody>
                        </table>";
                        echo " <form name='f2' method='post' action='usun_kod_rabatowy.php'>
                        Kod rabatowy (opcjonalnie)<input name='kod_rabatowy' type='text' value='{$row['kod']}'/> 
                        <input  type='submit' value='Usuń'/>
                        </form>";
                    }
                    else{
                        echo "</tbody>
                        </table>";
                        echo "<form name='f2' method='post' action='zatwierdz_kod_rabatowy.php' >   
                        Kod rabatowy (opcjonalnie)<input  name='kod_rabatowy' type='text'/> 
                        <input  type='submit' value='Ok'/>
                        </form>";
                    }

                    if(isset($_SESSION['info'])){
                        echo $_SESSION['info'];
                        unset($_SESSION['info']);
                    }
                   
                ?>

    <form name="f1" method="POST" action="zamow.php">
    Sposób płatności:<select name="platnosc" >
                    <option value=""></option>
                    <?php
                       
                        $result=$conn->query("SELECT id,metoda_platnosci FROM metody_platnosci where dostepne=true ");
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<option value=\"{$row['id']}\">{$row['metoda_platnosci']} </option>";
                            }
                        }
                    ?>
                </select><br/>
    Sposób dostawy:<select name="dostawa" >
                    <option value=""></option>
                    <?php
                       
                        $result=$conn->query("SELECT id,sposob_dostawy, cena FROM sposoby_dostawy where dostepne=true");
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<option value=\"{$row['id']}\">{$row['sposob_dostawy']} ({$row['cena']} zł)</option>";
                            }
                        }
                    ?>
                </select><br/>
                
                
    <input  type="submit" value="Zamów"/>
    </form>




    <?php 
            if(isset($_SESSION['info2'])){
                echo $_SESSION['info2'];
                unset($_SESSION['info2']);
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