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
    <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
       }
       $result=$conn->query("SELECT id, nazwa, id_kategoria , cena, opis, sklad, ilosc FROM produkt WHERE id='{$_GET['id']}'");
       $row=$result->fetch_assoc();
       $result2=$conn->query("SELECT kategoria FROM kategorie_produktow WHERE id='{$row['id_kategoria']}'");
       $row2=$result2->fetch_assoc();
            echo "<h1>{$row['nazwa']}</h1>
            
            <h3><b>Cena:</b> {$row['cena']} zł</h3>
            <h4><b>Skład:</b></h4>
            <p>{$row['sklad']}</p>
            <h3>Opis</h3>
            <p>{$row['opis']}</p>
            <p><b>Kategoria:</b> {$row2['kategoria']} </p>
            <h3>Ilość:</h3>
            <p>{$row['ilosc']}</p>
            ";

            echo "<a href='produkt_edytuj_f.php?id={$row['id']}'>Edytuj</a>";
            
        $conn->close();
    ?>
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>