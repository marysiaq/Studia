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
        <a href="lista_produktow.php"> Lista Produktów </a>
        <?php
        if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true) echo '<a href="LogowanieRejestracja.php">Zaloguj/Zarejestruj</a> ';
        if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){ echo '<a href="koszyk.php">Koszyk</a>';
        echo $_SESSION['id'];}

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
            ";
            if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){
                if($row['ilosc']>0){
                    echo "<form method='post' action='dodaj_do_koszyka.php'>
                        <input type='number' value='1' name='ilosc'/>
                        <input type='hidden' value='{$row['id']}' name='id_produkt'>
                        <input type='submit' name='button1' value='Dodaj do koszyka' />
                    </form>";
                }
                else{
                    echo "Brak w magazynie!";
                }
            }
            if(isset($_SESSION['info'])){
                echo $_SESSION['info'];
                unset($_SESSION['info']);
            }

            if(isset($_SESSION['Blad'])){
                echo $_SESSION['Blad'];
                unset($_SESSION['Blad']);
            }
            //if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true&&$_SESSION['id']==$row['idAutoraPosta']){
              // echo" <a class=\"przycisk\" href=\"deleteMovie.php?id={$row['id']}\">Usuń</a>
              // <a class=\"przycisk\" href=\"editMovieForm.php?id={$row['id']}\">Edytuj</a>
               //";
            //}



    ?>
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>