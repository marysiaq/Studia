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
        <a href="zarz_produktami.php"> <-- Powrót </a>
        <?php
        

        ?>
    </nav>
    <article>
        <form method="post" action="produkt_edytuj.php">
            
    <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
       }
       
       $result=$conn->query("SELECT  nazwa, id_kategoria , cena, opis, sklad, ilosc FROM produkt inner join kategorie_produktow on produkt.id_kategoria=kategorie_produktow.id and  produkt.id='{$_GET['id']}'");
       $row=$result->fetch_assoc();
       $result2=$conn->query("SELECT id,kategoria FROM kategorie_produktow");
       
       echo "<input type='hidden' name='id' value='{$_GET['id']}'>
       Nazwa:<input type='text' name='nazwa' size='80' value='{$row['nazwa']}' /><br/>
       Cena:<input type='number' step='0.01' name='cena' value='{$row['cena']}' /><br/>
       Opis: <br/><textarea name=\"opis\" cols=\"80\" rows=\"10\" >{$row['opis']}</textarea><br/>
       Sklad: <br/><textarea name=\"sklad\" cols=\"80\" rows=\"3\" >{$row['sklad']}</textarea><br/>
       Kategoria:<select name='id_kategoria'>
       ";
       while($row2=$result2->fetch_assoc()){
        if($row2['id']==$row['id_kategoria']) echo "<option value='{$row2['id']}' selected='selected'>{$row2['kategoria']}</option>";
        else echo "<option value='{$row2['id']}' >{$row2['kategoria']}</option>";
       }
       echo "</select><br/>
       Ilosc:<input type='number'  name='ilosc' value='{$row['ilosc']}' /><br/>
       ";
            
        $conn->close();
    ?>
    <input type="submit" value="Zapisz" />
    </form >
    <?php
        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
            unset($_SESSION['blad']);
        }
        
        ?>
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>