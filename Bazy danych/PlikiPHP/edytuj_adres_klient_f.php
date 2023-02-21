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
    <a href="profil.php"><-- Powrót </a>
    
    </nav>
    <article>
    <form   action='edytuj_adres_klient.php' method='post'>
        <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $result=$conn->query("select miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu from adresy inner join klient on adresy.id=klient.id_adres and klient.id={$_SESSION['id']};");
        $row=$result-> fetch_assoc();
        echo "
             Miejscowość:<input type='text' name='miejsc' value='{$row['miejscowosc']}'><br/>
             Ulica: <input type='text' name='ulica' value='{$row['ulica']}'><br/>
             Kod pocztowy:<input type='text' pattern='^[0-9]{2}-[0-9]{3}$' name='kod' value='{$row['kod_pocztowy']}'><br/>
             Numer budynku: <input type='number' name='nr_bud' value='{$row['numer_budynku']}'><br/>
             Numer lokalu: <input type='number' name='nr_lok' value='{$row['numer_lokalu']}'><br/>
        ";
        ?>
    <input type='submit'  value='zapisz'>
    </form>

        <?php
        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
            unset($_SESSION['blad']);
        }
        
        ?>
        
        
    </article>
    <footer>
		<br/>
        <?php
        $conn->close();
        ?>
		
		<br/>
    </footer>
</body>
</html>   